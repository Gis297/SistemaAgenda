
<?php 

	require_once '../clases/crud_categoria.php';

	$categoria= new crud_categoria(); 
	$nombre = $_POST['nombre'];
	$descripcion =$_POST['descripcion'];


	echo $categoria->agregar($nombre,$descripcion);
 ?>

