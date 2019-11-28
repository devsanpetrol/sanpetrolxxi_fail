<?php
    require_once './suministro.php'; 
    $suministro = new suministro();
    $data = array();
    
    if(!empty($_POST['id_pedido'])){
        $folio_vale        = $_POST['folio_vale'];
        $id_pedido         = $_POST['id_pedido'];
        $cod_articulo      = $_POST['cod_articulo'];
        $cantidad_apartado = $_POST['cantidad_surtir'];
        $update_almacen    = $_POST['update_almacen'];
        
        $set_update_pedido = $suministro->set_update_salida($folio_vale, $id_pedido, $cod_articulo, $cantidad_surtir, $update_almacen);
        if ($set_update_pedido == true){
            $data[] = array("result" => 'exito',"cantidad" => $cantidad);
        }else{
            $data[] = array("result" => 'fallo');
        }
    }else{
            $data[] = array("result" => 'no_dato');
    }
    
    header('Content-Type: application/json');
    echo json_encode($data);