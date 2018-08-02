<?php
		/*echo 'Titulo:', $especifico->title, '<br>';
		echo  $especifico->description, '<br>';
		echo '<img src="', $enclosure->url,'">';*/
		//echo "<pre>"; print_r($rss);

		//Essa é a primeira parte das noticias, aqui estão todas as primeiras noticias dos RSS 
		//As tags para uso correspondem os respectivos lugares por exemplo se quer uma imagem de tal site use a variavel $imgnomedosite
		//isso para os casos onde as imagens se encontram dentro do content->attributes
		//Assim como descrição, titulo, data, e todos os outros, exemplo $elpais->title
		//Algumas descrições contem imagens então utilzamos o comando strip_tags para remoção de Tags HTML E PHP de dentro da descrição
		//para esses casos a variavel para descrição fica $descg1, nela contem apenas o texto da descrição
		//para os titulos das noticias devemos usar $nomedosite->title
		//para as datas usamos $nomedosite->pubdate
?>

<?php
		//Feed ElPais
	$feedelpais = file_get_contents('https://brasil.elpais.com/rss/brasil/portada_completo.xml');
	$rsselpais = new SimpleXmlElement($feedelpais);			
	$elpais = $rsselpais->channel->item[0];		
	$imgelpais = $elpais->enclosure[1]->attributes(); //Aqui temos 2 imagens na posição 0 uma grande e na Posição 1 menor
	$descelpais = strip_tags($elpais->description);
?>
		
<?php
		//Feed WWF
		//Aqui as imagens estão dentro da description porem ainda não conseguir acessar separadamente
	$feedwwf = file_get_contents('https://www.wwf.org.br/rss/rss.cfm?B5ABCD22-A9C2-3BB4-44189EF9064E5481',LIBXML_NOCDATA);
	$rsswwf = new SimpleXMLElement($feedwwf);
	$wwf = $rsswwf->channel->item[0];	
	$descwwf = strip_tags($wwf->description); //remove as tags HTML E PHP	
?>	

<?php
		//Feed G1
	$feedg1 = file_get_contents('http://pox.globo.com/rss/g1/');
	$rssg1 = new SimpleXMLElement($feedg1);		
	$g1 = $rssg1->channel->item[11];
	$descg1 = strip_tags($g1->description); //remove as tags HTML e PHP
	if ($g1->children("media",true)->content){
	$g1imagem = $g1->children("media",true)->content->attributes();	
	$imgg1 = $g1imagem['url'];
		}else {
		$imgg1 = "";
	}	
?>	

<?php
		//Feed Reuters NW
	$feedreuters = file_get_contents('http://feeds.reuters.com/Reuters/worldNews'); //Não consegui achar o feed rt brasil
	$rssreuters = new SimpleXMLElement($feedreuters);	
	$reuters = $rssreuters->channel->item[0];
	$descreuters = strip_tags($reuters->description);
?>

<?php	
		//Feed Uol
	$feeduol = file_get_contents('http://rss.home.uol.com.br/index.xml');
	$rssuol = new SimpleXMLElement($feeduol);		
	$uol = $rssuol->channel->item[0];
	$descuol = strip_tags($uol->description);
	if($uol->children("media",true)->content){
		$uolimagem = $uol->children("media",true)->content->attributes();
		$imguol = $uolimagem['url'];
	}else { 
		$imguol = '';
	}
?>

<?php
		//Feed FolhaSP
	$feedfolhasp = file_get_contents('https://feeds.folha.uol.com.br/emcimadahora/rss091.xml');
	$rssfolhasp = new SimpleXMLElement($feedfolhasp);		
	$folhasp = $rssfolhasp->channel->item[0];
	$descfolhasp = strip_tags($folhasp->description);
	if($folhasp->children("media",true)->content){
		$folhaimagem = $folhasp->children("media",true)->content->attributes();
		$imgfolhasp = $folhaimagem['url'];
	}else { 
		$imgfolhasp = '';
	}
?>

<?php
		//Feed BBC
	$feedbbc = file_get_contents('http://feeds.bbci.co.uk/portuguese/rss.xml');
	$rssbbc = new SimpleXMLElement($feedbbc);		
	$bbc = $rssbbc->channel->item[0];
	$descbbc = strip_tags($bbc->description);
	if($bbc->children("media",true)->thumbnail){
		$bbcimagem = $bbc->children("media",true)->thumbnail->attributes();
		$imgbbc = $bbcimagem['url'];
	}else { 
		$imgbbc = '';
	}
