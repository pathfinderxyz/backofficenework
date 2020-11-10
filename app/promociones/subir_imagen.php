<?php
   include ("../../coneccion/coneccion.php");

   function insertarimagen(){
       
       if (empty($_FILES[$tipo_imagen]["name"])) 
       	     
       	     return;

       	     $file_name = $_FILES[$tipo_imagen]["name"];


       	     $dia = date("d");
       	     $mes = date("m");
       	     $ano = date("y");

       	     $targetDir = "img/$ano/$mes/$dia";

       	     @rmdir($targetDir);

       	     if (!file_exists($targetDir)) {
       	     	@mkdir($targetDir,077,true);
       	     }

       	     $token = md5(uniqid(rand(), true));
       	     $file_name = $token.'.'.$extension;

       	     $add = $targetDir.$file_name;
       	     $db_url_img = "$ano/$mes/$dia/$file_name";

       	     if (move_uploaded_file($_FILES[$tipo_imagen["tmp_name"],$add])) {
       	     	$sql = pg_query("UPDATE incentivos Set $tipo_imagen = '$db_url_img' Where id_promo = $id_promo");
       	     	
       	     }

   }
   ?>