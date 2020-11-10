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
                                        <h5 class="card-title">Nuevo Referidos</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-info"><i class="icon-people"></i></span>
                                            <a href="javscript:void(0)" class="link display-5 ml-auto">23</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Mi Red</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-purple"><i class="icon-folder"></i></span>
                                            <a href="javscript:void(0)" class="link display-5 ml-auto">169</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Archivos</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-primary"><i class="icon-folder-alt"></i></span>
                                            <a href="javscript:void(0)" class="link display-5 ml-auto">311</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Creditos</h5>
                                        <div class="d-flex m-t-30 m-b-20 no-block align-items-center">
                                            <span class="display-5 text-success"><i class="icon-wallet"></i></span>
                                            <a href="javscript:void(0)" class="link display-5 ml-auto">1</a>
                                        </div>
                                    </div>
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
                 <div class="row">
                    <!-- Column -->
                    
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tu Actividad</h5>
                                <div class="steamline m-t-40">
                                    <div class="sl-item">
                                        <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                                        <div class="sl-right">
                                            <div class="font-medium">Nuevo Referido hoy  <span class="sl-date"> 5pm</span></div>
                                            <div class="desc">tienes un nuevo referido </div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left bg-info"><i class="icon-check"></i></div>
                                        <div class="sl-right">
                                            <div class="font-medium">Verificacion de usuario  </div>
                                            <div class="desc">un usuario pago su pin</div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="assets/images/users/2.jpg"> </div>
                                        <div class="sl-right">
                                            <div class="font-medium">Nuevo mensaje <span class="sl-date">Hace 5 minutos</span></div>
                                            <div class="desc">Gracias por unirte</div>
                                        </div>
                                    </div>
                                    <div class="sl-item mb-0">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="assets/images/users/3.jpg"> </div>
                                        <div class="sl-right">
                                            <div><a href="javascript:void(0)">Nuevo Credito</a> <span class="sl-date">5 minutes ago</span></div>
                                            <div class="desc">desea aprobarlo ?
                                                <br><a href="javascript:void(0)" class="btn m-t-10 m-r-5 btn-rounded btn-outline-success">Aprobar</a> <a href="javascript:void(0)" class="btn m-t-10 btn-rounded btn-outline-danger">Denegar</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Eventos</h5>
                                <ul class="feeds mt-3">
                                    <li>
                                        <div class="bg-info"><i class="ti-money"></i></div> Solicitud de credito <span class="text-muted ml-auto">Ahora</span></li>
                                    <li>
                                        <div class="bg-success"><i class="icon-reload"></i></div> Cambio de clave<span class="text-muted ml-auto">Hace 2 horas</span></li>
                                    <li>
                                        <div class="bg-warning"><i class="icon-people"></i></div> Nuevo referido de 2do nivel<span class="text-muted ml-auto">31 Mayo</span></li>
                                    <li>
                                        <div class="bg-danger"><i class="icon-people"></i></div> Nuevo referido<span class="text-muted ml-auto">30 Mayo</span></li>
                                    <li>
                                        <div class="bg-dark"><i class="ti-credit-card"></i></div> Pago de pin <span class="text-muted ml-auto">27 Mayo</span></li>
                                    <li>
                                        <div class="bg-info"><i class="icon-check"></i></div> Verificacion de identidad <span class="text-muted ml-auto">27 Mayo</span></li>
                                    <li class="py-1">
                                        <div class="bg-danger"><i class="ti-user"></i></div> Nuevo Registro<span class="text-muted ml-auto">27 Mayo</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>