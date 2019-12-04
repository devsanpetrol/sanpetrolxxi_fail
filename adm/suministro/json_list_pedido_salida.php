<?php
    require_once './suministro.php'; 
    
    $folio = $_POST['folio'];
    $suministro = new suministro();
    $pedidos = $suministro->get_partida_detail($folio);
    $data = array();
    
    foreach ($pedidos as $valor){
        $id_valesalida_pedido = $valor["id_valesalida_pedido"];
        $data[] = array("id_valesalida_pedido" => $id_valesalida_pedido,
                        "cantidad_surtir" => cantidad_surtir($valor["cantidad_surtida"]),
                        "unidad" => unidad($valor["unidad"]),
                        "articulo" => articulo($valor["articulo"]),
                        "destino" => destino($valor["destino"]),
                        "autorizacion" => autorizacion($id_valesalida_pedido),
                        "justificacion" => justificacion($valor["justificacion"]));
    }
    function cantidad_surtir($cantidad_surtir){
        return "<h5 class='mb-0 font-size-sm font-weight-bold text-danger-800'>$cantidad_surtir</h5>";
    }
    function unidad($unidad){
        return "<h6 class='mb-0 font-size-sm font-weight-bold text-slate-700'>$unidad</h6>";
    }
    function destino($destino){
        return "<h6 class='mb-0 font-size-sm font-weight-bold text-slate-700'>$destino</h6>";
    }
    function articulo($articulo){
        return "<h6 class='mb-0 font-size-sm font-weight-bold text-blue-800'>$articulo</h6>";
    }
    function justificacion($justificacion){
        return "<h6 class='mb-0 font-size-sm text-slate-700'>$justificacion</h6>";
    }
    function autorizacion($id_valesalida_pedido){
        return "<div class='custom-control custom-control-right custom-checkbox custom-control-inline'>
                    <input type='checkbox' class='custom-control-input' id='$id_valesalida_pedido'>
                    <label class='custom-control-label position-static' for='$id_valesalida_pedido'></label>
                </div>";
    }
    header('Content-Type: application/json');
    echo json_encode($data);