?>

<?php
		//Feed EBC -> Não tem imagens em seu xml
	$feedebc = file_get_contents('http://www.ebc.com.br/rss/feed.xml');
	$rssebc = new SimpleXMLElement($feedebc);		
	$ebc = $rssebc->channel->item[0];
	$descebc = strip_tags($ebc->description);
	if($ebc->children("media",true)->thumbnail){
		$ebcimagem = $ebc->children("media",true)->thumbnail->attributes();
		$imgebc = $ebcimagem['url'];
	}else { 
		$imgebc = '';
	}
?>

<?php
		//Feed Estadão -> Não tem imagens em seu xml
	$feedestadao = file_get_contents('https://www.estadao.com.br/rss/ultimas.xml');
	$rssestadao = new SimpleXMLElement($feedestadao);		
	$estadao = $rssestadao->channel->item[0];
	$descestadao = strip_tags($estadao->description);
	if($estadao->children("media",true)->content){
		$estadaoimagem = $estadao->children("media",true)->content->attributes();
		$imgestadao = $estadaoimagem['url'];
	}else { 
		$imgestadao = '';
	}
?>

<?php
		//Feed CBN -> aqui as imagens estão na tag image
	$feedcbn = file_get_contents('http://imagens.globoradio.globo.com/cbn/rss/home/home.xml');
	$rsscbn = new SimpleXmlElement($feedcbn);			
	$cbn = $rsscbn->channel->item[0];		
	$imgcbn = $cbn->image;
	$desccbn = strip_tags($cbn->description);
?>

<?php
		//Feed Gazeta -> aqui as imagens estão na tag image
	$feedgazeta = file_get_contents('https://www.gazetadopovo.com.br/rss/mundo');
	$rssgazeta = new SimpleXmlElement($feedgazeta);			
	$gazeta = $rssgazeta->channel->item[0];		
	$imggazeta = $gazeta->image->url;
	$descgazeta = strip_tags($gazeta->description);
?>

<?php
		//Feed DW -> não existe imagens no xml
	$feeddw = file_get_contents('http://rss.dw.com/rdf/rss-br-all');
	$rssdw = new SimpleXmlElement($feeddw);			
	$dw = $rssdw->item[0];	
	$descdw = $dw->description;
?>

<?php
		//Feed Hardware -> não existe imagens no xml
	$feedhardware = file_get_contents('https://www.hardware.com.br/feeds/global.xml');
	$rsshardware = new SimpleXmlElement($feedhardware);			
	$hardware = $rsshardware->channel->item[0];	
	$deschardware = $hardware->description;
?>

<?php
		//Feed PcWorld 
	$feedpcworld = file_get_contents('http://pcworld.com.br/RSS2/');
	$rsspcworld = new SimpleXmlElement($feedpcworld);			
	$pcworld = $rsspcworld->channel->item[0];	
	$descpcworld = $pcworld->description;
	$imgpcworld = $pcworld->enclosure->attributes()->url;
?>

<?php
		//Feed IDG 
	$feedidg = file_get_contents('http://idgnow.com.br/RSS2/');
	$rssidg = new SimpleXmlElement($feedidg);			
	$idg = $rssidg->channel->item[0];	
	$descidg = $idg->description;
	$imgidg = $idg->enclosure->attributes()->url;
?>

<?php
		//Feed Publica -> Aqui fotos e videos, estão dentro da encoded, ainda temos que descobrir como pegar os elementos html dentro dessas tags, e é necessario pois a conteudos interessantes
	$feedpublica = file_get_contents('https://apublica.org/category/portugues/feed/');
	$rsspublica = new SimpleXmlElement($feedpublica);			
	$publica = $rsspublica->channel->item[0];	
	$descpublica = $publica->description;
	$tudopublica = $publica->children("content",true)->encoded;
	
?>

<?php 
	//Aqui temos uma estrutura de repetição para 3 noticias do elpais, podemos usar em alguns casos ela tem o limite de 3 noticias, podemos almentar também, e fazer o mesmo para as outras noticias ou podemos usar o FOREACH para trazer todas elas	
	$limit = 3;

	for($i = 0; $i >= $limit; $i++){
		$elpais2 = $rsselpais->channel->item[$i];
		$imgelpais2 = $elpais->enclosure[1]->attributes();
		$descelpais2 = strip_tags($elpais2->description);
		$titleelapais2 = $elpais2->title;
			
		
	}


?> 

	
	

	


	
	
	
	
	
	

		

