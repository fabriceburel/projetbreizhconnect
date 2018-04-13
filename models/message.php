<?php
/**
 * Gestion des messages avec héritage de la class dataBas
 */
class message extends dataBase {

    public $id = 0;
    public $idRelationship = 0;
    public $idTransmitter = 0;
    public $idReceiver = 0;
    public $datetime = '01/01/2018 00:00:00';
    public $content = '';
    
    public function __construct()
    {
        parent::__construct();
    }

    public function newMessage()
    {
        try {
            $this->db->beginTransaction();
            $queryIdRelationship = 'SELECT `id` FROM ' . RELATIONSHIP . ' WHERE `idTransmitter` = :idTransmitter AND `idReceiver` = :idReceiver AND `acceptRelation` = 1';
            $responseRequestIdRelationship = $this->db->prepare($queryIdRelationship);
            $responseRequestIdRelationship->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
            $responseRequestIdRelationship->bindValue(':idReceiver', $this->idReceiver, PDO::PARAM_INT);
            if ($responseRequestIdRelationship->execute())
            {
                $this->idRelationship = intval($responseRequestIdRelationship->fetch(PDO::FETCH_COLUMN, 0));
            }
            //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
            $queryNewMessage = 'INSERT INTO ' . MESSAGE . ' (`idRelationship`, `content`) VALUES (:idRelationship, :content)';
            $responseSendRequest = $this->db->prepare($queryNewMessage);
            $responseSendRequest->bindValue(':idRelationship', $this->idRelationship, PDO::PARAM_INT);
            $responseSendRequest->bindValue(':content', $this->content, PDO::PARAM_STR);
            $responseSendRequest->execute();
            $queryReadMessage = 'SELECT ' . MESSAGE . '.`id`  AS `idMessage`, ' . MESSAGE . '.`content`,  DATE_FORMAT(' . MESSAGE . '.`datetime`, \'%e/%m/%Y\') AS `date`, DATE_FORMAT(' . MESSAGE . '.`datetime`, \'%H:%i\') AS `hour`, DATE_FORMAT(CURRENT_DATE(),\'%e/%m/%Y\') AS `today`, ' . MESSAGE . '.`idRelationship`, ' . USER . '.`id`, ' . USER . '.`username` '
                    . 'FROM ' . MESSAGE . ' INNER JOIN ' . RELATIONSHIP . ' ON ' . RELATIONSHIP . '.`id` = ' . MESSAGE . '.`idRelationship`'
                    . 'INNER JOIN ' . USER . ' ON ' . RELATIONSHIP . '.`idTransmitter` = ' . USER . '.`id`'
                    . 'WHERE (' . RELATIONSHIP . '.`idReceiver` = :idTransmitter AND ' . RELATIONSHIP . '.`idTransmitter` = :idReceiver)'
                    . 'OR (' . RELATIONSHIP . '.`idReceiver` = :idReceiver AND ' . RELATIONSHIP . '.`idTransmitter` = :idTransmitter)'
                    . 'ORDER BY  ' . MESSAGE . '.`datetime`';
            $responseReadRequest = $this->db->prepare($queryReadMessage);
            $responseReadRequest->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
            $responseReadRequest->bindValue(':idReceiver', $this->idReceiver, PDO::PARAM_INT);
            $resultReadRequest = array();
            if ($responseReadRequest->execute())
            {
                $resultReadRequest = $responseReadRequest->fetchAll(PDO::FETCH_OBJ);
            }
            $this->db->commit();
            //le return doit être positionné après le $this->db->commit() sinon la transaction s'interrompt et un rollBack est effectué
            return $resultReadRequest;
        } catch (Exception $ex) {
            //Si une erreur survient, on annule les changements.
            $this->db->rollBack();
        }
    }

    /**
     * Cette méthode permet de récupérer les messages existant entre 2 utilisateurs
     */
    public function readMessage()
    {
        $queryReadMessage = 'SELECT ' . MESSAGE . '.`id`  AS `idMessage`, ' . MESSAGE . '.`content`,  DATE_FORMAT(' . MESSAGE . '.`datetime`, \'%e/%m/%Y\') AS `date`, DATE_FORMAT(' . MESSAGE . '.`datetime`, \'%H:%i\') AS `hour`, DATE_FORMAT(CURRENT_DATE(),\'%e/%m/%Y\') AS `today`, ' . MESSAGE . '.`idRelationship`, ' . USER . '.`id`, ' . USER . '.`username` '
                . 'FROM ' . MESSAGE . ' INNER JOIN ' . RELATIONSHIP . ' ON ' . RELATIONSHIP . '.`id` = ' . MESSAGE . '.`idRelationship`'
                . 'INNER JOIN ' . USER . ' ON ' . RELATIONSHIP . '.`idTransmitter` = ' . USER . '.`id`'
                . 'WHERE (' . RELATIONSHIP . '.`idReceiver` = :idTransmitter AND ' . RELATIONSHIP . '.`idTransmitter` = :idReceiver)'
                . 'OR (' . RELATIONSHIP . '.`idReceiver` = :idReceiver AND ' . RELATIONSHIP . '.`idTransmitter` = :idTransmitter)'
                . 'ORDER BY  ' . MESSAGE . '.`datetime`';
        $responseReadRequest = $this->db->prepare($queryReadMessage);
        $responseReadRequest->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
        $responseReadRequest->bindValue(':idReceiver', $this->idReceiver, PDO::PARAM_INT);
        $resultReadRequest = array();
        if ($responseReadRequest->execute())
        {
            $resultReadRequest = $responseReadRequest->fetchAll(PDO::FETCH_OBJ);
        }
        return $resultReadRequest;
    }

    public function __destruct()
    {
        
    }

}
