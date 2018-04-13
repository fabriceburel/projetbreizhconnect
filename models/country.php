<?php

/**
 * Gestion des pays avec héritage de la class dataBase
 */
class country extends dataBase {

    public $id = 0;
    public $country = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function getListCountry()
    {
        $query = 'SELECT `id`, `country` FROM ' . COUNTRY . '';
        $listCountry = $this->db->query($query);
        $countries = $listCountry->fetchAll(PDO::FETCH_OBJ);
        return $countries;
    }

    public function __destruct()
    {
        
    }

}
