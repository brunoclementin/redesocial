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
	<img src="fotos/perfil/<?=$post["usuariofoto"]?>"/>
	<p id="user"><?=$post["nome"];?></p>
	<span><?=$post["data"];?></span>
	<p id="texto"><?=$post["texto"];?></p>
				
	<img src="#" id="gosto" alt="concordo" />
	<span id="abre_comentario" onClick="$('#<?=$post["id_post"];?>').fadeToggle();">Comentar</span>
	<div id="<?=$post["id_post"];?>" name="divComentar">
		<textarea placeholder="digite seu comentario" ></textarea>
	</div>
	
	<?php } ?>
	</div>



<?php
	include("inc/rodape.php");
?>