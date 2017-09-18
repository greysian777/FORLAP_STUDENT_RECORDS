<?
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';
$links = array("https://forlap.ristekdikti.go.id/prodi/detail/OEJDQjE0QTYtMzE1Ri00RjY1LUJFQkItQTQ1QzlFMEIyREY1",
"https://forlap.ristekdikti.go.id/prodi/detail/QjAwRkIwREUtMUVCOC00MEMwLTk1MDctQjQ3NzlGRUM5MzQ5",
"https://forlap.ristekdikti.go.id/prodi/detail/MDc1MDUxREItNDE3Ri00NDc4LUEyODgtRTEwRkFFODQyRDE3",
"https://forlap.ristekdikti.go.id/prodi/detail/RDdGQUEwRTgtQTIzNC00OTA0LUIzRjgtNUNFNDlBOTVFQkVE",
"https://forlap.ristekdikti.go.id/prodi/detail/NDI1Q0I5MTAtOTZGMy00MTFCLUIxNjItRkE1MzRGNTgyMEQ5",
"https://forlap.ristekdikti.go.id/prodi/detail/Q0RGMDE1QjctNUM5RC00RTY4LTk4MUItODZDNDM0NkI0ODgz",
"https://forlap.ristekdikti.go.id/prodi/detail/ODI2MTU3RUQtMTI3Ni00NjE0LUE2OTQtNzRCMDM1QjZBMjcz",
"https://forlap.ristekdikti.go.id/prodi/detail/NEFCOEFFMEUtRDZDNS00NjQ2LTg5MDMtQTRDRkFENUU3NzIy",
"https://forlap.ristekdikti.go.id/prodi/detail/RTY0NUJBODctRDdDQy00QjY0LUFEQTgtMTY3MzhFNjcxQkZD",
"https://forlap.ristekdikti.go.id/prodi/detail/OTlCN0M1MkMtMzNDMy00MDY1LUE1QTItODc0OTU2MEZBRDY0",
"https://forlap.ristekdikti.go.id/prodi/detail/QjJEMUZDMjItQjlBNS00MDAwLUFFNTktN0VBNkUzNTg1MDI4",
"https://forlap.ristekdikti.go.id/prodi/detail/RkMzRTJDRkMtNjU3RC00M0I5LUJFNzEtOEExNkY0REJGRTI1",
"https://forlap.ristekdikti.go.id/prodi/detail/MDBGOTI2REEtNTQ5NS00RDExLTg3NjQtNERFMkRFM0Y3RkUw",
"https://forlap.ristekdikti.go.id/prodi/detail/MTFDNjdDNDUtQkQ4Mi00QUIxLUJGREEtOTE2OUREOEFDMDNB",
"https://forlap.ristekdikti.go.id/prodi/detail/Q0IzMkZEOUUtNzg5MC00Qzk4LThEQzItRDVERUZFRTFCQjU2",
"https://forlap.ristekdikti.go.id/prodi/detail/MDBFMjU2RjYtRkYwNy00MUY5LUEwQTAtNkEyRERGNkY5NjQ3",
"https://forlap.ristekdikti.go.id/prodi/detail/MTIyOEQxMjItMTIwQi00QkM4LTk2M0ItRUM4OTA3QTY2ODlF",
"https://forlap.ristekdikti.go.id/prodi/detail/N0Y5NjFBNzEtRDNBNy00QTQ5LUI4QTAtNDlFRDcxMEY2RkE2",
"https://forlap.ristekdikti.go.id/prodi/detail/NDZEREFBNEYtQTUyNS00MzU5LThBNTEtRDQwNDU0NjA0RTdB",
"https://forlap.ristekdikti.go.id/prodi/detail/RjMyRTNFRTAtQUJFRi00ODI4LThCMjctMjUxMEZDNDVBRkUx",
"https://forlap.ristekdikti.go.id/prodi/detail/ODQzQTQ0NDItRjU5OS00RDM3LUEwNkUtRDUxNDAwQjM2RDU4"	
);
for($i = 0; $i < count($links); $i++)
 {
   $link = file_get_html($links[$i]);
   if($link)
   {
    foreach($link->find("//[@id='mahasiswa']/table/tbody/tr") as $element)
     {
      $totalcountofstudenteachsemester = $element->find("td[3]/a" , 0)->plaintext;
      $number = $totalcountofstudenteachsemester / 20;
      $Pages =(int)$number;
      $student  = $element->find("td[3]/a" , 0)->href;
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
                    
          $data = array($Namehref);
          for($loopo = 0 ; $loopo < sizeof($data); $loopo++)
          {
           $URL = $data[$loopo];
		   $Pagestudent    =   file_get_html($URL);
		   if($Pagestudent != null)
		   {
		   //This is Details of Students.
           $Nama    = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[1]/td[3]",0)->plaintext;
           $Jenis    = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[2]/td[3]",0)->plaintext;
           $Perguruan     = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[4]/td[3]",0)->plaintext;
           $Program      = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[5]/td[3]",0)->plaintext;
           $Nomor       = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[6]/td[3]",0)->plaintext;
           echo ' = > '.$Nomor.'<br/>';
		   $Semester  = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[7]/td[3]",0)->plaintext;
           $Status_Awal   = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[8]/td[3]",0)->plaintext;
           $Status_Mahasiswa = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[9]/td[3]",0)->plaintext;
	   
			   
			   
			   $record = array( 'num' =>$Nomor, 'name' => $Nama,'jenis' => $Jenis , 'perguruan' => $Perguruan , 'program' => $Program, 'semester' => $Semester, 'statusawal' => $Status_Awal , 'statusmahasiswa' => $Status_Mahasiswa, 'namehref' => $Namehref, 'link' => $links[$i]);
           scraperwiki::save(array('num','name','jenis','perguruan','program','semester','statusawal','statusmahasiswa','namehref','link'), $record); 
/*			   
			   $servername = "localhost";
           $username = "root";
           $password = "";
           $dbname = "indonesia";

           // Create connection
           $conn = new mysqli($servername, $username, $password, $dbname);
           // Check connection
           if ($conn->connect_error) 
           {
            die("Connection failed: " . $conn->connect_error);
           } 

           $sql = "INSERT INTO forlap (Pagestudent ,Nama, Jenis , Perguruan , Program , Nomor , Semester , Status_Awal , Status_Mahasiswa)
           VALUES ('$URL ','$Nama', '$Jenis' , '$Perguruan' , '$Program' , '$Nomor' , '$Semester' , '$Status_Awal' , '$Status_Mahasiswa')";

           if ($conn->query($sql) === TRUE) 
           {
            echo 'Added';
            echo '<br/>';
           } else 
           {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
           }

           $conn->close();   */
		  
          /*  $Pagestudent = file_get_html($URL);
            
           if($Pagestudent)
           {
           //This is Details of Students.
           $Nama    = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[1]/td[3]",0)->plaintext;
           $Jenis    = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[2]/td[3]",0)->plaintext;
           $Perguruan     = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[4]/td[3]",0)->plaintext;
           $Program      = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[5]/td[3]",0)->plaintext;
           $Nomor       = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[6]/td[3]",0)->plaintext;
           $Semester  = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[7]/td[3]",0)->plaintext;
           $Status_Awal   = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[8]/td[3]",0)->plaintext;
           $Status_Mahasiswa = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[9]/td[3]",0)->plaintext;            
          

           $servername = "localhost";
           $username = "root";
           $password = "";
           $dbname = "indonesia";

           // Create connection
           $conn = new mysqli($servername, $username, $password, $dbname);
           // Check connection
           if ($conn->connect_error) 
           {
            die("Connection failed: " . $conn->connect_error);
           } 

           $sql = "INSERT INTO forlap (Pagestudent ,Nama, Jenis , Perguruan , Program , Nomor , Semester , Status_Awal , Status_Mahasiswa)
           VALUES ('$URL ','$Nama', '$Jenis' , '$Perguruan' , '$Program' , '$Nomor' , '$Semester' , '$Status_Awal' , '$Status_Mahasiswa')";

           if ($conn->query($sql) === TRUE) 
           {
            echo 'Added';
            echo '<br/>';
           } else 
           {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
           }

           $conn->close();   
        
          

   
          
         */
        
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