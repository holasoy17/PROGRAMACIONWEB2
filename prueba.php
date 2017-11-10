<?php
include('configuracion/coxecion.php');
include('datos/Asignatura.php');

$asignatura	= new Asignatura($conn);

  //echo "<br>".$asignatura->busquedadlike("PRO");

  //echo "<br>".$asignatura->readAll();
  //$query= array(); 
  //$query=json_decode($asignatura->readAll());

  //echo "string".$as->read();
  //echo "string".$asignatura->getnombre();
  /* echo '<table border="4">';
  
  foreach ($query as $obj) {
  	  
        echo "<tr><td>$obj->codi</td><td>$obj->nom</td><td>$obj->cre</td></tr>";

        }
        echo "</table>";*/
  	//echo "<br>".$asignatura->obtener();
  	//include('procesos/ingresarAsignatura.php');
  //echo "<br>".$asignatura->create("HP03","Agricola","2",5);
  //echo "<br><br>".$asignatura->update(3,"HP03","cola","23",2);
  //echo "<br>".$asignatura->delete(1);*/
?>