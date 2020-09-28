<?php
class ModelRegistrant
{

    private $crud;

    function __construct()
    {
        include_once ROOT . "/components/Crud.php";
        $this->crud = new Crud();
    }

    public function checkUnicUser($login, $email)
    {
        $isUnic = true;
        $errorMsg = "";
        $sqlName = "SELECT * FROM `mr_users` WHERE `name`='" . $login . "'";
        $sqlMail = "SELECT * FROM `mr_users` WHERE `mail`='" . $email . "'";

        $preQu = $this->crud->conn->prepare($sqlName);
        $preQu2 = $this->crud->conn->prepare($sqlMail);

        $preQu->execute();
        $preQu2->execute();

        $preQu->setFetchMode(PDO::FETCH_ASSOC);
        $preQu2->setFetchMode(PDO::FETCH_ASSOC);

        $logArr = $preQu->fetchAll();
        $mailArr = $preQu2->fetchAll();

        if(count($logArr) > 0){
            $isUnic = false;
            $errorMsg .= "Такой пользователь уже существует. ";
        }
        if(count($mailArr) > 0){
            $isUnic = false;
            $errorMsg .= "Этот e-mail уже используется. ";
        }

        return [$isUnic, $errorMsg];
    }

    //Подготовка к регистрации. Заполнение заявки
    public function prepareReg($log,$mail, $pass){
        $hpass= password_hash($pass, PASSWORD_BCRYPT);
        //Получить случайную строку
        $r_str = $this->getrandomstr();

        //Формируете запрос
        $sql1 = "INSERT INTO `mr_application` (`login`, `mail`, `hash_pass`,`random_str`) VALUES ('{$log}', '{$mail}', '{$hpass}','{$r_str}') ";
        //Выполняете запрос
        $this->crud->conn->exec($sql1);

        //Сформировать строку URL для регистрации и отдать в контроллер
        $url = "http://" . SITE . '/reg/link?l=' . $r_str;
        return $url;

    }
    private function getrandomstr(){
        $str = "";
        for ($i=0;$i<10;$i++){
            $n = rand(48,122);
            if ($n>47 && $n<57 || $n>64 && $n<91 || $n>96 && $n<123) {
                $str .= chr($n);
            }else{
                $i--;
            }
        }
        return time() . $str;
    }

//   поиск по уникальной ссылке

    public function searchApp($l){
        $sql = "SELECT * FROM `mr_application` WHERE `random_str`= '{$l}' ";
        $preQu = $this->crud->conn->prepare($sql);
        $preQu->execute();
        $preQu->setFetchMode(PDO::FETCH_ASSOC);
        $logArr = $preQu->fetchAll();
        if(count($logArr) == 1){
            return $logArr[0];
        }else{
            return false;
        }
        return false;
    }
    
    //добавляет нового пользователя в БД
    public function addNewUser($l, $n, $p_h, $r_s){
        //Формируете запрос
        $sql1 = "INSERT INTO `mr_users` (`name`, `mail`, `pass`) VALUES ('{$l}', '{$n}', '{$p_h}') ";
        //Выполняете запрос
        $this->crud->conn->exec($sql1);
        //меняю значение поля `is_reg` на 1
        $sql2 = "UPDATE `mr_application` SET `is_reg`= 1 WHERE `random_str` = '{$r_s}'";
        $preQu = $this->crud->conn->prepare($sql2);
        $preQu->execute();
    }
}