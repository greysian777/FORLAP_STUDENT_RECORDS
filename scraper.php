<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$link = 'https://forlap.ristekdikti.go.id/mahasiswa/detail/NUNBNDU1ODgtQjFGNS00NzZCLTkxMjMtN0E1QzNCREFBRkUy/0';

$page = file_get_html($link);
if($page)
{
	echo $table = $page->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table");
}
?>
