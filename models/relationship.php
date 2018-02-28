<?php

class relationship extends dataBase {

    public $id = 0;
    public $acceptRelation = 0;
    public $idTransmitter = 0;
    public $idReceiver = 0;
    public $block = 1;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Etabli la relation entre celui qui demande l'ajout d'ami et celui qui reçoit cette demande
     */
    public function addFriend()
    {
        $query = 'INSERT INTO `' . self::PREFIX . 'relationship` (`idTransmitter`, `idReceiver`) VALUES (:idTransmitter, :idReceiver)';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
        $responseRequest->bindValue(':idReceiver', $this->idReceiver, PDO::PARAM_INT);
        $resultRequest = $responseRequest->execute();
        return $resultRequest;
    }

    /**
     *  Etabli la relation en double sens entre emetteur et récepteur suite à la demande d'ajout d'ami
     */
    public function acceptFriend()
    {
        try {
            //On démarre la transaction, toujours mettre la table enfant avant la table parente pour éviter les soucis de suppression.
            $this->db->beginTransaction();
            $queryAddFriend = 'INSERT INTO `' . self::PREFIX . 'relationship`(`idTransmitter`, `idReceiver`, `acceptRelation`) VALUES (:idTransmitter, :idReceiver, :acceptRelation)';
            $responseRequestAddFriend = $this->db->prepare($queryAddFriend);
            $responseRequestAddFriend->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
            $responseRequestAddFriend->bindValue(':idReceiver', $this->idReceiver, PDO::PARAM_INT);
            $responseRequestAddFriend->bindValue(':acceptRelation', $this->acceptRelation, PDO::PARAM_BOOL);
            $responseRequestAddFriend->execute();
            $queryUpdateFriend = 'UPDATE `' . self::PREFIX . 'relationship` SET `acceptRelation` = :acceptRelation WHERE `idTransmitter` = :idReceiver AND `idReceiver`= :idTransmitter';
            $responseRequestUpdateFriend = $this->db->prepare($queryUpdateFriend);
            $responseRequestUpdateFriend->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
            $responseRequestUpdateFriend->bindValue(':idReceiver', $this->idReceiver, PDO::PARAM_INT);
            $responseRequestUpdateFriend->bindValue(':acceptRelation', $this->acceptRelation, PDO::PARAM_BOOL);
            $responseRequestUpdateFriend->execute();
            //On valide la transaction.
            $this->db->commit();
        } catch (Exception $ex) {
            //Si une erreur survient, on annule les changements.
            $this->db->rollBack();
        }
    }

