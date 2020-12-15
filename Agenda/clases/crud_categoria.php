<?php 

	require_once 'Conexion.php';
 	class crud_categoria extends Conexion{

 		public function agregar($nombre, $descripcion){
 			$c = Conexion::conectar(); 
 			$sql = "INSERT INTO categoria (nombre,descripcion) values ('$nombre','$descripcion')";

 			$result = mysqli_query($c, $sql);

 			return $result;
 		}

 		public function consulta(){
 			$c = Conexion::conectar();
			 
 			$sql=" SELECT id_categoria,nombre FROM categoria"; 
 			$result = mysqli_query($c, $sql);

 			$datos= array();
 			$i=0; 

 			while($row=mysqli_fetch_assoc($result)){

 				$datos[$i]=$row; 
 				$i++;
 			}

 			return $datos; 
 		}


 		public function obtenerDatos($id_categoria){
 			$c = Conexion::conectar(); 

 			$sql= "SELECT  nombre, descripcion from categoria where id_categoria= '$id_categoria'";

			$result = mysqli_query($c, $sql);
			$data=  mysqli_fetch_row($result);
			$datos= array('nombre'=> $data[0], 
						'descripcion'=> $data[1]);

						
			return $datos; 
 		}

 		public function editar($id, $nombre, $descripcion){
 			$c = Conexion::conectar(); 
 			$sql = "UPDATE categoria set  nombre='$nombre', descripcion ='$descripcion' where id_categoria= '$id'";

 			$result = mysqli_query($c, $sql);

 			return $result;
 		}

 		public function eliminar($id){

 		$c = Conexion::conectar(); 
 		$sql ="DELETE from categoria where id_categoria='$id'"; 

 		$result = mysqli_query($c, $sql);

 			return $result;
 	}	


 	}






 ?>