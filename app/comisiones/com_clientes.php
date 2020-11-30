<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_SESSION['id']; 

     
    $sql = pg_query("SELECT * FROM clientes where id_ref_padre =$id");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Comisiones</h4>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 align-self-center">
                                      <h4 class="card-title">Comisiones de mis Clientes</h4>
                                      <h6 class="card-subtitle">Estos son las comisiones de mis clientes</h6>
                                    </div>
                                    <div class="col-md-6">
                                    <h3 class="card-title text-right">Total a pagar : USD XXX</h3>
                                    </div>
                                </div>
                               
                                <div class="table-responsive m-t-40">
                                    <table id="myTable3" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Codigo</th>
                                                <th>Nombre y Apellido</th>
                                                <th>Creado el</th>
                                                <th>Linea de credito</th>
                                                <th>Nivel (D/1N/2N)</th>
                                                <th>Banco</th>
                                                <th>Valor</th>
                                                <th>comision</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                <td>'.$info['id_cliente'].'</td>
                                                <td>'.$info['nombre_apellido'].' '.$info['apellido'].'</td>
                                                <td>'.$info['fecha_creacion'].'</td>
                                                <td>'.$info['linea_credito'].'</td>
                                                <td>Directo</td>
                                                <td>'.$info['entidad'].'</td>
                                                <td>'.$info['valor'].'</td>
                                                <td>'.$info['comision'].'</td>
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