<?php 
     $idstatus=  $_SESSION['id'];

    $sql = pg_query("SELECT * from usuarios where id='$idstatus'");
    $row = pg_num_rows($sql);
    if ($row) {
        $info = pg_fetch_assoc($sql);
        
         $status_actual=$info['statu_pin'];
        
    }
     if ($status_actual=="activado"){
           $color= 'text-success';
         }else {
           $color= 'text-danger';
           
       }  
?>
 
<style type="text/css">
.bg-warning {
    background-color: #a6c307 !important;
}

</style>
  <div class="container-fluid">
                
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Metodo de pago
                                </h4>
                    </div>
                </div>  
              <div class="row">
                 
                    <div class="col-md-6">
                        <div class="card border-success">
                            <div class="card-header bg-dark">
                                <h4 class="m-b-0 text-white">Elegir método de pago</h4></div>
                            <div class="card-body">
                                
                                <p class="card-text">Elija el metodo de pago ideal para sus clientes, la fecha de pago de las comisiones es el dia 10 de cada mes.</p>
                                 <?php
                                 if ($_GET["errorusuario"]=="si"){
                                 ?>
                                 <div class="alert"><strong style="color: #ffffff;background-color: #B71C1C;padding: 8px;border-radius: 3px;"> ¡Error al actualizar</strong></div>
                                <?php  
                                    }elseif ($_GET["registro"]=="exitoso") {
                                ?>
                                  <div class="success"><strong style="color: #ffffff;background-color: #5baf30;padding: 8px;border-radius: 3px;">Metodo de pago actualizado</strong></div> <br>
                                 <?php 
                                    }  
                                 ?>
                                <form action="app/comisiones/update_mpago.php" method="post">
                                          <div class="form-group row">
                                            
                                            <div class="col-md-9">
                                                    <div class="custom-control custom-radio">
                                                            <input type="checkbox" id="customRadio4" name="pesos" class="custom-control-input" value="si">
                                                            <label class="custom-control-label" for="customRadio4">Pesos Colombianos</label>
                                                    </div> 
                                                    <div class="custom-control custom-radio">
                                                            <input type="checkbox" id="customRadio3" name="btc" class="custom-control-input" onchange="javascript:showContent()" value="si">
                                                            <label class="custom-control-label" for="customRadio3">BTC</label>
                                                    </div>
                                                    <div id="content" style="display: none;"><br>
                                                         <input type="text" class="form-control" name="wallet" placeholder="Introduzca su Wallet" >
                                                         <small class="form-control-feedback">Los pagos en BTC demoran de 48 a 72 Horas en procesarse! </small>
                                                      </div>   
                                                    
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-dark mr-2">Guardar</button>
                                 </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
     </div>
   <script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        customRadio3 = document.getElementById("customRadio3");
        if (customRadio3.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>
 