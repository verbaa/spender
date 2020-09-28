<?php

class ControllerUserExit
{
    function __construct()
    {
        
    }

    public function sessionDestroy(){
        session_destroy();
        header("Location: /view/headPage/view.php");
    }
}