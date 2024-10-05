<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?><?php
$company = $_SESSION['company'];
$branch = $_SESSION['company'];
$username = $_SESSION['username'];

$location1 = $_SESSION['company'];
//For save and print button the correct one
//-----------------------------------------
if (isset($_GET['save_cancel'])){
   echo"<body background='images/background2.jpg'>";
   //Go and save first
   //-------------------
   $patient   = $_GET['patient2'];
   $payer     = $_GET['payer'];
   $date      = $_GET['date'];
   $pay_account = $_GET['pay_account'];
   $pay_company = $_GET['pay_account'];
   $issue     = '';
   $paid      = $_GET['paid'];
   $topay     = $_GET['topay'];
   $updated ='No';  
   //Now go and Check Bed Charge in Revenue file
   $query3 = "select * FROM revenuef WHERE name ='Consultation Fee'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $gledger ='Bed Income';
   $i3=0;
   while ($i3 < $num3)
     {
     $gledger     = mysql_result($result3,$i3,"gl_account");  
     $g_id        = mysql_result($result3,$i3,"client_id");  
     $i3++;
   }
   if ($payer==''){
      //!isset($_GET['payer'])){  
    
      //Now go and get name and file from the clients file
      $query7 = "select * FROM appointmentf" ;
      $result7 =mysql_query($query7) or die(mysql_error());
      $num7 =mysql_numrows($result7) or die(mysql_error());
      $i7=0;
      while ($i7 < $num7)
        {
        $idno     = mysql_result($result7,$i7,"id");  
        $pat_name   = mysql_result($result7,$i7,"name");   
        //$pay_company= mysql_result($result7,$i7,"payer");   
        $ward_bed = $pat_name.'-'.$idno;
        if ($ward_bed==$patient){
           $patient  = $pat_name;
           $idno    = $idno;
           //$pay_company= mysql_result($result7,$i7,"payer");   
           $adm_no    = $idno; 
           $patients_name=$pat_name;   
        }
        $i7++;    
      }
    }else{
        $patient  = $payer;
        $idno    = 0;
        $adm_no    = ' ';      
    }  


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
      //$codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"gl_account");  
      $tot_amt = $tot_amt + $total;

      //Reduce Qty in file if medication
      $query2 = "select * FROM stockfile WHERE description ='$desc' AND location ='$location1'" ;
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
      $qty = $qtys-$qty_s;
      $query3= "UPDATE stockfile SET qty ='$qty' WHERE description ='$desc' AND location ='$location1'";
      $result3 =mysql_query($query3);
 
      $query4= "INSERT INTO st_trans VALUES('$location1','$desc','$patient',
'-$qty_s','ISP','$date','ADMIN','$rate','$total','$ref_no','$adm_no')";
      $result4 =mysql_query($query4);
      //Go and update receiptf then gl files
      //------------------------------------
      if ($updated == 'Yes'){
         $query5= "INSERT INTO receiptf VALUES('$location1','$desc','$patient','0','CASH RECEIPT','$date','ADMIN','$total','$paid','$ref_no','-','$adm_no')";
         $result5 =mysql_query($query5);
      }else{
         $query5= "INSERT INTO receiptf VALUES('$location1','$desc','$patient','0','CASH RECEIPT','$date','ADMIN','$total','$paid','$ref_no','$topay',
'$adm_no')";
         $result5 =mysql_query($query5);
      }
      if($paid>0){
         $debit_account  ='CASH COLLECTION A/C';
      }else{
         $debit_account  ='ACCOUNTS RECEIVABLES';
      }
      $updated ='Yes';
 
      //Now go and update gledger Debit
      //-------------------------------
      $query5= "INSERT INTO gltransf VALUES('0','$date','$debit_account','$ref_no','RC','$desc','$total','admin','$location1')";
      $result5 =mysql_query($query5);
      //Now go and update gledger Credit
      //--------------------------------
      $query5= "INSERT INTO gltransf VALUES('0','$date','$gledger','$ref_no','RC','$desc','-$total','admin','$location1')";
      $result5 =mysql_query($query5);

      //Now go and update the h_transf
      //------------------------------
      $query6= "INSERT INTO htransf VALUES('$adm_no','$patient','$date','$ref_no','$desc','CSH','$total','$g_id','$gledger','DB',
