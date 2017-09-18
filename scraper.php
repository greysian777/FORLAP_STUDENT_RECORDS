<?php
//require 'simple_html_dom.php';

require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

$links = array("https://forlap.ristekdikti.go.id/prodi/detail/NUQ0REJCRDUtNEE4Ny00Q0YzLUI1QTMtMjYwNjFFQjdGMkNF"	
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
		   if($URL != "")
			{
		   echo ' = > '.$URL.'<br/>';
		   $Pagestudent    =   file_get_html($URL);
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
		   }
		  }
		   
		  
			   
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

?>
