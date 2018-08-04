<?php 
	session_start();
	include_once("processos/dao.post.php");
	


	
	$texto = $_POST["textoresposta"];
	$user = $_SESSION["usuario"];
	$usuario = $_SESSION["usuario.nome"];
	$pergunta = $_POST["idpergunta"];
	$comentarioid = $_POST["id_comentario"];
	$textocomentario = $_POST["textocomentario"];
	
		//Aqui fazemos o registro da opnião sobre a pergunta
	$postDAO = new PostDAO();
	if ($texto == ""){
		echo "<h3>Você tem que escrever alguma coisa</h3>";		
	}else{
		$postar = array($texto,$user,$usuario,$pergunta);
		$sucesso = $postDAO->Postar($postar);
		if($sucesso){
			header("Location: feed.php");
			exit();
		}else{
			header("Location: index.php?erro=". $postDAO->Mensagem);
		}
	
	}


		//Aqui Fazendos o registro do comentario
	

	$comentarDAO = new PostDAO();
	$comentar = array($textocomentario,$user,$usuario,$comentarioid);
	$sucesso = $comentarDAO->Comentar($comentar);
	if($sucesso){
		header("Location: feed.php?comentariook");
	}
	else{
		header("Location: feed.php?erro=". $comentarDAO->Mensagem);
	}
	

		


?>