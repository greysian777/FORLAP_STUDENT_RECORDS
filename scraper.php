<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

	
	 $url = ("https://forlap.ristekdikti.go.id/prodi/detail/QzZGQjk3NkUtQURCMC00NDBCLTk1NTEtNDY1QkYxMUZENDE2/0");
  		$link = file_get_html($url) ;
			echo $link;
?>
