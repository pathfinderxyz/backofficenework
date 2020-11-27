<?php 
     $irp=  $_SESSION['id'];
     
?>
<body class="skin-default card-no-border">
    
   <section id="wrapper">
        <div style="background-image:url(assets/images/background/login-register.jpg);"><br><br>
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                    </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="card card-body">
                            <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">Crear cliente Reduccion</h4><br>
                    
                             <?php
                                 if ($_GET["errorusuario"]=="si"){
                             ?>
                                 <div class="alert"><strong style="color: #ffffff;background-color: #B71C1C;padding: 8px;border-radius: 3px;"> ¡Error al crear usuario!</strong></div>
                           <?php  
                               }elseif ($_GET["registro"]=="exitoso") {
                                ?>
                                  <div class="success"><strong style="color: #ffffff;background-color: #5baf30;padding: 8px;border-radius: 3px;">¡Registro exitoso!</strong></div> <br>
                            <?php 
                                 }  
                             ?>
                           
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                    <form action="app/clientes/save_reduccion.php" method="post">
                                      
                                         <label for="rol">Datos</label>
                                        <div class="form-group">
                                         <input type="text" class="form-control" name="nombre_apellido"  placeholder="Nombre y apellido" required="">
                                        </div>
                                         <div class="form-group">
                                         <input type="tel" class="form-control" name="tel" placeholder="Telefono" required="">
                                        </div>
                                        <div class="form-group">
                                        <label for="rol">Actividad economica</label>
                                        <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="actividad"  required="">
                                                
                                               <option value="">Seleccione una actividad</option>
                                               <option value="Empleado">Empleado</option>
                                               <option value="Prestador de servicios">Prestador de servicios</option>
                                               <option value="Socio o dueño de empresa">Socio o dueño de empresa</option>
                                               <option value="Profesional Independiente">Profesional Independiente</option>
                                               <option value="Rentista">Rentista</option>
                                               <option value="Transportador">Transportador </option>
                                               <option value="Comerciante">Comerciante</option>
                                               <option value="Pensionado">Pensionado</option>
                                               <option value="Otro">Otro</option>
                                        </select>
                                        </div>



                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control" name="ingresos" placeholder="Ingresos" required="">
                                        </div>
                                          <label for="rol">Para compra de cartera</label>
                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control" name="entidad" placeholder="Entidad financiera actual" required="">
                                        </div>
                                      
                                        <div class="form-group">
                                         <input type="text" class="form-control" name="plazo_credito"  placeholder="Plazo del Crédito" required="">
                                        </div>
                                        <div class="form-group">
                                         <input type="number" class="form-control" name="num_cuota"  placeholder="Número de Cuota Actual" required="">
                                        </div>
                                        <div class="form-group">
                                         <input type="text" class="form-control" name="saldo_capital" placeholder="Saldo a Capital del Crédito" required="">
                                        </div>
                                       
                                        <div class="form-group">
                                            <textarea  class="form-control" name="observaciones" placeholder="Observaciones" required=""></textarea>
                                        </div>
                                        <div class="form-group">
                                         <input type="hidden" name="irp" value="<?php echo $irp ?>">
                                        </div>
                                        <button type="submit" class="btn btn-success mr-2">Crear cliente</button>
                                       
                                    </form>

                                </div>
                                 
                            </div>
                        </div>
                     </div>
                     <div class="col-sm-3 col-xs-12">
                    </div>
                     
                </div>
       

    </section>

</body>
