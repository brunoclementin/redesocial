<?php 
	include("inc/topo.php");

	//daos usadas
	include("processos/dao.post.php");
	$postDAO = new PostDAO();
	$postslista = $postDAO->ListarPost();
	$comentariolista = $postDAO->ListarComentario();

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="css/feed.css" />
<script type="text/javascript">
	
	//Aqui é uma solução para textos longos, com um leia mais, não achei algo mais simples que funciona-se dessa forma, por enquanto vamos usando esse.
var wordLimit = 50;

$(function() {
  
  //trata o conteúdo na inicialização da página
  $('p#texto').each(function() {
    var post = $(this);
    var text = post.text();
    //encontra palavra limite
    var re = /[\s]+/gm, results = null, count = 0;
    while ((results = re.exec(text)) !== null && ++count < wordLimit) { }
    //resume o texto e coloca o link
    if (results !== null && count >= wordLimit) {
      var summary = text.substring(0, re.lastIndex - results[0].length);
      post.text(summary + '...');
      post.data('original-text', text);
      post.append('<br/><a href="#" class="read-more">Leia mais</a>');
    }
	  
  });
  
  //ao clicar num link "Leia mais", mostra o conteúdo original
  $('.read-more').on('click', function() {
    var post = $(this).closest('p#texto');
    var text = post.data('original-text');
    post.text(text);
  });
	
	
  
});	

</script>


<div id="post">
	<?php 
		foreach($postslista as $post){
	?>
	<div class="commentPerfil">
	<h3 id="perguntatexto"><?=$post["perg"];?></h3>
	
	
	<img id="campoFotoFeed" src="fotos/perfil/<?=$post["usuariofoto"]?>"/>
	<p id="user"><b><?=$post["nome"];?></b></p>
	
	
	<span><?=$post["data"];?></span>
		
	<p id="texto"><?=$post["texto"];?></p>
	
		<!--Utilizado CDN Font Awesome para aplicar icone-->	
	<button style="font-size:24px">Concordo <i class="fa fa-hand-peace-o"></i></button> 
	<button style="font-size:24px" id="abre_comentario" 
			onClick="$('#<?=$post["id_post"];?>').fadeToggle();">Exibir Comentários 
		<i class="fa fa-angle-double-down"></i></button>
	
	
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
	
	<?php } ?>
	</div>



<?php
	include("inc/rodape.php");
?>