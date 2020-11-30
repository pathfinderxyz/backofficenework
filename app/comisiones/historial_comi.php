<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_SESSION['id']; 


     
    $sql = pg_query("SELECT * FROM clientes where id_ref_padre =$id and fecha(m)= '11'");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Historial de Comisiones pagadas</h4>
                    </div>
                    
                </div>
               
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 align-self-center">
                                      <h4 class="card-title">Comisiones pagas de mis clientes</h4>
                                      <h6 class="card-subtitle">Puede filtrar las comisiones por mes</h6>
                                    </div>
                                    
                                </div>
                                <form action="?page=hist_comi" method="post">
                                        <div class="form-group col-md-3">
                                        <label for="rol">Elegir Mes</label>
                                        <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="bancos" id="bancos" required="">
                                                
                                               <option value=""></option>
                                               <option value="Enero">Enero</option>
                                               <option value="Febrero">Febrero</option>
                                               <option value="Marzo">Marzo</option>
                                               <option value="Abril">Abril</option>
                                               <option value="Mayo">Mayo</option>
                                               <option value="Junio">Junio</option>
                                               <option value="Julio">Julio</option>
                                               <option value="Agosto">Agosto</option>
                                               <option value="Septiembre">Septiembre</option>
                                               <option value="Octubre">Octubre</option>
                                               <option value="Noviembre">Noviembre</option>
                                               <option value="Diciembre">Diciembre</option>

                                        </select>
                                        <br><br>
                                        <button type="submit" name="filtrar" class="btn btn-dark">Filtrar</button>

                                        </div>
                                    </form>
                               
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
                                                <th>comision</th>
                                                <th>Fecha de transaccion</th>
                                                
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