<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

	
	 $url = ("https://forlap.ristekdikti.go.id/prodi/detail/QjAwRkIwREUtMUVCOC00MEMwLTk1MDctQjQ3NzlGRUM5MzQ5");
  		$link = file_get_html($url) ;
			echo $link;
?>
