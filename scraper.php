<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$links = array("https://forlap.ristekdikti.go.id/prodi/detail/MzM5RDRFRUUtODcwRC00QUJBLUI3REYtODU4REFBRkQ4OTRC");
for($i = 0; $i < count($links); $i++)
	{
			$link = file_get_html($links[$i]);
			echo $link;

?>
