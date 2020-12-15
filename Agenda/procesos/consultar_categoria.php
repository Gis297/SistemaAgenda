<?php 

	require_once 'clases/crud_categoria.php';

	$categorias = new crud_categoria(); 
	$sel = $categorias->consulta();
	 

 ?>