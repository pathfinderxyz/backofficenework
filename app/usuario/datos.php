<?php 
     $idrefp=  $_SESSION['id_refer_padre'];

    $sql = pg_query("select * from usuarios where id='$idrefp'");
    $row = pg_num_rows($sql);
    if ($row) {
        $info = pg_fetch_assoc($sql);
        
         $patro=$info['usuario'];
        
    }
    ?>

          <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Datos Personales</h4>
                    </div>
                  
                </div>
               
                <!-- Row -->
                <div class="row">
                
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="assets/images/users/1.png" class="img-circle" width="150" />
                                        <h4 class="card-title"><?php  echo $_SESSION['nombre'];?> <?php  echo $_SESSION['apellido'];?></h4>
                                    <h6 class="card-subtitle"><?php  echo $_SESSION['usuario'];?></h6>
                                    <p class="text-dark">Miembro desde <?php echo $_SESSION['fecha'];?></p>
                                   
                                </center>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card">
                            <div class="card-body"> 
                                <small class="text-muted">Link de Referido </small><h6><a href="https://backoffice.nework.com.co/registrar.php?ref=<?php echo $_SESSION['id'];?>">https://backoffice.nework.com.co/registrar.php?ref=<?php echo $_SESSION['id'];?></a></h6>
                                 <small class="text-muted">Status </small><h6><?php echo ucfirst($_SESSION['statu_pin']);?></h6>  
                                <small class="text-muted">Correo </small><h6><?php echo $_SESSION['correo'];?></h6> 
                                <small class="text-muted p-t-30 db">Telefono</small><h6><?php echo $_SESSION['telefono'];?></h6> 
                                <small class="text-muted p-t-30 db">Pais</small> <h6><?php echo $_SESSION['pais'];?></h6>
                                <small class="text-muted p-t-30 db">Referido de</small> <h6><?php echo $patro ?></h6>
                               
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                             <div class="card-body">
                                
                             <form class="form-horizontal form-material" action="#">
                                             
                                            <div class="form-group">
                                                <label class="col-md-12">Cedula/pasaporte</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Nombre</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $_SESSION['nombre'];?>"  class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Apellido</label>
                                                <div class="col-md-12">
                                                    <input type="text" value="<?php echo $_SESSION['apellido'];?>"  class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Telefono</label>
                                                <div class="col-md-12">
                                                    <input type="number" value="<?php echo $_SESSION['telefono'];?>"  class="form-control form-control-line">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="col-md-12">Banco</label>
                                                <div class="col-md-12">
                                                    <input type="text"  class="form-control form-control-line">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Password</label>
                                                <div class="col-md-12">
                                                    <input type="password" value="password" class="form-control form-control-line">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                    <label>Cedula</label><br><br>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Subir</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputGroupFile01">
                                            <label class="custom-file-label" for="inputGroupFile01">Suba una foto en formato PNG o JPG</label>
                                        </div>
                                    </div>
                                </div>
                                            
                                        </form>
                                        <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success">Actualizar datos</button>
                                                </div>
                                            </div>
                            </div>
                            
                           
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                
          </div>