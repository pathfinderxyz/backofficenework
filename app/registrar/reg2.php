<?php 
     $miid=  $_SESSION['id'];
     $patro=  $_SESSION['usuario'];
     
    ?>
<style type="text/css">
    .card-subtitle{
       font-weight: 500 !important;
       color: #212529 !important;
    }
    .wrapper{ 
     
       width:600px; 
       overflow-y:scroll; 
       position:relative;
       height: 300px;
}
</style>
<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
   
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
   <section id="wrapper">
        <div style="background-image:url(assets/images/background/login-register.jpg);"><br><br>
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                    </div>
                     <div class="col-sm-6 col-xs-12">
                        <div class="card card-body">
                            <h4 class="card-title" style="text-align: center;font-size: 22px;font-weight: 600;">Crear cuenta como refer en NeWork</h4><br>
                    
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
                            <h5 class="card-subtitle"> Patrocinador </h5>
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                    <form action="app/registrar/reg22.php" method="post">
                                        <div class="form-group">
                                            
                                            <input type="text" class="form-control" value="<?php echo $patro ?>" name="patrocinador" id="patrocinador" placeholder="patrocinador" required="" >
                                        </div>
                                        <h5 class="card-subtitle"> Inicio de sesion</h5>
                                        <div class="form-group">
                                         <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Nombre de usuario" required="">
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Contraseña" required="">
                                        </div>
                                        <div class="form-group">
                                            
                                            <input type="password" class="form-control"  id="pass2" placeholder="Repetir Contraseña" required="">
                                        </div>
                                        <h5 class="card-subtitle"> Datos Personales</h5>
                                        <div class="form-group">
                                         <input type="text" class="form-control" name="cedula" id="Cedula" placeholder="Cedula" required="">
                                        </div>
                                        <div class="form-group">
                                         <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required="">
                                        </div>
                                        <div class="form-group">
                                         <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" required="">
                                        </div>
                                         <div id="result-correo"></div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="correo" id="correo" placeholder="Correo" required="">
                                        </div>

                                        <div class="form-group">
                                         <input type="tel" class="form-control" name="tel" id="tel" placeholder="Telefono" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="pais" id="pais" placeholder="Pais" required="">
                                        </div>
                                         <div class="form-group">
                                            <label>  Fecha de Nacimiento</label>
                                            <input type="date" class="form-control" name="fecha_nac" id="fecha_nac" placeholder="Fecha de Nacimiento" required="">
                                        </div>
                                        
                                        <div class="form-group">
                                        <label for="rol">Bancos</label>
                                        <select  class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1" name="bancos" id="bancos" required="">
                                                
                                               <option value=""></option>
                                               <option value="ITAU">ITAU</option>
                                               <option value="COLPATRIA">COLPATRIA</option>
                                               <option value="BANCO CAJA SOCIAL">BANCO CAJA SOCIAL</option>
                                               <option value="BANCO POPULAR">BANCO POPULAR</option>
                                               <option value="BANCO AV VILLAS">BANCO AV VILLAS</option>
                                               <option value="BANCO BBVA">BANCO BBVA</option>
                                               <option value="BANCO DE OCCIDENTE">BANCO DE OCCIDENTE</option>
                                               <option value="CREDIFAMILIA">CREDIFAMILIA</option>
                                        </select>
                                        </div>
                                       
                                        <h5 class="card-subtitle">Informacion de Pago</h5>
                                        <div class="form-group">
                                         <h6>Envia exactamente esta cantidad: $28.54"</h6>
                                         <h6><strong>Direccion de Payu:</strong> pagos@nework.com.co</h6>
                                        </div>
                                        
                                        <div class="form-group">
                                         <input type="hidden" name="idrefpadre" value="<?php echo $miid ?>">
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="checkbox1" value="check" required="">
                                                <label class="custom-control-label" for="checkbox1">Aceptas los <a href="extras/terminos.html" target="_blank"> terminos y condiciones</a></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="checkbox" class="custom-control-input" id="checkbox2" value="check2" required="">
                                                <label class="custom-control-label" for="checkbox2">Aceptas nuestras<a href="extras/politicas.html" target="_blank"> Politicas de privacidad</a></label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success mr-2">Crear cuenta</button>
                                        <button type="button" name="Cancelar" class="btn btn-dark" onClick="location.href='index.php'">Cancelar</button>
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
