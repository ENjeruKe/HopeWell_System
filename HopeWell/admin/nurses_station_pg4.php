<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
?>



<?php

if (isset($_GET['save_cancel'])){
   $name =$_SESSION['patients_name'];
   $adm_no =$_SESSION['adm_no'];
   $ref_no = $_SESSION['ref_no'];
   $adm_date =$_SESSION['adm_date'];
   $temp6hrs  =$_GET['temp6hrs'];
   $temp14hrs  =$_GET['temp14hrs'];
   $temp22hrs  =$_GET['temp22hrs'];

   $pulse6hrs  =$_GET['pulse6hrs'];
   $pulse14hrs  =$_GET['pulse14hrs'];
   $pulse22hrs  =$_GET['pulse22hrs'];

   $b_p6hrs  =$_GET['b_p6hrs'];
   $b_p14hrs  =$_GET['b_p14hrs'];
   $b_p22hrs  =$_GET['b_p22hrs'];

   $resp6hrs  =$_GET['resp6hrs'];
   $resp14hrs  =$_GET['resp14hrs'];
   $resp22hrs  =$_GET['resp22hrs'];

    
    $query4= "INSERT INTO nursesfile3 VALUES('$adm_no','$name','$ref_no','$temp6hrs','$temp14hrs','$temp22hrs','$pulse6hrs','$pulse14hrs','$pulse22hrs','$resp6hrs','$resp14hrs','$resp22hrs','$adm_date','$b_p6hrs','$b_p14hrs','$b_p22hrs')";
      $result4 =mysql_query($query4);
echo'<h2>Data save successfully.Kindly close this window <br>to select another patient...';
die();
}



if (isset($_GET['accounts3'])){
   $adm_no  = $_GET['accounts3'];
   $id_no   = $_GET['accounts'];
   $ref_no   = $_GET['ref_no'];
   $ref_no2   = $_GET['ref_no'];
}
echo $adm_no;
echo $ref_no;

$today = date('y/m/d');
if (isset($_GET['accounts3'])){
   $check_date = date('y-md');
   $SQL= "SELECT * FROM admitfile where adm_no ='$adm_no' and dis_date='0000-00-00 00:00:00'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $query= "SELECT * FROM admitfile where adm_no ='$adm_no' and dis_date='0000-00-00 00:00:00'" or die(mysql_error());
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
      $appointment = mysql_result($result,$i,"adm_date");   
      $name        = mysql_result($result,$i,"patients_name");   
      $adm_date    = mysql_result($result,$i,"adm_date");  
      $adm_time    = mysql_result($result,$i,"adm_time");    
      $bed_no      = mysql_result($result,$i,"bed_no");    
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");
      $weight      = mysql_result($result,$i,"weight");
      $temp         = mysql_result($result,$i,"temp");
      $b_p         = mysql_result($result,$i,"b_p");
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"payer");  
      $tests       = mysql_result($result,$i,"tests_and_results");
      $pusername   = "";  
      $textarea    = "";
      $textarea2    = "";
      $textarea3    = "";
      $last_update = "";
      $diag1       = mysql_result($result,$i,"provisional_diag");  
      $diag2       = mysql_result($result,$i,"final_diag");  
      $summary     = mysql_result($result,$i,"complains");  
      $next_app    = "";  

      $village     = "";
      $subloc      = "";
      $chief       = "";
      $subchief    = "";
      $ward  = "";
      $ref_nos     = "id";  

     $i++;
   }

   //$_SESSION['patients_name']=$name;
   //$_SESSION['adm_no']=$adm_no;
   //$_SESSION['ref_no']=$ref_no;
   //$_SESSION['adm_date']=$adm_date;

      if ($textarea<>''){
         $results ='Yes';
      }
   $check_diag1 = $diag1;
   $check_diag2 = $diag2;

}
?>



<!DOCTYPE html>
<html>
<title>HMIS Global | Paltech System Consultants</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css"-->
<head>







<?php









if (isset($_GET['refresh'])){
   $date = date('y/m/d');
}

?>







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











<script>
function showUser(str) { 
    var txt = document.getElementById('drugs4').value;
    if (str == "") {
        document.getElementById("drugs4").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("drugs4").innerHTML = xmlhttp.responseText;
            }
        };

        //xmlhttp.open("GET","get_level.php?q="+str,true);
        //xmlhttp.send();
    }
}
</script>

















<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    txt2 = txt * no;
    document.getElementById("result_three").value = txt2;
}
</script>

<script>
function function4() {
    var no = document.getElementById('no_4').value;   
    var txt = document.getElementById('amount_4').value;
    txt2 = txt * no;
    document.getElementById("result_4").value = txt2;
}
</script>

<script>
function function2() {
    var no = document.getElementById('no_two').value;   
    alert(no); 
    var txt = document.getElementById('amount_two').value;
    alert(txt); 
    txt2 = txt * no;
    document.getElementById("result_two").value = txt2;
}
</script>

<script>
function function1() {
 alert('here');
    var no = document.getElementById('no_one').value;   
    var txt = document.getElementById('amount_one').value;
    txt2 = txt * no;
    document.getElementById("result_one").value = txt2;
}
</script>







