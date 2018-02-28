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
   

    public function __destruct()
    {
        
    }

}
