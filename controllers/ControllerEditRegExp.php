<?php 
class ControllerEditRegExp
{
    function __construct()
    {
        include_once ROOT . "/models/ModelEditRegExp.php";
    }

    public function editReg(){
        if(!empty($_GET['action'])){
            if($_GET['action'] == "edReg"){
                if(!empty($_GET['id']) && !empty($_GET['val']) && !empty($_GET['sum'])){
                    $modEditReg = new ModelEditRegExp();
                    $modEditReg->editRegInDb($_GET['id'], $_GET['val'], $_GET['sum']);
                }
            }
        }
    }
          
}
				

