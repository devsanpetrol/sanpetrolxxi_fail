<?php
    require_once './suministro.php'; 
    $suministro = new suministro();
    $data = array();
    
    if(!empty($_POST['folio_vale'])){
        
        $folio_vale = $_POST['folio_vale'];
        $fecha_salida = $_POST['fecha_salida'];
        $encargado_almacen = $_POST['encargado_almacen'];
        $visto_bueno = $_POST['visto_bueno'];
        $recibe_vale = $_POST['recibe_vale'];
        $observacion = $_POST['observacion'];
        
        $guarda  = $suministro->set_vale_salida($folio_vale, $fecha_salida, $encargado_almacen, $visto_bueno, $recibe_vale, $observacion);
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