    /**
     * Permet de récupérer dans un tableau la liste des personnes à qui on a envoyé une demande d'ami et dont on attend la réponse
     */
    public function listFriendAskSend()
    {
        $resultRequest = array();
        $query = 'SELECT `idReceiver` FROM `' . self::PREFIX . 'relationship` WHERE `idTransmitter` = :idTransmitter AND `acceptRelation` = 0 AND `block` = 1';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetchAll(PDO::FETCH_COLUMN, 0);
        }
        return $resultRequest;
    }

    /**
     * Permet de récupérer dans un tableau la liste des personnes qui sont deja dans notre liste d'amis
     */
    public function listFriend()
    {
        $resultRequest = array();
        $query = 'SELECT `idReceiver` FROM `' . self::PREFIX . 'relationship` WHERE `idTransmitter` = :idTransmitter AND `acceptRelation` = 1 AND `block` = 1';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetchAll(PDO::FETCH_COLUMN, 0);
        }
        return $resultRequest;
    }

    /**
     * Permet de récupérer dans un tableau la liste des personnes bloqué par l'utilisateur
     */
    public function listBlockFriend()
    {
        $resultRequest = array();
        $query = 'SELECT `idTransmitter` FROM `' . self::PREFIX . 'relationship` WHERE `idReceiver` = :idReceiver AND `acceptRelation` = 1 AND `block` = 0';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':idReceiver', $this->idTransmitter, PDO::PARAM_INT);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetchAll(PDO::FETCH_COLUMN, 0);
        }
        return $resultRequest;
    }

    /**
     * Permet de récupérer dans un tableau la liste des personnes qui on bloqué l'utilisateur
     */
    public function listFriendBlock()
    {
        $resultRequest = array();
        $query = 'SELECT `idReceiver` FROM `' . self::PREFIX . 'relationship` WHERE `idTransmitter` = :idTransmitter AND `acceptRelation` = 1 AND `block` = 0';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
        if ($responseRequest->execute())
        {
            $resultRequest = $responseRequest->fetchAll(PDO::FETCH_COLUMN, 0);
        }
        return $resultRequest;
    }

    /**
     * La méthode blockFriend() permet de bloquer un utilisateur qui a demandé l'ajout en ami
     */
    public function blockFriend()
    {
        $queryUpdateFriend = 'UPDATE `' . self::PREFIX . 'relationship` SET `acceptRelation` = 1, `block` = 0 WHERE `idTransmitter` = :idTransmitter AND `idReceiver`= :idReceiver';
        $responseRequestUpdateFriend = $this->db->prepare($queryUpdateFriend);
        $responseRequestUpdateFriend->bindValue(':idReceiver', $this->idTransmitter, PDO::PARAM_INT);
        $responseRequestUpdateFriend->bindValue(':idTransmitter', $this->idReceiver, PDO::PARAM_INT);
        return $responseRequestUpdateFriend->execute();
    }

    /**
     * Permet de débloquer une personne pour pouvoir à nouveau échanger avec
     */
    public function releaseFriend()
    {
        try {
            $this->db->beginTransaction();
            $queryAddFriend = 'INSERT INTO `' . self::PREFIX . 'relationship`(`idTransmitter`, `idReceiver`, `acceptRelation`) VALUES (:idTransmitter, :idReceiver, 1)';
            $responseRequestAddFriend = $this->db->prepare($queryAddFriend);
            $responseRequestAddFriend->bindValue(':idTransmitter', $this->idTransmitter, PDO::PARAM_INT);
            $responseRequestAddFriend->bindValue(':idReceiver', $this->idReceiver, PDO::PARAM_INT);
            $responseRequestAddFriend->execute();
            $queryUpdateFriend = 'UPDATE `' . self::PREFIX . 'relationship` SET `block` = 1 WHERE `idTransmitter` = :idTransmitter AND `idReceiver`= :idReceiver';
            $responseRequestUpdateFriend = $this->db->prepare($queryUpdateFriend);
            $responseRequestUpdateFriend->bindValue(':idReceiver', $this->idTransmitter, PDO::PARAM_INT);
            $responseRequestUpdateFriend->bindValue(':idTransmitter', $this->idReceiver, PDO::PARAM_INT);
            $responseRequestUpdateFriend->execute();
            //On valide la transaction.
            $this->db->commit();
        } catch (Exception $ex) {
            //Si une erreur survient, on annule les changements.
            $this->db->rollBack();
        }
    }

    /*
     * Refuser une demande d'ajout en ami
     */

    public function denyFriend()
    {
        $queryUpdateFriend = 'DELETE FROM `' . self::PREFIX . 'relationship` WHERE `idTransmitter` = :idTransmitter AND `idReceiver`= :idReceiver';
        $responseRequestUpdateFriend = $this->db->prepare($queryUpdateFriend);
        $responseRequestUpdateFriend->bindValue(':idReceiver', $this->idTransmitter, PDO::PARAM_INT);
        $responseRequestUpdateFriend->bindValue(':idTransmitter', $this->idReceiver, PDO::PARAM_INT);
        return $responseRequestUpdateFriend->execute();
    }

    /**
     * Cette méthode permet par une transaction, dans un premier temps de récupérer l'id de la relation entre l'emetteur et le récepteur du message
     * De sauvegardé le message dans la bdd
     * Et finalement récupérer les messages qui existe entre les 2 utilisateurs
     */
    public function newMessage()
    {
        try {
            $this->db->beginTransaction();
            $queryIdRelationship = 'SELECT `id` FROM `' . self::PREFIX . 'relationship` WHERE `idTransmitter` = :idTransmitter AND `idReceiver` = :idReceiver';
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
            $queryReadMessage = 'SELECT `' . self::PREFIX . 'message`.`content`,  DATE_FORMAT(`' . self::PREFIX . 'message`.`datetime`, \'%e/%m/%Y\') AS `date`, DATE_FORMAT(`' . self::PREFIX . 'message`.`datetime`, \'%H:%i\') AS `hour`, DATE_FORMAT(CURRENT_DATE(),\'%e/%m/%Y\') AS `today`, `' . self::PREFIX . 'message`.`idRelationship`, `' . self::PREFIX . 'user`.`id`, `' . self::PREFIX . 'user`.`username` '
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
    public function readMessage(){
            $queryReadMessage = 'SELECT `' . self::PREFIX . 'message`.`content`,  DATE_FORMAT(`' . self::PREFIX . 'message`.`datetime`, \'%e/%m/%Y\') AS `date`, DATE_FORMAT(`' . self::PREFIX . 'message`.`datetime`, \'%H:%i\') AS `hour`, DATE_FORMAT(CURRENT_DATE(),\'%e/%m/%Y\') AS `today`, `' . self::PREFIX . 'message`.`idRelationship`, `' . self::PREFIX . 'user`.`id`, `' . self::PREFIX . 'user`.`username` '
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
