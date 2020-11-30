  <?php 
     $idstatus=  $_SESSION['id'];

    $sql = pg_query("SELECT * from usuarios where id='$idstatus'");
    $row = pg_num_rows($sql);
    if ($row) {
        $info = pg_fetch_assoc($sql);
        
         $status_actual=$info['statu_pin'];
        
    }
     if ($status_actual=="activado"){
           $color= 'text-success';
         }else {
           $color= 'text-danger';
           
       }  
     
     $consulta = pg_query("SELECT MAX(id_promo) AS id_promo FROM incentivos");
     $infoconsulta = pg_fetch_assoc($consulta);
     $idpromo = $infoconsulta['id_promo'];
     $idpromo2 = 49 ;

     $promo1 = pg_query("SELECT * from incentivos where id_promo='$idpromo'");
     $infopromo1 = pg_fetch_assoc($promo1);
     $titulop1 = $infopromo1['titulo'];
     $descripcion1 = $infopromo1['descripcion'];
     $imagen1 = $infopromo1['url_imagen'];

     $promo2 = pg_query("SELECT * from incentivos where id_promo='$idpromo2'");
     $infopromo2 = pg_fetch_assoc($promo2);
     $titulop2 = $infopromo2['titulo'];
     $descripcion2 = $infopromo2['descripcion'];
     $imagen2 = $infopromo2['url_imagen'];


     $cuenta_refer = pg_query("SELECT (id) from  usuarios where id_refer_padre='$idstatus'");
     $rowcuentarefer = pg_num_rows($cuenta_refer);

     $cuenta_clientes = pg_query("SELECT (id_cliente) from  clientes where id_ref_padre='$idstatus'");
     $rowcuentaclientes = pg_num_rows($cuenta_clientes);
     


?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                       <strong><h4 class="text-themecolor">Bienvenido <?php  echo ucfirst($_SESSION['nombre']);?></h4></strong> 
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">
                                  <h4><span class="<?php  echo $color;?>" style="font-weight: 600;"> <?php  echo ucfirst($status_actual) ;?></span></h4>
                                </li>
                            </ol>
                            <?php  
                                  if ($_SESSION['rol'] == 'admin') {
                                     echo '<button type="button" class="btn btn-warning d-none d-lg-block m-l-15"><i class="icon-plus"></i> Añadir referido</button>';
                                         }
                                 ?>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Referidos</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-info"><i class="icon-people"></i></span>
                                             <a href="javscript:void(0)" class="link display-5 ml-auto" style="color: #000 !important;"><?php  echo $rowcuentarefer;?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                          <div class="col-md-6">
                               <div class="card">
                               <a href="?page=RED">   <div class="card-body">
                                        <h5 class="card-title">Mi RED</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-info"><i class="icon-layers"></i></span>
                                            <a href="javscript:void(0)" class="link display-5 ml-auto" style="color: #000 !important;"></a>
                                        </div>
                                    </div>
                                    </a>
                                    </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Clientes</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-primary"><i class="icon-user-following"></i></span>
                                             <a href="javscript:void(0)" class="link display-5 ml-auto" style="color: #000 !important;"><?php  echo $rowcuentaclientes;?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <a href="?page=comclientes">  <div class="card-body">
                                        <h5 class="card-title">Comisiones</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-success"><i class="icon-wallet"></i></span>
                                             <a href="javscript:void(0)" class="link display-5 ml-auto" style="color: #000 !important;"></a>
                                            
                                        </div>
                                    </div>
                                     </a>
                                </div>
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                   <div class="col-lg-3 col-md-6">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-responsive" src="<?php  echo $imagen1;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php  echo $titulop1;?></h4>
                                        <p class="card-text"><?php  echo  $descripcion1;?></p>
                                        
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-lg-3 col-md-6">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-responsive" src="<?php  echo $imagen2;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php  echo $titulop2;?></h4>
                                        <p class="card-text"><?php  echo  $descripcion2;?>.</p>
                                        
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            
                </div>
                <!-- ============================================================== -->
               