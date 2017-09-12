<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$links = array("https://forlap.ristekdikti.go.id/prodi/detail/NEE1RjZCOTItRjRBOS00RTQ4LTgzN0ItRjBFMjVGOTRGQkIz");
for($i = 0; $i < count($links); $i++)
	{
			$link = file_get_html($links[$i]);
			if($link)
			{
				foreach($link->find("//[@id='mahasiswa']/table/tbody/tr") as $element)
					{
						$totalcountofstudenteachsemester	= $element->find("td[3]/a" , 0)->plaintext;
						
						$number = $totalcountofstudenteachsemester / 20;
						$Pages =(int)$number;
						echo $student 	= $element->find("td[3]/a" , 0)->href;
						
						for($loop = 0; $loop <= $totalcountofstudenteachsemester; $loop+=20)
						{
							
							$urls =  $student . "/". $loop;
							$DAKUMENTPAGE = file_get_html($urls);
							
							
							
						}
						
						
						
						
					}
			}
	}




?>
