
<?php 
	
	require_once '../clases/Conexion.php';
	require_once '../clases/crud_contactos.php';

	$contactos= new crud_contactos(); 
	echo json_encode($contactos->obtenerDatos($_POST['idcontacto'])); 





 ?>