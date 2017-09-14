<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$links = array("https://forlap.ristekdikti.go.id/prodi/detail/MzM5RDRFRUUtODcwRC00QUJBLUI3REYtODU4REFBRkQ4OTRC");
for($i = 0; $i < count($links); $i++)
	{
			$link = file_get_html($links[$i]);
			if($link != null || $link != "")
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
								if($DAKUMENTPAGE  != null || $DAKUMENTPAGE == "")
								{
									foreach($DAKUMENTPAGE->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr") as $SARTOUT)
									{
										$SerNo = $SARTOUT->find("td", 0)->plaintext;
										$NIM = $SARTOUT->find("td", 1)->plaintext;
										$Name = $SARTOUT->find("td" , 2)->plaintext;
										$Namehref = $SARTOUT->find("td/a" , 0)->href;
																				
										$data = array($Namehref);
										for($loopo = 0 ; $loopo < sizeof($data); $loopo++)
										{
												$URL = $data[$loopo];
												$Pagestudent = file_get_html($URL);
												
											if($Pagestudent != null || $Pagestudent == "")
											{
											//This is Details of Students.
											$Nama 				= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[1]/td[3]",0)->plaintext;
											$Jenis  			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[2]/td[3]",0)->plaintext;
											$Perguruan   			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[4]/td[3]",0)->plaintext;
											$Program    			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[5]/td[3]",0)->plaintext;
											$Nomor     			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[6]/td[3]",0)->plaintext;
											$Semester			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[7]/td[3]",0)->plaintext;
											$Status_Awal 			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[8]/td[3]",0)->plaintext;
											$Status_Mahasiswa		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[9]/td[3]",0)->plaintext;												
											

					scraperwiki::save_sqlite(array('name'), array('name' => $Nomor,
                                             'Nama' => $Nama,
                                             'Jenis' => $Jenis, 
                                             'Perguruan' => $Perguruan, 
                                             'Program' => $Program, 
                                             'Semester' => $Semester, 
                                             'Status_Awal' => $Status_Awal, 
                                             'Status_Mahasiswa' => $Status_Mahasiswa));				
										
									
								
										}								

									}
								}
							}
							
							
						}
						
						
						
						
					}
			}
		
		}
	}

?>
