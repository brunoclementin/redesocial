<?php 
	include("inc/topo.php");
	include("processos/dao.pergunta.php");
	
	$perguntaDAO = new PerguntaDAO();
	$perguntas = $perguntaDAO->ListarPergunta();
	$perguntaPosicao = rand(0,count($perguntas)-1);

	$pergunta = $perguntas[$perguntaPosicao];
	

?>
<link rel="stylesheet" type="text/css" href="css/paginainicial.css"/>
<div id="posts">
			<h1><?=$pergunta["perguntas"];?></h1>
	
			<form action="post_grava.php" method="post" id="publicar">
				<input type="hidden" name="idpergunta" value="<?=$pergunta["id"];?>"/>
				<textarea name="textoresposta" placeholder="O que você pensa sobre isso?" id="textoresposta"></textarea>
				<input type="submit" id="submit" value="Publicar"/>
			</form>
			
	</div>


<?php
	include("inc/rodape.php");
?>
