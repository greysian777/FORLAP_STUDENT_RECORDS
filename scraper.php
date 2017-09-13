<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
require "simple_html_dom.php";
error_reporting(0);
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
											 $Pagestudent =  file_get_html($Namehref++);
											 if($Pagestudent)
											 {
												 //This is Details of Students.
											$Nama 				= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[1]/td[3]");
											$Jenis  			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[2]/td[3]");
											$Perguruan   		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[4]/td[3]");
											$Program    		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[5]/td[3]");
											$Nomor     			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[6]/td[3]");
											$Semester			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[7]/td[3]");
											$Status_Awal 		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[8]/td[3]");
											$Status_Mahasiswa	= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[9]/td[3]");
scraperwiki::save_sqlite(array('Nomor'), array('Nomor' => $Nomor,
                                             'Nama' => $Nama,
                                             'Jenis' => $Jenis, 
                                             'Perguruan' => $Perguruan, 
                                             'Program' => $Program, 
                                             'Semester' => $Semester, 
                                             'Status_Awal' => $Status_Awal, 
                                             'Status_Mahasiswa' => $Status_Mahasiswa, 
                                             'linkofstudentprofile' => $Pagestudent
                                             ));													    
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
