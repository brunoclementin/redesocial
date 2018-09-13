<?php
include("inc/topo.php");

//daos usadas
include("processos/dao.post.php");
include("processos/dao.likes.php");
$postDAO = new PostDAO();
$postslista = $postDAO->ListarPost();
$comentariolista = $postDAO->ListarComentario();
$likeDao = new likesDao();
$likelista = $likeDao->ListarLike();

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="css/feed.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
    //Aqui é uma solução para textos longos, com um leia mais, não achei algo mais simples que funciona-se dessa forma, por enquanto vamos usando esse.
    var wordLimit = 50;

    $(function () {

        //trata o conteúdo na inicialização da página
        $('p#texto').each(function () {
            var post = $(this);
            var text = post.text();
            //encontra palavra limite
            var re = /[\s]+/gm,
                results = null,
                count = 0;
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
        $('.read-more').on('click', function () {
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

    ////JavaScript para o sistema de Likes
    //$('.like').on("click", function () {
    //    var ID = $(this).attr("id");
    //    var sid = ID.split("like");
    //    var New_ID = sid[1];
    //    var REL = $(this).attr("rel");
    //    var URL = 'dao.messagelike.php';
    //    var dataString = 'id_post=' + New_ID + '&rel=' + REL;
    //    $.ajax({
    //        type: "POST",
    //        url: URL,
    //        data: dataString,
    //        cache: false,
    //        success: function (html) {

    //            if (REL == 'Like') {
    //                $("#youlike" + New_ID).slideDown('slow').prepend("<span id='you" + New_ID + "'><a href='#'>You</a> like this.</span>.");
    //                $("#likes" + New_ID).prepend("<span id='you" + New_ID + "'><a href='#'>You</a>, </span>");
    //                $('#' + ID).html('Unlike').attr('rel', 'Unlike').attr('title', 'Unlike');
    //            } else {
    //                $("#youlike" + New_ID).slideUp('slow');
    //                $("#you" + New_ID).remove();
    //                $('#' + ID).attr('rel', 'Like').attr('title', 'Like').html('Like');
    //            }

    //        }
    //    })
    //});
</script>




<div id="post">
    <?php
    foreach($postslista as $post){?>
    
    <div class="commentPerfil">
        <div class="conteudoPost">
            <div id="perguntaFeed">
                <h3 id="perguntatexto">
                    "
                    <?=$post["perg"];?>"
                </h3>
            </div>
            <?php if($post["usuariofoto"] == null){?>
            <i class="fa fa-id-badge" style="font-size:48px"></i>
            <?php
                  }else{?>
            <img id="campoFotoFeed" src="fotos/perfil/<?=$post["usuariofoto"]?>" />
            <?php }?>


            <p id="user">
                <b>
                    <?=$post["nome"];?>
                    <br />
            </p>
            <span id="dataPost">
                <?=$post["data"];?>
            </span>
            <!--Div do comentário com o botão de Likes-->
            <div>
               
                    <ul>
                        <li>
                            <p id="texto">                                
                                <?=$post["texto"];?>
                            </p>
                            
                            <form action="likes.php" method="post"> 
                            <button name="likeup" class="like">Concordo</button>  
                                <?php foreach ($likelista as $like){
                                          if($like["msg_id_fk"] == $post["id_post"]){?>
                                <input type="hidden" id="contador" name="contador" value="<?=$like["created"]?>"/>
                                <input type="hidden" id="likeid" name="likeid" value="<?=$like["like_id"]?>" />
                                <input type="hidden" id="userfk" name="userfk" value="<?=$like["id_fk"]?>" />
                                <?php }
                                else{?>
                            <input type="hidden" id="contador" name="contador" value="<?=$like["created"]?>" />   
                                <?php }} ?>
                            
                            <input type="hidden" id="post" name="post" value="<?=$post["id_post"]?>"/>
                            <input type="hidden" id="userid" name="userid" value="<?=$_SESSION["usuario"]?>"/>
                            </form>
                            <?php foreach($likelista as $like){
                            if($like["msg_id_fk"] == $post["id_post"]){
                                //aqui é onde tem que contar os likes
                                $curtidas = count($like["like_id"]); ?>
                            <span class="likes">
                                <span><?=$curtidas;?></span> curtidas
                            </span> 
                            <?php }}?>
                            
                            
                        </li>
                    </ul>
                
            </div>


           


            <!--Utilizado CDN Font Awesome para aplicar icone-->
            <button style="font-size:14px" id="abre_comentario" onclick="$('#<?=$post["id_post"];?>').fadeToggle();">
                Exibir Comentários
            </button>
        </div>


        <!-- Div dos comentarios -->
        <div hidden="" id="<?=$post["id_post"];?>" name="divComentar">

            <form action="post_grava.php" method="post" id="comentar">
                <input type="hidden" name="id_comentario" value="<?=$post["id_post"]?>" />
                <textarea name="textocomentario" id="textocomentario" placeholder="digite seu comentario"></textarea>
                <input type="submit" name="btncomentar" value="Comentar" />
                <br />
            </form>
            <?php

        foreach($comentariolista as $coment){
			if($coment["id_post"] == $post["id_post"]){?>

            <section class="comentariosPost">
                <?php if($coment["userfoto"] == null){?>
                <i class="fa fa-id-badge" style="font-size:48px"></i>
                <?php
                      }else{?>
                <img id="campoFotoFeed" src="fotos/perfil/<?=$coment["userfoto"]?>" />
                <?php }?>
                <p id="usercoment">
                    <b>
                        <?=$coment["nome_usuario"]?>
                    </b>
                </p>
                <span id="dataPost">
                    <?=$coment["data"]?>
                    <br />
                </span>
                <span id="textocoment">
                    <?=$coment["textocomentario"]?>
                </span>

            </section>
            <?php }
        } ?>

        </div>
    </div>

    <?php }
    ?>
</div>



<?php
include("inc/rodape.php");
?>