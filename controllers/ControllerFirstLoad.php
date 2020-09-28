<?php 
class ControllerFirstLoad
{   
    function __construct()
    {
        include_once ROOT . "/models/ModelFirstLoad.php";
    }

    public function loaded(){
        if(!empty($_GET['action'])){
            if($_GET['action'] == "load"){
                if(!empty($_GET['login'])){
                    $modload = new ModelFirstLoad();
                    $load = $modload->firstLoad($_GET['login']);
                    echo json_encode($load);
                }
            }
        }
    }
          
}
				

