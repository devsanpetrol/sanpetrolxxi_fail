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
        'visto_bueno' => $dato[0]['visto_bueno'],
        'fecha_firma_vobo' => $dato[0]['fecha_firma_vobo'],
        
        'nombre_encargado' => $dato[0]['nombre_encargado'],
        'apellido_encargado' => $dato[0]['apellido_encargado'],
        'cargo_encargado' => $dato[0]['cargo_encargado'],
        'nombre_vobo' => $dato[0]['nombre_vobo'],
        'apellido_vobo' => $dato[0]['apellido_vobo'],
        'cargo_vobo' => $dato[0]['cargo_vobo'],
        
        'status_vale' => $dato[0]['status_vale'],
        'observacion' => $dato[0]['observacion']
    );
}else{
    $datos = array(
        'folio_vale' => "",
        'encargado_almacen' => "",
        'fecha_firma_encargado' => "",
        'apellido_encargado' => "",
        'nombre_encargado' => "",
        'cargo_encargado' => "",
        'visto_bueno' => "",
        'fecha_firma_vobo' => "",
        'apellido_vobo' => "",
        'nombre_vobo' => "",
        'cargo_vobo' => "",
        'status_vale' => "",
        'observacion' => ""
    );
}
header('Content-Type: application/json');
echo json_encode($datos, JSON_FORCE_OBJECT);