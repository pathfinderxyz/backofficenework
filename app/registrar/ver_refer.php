<?php 
     
    include '../../coneccion/coneccion.php';
    $id = $_GET['id']; 

     
    $sql = pg_query("SELECT * FROM usuarios");
    
    $row = pg_num_rows($sql);
    
?>
  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Todos los Referidos</h4>
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
                                <h4 class="card-title">Todos los Referidos</h4>
                                <h6 class="card-subtitle">Estos son todos los clientes registrados</h6>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable3" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                                <th>Usuario</th>
                                                <th>Nombre y Apellido</th>
                                                <th>Cedula</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Ciudad</th>
                                                <th>PIN Activo/Inactivo</th>
                                                <th>Fecha de Activacion de PIN</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($row) {
                                                while ($info = pg_fetch_assoc($sql)) {
                                            echo '<tr>
                                                <td>'.$info['usuario'].'</td>
                                                <td>'.$info['nombre'].' '.$info['apellido'].'</td>
                                                <td>'.$info['cedula'].'</td>
                                                <td>'.$info['telefono'].'</td>
                                                <td>'.$info['correo'].'</td>
                                                <td>'.$info['pais'].'</td>
                                                <td>'.$info['statu_pin'].'</td>
                                                <td>'.$info['fecha_pin'].'</td>
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
    <script type="text/javascript">
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
    </script>       
   