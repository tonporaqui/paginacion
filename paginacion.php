<?php
include("funciones.php");// incluimos archivo funciones.php

/*este es un cambio para commit*/

$link=conect(); // nos conectamos a BD
$tabla='nombre_tabla'; //el nombre de la tabla donde necesitaras la info.
$pagina=1; //la pagina comienza en 1
$numeroPaginas=9; //cantidad de paginas 10-1 para mostrar 10 en el li
$cantidadMostrar=5; //cantidad de datos por pagina a mostrar

if(array_key_exists('pagina', $_GET)){ //consultamos pagina, para obtener pagina actual.
	$pagina = $_GET['pagina'];
}

$consulta=countTabla($tabla,$link); //contamos la cantida de registro de la tabla
while ($row = mysql_fetch_array($consulta)) {
	$cuenta=$row['cuenta'];
}


$max_num_paginas = intval($cuenta/$numeroPaginas); //obtenemos las paginas a mostrar.


$consulta=selectAllTabla($tabla,$pagina,$numeroPaginas,$cantidadMostrar,$link); //imprimimos el resultado con la consulta definida en el LIMIT
while ($row = mysql_fetch_array($consulta)) {
	$nombre=$row['nombre_atributo_table'];
	echo $nombre."<br>"; //podria ser tambien en formato <table>
}



paginacion($pagina,$max_num_paginas,$cuenta,$numeroPaginas);//imprimimos la paginacion resultante, compatible con bootstrap


?>