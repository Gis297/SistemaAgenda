<?php 

require_once 'Conexion.php';
 	class crud_contactos extends Conexion{

 		public function agregar($id_categoria, $nombre, $apellidop, $apellidom, $tel, $mail){
 			$c = Conexion::conectar(); 
 			$sql = "INSERT INTO contactos (id_categoria,nombre, apellidop, apellidom, telefono, email) values ('$id_categoria','$nombre' ,'$apellidop', '$apellidom', '$tel','$mail')";

 			$result = mysqli_query($c, $sql);

 			return $result;
 		}

 		public function obtenerDatos($id_contacto){
 			$c = Conexion::conectar(); 
 			$sql= "SELECT
			categoria.nombre as categoria,
			contactos.nombre as nombre,
			apellidop,
			apellidom,
			telefono,
			email 
			from contactos inner join categoria on contactos.id_categoria=categoria.id_categoria where id_contactos= '$id_contacto'";

			$result = mysqli_query($c, $sql);
			$data=  mysqli_fetch_row($result);

			$datos= array('nombre'=> $data[1], 
						'apaterno'=> $data[2],
						'amaterno'=> $data[3],
						'telefono'=> $data[4],
						'email'=> $data[5]);

			return $datos; 
 		}

 	public function editar($id,$id_categoria, $nombre, $apellidop, $apellidom, $tel, $mail){
 			$c = Conexion::conectar(); 
 			$sql = "UPDATE contactos set id_categoria= '$id_categoria', nombre='$nombre', apellidop ='$apellidop', apellidom= '$apellidom', telefono='$tel', email='$mail' where id_contactos= '$id'";

 			$result = mysqli_query($c, $sql);

 			return $result;
 		}

 	public function eliminar($id){

 		$c = Conexion::conectar(); 
 		$sql ="DELETE from contactos where id_contactos='$id'"; 

 		$result = mysqli_query($c, $sql);

 			return $result;
 	}	

 	}







 ?>