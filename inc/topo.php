<?php
	session_start();
		if(!isset($_SESSION["usuario"]))
		{
			header("location = index.php");
		exit();
		}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<script type="text/javascript" src="../js/jquery.js"></script>
<title>Documento sem título</title>
</head>

<body>
	<header>
		<nav  class="container">
			<ul>
			<li><a href="#">Inicio</a></li>
			<li><a href="#">Perfil</a></li>
			<li><a href="#" >Noticias</a></li></lo>
			<li><a href="logout.php">Sair</a></li>
			</ul>
		</nav>
	
	</header>
	<main>
