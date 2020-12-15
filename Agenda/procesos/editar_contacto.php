<?php 

require_once '../clases/crud_contactos.php';

$contactos = new crud_contactos(); 
$idcontacto= $_POST['idcontacto'];
$id= $_POST['categoria']; 
$nombre=$_POST['nombre'];
$apaterno= $_POST['apaterno'];
$amaterno=$_POST['amaterno'];
$telefono=$_POST['telefono'];
$email=$_POST['email']; 

echo $contactos->editar($idcontacto,$id, $nombre, $apaterno, $amaterno, $telefono, $email); 
 


 ?>