'-','ADMIN','-','$date','$qty_s','$pay_company')";
      $result6 =mysql_query($query6);

      $i++;
   }

      //Go and post balance to debtors file
      //----------------------------------
      $desc =$adm_no.' '.$patient;
      $balance= $tot_amt - $paid;

         if ($pay_company==''){
            $pay_company = $pay_account;
         }
         $query9= "INSERT INTO hdnotef  VALUES('$adm_no','$patient','$date','$ref_no','$date','$date','$tot_amt','$balance','$pay_company','$branch','$username')";
         $result9 =mysql_query($query9);

      if ($balance > 0){
         //$pay_account = $patient;
         $query4= "INSERT INTO dtransf  VALUES('$pay_company','$date','$patient','$ref_no','$adm_no','TRF','$tot_amt','$balance','ADMIN')";
         $result4 =mysql_query($query4);
         $add_it = 'Yes';
         $query2 = "select * FROM debtorsfile" ;
         $result2 =mysql_query($query2) or die(mysql_error());
         $id = 0;
         $nRecord = 1;
         $No = $nRecord;
         $num2 =mysql_numrows($result2) or die(mysql_error());
         $i2 =0;
         while ($i2 < $num2)
            {
            $account_name = mysql_result($result2,$i2,"account_name");           
            if ($account_name== $pay_account){
               $qtys   = mysql_result($result2,$i2,"os_balance");  
               $add_it ='No';
            }
            $i2++;
         }

         if ($add_it=='No'){
            $balance = $qtys+$balance;
            $query3  = "UPDATE debtorsfile SET os_balance ='$balance' WHERE account_name ='$pay_account'";
            $result3 = mysql_query($query3);         
         }else{
            $query3= "INSERT INTO debtorsfile VALUES('','$patient','','','$balance','','$adm_no'";
            $result3 = mysql_query($query3);         
         }
         
      }
      if ($paid >0){
      $query6= "INSERT INTO htransf VALUES('$adm_no','$patient','$date','$ref_no','Sales Receipt','RC','-$paid','$g_id','$gledger','RC',
'-','ADMIN','-','$date','-','$pay_company')";
      $result6 =mysql_query($query6);
      }
      


    //Create patient in clients file
    $query7 = "select * FROM clients" ;
    $result7 =mysql_query($query7) or die(mysql_error());
    $num7 =mysql_numrows($result7) or die(mysql_error());
    $i7=0;
    $exist ='No';
    while ($i7 < $num7)
        {
        $id       = mysql_result($result7,$i7,"adm_no");  
        if ($id==$adm_no){
           $exist ='Yes';
        }
        $i7++;    
      }
      if ($exist=='No'){
         $query6= "INSERT INTO clients VALUES('','$adm_no','$patient','','$pay_company','','','','','','','','','','','','','','')";
      }else{         
        $query6= "UPDATE clients SET pay_account ='$pay_company' WHERE adm_no ='$adm_no'";
      }
      $result6 =mysql_query($query6);
   //Post Debit first
   //----------------
   $db_balance = 0;
   $query3 = "select * FROM glaccountsf WHERE account_name ='$debit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;

   while ($i3 < $num3)
     {
     $db_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

   $db_balance = $db_balance +$tot_amt;

   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);


   //Post credit
   //-----------
   $query3 = "select * FROM glaccountsf WHERE account_name ='$gledger'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $credit_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

   $credit_balance = $credit_balance -$tot_amt;
   $query2  ="UPDATE glaccountsf SET balance ='$credit_balance' WHERE account_name ='$gledger'";
   $result2 =mysql_query($query2);
   //End of saving in gledger
   //-----------------------

   //Print receipt first before deleting entries
   //--------------------
 
   $patients_name =$patient;
   $paid   = $tot_amt;

   
   $query= "SELECT * FROM companyfile WHERE company_identity ='$branch'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "select * FROM companyfile WHERE company_identity ='$branch'";
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
   echo"<table width='800' style='border: 0; text-align:left; background-color: transparent'>";      
   //*echo"<tr><td width ='800' align ='center'><h3>CASH SALE RECEIPT</h4></td><tr>";
   //echo"<tr><td align ='center'><h2>$company</h2></td></tr>";
   //echo"<tr><td align ='center'>$address1</td></tr>";
   //echo"<tr><td align ='center'>$address2</td></tr>";
   //echo"<tr><td align ='center'>$address3</td></tr>";
   echo"</table><br><br>";
   if ($tot_amt=$balance){
   echo"<div><h3>PATIENT INVOICE<img src='space.jpg' style='width:20px;height:2px;'>"; 
   //$ref_no</h4>
   }else{
   echo"<div><h3>CASH RECEIPT<img src='space.jpg' style='width:20px;height:2px;'>";
   //$ref_no
   }
   echo"</h3></div><br>";
   //---------Sawa up to this point------------------
   echo"<div>No__:<img src='space.jpg' style='width:20px;height:2px;'>$ref_no<br>";
   echo"<div>Date:<img src='space.jpg' style='width:20px;height:2px;'>$date<br>";

   echo"<div>Payer:<img src='space.jpg' style='width:20px;height:2px;'></b>$patients_name<img 
   src='space.jpg' style='width:20px;height:2px;'><br>";
   //Date:<img src='space.jpg' style='width:5px;height:2px;'>$date</b><br>";

   echo"-----------------------------------------------------------------------------------------------------------------------------------<b><br>";
   echo"Description of services<img src='space.jpg' style='width:300px;height:2px;'>";
   echo"Days<img src='space.jpg' style='width:50px;height:2px;'>";
   echo"Qty<img src='space.jpg' style='width:70px;height:2px;'>";
   echo"Total <img src='space.jpg' style='width:1px;height:2px;'>";
   echo"</div>";
   echo"-----------------------------------------------------------------------------------------------------------------------------------</b>";
