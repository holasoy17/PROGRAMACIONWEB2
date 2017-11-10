<?php

include('../configuracion/coxecion.php');
include('../datos/carrera.php');
$asignatura	= new Carrera($conn);
  
  
  $ida=$_POST['id'];
  $des=$_POST['des'];


     $codigo=$asignatura->actualizar($ida,$des);
   if ($codigo>0){
   	  echo $asignatura->obtenerCarrera();
   }
?>