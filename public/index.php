<?php

session_start();


require_once '../config/db.php';
require_once '../controllers/UserController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'login';


$controller = new UserController();


switch ($action) {
    case 'login':
        $controller->login();
        break;
    case 'register':
        $controller->register();
        break;
   
    default:
       
        echo "Page not found!";
        break;
}
?>

