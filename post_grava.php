<?php 
	session_start();
	include_once("processos/dao.post.php");
	


	
	$texto = $_POST["post_text"];
	$user = $_SESSION["usuadio"];
	$email = $_SESSION["usuario.email"];
	$usuario = $_SESSION["usuario.nome"];

	$postDAO = new PostDAO();
	if ($texto = ""){
		echo "<h3>Você tem que escrever alguma coisa</h3>";		
	}else{
		$postar = array($user,$usuario,$texto,$email);
		$sucesso = $postDAO->Postar($postar);
		if($sucesso){
			header("Location: feed.php");
			exit();
		}else{
			header("Location: index.php?erro=". $postDAO->Mensagem);
		}
	
	}
	

		


?>