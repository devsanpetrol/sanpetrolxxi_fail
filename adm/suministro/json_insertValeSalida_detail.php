<?php
    require_once './suministro.php'; 
    $suministro = new suministro();
    $data = array();
    
    if(!empty($_POST['folio_vale'])){
        
        $folio_vale   = $_POST['folio_vale'];
        $fecha_salida = $_POST['cantidad_surtida'];
        $id_pedido    = $_POST['id_pedido'];

        $guarda  = $suministro->set_vale_salida_detail($folio_vale, $cantidad_surtida, $id_pedido);
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