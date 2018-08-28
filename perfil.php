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
	<script type="text/javascript">
		$(document).ready(function(){
			$(".fotoCapa").mouseenter(function(){
				$("#fotoTrocaTopo").fadeIn("linear"),
				$(".infoUsu").fadeIn("linear");
			});
			$(".fotoCapa").mouseleave(function(){
				$("#fotoTrocaTopo").fadeOut("linear"),
				$(".infoUsu").fadeOut("linear");
			});
		});
	</script>
	<section class="perfil">	
		<section id="infoPerfil">
			<div class="fotoCapa">
				<div hidden="" id="fotoTrocaTopo">
				<form action="usuario_grava.php" method="post" enctype="multipart/form-data">					
					<input onChange="form.submit()" type="file" name="fotoCapa" id="inputFotoCapa"/>
					<label  for="inputFotoCapa" class="inputFotoCapa-label">Altere sua Capa</label>
					<input type="hidden" name="usercapa" value="<?=$_SESSION["usuario"]?>" />					
				</form>
			</div>
				<?php foreach($usuariolista as $usuario){
						if($_SESSION["usuario"] == $usuario["id"] && $usuario["fotocapa"] != null){?>				
				<img id="fotoCapaPerfil" src="fotos/capa/<?=$usuario["fotocapa"]?>"/>				
			<?php }else if ($_SESSION["usuario"] == $usuario["id"] && $usuario["fotocapa"] == null){?>
				
				<img id="fotoCapaPerfil" src="fotos/capa/fotocapa.png"/> 
			<?php }}?>			
			</div>
			<div hidden="" class="infoUsu">				
					<form id="descricaoUsuarioForm" action="usuario_grava.php" method="post">
						<p id="nomeUsuario"><?=$_SESSION["usuario.nome"]?></p>
						<p id="descicaoUsuario">Eu sou bruno, tenho 24 anos, estudo programação e gosto muito de musica</p>						
					</form>			
				
					<form class="formInputFotoPerfil" action="usuario_grava.php" method="post" enctype="multipart/form-data">			
						<label id="inputPerfilFoto-label" for="inputPerfilFoto"><img src="fotos/perfil/06b779169c4828b39819624de59039df.jpg"></label>
						<input onChange="form.submit()" type="file" name="arquivo" id="inputPerfilFoto">  			
						<input type="hidden" name="usuario" value="<?=$_SESSION["usuario"]?>" />
						<input id="btnEditarPerfil" type="button" name="editarPerfil" value="Editar Perfil">							
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