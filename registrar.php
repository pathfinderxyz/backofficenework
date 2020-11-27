<?php 
     
     $idrefpadre=$_GET['ref'];


      include "coneccion/coneccion.php"; 

    $sql = pg_query("select * from usuarios where id='$idrefpadre'");
    $row = pg_num_rows($sql);
    if ($row) {
        $info = pg_fetch_assoc($sql);
        
         $patro=$info['usuario'];
        
    }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icon.png">
    <title>Registrar | Nework</title>
    
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    
   <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script type="text/javascript">
$(document).ready(function() {  
    $('#correo').on('blur', function(){
        $('#result-correo').html('<img src="assets/images/loader.gif" />').fadeOut(1000);

        var correo = $(this).val();       
        var dataString = 'correo='+correo;

        $.ajax({
            type: "POST",
            url: "check_email.php",
            data: dataString,
            success: function(data) {
                $('#result-correo').fadeIn(1000).html(data);
            }
        });
    });              
});    
</script>
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

</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Cargando</p>
        </div>
    </div>
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
                                 <div class="alert"><strong style="color:#B71C1C;">¡Error al crear usuario!</div>
        
                            <?php 
                                 }  
                             ?>
                            <h5 class="card-subtitle"> Patrocinador </h5>
                            <div class="row">
                                
                                <div class="col-sm-12 col-xs-12">
                                    <form action="app/registrar/reg.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="patrocinador" value="<?php echo $patro ?>"id="patrocinador" placeholder="patrocinador" required="" >
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
                                         <input type="hidden" name="idrefpadre" value="<?php echo $idrefpadre ?>">
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
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
</body>

</html>