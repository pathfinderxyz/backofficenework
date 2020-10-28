<?php  
	$user = 'iprhayuzjjvjle';
	$passwd = 'a031e7bfdba6ffe6e4002e5f10aab60716cc88c5152b4cfb68771327312081ca';
	$db = 'd789e39p2pck55';
	$port = 5432;
	$host = 'ec2-34-237-89-96.compute-1.amazonaws.com';
	$strCnx = "host=$host port=$port dbname=$db user=$user password=$passwd";
	$cnx = pg_connect($strCnx) or die ("Error de conexion. ". pg_last_error());

?>