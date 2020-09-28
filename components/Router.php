<?php
class Router
{
    
    private $routes;

    public function __construct()
    {
        $this->routes = include_once(ROOT . '/config/routes.php');
    }

    private function getUri()
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function go()
    {
        $uri = $this->getUri();
        $isBadAdress = true;

        foreach( $this->routes as $map => $classMethod)
        {
            if(preg_match("~^$map~", $uri) == 1)
            {
                $isBadAdress = false;
                include_once(ROOT . "/controllers/$classMethod[0].php");
                $controllerObject = new $classMethod[0]();
                $controllerObject->$classMethod[1]($uri);
            }
        }

        if($isBadAdress)
        {
            if(!empty($_SESSION['user']))
            {
                include_once ROOT . "/view/userPage/userPage.php";
                return true;
            }
            else
            {
                include_once(ROOT . '/view/headPage/view.php');
            }
        }
    }
}