<!--body background="images/background.jpg"-->
<body>









<div style="width: 100%;">
   <!--div style="float:left; width: 50%"-->

<form action ="nurses_station_pg3.php" method ="GET">
<?php


$company_identity =$company_identity; 
$date = date('y-m-d');




//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
$address = "$company<br>$address1<br>$address2";

echo"<table width ='100%'><tr><td align ='center'></td></tr><tr><td align ='left'></td></tr><tr><td align ='left'></td></tr><tr><td align ='left'><h4>UPDATE WARD ROUNDS</h4></td></tr></table>";
   //Delete from the graph file
   //--------------------------
   $query="DELETE FROM my_chart_data WHERE category<>''";
   $result =mysql_query($query) or die(mysql_error());

   $SQL= "SELECT * FROM nursesfile3 where adm_no ='$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $query= "SELECT * FROM nursesfile3 where adm_no ='$adm_no'" or die(mysql_error());
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
      $adm_no      = mysql_result($result,$i,"adm_no");          
      $appointment = mysql_result($result,$i,"date");   
   //get previous temps
   //------------------
   $ref_no3 = mysql_result($result,$i,"ref_no");   
   $adm_date = mysql_result($result,$i,"date");   
   //if ($adm_no==$adm_no2){
      $temp6hrs  =mysql_result($result,$i,"temp6hrs");   
      $date  =mysql_result($result,$i,"date");   
      $temp14hrs =mysql_result($result,$i,"temp14hrs");   
      $temp22hrs  =mysql_result($result,$i,"temp22hrs");   
      $pulse6hrs  =mysql_result($result,$i,"pulse6hrs");   
      $pulse14hrs  =mysql_result($result,$i,"pulse14hrs");
      $pulse22hrs  =mysql_result($result,$i,"pulse22hrs");
      $resp6hrs  =mysql_result($result,$i,"resp6hrs");
      $resp14hrs  =mysql_result($result,$i,"resp14hrs");
      $resp22hrs  =mysql_result($result,$i,"resp22hrs");

      $b_p6hrs  =mysql_result($result,$i,"b_p6hrs");
      $b_p14hrs  =mysql_result($result,$i,"b_p14hrs");
      $b_p22hrs  =mysql_result($result,$i,"b_p22hrs");

      $notes      =mysql_result($result,$i,"notes");
   
      //here
    $query4= "INSERT INTO my_chart_data VALUES('$date','$temp6hrs','$b_p6hrs')";
      $result4 =mysql_query($query4);

    $query4= "INSERT INTO my_chart_data VALUES('$date','$temp14hrs','$b_p14hrs')";
      $result4 =mysql_query($query4);

    $query4= "INSERT INTO my_chart_data VALUES('$date','$temp22hrs','$b_p22hrs')";
      $result4 =mysql_query($query4);

   //}
   $i++;
   }


echo"<table width ='100%'><tr><th width ='20' align ='left' bgcolor ='black'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='250' bgcolor ='black' align='left'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='20' align='left' bgcolor ='black'><font color ='white'></th></tr>";







echo"<table width ='100%'>";

echo"<tr border ='2'><td width ='100' align ='left'><b>In-Patient No.:</b></td><td width ='30'></td><td width='200' align='left'>$adm_no</td><td width ='10'><font color ='blue'>T/M</font></td><td width ='50' align ='left'><b><font color ='green'>Temps</b></td><td width ='30'></td><td width='50' align='left'><font color ='green'>Pulse</font></td><td width='50' align='left'><font color ='green'>Resp.</font></td><td width='50' align='left'><font color ='green'>B.P</font></td></tr>";

echo"<tr><td width ='100' align ='left'><b>Name:</b></td><td width ='30'></td><td width='200' align='left'>$name</td><td width ='10'>6hrs</td><td width ='50' align ='left'><b><font color ='blue'><input type='text' name='temp6hrs' value='$temp6hrs' size='10'></td><td width ='30'></td><td width='50' align='left'><input type='text' name='pulse6hrs' value='$pulse6hrs' size='10'></td><td width='50' align='left'><input type='text' name='resp6hrs' value='$resp6hrs' size='10'></td><td width='50' align='left'><input type='text' name='b_p6hrs' value='$b_p6hrs' size='10'></td></tr>";


echo"<tr><td width ='100' align ='left'><b>Adm Date :</b></td><td width ='30'></td><td width='200' align='left'>$adm_date</td><td width ='10'>14hrs</td><td width ='50' align ='left'><b><font color ='blue'><input type='text' name='temp14hrs' value='$temp14hrs' size='10'></td><td width ='30'></td><td width='50' align='left'><input type='text' name='pulse14hrs' value='$pulse14hrs' size='10'></td><td width='50' align='left'><input type='text' name='resp14hrs' value='$temp14hrs' size='10'></td><td width='50' align='left'><input type='text' name='b_p14hrs' value='$b_p14hrs' size='10'></td></tr>";

