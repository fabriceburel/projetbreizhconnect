<?php

class dataBase {

    //L'attribut $db sera disponible dans ses enfants
    protected $db;
    const PREFIX = 'pklds_';

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=bzhconnect;charset=utf8', 'usr_bzhconnect', 'bzhconnect');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
            
    }

    public function __destruct()
    {
        
    }

}

?>