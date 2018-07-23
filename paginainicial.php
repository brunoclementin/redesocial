<?php 
	include("inc/topo.php");
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
			<!--<h1>O que você entende por Resiliência?</h1>-->
	
			<form action="post_grava.php" method="post" id="publicar">
				<textarea name="post_text" placeholder="O que você pensa sobre isso?" id="texto"></textarea>
				<input type="submit" id="submit" value="Publicar"/>
			</form>
			
	</div>


<?php
	include("inc/rodape.php");
?>
