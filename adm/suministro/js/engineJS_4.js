$(document).ready( function () {
    
    $('#lay_out_solicitudesx').DataTable({
        paging: false,
        searching: false,
        ordering: false,
        bDestroy: true,
        bInfo: false,
        processing: true,
        selected: true,
        serverSide: true,
        serverMethod: 'post',
        ajax: {
            url: "json_selectSolicitudBandeja_paraVobo.php",
            dataSrc:function ( json ) {
                return json;
            }
        },
        createdRow: function ( row, data, index ) {
            $("#total_pedidos_mostrado").text(index+1);
            $(row).attr('id',data['folio']);
            $(row).addClass('unread');
            $(row).data('scroll');
            $('td', row).eq(0).addClass('table-inbox-name');
            $('td', row).eq(1).addClass('table-inbox-message');
            $('td', row).eq(2).addClass('table-inbox-time');
        },
        columns: [
            {data : 'star'},
            {data : 'pedidos'},
            {data : 'fecha'}
        ],
        language: {
            zeroRecords: "Ningun elemento seleccionado"
        }
    });
    $('#lay_out_solicitudesx_aprobados').DataTable({
        paging: false,
        searching: false,
        ordering: false,
        bDestroy: true,
        bInfo: false,
        processing: true,
        selected: true,
        serverSide: true,
        serverMethod: 'post',
        ajax: {
            url: "json_selectSolicitudBandeja_aprobado_detail.php",
            dataSrc:function ( json ) {
                return json;
            }
        },
        createdRow: function ( row, data, index ) {
            $("#total_pedidos_mostrado").text(index+1);
            $(row).attr('id',data['folio']);
            $(row).addClass('unread');
            $(row).data('scroll');
            $('td', row).eq(0).addClass('table-inbox-name');
            $('td', row).eq(1).addClass('table-inbox-message');
            $('td', row).eq(2).addClass('table-inbox-time');
        },
        columns: [
            {data : 'star'},
            {data : 'pedidos'},
            {data : 'fecha'}
        ],
        language: {
            zeroRecords: "Ningun elemento seleccionado"
        }
    });
    //--------TIEMPO REAL ---------
    
    //--------TIEMPO REAL ---------
    $('#lay_out_solicitudesx tbody').on('click', 'tr', function () {
        var id = this.id;
        
        $("#lay_out_solicitudesx tbody tr").addClass("ocultatodo");
        $("#"+id).removeClass("ocultatodo");
        if ($("#"+id).hasClass('sel-item')){
            $("#"+id).removeClass("sel-item");
            $("#lay_out_solicitudesx").slideDown();
            $('html, body').animate({
                scrollTop: $("#content_table_pedidos_list").data("scroll")
            }, 200);
            var t = $('#lay_out_solicitudesx').DataTable();
            t.draw( false );
            $(".display-pedidos").remove();
        }else{
            $("#lay_out_solicitudesx").slideUp();
            
            $("#content_table_pedidos_list").data("scroll",$("html").scrollTop());
            $("#"+id).addClass("sel-item");
            setTimeout(function() {
                setPedidos(id);
            }, 500);
        }
        $("#tools_menu_select").toggle("fast");
        $("#tools_menu_regresa").data("idrow",id);
        $(".ocultatodo").toggle("fast");
        $(".ocultatodo").removeClass("ocultatodo");
        
        return false;
    } );
    $('#lay_out_solicitudesx_aprobados tbody').on('click', 'tr', function () {
        var id = this.id;
        
        $("#lay_out_solicitudesx tbody tr").addClass("ocultatodo");
        $("#"+id).removeClass("ocultatodo");
        if ($("#"+id).hasClass('sel-item')){
            $("#"+id).removeClass("sel-item");
            $("#lay_out_solicitudesx").slideDown();
            $('html, body').animate({
                scrollTop: $("#content_table_pedidos_list").data("scroll")
            }, 200);
            var t = $('#lay_out_solicitudesx').DataTable();
            t.draw( false );
            $(".display-pedidos").remove();
        }else{
            $("#lay_out_solicitudesx").slideUp();
            
            $("#content_table_pedidos_list").data("scroll",$("html").scrollTop());
            $("#"+id).addClass("sel-item");
            setTimeout(function() {
                setPedidos(id);
            }, 500);
        }
        $("#tools_menu_select").toggle("fast");
        $("#tools_menu_regresa").data("idrow",id);
        $(".ocultatodo").toggle("fast");
        $(".ocultatodo").removeClass("ocultatodo");
        
        return false;
    } );
} );
function set_list_resp(id_empleado,nombre,apellidos){
    var apellidos_ = apellidos.replace(/ /g, "");
    $('.'+apellidos_+id_empleado).remove();
    $('#flex ul').append(
        $('<li>').addClass(apellidos_+id_empleado).append("<button type='button' class='btn btn-success btn-sm' ><i class='fa fa-user'></i> "+nombre+" "+apellidos+" <i class='fa fa-check-circle-o'></i></button>")
    );
}
function generador_layout(){
    setTimeout(function() {
        var t = $('#lay_out_solicitudesx').DataTable();
        t.draw( false );
    }, 500);
    $(".display-pedidos").remove();
}
function regresar_lista(){
    var idrow = $("#tools_menu_regresa").data("idrow");
    $("#"+idrow+"").click();
}
function disable_class_btn(id_pedido,disabled){
    $("#status_icon_a_"+id_pedido).prop( "disabled", disabled );
    $("#status_icon_d_"+id_pedido).prop( "disabled", disabled );
}
function reset_class_btn(id_pedido){
    $("#status_icon_a_"+id_pedido).attr("class","btn btn-outline rounded-round btn-icon ml-2 bg-primary text-slate-300 btn-sm");
    $("#status_icon_d_"+id_pedido).attr("class","btn btn-outline rounded-round btn-icon ml-2 bg-primary text-slate-300 btn-sm");
}
function change_status_manager(id_pedido,aprobado){
    var status = parseInt(aprobado);    
    var sel_st = $(".menu_items_status_"+id_pedido);
    
    sel_st.addClass('disabled');
    reset_class_btn(id_pedido);
    
    switch (status){
        case 1://status APROBADO
            var aprobe = $("#status_icon_a_"+id_pedido);
            aprobe.removeClass("text-slate-300").addClass("text-pink");
             sel_st.removeClass('disabled');
          break;
        case 2:// status CANCELADO
            var cancel = $("#status_icon_d_"+id_pedido);
            cancel.removeClass("text-slate-300").addClass("text-pink");
          break;
    }
}
function save_aprobado(id_pedido){
    var btn_guarda_a = $("#status_icon_a_"+id_pedido);
    if (btn_guarda_a.hasClass("text-slate-300")){
        generic_guarda_status(id_pedido,1);
    }else{
        generic_guarda_status(id_pedido,0);
    }
}
function save_cancela(id_pedido){
    var btn_guarda_c = $("#status_icon_d_"+id_pedido);
    if (btn_guarda_c.hasClass("text-slate-300")){
        generic_guarda_status(id_pedido,2);
    }else{
        generic_guarda_status(id_pedido,0);
    }
}
function obj_pedido(objeto){
    var detalle = "style='display: none;'";
    if(objeto.detalle_articulo.length){
        detalle = "";
    }
   
    this.elemento = "<div class='col-lg-12 display-pedidos' style='display: none;' id='folio-"+objeto.folio+"'>\
                        <div class='card border-left-3 border-left-danger rounded-left-0' id='border_card_"+objeto.id_pedido+"'>\
                            <div class='card-body'>\
                                <div class='d-sm-flex align-item-sm-center flex-sm-nowrap'>\
                                    <div>\
                                        <h6 class='font-weight-semibold'>"+objeto.articulo+"</h6>\
                                        <ul class='list list-unstyled mb-0'>\
                                            <li "+detalle+">Detalle articulo : <span class='font-weight-semibold'>"+objeto.detalle_articulo+"</span></li>\
                                            <li>Justificación : <span class='font-weight-semibold'>"+objeto.justificacion+"</span></li>\
                                            <li>Categoria: <span class='font-weight-semibold'>"+objeto.categoria+"</span></li>\
                                        </ul>\
                                    </div>\
                                    <div class='text-sm-right mb-0 mt-3 mt-sm-0 ml-auto'>\
                                        <h6 class='font-weight-semibold' id='cantidad_unidad_edit"+objeto.id_pedido+"' data-unidad='"+objeto.unidad+"'>"+objeto.cantidad+" "+objeto.unidad+" \
                                            <input type='number' class='font-weight-semibold text-blue-800' step='1' value='"+objeto.cantidad+"' min='0' id='cantidad_"+objeto.id_pedido+"' required='true' style='width: 75px; display: none;'>\
                                            <button type='button' class='btn btn-icon btn-sm' id='edita_cantidad"+objeto.id_pedido+"' onclick='edita_cantidad("+objeto.id_pedido+")'><i class='icon-pencil7'></i></button>\
                                            <button type='button' class='btn btn-icon btn-sm' id='guarda_cantidad"+objeto.id_pedido+"' onclick='save_cantidad("+objeto.id_pedido+")' style='display: none;'><i class='icon-floppy-disk'></i></button>\
                                        </h6>\
                                        <ul class='list list-unstyled mb-0'>\
                                            <li>Area/Equipo: <span class='font-weight-semibold'>"+objeto.destino+"</span></li>\
                                            <li>Programado para: <span class='font-weight-semibold'>"+objeto.fecha_requerimiento+"</span></li>\
                                        </ul>\
                                    </div>\
                                </div>\
                            </div>\
                            <div class='card-footer d-sm-flex justify-content-sm-between align-items-sm-center'>\
                                <span>\
                                    <span class='badge badge-mark border-danger mr-2'></span>\
                                    <span class='font-weight-semibold'>"+objeto.fecha_solicitud+"</span>\
                                </span>\
                                <ul class='list-inline list-inline-condensed mb-0 mt-2 mt-sm-0'>\
                                    <li class='list-inline-item' style='display: none;'>\
                                        <a href='' class='text-default' data-status='0' data-comentario='' onclick='guarda_status("+objeto.id_pedido+")' id='guarda_status_"+objeto.id_pedido+"'><i class='icon-floppy-disk'></i></a>\
                                    </li>\
                                    <button type='button' class='btn btn-outline rounded-round btn-icon ml-2 bg-primary text-slate-300 btn-sm' id='status_icon_a_"+objeto.id_pedido+"' onclick='save_aprobado("+objeto.id_pedido+")'><i class='icon-thumbs-up2'></i></button>\
                                    <button type='button' class='btn btn-outline rounded-round btn-icon ml-2 bg-primary text-slate-300 btn-sm' id='status_icon_d_"+objeto.id_pedido+"' onclick='save_cancela("+objeto.id_pedido+")'><i class='icon-thumbs-down2'></i></button>\
                                </ul>\
                            </div>\
                        </div>\
                    </div>";
    
    $("#tabla_visor_solicitudes").after(this.elemento);
    if(objeto.comentario.length){
        $.post( "json_selectPedidoComentario.php",{ id_pedido: objeto.id_pedido }).done(function( data ) {
            $( "#post_nombre_man"+objeto.id_pedido).append(data[0]["supervisor"]);
        });
    }
    $("#folio-"+objeto.folio).slideDown();
}
function setPedidos(folio){
    var result;
    var array_btn_save = [];
    var notice = new PNotify();
    $.ajax({
        data:{folio:folio},
        url: 'json_list_pedido.php',
        type: 'POST',
        beforeSend: function (xhr) {
            var options = {
                text: "Recopilando información...",
                addclass: 'bg-primary border-primary',
                type: 'info',
                icon: 'icon-spinner4 spinner',
                hide: false
            };
            notice.update(options);
        },
        success: function (obj) {
            result = obj;
            $.each(obj, function (index, value) {
                array_btn_save.push(value.id_pedido);
                obj_pedido(value);
            });
            var options = {
                text: "Completado!",
                addclass: 'bg-success border-success',
                type: 'info',
                icon: 'icon-checkmark4',
                delay: 1000,
                hide: true,
                buttons: {
                    closer: true,
                    sticker: false
                }
            };
            notice.update(options);
        },
        error: function (obj) {
            alert(obj.msg);
        }
    });
}