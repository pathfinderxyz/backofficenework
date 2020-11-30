<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query("SELECT * FROM clientes");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"> Clientes</h4>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Todos los clientes</h4>
                                <h6 class="card-subtitle">Estos son todos los clientes registrados</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable3" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Opciones</th>
                                                <th>codigo</th>
                                                <th>Fecha de creacion</th>
                                                <th>Usuario</th>
                                                <th>Linea de credito</th>
                                                <th>status</th>
                                                <th>Banco</th>
                                                <th>Valor del credito</th>
                                                <th>Codigo del REF</th>
                                                
                                             
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                <td> <div class="btn-group">
                                                     <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                      <i class="ti-settings"></i>
                                                     </button>
                                                     <div class="dropdown-menu animated flipInX">
                                                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"  aria-haspopup="true" onClick="cmodalpeso ('.$info['id'].')" >Actualizar datos </a>
                                                        <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"  aria-haspopup="true" onClick="cargamodal ('.$info['id'].')" >Cambiar Status </a>
                                                        
                                                   
                                                    </div>
                                                    </div></td>
                                                <td>'.$info['id_cliente'].'</td>
                                                <td>'.$info['fecha_creacion'].'</td>
                                                <td>'.$info['nombre_apellido'].'</td>
                                                <td>'.$info['linea_credito'].'</td>
                                                <td>'.$info['status'].'</td>
                                                <td>'.$info['entidad'].'</td>
                                                <td>'.$info['valor'].'</td>
                                                <td>'.$info['id_ref_padre'].'</td>
                                                
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
                
     </div>