<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>




<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/cashier.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];
$username = $_SESSION['username'];

?>



<?php
if (isset($_GET['accounts3'])){

   $_SESSION["rct_adm_no"] = $_GET['accounts3'];
   $_SESSION["invoice_no"] = $_GET['accounts4'];
   $_SESSION["date"] = $_GET['accounts'];
   $adm_no     = $_SESSION["rct_adm_no"];
   $invoice_no     = $_GET['accounts4'];
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



<?php
$company_identity = $_SESSION['company'];
$location1 = $_SESSION['company'];
$patient    = $_SESSION["rct_patient"];
$adm_no     = $_SESSION["rct_adm_no"];
$invoice_no = $_SESSION["invoice_no"];
//For save and print button the correct one
//-----------------------------------------
if (isset($_GET['save_cancel'])){
   $_SESSION['deleted'] ='Yes';
   echo"<body background='images/background.jpg'>";
   //Go and save first
   //-------------------
   $payee  =   $_GET['patient'];
   $pay_account = $_GET['patient'];
   //$doctor  =  $_GET['patient3'];
   $doctor  =  '';
   $invoice_no =$_GET['invoice_no']; 
   $patient   = $_GET['patient2'];
   $date      = $_GET['date'];
   $issue     = $_GET['issue'];
   //$issue     = '';
   //$patient    = $_SESSION["rct_patient"];
   $adm_no     = $_GET['adm_no'];
   $date           = $_GET['date'];
   //Now go and get name and file from the clients file
   $query7 = "select * FROM appointmentf where adm_no ='$adm_no'" ;
   $result7 =mysql_query($query7);
   $num7 =mysql_numrows($result7);
   $i7=0;
   $gotit ='No';
   while ($i7 < $num7)
     {
     $idno     = mysql_result($result7,$i7,"adm_no");  
     $pat_name   = mysql_result($result7,$i7,"name");   
     $pay_company= mysql_result($result7,$i7,"payer");   
     $pay_account= mysql_result($result7,$i7,"payer");   
     $ward_bed = $pat_name.'-'.$idno;
     $patient  = $pat_name;
     $idno    = $idno;
     $adm_no    = $idno;      
     $gotit ='Yes';
     $i7++;    
   }

   if ($gotit=='No'){
       $query7 = "select * FROM appointmentf" ;
       $result7 =mysql_query($query7);
       $num7 =mysql_numrows($result7);
       $i7=0;
       while ($i7 < $num7)
         {
         $idnos     = mysql_result($result7,$i7,"adm_no");  
         $pat_names   = mysql_result($result7,$i7,"name");   
         $heis = $pat_names.'-'.$idnos;
         if ($patient==$heis){
            $idno     = mysql_result($result7,$i7,"adm_no");  
            $pat_name   = mysql_result($result7,$i7,"name");   
            $pay_company= mysql_result($result7,$i7,"payer");   
            $pay_account= mysql_result($result7,$i7,"payer");   
            $adm_no     = mysql_result($result7,$i7,"adm_no");  
            $payee  =   mysql_result($result7,$i7,"name");   
            $pay_account = mysql_result($result7,$i7,"name");   
            $ward_bed = $pat_name.'-'.$idno;
            $patient  = $pat_name;
            $idno    = $idno;
            $adm_no    = $idno;      
         }
         $i7++;    
      }
   }


   if ($adm_no=='CASH'){
      $patient   = $_GET['patient2'];
   }
   //$pay_account = $_SESSION["pay_account"];
   //Get the receipt No.   
   //Nomber already issued
   //---------------------
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");  
     $i3++;
     }
     $ref_no2 = $ref_no +1;

   $query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
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
   while ($i < $num)
      {         
      $desc    = mysql_result($result,$i,"description");   
      $narration = mysql_result($result,$i,"line_no");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"gl_account");  
      $tot_amt = $tot_amt + $total;
      $desc =  $desc;
      //.' '.$narration

   $gledger ='DRUG SALES';
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

        $type ='DB';
        if ($issue=='Cash Receipts'){
           $gledger ='CASH COLLECTION A/C';
           $type ='RC';
        
        if ($total<>0){
        $query5= "INSERT INTO htransf 
         VALUES('','$adm_no','$patient','$date','$ref_no','$desc','$type','-$total','$g_id','$gledger',
'$type','','','$narration','$date','-$qty_s','$pay_account')";
         $result5 =mysql_query($query5);
        }
        }else{
        if ($total<>0){
        $query5= "INSERT INTO htransf 
         VALUES('','$adm_no','$patient','$date','$ref_no','$desc','$type','$total','$g_id','$gledger',
'$type','','','$narration','$date','$qty_s','$pay_account')";
         $result5 =mysql_query($query5);
        }

         //Now go and update invoice file
         //------------------------------
      }

      $ref_no = $invoice_no;
 $debt_control = 'Hospital Services';
     if ($issue <>'INVOICE'){
         //Now go and update the h_transf
         //------------------------------            

      $debt_control = 'CASH COLLECTION A/C';
          $query5= "INSERT INTO receiptf VALUES('$branch','$desc','$patient','','$patient','$date','$issue','$total','$total','$ref_no','$total','$adm_no')";
         $result5 =mysql_query($query5);

}
      $gledger_gl = 'STOCKS CONTROL';

      //Now go and pass a Debit entry in G/Ledger
      //-----------------------------------------   
      //$desc =$patient;
      $query8= "INSERT INTO gltransf VALUES(' 
      ','$date','$debt_control','$ref_no','DB','$desc','$total','ADMIN','CHIROMO')";
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
      $query8= "INSERT INTO gltransf VALUES(' ','$date','$gledger_gl','$ref_no','CR','$desc',
     '-$total','ADMIN','CHIROMO')";
      $result8 =mysql_query($query8);

      $query8 = "select * FROM glaccountsf WHERE account_name='$gledger_gl'" ;
      $result8 =mysql_query($query8) or die(mysql_error());
      $num8 =mysql_numrows($result8) or die(mysql_error());
      $i8=0;
      while ($i8 < $num8)
           {
           $balances = mysql_result($result8,$i8,"balance"); 
           $i8++;
           }
           $balance = $balances - $total;
           $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='$gledger_gl'";
           $result3 = mysql_query($query3);
      //}



      
      $i++;
   }
  //if ($issue=='INVOICE'){
