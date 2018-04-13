<?php
define('PREFIX', 'pklds_');
define('USER', '`' . PREFIX . 'user`');
define('COUNTRY', '`' . PREFIX . 'country`');
define('REGION', '`' . PREFIX . 'region`');
define('RELATIONSHIP', '`' . PREFIX . 'relationship`');
define('LOG', '`' . PREFIX . 'log`');
define('MESSAGE', '`' . PREFIX . 'message`');
define('FILES', '`' . PREFIX . 'files`');

/**
 * Connexion à la base de donnée
 */
class dataBase {

    //L'attribut $db sera disponible dans ses enfants
    protected $db;
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=bzhconnect;charset=utf8', 'usr_bzhconnect', 'bzhconnect');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (Exception $e) {
             //si il y a une erreur, on attrape l'exception dans $e et on affiche un message d'erreur   
            die('Erreur : ' . $e->getMessage());
        }
            
    }

    public function __destruct()
    {
        
    }

}