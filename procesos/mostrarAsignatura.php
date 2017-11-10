<?php 
 
 include('../configuracion/coxecion.php');
 include('../datos/asignatura.php');

 $asignatura = new Asignatura($conn);
  
 echo $asignatura->readAll();
 
    
 
?>