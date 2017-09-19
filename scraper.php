<?php
//require 'simple_html_dom.php';

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
"https://forlap.ristekdikti.go.id/prodi/detail/ODQzQTQ0NDItRjU5OS00RDM3LUEwNkUtRDUxNDAwQjM2RDU4",
"https://forlap.ristekdikti.go.id/prodi/detail/MUUzMEFCOEEtMDA3RC00NTc2LUIwN0ItQ0JGMTRFMDZCNENG",
"https://forlap.ristekdikti.go.id/prodi/detail/M0JDRUUzNjItM0YyOC00QTA2LThDMjctMDEzMTlFM0Q1RERC",
"https://forlap.ristekdikti.go.id/prodi/detail/NUNFQkZGMDQtNTNFQy00ODUzLTkyQzgtMTAwMDI4MDEzMzFB",
"https://forlap.ristekdikti.go.id/prodi/detail/MUUyMTU3MUQtN0M3Qi00OUQ5LTkxOTgtODhCQkIxMDVERUE1",
"https://forlap.ristekdikti.go.id/prodi/detail/ODE4NEMxNkItQ0M0OC00NEMwLUJBM0UtMEYwNkQ3RkExNkU1",
"https://forlap.ristekdikti.go.id/prodi/detail/MkQ5MzdFRjYtNjk0NC00NDkzLUEyRjItN0M2NUQ2NjM4NzU1",
"https://forlap.ristekdikti.go.id/prodi/detail/NUE0RTgwMzMtQTUzMy00QTQ4LUFBQjAtNjA1NTRENjM2Rjgy",
"https://forlap.ristekdikti.go.id/prodi/detail/MjU2OUYyODktRTQzQS00N0M1LTk0NDMtMUE0NkZFODk4NEZG",
"https://forlap.ristekdikti.go.id/prodi/detail/RDJENTU4QzAtNTBBMC00MTQ2LUFBNDgtQTNBNjlCQTdENkEz",
"https://forlap.ristekdikti.go.id/prodi/detail/Qjg0QkUwQ0EtNEM3MS00N0EzLUJGRTAtRjQzRjM5OEE2NUNB",
"https://forlap.ristekdikti.go.id/prodi/detail/MzFDQkREMzItM0QxRC00RTEzLTlDQjMtMEUzODc3NTZEOTQw",
"https://forlap.ristekdikti.go.id/prodi/detail/QTA5Rjc2RkQtRENGQy00QjFFLUIwQzQtMzg1RDg5QzkzOEND",
"https://forlap.ristekdikti.go.id/prodi/detail/QzhEMEJERTktMkQ4Ny00OEU5LUI0QkEtRTVCMEZBOUIzNzgx",
"https://forlap.ristekdikti.go.id/prodi/detail/RDQ2OTUxRTQtOTNFMi00QkY5LTlCMUItOTcxNDFGMTExMzIy",
"https://forlap.ristekdikti.go.id/prodi/detail/MERGNERFNTItNkFFNi00OTZFLTg5OUMtQzE3NUEyNkJDQTg5",
"https://forlap.ristekdikti.go.id/prodi/detail/ODNFNkY4MTEtQzFBQy00MDUzLTkzNjUtNkQwNjUxNDA4OEY4",
"https://forlap.ristekdikti.go.id/prodi/detail/NkM0RUMxQTEtMzIyNC00OUE5LUE2MDYtMkM3OTc1MDJGNEI1",
"https://forlap.ristekdikti.go.id/prodi/detail/QjdCMTY4NkQtRTU5OC00Mzc1LTg2MzAtQjBGMzU4NUNBNDY2",
"https://forlap.ristekdikti.go.id/prodi/detail/MUMwMEUyQjMtMThEMy00MDE5LUEyOTAtODgzNjgzNTUwMEYy",
"https://forlap.ristekdikti.go.id/prodi/detail/ODdGRkYwMDktQ0Y2Qy00NUZFLUI2RDItRTgxMzkyMDNDQkIy",
"https://forlap.ristekdikti.go.id/prodi/detail/NjNBNEY1MkQtNjdCOC00OERBLTg0MzEtM0VFRUQxODY3Njkx",
"https://forlap.ristekdikti.go.id/prodi/detail/RkU4MTBGNTItMUVDQi00QkIzLUEzRTItRkVGRTU1M0ZFNzlG",
"https://forlap.ristekdikti.go.id/prodi/detail/NzExRDRCRUEtOUJBMy00ODU1LUIzNTEtMzNBMUIyQzczRTRG",
"https://forlap.ristekdikti.go.id/prodi/detail/MjdBRjRBOEMtMEMyOS00MTRBLUJBM0YtMzlFREU1MkE1NDE0",
"https://forlap.ristekdikti.go.id/prodi/detail/NURCRTIxRDgtODE0Ri00QjU2LTlFNzgtMkU4NDEwOTAxODg5",
"https://forlap.ristekdikti.go.id/prodi/detail/MUMxNDg3QUEtNzI1RS00RjgzLUExMzctQkQ1OUJCNzVFOUU4",
"https://forlap.ristekdikti.go.id/prodi/detail/N0Q2NDY1OUYtN0UxQS00OTAzLUFEQkUtMkVBMzU2NjVGRDY1",
"https://forlap.ristekdikti.go.id/prodi/detail/N0M0REFEMzgtRTcwRS00MDE3LUJEQ0UtMEI2ODkyQTY0NzY1",
"https://forlap.ristekdikti.go.id/prodi/detail/M0ZDNzIxQkQtNTVEQy00NkMzLUE2OUMtMTM1NzY3NjYxMTYw",
"https://forlap.ristekdikti.go.id/prodi/detail/REU3QTUxOTUtRDhBNi00NkJGLUIxNUUtRDk0QkQxM0FBRUI1",
"https://forlap.ristekdikti.go.id/prodi/detail/ODk3NjA4RTctQjM5NC00NThFLTg2MTAtMzdENzQwMjdDODZE",
"https://forlap.ristekdikti.go.id/prodi/detail/OEI3REU4OTktODVDMC00RTNCLUE4OUEtMzg2RDVEQUVGOURG",
"https://forlap.ristekdikti.go.id/prodi/detail/QjYyNTU0OTgtQTRCNi00QkY5LUI0RDctRDIxQ0EzNDY0N0Qy",
"https://forlap.ristekdikti.go.id/prodi/detail/MEE2OUVCNzktMEZBOC00MTk0LUFDRjktOUEyNjNDODQ0N0My",
"https://forlap.ristekdikti.go.id/prodi/detail/RjVFNTU2QUItMEM5Mi00ODU4LTkzNTAtRDA5NEMwRUZGOTUx",
"https://forlap.ristekdikti.go.id/prodi/detail/QjQzQ0MyQjItQzUzRi00OTVGLTkyRDAtMTc4N0IwODdBRTUy",
"https://forlap.ristekdikti.go.id/prodi/detail/NEY3NTFBRDMtREQ1RC00QTY5LUE3MUItQjc0MjZCMzA0MDIz",
"https://forlap.ristekdikti.go.id/prodi/detail/MjQ4QUZGQkUtNTNGQi00QkUzLTgwQjAtQ0RBQ0M3NjMxODE5",
"https://forlap.ristekdikti.go.id/prodi/detail/QjFDNjIyRDEtQzI4OS00NUFDLUFBM0MtOTRGM0YwOUQ1QjZG",
"https://forlap.ristekdikti.go.id/prodi/detail/NTRFRkZEMUItNTM4NC00QkQxLThFQTUtMzQ1QUQ0QzM3Mjk5",
"https://forlap.ristekdikti.go.id/prodi/detail/N0MwNzdGNEUtRDA1NC00QjQ2LThBMkEtMTIzQjg0QTg4MjVD",
"https://forlap.ristekdikti.go.id/prodi/detail/OUM0NzgzQUEtNjA0Qi00NkFELTk5MTctOEUxNTUwNDhBODM1",
"https://forlap.ristekdikti.go.id/prodi/detail/NjlDNDZGQjYtODZENC00NTE1LUI4OTYtQzJFQTFBOUFFOENE",
"https://forlap.ristekdikti.go.id/prodi/detail/NkRDNEY3MUQtQzM5Ny00RTNGLUE0QzgtOUUyNDk3OEUzQTY1",
"https://forlap.ristekdikti.go.id/prodi/detail/RTRFRDY0NTYtMUJBQy00OTk5LTgxMjctQ0Q5OUI3QjkyQjA2",
"https://forlap.ristekdikti.go.id/prodi/detail/Qjg1Nzc4NUMtM0I1NC00MDVBLUI3OTktODIwRDdFMjUzNEU1",
"https://forlap.ristekdikti.go.id/prodi/detail/OTZBMjJGMTctN0RCOS00RDlELTk4NjctN0NFMTlGRjQ2MEQ4",
"https://forlap.ristekdikti.go.id/prodi/detail/NUVGQjFFRUItMUVBNC00NkExLUFCQkEtNzUwQ0MxRjc0RDA0");
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
	    echo "$urls...\n";
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
		   if($URL != "")
			{
		  
 			  sleep(2);
		   $Pagestudent    =   file_get_html($URL);
			   
			   
		   if($Pagestudent)
		   {
			   sleep(2);
		   //This is Details of Students.
           $Nama    = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[1]/td[3]",0)->plaintext;
           $Jenis    = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[2]/td[3]",0)->plaintext;
           $Perguruan     = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[4]/td[3]",0)->plaintext;
           $Program      = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[5]/td[3]",0)->plaintext;
           $Nomor       = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[6]/td[3]",0)->plaintext;
		   $Semester  = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[7]/td[3]",0)->plaintext;
           $Status_Awal   = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[8]/td[3]",0)->plaintext;
           $Status_Mahasiswa = $Pagestudent->find("/html/body/div[2]/div[2]/div[2]/div[1]/div/table/tbody/tr[9]/td[3]",0)->plaintext;
		   }
		  }
		   
		  
			   if($Nomor != ""){
			   $record = array( 'num' =>$Nomor, 'studenturl' => $student ,'name' => $Nama,'jenis' => $Jenis , 'perguruan' => $Perguruan , 'program' => $Program, 'semester' => $Semester, 'statusawal' => $Status_Awal , 'statusmahasiswa' => $Status_Mahasiswa, 'namehref' => $Namehref, 'link' => $links[$i]);
           scraperwiki::save(array('num','studenturl','name','jenis','perguruan','program','semester','statusawal','statusmahasiswa','namehref','link'), $record); 
			   }
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

?>