<?php
	session_start();
		if(!isset($_SESSION["usuario"]))
		{
			header("location = index.php");
		exit();
		}
include("processos/dao.registro.php");

$usuariosDAO = new RegistroDAO();
$buscarEmail = $usuariosDAO->BuscarEmail($_SESSION["usuario.email"]);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="main.css?version=12" />
	<link rel="stylesheet" type="text/css" href="css/navbar.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>Documento sem título</title>
</head>

<body>
	<header>
		<nav  class="container">
		
		<ul>
			<li><a href="paginainicial.php">Inicio</a></li>
			<li><a href="perfil.php">Perfil</a></li>
			<li><a href="noticias.php">Noticias</a></li></lo>
			<li><a href="logout.php">Sair</a></li>
			<li class="userFoto">
			<div id="campoFoto">
			<a><img src="fotos/perfil/<?=$buscarEmail["foto"]?>"/></a></li>
			</div>
		</ul>
		
		</nav>
	<div class="geral">
	
	
	</header>
	<main>
