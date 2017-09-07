<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

	
	 $url = ("https://forlap.ristekdikti.go.id/prodi/detail/OEJDQjE0QTYtMzE1Ri00RjY1LUJFQkItQTQ1QzlFMEIyREY1");
  		$link = file_get_html($url) ;
			echo $link;
?>
