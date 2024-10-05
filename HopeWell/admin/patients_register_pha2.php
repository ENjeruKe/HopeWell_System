<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$username = $_SESSION['username'];

?>



<?php
if (isset($_GET['save_cancel'])){  
   $test1_result  ='';
   $test2_result  ='';
   $test3_result  ='';
   $test4_result  ='';
   $test5_result  ='';
 
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
   if ($payer==''){
      $iss_type ='CASH';
   }else{
      $iss_type ='ISP';
   }

 $time = date('y-m-d h:i:s a', time());
 //---------------------------------------
 $query5= "INSERT INTO logfile VALUES('$time','$customer','$username','Pharmacy')";
 $result5 =mysql_query($query5);

   //Now go and get prices and tabulate cost
   //---------------------------------------
   //Add Qty in file
   $query2 = "select * FROM stockfile" ;
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;
   $drug_total = 0;
   $med1_cost=0;
   $med2_cost=0;
   $med3_cost=0;
   $med4_cost=0;
   $med5_cost=0;
   $med6_cost=0;
   $med7_cost=0;
   $price8=0;
   $price9=0;
   $price10=0;
   while ($i2 < $num2)
      {                  
         $price   = mysql_result($result2,$i2,"sell_price");
         $item    = mysql_result($result2,$i2,"description");
         if ($med1 <>' ' AND $item==$med1){
            $test_it =$test1dx2*$test1;
            if ($test_it<>0){
               $med1_qty = $med1_qty*$test1dx2*$test1;
            }else{
            }
            $price1   = mysql_result($result2,$i2,"sell_price");
            $level     = mysql_result($result2,$i2,"qty");
            $bal_level = $level-$med1_qty;
            $med1_cost = $price1*$med1_qty;
            $drug_total = $drug_total +$med1_cost;

            $query= "UPDATE stockfile SET qty='$bal_level' WHERE description ='$med1'";
            $result =mysql_query($query);
            if ($med1_cost<>0){
            $query4= "INSERT INTO st_trans VALUES('$location','$med1','$customer',
'-$med1_qty','$iss_type','$date','ADMIN','$price1','$med1_cost','$adm_no','$adm_no','','','','','')";
      $result4 =mysql_query($query4);
            }
         }

         if ($med2 <>' ' AND $item==$med2){
            $test_it =$test2dx2*$test2;
            if ($test_it <>0){
               $med2_qty = $med2_qty*$test2dx2*$test2;
            }else{
            }
            $price2   = mysql_result($result2,$i2,"sell_price");
            $level     = mysql_result($result2,$i2,"qty");
            $bal_level = $level-$med2_qty;

            $med2_cost = $price2*$med2_qty;
            $drug_total = $drug_total +$med2_cost;

            $query= "UPDATE stockfile SET qty='$bal_level' WHERE description ='$med2'";
            $result =mysql_query($query);
            if ($med2_cost<>0){
            $query4= "INSERT INTO st_trans VALUES('$location','$med2','$customer',
'-$med2_qty','$iss_type','$date','ADMIN','$price2','$med2_cost','$adm_no','$adm_no','','','','','')";
      $result4 =mysql_query($query4);
            }

         }

  
         if ($med3 <>' ' AND $item==$med3){
            $test_it =$test3dx2*$test3;
            if ($med3_qty >0 AND $test_it==0){
               //No action
            }else{
               $med3_qty = $med3_qty*$test3dx2*$test3;
            }
            $price3   = mysql_result($result2,$i2,"sell_price");
            $level     = mysql_result($result2,$i2,"qty");
            $bal_level = $level-$med3_qty;

            $med3_cost = $price3*$med3_qty;
            $drug_total = $drug_total +$med3_cost;

            $query0= "UPDATE stockfile SET qty='$bal_level' WHERE description ='$med3'";
            $result0 =mysql_query($query0);
            if ($med3_cost<>0){
            $query4= "INSERT INTO st_trans VALUES('$location','$med3','$customer',
'-$med3_qty','$iss_type','$date','ADMIN','$price3','$med3_cost','$adm_no','$adm_no','','','','','')";
      $result4 =mysql_query($query4);
            }
         }

         if ($med4 <>' ' AND $item==$med4){
            $test_it =$test4dx2*$test4;
            if ($med4_qty >0 AND $test_it==0){
               //No action
            }else{
               $med4_qty = $med4_qty*$test4dx2*$test4;
            }
            $price4   = mysql_result($result2,$i2,"sell_price");
            $level     = mysql_result($result2,$i2,"qty");
            $bal_level = $level-$med4_qty;

            $med4_cost = $price4*$med4_qty;
            $drug_total = $drug_total +$med4_cost;

            $query0= "UPDATE stockfile SET qty='$bal_level' WHERE description ='$med4'";
            $result0 =mysql_query($query0);
            if ($med4_cost<>0){
            $query4= "INSERT INTO st_trans VALUES('$location','$med4','$customer',
'-$med4_qty','$iss_type','$date','ADMIN','$price4','$med4_cost','$adm_no','$adm_no','','','','','')";
      $result4 =mysql_query($query4);
            }

         }
         if ($med5 <>' ' AND $item==$med5){
            $test_it =$test5dx2*$test5;
            if ($med5_qty >0 AND $test_it==0){
               //No action
            }else{
               $med5_qty = $med5_qty*$test5dx2*$test5;
            }
            $price5   = mysql_result($result2,$i2,"sell_price");
            $level     = mysql_result($result2,$i2,"qty");
            $bal_level = $level-$med5_qty;

            $med5_cost = $price5*$med5_qty;
            $drug_total = $drug_total +$med5_cost;

            $query0= "UPDATE stockfile SET qty='$bal_level' WHERE description ='$med5'";
            $result0 =mysql_query($query0);

            if ($med5_cost<>0){
            $query4= "INSERT INTO st_trans VALUES('$location','$med5','$customer',
'-$med5_qty','$iss_type','$date','ADMIN','$price5','$med5_cost','$adm_no','$adm_no','','','','','')";
      $result4 =mysql_query($query4);
            }
         }

         if ($med6 <>' ' AND $item==$med6){
            $test_it =$test6dx2*$test6;
            if ($med6_qty >0 AND $test_it==0){
               //No action
            }else{
               $med6_qty = $med6_qty*$test6dx2*$test6;
            }
            $price6   = mysql_result($result2,$i2,"sell_price");
            $level     = mysql_result($result2,$i2,"qty");
            $bal_level = $level-$med6_qty;

            $med6_cost = $price6*$med6_qty;
            $drug_total = $drug_total +$med6_cost;

            $query0= "UPDATE stockfile SET qty='$bal_level' WHERE description ='$med6'";
            $result0 =mysql_query($query0);
            if ($med6_cost<>0){
            $query4= "INSERT INTO st_trans VALUES('$location','$med6','$customer',
'-$med6_qty','$iss_type','$date','ADMIN','$price6','$med6_cost','$adm_no','$adm_no','','','','','')";
      $result4 =mysql_query($query4);
            }

         }
         if ($med7 <>' ' AND $item==$med7){
            $test_it =$test7dx2*$test1;
            if ($med7_qty >0 AND $test_it==0){
               //No action
            }else{
               $med7_qty = $med7_qty*$test7dx2*$test7;
            }
            $price7   = mysql_result($result2,$i2,"sell_price");
            $level     = mysql_result($result2,$i2,"qty");
            $bal_level = $level-$med7_qty;

            $med7_cost = $price7*$med7_qty;
            $drug_total = $drug_total +$med7_cost;

            $query0= "UPDATE stockfile SET qty='$bal_level' WHERE description ='$med7'";
            $result0 =mysql_query($query0);

            if ($med7_cost<>0){
            $query4= "INSERT INTO st_trans VALUES('$location','$med7','$customer',
'-$med7_qty','$iss_type','$date','ADMIN','$price7','$med7_cost','$adm_no','$adm_no','','','','','')";
      $result4 =mysql_query($query4);
            }

         }
         $i2++;

    }
    

   if (isset($_GET['test1'])){
      $query3= "UPDATE medicalfile SET dose1='$dose1',med1='$med1',med1_cost='$med1_cost',drug1_issued='Yes' WHERE ref_no ='$ref_nos'";
      $result3 =mysql_query($query3);
   }
   if (isset($_GET['test2'])){
      $query3= "UPDATE medicalfile SET dose2='$dose2',med2='$med2',med2_cost='$med2_cost',drug2_issued='Yes' WHERE ref_no ='$ref_nos'";
      $result3 =mysql_query($query3);
   }
   if (isset($_GET['test3'])){
      $query3= "UPDATE medicalfile SET dose3='$dose3',med3='$med3',med3_cost='$med3_cost',drug3_issued='Yes' WHERE ref_no ='$ref_nos'";
      $result3 =mysql_query($query3);
   }
   if (isset($_GET['test4'])){
      $query3= "UPDATE medicalfile SET dose4='$dose4',med4='$med4',med4_cost='$med4_cost',drug4_issued='Yes' WHERE ref_no ='$ref_nos'";
      $result3 =mysql_query($query3);
   }
   if (isset($_GET['test5'])){
      $query3= "UPDATE medicalfile SET dose5='$dose5',med5='$med5',med5_cost='$med5cost',drug5_issued='Yes' WHERE ref_no ='$ref_nos'";
      $result3 =mysql_query($query3);   
   } 
   if (isset($_GET['test6'])){
      $query3= "UPDATE medicalfile SET dose6='$dose6',med6='$med6',med6_cost='$test6_cost',drug6_issued='Yes' WHERE ref_no ='$ref_nos'";
      $result3 =mysql_query($query3);
   } 
   if (isset($_GET['test7'])){
      $query3= "UPDATE medicalfile SET dose7='$dose7',med7='$med7',med7_cost='$med7_cost',drug7_issued='Yes' WHERE ref_no ='$ref_nos'";
      $result3 =mysql_query($query3);   
//adm_no ='$adm_no' and date='$today'
   } 
 
   $query3= "UPDATE medicalfile SET status='Completed' WHERE ref_no ='$ref_nos'";
   $result3 =mysql_query($query3);    
