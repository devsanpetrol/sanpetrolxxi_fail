<?php
require_once './suministro.php';
$suministro = new suministro();

$usuario  = $_POST['usuario'];
$password = $_POST['password'];
$tokenid  = $_POST['tokenid'];

$resultado = $suministro->aut_encargado_almacen($usuario, $password, $tokenid);

if($resultado){
    $datos = array(
        'resultado' => "ok"
    );
}
header('Content-Type: application/json');
echo json_encode($datos, JSON_FORCE_OBJECT);