$query= "SELECT * FROM st_trans WHERE ref_no ='$ref_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<table  style='border: 0; text-align:left; background-color: transparent'>";
//-------Sawa -------------
$SQL = "select * FROM st_trans WHERE ref_no ='$ref_no' " ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {
         
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"trans_desc");   
      $code   = mysql_result($result,$i,"price");   
      $update = mysql_result($result,$i,"date");  
      $contact = mysql_result($result,$i,"type");
      $qty     = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"total");

      $update2 = $code; 
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);

      echo"<tr >";
      echo"<td width ='450' align ='left'>";      
      echo"$desc";
      echo"</td>";     
      echo"<td width ='50' align ='right'>$update2</td>";
      echo"<td width ='50' align ='right'>$qty</td>";
      echo"<td width ='150' align ='right'>$total</td>";
      //echo"<td width ='50' align ='right'></a></td>";
      echo"</font>";
      echo"</tr>";   
      $i++;         
     }

      echo"</table>";
   echo"-----------------------------------------------------------------------------------------------------------------------------------";
 echo"</font>";
if ($tot=$topay){
   $paid=0;
}

$paid  =number_format($paid);
$topay =number_format($topay);

//echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
echo"<table  style='border: 0; text-align:left; background-color: transparent'>";
echo"<tr><td width ='630' align ='right'><b>Total:</b></td><td width ='45'></td><td align ='right'><b>$tot2</b></td></tr>";
echo"<tr><td width ='630' align ='right'><b>Amount Paid:</b></td><td width ='45'></td><td align ='right'><b>$paid</b></td></tr>";
echo"<tr><td width ='630' align ='right'><b>Balance to Pay:</b></td><td width ='45'></td><td align ='right'><b>$topay</b></td></tr>";
echo "</table><br><br></b>";






















   //Delete entries from temp file
   //-----------------------------
   $query3 = "DELETE FROM stock_issp WHERE description >''";
   $result3 =mysql_query($query3) or die(mysql_error());
   die();
}
//}
//here








if (isset($_GET['accounts5'])){      
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM stock_issp WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());



}





?>


<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    



<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    



<!-- Le styles -->
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    
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

//if ($conn->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
//} else {
    //echo "Error creating table: " . $conn->error;
//}


if (isset($_GET['add_next'])){
//if (isset($_GET['accounts6'])){ 
   //$count = $_GET['accounts3']; 

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
   $location     = $branch;
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];

   //get price for this item as you save it in temporary file
      

   $query9= "INSERT INTO stock_issp  VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate','$narration')" or die(mysql_error());
   $result9 =mysql_query($query9);

   $myDate =date('y-m-d');
}






