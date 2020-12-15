<?php 

	require_once '../clases/crud_categoria.php';

	$categoria = new crud_categoria(); 
	$id= $_POST['idcategoria']; 
	echo $categoria->eliminar($id); 

 ?>