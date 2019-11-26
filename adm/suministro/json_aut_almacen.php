<?php
    require_once './suministro.php';
    $suministro = new suministro();

    $usuario  = $_POST['usuario'];
    $password = $_POST['password'];
    $tokenid  = $_POST['tokenid'];

    $resultado = $suministro->aut_encargado_almacen($usuario, $password, $tokenid);
    $datos = array('resultado' => "no");

    if($resultado){
        $datos = $resultado[0];
    }
    header('Content-Type: application/json');
    echo json_encode($datos, JSON_FORCE_OBJECT);//($datos, JSON_FORCE_OBJECT);