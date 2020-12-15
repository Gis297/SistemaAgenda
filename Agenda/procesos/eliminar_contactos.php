<?php 

	require_once '../clases/crud_contactos.php';

	$contactos = new crud_contactos(); 
	$id= $_POST['idcontacto']; 
	echo $contactos->eliminar($id); 

 ?>