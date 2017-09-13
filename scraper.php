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
						$totalcountofstudenteachsemester	= $element->find("td[3]/a" , 0)->plaintext;
						
						$number = $totalcountofstudenteachsemester / 20;
						$Pages =(int)$number;
						$student 	= $element->find("td[3]/a" , 0)->href;
						
						for($loop = 0; $loop <= $totalcountofstudenteachsemester; $loop+=20)
						{
							
							$urls =  $student . "/". $loop;
							if($urls != "/0")
							{
							$DAKUMENTPAGE = file_get_html($urls);
								if($DAKUMENTPAGE)
								{
									foreach($DAKUMENTPAGE->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr") as $SARTOUT)
									{
										$SerNo = $SARTOUT->find("td", 0)->plaintext;
										$NIM = $SARTOUT->find("td", 1)->plaintext;
										$Name = $SARTOUT->find("td" , 2)->plaintext;
										$Namehref = $SARTOUT->find("td/a" , 0)->href;
										if($SerNo != null || $SerNo != "")
										{
											 $Pagestudent1 =  file_get_html($Namehref++);
											 foreach($Pagestudent1->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr")as $Pagestudent)
											 {
												 //This is Details of Students.
									$Nama 				= $Pagestudent->find("td[3]",0)->plaintext;
									$Jenis  			= $Pagestudent->find("td[3]",1->plaintext;
									$Perguruan   			= $Pagestudent->find("td[3]",3)->plaintext;
									$Program    			= $Pagestudent->find("td[3]",4)->plaintext;
									$Nomor     			= $Pagestudent->find("td[3]",5)->plaintext;
									$Semester			= $Pagestudent->find("td[3]",6)->plaintext;
									$Status_Awal 			= $Pagestudent->find("td[3]",7)->plaintext;
									$Status_Mahasiswa		= $Pagestudent->find("td[3]",8)->plaintext;
						scraperwiki::save_sqlite(array('name'), array('name' => $Nomor, 'Nama' => $Nama));

/*
												 scraperwiki::save_sqlite(array('name'), array('name' => $Nomor,
                                             'Nama' => $Nama,
                                             'Jenis' => $Jenis, 
                                             'Perguruan' => $Perguruan, 
                                             'Program' => $Program, 
                                             'Semester' => $Semester, 
                                             'Status_Awal' => $Status_Awal, 
                                             'Status_Mahasiswa' => $Status_Mahasiswa
                                             
                                             ));
*/
											 }
																						
										}
																			
										
										
										
										
										
										
									/* echo $SerNo . "=> " . $NIM . "--" . $Name . "--"  . $Namehref;	
									echo "<br/>";
									echo "<br/>"; */
								
									
										
										
										
									}
								}
							}
							
							
						}
						
						
						
						
					}
			}
	}


?>
