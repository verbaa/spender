<?php 
class ControllerAddProduct
{
    
    function __construct()
    {
        include_once ROOT . "/models/ModelAddProduct.php";
    }

    public function addProduct(){
        if(!empty($_GET['action'])){
            if($_GET['action'] == "genExp"){
                if(!empty($_GET['name']) && !empty($_GET['product']) && !empty($_GET['sum']) && !empty($_GET['category']) && !empty($_GET['month'])){
                    $modAddProd = new ModelAddProduct();
                    $data = $modAddProd->addProductInDb($_GET['name'], $_GET['product'], $_GET['sum'], $_GET['category'], $_GET['month']);
                    echo json_encode($data);
                    return true;
                }
                return false;
            }
            if($_GET['action'] == "regExp"){
                if(!empty($_GET['name']) && !empty($_GET['product']) && !empty($_GET['sum'])){
                    $modAddProd = new ModelAddProduct();
                    $data = $modAddProd->addGenExpInDb($_GET['name'], $_GET['product'], $_GET['sum']);
                    echo json_encode($data);
                    return true;
                    
                }
            }
            if($_GET['action'] == "addReg"){
                if(!empty($_GET['login']) && !empty($_GET['val']) && !empty($_GET['sum']) && !empty($_GET['month'])){
                    $modAddProd = new ModelAddProduct();
                    $data = $modAddProd->addRegExpInCost($_GET['login'], $_GET['val'], $_GET['sum'], $_GET['month']);
                    echo json_encode($data);
                    return true;
                }
            }
        }
        return false;
    }

}				

