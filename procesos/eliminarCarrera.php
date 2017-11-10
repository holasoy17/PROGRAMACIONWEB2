<?php 
 
 include('../configuracion/coxecion.php');
 include('../datos/carrera.php');

 $asignatura = new Carrera($conn);
  
 	$id=$_POST["idca"];
 	if($asignatura->eliminar($id)){
 		echo 1;
 	}else{
 		echo 0;
 	}
 
 
?>