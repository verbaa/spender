<?php
class ModelDelRegExp
{
    private $crud;
    function __construct()
    {
        include_once ROOT . "/components/Crud.php";
        $this->crud = new Crud();
    }
   
    public function delRegInDb($id){

        $sqlDel =  "DELETE FROM `reg_expenses` WHERE `id`= '{$id}'";
        $this->crud->conn->exec($sqlDel);
    }

    public function delItem($id, $login){

        $sqlDel2 =  "DELETE FROM `all_cost` WHERE `id`= '{$id}'";
        $this->crud->conn->exec($sqlDel2);


        $sql2 = "SELECT * FROM `all_cost` WHERE `login` = '{$login}'";


        $stmt2 = $this->crud->conn->prepare($sql2); 

        $stmt2->execute();
    
        $result2 = $stmt2->fetchAll(); 

        return [$result2, true];
    }

    public function delRegInCost($log, $val, $sum, $month){

        $sqlDel =  "DELETE FROM `all_cost` WHERE `login`= '{$log}' AND `cost`= '{$val}' AND `category` = 'Регулярные платежи' AND `sum`= '{$sum}' AND `date` LIKE '2019-{$month}-%'";
        $this->crud->conn->exec($sqlDel);


        $sql = "SELECT * FROM `all_cost` WHERE `login` = '{$log}'";


        $stmt = $this->crud->conn->prepare($sql); 

        $stmt->execute();
    
        $result = $stmt->fetchAll(); 

        return [$result, true];
    }
}				