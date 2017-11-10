<?php

 /**
 * 
 */
 class Carrera
 {
 	private $db;
 	function __construct($par_db){
       $this->db=$par_db;

 	}



   function crearCarrera($des){
    
      $sql=" INSERT into carrera (descripcion)
                    values(:descripcion)";
                    try {
                    	$sentencia=$this->db->prepare($sql);
                    	$sentencia->bindParam(':descripcion',$des, PDO::PARAM_STR);
                    	if ($sentencia->execute()) {
                    		return $this->db->lastInsertId();
                    	}else{
                    		return 0;
                    	}
                    } catch (Exception $e) {
                    	echo "error->>al crear carrera".$e->getMessage();
                    }
   }


   
  
   

   function obtenerCarrera(){
      $sql=" SELECT *from carrera";
      try {
        $sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
           $sentencia->execute();
           $objAsignatura= array();
           while ($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            $asignatura= array();
            $asignatura['idca']=$fila[0];
            $asignatura['des']=$fila[1];
            $objAsignatura[]= $asignatura;
         }
      return json_encode($objAsignatura);
      } catch (Exception $e) {
        echo "error carrera ".$e->getMessage();
      }
    }
 



 function obtenerCarreraId($id){
      $sql=" SELECT  carrera.idcarrera,carrera.descripcion from carrera
      where idcarrera=$id";
      try {
        $sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
           $sentencia->execute();
           $objAsignatura= array();
           while ($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            $asignatura= array();
            $asignatura['idca']=$fila[0];
            $asignatura['des']=$fila[1];
            $objAsignatura[]= $asignatura;
         }
      return json_encode($objAsignatura);
      } catch (Exception $e) {
        echo "error carrera ".$e->getMessage();
      }
    }
 



function eliminar($id){
    $sql=" DELETE FROM carrera WHERE idcarrera=:ida";
    try {
      $sen=$this->db->prepare($sql);
      $sen->bindParam(':ida',$id,PDO::PARAM_INT);
      if ($sen->execute()) {
         return true;
      }else{
        return false;
      }
    } catch (Exception $e) {
      echo "hola hay un error al delete-->".$e->getMessage();
    }
  }


function actualizar($id,$des){
   
    try {
      
       $sql="UPDATE carrera
                SET descripcion=:des
                WHERE idcarrera=:id";
            $pre=$this->db->prepare($sql);
            $pre->bindParam(':des',$des,PDO::PARAM_STR);
            $pre->bindParam(':id',$id,PDO::PARAM_INT);
           
          if ($pre->execute()) {
               return true;
          }else{
               return false;
          }
    } catch (Exception $e) {
        echo "hola hay un error al apdate-->".$e->getMessage();
 
    }
  }





 }

?>