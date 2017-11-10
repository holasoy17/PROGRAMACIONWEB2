<?php


  $ida=0;
  $codigo=$_POST['code'];
  $nombre=$_POST['nom'];
  $credito=$_POST['cre'];
  $idcarrera=$_POST['idcarrera'];

 include('../configuracion/coxecion.php');
 include('../datos/asignatura.php');
 
 $asignatura = new Asignatura($conn);
   
  
     $codi=$asignatura->create($codigo,$nombre,$credito,$idcarrera);
      echo json_decode(array('codig'=>$codi));
?>