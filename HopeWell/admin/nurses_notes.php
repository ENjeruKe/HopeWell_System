<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
$mdate =$_SESSION['today'];
?>



<?php
$date = $_SESSION['sys_date'];


if (isset($_GET['accounts3'])){
   $adm_no  = $_GET['accounts3'];
   $id_no   = $_GET['accounts'];
   $id      = $_GET['accounts'];
   $ref_no   = $_GET['ref_no'];
   $ref_noss   = $_GET['ref_no'];
   $ref_no2   = $_GET['ref_no'];
   $_SESSION['id_no']= $id_no;
   $_SESSION['adm_no']=$adm_no;
}

?>


<!DOCTYPE html>
<html>
<title>HMIS Global | Paltech System Consultants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"-->
<head>














<script>
function myFunction() {
    var no = document.getElementById('no').value;   
    alert(no); 

    var txt = document.getElementById('amount').value;

    alert(txt); 

    //var option = no.options[no.selectedIndex].text;

    txt2 = txt * no;
    document.getElementById("result2").value = txt2;
}
</script>









<!--body background="images/background.jpg"-->
<body>









<div style="width: 100%;">
   <!--div style="float:left; width: 50%"-->

<form action ="nurses_station_pg3.php" method ="GET">
<?php


$company_identity =$company_identity; 



$drg6am ='N/D';
$drg10am ='N/D';
$drg12 ='N/D';
$drg2pm ='N/D';
$drg6pm ='N/D';
$drg10pm ='N/D';



//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
$address = "$company<br>$address1<br>$address2";
$query5= "DELETE FROM courses WHERE subject<>''";
   $result5 =mysql_query($query5); 

$query5= "DELETE FROM courses2 WHERE subject<>''";
   $result5 =mysql_query($query5); 

$query5= "DELETE FROM courses3 WHERE subject<>''";
   $result5 =mysql_query($query5); 

$query5= "DELETE FROM courses4 WHERE subject<>''";
   $result5 =mysql_query($query5); 

