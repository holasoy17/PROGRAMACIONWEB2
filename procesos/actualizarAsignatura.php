<?php

include('../configuracion/coxecion.php');
include('../datos/asignatura.php');
$asignatura	= new Asignatura($conn);
  
  
  $ida=$_POST['id'];
  $codigo=$_POST['code'];
  $nombre=$_POST['nom'];
  $credito=$_POST['cre'];
  $idcarrera=$_POST['idcarrera'];

     $codigo=$asignatura->update($ida,$codigo,$nombre,$credito,$idcarrera);
   if ($codigo>0){
   	  echo $asignatura->readAll();
   }
?>