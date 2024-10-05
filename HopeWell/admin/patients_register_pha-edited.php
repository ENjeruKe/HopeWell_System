<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$username =$_SESSION['username'];
$mdate = $_SESSION['sys_date'];
?>



<?php
if (isset($_GET['Laboratory'])){   
   $ref_nos = $_GET['Laboratory'];
   $query3= "UPDATE medicalfile SET status ='To Laboratory' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);
}

if (isset($_GET['Radiology'])){   
   $ref_nos = $_GET['Radiology'];
   $query3= "UPDATE medicalfile SET status ='To Radiology' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);
}
if (isset($_GET['Triage'])){   
   $ref_nos = $_GET['Triage'];
   $query3= "UPDATE medicalfile SET status ='To Triage' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);
}
if (isset($_GET['Doctor'])){   
   $ref_nos = $_GET['Doctor'];
   $query3= "UPDATE medicalfile SET status ='To Doctor' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);
}

if (isset($_GET['save_cancel'])){  
   //Go and save first
   //-------------------
   $adm_no=$_GET['id'];
   $date=$_GET['date'];
   $doctor = $_GET['doc_account'];
   $customer =$_GET['customer'];
   $status =$_GET['status'];
   $height =$_GET['height'];
   $ref_nos =$_GET['height'];
   $weight =$_GET['weight'];
   $temp =$_GET['temp'];
   $b_p =$_GET['b_p'];
   $today =date('y-m-d');
   $sex =$_GET['sex'];
   $age =$_GET['age'];
   $test1 =$_GET['test1_dx'];
   $test2 =$_GET['test2_dx'];
   $test3 =$_GET['test3_dx'];
   $test4 =$_GET['test4_dx'];
   $test5 =$_GET['test5_dx'];
   $test6 =$_GET['test6_dx'];
   $test7 =$_GET['test7_dx'];
   $payer =$_GET['payer'];
   $test1dx2 =$_GET['test1_dx2'];
   $test2dx2 =$_GET['test2_dx2'];
   $test3dx2 =$_GET['test3_dx2'];
   $test4dx2 =$_GET['test4_dx2'];
   $test5dx2 =$_GET['test5_dx2'];
   $test6dx2 =$_GET['test6_dx2'];
   $test7dx2 =$_GET['test7_dx2'];

   $dose1 =$_GET['dose1'];
   $dose2 =$_GET['dose2'];
   $dose3 =$_GET['dose3'];
   $dose4 =$_GET['dose4'];
   $dose5 =$_GET['dose5'];
   $dose6 =$_GET['dose6'];
   $dose7 =$_GET['dose7'];

   $med1_qty =$_GET['test1_qty'];
   $med2_qty =$_GET['test2_qty'];
   $med3_qty =$_GET['test3_qty'];
   $med4_qty =$_GET['test4_qty'];
   $med5_qty =$_GET['test5_qty'];
   $med6_qty =$_GET['test6_qty'];
   $med7_qty =$_GET['test7_qty'];

   $med1 =$_GET['test1'];
   $med2 =$_GET['test2'];
   $med3 =$_GET['test3'];
   $med4 =$_GET['test4'];
   $med5 =$_GET['test5'];
   $med6 =$_GET['test6'];
   $med7 =$_GET['test7'];

 //$time = date('y-m-d h:i:s a', time());
 $time = date("Y-m-d H:i:s");

 //---------------------------------------
 $query5= "INSERT INTO logfile VALUES('$time','$customer','$username','Pharmacy')";
 $result5 =mysql_query($query5);


   if ($payer==''){
      $iss_type ='CASH';
      $query = "select * FROM auto_transact where invoice_no = '$ref_nos' and sell_price<>0 and location ='DRUGS'";
   }else{
      $iss_type ='ISP';
      $query = "select * FROM auto_transact_inv where invoice_no = '$ref_nos' and sell_price<>0 and location ='DRUGS'";
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
         $med_cost = mysql_result($result,$i,"credit_rate");

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

            //if ($med_cost<>0){
            $query4= "INSERT INTO st_trans VALUES('$location','$item','$customer',
'-$qty','$iss_type','$date','$username','$price','$med_cost','$ref_nos','$adm_no','','','','','')";
      $result4 =mysql_query($query4);
            //}


        $query5= "INSERT INTO htransf 
         VALUES('$adm_no','$customer','$date','$ref_nos','$item','DB','$med_cost','DRUGS','DRUGS',
'DB','','$username','','$date','$qty','$payer')";
         $result5 =mysql_query($query5);

        if ($i==0){
           $query3= "UPDATE medicalfile SET status ='Dispensed',med1='$item',med1_cost='$med_cost',drug1_issued='Yes' WHERE ref_no ='$ref_nos'";
           $result3 =mysql_query($query3);
        }

        if ($i==1){
           $query3= "UPDATE medicalfile SET status ='Dispensed',med2='$item',med2_cost='$med_cost',drug2_issued='Yes' WHERE ref_no ='$ref_nos'";
           $result3 =mysql_query($query3);
        }

        if ($i==2){
           $query3= "UPDATE medicalfile SET status ='Dispensed',med3='$item',med3_cost='$med_cost',drug3_issued='Yes' WHERE ref_no ='$ref_nos'";
           $result3 =mysql_query($query3);
        }

        if ($i==3){
           $query3= "UPDATE medicalfile SET status ='Dispensed',med4='$item',med4_cost='$med_cost',drug4_issued='Yes' WHERE ref_no ='$ref_nos'";
           $result3 =mysql_query($query3);
        }

        if ($i==4){
           $query3= "UPDATE medicalfile SET status ='Dispensed',med5='$item',med5_cost='$med_cost',drug5_issued='Yes' WHERE ref_no ='$ref_nos'";
           $result3 =mysql_query($query3);
        }
        if ($i==5){
           $query3= "UPDATE medicalfile SET status ='Dispensed',med6='$item',med6_cost='$med_cost',drug6_issued='Yes' WHERE ref_no ='$ref_nos'";
           $result3 =mysql_query($query3);
        }

        if ($i==6){
           $query3= "UPDATE medicalfile SET status ='Dispensed',med7='$item',med7_cost='$med_cost',drug7_issued='Yes' WHERE ref_no ='$ref_nos'";
           $result3 =mysql_query($query3);
        }

     $i++;
    }

    
   $query3= "UPDATE medicalfile SET status='Dispensed' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3); 

