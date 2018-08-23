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
	<link rel="stylesheet" type="text/css" href="../css/menulateral.css"/>
	<link rel="stylesheet" type="text/css" href="../css/main_footer.css"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
			<!-- Alternação de BG conforme o horário, JS Method
		<link rel="stylesheet" type="text/javascript" href="../js/background.js"/>
		<link rel="stylesheet" type="text/css" href="../css/dia.css">
		<link rel="stylesheet" type="text/css" href="../css/tarde.css">
		<link rel="stylesheet" type="text/css" href="../css/noite.css"> -->	
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	
							<!-- PHP Method para alternação entre bg's -->
		<style>
			<?php
				date_default_timezone_set("America/Sao_Paulo"); //Lista em: http://www.php.net/manual/pt_BR/timezones.php
				$hora = date("G");
				if ($hora >= 6 && $hora < 12) echo "body, .lateral {background-color:rgb(243, 241, 189);}"; //Dia
				elseif ($hora >= 12 && $hora < 19) echo "body, .lateral {background-color:rgb(237, 122, 17);}"; //Tarde
				else echo "body, .lateral {background-color:rgb(111, 111, 111);}"; //Noite
			?>
		</style>
	
<title>Documento sem título</title>
</head>

<body>
	<header class="lateral">
		<nav  class="container">
		
		<ul class="box">
			<div id="fotoCapa">
				<img id="capaFundo" src="fotos/capa/<?=$buscarEmail["fotocapa"]?>"/> 
				
					<div id="campoPerfil">
						<li class="userFoto">
				<a href="perfil.php"><?php if($buscarEmail["foto"] == null){?>
								<i class="fa fa-id-badge" style="font-size:48px"></i><?php
										}else{?>								
				<img id="fotoPerfil" src="fotos/perfil/<?=$buscarEmail["foto"]?>"/><?php }?><p id="nomeUsu"><?=$buscarEmail["nome"]?></p>
				
				
							<!-- Ajustando a capa para aparecer atrás do perfil 
					
				
					<img id="fotoCapa" src="fotos/perfil/<?=$buscarEmail["fotocapa"]?>"/>  -->
				
			</a>
			</li>
			</div>
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
