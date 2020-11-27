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
                        <h4 class="text-themecolor">Pago de Pin Refer <span class="<?php  echo $color;?>" style="font-weight: 600;"> (Status <?php  echo ucfirst($status_actual);?>)</span>
                                </h4>
                    </div>
                </div>  
              <div class="row">
                    <div class="col-md-6">
                        <div class="card border-warning">
                            <div class="card-header bg-warning">
                                <h4 class="m-b-0 text-white">Pin Refer (Payu)</h4></div>
                            <div class="card-body">
                                <h3 class="card-title">Costo: USD 40</h3>
                                <p class="card-text">Con el pago de pin podras darte de alta y disfrutar de todos nuestros beneficios como:</p>
                                 <h6 class="card-title">* Registro de clientes</h6>
                                 <h6 class="card-title">* Cobro de comisiones</h6>
                                 <h6 class="card-title">* Aula virtual</h6>
                                 <h6 class="card-title">* Promociones</h6><br>
                                 <?php
                                 if ($_GET["registro"]=="fallido"){
                                 ?>
                                 <div class="alert"><strong style="color: #ffffff;background-color: #B71C1C;padding: 8px;border-radius: 3px;"> El pago no se realizo con exito</strong></div>
                                 <?php  
                                 }
                                ?>
                        
                                <a href="https://biz.payulatam.com/B0d22a111E5F010"><img src="http://www.payulatam.com/img-secure-2015/boton_pagar_grande.png"></a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card border-success">
                            <div class="card-header bg-dark">
                                <h4 class="m-b-0 text-white">Pin Refer (BTC)</h4></div>
                            <div class="card-body">
                                <h3 class="card-title">Costo: USD 40</h3>
                                <p class="card-text">Con el pago de pin podras darte de alta y disfrutar de todos nuestros beneficios como:</p>
                                 <h6 class="card-title">* Registro de clientes</h6>
                                 <h6 class="card-title">* Cobro de comisiones</h6>
                                 <h6 class="card-title">* Aula virtual</h6>
                                 <h6 class="card-title">* Promociones</h6><br>
                                
                                <a href="javascript:void(0)" class="btn btn-inverse">Proximamente ...</a>
                            </div>
                        </div>
                    </div>
                </div>
     </div>
   
 