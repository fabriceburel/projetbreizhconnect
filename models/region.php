<?php
/**
 * Gestion des pays avec héritage de la class dataBase
 */
class region extends dataBase {

    public $id = 0;
    public $region = '';

    public function __construct()
    {
        parent::__construct();
    }
    public function getListRegion()
    {
        $query = 'SELECT `id`, `region` FROM ' . REGION;
        $listRegion = $this->db->query($query);
        $regions = $listRegion->fetchAll(PDO::FETCH_OBJ);
        return $regions;
    }
    public function __destruct()
    {
        
    }

}
