<?php

 class Asignatura{
 
   private $db;
   
   //envia datos ya establecido en lo  que ya tengo 
   
   function __construct($par_db){
   	$this->db=$par_db;
   }

   //metodo crear insertar
  function create($code,$nom,$cre,$idc){
    $sql="INSERT INTO asignatura (codigo,nombre,creditos,idcarrera)
                VALUES(:codigo,:nombre,:creditos,:idcarrera) ";
     try {
       
        $sentencia=$this->db->prepare($sql);
        $sentencia->bindParam(':codigo',$code,PDO::PARAM_STR);
        $sentencia->bindParam(':nombre',$nom,PDO::PARAM_STR);
        $sentencia->bindParam(':creditos',$cre,PDO::PARAM_STR);
        $sentencia->bindParam(':idcarrera',$idc,PDO::PARAM_INT);

        if ($sentencia->execute()) {
            return $this->db->lastInsertId();
        }else{
            return 0;
        }

     } catch (Exception $e) {
        echo "error->>al crear".$e->getMessage();
     }

  }

  //metodo mostrar 
  function read()  {
    $consultar = " SELECT *FROM asignatura";

    try {
           $sentencia=$this->db->prepare($consultar,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
           $sentencia->execute();
           $objAsignatura= array();
           while ($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
          	$asignatura= array();
          	$asignatura['ida']=$fila[0];
     	      $asignatura['codi']=$fila[1];
     	      $asignatura['nom']=$fila[2];
     	      $asignatura['cre']=$fila[3];
      	    $asignatura['idca']=$fila[4];
       	    $objAsignatura[]= $asignatura;

     }   
     
     return json_encode($objAsignatura);
     
    } catch (Exception $e) {
    	echo "hola hay un error al mostrar-->".$e->getMessage();
    }
  }


  //metodo actualizar
  function update($id,$co,$no,$cr,$idc){
   
    try {
      
       $sql="UPDATE asignatura
                SET codigo=:codigo,nombre=:nombre,creditos=:creditos,idcarrera=:idcarrera
                WHERE ida=:ida";
            $pre=$this->db->prepare($sql);
            $pre->bindParam(':codigo',$co,PDO::PARAM_STR);
            $pre->bindParam(':nombre',$no,PDO::PARAM_STR);
            $pre->bindParam(':creditos',$cr,PDO::PARAM_STR);
            $pre->bindParam(':idcarrera',$idc,PDO::PARAM_INT);
            $pre->bindParam(':ida',$id,PDO::PARAM_INT);
          if ($pre->execute()) {
               return true;
          }else{
               return false;
          }
    } catch (Exception $e) {
        echo "hola hay un error al apdate-->".$e->getMessage();
 
    }
  }


  //metodo eliminar
  function delete($id){
    $sql=" DELETE FROM asignatura WHERE ida=:ida";
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


  
    function obtener(){
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

  function readAll(){
    $sql=" SELECT asignatura.ida,asignatura.codigo,asignatura.nombre,asignatura.creditos,carrera.descripcion 
    FROM asignatura 
    INNER JOIN carrera on asignatura.idcarrera=carrera.idcarrera";
    try {

        $sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
           $sentencia->execute();
           $objAsignatura= array();
           while ($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            $asignatura= array();
            $asignatura['ida']=$fila[0];
            $asignatura['codi']=$fila[1];
            $asignatura['nom']=$fila[2];
            $asignatura['cre']=$fila[3];
            $asignatura['carrera']=$fila[4];
            $objAsignatura[]= $asignatura;
         }
      return json_encode($objAsignatura);
    } catch (Exception $e) {
      echo "hola hay un error al readAll-->".$e->getMessage();
    }
  }



function busquedadValorAs($id){
    $sql=" SELECT asignatura.ida,asignatura.codigo,asignatura.nombre,asignatura.creditos,carrera.descripcion,carrera.idcarrera
    FROM asignatura 
    INNER JOIN carrera on asignatura.idcarrera=carrera.idcarrera
     WHERE asignatura.ida=$id";
    try {

        $sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        // $sen->bindParam(':ida',$id,PDO::PARAM_INT);
           $sentencia->execute();
           $objAsignatura= array();
           while ($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            $asignatura= array();
            $asignatura['ida']=$fila[0];
            $asignatura['codi']=$fila[1];
            $asignatura['nom']=$fila[2];
            $asignatura['cre']=$fila[3];
            $asignatura['des']=$fila[4];
            $asignatura['idca']=$fila[5];
            $objAsignatura[]= $asignatura;
         }
      return json_encode($objAsignatura);
    } catch (Exception $e) {
      echo "hola busquedad-->".$e->getMessage();
    }
  }

function busquedadlikee($id){
    $sql=" SELECT asignatura.ida,asignatura.codigo,asignatura.nombre,asignatura.creditos,carrera.descripcion,carrera.idcarrera
    FROM asignatura 
    INNER JOIN carrera on asignatura.idcarrera=carrera.idcarrera
     WHERE asignatura.nombre like '".$id."%' ";
    try {

        $sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        // $sen->bindParam(':ida',$id,PDO::PARAM_INT);
           $sentencia->execute();
           $objAsignatura= array();
           while ($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            $asignatura= array();
            $asignatura['ida']=$fila[0];
            $asignatura['codi']=$fila[1];
            $asignatura['nom']=$fila[2];
            $asignatura['cre']=$fila[3];
            $asignatura['des']=$fila[4];
            $asignatura['idca']=$fila[5];
            $objAsignatura[]= $asignatura;
         }
      return json_encode($objAsignatura);
    } catch (Exception $e) {
      echo "hola busquedad-->".$e->getMessage();
    }
  }




  }

?>