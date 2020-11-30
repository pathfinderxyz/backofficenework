<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_SESSION['id']; 

     
    $sql = pg_query("SELECT * FROM videos");
    
    $row = pg_num_rows($sql);
    
?>
<style type="text/css">

 .ocultar{
     display: none !important;
 }
 </style>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                       <strong><h4 class="text-themecolor">Videos disponibles</h4></strong> 
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                  <?php
                        if ($row) {
                            while ($info = pg_fetch_assoc($sql)) {
                             $titulovideo = ''.$info['titulo'].'';    
                            if ($titulovideo == '') {
                                $ocultar = 'ocultar';
                                }
                        echo '
                    <div class="col-lg-4 '.$ocultar.'">
                         <div class="card">
                                     <div class="embed-responsive embed-responsive-16by9">
                                      <iframe class="embed-responsive-item  allowfullscreen" src="'.$info['url_video'].'"></iframe>
                                      </div>
                                    <div class="card-body">
                                        <h4 class="card-title">'.$info['titulo'].'</h4>
                                        <p class="card-text">'.$info['descripcion'].'</p>
                                        
                                    </div>
                                </div>
                    </div>';
                                             }
                                               }else{

                                                }
                                             ?>

                </div>
                <!-- ============================================================== -->
               