//         $query4= "INSERT INTO hdnotef 
//VALUES('$adm_no','$patient','$date','$invoice_no','$date','$date','$tot_amt'//,'$tot_amt',
//'$pay_account','$branch','$doctor')";
  //    $result4 =mysql_query($query4);


    //     $query5= "INSERT INTO dtransf  VALUES('$pay_account','$date'//,'$patient','$invoice_no','$adm_no','TRF','$tot_amt','$tot_amt'//,'$doctor')";
         //$result5 =mysql_query($query5);       
   //}

        $query3  = "UPDATE appointmentf SET b_p ='$invoice_no' WHERE adm_no ='$adm_no'";
        $result3 = mysql_query($query3);


   //Print receipt first before deleting entries
   //--------------------

   //Dont remove coze another receipt could be required
   //--------------------------------------------------
if ($issue=='INVOICE'){
   $query3 = "DELETE FROM hdnotef2 WHERE invoice_no = '$invoice_no'";
   $result3 =mysql_query($query3) or die(mysql_error());

  $query3 = "DELETE FROM stock_issp WHERE description <>''";
   $result3 =mysql_query($query3) or die(mysql_error());

   $_SESSION["invoice_no"] = $invoice_no; 
   //require('reprints_invoice2.php');
   //die();
}
if ($issue<>'INVOICE'){


$fp = fopen("newfile.txt", "w") or die("Unable to open file!");

   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "select * FROM companyfile";
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
   {         
      $company     = mysql_result($result,$i,"company");  
      $address1    = mysql_result($result,$i,"address1");   
      $address2    = mysql_result($result,$i,"address2");   
      $address3    = mysql_result($result,$i,"address3");   
   }

  




   //--echo"<font size ='5'>";
   echo"<table width='400' border='0' cellspacing='0' cellpadding='0'>";      
   echo"<tr><td width ='400' align ='center'><h3>CASH SALE RECEIPT</h4></td><tr>";
   echo"<tr><td align ='center'><h2>$company</h2></td></tr>";
   echo"<tr><td align ='center'>$address1</td></tr>";
   echo"<tr><td align ='center'>$address2</td></tr>";
   echo"<tr><td align ='center'>$address3</td></tr>";
   echo"</table><br>";

   echo"<div><h4>SALES RECEIPT. SERVICE NO:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no</h4></div><br>";
 //---------Sawa up to this point------------------
   echo"<div>Payer :<img src='space.jpg' style='width:20px;height:2px;'></b>$patient<img src='space.jpg' style='width:20px;height:2px;'>Date:<img src='space.jpg' style='width:5px;height:2px;'>$date</b><br>";










 echo"-------------------------------------------------------------------------<b><br>";
   echo"Description <img src='space.jpg' style='width:100px;height:2px;'>";
   echo"Amount<img src='space.jpg' style='width:50px;height:2px;'>";
   echo"Qty<img src='space.jpg' style='width:30px;height:2px;'>";
   echo"Total<img src='space.jpg' style='width:10px;height:2px;'>";
   echo"</div>";
echo"-------------------------------------------------------------------------<br>";

$query = "select * FROM stock_issp WHERE description <>''" ;
//$query= "SELECT * FROM st_trans WHERE ref_no ='$ref_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<table bgcolor ='black' border ='0' width ='400'>";
//-------Sawa -------------
$SQL = "select * FROM stock_issp WHERE description <>''" ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {
         
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"description");   
      $code   = mysql_result($result,$i,"sell_price");   
      $update = mysql_result($result,$i,"date");  
      $contact = 'RC';
      $qty     = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"gl_account");



      $update2 = $code; 
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);

      echo"<tr bgcolor ='white'>";
      echo"<td width ='170' align ='left'>";      
      echo"$desc";
      echo"</td>";     
      echo"<td width ='50' align ='right'>$update2</td>";
      echo"<td width ='45' align ='right'>$qty</td>";
      echo"<td width ='45' align ='right'>$total</td>";
      echo"<td width ='10' align ='right'></td>";
      echo"</font>";
      echo"</tr>";   
      $i++;         
     }

      echo"</table>";
