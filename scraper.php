<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//
/** looping over list of ids of doctors **/
for($id = 20;$id <= 20; $id+=20)
	{
	
	
	 $url = ("https://forlap.ristekdikti.go.id/mahasiswa/search/".$id);
  		$link = file_get_html($url) ;
			echo $link;
	}
?>
