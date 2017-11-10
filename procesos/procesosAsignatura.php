<?php

	require_once("../configuracion/conexcion.php");  
	require_once("../datos/asignatura.php"); 
	
 $opc=$_POST["opc"];
 
if ($opc==1) {
  $n=$_POST["nombre"];
  $c=$_POST["codigo"];
  $cr= $_POST["credito"];
  $idcarrera= $_POST["idca"];
  $asignatura = new Asignatura($conn);
 $codi=$asignatura->create($c,$n,$cr,$idcarrera);
 echo json_decode(array('codigo'=>$codi));

 }

 if ($opc==2) {
  $n=$_POST["nombre"];
  $c=$_POST["codigo"];
  $cr= $_POST["credito"];
  $idcarrera= $_POST["idca"];
  $id=$_POST["ida"];
  
  $asignatura = new Asignatura($conn);
 
   if($codi=$asignatura->update($id,$c,$n,$cr,$idcarrera)){
    	echo $asignatura->readAll();
    }

  }
 
//Eliminar registro
 if ($opc==3) {
 	$id=$_POST["ida"];
 	if($asignatura->delete($id)){
 		echo 1;
 	}else{
 		echo 0;
 	}
 }

 //obtener registros
 if ($opc==4) {
 	 echo $asignatura->readAll();
 }

?>