<?php 
 
 include('../configuracion/coxecion.php');
 include('../datos/asignatura.php');

 $asignatura = new Asignatura($conn);
  
 	$id=$_POST["ida"];
 	if($asignatura->delete($id)){
 		echo 1;
 	}else{
 		echo 0;
 	}
 
 
?>