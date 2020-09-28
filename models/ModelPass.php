<?php

class ModelPass
{

    private $crud;

    function __construct()
    {
        include_once ROOT . "/components/Crud.php";
        $this->crud = new Crud();
    }

    public function checkUser($email)
    {
        $isCheck = true;
        $errorMsg = "";

        $sqlMail = "SELECT * FROM `mr_users` WHERE `mail`='" . $email . "'";

        $preQu2 = $this->crud->conn->prepare($sqlMail);

        $preQu2->execute();

        $preQu2->setFetchMode(PDO::FETCH_ASSOC);

        $mailArr = $preQu2->fetchAll();

        if(count($mailArr) == 0){
            $isCheck = false;
            $errorMsg = "Такого пользователя не существует.";
        }


        return [$isCheck, $errorMsg];
    }

    public function editPass($email, $pass)
    {

        $hpass= password_hash($pass, PASSWORD_BCRYPT);

        $sql2 = "UPDATE `mr_users` SET `pass`= '{$hpass}' WHERE `mail` = '{$email}'";

        $this->crud->conn->exec($sql2);

    }

    public function chengePass($user, $old,  $new)
    {
        $hNewPass= password_hash($new, PASSWORD_BCRYPT);
        $msgErr = "";

        $sql = "SELECT * FROM `mr_users` WHERE `name`='" . $user . "'";

        $preQu2 = $this->crud->conn->prepare($sql);

        $preQu2->execute();

        $preQu2->setFetchMode(PDO::FETCH_ASSOC);

        $usArr = $preQu2->fetchAll();

        if(password_verify ($old , $usArr[0]['pass'] )){
            $sql3 = "UPDATE `mr_users` SET `pass`= '{$hNewPass}' WHERE `name` = '{$user}'";


            $this->crud->conn->exec($sql3);

            $usArr[0]['name'] = "Пароль успешно изменен!";

            return $usArr;
        }else{
            $usArr[0]['name'] = "Вы ввели не верный пароль от аккаунта!";

            return $usArr;
        }
    }



}
