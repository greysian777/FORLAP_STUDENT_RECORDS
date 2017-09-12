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
						$totalcountofstudenteachsemester	= $element->find("td[3]/a" , 0);
						$student 	= $element->find("td[3]/a" , 0)->href;
					if($student != null || $student != "") 
					{
						$page = file_get_html($student);
						if($page)
						{	
							foreach($page->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/div/ul/li")as $studentname)
							{
								$link_of_pages = $studentname->find("a" , 0)->href;
								if($link_of_pages == true)
								{
									
									echo $link_of_pages;
									echo "<br/>";
									
									//$pagesofstudetdetails = file_get_html($link_of_pages);
								}
							}
						}
					}
				
					}
			}
	}

?>
