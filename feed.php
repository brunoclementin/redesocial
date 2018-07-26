<?php 
	include("inc/topo.php");

	//daos usadas
	include("processos/dao.post.php");
	$postDAO = new PostDAO();
	$postslista = $postDAO->ListarPost();

?>



<div id="post">
	<?php 
		foreach($postslista as $post){
	?>
	<h3><?=$post["perg"];?></h3>
	<img src="#" id="user"/>
	<p id="user"><?=$post["nome"];?></p>
	<span><?=$post["data"];?></span>
	<p id="texto"><?=$post["texto"];?></p>
				
	<img src="#" id="gosto" alt="concordo" /></br>
	<?php } ?>
	</div>



<?php
	include("inc/rodape.php");
?>