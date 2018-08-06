<link rel="stylesheet" type="text/css" href="css/paginainicial.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>

<?php 
	include("inc/topo.php");
	include("processos/dao.pergunta.php");

	$today = date_default_timezone_set('America/Sao_Paulo');
	$time = 0700;
	$time2 = 1300;
	$time3 = 1900;
	$time4 = 2300;
	$current_time = (int) date('Hi');
	
	$perguntaDAO = new PerguntaDAO();
	// $perguntas = $perguntaDAO->ListarPergunta();
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<h1><?=$pergunta["perguntas"];?></h1>
	<div id="posts">	
		<form action="post_grava.php" method="post" id="publicar">
			<input type="hidden" name="idpergunta" value="<?=$pergunta["id_per"];?>"/>
			<textarea name="textoresposta" placeholder="O que você pensa sobre isso?" id="textoresposta"></textarea>
			<input type="submit" id="submit" value="Publicar"/>
		</form>			
	</div>
<?php
	include("inc/rodape.php");
?>
