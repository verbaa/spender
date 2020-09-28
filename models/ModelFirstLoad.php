<?php

class ModelFirstLoad
{

    private $crud;

    function __construct()
    {
        include_once ROOT . "/components/Crud.php";
        $this->crud = new Crud();
    }

    
    public function firstLoad($login){

        $loadCost = "SELECT * FROM `all_cost` WHERE `login` = '{$login}'";
        $loadExp = "SELECT * FROM `reg_expenses` WHERE `login`='" . $login . "'";


        $preQ = $this->crud->conn->prepare($loadCost);
        $preQ->execute();

        $tabCost = $preQ->fetchAll();


        $preQ2 = $this->crud->conn->prepare($loadExp);
        $preQ2->execute();

        $tabExp = $preQ2->fetchAll();

        return [$tabCost, $tabExp];

    }


}				