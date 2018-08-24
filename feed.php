<?php 
	include("inc/topo.php");

	//daos usadas
	include("processos/dao.post.php");
	include("processos/dao.messagelike.php");
	include("message_like_ajax.php");
	$postDAO = new PostDAO();
	$postslista = $postDAO->ListarPost();
	$comentariolista = $postDAO->ListarComentario();

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/feed.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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
	
	//Function para incrementar o sistema de Likes
	/*$(function() {
    $('.like').on('click', function() {
        $(this).next('.likes').find('span').text(function() {
            if (parseInt($(this).text()) === 0) {
                return parseInt($(this).text() + 1);
            }
            else {
                return 0;
            }
        });
    });
});*/
			
				//JavaScript para o sistema de Likes
$('.like').on("click",function()
{
var ID = $(this).attr("id");
var sid=ID.split("like");
var New_ID=sid[1];
var REL = $(this).attr("rel");
var URL='dao.messagelike.php';
var dataString = 'msg_id=' + New_ID +'&rel='+ REL;
$.ajax({
type: "POST",
url: URL,
data: dataString,
cache: false,
success: function(html){

if(REL=='Like')
{
$("#youlike"+New_ID).slideDown('slow').prepend("<span id='you"+New_ID+"'><a href='#'>You</a> like this.</span>.");
$("#likes"+New_ID).prepend("<span id='you"+New_ID+"'><a href='#'>You</a>, </span>");
$('#'+ID).html('Unlike').attr('rel', 'Unlike').attr('title', 'Unlike');
}
else
{
$("#youlike"+New_ID).slideUp('slow');
$("#you"+New_ID).remove();
$('#'+ID).attr('rel', 'Like').attr('title', 'Like').html('Like');
}

}
});
	
</script>

<?php
$msg_id=$row['msg_id'];
$message=$row['message'];
$username=$row['nome'];
$uid=$row['id'];
?>

<?php
if($like_count>0)
{$query=mysqli_query($db,"SELECT U.nome,U.id FROM message_like M, users U WHERE U.id=M.id_fk AND M.msg_id_fk= ? LIMIT 3");
?>
<div class='likeUsers' id="likes<?php echo $msg_id ?>">
<?php
$new_like_count=$like_count-3;
while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
$like_uid=$row['id'];
$likeusername=$row['nome'];
if($like_uid==$uid)
{
echo '<span id="you'.$msg_id.'"><a href="'.$likeusername.'">You</a>,</span>';
}
else
{
echo '<a href="'.$likeusername.'">'.$likeusername.'</a>';
} 
}
echo 'and '.$new_like_count.' other friends like this';
?>
</div>
<?php }
else {
echo '<div class="likeUsers" id="elikes'.$msg_id.'"></div>';
} ?>

<div id="post">
	<?php 
		foreach($postslista as $post){
	?>
	<div class="commentPerfil">
		<div class="conteudoPost">
			<div id="perguntaFeed">
			<h3 id="perguntatexto">"<?=$post["perg"];?>"</h3>	
			</div>
			<?php if($post["usuariofoto"] == null){?><i class="fa fa-id-badge" style="font-size:48px"></i><?php
										}else{?>
			<img id="campoFotoFeed" src="fotos/perfil/<?=$post["usuariofoto"]?>"/><?php }?>
			
			
			<p id="user"><b><?=$post["nome"];?></br></p>
			<span id="dataPost"><?=$post["data"];?></span>
			<!--Div do comentário com o botão de Likes-->
			<div>
			  <ul>
			    <li>
			      <p id="texto"><?=$post["texto"];?></p>
			      <button class="like">Concordo</button>
			      <span class="likes"><span>0</span> curtidas</span>
			    </li>
			  </ul>
			</div>

			<!--Sistema de likes-->
<div>
<?php
$msg_id=$_POST['msg_id']; //Ver de onde vai buscar
$uid=$_SESSION["usuario"]; //Message user id.

			
$dao = new LikesDAO();
$like = $dao->detectID($uid, $msg_id);
			
if($like!=null)
{
echo '<a href="#" class="like" id="like'.$msg_id.'" title="Unlike" rel="Unlike">Unlike</a>';
 }
else
{
echo '<a href="#" class="like" id="like'.$msg_id.'" title="Like" rel="Like">Like</a>';
} ?>
</div>

			
		<!--Utilizado CDN Font Awesome para aplicar icone-->	
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
		</form>
			<?php
			
			foreach($comentariolista as $coment){
			if($coment["id_post"] == $post["id_post"]){?>
			
			<section class="comentariosPost">
				<?php if($coment["userfoto"] == null){?><i class="fa fa-id-badge" style="font-size:48px"></i><?php
										}else{?>
				<img id="campoFotoFeed" src="fotos/perfil/<?=$coment["userfoto"]?>"/><?php }?>
				<p id="usercoment"><b><?=$coment["nome_usuario"]?></b></p>
				<span id="dataPost"><?=$coment["data"]?><br/></span>
				<span id="textocoment"><?=$coment["textocomentario"]?></span>
				
			</section>
			<?php }} ?>
		
		</div>
	</div>
	
	<?php } ?>
	</div>



<?php
	include("inc/rodape.php");
?>