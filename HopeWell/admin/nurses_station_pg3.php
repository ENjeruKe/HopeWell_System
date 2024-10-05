<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
$mdate =$_SESSION['sys_date'];
?>



<?php
$mdate =$_SESSION['sys_date'];
if (isset($_GET['save_cancel'])){
   $name =$_SESSION['patients_name'];
   $adm_no =$_SESSION['adm_no'];
   $ref_no = $_SESSION['ref_no'];
   $id = $_SESSION['id_no'];
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


   $notes       =$_GET['n_notes'];

   $resp6hrs  =$_GET['resp6hrs'];
   $resp14hrs  =$_GET['resp14hrs'];
   $resp22hrs  =$_GET['resp22hrs'];
   
   $query00= "UPDATE nursesfile3 SET temp6hrs='$temp6hrs',temp14hrs='$temp14hrs',temp22hrs='$temp22hrs',pulse6hrs='$pulse6hrs',pulse14hrs='$pulse14hrs',pulse22hrs='$pulse22hrs',resp6hrs ='$resp6hrs',resp14hrs='$resp14hrs',resp22hrs='$resp22hrs',notes ='$notes',b_p6hrs ='$b_p6hrs',b_p14hrs='$b_p14hrs',b_p22hrs='$b_p22hrs' WHERE id ='$id'";
     $result00 =mysql_query($query00);

echo'<h2>Data save successfully.Kindly close this window <br>to select another patient...';
die();
}



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

if (isset($_GET['ref_noz'])){
   $adm_no  = $_GET['accounts3'];
   $id_no   = $_GET['accounts'];
   $ref_no   = $_GET['ref_no'];
   $ref_noz  = $_GET['ref_noz'];
   $payer = $_SESSION['payer'];
   $time = $_GET['time'];


   $customer = $_SESSION['customer'];
   if ($payer==''){
      $iss_type ='CASH';
      $query = "select * FROM auto_transact where id = '$ref_noz' and location ='DRUGS'";
   }else{
      $iss_type ='ISP';
      $query = "select * FROM auto_transact_inv where id = '$ref_noz' and location ='DRUGS'";
   }
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   while ($i < $num)
      {                  
         $price   = mysql_result($result,$i,"sell_price");
         $item    = mysql_result($result,$i,"description");
         $inv_ref = mysql_result($result,$i,"invoice_no");
         $qty     = mysql_result($result,$i,"qty");
         $med_cost = $price*$qty;
         $query2 = "select * FROM stockfile where description ='$item'" ;
         $result2 =mysql_query($query2) or die(mysql_error());
         $id = 0;
         $nRecord = 1;
         $No = $nRecord;
         $num2 =mysql_numrows($result2) or die(mysql_error());
         $i2 =0;
         $drug_total = 0;
         while ($i2 < $num2)
            {                  
            $level     = mysql_result($result2,$i2,"qty");
            $bal_level = $level-$qty;
            $i2++;
            }
            $query7= "UPDATE stockfile SET qty='$bal_level' WHERE description ='$item'";
            $result7 =mysql_query($query7);

            $query4= "INSERT INTO st_trans VALUES('$location','$item','$customer',
'-$qty','$iss_type','$date','$username','$price','$med_cost','$id_no','$adm_no','','','','','')";
      $result4 =mysql_query($query4);


        $query5= "INSERT INTO htransf 
         VALUES('$adm_no','$customer','$date','$id_no','$item','DB','$med_cost','DRUGS','DRUGS',
'DB','','$username','','$date','$qty','$payer')";
         $result5 =mysql_query($query5);
     $i++;
    }
echo $id_no;

  //Now go and update nurses file
  //-----------------------------
  if ($time=='6am'){
   $query2= "UPDATE nursesfile3 SET drg6am='Issued' WHERE id='$id_no'";
   $result2 =mysql_query($query2);
  }

  if ($time=='10am'){
   $query2= "UPDATE nursesfile3 SET drg10am='Issued' WHERE id='$id_no'";
   $result2 =mysql_query($query2);
  }

  if ($time=='12noon'){
   $query2= "UPDATE nursesfile3 SET drg12='Issued' WHERE id='$id_no'";
   $result2 =mysql_query($query2);
  }

  if ($time=='2pm'){
   $query2= "UPDATE nursesfile3 SET drg2pm='Issued' WHERE id='$id_no'";
   $result2 =mysql_query($query2);
  }

  if ($time=='6pm'){
   $query2= "UPDATE nursesfile3 SET drg6pm='Issued' WHERE id='$id_no'";
   $result2 =mysql_query($query2);
  }
  if ($time=='10pm'){
   $query2= "UPDATE nursesfile3 SET drg10pm='Issued' WHERE id='$id_no'";
   $result2 =mysql_query($query2);
  }




}

//End of the drugs
//----------------




















