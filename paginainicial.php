<link rel="stylesheet" type="text/css" href="css/paginainicial.css"/>

<?php 
	include("inc/topo.php");
	include("processos/dao.pergunta.php");
	
	$perguntaDAO = new PerguntaDAO();
	$perguntas = $perguntaDAO->ListarPergunta();
	// $perguntaPosicao = rand(0,count($perguntas)-1);

	$pergunta = $perguntas[0];
	$pergunta2 = $perguntas[1];
	$pergunta3 = $perguntas[2];
	$pergunta4 = $perguntas[3];

?>


<?php
$today = date_default_timezone_set('America/Sao_Paulo');
$time = 0700;
$time2 = 1300;
$time3 = 1900;
$time4 = 2300;
$current_time = (int) date('Hi');
if($current_time >= $time && $current_time < $time2) {
    echo "<h1>$pergunta[perguntas]</h1>";
}

	else if ($current_time >= $time2) {
	echo "<h1>$pergunta2[perguntas]</h1>";
	}

	else if ($current_time >= $time3) {
		echo "<h1>$pergunta3[perguntas]</h1>";
	}

	else if ($current_time >= $time4 && $current_time < $time) {
		echo "<h1>$pergunta4[perguntas]</h1>";
	}
?>



<div id="posts">

	
			<form action="post_grava.php" method="post" id="publicar">
				<input type="hidden" name="idpergunta" value="<?=$pergunta["id"];?>"/>
				<textarea name="textoresposta" placeholder="O que você pensa sobre isso?" id="textoresposta"></textarea>
				<input type="submit" id="submit" value="Publicar"/>
			</form>
			
	</div>


<?php
	include("inc/rodape.php");
?>