//Ref Point. Dont delete them
//---------------------------
if ($payer==''){
//
}else{
    $sql="UPDATE auto_transact_inv set selected ='Yes' where invoice_no = '$ref_nos' and location ='DRUGS'";
$result = mysql_query($sql);
}
   
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>HMIS | Doctors Page </title>
<head>

<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>



























<script language="javascript" type="text/javascript">
<!-- -->
function popitup(url) {
	newwindow=window.open(url,'name','height=600,width=850');
	if (window.focus) {newwindow.focus()}
	return false;
}

<!-- // -->
</script>


</head>




<body>
<a href=javascript:popitup('pha_walk_in.php')><b>Walk in Patient</b></a><br>
<form action ="patients_register_pha.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
//echo"<option value='Selection Option'>A Selection Option required</option>";
echo"<option value='Name'>Name</option>";
echo"<option value='Date'>Date</option>";
echo"<option value='Doctor'>Doctor</option></select>";
//echo"<input type='text' name='date' size='15' value ='$mdate'><br>";
?>
</FORM>
<!--/td></table><br-->
<?php

   

$mmdate = date('y-m-d');
$mleast =123552620;
$mdate =date('y-m-d');
$mdate = $_SESSION['sys_date'];
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Doctor'){
     $query = "select * FROM  medicalfile WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
     $SQL = "select * FROM  medicalfile WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
   }
   if ($search_by =='Diagnosis'){
     $query = "select * FROM  medicalfile WHERE diag1,diag2,diag3 LIKE '%$search%' ORDER BY date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE diag1,diag2,diag3 LIKE '%$search%' ORDER BY date desc" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
   }
   if ($search_by =='Date'){
     $mmdate = $search;
     $_SESSION['smart_date']=$mmdate;
     $query = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
   }
 }else{
   $query= "SELECT * FROM medicalfile where date ='$mdate'  ORDER BY date DESC" or die(mysql_error());
//where status ='To Pharmacy' and 
   $SQL  = "SELECT * FROM medicalfile where date ='$mdate'  ORDER BY date DESC" or die(mysql_error());
//status ='To Pharmacy' and
}


