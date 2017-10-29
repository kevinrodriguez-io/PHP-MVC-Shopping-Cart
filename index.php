<?php
include_once('./security/security.class.php');
include_once('./model/user.class.php');
include_once('./database/database.class.php');
include_once('./controller/base.controller.php');

$controller = 'home';

function renderDefault ($controller) {
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();  
}

function renderController ($controller) {
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';
    // Instanciamos el controlador
    require_once "controller/$controller.controller.php";
    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}

if (!Security::UserIsLoggedIn()) {
    if (isset($_REQUEST['c']) && strtolower($_REQUEST['c']) === 'authentication') {
        renderController($controller);
    } else {
        renderDefault('authentication');
    }
} else {
    if(!isset($_REQUEST['c'])) {
        renderDefault($controller);
    } else {
        renderController($controller);
    }
}
?>