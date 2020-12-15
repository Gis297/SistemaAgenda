<?php 
	
	require_once '../clases/Conexion.php';
	require_once '../clases/crud_categoria.php';

	$categoria= new crud_categoria(); 
	echo json_encode($categoria->obtenerDatos($_POST['idcategoria'])); 




 ?>