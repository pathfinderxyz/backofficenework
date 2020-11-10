<?php 
    include "login/seguridad.php";
    //include "Errores/mostrar_errores.php";
    include "coneccion/coneccion.php"; 
   
    error_reporting(0);
    $id=$_GET['id'];    
    $date= date ("Y-m-d");
    

    $sql = pg_query("select * from usuarios where id='$id'");
    $row = pg_num_rows($sql);
    if ($row) {
        $info = pg_fetch_assoc($sql);
        $_SESSION['id']=$info['id'];
        $_SESSION['usuario'] = $info['usuario'];
        $_SESSION['rol'] = $info['rol'];
        $_SESSION['nombre']=$info['nombre'];
        $_SESSION['apellido']=$info['apellido'];
        $_SESSION['fecha']=$info['fecha'];
        $_SESSION['correo']=$info['correo'];
        $_SESSION['telefono']=$info['telefono'];
        $_SESSION['pais']=$info['pais'];
        $_SESSION['patrocinador']=$info['patrocinador'];
        $_SESSION['id_refer_padre']=$info['id_refer_padre'];
        $_SESSION['statu_pin']=$info['statu_pin'];
        
    }
    
    $file = "";//Vista a cargar
    $m_menu = "";
    
    //Control peticiones por rol
    if ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'referido' ) { //lo que hace aqui es preguntar :
          // si el usuario es tu, da o su entonces si lo que se devolvio por parametros get fue page = xxxxxx entonces llevalo alla 
        if (isset($_GET['page'])) {
            if ($_GET['page'] == 'registrar') {
                $file = 'registrar/registro.php';                
            }elseif ($_GET['page'] == 'opciones') {
                $file = 'biennacional/opciones.php';   
            }elseif ($_GET['page'] == 'home') {
                $file = 'home.php';   
            }elseif ($_GET['page'] == 'reg2') {
                $file = 'registrar/reg2.php';   
            }elseif ($_GET['page'] == 'listadorefer') {
                $file = 'registrar/ver_refer.php';   
            }elseif ($_GET['page'] == 'datos') {
                $file = 'usuario/datos.php';   
            }elseif ($_GET['page'] == 'referderefer') {
                $file = 'registrar/referderefer.php';   
            }elseif ($_GET['page'] == 'referx3') {
                $file = 'registrar/referx3.php';   
            }elseif ($_GET['page'] == 'pagopin') {
                $file = 'pin/pago_pin.php';   
            }elseif ($_GET['page'] == 'newincentivo') {
                $file = 'promociones/nuevapromocion.php';   
            }elseif ($_GET['page'] == 'verpromo') {
                $file = 'promociones/ver_promo.php';   
            }
        }else{
            $file = 'inicio.php';  
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon.png">
    <title>Dashboard | Nework</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"href="assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- Custom CSS -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
.topbar .navbar-collapse {
    padding: 0;
    background: #e4bc15 !important;

}
.left-sidebar {
    
    background: #000 !important;
    
}
.topbar .top-navbar .navbar-header {
    background: #000 !important;
}
a:hover {
    color: #e4bc15 !important;
}
.sidebar-nav>ul>li.active>a {
    color: #e4bc15 !important;
    
}
.sidebar-nav ul li a.active i, .sidebar-nav ul li a:hover i {
    color: #e4bc15 !important;
}
.navbar-dark .navbar-nav .nav-link {
    color: #000 !important;
}
a.link {
    color: #ffffff !important;
}
</style>
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Cargando</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="?page=home">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="assets/images/iconnuevo.jpg" alt="homepage" class="dark-logo" style="width: 40px;"/>
                            <!-- Light Logo icon -->
                            <img src="assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <img src="assets/images/logonegro.jpg" alt="homepage" class="dark-logo" style="width: 160px;margin-left: -10px;margin-top: 6px;
"/>
                         <!-- Light Logo text -->    
                         <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span>
                     </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notificaciones</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                           <?php  
                                             if ($_SESSION['statu_pin'] != 'activado') {
                                               echo  '<a href="?page=pagopin">
                                                <div class="btn btn-danger btn-circle"><i class="icon-link"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Paga tu pin</h5> <span class="mail-desc">Recuerde pagar su pin</span>  </div>
                                            </a>';}?>
                                            <!-- Message -->
                                            <?php  
                                            $sqlnewref = pg_query("SELECT * FROM usuarios where id_refer_padre = '".$_SESSION['id']."' and fecha = '$date'");
                                            $rownewref = pg_num_rows($sqlnewref);
                                             if ($rownewref) {
                                               echo  '
                                              <a href="?page=referderefer">
                                                <div class="btn btn-primary btn-circle"><i class="ti-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Nuevo referido</h5> <span class="mail-desc">Tienes un nuevo referido hoy</span></div>
                                            </a>';}?>
                                            <a href="?page=aula">
                                                <div class="btn btn-info btn-circle"><i class="icon-control-play"></i></div>
                                                <div class="mail-contnet">
                                                    <h5>Tienes un video</h5> <span class="mail-desc">Ve al aula</span> </div>
                                            </a>
                                            <!-- Message -->
                                           
                                            <!-- Message -->
                                          
                                        </div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                       
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- mega menu -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <!-- End mega menu -->
                        <!-- ============================================================== -->
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div>
                            <img src="assets/images/users/2.png" alt="user-img" class="img-circle">
                        </div>
                        <div class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true"
                                aria-expanded="false">Admin
                                <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu animated flipInY">
                                <a href="?page=home" class="dropdown-item">
                                    <i class="icon-home"></i> Inicio</a>
                                <!-- text-->
                                <a href="?page=datos" class="dropdown-item">
                                    <i class="ti-user"></i> Mi perfil</a>
                                <!-- text-->
                                <a href="?page=pagopin" class="dropdown-item">
                                    <i class="ti-wallet"></i> Pagar Pin</a>
                                <!-- text-->
                                <a href="login/logout.php" class="dropdown-item">
                                    <i class="icon-logout"></i> Salir</a>
                                <!-- text-->
                               
                               
                                <!-- text-->
                                
                                <!-- text-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        
                        <li class="nav-small-cap">--- APP</li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="icon-user"></i>
                                <span class="hide-menu">Referidos
                                    <span class="badge badge-pill badge-warning ml-auto">4</span>
                                </span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="?page=reg2">Agregar referido</a>
                                </li>
                                <?php  
                                  if ($_SESSION['rol'] != 'admin') {
                                     echo '
                                <li>
                                    <a href="?page=referderefer">Listado de referidos</a>
                                </li>
                                ';
                                         }
                                 ?>
                              
                            </ul>
                        </li><?php  
                                  if ($_SESSION['rol'] == 'admin') {
                                     echo '
                      <li>
                            <a class="waves-effect waves-dark" href="?page=listadorefer" aria-expanded="false">
                               <i class="icon-people"></i>
                                <span class="hide-menu">Todos los referidos</span>
                            </a>
                        </li>';
                                         }
                                 ?>
                                 <?php  
                                  if ($_SESSION['rol'] != 'admin') {
                                     echo '
                      <li>
                            <a class="waves-effect waves-dark" href="?page=referx3" aria-expanded="false">
                               <i class="icon-people"></i>
                                <span class="hide-menu">Red de referidos</span>
                            </a>
                        </li>';
                                         }
                                 ?>
                      
                       
                        <li class="nav-small-cap">--- REFERIDOS (UNILEVEL)</li>
                          <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="icon-layers"></i>
                                <span class="hide-menu">Unilevel</span>
                            </a>
                             <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="#">Status clientes</a>
                                </li>
                                <li>
                                    <a href="#">Mi red</a>
                                </li>
                                <li>
                                    <a href="#">Comisiones</a>
                                </li>
                              
                            </ul>
                        </li>
                         <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="icon-wallet"></i>
                                <span class="hide-menu">Creditos</span>
                            </a>
                             <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="#">Nuevo Credito</a>
                                </li>
                               
                              
                            </ul>
                        </li>
                         <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="icon-graduation"></i>
                                <span class="hide-menu">Aula</span>
                            </a>
                             <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="#">Videos</a>
                                </li>
                               
                              
                            </ul>
                        </li>

                         <li>
                            <a class="waves-effect waves-dark" href="#" aria-expanded="false">
                               <i class="icon-tag"></i>
                                <span class="hide-menu">Promociones</span>
                            </a>
                        </li>
                       
                        
                        <?php  
                                  if ($_SESSION['rol'] == 'admin') {
                                     echo '
                        <li class="nav-small-cap">--- CONFIGURACION</li>
                          <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                <i class="icon-settings"></i>
                                <span class="hide-menu">Datos e incentivos</span>
                            </a>
                             <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="?page=newincentivo">Añadir incetivos</a>
                                </li>
                                <li>
                                    <a href="?page=verpromo">Ver incetivos</a>
                                </li>
                            </ul>
                        </li>';
                                         }
                                 ?>
                    
                        <li>
                            <a class="waves-effect waves-dark" href="login/logout.php" aria-expanded="false">
                                <i class="icon-logout"></i>
                                <span class="hide-menu">Salir</span>
                            </a>
                        </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
                 <?php  
                  include 'app/'.$file;
                 ?>

               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2020 Nework
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!--Datatable -->
    <script src="assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
  
    <!-- Chart JS -->
    <script src="dist/js/dashboard1.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
   
  
    <!-- end - This is for export functionality only -->
    <script>
        $(function () {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
              $('#myTable2').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            $('#myTable3').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        });

    </script>

   <script type="text/javascript">
$(document).ready(function() {  
    $('#correo').on('blur', function(){
        $('#result-correo').html('<img src="assets/images/loader.gif" />').fadeOut(1000);

        var correo = $(this).val();       
        var dataString = 'correo='+correo;

        $.ajax({
            type: "POST",
            url: "check_email.php",
            data: dataString,
            success: function(data) {
                $('#result-correo').fadeIn(1000).html(data);
            }
        });
    });              
});    
</script>
    
</body>

</html>