<?php
    require_once './suministro.php'; 
    $suministro = new suministro();
    $data = array();
    
    if(!empty($_POST['folio_vale'])){
        
        $folio_vale = $_POST['folio_vale'];
        $encargado_almacen = $_POST['encargado_almacen'];
        $observacion = $_POST['observacion'];
        
        $guarda  = $suministro -> set_vale_salida($folio_vale, $encargado_almacen, $observacion);
        if ($guarda == true){
            $data[] = array("result"=>'exito');
        }else{
            $data[] = array("result"=>'falla_guardado');
        }
    }else{
            $data[] = array("result"=>'falla_recepcion_dato');
    }
    
    header('Content-Type: application/json');
    echo json_encode($data);