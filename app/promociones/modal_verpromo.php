<?php
include '../../coneccion/coneccion.php';
include '../../Errores/mostrar_errores2.php';
$idpromo = $_GET['id'];

$sql = pg_query("SELECT * from incentivos where id_promo ='$idpromo'");
$row = pg_fetch_assoc($sql);

  echo '
         <div class="card">
          <img class="card-img-top img-responsive" src="'.$row["url_imagen"].'" alt="Card image cap">
              <div class="card-body">
                 <h4 class="card-title">'.$row["titulo"].'</h4>
                    <p class="card-text">'.$row["descripcion"].'</p>
                    
              </div>
          </div>

   '
          ?>    