if (isset($_GET['refresh'])){
   $date = date('y/m/d');
   //echo"Put some details heare 7";

}

if (isset($_GET['delete'])){
   $date = date('y/m/d');
   //End of printing receipt
   //-----------------------
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");

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
function showpaid() {
    var total = document.getElementById('total').value;   
    //alert(total); 
    var paid = document.getElementById('paid').value;
    //alert(paid); 
    //var option = no.options[no.selectedIndex].text;

    topay = total - paid;
    document.getElementById("topay").value = topay;
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
        xmlhttp.open("GET","getpriceissp.php?q="+str,true);
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












<body>
<!-- background="images/background.jpg"-->


<div class="w3-container w3-teal">
  <h2>Cash Register | <font color ='red'>HMIS</font></h2>
</div>
<!--img src="img_car.jpg" alt="Car" style="width:100%"-->
<div class="w3-container">




<form action ="issuetopatients2.php" method ="GET">
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
if (isset($_GET['add_next8'])){
   $date = date('y/m/d');

 

  // echo"Put some details heare 11";


}














$company_identity = $_SESSION['company'];



 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


















$date = date('y-m-d');











// Accounts6 Not applicabel for now
//echo"</td><td width ='100'><input type='text' id ='amounts' name='amounts' size='10' value ='$price'></td><td width='120'>";
//----------------------------------------------
//echo"</td>";
//echo"<td width='50' align='right'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td>";



?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->


<!--p align ='right'><img src='chiromo-logo2.jpg' alt='statement' height='50' width='150'></p-->

 <?php
//Displaying items to be adjusted
/////////////////////////////////
echo"<table bgcolor ='red' border = '0' border color = 'black' width ='100%'><th width ='400' align ='left'>Item Description</th><th width ='100'>Price</th><th width ='120'>Qty</th><th width ='120'>Total</th><th width ='100'>Action</th></th></table>";


 //$myfile =gethostname();


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
      $narration  = mysql_result($result,$i,"line_no");

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
         $cdquery="SELECT search_name FROM stockfile WHERE location ='$company_identity' order by description";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM stockfile";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["search_name"];     
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
        ='$price' readonly></td>";
        echo"<td><input type='text' id ='s_no_three' name='s_no_three' size='10' value ='$qty' readonly></td>";
        echo"<td><input type='text' id ='s_result_three' name='s_result_three' size='10' value 
        ='$total' readonly></td>";
    }else{
        //echo"<td><input type='text' id ='s_amount_three' name='s_amount_three' size='10' value 
        //='$price'></td>";
        //echo"<td><input type='text' id ='s_no_three' name='s_no_three' size='10' 
        //onchange='function33()'></td>";
        //echo"<td><input type='text' id ='s_result_three' name='s_result_three' size='10'></td>";
    }
  

 
   
      $aa7=$row['description'];        
      $aa8=$row['id'];        
if ($aa8 >'1'){
echo"<td width ='100' align ='right'><a href='issuetopatients2.php?accounts5=$aa8'>Del<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td>";
}

      




echo"</tr>";

      $i++;
  
       
}

echo"<img src='ico/black.jpg' style='width:950px;height:1px;'><br>";   

      echo"</table>";
echo"<table><tr><div id='txtHint'><b>Medical info will be listed here...</b></div></tr></table>";


      



echo"<img src='ico/black.jpg' style='width:950px;height:1px;'><br>";
echo"<font size ='20'><table><tr><td width ='325'></td><td width ='100'></td><td></td><td width ='100' align ='right'></td><td width ='100'><b>Total:</b></td><td align ='right'><b><input type='text' name='total' id ='total' size ='10' value='$tot_amt' readonly></b></td><td width ='100' align ='right'></td></tr>";

echo"<tr><td width ='325'></td><td width ='100'></td><td></td><td width ='100' align ='right'></td><td width ='100'><b>Paid:</b></td><td align ='right'><b><input type='text' name='paid' id ='paid' size ='10' onchange='showpaid()'></b></td><td width ='100' align ='right'></td></tr>";