$adm_no =$_SESSION['adm_no'];
$ref_nos = $_SESSION['ref_no'];
//echo 'Ref No.'. $adm_no;
echo"<table width ='100%' border ='1'>";
echo"<tr><th width ='20' align ='left' bgcolor ='black'><font color ='white'>Date</th><th width ='100' align ='left' bgcolor ='black'><font color ='white'>6am Activities</th><th width ='100' bgcolor ='black' align='left'><font color ='white'>10am Activities</th><th width ='100' align ='left' bgcolor ='black'><font color ='white'>12noon Act.</th><th width ='100' align='left' bgcolor ='black'><font color ='white'>2pm Activ.</th><th width ='100' align='left' bgcolor ='black'><font color ='white'>6pm Activ.</th><th width ='100' align='left' bgcolor ='black'><font color ='white'>10pm Activ.</th></tr>";

   $query= "SELECT * FROM nursesfile3 where ref_no ='$ref_nos'"or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($i < $num)
      { 
      $adm_no      = mysql_result($result,$i,"adm_no");          
      $appointment = mysql_result($result,$i,"date");   
      $ref_no1      = mysql_result($result,$i,"ref_no");          
      $id1      = mysql_result($result,$i,"id");          

   //get previous temps
   //------------------
   $ref_no3 = mysql_result($result,$i,"ref_no");   
   $adm_date = mysql_result($result,$i,"date");   
   //if ($ref_no1==$ref_noss){
      $temp6hrs  =mysql_result($result,$i,"temp6hrs");   
      $temp14hrs =mysql_result($result,$i,"temp14hrs");   
      $temp22hrs  =mysql_result($result,$i,"temp22hrs");   
      $pulse6hrs  =mysql_result($result,$i,"pulse6hrs");   
      $pulse14hrs  =mysql_result($result,$i,"pulse14hrs");
      $pulse22hrs  =mysql_result($result,$i,"pulse22hrs");
      $resp6hrs  =mysql_result($result,$i,"resp6hrs");
      $resp14hrs  =mysql_result($result,$i,"resp14hrs");
      $resp22hrs  =mysql_result($result,$i,"resp22hrs");
      $date       =mysql_result($result,$i,"date");



      $b_p6hrs  =mysql_result($result,$i,"b_p6hrs");
      $b_p14hrs  =mysql_result($result,$i,"b_p14hrs");
      $b_p22hrs  =mysql_result($result,$i,"b_p22hrs");
      $notes  =mysql_result($result,$i,"notes");


      $drg6am =mysql_result($result,$i,"drg6am");
      $drg10am =mysql_result($result,$i,"drg10am");
      $drg12 =mysql_result($result,$i,"drg12");
      $drg2pm =mysql_result($result,$i,"drg2pm");
      $drg6pm =mysql_result($result,$i,"drg6pm");
      $drg10pm =mysql_result($result,$i,"drg10pm");
   //}

if ($drg6am ==''){
   $drg6am ='N/D';
}
if ($drg10am ==''){
   $drg10am ='N/D';
}

if ($drg12 ==''){
   $drg12 ='N/D';
}
if ($drg2pm ==''){
   $drg2pm ='N/D';
}
if ($drg6pm ==''){
   $drg6pm ='N/D';
}
if ($drg10pm ==''){
   $drg10pm ='N/D';
}


echo"<tr><td width ='20'>$date</td><td width ='5'>Temp.$temp6hrs >Pul.$pulse6hrs|>Resp.$resp6hrs >BP.$b_p6hrs >Drugs.$drg6am</td>";

echo"<td width ='10'>10drg.$drg10am</td><td width ='10'>12drg.$drg12</td>";


echo"<td width ='5'>>Temp.$temp14hrs >Pul.$pulse14hrs >Rest.$resp14hrs >BP.$b_p14hrs >Drugs.$drg2pm</td>";

echo"<td width ='10'>6pmdrg.$drg6pm</td>";

echo"<td width ='5'>Temp.$temp22hrs > Pul.$pulse22hrs > Resp.$resp22hrs > BP.$b_p22hrs >Drugs.$drg10pm</td></tr>";

//here
$weekday = date('l', strtotime($date)); // note: first arg to date() is lower-case L

$day = substr($weekday,0,3);
 
$subject =$day.'6';
   $query5= "INSERT INTO courses VALUES('','$subject','$temp6hrs')";
   $result5 =mysql_query($query5);  
$subject =$day.'2';
   $query5= "INSERT INTO courses VALUES('','$subject','$temp14hrs')";
   $result5 =mysql_query($query5);  
$subject =$day.'10';
   $query5= "INSERT INTO courses VALUES('','$subject','$temp22hrs')";
   $result5 =mysql_query($query5);  


$subject =$day.'6';
   $query5= "INSERT INTO courses2 VALUES('','$subject','$pulse6hrs')";
   $result5 =mysql_query($query5);  
$subject =$day.'2';
   $query5= "INSERT INTO courses2 VALUES('','$subject','$pulse14hrs')";
   $result5 =mysql_query($query5);  
$subject =$day.'10';
   $query5= "INSERT INTO courses2 VALUES('','$subject','$pulse22hrs')";
   $result5 =mysql_query($query5);  


$subject =$day.'6';
   $query5= "INSERT INTO courses3 VALUES('','$subject','$resp6hrs')";
   $result5 =mysql_query($query5);  
$subject =$day.'2';
   $query5= "INSERT INTO courses3 VALUES('','$subject','$resp14hrs')";
   $result5 =mysql_query($query5);  
$subject =$day.'10';
   $query5= "INSERT INTO courses3 VALUES('','$subject','$resp22hrs')";
   $result5 =mysql_query($query5);  

$subject =$day.'6';
   $query5= "INSERT INTO courses4 VALUES('','$subject','$b_p6hrs')";
   $result5 =mysql_query($query5);  
$subject =$day.'2';
   $query5= "INSERT INTO courses4 VALUES('','$subject','$b_p14hrs')";
   $result5 =mysql_query($query5);  
$subject =$day.'10';
   $query5= "INSERT INTO courses4 VALUES('','$subject','$b_p22hrs')";
   $result5 =mysql_query($query5);  

     //use this point to update graph data file
     //----------------------------------------


   $i++;
   }

