<?php 
class ControllerDellRegExp
{
    function __construct()
    {
        include_once ROOT . "/models/ModelDelRegExp.php";
    }

    public function delReg(){
        if(!empty($_GET['action'])){
            if($_GET['action'] == "delReg"){
                if(!empty($_GET['id'])){
                    $modDelReg = new ModelDelRegExp();
                    $modDelReg->delRegInDb($_GET['id']);
                }
            }
            if($_GET['action'] == "delItem"){
                if(!empty($_GET['id']) && !empty($_GET['login'])){
                    $modDelReg = new ModelDelRegExp();
                    $data2 = $modDelReg->delItem($_GET['id'], $_GET['login']);
                    echo json_encode($data2);
                        return true;
                }
            }
            if($_GET['action'] == "delRegCost"){
                if(!empty($_GET['login']) && !empty($_GET['val']) && !empty($_GET['sum']) && !empty($_GET['month'])){
                    $modDelReg = new ModelDelRegExp();
                    $data = $modDelReg->delRegInCost($_GET['login'], $_GET['val'], $_GET['sum'], $_GET['month']);
                    echo json_encode($data);
                        return true;
                }
            }
        }
    }
}
				

