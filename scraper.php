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
																		 $Pagestudent =  file_get_html($Namehref++);
									$Pagestudent =  file_get_html($Namehref++);														 //This is Details of Students.
									$info['Nama'] 			= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[1]/td[3]",0)->plaintext;
									$info['Jenis']  		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[2]/td[3]",0)->plaintext;
									$info['Perguruan']   		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[4]/td[3]",0)->plaintext;
									$info['Program']    		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[5]/td[3]",0)->plaintext;
									$info['Nomor']     		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[6]/td[3]",0)->plaintext;
									$info['Semester']		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[7]/td[3]",0)->plaintext;
									$info['Status_Awal'] 		= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[8]/td[3]",0)->plaintext;
									$info['Status_Mahasiswa']	= $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[9]/td[3]",0)->plaintext;
										
								
		scraperwiki::save_sqlite(array('name'), 
    array('name' => $info['Nomor'], 
          'Nama' => $info['Nama'], 
          'Jenis' => $info['Jenis'],
          'Perguruan' => $info['Perguruan'],
          'Semester' => $info['Semester'],
          'Status_Awal' => $info['Status_Awal'],
          'Status_Mahasiswa' => $info['Status_Mahasiswa']
          
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


?>
