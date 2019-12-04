<?php
require_once './suministro.php';
$suministro = new suministro();

if(!empty($_POST['folio_vale'])){
    $folio_vale = $_POST['folio_vale'];
    $dato = $suministro->get_solicitud_aprobacion_detalle($folio_vale);
    $datos = array(
        'folio_vale' => $dato[0]['folio_vale'],
        'encargado_almacen' => $dato[0]['encargado_almacen'],
        'fecha_firma_encargado' => $dato[0]['fecha_firma_encargado'],
        'observacion' => $dato[0]['observacion'],
        'apellido_encargado' => $dato[0]['apellido_encargado'],
        'cargo_encargado' => $dato[0]['cargo_encargado'],
        'nombre_encargado' => $dato[0]['nombre_encargado']
    );
}else{
    $datos = array(
        'folio_vale' => "",
        'encargado_almacen' => "",
        'fecha_firma_encargado' => "",
        'observacion' => "",
        'apellido_encargado' => "",
        'cargo_encargado' => "",
        'nombre_encargado' => ""
    );
}
header('Content-Type: application/json');
echo json_encode($datos, JSON_FORCE_OBJECT);