echo"-------------------------------------------------------------------------<br><br>";

 echo"</font>";


//Sawa----------


//Sawa----------

$topay = $paids-$tot;
echo"<table>";
echo"<tr><td width ='320' align ='right'><b>Total:</b></td><td width ='40'></td><td><b>$tot2</b></td></tr>";
echo"<tr><td width ='320' align ='right'><b>Amount Paid:</b></td><td width ='40'></td><td><b>$tot2</b></td></tr>";
//echo"<tr><td width ='320' align ='right'><b>Change:</b></td><td width ='40'></td><td><b>$topay</b></td></tr>";
echo "</table><br><br></b>";
//echo "For Wama Nursing Home<br>";
echo"<img src='images/image.bmp' style='width:380px;height:70px;'><br>";
//echo"Your health is our priority Psalms 107:20 We treat but God Heals.";
//style='width:300px;height:50px;'><br>";
echo"<br>You were served by:.$username<br>";
echo"Payment Mode:".$issue;
echo"<br>Date: ".date("d-m-y");
echo'<br><br>';
//echo"We wish you quick recovery";
//echo "<input type=\"button\" value=\"Print\" onclick=\"printpage()\" />";





   //Delete entries from temp file
   //-----------------------------
   $query3 = "DELETE FROM stock_issp WHERE description <>''";
   $result3 =mysql_query($query3) or die(mysql_error());

   $_SESSION['deleted'] ='Yes';

   $query3 = "DELETE FROM receiptf WHERE total = 0 ";
   $result3 =mysql_query($query3) or die(mysql_error());

   die();





















