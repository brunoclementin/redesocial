<!doctype html>
<html lang="pt-br">
<head>	
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/indexlogin.css"/>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<title>Freedom Mouth</title>
	
</head>

<body>
	
	<?php
	include("processos/dao.pergunta.php");
	
	session_start(); 
	
	require_once("processos/dao.registro.php");
	$usuariosDAO = new RegistroDAO();
	
	if(isset($_SESSION["usuario"]) || isset($_SESSION["usuario.nome"])) {
	$buscarEmail = $usuariosDAO->BuscarEmail($_SESSION["usuario.email"]) ;}	
	
	
	$today = date_default_timezone_set('America/Sao_Paulo');
	$time = 0700;
	$time2 = 1300;
	$time3 = 1900;
	$time4 = 2300;
	$current_time = (int) date('Hi');
	
	$perguntaDAO = new PerguntaDAO();
	if($current_time >= $time && $current_time < $time2){
		$perguntas = $perguntaDAO->ListarDataHora1($time);
		$pergunta = $perguntas[0];
	}
	else if ($current_time >= $time2 && $current_time < $time3){
		$perguntas = $perguntaDAO->ListarDataHora2($time2);
		$pergunta = $perguntas[0];
	}
	else if ($current_time >= $time3 && $current_time < $time4){
		$perguntas = $perguntaDAO->ListarDataHora3($time3);
		$pergunta = $perguntas[0];
	}
	else if ($current_time >= $time4 || $current_time <= $time){
		$perguntas = $perguntaDAO->ListarDataHora4($time4);
		$pergunta = $perguntas[0];
	}
	?>
	
	
		<header class="lateral">
		<nav  class="container">
		
		<ul class="box">
			<div id="fotoCapa">				
					<div id="campoPerfil">
						
						<li class="dropdown">
							<a href="javascript:void(0)" class="dropbtn"><?php if($buscarEmail["foto"] == null){?>
											<i class="fa fa-id-badge" style="font-size:48px"></i><?php
													}else{?>								
							<img id="fotoPerfil" src="fotos/perfil/<?=$buscarEmail["foto"]?>"/><?php }?>
							</a>
							<div class="dropdown-content">
							  <a href="perfil.php"><?=$buscarEmail["nome"]?></a>
							  <a href="logout.php">Sair</a>
							</div>
						</li>
						
					</div>
			</div>
		</ul>
		
		</nav>
		</header>



	
		<h1>Bem-Vindo(a)</h1>
	
	
	<h1 id="pergunta"><?=$pergunta["perguntas"];?></h1>
	
	
	<div id="posts">	
		<form action="post_grava.php" method="post" id="publicar">
			<input type="hidden" name="idpergunta" value="<?=$pergunta["id_per"];?>"/>
			<textarea name="textoresposta" placeholder="O que você pensa sobre isso?" id="textoresposta"
				<?php	  if(!isset($_SESSION["usuario"]) || !isset($_SESSION["usuario.nome"])) 
				{ ?>
				onClick="$('#login').fadeIn(); $('#publicar').hide();" <?php } ?>></textarea> 
			
			  <?php if(isset($_SESSION["usuario"]) || isset($_SESSION["usuario.nome"])) {?>
				<input type="submit" id="submit" value="Publicar"/>
			 <?php } ?>
			
		</form>			
	</div>
	
	<form action="login.php" method="POST" id="login" class="log">
		<p>Login</p>
		<input type="email" name="email_login" class="field" placeholder="E-mail" required="required" />
		<input type="password" name="pass_login" class="field" placeholder="Password" required="required"/>
		<input type="submit" class="btn" value="Entrar"/>
		<a onClick="$('#registrar').fadeIn(); $('#login').hide();">Não tenho uma conta</a>
	</form>
	
	
	<form action="registro_grava.php" method="POST" id="registrar" class="log">
		
		<p>Criar uma conta</p>
		<input type="text" name="nome" class="field" placeholder="Nome" required="required" />
		<input type="email" name="email_registro" class="field" placeholder="E-mail" required="required" />
		<input type="password" name="pass_registro" class="field" placeholder="Password" required="required" />
		<input type="password" name="pass_repetir" class="field" placeholder="Repetir password" required="required" />
		<input type="submit" class="btn" value="Criar Conta"/>
		<a onClick="$('#login').fadeIn(); $('#registrar').hide();">Já tenho uma conta</a>	
	</form>
	
	<footer>
	<p id="credits">&copy; Freedom Mouth, <?php date_default_timezone_set('America/Sao_Paulo'); echo date("Y");?>, Todos os direitos reservados.</p>
	</footer>
	
</body>
</html>