echo"<tr><td width ='325'></td><td width ='100'></td><td></td><td width ='100' align ='right'></td><td width ='100'><b>Balance:</b></td><td align ='right'><b><input type='text' name='topay' id='topay' size ='10' value='0'></b></td><td width ='100' align ='right'></td></tr></table></font>";

   
      //echo"</form'>";

      //To show totals here


      echo"</table>";


$date =date("y-m-d");



echo"<table>";
echo"<tr><td><b>Date</b></td><td><input type='text' name='date' size ='10' value='$date'></td></tr>";
//echo"<tr><td width='100' align='left'><b>From Store </b></td><td>";
//echo"<select id='patient' name='patient'>";        
//$cdquery="SELECT description FROM st_locationfile ORDER BY description ";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
//while ($cdrow=mysql_fetch_array($cdresult)) {
//  $cdTitle=$cdrow["description"];
//  echo "<option>$cdTitle</option>";            
//  }
// echo"</select>";
//echo"</td><tr><td><b>Patient : </b></td><td>";


echo"<tr><td><b>Patient : </b></td><td>";
echo"<select id='patient2' name='patient2'";        
$cdquery="SELECT name,id FROM appointmentf ORDER BY name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["name"].'-'.$cdrow["id"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select>";
echo"</td></tr>";
//echo"<tr><td>Transaction Type</td><td>";
//echo"<select id ='issue' name ='issue'>";
//  echo"<option value='Medication'>Medication</option>";
//  echo"<option value='Prescription'>Prescription</option>";
//echo"</select></td></tr>";
echo"<tr><td><b>Payer</b></td><td><input type='text' name='payer' size ='40' ></td></tr>";

echo"<tr><td><b>Pay A/c : </b></td><td>";
echo"<select id='pay_account' name='pay_account'";        
$cdquery="SELECT account_name FROM debtorsfile where client_id<>'' ORDER BY account_name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["account_name"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select>";
echo"</td></tr>";


echo"<tr><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td>";

echo"<td align ='left'><input type='submit' name='delete'  class='button' value='Cancel Transaction'></td></td>";

echo"</tr></table>";

?>
<p align ='right'><img src='chiromo-logo2.jpg' alt='statement' height='50' width='150'></p>

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

   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");




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
      $query4= "INSERT INTO st_trans VALUES('$codes','$desc','$patient','$qty_s','CASH RECEIPT','$date','ADMIN','$rate','$total','$ref_no','')";
      $result4 =mysql_query($query4);
      //Now go and update the receipt file

      $i++;
 
   }


   //Update Balances if not paid in full
   //-----------------------------------
   //$topay = $tot_amt - $paid;
   if ($tot_amt > $paid){
     $query3 = "select * FROM clients WHERE adm_no ='$adm_no'" ;
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
     $query= "UPDATE clients SET balance ='$balance' WHERE adm_no ='$adm_no'";
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
     $query5= "INSERT INTO receiptf VALUES('$codes','CASH SALE','$patient','-','CASH RECEIPT','$date','ADMIN','$tot_amt','$paid','$ref_no','$topay')";
     $result5 =mysql_query($query5);

     $query= "UPDATE receiptf SET balance ='$topay' WHERE ref_no ='$ref_no'";
     $result =mysql_query($query);


     //--------------------------------------
     $query5= "INSERT INTO htransf VALUES('$adm_no','$patients_name','$date','$ref_no','CASH/CHQ RECEIPT','RC 
','-$tot_amt','RC ','RC ','IP/OPD',' ','ADMIN','','$date','1','$db_account')";
     $result5 =mysql_query($query5);

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


if (isset($_GET['add_next6'])){
   $query= "CREATE TEMPORARY TABLE stock_issp IF NOT EXISTS stock_issp (location varchar(100) NOT NULL,
   description varchar(100),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);

   $location     = $branch;
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

   $query3 = "DELETE FROM stock_issp WHERE description >'' and qty =0 ";
   $result3 =mysql_query($query3) or die(mysql_error());

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

<body>
<!-- background="images/background.jpg"-->


<form action ="issuetopatients2.php" method ="GET">
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
if (isset($_GET['add_next7'])){
   $date = date('y/m/d');
}

$company_identity =$_SESSION['company'];
$location = $_SESSION['company'];
$date = date('y-m-d');
echo"</table>";
?>

</form>
</body>
</html>




