<?php

/**
 * Gestion des fichiers avec héritage de la class dataBase
 */
class files extends dataBase {
    
    public $id = 0;
    public $idRelationship = 0;
    public $idTransmitter = 0;
    public $idReceiver = 0;
    public $datetime = '01/01/2018 00:00:00';
    public $filesName = '';
    
        public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Cette méthode permet l'insertion d'un nom de fichier dans la table files
     */
    public function newFiles(){
        $resultRequest = false;
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
            $queryNewMessage = 'INSERT INTO ' . FILES . ' (`idRelationship`, `filesName`) VALUES (:idRelationship, :filesName)';
            $responseSendRequest = $this->db->prepare($queryNewMessage);
            $responseSendRequest->bindValue(':idRelationship', $this->idRelationship, PDO::PARAM_INT);
            $responseSendRequest->bindValue(':filesName', $this->filesName, PDO::PARAM_STR);
            $responseSendRequest->execute();
            $this->db->commit();
            //le return doit être positionné après le $this->db->commit() sinon la transaction s'interrompt et un rollBack est effectué
            $resultRequest = true;
        } catch (Exception $ex) {
            //Si une erreur survient, on annule les changements.
            $this->db->rollBack();
        }
        return $resultRequest;
    }

    public function getListFiles(){
        $resultRequest = false;
        $query = 'SELECT `filesname`, `username`, `idTransmitter` FROM ' . FILES . ' INNER JOIN ' . RELATIONSHIP . ' ON ' . RELATIONSHIP . '.`id` = ' . FILES . '.`idRelationship` INNER JOIN `pklds_user` ON `pklds_user`.`id` = ' . RELATIONSHIP . '.`idTransmitter` WHERE ' . RELATIONSHIP . '.`idReceiver` = :idReceiver';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':idReceiver', $this->idReceiver, PDO::PARAM_INT);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetchAll(PDO::FETCH_OBJ);
        }
        return $resultRequest;
    }
    
    public function __destruct()
    {
        
    }
}
