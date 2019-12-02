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
    <script src="js/engineJS_4.js"></script>
    
    <script src="../../global_assets/js/plugins/extensions/rowlink.js"></script>
    <script src="../../global_assets/js/demo_pages/picker_date.js"></script>
    <script src="../../global_assets/js/demo_pages/form_select2.js"></script>
    <script src="../../global_assets/js/plugins/notifications/pnotify.min.js"></script>
    <script src="../../global_assets/js/demo_pages/extra_fab.js"></script>
    <!-- Theme JS files -->
    <script src="../../global_assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script src="../../global_assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script src="../../global_assets/js/plugins/forms/styling/switch.min.js"></script>
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
                </div>
                
            </div>            
            <!-- Right content -->
            <div class="flex-fill overflow-auto">
                <!-- Single line -->
                <div  id="content_table_pedidos_list" data-scroll="">
                <div class="text-center text-muted content-divider mb-3">
                    <span class="p-2">Nuevos / por revisar</span>
                </div>
                <div class="card" id="tabla_visor_solicitudes">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-inbox" id="lay_out_solicitudesx" cellspacing="0" width="100%">
                            <thead style="display: none">
                                <tr>
                                  <th>Folio</th> <!-- 0 -->
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
                <div class="text-center text-muted content-divider mb-3">
                    <span class="p-2">Aprobados</span>
                </div>
                <div class="card" id="tabla_visor_solicitudes_aprobados">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-inbox" id="lay_out_solicitudesx_aprobados" cellspacing="0" width="100%">
                            <thead style="display: none">
                                <tr>
                                  <th>Folio</th> <!-- 0 -->
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
            </div>    
                <!-- /single line -->
            </div>
            <!-- /right content -->
            </div>
            <!-- /content area -->            
            <!-- Footer -->
            <?php include '../bar_nav/footer_navbar.php'; ?>
            <!-- /footer -->
        </div>
    </div>
</body>
</html>