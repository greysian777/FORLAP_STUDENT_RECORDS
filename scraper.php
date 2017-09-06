<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//
/** looping over list of ids of doctors **/
for($id = 0; $id <= 2; $id+20)
	{
	 $url = ("https://forlap.ristekdikti.go.id/mahasiswa/search/".$id);
  echo $url;
  
  //	$link2 = file_get_html($url);
}
?>
