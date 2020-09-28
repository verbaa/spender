<?php

class ModelUserPhoto
{

    private $crud;

    function __construct()
    {
        include_once ROOT . "/components/Crud.php";
        $this->crud = new Crud();
    }

    
    public function photoload($login, $fName){

        $updatePhoto = "UPDATE `mr_users` SET `photo`= '{$fName}' WHERE `name` = '{$login}'";
        $preQ = $this->crud->conn->prepare($updatePhoto);
        $preQ->execute();

        $_SESSION['user']['photo'] = $fName;

        // return [$tabCost, $tabExp];

    }


}				