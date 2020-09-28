<?php
class ModelUserAvtoriz
{
    private $crud;

    function __construct()
    {
        include_once ROOT . "/components/Crud.php";
        $this->crud = new Crud();
    }

    public function actionLogin($e, $p){
        $sqlName = "SELECT * FROM `mr_users` WHERE `name`='" . $e . "'";

        $preQu = $this->crud->conn->prepare($sqlName);

        $preQu->execute();

        $preQu->setFetchMode(PDO::FETCH_ASSOC);

        $logArr = $preQu->fetchAll();

        if(count($logArr) > 0){
      
            if(password_verify ($p , $logArr[0]['pass'] )){

                $_SESSION['user'] = [
                    'login' => $logArr[0]['name'], 
                    'email' => $logArr[0]['mail'],
                    'photo' => $logArr[0]['photo']
                ];
                return true;
            }
        }
        return false;        
    }

    public function returnTable($user, $date){

        $selectedDate = $date;

        $sqlName2 = "SELECT * FROM `all_cost` WHERE `login`='" . $user . "'" . "AND  `date` LIKE '" . $selectedDate . "-%'";

        $preQu2 = $this->crud->conn->prepare($sqlName2);
        $preQu2->execute();

        $preQu2->setFetchMode(PDO::FETCH_ASSOC);

        $tabArr2 = $preQu2->fetchAll();

        if(count($tabArr2 > 0)){
            return $tabArr2;
        }else{
            return false;
        }
    }
    public function returnExpenses($user2){

        $sqlName3 = "SELECT * FROM `reg_expenses` WHERE `login`='" . $user2 . "'";

        $preQu3 = $this->crud->conn->prepare($sqlName3);
        $preQu3->execute();

        $preQu3->setFetchMode(PDO::FETCH_ASSOC);
        $expArr3 = $preQu3->fetchAll();

        if(count($expArr3 > 0)){
            return $expArr3;
        }else{
            return false;
        }
    }
}			