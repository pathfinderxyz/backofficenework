<style type="text/css">
/*Now the CSS*/
* {margin: 0; padding: 0;}

.tree ul {
	padding-top: 20px; position: relative;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

.tree li {
	float: left; text-align: center;
	list-style-type: none;
	position: relative;
	padding: 20px 5px 0 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
}

/*We will use ::before and ::after to draw the connectors*/

.tree li::before, .tree li::after{
	content: '';
	position: absolute; top: 0; right: 50%;
	border-top: 1px solid #ccc;
	width: 50%; height: 20px;
}
.tree li::after{
	right: auto; left: 50%;
	border-left: 1px solid #ccc;
}

/*We need to remove left-right connectors from elements without 
any siblings*/
.tree li:only-child::after, .tree li:only-child::before {
	display: none;
}

/*Remove space from the top of single children*/
.tree li:only-child{ padding-top: 0;}

/*Remove left connector from first child and 
right connector from last child*/
.tree li:first-child::before, .tree li:last-child::after{
	border: 0 none;
}
/*Adding back the vertical connector to the last nodes*/
.tree li:last-child::before{
	border-right: 1px solid #ccc;
	border-radius: 0 5px 0 0;
	-webkit-border-radius: 0 5px 0 0;
	-moz-border-radius: 0 5px 0 0;
}
.tree li:first-child::after{
	border-radius: 5px 0 0 0;
	-webkit-border-radius: 5px 0 0 0;
	-moz-border-radius: 5px 0 0 0;
}

/*Time to add downward connectors from parents*/
.tree ul ul::before{
	content: '';
	position: absolute; top: 0; left: 50%;
	border-left: 1px solid #ccc;
	width: 0; height: 20px;
}

.tree li a{
	border: 1px solid #e4bc15;
	padding: 10px 20px;
	text-decoration: none;
	color: #000000;
	font-family: arial, verdana, tahoma;
	font-size: 12px;
	display: inline-block;
	
	border-radius: 5px;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	
	transition: all 0.5s;
	-webkit-transition: all 0.5s;
	-moz-transition: all 0.5s;
	background-color: #e4bc15;
}

/*Time for some hover effects*/
/*We will apply the hover effect the the lineage of the element also*/
.tree li a:hover, .tree li a:hover+ul li a {
	background: #000000; color: #fff; border: 1px solid #000000;
}
/*Connector styles on hover*/
.tree li a:hover+ul li::after, 
.tree li a:hover+ul li::before, 
.tree li a:hover+ul::before, 
.tree li a:hover+ul ul::before{
	border-color:  #94a0b4;
}
.ocultarref{
     display: none !important;
 }

 .padre{
     background: #000000 !important; 
     color: #fff !important;
     border: 1px solid #000000 !important;
 }
 
  .niveldos{
     background: #fff !important; 
     color: #000000 !important;
     border: 1px solid #000000 !important;
 }
/*Thats all. I hope you enjoyed it.
Thanks :)*/
</style><!--
We will create a family tree using just CSS(3)
The markup will be simple nested lists
-->
<?php 
     
    include '../../coneccion/coneccion.php';
    $id=  $_SESSION['id'];

     
    $sql = pg_query("SELECT * FROM usuarios where id_refer_padre = '$id'");
    $row = pg_num_rows($sql);
    
    
?>

<div class="container-fluid">
	            <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Mi RED</h4>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-12">
                        
                         <div class="card">
                            <div class="card-body">	
                            	<h4 class="card-title">Mi RED de Referidos</h4>
                                <h6 class="card-subtitle">Estos son todos mis Refer y sus refer</h6>
<div class="tree">
	<ul>
		<li>
			<a href="#" class="padre"><?php  echo ucfirst($_SESSION['nombre']);?></a>
			  <ul>
			   <?php
                    $sqllv2 = pg_query("SELECT * FROM usuarios where id_refer_padre = '$id'");
                       $rowlv2 = pg_num_rows($sqllv2);
                        if ($rowlv2) {
                         while ($infolv2 = pg_fetch_assoc($sqllv2)) {
                         	 $idlv2 = ''.$infolv2['id'].'';
                              echo'<li> <a href="#">'.$infolv2['usuario'].'</a> ';

                             $sqllv3 = pg_query("SELECT * FROM usuarios where id_refer_padre = '$idlv2'");
                             $rowlv3 = pg_num_rows($sqllv3);
                           


                               if ($rowlv3) {
                               while ($infolv3 = pg_fetch_assoc($sqllv3)) {
                             	 echo'

                             	<ul>

                             	 
                             	       <a href="#" class="niveldos">'.$infolv3['usuario'].'</a>
                             	   
                             	
                             	    </li>
                             	</ul> 

                             	 ';
                               }
                               }
                            
                               
                               
                            


                         }
                             }else{
                             }
                            ?>

              </ul>
		</li>
	</ul>
</div>
</div>

</div>
</div>
</div>
</div>
