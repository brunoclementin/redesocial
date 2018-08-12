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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="css/navbar.css" /> -->
	<link rel="stylesheet" type="text/css" href="css/menulateral.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>Documento sem título</title>
</head>

<body>
	<header class="lateral">
		<nav  class="container">
		
		<ul class="box">
			<li class="userFoto">
			<div id="campoFoto">
			<a href="perfil.php">
								
				<img  src="fotos/perfil/<?=$buscarEmail["foto"]?>"/><?=$buscarEmail["nome"]?></a></li>
			</div>
			<li><a href="paginainicial.php">Inicio</a></li>
			<li><a href="feed.php">Feed</a></li>
			<li><a href="noticias.php">Noticias</a></li></lo>
			<li><a href="logout.php">Sair</a></li>
			
		</ul>
		
		</nav>
	<div class="geral">
	
	
	</header>
	<main>
