<?php 
 
 include('../configuracion/coxecion.php');
 include('../datos/carrera.php');

 $asignatura = new Carrera($conn);
  
 echo $asignatura->obtenerCarrera();
 
    
 
?>