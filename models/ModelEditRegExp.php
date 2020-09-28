<?php

class ModelEditRegExp
{

    private $crud;

    function __construct()
    {
        include_once ROOT . "/components/Crud.php";
        $this->crud = new Crud();
    }

    
    public function editRegInDb($id, $val, $sum){

        $sqlEdit = "UPDATE `reg_expenses` SET `name`= '{$val}', `sum`= '{$sum}' WHERE `id` = '{$id}'";
        $this->crud->conn->exec($sqlEdit);
    }


}				