echo"<tr><td width ='100' align ='left'><b>Bed No.:</b></td><td width ='30'></td><td width='200' align='left'>$bed_no</td><td width ='10'>22hrs</td><td width ='50' align ='left'><b><font color ='blue'><input type='text' name='temp22hrs' value='$temp22hrs' size='10'></td><td width ='30'></td><td width='50' align='left'><input type='text' name='pulse22hrs' value='$pulse22hrs' size='10'></td><td width='50' align='left'><input type='text' name='resp22hrs' value='$resp22hrs' size='10'></td><td width='50' align='left'><input type='text' name='b_p22hrs' value='$b_p22hrs' size='10'></td></tr></table><br><br>";

//Go and get rest of info from medicalfile
//----------------------------------------
//Nurses Notes
//----------------------------------------
echo"<textarea rows='7' cols='100' id='n_notes' name='n_notes' readonly>$notes</textarea><br>";


require('index.html');

//echo"<OBJECT data='index.html' type='text/html' //style='margin: 0; width: 100%; height: 200px; padding 0px; //text-align:left;'></OBJECT>";

//Now go and display vitals
//-------------------------
echo"<table>";
   $SQL= "SELECT * FROM nursesfile3 where adm_no ='$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $query= "SELECT * FROM nursesfile3 where adm_no ='$adm_no'" or die(mysql_error());
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
      $puls6      = mysql_result($result,$i,"pulse6hrs");          
      $puls14      = mysql_result($result,$i,"pulse14hrs");          
      $puls22      = mysql_result($result,$i,"pulse22hrs");          

      $temp6      = mysql_result($result,$i,"temp6hrs");          
      $temp14      = mysql_result($result,$i,"temp14hrs");          
      $temp22      = mysql_result($result,$i,"temp22hrs");          

      $bp6      = mysql_result($result,$i,"b_p6hrs");          
      $bp14      = mysql_result($result,$i,"b_p14hrs");          
      $bp22      = mysql_result($result,$i,"b_p22hrs");          

      $resp6      = mysql_result($result,$i,"resp6hrs");          
      $resp14      = mysql_result($result,$i,"resp14hrs");          
      $resp22      = mysql_result($result,$i,"resp22hrs");          
      echo"<tr><td>$temp6</td><td>$puls6</td><td>$resp6</td><td>$bp6</td></tr>";
      echo"<tr><td>$temp14</td><td>$puls14</td><td>$resp14</td><td>$bp14</td></tr>";
      echo"<tr><td>$temp22</td><td>$puls22</td><td>$resp22</td><td>$bp22</td></tr>";

     $i++;
   }
   echo"</table>";




   $SQL= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $query= "SELECT * FROM medicalfile where id ='$id_no'" or die(mysql_error());
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

      $diag1       = mysql_result($result,$i,"diag1");  
      $diag2       = mysql_result($result,$i,"diag2");  
      $summary     = mysql_result($result,$i,"notes");  
      $ref_nos     = "id";  

     $i++;
   }


        

echo"<table width ='100%'><tr><td align ='left'><b><u>DIAGNOSIS</u></b></td></tr><tr><td align='left'>$diag1<br>$diag2</td></tr><tr><td align='right'><b>Nurses Notes</b></td></tr><td><textarea rows='7' cols='100' id='n_notes' name='n_notes' required></textarea></td></tr></table><br><br>";


$atextarea_a = substr($summary,0,100);
$atextarea_b = substr($summary,100,100);
$atextarea_c = substr($summary,200,100);
$atextarea_d = substr($summary,300,100);
$atextarea_e = substr($summary,400,100);

//echo"<table width ='100%'><tr><td align ='left'><b><u>
//MANAGEMENT SUMMARY</u></b></td></tr>";
//echo"<tr><td align //'left'>$atextarea_a<br>$atextarea_b<br>$atextarea_c<br>$atex//tarea_d<br>$atextarea_e</td></tr>";
//echo"</table><br><br>";

echo"<table width ='100%'><tr><td align ='left'><b><u>EXTEND OF INJURY OR PROBLEM</u></b></td></tr>";
echo"<tr><td align ='left'>$atextarea_a<br>$atextarea_b<br>$atextarea_c<br>$atextarea_d<br>$atextarea_e</td></tr></table><br><br>";

$tests =$test1.','.$test2.','.$test3.','.$test4.','.$test5;
echo"<table width ='100%'><tr><td align ='left'><b><u>INVESTIGATIONS IF ANY</u></b></td></tr>";
echo"<tr><td align ='left'>$tests</td></tr>";
echo"</table><br><br>";


$today =date('y-m-d');
$d=strtotime("$today");

echo"<input type='submit' name='save_cancel'  class='button' value='Save Transaction'>";


?>


<br><br>
</div>


<!--div style="float:center;"-->
 <!--div style="float:left; width: 50%"-->

<p align ='centre'></p>



<!--h2>Admission Details</h2-->
<?php



//echo"<table><tr><td>";
//if ($test1<>''){
//echo"<input type='text' id ='tests1' name='tests1' value='$test1' size='60'></td><td width='10' align='left'><!--input type='text' id ='test1_qty' //name='test1_qty' size='5' value='$test1_qty'--></td>";
//if ($test1_results<>''){
//echo"<td><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>Results</button>";


?>
























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