$txt  = $company."\n";
fwrite($fp, $txt);
$txt  = $address1."\n";
fwrite($fp, $txt);
$txt  = $address2."\n";
fwrite($fp, $txt);
$txt  = $address3."\n\n\n";
fwrite($fp, $txt);

$txt  = 'CASH RECEIPT NO:'.$ref_no."\n\n";
fwrite($fp, $txt);

//---------Sawa up to this point------------------
$txt ="Payer : ".$patient."                                            Date:".$date."\n";
fwrite($fp, $txt);

$txt ="---------------------------------------------------------------------------------------"."\n";
fwrite($fp, $txt);

$txt ="Description                                      Amount            Qty         Total  "."\n";
fwrite($fp, $txt);

$txt ="---------------------------------------------------------------------------------------"."\n";
fwrite($fp, $txt);


$query = "select * FROM stock_issp WHERE description <>''" ;
//$query= "SELECT * FROM st_trans WHERE ref_no ='$ref_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<table bgcolor ='black' border ='0' width ='100%'>";
//-------Sawa -------------
$SQL = "select * FROM stock_issp WHERE description <>''" ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"description");   
      $code   = mysql_result($result,$i,"sell_price");   
      $update = mysql_result($result,$i,"date");  
      $qty     = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"gl_account");

      $update2 = $code; 
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);
      $total3   = number_format($total);
   

//echo $descs;


//$str = "Hello World";
$str = str_pad($desc,50," ");



$txt = $str."".$update2."".$space."             ".$qty."           ".$total3."\n";
fwrite($fp, $txt);

      $i++;         
     }
$txt ="---------------------------------------------------------------------------------------"."\n";
fwrite($fp, $txt);

$str = "Total Amount:";
$str = str_pad($str,56," ");
$txt = $str."".$space."                        ".$tot2."\n";
fwrite($fp, $txt);



$txt  = "\n";
fwrite($fp, $txt);

$txt  = "You were served by: ".$username."\n\n";
fwrite($fp, $txt);

$txt  = "Developed and maintained by Paltech System Consultants: 0729446243 / 0710958791"."\n";
fwrite($fp, $txt);

echo fread($fp,filesize("newfile.txt"));
fclose($fp);





//Delete entries from temp file
//-----------------------------
$query3 = "DELETE FROM stock_issp WHERE qty > 0 and description <>''";
$result3 =mysql_query($query3) or die(mysql_error());


$query3 = "DELETE FROM receiptf WHERE total = 0 ";
$result3 =mysql_query($query3) or die(mysql_error());

echo"<div id='list'><p><iframe src='newfile.txt' width=800 height=600 frameborder=0 ></iframe></p></div>";

die();







}
//End of if not invoice


}









if (isset($_GET['accounts5'])){      
   $record =$_GET['accounts5'];
   $deleted ='Yes';
   $query3 = "DELETE FROM stock_issp WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());
//}else{
//   $deleted ='No';
}





?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    





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
$deleted ='Yes';
   $query= "CREATE TEMPORARY TABLE stock_issp IF NOT EXISTS stock_issp (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);
   //Initiolize the new entries
   //---------------------------
   $myDate = date('y/m/d');
   $location     = "BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];
   $narration    = $_GET["x_amount_three"];   

   //$count        = $num;
   //$desc         = substr($description, -10);
