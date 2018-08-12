<?php
include("inc/topo.php");
require_once("processos/dao.registro.php");
include("processos/dao.post.php");
$postDAO = new PostDAO();
$postslista = $postDAO->ListarPost();
$comentariolista = $postDAO->ListarComentario();
?>
	<link rel="stylesheet" type="text/css" href="css/perfil.css"
	<section class="perfil">	
		<section id="infoPerfil">
			<div id="fotoTopo">
				<form action="usuario_grava.php" method="post" enctype="multipart/form-data">
					<input type="file" name="fotoCapa" id="fotoCapa"/>
					<input type="hidden" name="usuario" value="<?=$_SESSION["usuario"]?>" />
				</form>
			</div>
			<div class="infoUsu">
				<div id="infoSobre">
					<form action="usuario_grava.php" method="post">
						<p><?=$_SESSION["usuario.nome"]?></p>
						<p>Eu sou bruno, tenho 24 anos, estudo programação e gosto muito de musica</p>
						<input type="button" name="editarPergil" value="Editar Perfil">
					</form>			
				</div>
			<h1>Insira sua foto</h1>
				<form action="usuario_grava.php" method="post" enctype="multipart/form-data">		
					<div>
						<label for="foto">Foto</label>
						<input type="file" name="arquivo" id="arquivo">  			
						<input type="hidden" name="usuario" value="<?=$_SESSION["usuario"]?>" />
					</div>		
					<button type="submit">Salvar</button>	
				</form>
			</div>
		</section>
		<section class="postUsuario">
			<?php 
				foreach($postslista as $post){
					if($post["nome"] == $_SESSION["usuario.nome"]){
			?>
				<div class="commentPerfil">
					<div class="conteudoPost">
						<h3 id="perguntatexto"><?=$post["perg"];?></h3>	
						<img id="campoFotoFeed" src="fotos/perfil/<?=$post["usuariofoto"]?>"/>
						<p id="user"><b><?=$post["nome"];?></br></p>
						<span id="dataPost"><?=$post["data"];?></span>
						<p id="texto"><?=$post["texto"];?></p>
	
					<!--Utilizado CDN Font Awesome para aplicar icone-->	
						<button style="font-size:14px"><i class="fa fa-hand-peace-o"></i></button>
						<button style="font-size:14px" id="abre_comentario" 
								onClick="$('#<?=$post["id_post"];?>').fadeToggle();">Exibir Comentários 
						</button>
					</div>
					
					
				<!-- Div dos comentarios -->
				<div hidden="" id="<?=$post["id_post"];?>" name="divComentar">
					
					<form action="post_grava.php" method="post" id="comentar">
						<input type="hidden" name="id_comentario" value="<?=$post["id_post"]?>"/>
						<textarea name="textocomentario" id="textocomentario" placeholder="digite seu comentario"></textarea>
						<input type="submit" name="btncomentar" value="Comentar"/><br/>
						<?php
						
						foreach($comentariolista as $coment){
						if($coment["id_post"] == $post["id_post"]){?>
						
						<img id="campoFotoFeed" src="fotos/perfil/<?=$coment["userfoto"]?>"/>
						<p id="usercoment"><b><?=$coment["nome_usuario"]?></b></p>
						<span id="textocoment"><?=$coment["textocomentario"]?></span>
						<?php }} ?>
					</form>
					</div>
				</div>
	
			<?php }} ?>
		
		
		</section>
	</section>