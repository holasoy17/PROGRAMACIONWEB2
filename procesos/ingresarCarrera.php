<?php
 include('../configuracion/coxecion.php');
 include('../datos/carrera.php');

 $idcarrera=0;
 $des=$_POST['d'];
 $carrera =new Carrera($conn);
 $code=$carrera->crearCarrera($des);

 echo json_decode(array('codi'=>$code));
?>


