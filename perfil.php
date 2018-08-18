<?php
include("inc/topo.php");
require_once("processos/dao.registro.php");
include("processos/dao.post.php");
require_once("processos/dao.usuario.php");
$postDAO = new PostDAO();
$postslista = $postDAO->ListarPost();
$comentariolista = $postDAO->ListarComentario();
$usuarioDAO = new UsuarioDAO();
$usuariolista = $usuarioDAO->listarUsuario();


?>
	<link rel="stylesheet" type="text/css" href="css/perfil.css">
	<section class="perfil">	
		<section id="infoPerfil">
			<div class="fotoCapa">
				<?php foreach($usuariolista as $usuario){
						if($_SESSION["usuario"] == $usuario["id"] && $usuario["fotocapa"] != null){?>				
				<img src="fotos/capa/<?=$usuario["fotocapa"]?>"/>
				<h1><?=$usuario["fotocapa"]?></h1>
			<?php }else if ($_SESSION["usuario"] == $usuario["id"] && $usuario["fotocapa"] == null){?>
				
				<i class="fa fa-image" style="font-size:500px;color:aqua;margin-top: -33px;"></i> 
			<?php }}?>
					
			</div>
			<div id="fotoTopo">
				<form action="usuario_grava.php" method="post" enctype="multipart/form-data">
					<input type="file" name="fotoCapa" id="fotoCapa"/>
					<input type="hidden" name="usercapa" value="<?=$_SESSION["usuario"]?>" />
					<button type="submit">Salvar</button>
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
			
				<form action="usuario_grava.php" method="post" enctype="multipart/form-data">		
					<div>
						<label for="foto">Insira sua foto</label>
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