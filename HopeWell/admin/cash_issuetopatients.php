<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];

?>
<?php

if (isset($_GET['accounts5'])){ 
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM lab_walkin WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());

}


if (isset($_GET['accounts3'])){
   $_SESSION["rct_adm_no"] = $_GET['accounts3'];
   $adm_no     = $_SESSION["rct_adm_no"];

  //Now go and get name and file from the clients file
  $query7 = "select * FROM appointmentf where adm_no = '$adm_no'" ;
  $result7 =mysql_query($query7) or die(mysql_error());
  $num7 =mysql_numrows($result7) or die(mysql_error());
  $i7=0;
  while ($i7 < $num7)
    {
    $patient_name   = mysql_result($result7,$i7,"name");   
    $pay_company= mysql_result($result7,$i7,"payer");   
    $i7++;    
   }
   $_SESSION["rct_patient"] = $patient_name;
}
?>
﻿<?php
$company_identity = $_SESSION['company'];
$location1 = $_SESSION['company'];
$patient    = $_SESSION["rct_patient"];
$adm_no     = $_SESSION["rct_adm_no"];
//echo $patient;
//echo $adm_no;
//if ($patient==''){
//   echo'<h1>Error on Patient sellection.....</h1>';
//   die();
//}
//For save and print button the correct one
//-----------------------------------------
if (isset($_GET['save_cancel'])){

   echo"<body background='images/background.jpg'>";
   //Go and save first
   //-------------------
   //$payee  =   $_GET['patient'];
   $payee  =   '';
   //$doctor  =  $_GET['patient3'];
   $doctor  =  '';

   //$patient   = $_GET['patient2'];
   $patient    = $_SESSION["rct_patient"];
   $adm_no     = $_SESSION["rct_adm_no"];
   $date      = $_GET['date'];
   $issue     = $_GET['issue'];


   //Get the receipt No.   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_rct");  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_rct ='$ref_no2'";
     $result3 = mysql_query($query3);

   $query = "select * FROM stock_issp WHERE description <>''" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;
   $codes = $_SESSION['company'];
   $ref_no ='A'.$ref_no;
   while ($i < $num)
      {         
      //$codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"gl_account");  
      $tot_amt = $tot_amt + $total;

   $gledger ='CONSULTATION';
   //Now go and Check Bed Charge in Revenue file
   $query3 = "select * FROM revenuef" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $gledger ='Bed Income';
   $i3=0;
   while ($i3 < $num3)
     {
     //$gledger     = mysql_result($result3,$i3,"gl_account");  
     $descs       = mysql_result($result3,$i3,"name");  
     //$g_id        = mysql_result($result3,$i3,"client_id");  
     if ($descs==$desc){
        $gledger     = mysql_result($result3,$i3,"gl_account");  
        $descs       = mysql_result($result3,$i3,"name");  
     }
     $i3++;
   }

         //Reduce Qty in file if medication
         //----------------No stocks here---

        $type ='RC';
        if ($issue=='Cash Receipts'){
           $gledger ='CASH COLLECTION A/C';
           $type ='RC';
        }
  

    

         $debt_control = 'CASH COLLECTION A/C';
         $query5= "INSERT INTO receiptf (location, description, type,qty,trans_desc,date,inputby,price,total,ref_no,balance,adm_no) 
VALUES ('$company_identity', '$desc','$patient','$qty_s','$issue','$date','$doctor','$rate','$total','$ref_no','$total','$patient')";
         $result5 =mysql_query($query5);


       $gledger_gl = 'STOCKS CONTROL';

      //Now go and pass a Debit entry in G/Ledger
      //-----------------------------------------   
      //$desc =$patient;
      $query8= "INSERT INTO gltransf VALUES(' 
      ','$date','$debt_control','$ref_no','RC','$desc','$total','ADMIN','CHIROMO')";
      $result8 =mysql_query($query8);
      $query8 = "select * FROM glaccountsf WHERE account_name='$debt_control'" ;
      $result8 =mysql_query($query8) or die(mysql_error());
      $num8 =mysql_numrows($result8) or die(mysql_error());
      $i8=0;
      while ($i8 < $num8)
        {
        $balances = mysql_result($result8,$i8,"balance"); 
        $i8++;
        }
        $balance = $balances + $total;
        $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='$debt_control'";
        $result3 = mysql_query($query3);


      //Now go and pass a Credit entry in G/Ledger
      $query8= "INSERT INTO gltransf VALUES(' ','$date','$gledger','$ref_no','RC','$desc',
     '-$total','ADMIN','CHIROMO')";
      $result8 =mysql_query($query8);

      $query8 = "select * FROM glaccountsf WHERE account_name='$gledger'" ;
      $result8 =mysql_query($query8) or die(mysql_error());
      $num8 =mysql_numrows($result8) or die(mysql_error());
      $i8=0;
      while ($i8 < $num8)
           {
           $balances = mysql_result($result8,$i8,"balance"); 
           $i8++;
           }
           $balance = $balances - $total;
           $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='$gledger'";
           $result3 = mysql_query($query3);
      //}



      
      $i++;
   }


   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $company   = mysql_result($result3,$i3,"company"); 
     $address1   = mysql_result($result3,$i3,"address1"); 
     $address2   = mysql_result($result3,$i3,"address2"); 
     $address3   = mysql_result($result3,$i3,"address3"); 
     $address4   = mysql_result($result3,$i3,"address4"); 
     $i3++;
     }
  

   //echo"<font size ='4'>";
   echo"<table width='400' border='0' cellspacing='0' cellpadding='0'>";      
   echo"<tr><td width ='400' align ='center'><h2>CASH RECEIPT</h2></td><tr>";
   echo"<tr><td align ='center'><h2>$company</h2></td></tr>";
   echo"<tr><td align ='center'>$address1</td></tr>";
   echo"<tr><td align ='center'>$address2</td></tr>";
   echo"<tr><td align ='center'>$address3</td></tr>";
   echo"</table><br>";

   //$date = date_format($date,"Y/m/d");
   echo"<div><h4>SALES RECEIPT.NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</h4></div><br>";
 //---------Sawa up to this point------------------
   echo"<div><font size ='5'>Payer :</font><img src='space.jpg' style='width:20px;height:2px;'></b><font size ='5'>$patient</font><img src='space.jpg' style='width:20px;height:2px;'>Date:<img src='space.jpg' style='width:5px;height:2px;'><font size ='5'>$date</b><br></font>";
