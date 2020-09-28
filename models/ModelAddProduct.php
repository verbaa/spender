<?php

class ModelAddProduct
{

    private $crud;
    private $d;

    function __construct()
    {
        include_once ROOT . "/components/Crud.php";
        $this->crud = new Crud();
    }

    
    public function addProductInDb($name, $cost, $sum, $category, $month){

        if($month == date("m")){
            $this->d = date("Y-m-d");
        }else{
            $this->d = "2019-" . $month . "-01";
        }

        $sqlName4 =  "INSERT INTO `all_cost`(`login`, `date`, `cost`, `category`, `sum`) VALUES ('" . $name . "', '" . $this->d . "', '" . $cost . "', '" . $category . "', " . $sum . ")";
        $this->crud->conn->exec($sqlName4);

        //запрос к бд(select)
        //фетчите ответ в массив

        $sql = "SELECT * FROM `all_cost` WHERE `login` = '{$name}'";


        $stmt = $this->crud->conn->prepare($sql); 

        $stmt->execute();
    
        $result = $stmt->fetchAll(); 

        return [$result, true];
    }

    public function addGenExpInDb($name2, $cost2, $sum2){

        $sqlName5 =  "INSERT INTO `reg_expenses`(`login`, `name`, `sum`) VALUES ('" . $name2 . "', '"  . $cost2 . "', '" . $sum2 . "')";
        $this->crud->conn->exec($sqlName5);


        $sql2 = "SELECT * FROM `reg_expenses` WHERE `login` = '{$name2}'";

        $stmt2 = $this->crud->conn->prepare($sql2); 

        $stmt2->execute();
    
        $result2 = $stmt2->fetchAll(); 

        return $result2;


    }

    public function addRegExpInCost($log, $val, $sum, $month){

        if($month == date("m")){
            $this->d = date("Y-m-d");
        }else{
            $this->d = "2019-" . $month . "-01";
        }

        $sqlCheck = "INSERT INTO `all_cost`(`login`, `date`, `cost`, `category`, `sum`) VALUES ('" . $log . "', '" . $this->d . "', '" . $val . "', 'Регулярные платежи', " . $sum . ")";
        $this->crud->conn->exec($sqlCheck);

        //запрос к бд(select)
        //фетчите ответ в массив

        $sql = "SELECT * FROM `all_cost` WHERE `login` = '{$log}'";


        $stmt = $this->crud->conn->prepare($sql); 


        $stmt->execute();

    
        $result = $stmt->fetchAll(); 


        return [$result, true];

    }

}				