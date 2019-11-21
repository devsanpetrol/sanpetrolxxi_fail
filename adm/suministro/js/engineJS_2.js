$(document).ready( function () {
    $("body").addClass("sidebar-xs");
    
    $('#datatable_almacen_pase').DataTable({
        ordering: false,
        bDestroy: true,
        paging: false,
        dom: '<"datatable-footer"><"datatable-scroll-wrap"t>',
        createdRow: function ( row, data, index ) {
            $(row).attr("id","id_row_"+data[3]);
        },
        columnDefs: [
            {targets: 0, visible: false,searchable: true},
            {targets: 1, width: '30%'},
            {targets: 2, visible: false,searchable: true},
            {targets: 3, visible: false,searchable: false},
            {targets: 4, visible: false,searchable: false},
            {targets: 5, width: '30%'},
            {targets: 6, width: '8%',className:'text-center'},
            {targets: 7, width: '8%',className:'text-center'},
            {targets: 8, width: '8%',className:'text-center'},
            {targets: 9, width: '8%',className:'text-center'},
            {targets: 10,visible: false,searchable: false},
            {targets: 11,visible: false,searchable: false},
            {targets: 12,width: '8%',className:'text-center'}
        ],
        language: {
            info: "Mostrando _TOTAL_ registros"
        }
    });
    
    $('#datatable_almacen_salida').DataTable({
        ordering: false,
        bDestroy: true,
        paging: false,
        dom: '<"datatable-scroll-wrap"t><"datatable-footer"i>',
        ajax: {
            url: "json_selectAlmacenSalida.php",
            dataSrc:function ( json ) {
                return json;
            }
        },
        columns: [
            {data : 'fecha_solicitud'},
            {data : 'articulo'},
            {data : 'folio'},
            {data : 'id_pedido'},
            {data : 'status_pedido'},
            {data : 'destino'},
            {data : 'cantidad_solicitud'},
            {data : 'cantidad_apartado'},
            {data : 'cantidad_entregado'},
            {data : 'cantidad_compra'},
            {data : 'grado_requerimiento'},
            {data : 'accion'}
        ],
        columnDefs: [
            {targets: 0,width: '20%'},
            {targets: 1,width: '22%'},
            {targets: 2,visible: false,searchable: true},
            {targets: 3,visible: false,searchable: false},
            {targets: 4,visible: false,searchable: false},
            {targets: 5,width: '22%'},
            {targets: 6,width: '7%',className:'text-center'},
            {targets: 7,width: '7%',className:'text-center'},
            {targets: 8,width: '7%',className:'text-center'},
            {targets: 9,width: '7%',className:'text-center'},
            {targets: 10,visible: false,searchable: false},
            {targets: 11,width: '8%',className:'text-center'}
        ],
        language: {
            info: "Mostrando _START_ hasta _END_ de _TOTAL_ registros"
        }
    });
    
    
        
    $('#datatable_almacen_salida thead th').each( function () {
         var title = $(this).text();
        if (title == "FechaFolio"){
            $(this).html( '<input type="search" class="form-control '+title+'" placeholder="Buscar Folio o Fecha" />' );
        }
        if (title == "articulo"){
            $(this).html( '<input type="search" class="form-control '+title+'" placeholder="Buscar Articulo, Categoria, Solicitante, ..." />' );
        }
        if (title == "Destino"){
            $(this).html( '<input type="search" class="form-control '+title+'" placeholder="Buscar Equipo, Personal o Area destinada" />' );
        }
    } );
    
    $('.FechaFolio').on( 'change paste keyup', function () {
    var table = $('#datatable_almacen_salida').DataTable();
    table
        .columns( 0 )
        .search( this.value )
        .draw();
    } );
    $('.Destino').on( 'change paste keyup', function () {
    var table = $('#datatable_almacen_salida').DataTable();
    table
        .columns( 5 )
        .search( this.value )
        .draw();
    } );
    $('.articulo').on( 'change paste keyup', function () {
    var table = $('#datatable_almacen_salida').DataTable();
    table
        .columns( 1 )
        .search( this.value )
        .draw();
    } );
    
} );

function filter_folio(e){
    var obj = e.target.id;
    var val = $("#"+obj).data("filter");
    $('.FolioFecha').val(val);
    $('.FolioFecha').keyup();
}
function filter_articulo(e){
    var obj = e.target.id;
    var val = $("#"+obj).data("filter");
    $('.articulo').val(val);
    $('.articulo').keyup();
}
function filter_destino(e){
    var obj = e.target.id;
    var val = $("#"+obj).data("filter");
    $('.Destino').val(val);
    $('.Destino').keyup();
}
function agrega_pase(id_pedido){
    var tabla = $('#datatable_almacen_pase').DataTable();
    $.ajax({
        url: 'json_selectAlmacenPase.php',
        data:{id_pedido:id_pedido},
        type: 'POST',
        success:(function(res){
            $.each(res,function(key, registro){
                tabla.row.add( [
                    registro.fecha_solicitud,
                    registro.articulo,
                    registro.folio,
                    registro.id_pedido,
                    registro.status_pedido,
                    registro.destino,
                    registro.cantidad_solicitud,
                    registro.cantidad_apartado,
                    registro.cantidad_surtir,
                    registro.cantidad_entregado,
                    registro.cantidad_compra,
                    registro.grado_requerimiento,
                    registro.accion
                ] ).draw( false );
            });
            var filas = tabla.rows().count();
            $("#count_row_datatable").text("Numero de registros: "+filas);
            
            $("#btn_acc_"+id_pedido).attr("disabled",true);
            $("#btn_acc_i1"+id_pedido).hide();
            $("#btn_acc_i2"+id_pedido).show();
            
            if($("#card_almacen_pase").data("vista") == "no"){
                setTimeout(function() {
                    $("#card_almacen_pase").slideToggle();
                }, 1000);
            }
            $("#card_almacen_pase").data("vista","si");
            $("#number_"+id_pedido).bind('keyup mouseup', function () {
                var max = parseInt($("#number_"+id_pedido).attr("max"));
                var val = parseInt($("#number_"+id_pedido).val());
                if(val <= max ){
                    console.log(val+"-"+max);
                    var por = (val*100)/max;
                    if(por >= 100){
                        $("#progress_"+id_pedido).removeClass("progress-bar-animated").addClass("bg-success");
                    }else{
                        $("#progress_"+id_pedido).addClass("progress-bar-animated").removeClass("bg-success");
                    }
                    $("#progress_"+id_pedido).css("width",por+"%");
                }else{
                    alert("El valor ingresado no es valido conforme a la solicitud");
                    $("#number_"+id_pedido).val(0);
                    $("#progress_"+id_pedido).css("width","0%");
                }
                
            });
        })
    });
}
 function remover_salida(id_pedido){
    $("#btn_acc_"+id_pedido).attr("disabled",false);
    $("#btn_acc_i2"+id_pedido).hide();
    $("#btn_acc_i1"+id_pedido).show(); 

    $('#id_row_'+id_pedido).slideUp("slow");

    var tabla = $('#datatable_almacen_pase').DataTable();
    
    setTimeout(function() {
        tabla.row('#id_row_'+id_pedido).remove().draw(false);
        
        if(!tabla.data().any()){
            setTimeout(function() {
                $("#card_almacen_pase").slideToggle();
                $("#card_almacen_pase").data("vista","no");
            }, 500);
        }
        var filas = tabla.rows().count();
        $("#count_row_datatable").text("Numero de registros: "+filas);
    }, 500);
    
    
 }