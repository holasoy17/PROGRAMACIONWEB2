<?php 
 
 include('../configuracion/coxecion.php');
 include('../datos/carrera.php');

 $asignatura = new Carrera($conn);
  
  $idc=$_POST['idca'];
 echo $asignatura->obtenerCarreraId($idc);
 
    
 
?>