<?php

/**
 * Gestion de l'activité des utilisateurs avec héritage de la class dataBase
 */
class log extends dataBase {

    public $idUser = 0;
    public $lastAction = '01/01/2018 00:00:00';
    public $connect = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function createLog()
    {
        $query = 'INSERT INTO ' . LOG . ' (`idUSer`, `connect`) VALUES (:idUser, :connect)';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $responseRequest->bindValue(':connect', $this->connect, PDO::PARAM_BOOL);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $responseRequest->execute();
    }

    public function updateAction()
    {
        $query = 'UPDATE ' . LOG . ' SET `lastAction` = :lastAction WHERE `idUser` = :idUser';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $responseRequest->bindValue(':lastAction', $this->lastAction, PDO::PARAM_STR);
        //Si l'upddate s'est correctement déroulée on retourne vrai
        return $responseRequest->execute();
    }

    public function updateLog()
    {
        $query = 'UPDATE ' . LOG . ' SET `lastAction` = :lastAction, `connect` = :connect WHERE `idUser` = :idUser';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $responseRequest->bindValue(':lastAction', $this->lastAction, PDO::PARAM_STR);
        $responseRequest->bindValue(':connect', $this->connect, PDO::PARAM_BOOL);
        //Si l'update s'est correctement déroulée on retourne vrai
        return $responseRequest->execute();
    }

    public function __destruct()
    {

    }

}