//   echo"------------------------------------------------------------------------<b><br>";
echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
   echo"<font size ='5'>Service Paid For <img src='space.jpg' style='width:100px;height:2px;'></font>";
   echo"<font size ='5'>Amount<img src='space.jpg' style='width:45px;height:2px;'></font>";
   echo"<font size ='5'><img src='space.jpg' style='width:30px;height:2px;'></font>";
   echo"<font size ='5'>Total<img src='space.jpg' style='width:10px;height:2px;'></font>";
   echo"</div>";
//echo"------------------------------------------------------------------------<br>";
echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
$query= "SELECT * FROM stock_issp WHERE sell_price<>0" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<table bgcolor ='black' border ='0' width ='400'>";
//-------Sawa -------------
echo'</font>';
$SQL = "select * FROM stock_issp WHERE sell_price<>0 " ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;

while ($row=mysql_fetch_array($hasil)) 
      {
         
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"gl_account");  
      $tot_amt = $tot_amt + $total;
//      echo"<font size ='8'>";
      $update2 = $total; 
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);

      echo"<tr bgcolor ='white'>";
      echo"<td width ='170' align ='left'>";      
      echo"<font size ='5'>$desc</font>";
      echo"</td>";     
      echo"<td width ='50' align ='right'><font size ='5'>$update2</td></font>";
      //echo"<td width ='50' align ='right'><font size ='5'>$qty</td></font>";
      echo"<td width ='70' align ='right'><font size ='5'>$total</td></font>";
      //echo"<td width ='50' align ='right'></a></td>";
      echo"</font>";
      echo"</tr>";   
      $i++;         
     }
       echo"</table>";

echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
echo"<table>";
echo"<tr><td width ='300' align ='right'><b><font size ='5'>Total:</font></b></td><td width ='45'></td><td><b><font size ='5'>$tot2</font></b></td></tr>";
echo"<tr><td width ='300' align ='left'><b><font size ='5'>Pay Mode:..$issue</font></b></td><td width ='45' align ='left'></td><td><b></b></td></tr>";
//echo"<tr><td width ='300' align ='right'><b>Balance to Pay:</b></td><td width ='45'></td><td><b>$topay</b></td></tr>";
echo "</table><br><br></b>";
//echo "We wish you quick recovery<br>";
//echo"<img src='images/image.bmp' style='width:370px;height:70px;'><br>";
////echo "<input type=\"button\" value=\"Print\" onclick=\"printpage()\" />";
 echo"</font>";
                                                         
     $_SESSION["rct_adm_no"] = '';
      $_SESSION["rct_patient"] = '';





   //Delete entries from temp file
   //-----------------------------
   $query3 = "DELETE FROM stock_issp WHERE qty > 0 and description <>''";
   $result3 =mysql_query($query3) or die(mysql_error());


   $query3 = "DELETE FROM receiptf WHERE total = 0 ";
   $result3 =mysql_query($query3) or die(mysql_error());

   die();
}









if (isset($_GET['accounts5'])){      
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");
   //$record =$_GET['accounts5'];
   //$query3 = "DELETE FROM stock_issp WHERE id ='$record'";
   //$result3 =mysql_query($query3) or die(mysql_error());



}





?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    



<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    



<!-- Le styles -->
    
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/bills-pop-up.js"></script>

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php


// sql to create table
$sql = "CREATE TABLE stock_issp (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
location VARCHAR(30) NOT NULL,
description VARCHAR(100) NOT NULL,
sell_price INT(11),
qty INT(11),
credit_rate INT(11),
gl_account INT(11),
date TIMESTAMP)";


if (isset($_GET['add_next'])){
//if (isset($_GET['accounts6'])){ 
   $count = $_GET['accounts6']; 

   $query= "CREATE TEMPORARY TABLE stock_issp IF NOT EXISTS stock_issp (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);
   //Initiolize the new entries
   //---------------------------
   $myDate = date('yy/m/d');
   $location     = "BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];
   //$count        = $num;
   //$desc         = substr($description, -10);



   //get price for this item as you save it in temporary file
      

   $query9= "INSERT INTO stock_issp  VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate','')";
      $result9 =mysql_query($query9);

   $myDate =date('yy-m-d');

}






if (isset($_GET['refresh'])){
   $date = date('y/m/d');
   //echo"Put some details heare 7";

}

if (isset($_GET['delete'])){
   $date = date('y/m/d');
 
   $query3 = "DELETE FROM stock_issp WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());
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
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
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
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getpriceissp2_cash.php?q="+str,true);
        xmlhttp.send();
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












<body background="images/background.jpg">







<form action ="cash_issuetopatients.php" method ="GET">
<?php



   //New changes
if (isset($_GET['accounts5'])){ 
   $record =$_GET['accounts5'];
echo"$record";
   $query3 = "DELETE FROM stock_issp WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());



    // echo"Put some details heare 9";

}



//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   $date = date('y/m/d');
 

            
   //$cdquery="SELECT date FROM medicalfile WHERE adm_no ='$client_no'";
   //$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());


   //echo"Put some details heare 10";

}










//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = date('y/m/d');

 

  // echo"Put some details heare 11";


}














$company_identity = $_SESSION['company'];




           
 $cdquery="SELECT id,name FROM appointmentf";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


















$date = date('y-m-d');
//$date = date_format($date,"Y/m/d");










// Accounts6 Not applicabel for now
//echo"</td><td width ='100'><input type='text' id ='amounts' name='amounts' size='10' value ='$price'></td><td width='120'>";
//----------------------------------------------
//echo"</td>";
//echo"<td width='50' align='right'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td>";


?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->


<p align ='right'><img src='chiromo-logo33.jpg' alt='statement' height='40' width='350'></p>
<!--img src='chiromo-logo2.jpg' alt='statement' height='50' width='400'-->

 <?php
