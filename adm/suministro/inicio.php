<?php require_once '../../ini_ses.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php include '../../bar_nav/title.php'; ?></title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="../../global_assets/css/icons/icomoon/styles.min.css" rel="stylesheet" type="text/css">
    <link href="../../global_assets/css/icons/material/styles.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <link href="../../global_assets/js/plugins/tables/datatables/datatables/datatables.css" rel="stylesheet" type="text/css">
    <link href="css/css_custom.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <!-- Core JS files -->
    <script src="../../global_assets/js/main/jquery.min.js"></script>
    <script src="../../global_assets/js/main/bootstrap.bundle.min.js"></script>
    <script src="../../global_assets/js/plugins/loaders/blockui.min.js"></script>
    <script src="../../global_assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /core JS files -->
    <!-- Theme JS files -->
    <script src="../../global_assets/js/plugins/extensions/jquery_ui/interactions.min.js"></script>
    <script src="../../global_assets/js/plugins/forms/selects/select2.min.js"></script>
    <script src="../../assets/js/app.js"></script>
    <!-- /theme JS files -->
    <!-- Theme JS files -->
    <script src="../../global_assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script src="../../global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script src="../../global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <!-- Theme JS files -->
    <script src="../../global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <!-- Theme JS files -->
    <script src="../../global_assets/js/plugins/tables/datatables/datatables/datatables.js"></script>
    <script src="../../global_assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
    <!-- Theme JS files -->
    <script src="../../global_assets/js/plugins/ui/moment/moment.min.js"></script>
    <script src="../../global_assets/js/plugins/pickers/anytime.min.js"></script>
    <script src="../../global_assets/js/plugins/pickers/daterangepicker.js"></script>
    <script src="../../global_assets/js/plugins/pickers/pickadate/picker.js"></script>
    <script src="../../global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
    <script src="../../global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
    <script src="../../global_assets/js/plugins/pickers/pickadate/legacy.js"></script>
    <script src="../../global_assets/js/plugins/notifications/jgrowl.min.js"></script>
    <!-- Theme JS files -->
    <script src="../../global_assets/js/plugins/ui/fab.min.js"></script>
    <script src="../../global_assets/js/plugins/ui/sticky.min.js"></script>
    <script src="../../global_assets/js/plugins/ui/prism.min.js"></script>
    <script src="../../global_assets/js/demo_pages/components_popups.js"></script>
    <!-- Theme JS files -->
    <script src="../../global_assets/js/plugins/buttons/spin.min.js"></script>
    <script src="../../global_assets/js/plugins/buttons/ladda.min.js"></script>
    <script src="js/engineJS.js"></script>
    
    <script src="../../global_assets/js/plugins/extensions/rowlink.js"></script>
    <script src="../../global_assets/js/demo_pages/picker_date.js"></script>
    <script src="../../global_assets/js/demo_pages/form_select2.js"></script>
    <script src="../../global_assets/js/plugins/notifications/pnotify.min.js"></script>
    <script src="../../global_assets/js/demo_pages/extra_fab.js"></script>
    <!-- /theme JS files -->
