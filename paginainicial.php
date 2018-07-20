<?php 
	include("inc/topo.php");
?>

<div id="posts">
		<h1>O que você entende por Resiliência?</h1>
	
			<form action="post_grava.php" method="post" id="publicar">
				<textarea placeholder="O que você pensa sobre isso?" name="post_text"></textarea>
				<input type="submit" id="submit" value="Publicar"/>
			
	</div>


<?php
	include("inc/rodape.php");
?>