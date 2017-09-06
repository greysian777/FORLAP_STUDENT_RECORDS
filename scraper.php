<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
//
/** looping over list of ids of doctors **/
for($id = 0; $id <= 40; $id)
	{
	
	$id += 20;
	 $url = ("https://forlap.ristekdikti.go.id/mahasiswa/search/".$id);
  		if($url != null)
  
		{
			echo $url;
		}
  //	$link2 = file_get_html($url);
	}
?>
