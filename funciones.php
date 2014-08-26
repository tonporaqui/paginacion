<?php
/*
	Nombre: funciones para la paginacion
	version: 1.0.0
	autor: Gaston Sepulveda
	mail: cutkillerone@gmail.com
*/
function conect(){
//datos de conexion
	$res=conex('mysql_host','mysql_user','mysql_password','mysql_nameBD');//acomodar segun tus datos de base de dato

return $res;
}
function conex($host,$user,$pass,$nameBd){
// Conectando simple, seleccionando la base de datos
	$mysql_host = $host;
	$mysql_user = $user;
	$mysql_password = $pass;
	$my_database = $nameBd;

$link = mysql_connect($mysql_host, $mysql_user, $mysql_password)
    or die('No se pudo conectar: ' . mysql_error());
mysql_select_db($my_database) or die('<br> No se pudo seleccionar la base de datos');

return $link;
}
function countTabla($tabla,$link){
//contado datos en tabla
	$consulta=mysql_query("SELECT COUNT(*) AS cuenta FROM ".$tabla,$link) or die(mysql_error());

return $consulta;
}
function selectAllTabla($tabla,$pagina,$numeroPaginas,$cantidadMostrar,$link){
//seleccionando todo lo de la tabla segun LIMIT
	$consulta=mysql_query("SELECT * FROM ".$tabla." LIMIT ".(($pagina-1)*$numeroPaginas).",".$cantidadMostrar,$link) or die(mysql_error());

return $consulta;
}


function paginacion($pagina,$max_num_paginas,$cuenta,$numeroPaginas){
//impresion de paginacion pensado en compatibilidad con bootstrap
	$fin = $pagina + $numeroPaginas; //delimitamos la cantidad de paginas li a mostrar, sera de 10 en 10
	$alto = "no"; //mientras existan paginas a mostrar seguira en alto no
 echo'<ul>
    <li><a href="paginacion.php?pagina=1">Primera</a></li>';// para ir a la primera pagina

    if($fin <= $max_num_paginas){
    	//si el fin es menor o igual seguiremos mostrando paginas
    }else{
      $res = $fin - $max_num_paginas;
      $fin = $fin - $res;//buscamos la diferencia que hay de la pagina alcutal a la ultima pagina a mostrar
      $alto = "si"; //tenemos que estamos en la ultima corrida y si tenemos un alto
    }

      for($i=$pagina-1; $i<$fin;$i++){//iniciamos en la pagina actual - 1, hasta el fin (pagina +9)

        if($pagina == $i+1){

		echo'<li><a href="#">';echo $pagina; echo'</a></li>';//para pagina activa.

        }else{
		
		echo'<li><a href="paginacion.php?&pagina='; echo $i+1; echo'" class="">'; echo $i+1; echo'</a></li>'; //resto de paginas.
 
         }
      }//fin for 
    if($alto == "si"){ //si tenemos un alto......no mostramos mas el boton ver mas
		echo'<li><a href=#>Pagina Actual:'; echo $pagina; echo'</a></li>';
		echo'<li><a href=#>Total Paginas:'; echo $max_num_paginas; echo'</a></li>';
		echo'<li><a href=#>Total Registos:'; echo $cuenta; echo'</a></li>';
    }else{
		echo'<li><a href=paginacion.php?pagina='; echo $i+1; echo'>Ver mas</a></li>';//vemos boton ver mas
		echo'<li><a href=#>Pagina Actual:'; echo $pagina; echo'</a></li>';
		echo'<li><a href=#>Total Paginas:'; echo $max_num_paginas; echo'</a></li>';
		echo'<li><a href=#>Total Registos:'; echo $cuenta; echo'</a></li>';
    }
echo'</ul>';
}





?>