//echo"</table><br><br>";

//echo"<table width ='100%'><tr><th width ='20' align ='left' bgcolor ='black'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='250' bgcolor ='black' align='left'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='20' align='left' bgcolor ='black'><font color ='white'></th></tr>";

//echo"<table><tr><td width ='100' align ='left'><b>Adm Date :</b></td><td width ='30'></td><td width='200' align='left'>$adm_date</td></tr>";

//echo"<tr><td width ='100' align ='left'><b>Bed No.:</b></td><td width ='30'></td><td width='200' align='left'>$bed_no</td></tr></table>";





//Go and get rest of info from medicalfile
//----------------------------------------
//echo 'here1'.$ref_nos;

   $SQL= "SELECT * FROM medicalfile where ref_no ='$ref_nos'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $query= "SELECT * FROM medicalfile where ref_no ='$ref_nos'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      { 
      $id      = mysql_result($result,$i,"adm_no");          
      $doctor  = " ";   
      $appointment = mysql_result($result,$i,"date");   
      $name        = mysql_result($result,$i,"name");   
      $test1       = mysql_result($result,$i,"test1");
      $test2       = mysql_result($result,$i,"test2");
      $test3       = mysql_result($result,$i,"test3");
      $test4       = mysql_result($result,$i,"test4");
      $test5       = mysql_result($result,$i,"test5");
      $payer       = mysql_result($result,$i,"gl_account");
      $_SESSION['payer']= $payer;
      $_SESSION['customer']= $name;
      $ref_no       = mysql_result($result,$i,"ref_no");
      $diag1       = mysql_result($result,$i,"diag1");  
      $diag2       = mysql_result($result,$i,"diag2");  
      $summary     = mysql_result($result,$i,"notes");  
      //$ref_nos     = "id";  

     $i++;
   }



echo"<table width ='100%'><tr><td align='left'><h1>Nurses Notes</h1></td></tr>";
   $query= "SELECT * FROM nursesfile3 where ref_no ='$ref_nos'"or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($i < $num)
      { 
      $notes = mysql_result($result,$i,"notes");   
      $date  = mysql_result($result,$i,"date");   
      echo"<tr><td><u>$date</u></td></tr>";
      echo"<tr><td>$notes</td></tr>";     
     $i++;
     }

echo"</table><br><br>";


$atextarea_a = substr($summary,0,100);
$atextarea_b = substr($summary,100,100);
$atextarea_c = substr($summary,200,100);
$atextarea_d = substr($summary,300,100);
$atextarea_e = substr($summary,400,100);

//echo"<table width ='100%'><tr><td align ='left'><b><u>
//MANAGEMENT SUMMARY</u></b></td></tr>";
//echo"<tr><td align //'left'>$atextarea_a<br>$atextarea_b<br>$atextarea_c<br>$atex//tarea_d<br>$atextarea_e</td></tr>";
//echo"</table><br><br>";




$today =date('y-m-d');
$d=strtotime("$today");


?>


<br><br>
</div>


<!--div style="float:center;"-->
 <!--div style="float:left; width: 50%"-->

<p align ='centre'></p>























<p align ='centre'>
<!--table align='center'><td align ='center'-->
<?php
//$ids ="uploads".'/'.$id.'s.jpg';
$ids ="uploads".'/'.$image_id.'s.jpg';

//echo $ids;

//echo"<img src=$ids alt='scan' style='width:100%'>";
?>









</p>
   </div>
</div>
<div style="clear:both"></div>
</form>











</div>
<div class="w3-container w3-teal">






  <!--p>Developed by Paltech System Consultants | E-mail: info@hmisglobal.com</p-->
</div>

</body>
</html>