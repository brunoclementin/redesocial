<?php 
	include("inc/topo.php");

?>
<div id="elpais">
		
	 <?php
		$feed = file_get_contents('https://brasil.elpais.com/rss/brasil/portada_completo.xml');
		$rss = new SimpleXmlElement($feed);
		
		 //echo "<pre>"; print_r($rss);
		$especifico = $rss->channel->item[1];
		
		
		$enclosure = $especifico->enclosure[0]->attributes();

		echo 'Titulo:', $especifico->title, '<br>';
		echo  $especifico->description, '<br>';
		echo '<img src="', $enclosure->url,'">';
		 ?>
		 
	</div>
	
	<div id="g1">
		
	 <?php
		$feed = file_get_contents('http://pox.globo.com/rss/g1/');
		$rss = simplexml_load_string($feed);
		
		 //echo "<pre>"; print_r($rss);
		$especifico = $rss->channel->item[0];
		
		
		echo 'Titulo:', $especifico->title, '<br>';		
		echo  $especifico->description, '<br>';
		echo  $especifico->media, '<br>';
		
		 ?>
		 
	</div>
	
	<div id="uol">
	<?php	
		
		/* $feed = file_get_contents('http://globoesporte.globo.com/servico/semantica/editorias/plantao/feed.rss');		
		$rss = new SimpleXmlElement($feed);
		

		foreach(>cha$rss-nnel->item as $noticia) {
			echo '<p><a href="'.$noticia->link.'" title="'. $noticia->title .'">'.$noticia->title.''.$noticia->description.'</a></p>';
}
	*/?>
	</div>


<?php 
	include("inc/rodape.php");

?>