<?php 
 
 include('../configuracion/coxecion.php');
 include('../datos/asignatura.php');

 $asignatura = new Asignatura($conn);
  
  $ida=$_POST['idas'];
 echo $asignatura->busquedadlikee($ida);
 
 
?>