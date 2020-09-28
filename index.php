<?php
session_start(); 

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

define('SITE', 'nusa.zzz.com.ua');

include_once ROOT . "/components/Router.php";

$r = new Router();

$r->go();

