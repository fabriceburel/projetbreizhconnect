<?php

class message extends dataBase {

    public $id = 0;
    public $idRelationship = 0;
    public $datetime = 01/01/2018;
    public $content = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function newMessage()
    {
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO `' . self::PREFIX . 'message` (`idRelationship`, `content`) VALUES (:idRelationship, :content)';
        $responseRequest = $this->db->prepare($query);
        $responseRequest->bindValue(':idRelationship', $this->idRelationship, PDO::PARAM_INT);
        $responseRequest->bindValue(':content', $this->content, PDO::PARAM_STR);
        $resultRequest = $responseRequest->execute();
        return $resultRequest;
    }

    public function __destruct()
    {
        
    }

}
