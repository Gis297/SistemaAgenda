<?php 

require_once '../clases/crud_categoria.php';

$categoria = new crud_categoria(); 
$id= $_POST['idcategoria']; 
$nombre=$_POST['nombre'];
$descripcion= $_POST['descripcion'];


echo $categoria->editar($id, $nombre, $descripcion); 
 


 ?>