</head>
<body>
    <!-- Main navbar -->
    <?php include '../bar_nav/main_navbar.php'; ?>
    <!-- Page content -->
    <div class="page-content">
        <!-- Main sidebar -->
        <?php include '../bar_nav/main_sidebar.php'; ?>
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page header -->
            <div class="page-header page-header-light"></div>

            <!-- Content area -->
            <div class="content">
            <!-- Bottom right menu -->
            <ul class="fab-menu fab-menu-fixed fab-menu-bottom-right" data-fab-toggle="click" id="tools_menu_select" style="display: none;">
                <li>
                    <button type="button" class="fab-menu-btn btn btn-success btn-float rounded-round btn-icon">
                        <i class="fab-icon-open icon-plus3"></i>
                        <i class="fab-icon-close icon-cross2"></i>
                    </button>
                    <ul class="fab-menu-inner">
                        <li>
                            <div data-fab-label="Pase Salida">
                                <a class="btn btn-light rounded-round btn-icon btn-float" onclick="modal_pase()">
                                    <i class="icon-clipboard2"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div data-fab-label="Regresar">
                                <a class="btn btn-light rounded-round btn-icon btn-float" data-btn_list="" data-idrow="" id="tools_menu_regresa" onclick="regresar_lista()">
                                    <i class="icon-undo2"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- /bottom right menu -->
            <!-- Filter toolbar -->
            <div class="navbar navbar-expand-lg navbar-light navbar-component rounded">
                <div class="text-center d-lg-none w-100">
                    <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-filter">
                        <i class="icon-unfold mr-2"></i>
                        Filtros
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbar-filter">
                    <ul class="navbar-nav flex-wrap mr-3">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="icon-drawer-in"></i>
                                Bandeja de entrada
                                <span class="badge bg-success badge-pill ml-auto" id="total_pedidos_mostrado">0</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="icon-drawer-out"></i> Mis solicitudes enviadas</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="icon-box"></i> A entregar</a>
                        </li>
                    </ul>
                    <div class="form-group-feedback form-group-feedback-right" id="busqueda_costom">
                        <input type="search" class="form-control" placeholder="Buscar...">
                        <div class="form-control-feedback">
                            <button type="button" class="btn icon-search4 font-size-base text-muted"></button>
                        </div>
                    </div>  
                    <span class="navbar-text font-weight-semibold mr-3 ml-md-auto"></span>
                    <button type="button" class="btn text-primary-800 btn btn-link legitRipple" style="display: none;" id="fecha_actual"></button>
                    <button type="button" class="btn btn-outline bg-primary text-primary-800 rounded-round btn-icon ml-2" style="display: none;" id="btn_info_formato" data-toggle="modal" data-target="#mod_num_formato"><i class="icon-info22"></i></button>
                    <button type="button" class="btn btn-outline bg-primary text-primary-800 rounded-round btn-icon ml-2" style="display: none;" id="btn_send_pedido" onclick="get_folio()"><i class="icon-paperplane"></i></button>
                    <button type="button" class="btn btn-outline rounded-round btn-icon ml-2 bg-primary text-primary-800 btn-sm" onclick="show_addpedido()" id="btn_add_pedido"><i class="icon-add"></i></button>
                </div>
                
            </div>
            <!-- /filter toolbar -->
            <div class="row" id="row_new_solicitudxx">
                <div class="col-md-12">
                    <div class="card" id="card_addPedido" style="display: none;">
                        <div class="card-header bg-white header-elements-inline">
                            <h6 class="card-title">Nueva solicitud</h6>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <div class="d-flex align-items-center mb-3 mb-md-0">
                                        <div class="ml-3">
                                            <h6 class="font-weight-semibold mb-0 text-blue-800" ></h6>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm text-danger-800 btn btn-link legitRipple" style="display: none;" id="folioxx" data-folioz="0"></button>
                                    <button type="button" class="btn btn-sm btn-outline bg-danger text-danger-800 rounded-round btn-icon ml-2" style="display: none;" id="btn_del_row_sel"><i class="icon-trash"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline bg-primary text-primary-800 rounded-round btn-icon ml-2" data-toggle="modal" data-target="#modal_large"><i class="icon-plus3"></i></button>
                                </div>
                            </div>      
                        </div>
                        <div class="card-body" id="mod_pedido">
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="tabla_pedidos" class="table datatable-selection-single" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th></th> <!-- 0 -->
                                        <th>Clave</th> <!-- 0 -->
                                        <th>Articulo</th> <!-- 1 -->
                                        <th>Articulo</th> <!-- 2 -->
                                        <th>Unidad</th> <!-- 3 -->
                                        <th>Cantidad</th> <!-- 4 -->
                                        <th>Descripció detallada</th> <!-- 5 -->
                                        <th>Area ó equipo destinado</th> <!-- 6 -->
                                        <th>Justificación</th> <!-- 7 -->
                                        <th>Anexo/Condición</th> <!-- 8 -->
                                        <th>Aprueba</th> <!-- 9 -->
                                        <th>Grado Requerimiento</th> <!-- 10 -->
                                        <th>Fecha Requerimiento</th> <!-- 11 -->
                                        <th>ID Categoría</th> <!-- 12 -->
                                        <th>ID destino</th> <!-- 13 -->
                                        <th>cantidad_apartado</th> <!-- 12 -->
                                        <th>cantidad_compra</th> <!-- 13 -->
                                      </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /dashboard content -->
            
            <!-- Right content -->
            <div class="flex-fill overflow-auto">
                <!-- Single line -->
                <div class="card" id="tabla_visor_solicitudes">
                    <!-- Table -->
                    <div class="table-responsive" id="content_table_pedidos_list" data-scroll="">
                        <table class="table table-inbox" id="lay_out_solicitudesx" cellspacing="0" width="100%">
                            <thead style="display: none">
                                <tr>
                                  <th>Folio</th> <!-- 0 -->
                                  <th>Imagenes</th> <!-- 1 -->
                                  <th>Solicitante</th> <!-- 2 -->
                                  <th>Materiales solicitados</th> <!-- 3 -->
                                  <th>Fecha</th> <!-- 4 -->
                                </tr>
                            </thead>
                            <tbody data-link="row" class="rowlink">
                            </tbody>
                        </table>
                    </div>
                    <!-- /table -->
                </div>
                <!-- INICIA CUERPO DE TODOS LA LISTA DE PEDIDOS -->
                
               <!-- INICIA CUERPO DE TODOS LA LISTA DE PEDIDOS -->
                <!-- /single line -->
            </div>
            <!-- /right content -->
            </div>
            <!-- /content area -->
            <!-- Area modal -->
            <div id="modal_large" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body">
                        <form id="add_articulo" data-numformat="SP-MX-CA-FO-003" data-idformat="1">
                            <div class="form-group row">
                              <div class="col-sm-11 form-group-feedback form-group-feedback-right">
                                  <label class="font-weight-bold">Busqueda de articulo</label>
                                  <div class="input-group">
                                      <select data-placeholder="Buscar en almacen..." class="form-control select-minimum form-control-sm" data-fouc name='articulo_cod' id="select_article">
                                      </select>
                                      <div class="form-control-feedback text-danger">
                                        <button type="button" class="btn text-pink-800 btn-link form-control-sm" onclick="reset_select2()" title="Remover selección actual"><i class="icon-spinner11"></i></button>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-1 form-group form-group-feedback-right text-center">

                              </div>
                              <div class="col-sm-12 form-group form-group-feedback-right"></div>
                              <div class="col-sm-4 form-group form-group-feedback-right">
                                <label class="d-block font-weight-bold">Grado de Requerimiento de la compra</label>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input-styled-primary form-control-sm" name="grado_r" value="inmediato" checked data-fouc>
                                        Inmediata
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input-styled-primary form-control-sm" name="grado_r" value="programado" data-fouc>
                                        Programada
                                    </label>
                                </div>
                              </div>
                              <div class="col-sm-4 form-group form-group-feedback-right">
                                <div class="controls">
                                  <div class="col-md-12 form-group-feedback form-group-feedback-right">
                                    <label class="font-weight-bold">Fecha estimada de requerimiento</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-calendar22"></i></span>
                                        </span>
                                        <input type="text" class="form-control form-control-sm daterange-single font-weight-semibold text-blue-800" value="" id="single_cal3">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-4 form-group form-group-feedback-right">
                              </div>
                              <div class="col-sm-2 form-group form-group-feedback-right">
                                <label class="font-weight-bold">Codigo</label>
                                <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="cod_articulo" readonly>
                              </div>
                              <div class="col-sm-6 form-group form-group-feedback-right">
                                <label class="font-weight-bold">Articulo</label><label style="color: red;"> *</label>
                                <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="descripcion" required="true" onkeyup="mayus(this);">
                              </div>
                              <div class="col-sm-2 form-group form-group-feedback-right">
                                <label class="font-weight-bold" data-fouc>Unidad</label>
                                <select name="select" class="form-control form-control-sm font-weight-semibold text-blue-800 select" id="unidad">
                                  <option value="pza" selected>Pieza</option>
                                  <option value="kgr">Kilogramo</option>
                                  <option value="mtr">Metro</option>
                                  <option value="pqt">Paquete</option>
                                  <option value="cja">Caja</option>
                                  <option value="ltr">Litro</option>
                                  <option value="lte">Lote</option>
                                  <option value="kit">Kit</option>
                                  <option value="par">Par</option>
                                </select>
                              </div>
                              <div class="col-sm-2 form-group form-group-feedback-right">
                                <label class="font-weight-bold">Cantidad | </label>
                                <span class="text-blue-800 font-weight-bold" id="stock_disponible" data-almacen="0" title="Cantidad disponible en almacen"><i class="icon-database4"></i> 0</span>
                                <span class="text-danger-800 font-weight-bold" id="stock_compra" title="Cantidad que sera enviada a compra"><i class="icon-cart-add2"></i> 0</span>
                                <input type="number" class="form-control form-control-sm font-weight-semibold text-blue-800" step="1" value="1" min="0" id="cantidad" value="0" required="true">
                              </div>
                              <div class="col-sm-9 form-group form-group-feedback-right">
                                <label class="font-weight-bold">Descripción detallada</label>
                                <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="especificacion" onkeyup="mayus(this);">
                              </div>
                              <div class="col-sm-3 form-group form-group-feedback-right">
                                <label class="font-weight-bold">Categoria</label>
                                <select name="select" class="form-control form-control-sm font-weight-semibold text-blue-800 select" data-fouc id="select_categoria" required>
                                </select>
                              </div>
                              <div class="col-sm-6 form-group form-group-feedback-right">
                                <label class="font-weight-bold">Anexo/Condición</label>
                                <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="anexo" onkeyup="mayus(this);">
                              </div>
                              <div class="col-sm-6 form-group form-group-feedback-right" id="content_destinos">
                                <label class="font-weight-bold">Area/Equipo destinado</label><label style="color: red;"> *</label>
                                <div class="input-group">
                                      <select data-placeholder="Area, Equipo, Empleado,..." class="form-control select-minimum form-control-sm" data-fouc name='area_aquipo' data-textvalue="" id="area_aquipo">
                                      </select>
                                      <div class="form-control-feedback text-danger">
                                        <button type="button" class="btn text-pink-800 btn-link form-control-sm" onclick="reset_select3()" title="Remover selección actual"><i class="icon-spinner11"></i></button>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-12 form-group form-group-feedback-right">
                                <label class="font-weight-bold">Justificación de compra</label><label style="color: red;"> *</label>
                                <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="justificacion" required="true" onkeyup="mayus(this);">
                              </div>
                            </div>
                        </form>                                                    
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline bg-danger-300 rounded-round btn-icon ml-2 btn-sm" onclick="resetModalPedido()"><i class="icon-exit2"></i> Salir</button>
                            <button type="button" class="btn btn-outline bg-slate rounded-round btn-icon ml-2 btn-sm" onclick="agregar_pedido()"><i class="icon-download4"></i> Añadir</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /large modal -->
            <div id="mod_num_formato" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 form-group form-group-feedback-right">
                                  <label class="font-weight-bold">Numero de formato</label>
                                  <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="num_formato" readonly>
                                </div>
                                <div class="col-md-6 form-group form-group-feedback-right">
                                  <label class="font-weight-bold">Función</label>
                                  <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="funcion" readonly>
                                </div>
                                <div class="col-md-6 form-group form-group-feedback-right">
                                  <label class="font-weight-bold">Región</label>
                                  <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="region" readonly>
                                </div>
                                <div class="col-md-6 form-group form-group-feedback-right">
                                  <label class="font-weight-bold">Fecha de Rev.</label>
                                  <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="fecha_rev" readonly>
                                </div>
                                <div class="col-md-6 form-group form-group-feedback-right">
                                  <label class="font-weight-bold">Autorizado por</label>
                                  <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="autorizado" readonly>
                                </div>
                                <div class="col-md-6 form-group form-group-feedback-right">
                                  <label class="font-weight-bold">Revisado por</label>
                                  <input type="text" class="form-control form-control-sm font-weight-semibold text-blue-800" id="revisado" readonly>
                                </div>
                            </div>                                                
                        </div>
                    </div>
                </div>
            </div>
            <!-- /large modal -->
            <div id="pase_salida" class="modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row">
                                <!-- Table -->
                                <div class="table-responsive" id="table_pase_salida">
                                    <table class="table table-inbox" id="lay_out_salida" cellspacing="0" width="100%">
                                        <thead style="display: none">
                                            <tr>
                                              <th>Id pedido</th>
                                              <th>Articulo</th>
                                              <th>Cantidad</th>
                                              <th>Unidad</th>
                                              <th>Destino</th>
                                              <th>status</th>
                                              <th>Cod Articulo</th>
                                              <th>Folio</th>
                                              <th>Autoriza</th>
                                              <th>Categoria</th>
                                              <th>Stock Alm.</th>
                                            </tr>
                                        </thead>
                                        <tbody data-link="row" class="rowlink">
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /table -->
                            </div>                                                
                        </div>
                    </div>
                </div>
            </div>
            <!-- Area modal -->
            
            <!-- Footer -->
            <?php include '../bar_nav/footer_navbar.php'; ?>
            <!-- /footer -->
        </div>
    </div>
</body>
</html>