//echo 'Deleted'.$_SESSION['deleted'];

   //get price for this item as you save it in temporary file
   if ($_SESSION['deleted'] <>'Yes'){
   $query9= "INSERT INTO stock_issp  VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate','$narration')";
      $result9 =mysql_query($query9);
      $_SESSION['deleted'] ='No';
   }
   $myDate =date('y-m-d');
   $_SESSION['deleted'] ='No';

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
function showUser2(str) {
    if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
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
                document.getElementById("txtHint2").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getpat_name.php?q="+str,true);
        xmlhttp.send();
    }
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
        xmlhttp.open("GET","getpriceissp22.php?q="+str,true);
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







<form action ="issue_to_patients.php" method ="GET">
<?php

 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
 //Get the receipt No.



   //New changes
if (isset($_GET['accounts5'])){ 
   $record =$_GET['accounts5'];
   $deleted ='Yes';
   $query3 = "DELETE FROM stock_issp WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());
//}else{
//   $deleted ='No';
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









?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->


<p align ='right'><img src='chiromo-logo33.jpg' alt='statement' height='40' width='350'></p>
<!--img src='chiromo-logo2.jpg' alt='statement' height='50' width='400'-->

 <?php
//Displaying items to be adjusted
/////////////////////////////////
echo"<table bgcolor ='red' border = '0' border color = 'black' width ='100%'><th width ='400' align ='left'>Item Description</th><th width ='100' align ='left'>Narration</th><th width ='100'>Price</th><th width ='120'>Qty</th><th width ='120'>Total</th><th width ='100'>Action</th></th></table>";
 $myfile =gethostname();

//if ($deleted <>'Yes'){
//  //Delete all data from temp file
//  //------------------------------
//  $query3 = "DELETE FROM stock_issp WHERE description<>''";
//  $result3 =mysql_query($query3) or die(mysql_error());

//Go into htransf2 and get info kwanza
//------------------------------------
// $query7 = "select * FROM htransf2 where invoice_no = //'$invoice_no'" ;
// $result7 =mysql_query($query7) or die(mysql_error());
// $num7 =mysql_numrows($result7) or die(mysql_error());
// $i7=0;
// while ($i7 < $num7)
//    {
//    $my_desc   = mysql_result($result7,$i7,"service");   
//    $price     = mysql_result($result7,$i7,"amount");  
//    $line_no   = '';
//    //mysql_result($result7,$i7,"invoice_no");  
//    $date      = mysql_result($result7,$i7,"date");   
//     $query4= "INSERT INTO stock_issp 
//VALUES//
//('','$location','$my_desc','$price','1','$price','$price',
//'$date','$line_no')";
//      $result4 =mysql_query($query4);
//
//    $i7++;    
//   }
//}



 $query= "SELECT * FROM stock_issp" or die(mysql_error());
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
      $narration = mysql_result($result,$i,"line_no");
      $save ='Yes';
      $tot_amt = $tot_amt+$total;
      if ($desc > ' '){
         echo"<tr bgcolor ='white' border ='2' bordercolor='black'>";
         //echo"<td align ='left'></td>";
         echo"<td width ='400'><input type='text' id ='s_desc_three' size ='45' name='s_desc_three' value 
        ='$desc'></td><!--td width ='100'><input type='text' id ='x_amount_three' size ='15' name='x_amount_three' value 
        ='$narration'></td-->";
      }else{
         echo"<tr bgcolor ='white' border ='2' bordercolor='black'>";
         //echo"<td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td>";
         echo"<td width ='400' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)'>";
         $cdquery="SELECT name FROM revenuef WHERE name <>' ' order by name";
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
       // echo"<td><input type='text' id ='s_amount_three' name='s_amount_three' //size='10' value ='$price'></td>";
        //echo"<td><input type='text' id ='s_no_three' name='s_no_three' size//='10'
        //onchange='function33()'></td>";
        //echo"<td><input type='text' id ='s_result_three' name='s_result_three' //size='10'></td>";
    }
  

 
   
      $aa7=$row['description'];        
      $aa8=$row['id'];        
 if ($desc > ' '){
    echo"<td width ='100' align ='right'><a href='issue_to_patients.php?accounts5=$aa8'>Del<img src='ico/Info.ico' 
alt='Smiley face' height='12' width='12'></a></td>";
}else{
    echo"<td width ='100' align ='right'></td>";
}
//echo"<td width ='10' align ='right'></td>";

//        echo"<a href='issue_to_patients.php?accounts5=$aa8'>Del";


      




echo"</tr>";

      $i++;
  
       
}

