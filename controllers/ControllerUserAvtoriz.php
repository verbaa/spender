<?php 
class ControllerUserAvtoriz
{
    
    function __construct()
    {
        include_once ROOT . "/models/ModelUserAvtoriz.php";
    }

    public function actionShowForm($err){
       include_once ROOT. "/view/headPage/view.php";
    }

    public function actionLogin(){
        $error = "";

        if(!empty($_SESSION['user'])){
            include_once ROOT . "/view/userPage/userPage.php";
            return true;
        }else{
            if(!empty($_POST['Login']) && !empty($_POST['Password'])){
                $isCorrectData = true;
                if(!preg_match ("/([a-zA-Z_-]+){3,16}/" , $_POST['Login'])){
                    $isCorrectData = false;
                    $error .= "Некорректный логин \r\n";
                }
                if(!preg_match ("/((?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15})/" , $_POST['Password'])){
                    $isCorrectData = false;
                    $error .= "Некорректный пароль\n";
                }
                if($isCorrectData){
                    $modUserAvtoriz = new ModelUserAvtoriz();
                    $searchUser = $modUserAvtoriz->actionLogin($_POST['Login'], $_POST['Password']);
                    if($searchUser){
                        include_once ROOT . "/view/userPage/userPage.php";
                        return true;
                    }else{
                        $error = "Пользователя с такими данными нет в системе!";
                    }
                }
            }
        }

        $this->actionShowForm($error);
        return false;
    }
}			