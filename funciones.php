<?php
function conex($host,$user,$pass,$nameBd){
// Conectando, seleccionando la base de datos
	$mysql_host = $host;
	$mysql_user = $user;
	$mysql_password = $pass;
	$my_database = $nameBd;

$link = mysql_connect($mysql_host, $mysql_user, $mysql_password)
    or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysql_select_db($my_database) or die('No se pudo seleccionar la base de datos');

return $link;
}




?>