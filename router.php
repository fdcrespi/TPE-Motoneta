<?php

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

include_once 'back/controllers/material.controller.php';
include_once 'back/controllers/boxer.controller.php';
include_once 'back/controllers/request.controller.php';
include_once 'back/controllers/material-boxer.controller.php';

//phpinfo();
if (!empty($_GET['action'])) {
    $iniciar = $_GET['action'];
} else {
    $iniciar = 'home'; // inicio acción por defecto si no envían
}

$params = explode('/', $iniciar);
switch ($params[0]) {
        //lama al controlador para pasarle la accion correspondiente
    case 'home':
        $controller = new MaterialController();
        $controller->showHome();
        break;
    case 'materiales-aceptados':
        $controller = new MaterialController();
        $controller->showMaterials();
        break;
    case 'materiales-aceptados-secretaria':
        $controller = new MaterialController();
        $controller->showMaterialsSecretary();
        break;
    case 'solicitud-ciudadano':
        $controller = new RequestController();
        $controller->addData();
        break;
    case 'listado-pedidos':
        $controller = new RequestController();
        $controller->listRequests();
        break;
    case 'formulario-insertar-material':
        $controller = new MaterialController();
        $controller->showMaterialForm();
        break;
    case 'insertar-material':
        $controller = new MaterialController();
        $controller->insertMaterial();
        break;
    case 'formulario-editar-material':
        $controller = new MaterialController();
        $controller->showMaterialForm($params[1]);
        break;
    case 'editar-material':
        $controller = new MaterialController();
        $controller->updateMaterial($params[1]);
        break;
    case 'eliminar-material':
        $controller = new MaterialController();
        $controller->deleteMaterial($params[1]);
        break;
    case 'registrar-material':
        $controller = new MaterialController();
        $controller->showMaterialsSecretary();
        break;
    case 'material-cartoneros':
        $controller = new MaterialController();
        $controller->registerMaterial();
        break;
    case 'listado-cartoneros':
        $controller = new BoxerController();
        $controller->showBoxers();
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo ('404 Page not found');
        break;
}
