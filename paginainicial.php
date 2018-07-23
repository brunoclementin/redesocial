<?php 
	include("inc/topo.php");
	include("processos/dao.pergunta.php");
	
	$perguntaDAO = new PerguntaDAO();
	$perguntas = $perguntaDAO->ListarPergunta();
	$perguntaPosicao = rand(0,count($perguntas)-1);

	$pergunta = $perguntas[$perguntaPosicao];
	

?>


<?php
$today = date_default_timezone_set('America/Sao_Paulo');
$time = 1449;
$time2 = 1457;
$current_time = (int) date('Hi');
if($current_time >= $time && $current_time < $time2) {
    echo "O que você entende por Resiliência?";
}

	else if ($current_time >= $time2) {
	echo "xxxxxxxxxxxxxxxxxxxx";
	}
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
