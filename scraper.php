<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$links = array("https://forlap.ristekdikti.go.id/prodi/detail/MzM5RDRFRUUtODcwRC00QUJBLUI3REYtODU4REFBRkQ4OTRC");
for($i = 0; $i < count($links); $i++)
	{
			$link = file_get_html($links[$i]);
			if($link)
				{
			foreach($link->find("//[@id='mahasiswa']/table/tbody/tr") as $element)
			{
				$totalcountofstudenteachsemester	= 	$element->find("td[3]/a" , 0)->plaintext;
				$number 				= 	$totalcountofstudenteachsemester / 20;
				$Pages 					=   	(int)$number;
				$student 				= 	$element->find("td[3]/a" , 0)->href;
				
				
						for($loop = 0; $loop <= $totalcountofstudenteachsemester; $loop+=20)
						{
							$urls =  $student . "/". $loop;
							if($urls !== "/0")
							{
								$DAKUMENTPAGE = file_get_html($urls);
								foreach($DAKUMENTPAGE->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr") as $SARTOUT)
									{
										$SerNo = $SARTOUT->find("td", 0)->plaintext;
										$NIM = $SARTOUT->find("td", 1)->plaintext;
										$Name = $SARTOUT->find("td" , 2)->plaintext;
										$Namehref = $SARTOUT->find("td/a" , 0)->href;
									
										echo "1 => "  . $Namehref;
									}
							}
						}
				
				
			}
				}
	}

?>
