<?php

class country extends dataBase {

    public $id = 0;
    public $country = '';

    public function __construct()
    {
        parent::__construct();
    }
    public function getListCountry()
    {
        $query = 'SELECT `id`, `country` FROM `' . self::PREFIX .  'country`';
        $listCountry = $this->db->query($query);
        $countries = $listCountry->fetchAll(PDO::FETCH_OBJ);
        return $countries;
    }
    public function __destruct()
    {
        
    }

}