//adm_no ='$adm_no' and date='$today'
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
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Doctor'>Doctor</option></select>";
//echo"<input type='text' name='date' size='15' value ='$mdate'><br>";
?>
</FORM>
<!--/td></table><br-->
<?php

   


$mleast =123552620;
$mdate =date('y-m-d');
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
     $query = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
   }
 }else{
   $query= "SELECT * FROM medicalfile where status ='To Pharmacy' and date ='$mdate'  ORDER BY date DESC" or die(mysql_error());
   $SQL  = "SELECT * FROM medicalfile where status ='To Pharmacy' and date ='$mdate'  ORDER BY date DESC" or die(mysql_error());
}


$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;




                                                         
echo"<table width ='100%' class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>ID</th><th>Click to Edit Patient's Vitals.</th><th>Age</th><th>Sex</th><th>App.Date</th><th>Temp</th><th>Pay Account</th><th>Weight</th><th>B.P</th><th>Tests</th></tr>";


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
      $time   = mysql_result($result,$i,"time");
      $doctor = mysql_result($result,$i,"b_p");
      $height = mysql_result($result,$i,"height");

      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      $aa =$row['id'];   
      $aa4 =$row['invoice_no'];

      echo"<td width ='10' align ='left'>$codes";      
      echo"</td>";
      echo"<td width ='200' align ='left'><a href='patients_pha_edit.php?accounts3=$bb&accounts=$aa&accounts4=$aa4'>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      echo"</td>";            
      echo"<td width ='30'>";      
      echo"$age";
      echo"</td>";      
      echo"<td width ='20'>";
      echo"$rate";
      echo"</td>";
      echo"<td width ='60'>";
      echo"$update";
      echo"</td>";
      echo"<td width ='50'>";
      echo"$street";
      echo"</td>";
      echo"<td width ='200'>";
      echo"$code";
      echo"</td>";

      $bb =$row['id'];        
      $aa =$row['id'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      //$aa8=$row['Name'];
      $aa9=$row['app_date']; 
      echo"<td width ='40' align ='right'>$contact</td>";
      echo"<td width ='40'>";
      echo"$doctor";
      echo"</td>"; 
      echo"<td width ='40' align ='right'>$time</td>";




      




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