//Displaying items to be adjusted
/////////////////////////////////
echo"<table bgcolor ='red' border = '0' border color = 'black' width ='100%'><th width ='400' align ='left'>Item Description</th><th width ='100'>Price</th><th width ='120'>Qty</th><th width ='120'>Total</th><th width ='100'>Action</th></th></table>";
 $myfile =gethostname();


 $query= "SELECT * FROM stock_issp " or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
 echo"<table class='altrowstable' id='alternatecolor'>";
 $company_identity =$_SESSION['company'];
 $SQL = "select * FROM stock_issp" ;
 $hasil=mysql_query($SQL, $connect);
 $id = 0;
 $nRecord = 1;
 $No = $nRecord;
 $tot = 0;
 $save ='No';
 $tot_amt =0;
 while ($row=mysql_fetch_array($hasil)) 
      {
               
      $desc    = mysql_result($result,$i,"description");
   
      $qty    = mysql_result($result,$i,"qty");
   
      $price   = mysql_result($result,$i,"sell_price");
   
      $total = mysql_result($result,$i,"gl_account");
      $line  = mysql_result($result,$i,"line_no");

      $save ='Yes';
      $tot_amt = $tot_amt+$total;
      if ($desc > ' '){
         echo"<tr bgcolor ='white' border ='2' bordercolor='black'>";
         //echo"<td align ='left'></td>";
         echo"<td width ='400'><input type='text' id ='s_desc_three' size ='45' name='s_desc_three' value 
        ='$desc'></td>";
      }else{
         echo"<tr bgcolor ='white' border ='2' bordercolor='black'>";
         //echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td>";
         echo"<td width ='400' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";
         $cdquery="SELECT name FROM revenuef order by name";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM revenuef order by name";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["name"];     
            echo "<option>$cdTitle</option>";            
         }
         echo"</select>";
         echo"</td>"; 
    }


    $aa8=$row['id'];
    $line_no    = $row['line_no'];
    $myfunction = $row['line_no'];
    $myfunction = 'function'.$row['line_no'];
    if ($qty > 0){
        echo"<td><input type='text' id ='s_amount_three' name='amount_three' size='10' value 
        ='$price'></td>";
        echo"<td><input type='text' id ='s_no_three' name='s_no_three' size='10' value ='$qty'></td>";
        echo"<td><input type='text' id ='s_result_three' name='s_result_three' size='10' value 
        ='$total'></td>";
    }else{
        echo"<td><input type='text' id ='s_amount_three' name='s_amount_three' size='10' value 
        ='$price'></td>";
        echo"<td><input type='text' id ='s_no_three' name='s_no_three' size='10' 
        onchange='function33()'></td>";
        echo"<td><input type='text' id ='s_result_three' name='s_result_three' size='10'></td>";
    }
  

 
   
      $aa7=$row['description'];        
      $aa8=$row['id'];        
 if ($desc > ' '){
    echo"<td width ='100' align ='right'><a href='cash_issuetopatients.php?accounts5=$aa8'>Del<img src='ico/Info.ico' 
alt='Smiley face' height='12' width='12'></a></td>";
}else{
    echo"<td width ='100' align ='right'></td>";
}
//echo"<td width ='10' align ='right'></td>";

//        echo"<a href='issuetopatients.php?accounts5=$aa8'>Del";


      




echo"</tr>";

      $i++;
  
       
}

echo"<img src='images/black.jpg' style='width:1000px;height:1px;'><br>";   

      echo"</table>";
echo"<table><tr><div id='txtHint'><b>Person info will be listed here...</b></div></tr></table>";


      



echo"<img src='images/black.jpg' style='width:1000px;height:1px;'><br>";
echo"<font size ='20'><table><td width ='325'></td><td width ='100'></td><td><h2>Total:</h2></td><td width ='100' align ='right'></td><td width ='100'></td><td><h2>$tot_amt</h2></td><td width ='100' align ='right'></td></font>";
   
      //echo"</form'>";

      //To show totals here


      echo"</table>";





//----------
 $query= "SELECT * from medicalfile " or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
 $company_identity =$_SESSION['company'];


   $query33 = "select * FROM medicalfile" ;
   $result33 =mysql_query($query33) or die(mysql_error());
   $num33 =mysql_numrows($result33) or die(mysql_error());
   $i33=0;
   while ($i33 < $num33)
     {
     $today    = mysql_result($result33,$i33,"date");
     $i33++;
     }





//--------------

//$date = strtotime($date); 
//$new_date = date('d-m-y', $date);
//$date = $new_date;