$today = date('y/m/d');
if (isset($_GET['accounts3'])){
   $check_date = date('y-m-d');
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

   $_SESSION['patients_name']=$name;
   $_SESSION['adm_no']=$adm_no;
   $_SESSION['ref_no']=$ref_no;
   $_SESSION['adm_date']=$adm_date;

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
   <div style="float:left; width: 50%">

<form action ="nurses_station_pg3.php" method ="GET">
<?php


$company_identity =$company_identity; 
$date = date('y-m-d');



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

echo"<table width ='100%'><tr><td align ='center'></td></tr><tr><td align ='left'></td></tr><tr><td align ='left'></td></tr><tr><td align ='left'><h4>UPDATE WARD ROUNDS</h4></td></tr></table>";

$adm_no =$_SESSION['adm_no'];
   $SQL= "SELECT * FROM nursesfile3 where id ='$id_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $query= "SELECT * FROM nursesfile3 where id ='$id_no'"or die(mysql_error());
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
      $ref_no1      = mysql_result($result,$i,"ref_no");          
      $id1      = mysql_result($result,$i,"id");          

   //get previous temps
   //------------------
   $ref_no3 = mysql_result($result,$i,"ref_no");   
   $adm_date = mysql_result($result,$i,"date");   
   if ($ref_no1==$ref_noss){
      $temp6hrs  =mysql_result($result,$i,"temp6hrs");   
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
      $notes  =mysql_result($result,$i,"notes");

      $drg6am =mysql_result($result,$i,"drg6am");
      $drg10am =mysql_result($result,$i,"drg10am");
      $drg12 =mysql_result($result,$i,"drg12");
      $drg2pm =mysql_result($result,$i,"drg2pm");
      $drg6pm =mysql_result($result,$i,"drg6pm");
      $drg10pm =mysql_result($result,$i,"drg10pm");
   }
   $i++;
   }


echo"<table width ='100%'><tr><th width ='20' align ='left' bgcolor ='black'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='250' bgcolor ='black' align='left'><font color ='white'></th><th width ='1' align ='left' bgcolor ='black'><font color ='white'></th><th width ='20' align='left' bgcolor ='black'><font color ='white'></th></tr>";

echo"<table><tr border ='2'><td width ='100' align ='left'><b>In-Patient No.:</b></td><td width ='30'></td><td width='200' align='left'>$adm_no</td></tr>";

echo"<tr><td width ='100' align ='left'><b>Name:</b></td><td width ='30'></td><td width='200' align='left'>$name</td></tr>";

echo"<tr><td width ='100' align ='left'><b>Adm Date :</b></td><td width ='30'></td><td width='200' align='left'>$adm_date</td></tr>";

echo"<tr><td width ='100' align ='left'><b>Bed No.:</b></td><td width ='30'></td><td width='200' align='left'>$bed_no</td></tr></table>";




echo"<table width ='100%'>";

echo"<tr><td width ='10'><font color ='blue'>T/M</font></td><td width ='50' align ='left'><b><font color ='green'>Temps</b></td><td width ='30'></td><td width='50' align='left'><font color ='green'>Pulse</font></td><td width='50' align='left'><font color ='green'>Resp.</font></td><td width='50' align='left'><font color ='green'>B.P</font></td></tr>";

echo"<tr><td width ='10'>6am</td><td width ='50' align ='left'><b><font color ='blue'><input type='text' name='temp6hrs' value='$temp6hrs' size='10'></td><td width ='30'></td><td width='50' align='left'><input type='text' name='pulse6hrs' value='$pulse6hrs' size='10'></td><td width='50' align='left'><input type='text' name='resp6hrs' value='$resp6hrs' size='10'></td><td width='50' align='left'><input type='text' name='b_p6hrs' value='$b_p6hrs' size='10'></td></tr>";


echo"<tr><td width ='10'>2Pm</td><td width ='50' align ='left'><b><font color ='blue'><input type='text' name='temp14hrs' value='$temp14hrs' size='10'></td><td width ='30'></td><td width='50' align='left'><input type='text' name='pulse14hrs' value='$pulse14hrs' size='10'></td><td width='50' align='left'><input type='text' name='resp14hrs' value='$temp14hrs' size='10'></td><td width='50' align='left'><input type='text' name='b_p14hrs' value='$b_p14hrs' size='10'></tr>";

echo"<tr><td width ='10'>10pm</td><td width ='50' align ='left'><b><font color ='blue'><input type='text' name='temp22hrs' value='$temp22hrs' size='10'></td><td width ='30'></td><td width='50' align='left'><input type='text' name='pulse22hrs' value='$pulse22hrs' size='10'></td><td width='50' align='left'><input type='text' name='resp22hrs' value='$resp22hrs' size='10'></td><td width='50' align='left'><input type='text' name='b_p22hrs' value='$b_p22hrs' size='10'></td></tr></table><br><br>";

//Go and get rest of info from medicalfile
//----------------------------------------



   $SQL= "SELECT * FROM medicalfile where ref_no ='$ref_noss'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $query= "SELECT * FROM medicalfile where ref_no ='$ref_noss'" or die(mysql_error());
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
      $test1       = mysql_result($result,$i,"test1_result");
      $test2       = mysql_result($result,$i,"test2_result");
      $test3       = mysql_result($result,$i,"test3_result");
      $test4       = mysql_result($result,$i,"test4_result");
      $test5       = mysql_result($result,$i,"test5_result");
      $payer       = mysql_result($result,$i,"gl_account");
      $_SESSION['payer']= $payer;
      $_SESSION['customer']= $name;
      $ref_no       = mysql_result($result,$i,"ref_no");
      $diag1       = mysql_result($result,$i,"diag1");  
      $diag2       = mysql_result($result,$i,"diag2");  
      $summary     = mysql_result($result,$i,"notes");  
      $ref_nos     = "id";  

     $i++;
   }