echo"<img src='images/black.jpg' style='width:100%;height:1px;'><br>";   

      echo"</table>";
echo"<table><tr><div id='txtHint'><b>.</b></div></tr></table>";


      



echo"<img src='images/black.jpg' style='width:100%;height:1px;'><br>";
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
 $SQL = "select * FROM medicalfile" ;
 $hasil=mysql_query($SQL, $connect);
 $id = 0;
 $nRecord = 1;
 $No = $nRecord;
 $tot = 0;
 $save ='No';
 $tot_amt =0;
 while ($row=mysql_fetch_array($hasil)) 
      {               
      $today    = mysql_result($result,$i,"date");
      }

//--------------


$query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");  
     $i3++;
     }
     $ref_no2 = $ref_no +1;


echo"<table>";
//echo $pay_account;
$date =  date('y-m-d');
//$date = $_SESSION["date"];
$invoice_no = $ref_no2;

echo"<tr><td><b>Visit No:</b></td><td><input type='text' name='invoice_no' size ='20' value='$invoice_no'></td></tr>";
echo"<tr><td><b>Date</b></td><td><input type='text' name='date' size ='10' value='$date'></td></tr>";
//echo"<tr><td width='100' align='left'><b>Patient: </b></td><td>";
//echo"<select id='patient' name='patient'>";        
//$cdquery="SELECT name FROM appointmentf ORDER BY name ";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
//while ($cdrow=mysql_fetch_array($cdresult)) {
//  $cdTitle=$cdrow["name"];
//  echo "<option>$cdTitle</option>";            
//  }
// echo"</select>";

echo"</td><tr><td><b>Patient : </b></td><td>";
echo"<tr><td><b>Patient : </b></td><td>";
echo"<select id='patient2' name='patient2'";        
$cdquery="SELECT name,adm_no FROM appointmentf ORDER BY name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["name"].'-'.$cdrow["adm_no"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select>";
echo"</td></tr>";

echo"<tr><td><b>Patient : </b></td><td>";
echo"<input type='text' name='adm_no' size='20' onchange='showUser2(this.value)'>";

echo"<tr><td></td><td><div id='txtHint2'><b>.</b></div></td></tr>";


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
  echo"<option value='CHEQUES'>CHEQUES</option>";
  echo"<option value='EFT'>EFT</option>";
  echo"<option value='INVOICE'>INVOICE</option>";
echo"</select></td></tr>";

echo"<tr><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td>";

echo"<td align ='left'><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td></td>";

echo"</tr></table>";




?>

</form>





















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
     $ref_no   = mysql_result($result3,$i3,"next_ref");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
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
      $codes   = mysql_result($result,$i,"location");  
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
     $query5= "INSERT INTO receiptf VALUES('$codes','CASH SALE','$patient','','CASH/CHQ RECEIPT','$date','ADMIN','$tot_amt','$paid','$ref_no','$topay','')";
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





<!-- Le styles -->
    
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>

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
   $narration    = $_GET["x_amount_three"];
   
  echo $narration;

   $myDate = date('y/m/d');



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

$location ='1234';
   //$query= "INSERT INTO stock_issp VALUES('','$location','$item_desc'//,'$item_price','$qty','$total','$total','$myDate','$narration')";
   //$result =mysql_query($query);


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


<form action ="issue_to_patients.php" method ="GET">
<?php

 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 

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








      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->

<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Late',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>

