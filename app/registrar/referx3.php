<?php 
     
    include '../../coneccion/coneccion.php';
    $id=  $_SESSION['id'];

     
    $sql = pg_query("SELECT * FROM usuarios where id_refer_padre = '$id'");
    
    $row = pg_num_rows($sql);
    
    
?>
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
                                <h4 class="card-title">Mis Referidos</h4>
                                <h6 class="card-subtitle">Estos son mis referidos</h6>
                               
                              
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Creado el</th>
                                                <th>Linea</th>
                                                <th>Status</th>
                                                <th>Banco</th>
                                                <th>Valor</th>
                                                <th>Estado comision</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                <td>'.$info['id'].'</td>
                                                <td>'.$info['nombre'].'</td>
                                                <td>'.$info['fecha'].'</td>
                                                <td>'.$info['linea'].'</td>
                                                <td>'.$info['status_credito'].'</td>
                                                <td>'.$info['banco'].'</td>
                                                <td>$'.$info['valor_credito'].'</td>
                                                <td><div class="label label-table label-danger">'.$info['estado_comision'].'</div></td>
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
                                <h4 class="card-title">Referidos de mis referidos</h4>
                                <h6 class="card-subtitle">Estos son mis referidos</h6>
                              
                                      <?php
                                            $sqllv2 = pg_query("SELECT * FROM usuarios where id_refer_padre = '$id'");
                                            $rowlv2 = pg_num_rows($sqllv2);
                                            if ($rowlv2) {
                                                while ($infolv2 = pg_fetch_assoc($sqllv2)) {
                                                     $idlv2 = ''.$infolv2['id'].'';

                                                     $sqllv3 = pg_query("SELECT * FROM usuarios where id_refer_padre = '$idlv2'");
                                                     $rowlv3 = pg_num_rows($sqllv3);
                                                     $infolv3 = pg_fetch_assoc($sqllv3);
                                                    
                                                   
                                                           echo '
                                                    <h4 class="card-title">'.$infolv2['nombre'].' '.$infolv2['apellido'].'</h4>
                                                      <div class="table-responsive m-t-40">
                                    <table  class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Codigo</th>
                                                <th>Nombre</th>
                                                <th>Creado el</th>
                                                <th>Linea</th>
                                                <th>Status</th>
                                                <th>Banco</th>
                                                <th>Valor</th>
                                                <th>Estado comision</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <tr>
                                                <td>'.$infolv3['id'].'</td>
                                                <td>'.$infolv3['nombre'].'</td>
                                                <td>'.$infolv3['fecha'].'</td>
                                                <td>'.$infolv3['linea'].'</td>
                                                <td>'.$infolv3['id'].'</td>
                                                <td>'.$infolv3['id'].'</td>
                                                <td>'.$infolv3['id'].'</td>
                                                <td>'.$infolv3['id'].'</td>
                                            </tr>
                                            
                                        </tbody>
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

