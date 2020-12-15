<?php 

class Conexion{
	public function conectar(){
		$conectar = mysqli_connect('localhost',
									'root',
									'',
									'agenda');
		return $conectar;


	}
}

?>