$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;




                                                         
echo"<table width ='100%' class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>ID</th><th>Click to Edit Patient's Vitals.</th><th>Age</th><th>Sex</th><th>App.Date</th><th>Temp</th><th>Pay Account</th><th>B.P</th></tr>";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {               
      $codes   = mysql_result($result,$i,"adm_no");  
      $desc    = mysql_result($result,$i,"name");   
      $rate    = mysql_result($result,$i,"sex");   
      $code   = mysql_result($result,$i,"payer");   
      $update = mysql_result($result,$i,"date");  
      $contact = mysql_result($result,$i,"weight");  
      $street  = mysql_result($result,$i,"temp");
      $age    = mysql_result($result,$i,"age");
      $status    = mysql_result($result,$i,"status");
      $time   = mysql_result($result,$i,"time");
      $doctor = mysql_result($result,$i,"b_p");
      $height = mysql_result($result,$i,"height");
      $account = mysql_result($result,$i,"gl_account");

      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      $aa =$row['id'];   
      $aa4 =$row['invoice_no'];

      echo"<td width ='10' align ='left'>";      
      if ($mdate==$mmdate){
         echo $codes;
      }else{
    echo"<a href='patients_pha_add_service.php?accounts3=$bb&accounts=$aa&accounts4=$mmdate'>$codes<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      }
      echo"</td>";
      echo"<td width ='200' align ='left'><a href='patients_pha_edit.php?accounts3=$bb&accounts=$aa&accounts4=$aa4'>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      echo"</td>";            
      echo"<td width ='30'>";      
      echo"$age";
      echo"</td>";      
      echo"<td width ='20'>";
      echo"$rate";
      echo"</td>";
//      echo"<td width ='60'>";
//      echo"$update";
//      echo"</td>";
      echo"<td width ='60'><a href='fix_errors.php?accounts=$aa'>$update</a></td>";      
      echo"<td width ='50'>";
      if ($status=='Completed'){
         echo"<font color ='red'>";
      }else{
      //
      }
      echo"$status";
      echo"</font>";

      echo"</td>";
      echo"<td width ='200'>";
      //echo"$code";
echo"$account";
      echo"</td>";

      $bb =$row['id'];        
      $aa =$row['id'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      //$aa8=$row['Name'];
      $aa9=$row['app_date']; 
      //echo"<td width ='40' align ='right'>$contact</td>";
      echo"<td width ='40'>";
      echo"$doctor";
      echo"</td>"; 




      




echo"</tr>";
   

      $i++;
  
       
}

      echo"</table>";









      




echo"<table>";
   


      $tot = number_format($tot);

      echo"<tr>";

      echo"<td width ='320' align ='left'>";
      
//echo"$desc";

      echo"</td>";

      
echo"<td width ='200'>";
      echo"</td>";
echo"<td width ='150'><h4>";
      echo"</h4></td>";
echo"<td width ='100' align ='right'>";
echo"</td>";
echo"<td width ='120' align ='right'>";
echo"</td>";
echo"<td width ='100' align ='right'><h4></h4></td>";
echo"<td width ='50'></td>";




      




echo"</tr>";
   




      echo"</table>";




?>
</body>
</html>

