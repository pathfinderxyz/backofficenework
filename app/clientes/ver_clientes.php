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
                        <h4 class="text-themecolor">Mis Clientes</h4>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Mis clientes</h4>
                                <h6 class="card-subtitle">Estos son todos los clientes registrados</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable3" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Tipo</th>
                                                <th>Nombre y Apellido</th>
                                                <th>Telefono</th>
                                                <th>Actividad</th>
                                                <th>Ingresos</th>
                                                <th>Linea de credito</th>
                                                <th>Plazo de credito</th>
                                                <th>cuota Anual</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                <td>'.$info['tipo_cliente'].'</td>
                                                <td>'.$info['nombre_apellido'].' '.$info['apellido'].'</td>
                                                <td>'.$info['telefono'].'</td>
                                                <td>'.$info['actividad'].'</td>
                                                <td>'.$info['ingresos'].'</td>
                                                <td>'.$info['linea_credito'].'</td>
                                                <td>'.$info['plazo_credito'].'</td>
                                                <td>'.$info['cuota_anual'].'</td>
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