echo"<table>";
echo"<tr><td><b>Date</b></td><td><input type='text' name='date' size ='10' value='$date'></td></tr>";
//echo"<tr><td width='100' align='left'><b>Payer </b></td><td>";
//echo"<select id='patient' name='patient'>";        
//$cdquery="SELECT account_name FROM debtorsfile ORDER BY account_name ";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
//while ($cdrow=mysql_fetch_array($cdresult)) {
//  $cdTitle=$cdrow["account_name"];
//  echo "<option>$cdTitle</option>";            
//  }
// echo"</select>";
//echo"</td><tr><td><b>Patient : </b></td><td>";
echo"<tr><td><b>Patient : </b></td><td><input type='text' name='patient2' size ='40' value='$patient'></td></tr>";


//echo"<tr><td><b> Att. Doctor : </b></td><td>";
//echo"<select id='patient3' name='patient3'";        
//$cdquery="SELECT account_name FROM doctorsfile ORDER BY account_name ";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
//while ($cdrow=mysql_fetch_array($cdresult)) {
//  $cdTitle=$cdrow["account_name"];
//  echo "<option>$cdTitle</option>";            
//  }
// echo"</select>";
//echo"</td></tr>";

echo"<tr><td>Transaction Type</td><td>";
echo"<select id ='issue' name ='issue'>";
  echo"<option value='Cash Receipts'>Cash Receipts</option>";
  echo"<option value='Cheque Receipts'>Cheque Receipts</option>";
  echo"<option value='M-Pesa'>M-Pesa</option>";
  echo"<option value='EFT Receipts'>EFT Receipts</option>";
//  echo"<option value='INVOICE'>INVOICE</option>";
echo"</select></td></tr>";
echo"<tr><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td>";

echo"<td align ='left'><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td></td>";

echo"</tr></table>";




?>

</form>



</body>
</html>

















<?php




