<?php

session_start();

require 'controller/AppController.php';

$app = new AppController();

if(array_key_exists('route',$_GET)):

    $route = $_GET['route'];

    switch($route){

        case 'home':
        case 'services':
        case 'update':
        case 'info':
        case 'reservation':
        case 'register':
        case 'login':
        case 'logout':

        break;
        default :
            $route = 'home';
    }

    $app->$route();

else:
    header('location: index.php?route=home');
    exit;
endif;