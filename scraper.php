<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

	
	 $url = ("https://forlap.ristekdikti.go.id/prodi/detail/NEE1RjZCOTItRjRBOS00RTQ4LTgzN0ItRjBFMjVGOTRGQkIz");

/* gets the data from a URL */
function get_data($url) {
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}
  		$link = file_get_html($url);
		foreach($link->find("//[@id='mahasiswa']/table/tbody/tr") as $element){
		$linkof = $element->find("td[3]/a" , 0)->href;
			if($linkof != null){
					$view = file_get_html($linkof);
				echo $view;
			}
		}

?>
