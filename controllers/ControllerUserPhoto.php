<?php

class ControllerUserPhoto
{
    function __construct()
    {
        include_once ROOT. "/models/ModelUserPhoto.php";
    }

    public function loadPhoto(){

        if(!empty($_FILES['photo'])){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if($_FILES['photo']['error'] == 0){
                    $tmpName = $_FILES['photo']['tmp_name'];
                    $newName = "/photoUser/" . mktime() . basename($_FILES['photo']['name']);
                    if(move_uploaded_file($tmpName, ROOT . $newName)){
                        $modelLoadPhoto = new ModelUserPhoto();
                        $loadPhoto = $modelLoadPhoto->photoload($_SESSION['user']['login'], $newName);
                    }
                    include_once ROOT . "/view/userPage/userPage.php";
                }
            }
        }
    }
}