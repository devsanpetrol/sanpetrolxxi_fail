<?php
    require_once './suministro.php'; 
    $suministro = new suministro();
    $data = array();
    
    if(!empty($_POST['id_pedido'])){
        $id_pedido = $_POST['id_pedido'];
        $cantidad = $_POST['cantidad'];
        
        $set_update_pedido  = $suministro->set_update_cantidad($id_pedido, $cantidad);
        if ($set_update_pedido == true){
            $data[] = array("result"=>'exito',"cantidad"=>$cantidad);
        }else{
            $data[] = array("result"=>'no guardo');
        }
    }else{
            $data[] = array("result"=>'sin dato');
    }
    
    header('Content-Type: application/json');
    echo json_encode($data);