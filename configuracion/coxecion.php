<?php
/* 
capturo el error y muestro
*/
$dns='mysql:dbname=septimosemestre;host=localhost;charset=utf8';
$dbuser='root';
$dbuserpw='';
try {
 $conn=new PDO($dns,$dbuser,$dbuserpw);
 $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 //echo " <b><center>CONEXION EXITOSA!";


} catch (Exception $e) {
	echo "error! se ha producidoel siguiente error". $e->getMessage();
}

?>