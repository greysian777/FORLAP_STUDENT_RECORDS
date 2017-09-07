<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

	
	 $url = ("https://forlap.ristekdikti.go.id/perguruantinggi/detail/NUFBREYzREYtRDBGOC00QTE3LUJERkQtNjEwOEZDNUNFNDA1");
  		$link = file_get_html($url) ;
			echo $link;
?>
