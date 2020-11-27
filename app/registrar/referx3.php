<?php 
     
    include '../../coneccion/coneccion.php';
    $id=  $_SESSION['id'];

     
    $sql = pg_query("SELECT * FROM usuarios where id_refer_padre = '$id'");
    
    $row = pg_num_rows($sql);
    
    
?>
<style type="text/css">

 .ocultarref{
     display: none !important;
 }


</style>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Referidos</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="javascript:void(0)">App</a>
                                </li>
                                <li class="breadcrumb-item active">Referidos</li>
                            </ol>
                            <a href="?page=reg2"><button type="button" class="btn btn-warning d-none d-lg-block m-l-15">
                                <i class="icon-plus"></i> Añadir Referido</button></a>
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Primer Nivel refer</h4>
                                <h6 class="card-subtitle">Estos son mis referidos</h6>
                               
                              
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>PIN Activo/Inactivo</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                <td>'.$info['usuario'].'</td>
                                                <td>'.$info['nombre'].'</td>
                                                <td>'.$info['telefono'].'</td>
                                                <td>'.$info['correo'].'</td>
                                                <td><div class="label label-table label-danger">'.$info['statu_pin'].'</div></td>
                                            </tr>';
                                             }
                                               }else{

                                                }
                                             ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                         </div>
                         
                        
                    </div>
                </div>
                 <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Segundo Nivel Refer</h4>
                                <h6 class="card-subtitle">Estos son mis referidos</h6>
                                    
                                      <?php
                                            $sqllv2 = pg_query("SELECT * FROM usuarios where id_refer_padre = '$id'");
                                            $rowlv2 = pg_num_rows($sqllv2);
                                            if ($rowlv2) {
                                                while ($infolv2 = pg_fetch_assoc($sqllv2)) {
                                                     $idlv2 = ''.$infolv2['id'].'';

                                                     $sqllv3 = pg_query("SELECT * FROM usuarios where id_refer_padre = '$idlv2'");
                                                     $rowlv3 = pg_num_rows($sqllv3);
                                                     if ($rowlv3) {
                                                         $ocultarref = '';
                                                     }else{
                                                        $ocultarref = 'ocultarref';
                                                     }
                                                     
                                                     echo'
                                                    <h4 class="card-title '.$ocultarref.'">'.$infolv2['nombre'].' '.$infolv2['apellido'].'</h4>
                                                    <div class="table-responsive m-t-40">
                                        <table  class="table table-bordered table-striped">
                                                      
                                           
                                           <thead>
                                             <tr class="'.$ocultarref.'">
                                              
                                                <th>Usuario</th>
                                                <th>Nombre</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>PIN Activo/Inactivo</th>
                                            </tr>
                                        </thead>
                                       <tbody>';

                                           if ($rowlv3) {
                                               while ($infolv3 = pg_fetch_assoc($sqllv3)) {
                                               echo '  
                                               <tr>
                                                <td>'.$infolv3['usuario'].'</td>
                                                <td>'.$infolv3['nombre'].'</td>
                                                <td>'.$infolv3['telefono'].'</td>
                                                <td>'.$infolv3['correo'].'</td>
                                                <td><div class="label label-table label-danger">'.$infolv3['statu_pin'].'</div></td>   
                                               </tr>';
                                              }
                                              }
                                            
                                         echo' </tbody>
                                    </table>
                                </div>';
                                               
                                             }
                                               }else{

                                                }
                                             ?>
                            </div>
                         </div>
                         
                        
                    </div>
                </div>


                

                
     </div>

