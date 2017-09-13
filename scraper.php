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
						$student 	= $element->find("td[3]/a" , 0)->href;
						
						for($loop = 0; $loop <= $totalcountofstudenteachsemester; $loop+=20)
						{
							
							$urls =  $student . "/". $loop;
							if($urls != "/0"){
							$DAKUMENTPAGE = file_get_html($urls);
								if($DAKUMENTPAGE)
								{
									foreach($DAKUMENTPAGE->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr") as $SARTOUT)
									{
										$SerNo = $SARTOUT->find("td", 0)->plaintext;
										$NIM = $SARTOUT->find("td", 0)->plaintext;
									echo	$Name = $SARTOUT->find("td/a", 0)->href;
									echo "<br/>";
										/*
										if($Name)
										{
											$prof = file_get_html($Name);
											echo $prof;
										}
										else{
											break;
										} */
									}
								}
							}
							
							
						}
						
						
						
						
					}
			}
	}

?>
