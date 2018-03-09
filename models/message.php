<?php

class message extends dataBase {

    public $id = 0;
    public $idRelationship = 0;
    public $datetime = 01 / 01 / 2018;
    public $content = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function newMessage()
    {
        try {
            $this->db->beginTransaction();
            $queryIdRelationship = 'SELECT `id` FROM `' . self::PREFIX . 'relationship` WHERE `idTransmitter` = :idTransmitter AND `idReceiver` = :idReceiver AND `acceptRelation` = 1';
            $responseRequestIdRelationship = $this->db->prepare($queryIdRelationship);
            $responseRequestIdRelationship->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
            $responseRequestIdRelationship->bindValue(':idReceiver', $this->idReceiver, PDO::PARAM_INT);
            if ($responseRequestIdRelationship->execute())
            {
                $this->id = intval($responseRequestIdRelationship->fetch(PDO::FETCH_COLUMN, 0));
            }
            //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
            $queryNewMessage = 'INSERT INTO `' . self::PREFIX . 'message` (`idRelationship`, `content`) VALUES (:idRelationship, :content)';
            $responseSendRequest = $this->db->prepare($queryNewMessage);
            $responseSendRequest->bindValue(':idRelationship', $this->id, PDO::PARAM_INT);
            $responseSendRequest->bindValue(':content', $this->content, PDO::PARAM_STR);
            $responseSendRequest->execute();
            $queryReadMessage = 'SELECT `' . self::PREFIX . 'message`.`id`  AS `idMessage`, `' . self::PREFIX . 'message`.`content`,  DATE_FORMAT(`' . self::PREFIX . 'message`.`datetime`, \'%e/%m/%Y\') AS `date`, DATE_FORMAT(`' . self::PREFIX . 'message`.`datetime`, \'%H:%i\') AS `hour`, DATE_FORMAT(CURRENT_DATE(),\'%e/%m/%Y\') AS `today`, `' . self::PREFIX . 'message`.`idRelationship`, `' . self::PREFIX . 'user`.`id`, `' . self::PREFIX . 'user`.`username` '
                    . 'FROM `' . self::PREFIX . 'message` INNER JOIN `' . self::PREFIX . 'relationship` ON `' . self::PREFIX . 'relationship`.`id` = `' . self::PREFIX . 'message`.`idRelationship`'
                    . 'INNER JOIN `' . self::PREFIX . 'user` ON `' . self::PREFIX . 'relationship`.`idTransmitter` = `' . self::PREFIX . 'user`.`id`'
                    . 'WHERE (`' . self::PREFIX . 'relationship`.`idReceiver` = :idTransmitter AND `' . self::PREFIX . 'relationship`.`idTransmitter` = :idReceiver)'
                    . 'OR (`' . self::PREFIX . 'relationship`.`idReceiver` = :idReceiver AND `' . self::PREFIX . 'relationship`.`idTransmitter` = :idTransmitter)'
                    . 'ORDER BY  `' . self::PREFIX . 'message`.`datetime`';
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
        $queryReadMessage = 'SELECT `' . self::PREFIX . 'message`.`id`  AS `idMessage`, `' . self::PREFIX . 'message`.`content`,  DATE_FORMAT(`' . self::PREFIX . 'message`.`datetime`, \'%e/%m/%Y\') AS `date`, DATE_FORMAT(`' . self::PREFIX . 'message`.`datetime`, \'%H:%i\') AS `hour`, DATE_FORMAT(CURRENT_DATE(),\'%e/%m/%Y\') AS `today`, `' . self::PREFIX . 'message`.`idRelationship`, `' . self::PREFIX . 'user`.`id`, `' . self::PREFIX . 'user`.`username` '
                . 'FROM `' . self::PREFIX . 'message` INNER JOIN `' . self::PREFIX . 'relationship` ON `' . self::PREFIX . 'relationship`.`id` = `' . self::PREFIX . 'message`.`idRelationship`'
                . 'INNER JOIN `' . self::PREFIX . 'user` ON `' . self::PREFIX . 'relationship`.`idTransmitter` = `' . self::PREFIX . 'user`.`id`'
                . 'WHERE (`' . self::PREFIX . 'relationship`.`idReceiver` = :idTransmitter AND `' . self::PREFIX . 'relationship`.`idTransmitter` = :idReceiver)'
                . 'OR (`' . self::PREFIX . 'relationship`.`idReceiver` = :idReceiver AND `' . self::PREFIX . 'relationship`.`idTransmitter` = :idTransmitter)'
                . 'ORDER BY  `' . self::PREFIX . 'message`.`datetime`';
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
