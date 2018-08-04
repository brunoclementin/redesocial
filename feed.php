<?php 
	include("inc/topo.php");

	//daos usadas
	include("processos/dao.post.php");
	$postDAO = new PostDAO();
	$postslista = $postDAO->ListarPost();

?>

<link rel="stylesheet" type="text/css" href="css/feed.css" />

<div id="post">
	<?php 
		foreach($postslista as $post){
	?>
	<h3><?=$post["perg"];?></h3>
	
	<div class="commentPerfil">
	<img id="campoFoto" src="fotos/perfil/<?=$post["usuariofoto"]?>"/>
	<p id="user"><?=$post["nome"];?></p>
	</div>
	
	<span><?=$post["data"];?></span>
	<p id="texto"><?=$post["texto"];?></p>
				
	<img src="#" id="gosto" alt="concordo" />
	<span id="abre_comentario" onClick="$('#<?=$post["id_post"];?>').fadeToggle();">Exibir 			    																			Comentarios</span>
	<div hidden="" id="<?=$post["id_post"];?>" name="divComentar">
		<form action="post_grava.php" method="post" id="comentar">
			<input type="hidden" name="id_comentario" value="<?=$post["id_post"]?>"/>
			<textarea name="textocomentario" id="textocomentario" placeholder="digite seu comentario"></textarea>
			<input type="submit" name="btncomentar" value="Comentar"/>
		</form>
	</div>
	
	<?php } ?>
	</div>



<?php
	include("inc/rodape.php");
?>