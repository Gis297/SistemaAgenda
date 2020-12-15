<!DOCTYPE html>
<html>
<head>
<?php 
	require_once 'dependencias.php'; 

 ?>
	<title>Agenda</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F29AD6; ">
		<i class="far fa-address-book"></i>
  <a class="navbar-brand" href="#">Agenda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fas fa-home"></i> Inicio<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactos.php"> <i class="far fa-address-card"></i> Contactos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="categoria.php"><i class="fas fa-list"></i> Categorías</a>
      </li>
    </ul>
  </div>
</nav>