//For save and print button
//------------------__-----
if (isset($_GET['save_cancel77'])){
   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $patients_name =$_GET['patients_name'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['paid'];


   //Get the receipt No.   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_rct");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_rct ='$ref_no2'";
     $result3 = mysql_query($query3);





   $query = "select * FROM stock_issp" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;
   $codes = $_SESSION['company'];
   while ($i < $num)
      {         
      //$codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"gl_account");  
      $tot_amt = $tot_amt + $total;

      //Add Qty in file
      $query2 = "select * FROM stockfile WHERE description ='$desc' AND location ='$codes'" ;
      $result2 =mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;

      while ($i2 < $num2)
         {
         
         $qtys   = mysql_result($result2,$i2,"qty");
  
         $i2++;
 
      }
      $qty = $qty-$qtys;

      $query3= "UPDATE stockfile SET qty ='$qty' WHERE description ='$desc' AND location ='$codes'";
      $result3 =mysql_query($query3);

      $patient =$patients_name;
      $query4= "INSERT INTO st_trans VALUES('$codes','$desc','$patient','$qty_s','CASH RECEIPT','$date','ADMIN','$rate','$total','$ref_no')";
      $result4 =mysql_query($query4);
      //Now go and update the receipt file

      $i++;
 
   }


   //Update Balances if not paid in full
   //-----------------------------------
   $topay = $tot_amt - $paid;
   if ($tot_amt > $paid){
     $query3 = "select * FROM appointmentf WHERE adm_no ='$adm_no'" ;
     $result3 =mysql_query($query3) or die(mysql_error());
     $num3 =mysql_numrows($result3) or die(mysql_error());
     $i3=0;
     while ($i3 < $num3)
       {
       $balance   = mysql_result($result3,$i3,"balance");
  
       $acc_no    = mysql_result($result3,$i3,"pay_account");

       $db_account= mysql_result($result3,$i3,"pay_account");
  
       $i3++;
     }
     $balance = $balance+$topay;
     $query= "UPDATE appointmentf SET balance ='$balance' WHERE adm_no ='$adm_no'";
     $result =mysql_query($query);



     //End of balance now go and update the debtorsf file
     //--------------------------------------------------
     $found ='No';
     $db_balance =0;
     $query6 = "select * FROM debtorsfile" ;
     $result6 =mysql_query($query6) or die(mysql_error());
     $num6 =mysql_numrows($result6) or die(mysql_error());
     $i6=0;
     while ($i6 < $num6)
       {
       $accounts      = mysql_result($result6,$i6,"account_name");
  
       $db_balance    = mysql_result($result6,$i6,"os_balance");
  
       if ($accounts==$db_account){
          $db_balance = $db_balance+$topay;
          $found = 'Yes';
       }           
       $i6++;
     }
     $db_balance2 = $db_balance + $topay;
     if ($found=="Yes"){
        $query= "UPDATE debtorsfile SET os_balance ='$db_balance2' WHERE account_name ='$db_account'";
        $result =mysql_query($query);
     }else{
        $query= "INSERT INTO debtorsfile VALUES(' ','$patients_name','','','$db_balance2','')";
        $result =mysql_query($query);
     }


     //Now go and reduce the bill in htransf
     //--------------------------------------
     //--$balance = $balance+$topay;
     //--$query= "UPDATE client SET balance ='$balance' WHERE adm_no ='$adm_no'";
     //--$result =mysql_query($query);
     //End of balance now go and update the debtors transaction file
     //-------------------------------------------------------------
   }

     //Update Sales summary file with or without balance
     //-------------------------------------------------
     $query5= "INSERT INTO receiptf VALUES('$codes','CASH SALE','$patient','','CASH/CHQ RECEIPT','$date','ADMIN','$tot_amt','$paid','$ref_no','$topay')";
     $result5 =mysql_query($query5);

     $query= "UPDATE receiptf SET balance ='$topay' WHERE ref_no ='$ref_no'";
     $result =mysql_query($query);


     //--------------------------------------
     //$query5= "INSERT INTO htransf VALUES('$adm_no','$patients_name','$date','$ref_no','CASH/CHQ RECEIPT','RC 
     //','-$tot_amt','RC ','RC ','IP/OPD',' ','ADMIN','','$date','1','$db_account')";
     //$result5 =mysql_query($query5);

   //Print the receipt before deleting these stuff
   //---------------------------------------------
?>
   <script type='text/javascript'>
   function printpage()
  {
  window.print()
  }
  </script>

<?php







                                         








   
  
}





?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    



<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    



<!-- Le styles -->
    
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php






   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");

// Create connection
//$conn = new mysqli($host, $user, $pass, $database);
// Check connection
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

// sql to create table
$sql = "CREATE TABLE stock_issp (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
location VARCHAR(30) NOT NULL,
description VARCHAR(30) NOT NULL,
sell_price INT(11),
qty INT(11),
credit_rate INT(11),
gl_account INT(11),
date TIMESTAMP,
line_no INT(3)";

//if ($conn->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
//} else {
    //echo "Error creating table: " . $conn->error;
//}


if (isset($_GET['add_next'])){
   $query= "CREATE TEMPORARY TABLE stock_issp IF NOT EXISTS stock_issp (location varchar(100) NOT NULL,
   description varchar(100),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);

   $location     = "BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount"];
   $qty          = $_GET["no"];
   $total        = $_GET["result2"];
   $desc         = substr($description, -10);

   $myDate = date('y/m/d');
   //$myfile =gethostname();



   //get price for this item as you save it in temporary file
   $item_desc =" ";
   $query2 = "select * FROM stockfile WHERE substr(search_name, -10) ='$desc'";
   //location ='$location'" ;
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;

   while ($i2 < $num2)
      {
      $item_desc    = mysql_result($result2,$i2,"description");
      $item_price   = mysql_result($result2,$i2,"sell_price");
      //}
      $i2++;
   }

      
   $query= "INSERT INTO stock_issp VALUES('','$location','$item_desc','$item_price','$qty','$total','$total','$myDate','')";
   $result =mysql_query($query);


}





























?>







<script>
function myFunction() {
    var no = document.getElementById("no").value;
    var option = no.options[no.selectedIndex].text;
    var txt = document.getElementById("amount").value;


    txt2 = txt * option;
    document.getElementById("result2").value = txt2;
}
</script>

<body background="images/background.jpg">


<form action ="cash_issuetopatients.php" method ="GET">
<?php

//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   //echo"Put some details heare 4";
}










//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = date('y/m/d');
}














$company_identity = $_SESSION['company'];

$location = $_SESSION['company'];




$date = date('y-m-d');




 
echo"</table>";


?>



</form>



</body>
</html>




