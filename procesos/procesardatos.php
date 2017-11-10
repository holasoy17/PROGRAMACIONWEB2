<?php


  $n=$_POST["nombre"];
  $c=$_POST["codigo"];
  $cr= $_POST["credito"];
  $id= $_POST["idca"];

  echo $_POST["nombre"]."<<--asignatura";
 

 include('../configuracion/coxecion.php');
 include('../datos/asignatura.php');
 $asignatura = new Asignatura($conn);
 $codi=$asignatura->create($c,$n,$cr,$id);


?>