echo"<table width ='60%'><tr><td align ='left'><b><u>DIAGNOSIS</u></b></td></tr><tr><td align='left'>$diag1<br>$diag2</td></tr><tr><td align='left'><b><br><br>Nurses Notes</b></td></tr><td><textarea rows='7' cols='60' id='n_notes' name='n_notes' required>$notes</textarea></td></tr></table><br><br>";


$atextarea_a = substr($summary,0,100);
$atextarea_b = substr($summary,100,100);
$atextarea_c = substr($summary,200,100);
$atextarea_d = substr($summary,300,100);
$atextarea_e = substr($summary,400,100);


//echo"<table width ='100%'><tr><td align ='left'><b><u>EXTEND //OF INJURY OR PROBLEM</u></b></td></tr>";
//echo"<tr><td align ='left'>$atextarea_a<br>$atextarea_b<br>//
//$atextarea_c<br>$atextarea_d<br>$atextarea_e</td></tr></table>//<br><br>";

echo"<table width ='100%'><tr><td align ='left'><b><u>DOCTORS NOTES / EXTEND OF INJURY OR PROBLEM</u></b></td></tr><tr><td><textarea rows='7' cols='60' id='n_notes2' name='n_notes2' required>$summary</textarea></td></tr></table><br><br>";




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
 <div style="float:left; width: 50%">

<p align ='centre'></p>

<h2><p align ='left'>PRESCRIPTION DETAILS</p></h2>
<?php

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
echo"<table width ='100%' border ='0'><td>";
//Get test cost
//-------------
echo"<font color ='blue'><b>Prescription</font></b>";
$sql="SELECT * FROM  auto_transact_inv WHERE invoice_no = '$ref_no'";
$result = mysql_query($sql);
$found ='No';
$id_no =$_SESSION['id_no'];

echo "<table width ='100%' border ='0'>
<tr>
<th width ='20' bgcolor ='black' align ='left'><font color ='white'>ID</th>
<th width ='100' bgcolor ='black' align ='left'><font color ='white' align ='left'>Date</th>
<th width ='250' bgcolor ='black' align ='left'><font color ='white' align ='left'>Item Description</th><th width ='150' bgcolor ='black' align ='left'><font color ='white' align ='left'>click on time if Dispensed</th><th></th></tr>";
while($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td width ='100'>" . $row['date'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    $price =  $row['credit_rate'];
    $paid  =  $row['balance'];
    $line  =  $row['line_no'];
    $ref_no=  $row['invoice_no'];
    $ref_noz=  $row['id'];
    $item_type=  $row['location'];
    if ($item_type=='DRUGS' and $drg6am =='N/D'){
    //echo"<td align ='center'><a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=6am'>6am</a>|<a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=10am'>10am</a>|<a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=12noon'>1200</a>|<a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=2pm'>2pm</a>|<a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=6pm'>6pm</a>|<a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=10pm'>10pm</a></td>";
    echo"<td align ='center'><a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=6am'>6am</a>|";
    }
    if ($item_type=='DRUGS' and $drg10am =='N/D'){
    echo"<td align ='center'><a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=10am'>10am</a>|";
    }
    if ($item_type=='DRUGS' and $drg12 =='N/D'){
    echo"<td align ='center'><a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=12noon'>12noon</a>|";
    }
    if ($item_type=='DRUGS' and $drg2pm =='N/D'){
    echo"<td align ='center'><a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=2pm'>2pm</a>|";
    }
    if ($item_type=='DRUGS' and $drg6pm =='N/D'){
    echo"<td align ='center'><a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=6pm'>6pm</a>|";
    }
    if ($item_type=='DRUGS' and $drg10pm =='N/D'){
    echo"<td align ='center'><a href='nurses_station_pg3.php?accounts3=$line&accounts=$id_no&ref_noz=$ref_noz&ref_no=$ref_no&time=10pm'>10pm</a>|";
    }

    echo "</td></tr>";
}
echo "</table><br>";

echo"<table><tr><td width ='5'>6am</td><td width ='30'></td><td width='5'>10am</td><td width ='30'></td><td width ='5'>Noon</td><td width ='30'></td><td width ='5'>2pm</td><td width ='30'></td><td width ='5'>6pm</td><td width ='30'></td><td width ='5'>10pm</td><td width ='30'></td></tr><tr><td>$drg6am</td><td width ='30'></td><td>$drg10am</td><td width ='30'></td><td>$drg12</td><td width ='30'></td><td>$drg2pm</td><td width ='30'></td><td>$drg6pm</td><td width ='30'></td><td>$drg10pm</td></tr></table>"




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