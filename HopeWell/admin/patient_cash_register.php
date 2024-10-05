<?php
session_start();
$_SESSION['adm_no'] = $_GET['accounts3'];
$adm_no = $_SESSION['adm_no'];
require('open_database.php');
$location = $_SESSION['company'];

//For save and print button
//------------------__-----
if (isset($_GET['save_cancel'])){
  
   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $patients_name =$_GET['patients_name'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['paid'];
   $payer  =$_GET['db_accounts'];

   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");

   $db_accounts  = $payer;
   $db_accounts2 = $payer;
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





   $query = "select * FROM sales" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;
   $tot_amt =0;

   while ($i < $num)
      {         
      $codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"gl_account");  
      $tot_amt = $tot_amt + $total;
      $desc    = trim($desc);
      $desc    = substr($desc, -10);

      //Add Qty in file
      $query2 = "select * FROM stockfile WHERE location ='$codes'" ;
      //search_name ='$desc' AND 
      $result2 =mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;
      while ($i2 < $num2)
         {
         $item_desc    = mysql_result($result2,$i2,"search_name");    
         $item_desc    = trim($item_desc);
         $item_desc    = substr($item_desc, -10);
         if ($item_desc==$desc){
            $qtys         = mysql_result($result2,$i2,"qty");
            $desc         = mysql_result($result2,$i2,"description");   
         }
         $i2++;
 
      }
      $qty2 = $qtys-$qty;


      $query3= "UPDATE stockfile SET qty ='$qty2' WHERE search_name ='$desc' AND location ='$codes'";
      $result3 =mysql_query($query3);

      $patient =$patients_name;
      $query4= "INSERT INTO st_trans VALUES('$codes','$desc','$patient','$qty_s','CASH RECEIPT','$date','ADMIN','$rate','$total','$ref_no','$adm_no')";
      $result4 =mysql_query($query4);
      //Now go and update the receipt file

      $i++;
 
   }

   //Update Balances if not paid in full
   //-----------------------------------
   $topay = $tot_amt - $paid;
   //if ($tot_amt > $paid){
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
     $balance2 = $balance+$topay;
     $query= "UPDATE clients SET balance ='$balance2' WHERE adm_no ='$adm_no'";
     $result =mysql_query($query);



     //End of balance now go and update the debtorsf file
     //--------------------------------------------------
     //$accno = $db_account;
     if ($db_accounts=='' AND $topay > 0 ){ 
        $db_accounts  =  $patients_name;
        $bal_account  =  $adm_no;
     }


     //Now go and reduce the bill in htransf
     //--------------------------------------
     //--$balance = $balance+$topay;
     //--$query= "UPDATE client SET balance ='$balance' WHERE adm_no ='$adm_no'";
     //--$result =mysql_query($query);
     //End of balance now go and update the debtors transaction file
     //-------------------------------------------------------------

   //}

     //Update Sales summary file with or without balance
     //-------------------------------------------------
     $query5= "INSERT INTO receiptf VALUES('$codes','CASH SALE','$patient','$qty_s','CASH 
     RECEIPT','$date','ADMIN','$tot_amt','$paid','$ref_no','$topay','$adm_no')";
     $result5 =mysql_query($query5);

     $query= "UPDATE receiptf SET balance ='$topay' WHERE ref_no ='$ref_no'";
     $result =mysql_query($query);


     //--------------------------------------
     $query5= "INSERT INTO htransf VALUES('$adm_no','$patients_name','$date','$ref_no','CASH/CHQ RECEIPT','RC 
     ','-$tot_amt','RC ','RC ','IP/OPD',' ','ADMIN','','$date','1','$db_accounts')";
     $result5 =mysql_query($query5);
     //If balance is not Zero, pass entry in dtransf
     //---------------------------------------------

        if ($db_accounts2==''){
           $bal_account = $adm_no;
        }else{
           $query3 = "select * FROM debtorsfile WHERE account_name ='$db_accounts'" ;
           $result3 =mysql_query($query3) or die(mysql_error());
           $num3 =mysql_numrows($result3) or die(mysql_error());
           $i3=0;
           while ($i3 < $num3)
             {
             $balance     = mysql_result($result3,$i3,"os_balance");  
             $bal_account = mysql_result($result3,$i3,"accno");  
             $i3++;
           }
        }

     if ($topay > 0){
        $query5= "INSERT INTO dtransf VALUES('$bal_account','$date','$patients_name','$ref_no','$adm_no','TRF 
        ','$tot_amt','$topay',' ')";
        $result5 =mysql_query($query5);
     }

     if ($topay < 0){
        $query5= "INSERT INTO dtransf VALUES('$bal_account','$date','$patients_name','$ref_no','$adm_no','RC 
        ','$topay','$topay',' ')";
        $result5 =mysql_query($query5);
     }

   //Print the receipt before deleting these stuff
   //---------------------------------------------
?>
   <script type='text/javascript'>
   function printpage()
  {
  window.print()
  }
  </script>

<script type='text/javascript'>
   function bills()
  {
  window.open('http://www.usedcarin...nadminlogin.php' 'FinanceAdminReportsLogin', 'width=545,height=326,resizable=yes,scrollbars=yes,status=yes');
  }
  </script>
 
 
<?php
   //No branch yet ----- $branch     = $_SESSION['branch']; 
 
   $date=$_GET['date'];
   $patients_name =$_GET['patients_name'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['paid'];
   $date    = $_GET["date"];

   //Print Receit
   //$user = "hmisglobal";   
   //$pass = "jamboafrica";   
   //$database ="hmisglob_griddemo";   
   //$host = "localhost";   
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
   //mysql_select_db($database) or die ("Unable to select the database");

   
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
   echo"<div>Payer :<img src='space.jpg' style='width:20px;height:2px;'></b>$patients_name<img src='space.jpg' style='width:20px;height:2px;'>Date:<img src='space.jpg' style='width:5px;height:2px;'>$date</b><br>";
   //echo"<hr>";
  //echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
echo"------------------------------------------------------------------------<b><br>";
   echo"Description <img src='space.jpg' style='width:100px;height:2px;'>";
   echo"Amount<img src='space.jpg' style='width:45px;height:2px;'>";
   echo"Qty<img src='space.jpg' style='width:30px;height:2px;'>";
   echo"Total<img src='space.jpg' style='width:10px;height:2px;'>";
   echo"</div>";
  //echo"<img src='ico/black.jpg' style='width:400px;height:1px;'></b><br>";
echo"------------------------------------------------------------------------<br>";


$query= "SELECT * FROM st_trans WHERE ref_no ='$ref_no'" or die(mysql_error());
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;


echo"<table bgcolor ='white' border ='0' width ='400'>";
//-------Sawa -------------
$SQL = "select * FROM st_trans WHERE ref_no ='$ref_no' " ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {
         
      //$codes   = mysql_result($result,$i,"acc_no");
  
      $desc    = mysql_result($result,$i,"description");
   
      $rate    = mysql_result($result,$i,"trans_desc");
   
      $code   = mysql_result($result,$i,"price");
   
      $update = mysql_result($result,$i,"date");
  
      $contact = mysql_result($result,$i,"type");
      $qty     = mysql_result($result,$i,"qty");
      $total   = mysql_result($result,$i,"total");

      $update2 = $code; 
      //-$update;
      $tot = $tot +$total;
      $code   = number_format($code);
      $update2 = number_format($update2);
      $tot2 = number_format($tot);

      echo"<tr bgcolor ='white'>";
      echo"<td width ='170' align ='left'>";      
      echo"$desc";
      echo"</td>";     
      echo"<td width ='50' align ='right'>$update2</td>";
      echo"<td width ='50' align ='right'>$qty</td>";
      echo"<td width ='50' align ='right'>$total</td>";
      //echo"<td width ='50' align ='right'></a></td>";
      echo"</font>";
      echo"</tr>";   
      $i++;         
     }

      echo"</table>";
echo"------------------------------------------------------------------------";
 echo"</font>";


//Sawa----------


//echo"<img src='ico/black.jpg' style='width:400px;height:1px;'><br>";
echo"<table>";
echo"<tr><td width ='320' align ='right'><b>Total:</b></td><td width ='45'></td><td><b>$tot2</b></td></tr>";
echo"<tr><td width ='320' align ='right'><b>Amount Paid:</b></td><td width ='45'></td><td><b>$paid</b></td></tr>";
echo"<tr><td width ='320' align ='right'><b>Balance to Pay:</b></td><td width ='45'></td><td><b>$topay</b></td></tr>";
echo "</table><br><br></b>";
echo "For Wama Nursing Home<br>";
echo"<img src='images/image.bmp' style='width:370px;height:70px;'><br>";
echo"Your health is our priority Psalms 107:20 We treat but God Heals.";
//style='width:300px;height:50px;'><br>";
echo"<br>You were served by: ADMIN<br>";
echo"We wish you quick recovery";
echo "<input type=\"button\" value=\"Print\" onclick=\"printpage()\" />";
                                                         










   //End of printing receipt
   //-----------------------
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $query3 = "DELETE FROM sales WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    $query= "DROP TABLE IF EXISTS hmisglob_griddemo.sales";
    $result =mysql_query($query);
    die();

   //End of saving
   //-------------
   $date = date('y/m/d');
   $client_no=' ';
   $patients_name=' ';
   $gender=' ';
   $age=' ';

   $history ="No medical history for the specified date";


   echo"<table><tr><td width ='50'>File:</td><td width ='30'>";
   echo"<input type='text' name='adm_no' size='10' value ='$client_no'></td>";
   
   echo"<td width ='20'>Name: </td><td width ='30'><input type='text' name='patients_name' size='30' value ='$patients_name'></td>";

   echo"<td width ='10'>Age: </td><td width ='10'><input type='text' name='age' size='10' value ='$age'></td>";
   echo"<td width ='10'>Sex: </td><td width ='10'><input type='text' name='age' size='10' value ='$gender'></td><td width ='10'>Visit Date: </td><td width ='10'><input type='text' name='date' size='10' value ='$date'></td><input type='text' name='balance' size='10' value ='$balance_db'></td></td></tr></table>";
   echo"<hr>";
   echo"<table><td align ='center'><h1>Medical<br>Notes</h1></td><td>";
   echo"<textarea name='history' rows='8' cols ='70'>";
   echo"$history";
   echo"</textarea></td><td width ='20'></td><td><img src='images/wama.jpg' alt='statement' height='150' width='180'></td><td><input type='submit' name='save_cancel'  class='button' value='Bills' onclick='bills()'></td></table>";

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
$sql = "CREATE TABLE sales (
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
   $query= "CREATE TEMPORARY TABLE sales IF NOT EXISTS sales (location varchar(100) NOT NULL,
   description varchar(200),
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


   $myDate = date('y/m/d');
   //$myfile =gethostname();
      
   $query= "INSERT INTO sales VALUES('','$location','$description','$amount','$qty','$total','$total','$myDate')";
   $result =mysql_query($query);


}








//here
if (isset($_GET['accounts8'])){
   $todelete =$_GET['accounts8'];
   $todelete = $_SESSION['adm_no'];
echo"$todelete";
   $adm_no = $_GET['accounts8'];
   $client_no=$_GET['accounts8'];

   $date = date('y/m/d');
   //$client_no=$_GET['adm_no'];

   //$query3 = "DELETE FROM sales WHERE id ='$todelete'";
   //$result3 =mysql_query($query3) or die(mysql_error());

   $query3="SELECT * FROM clients WHERE adm_no ='$client_no'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     $gender       = mysql_result($result3,$i3,"gender");  
     $client_no    = mysql_result($result3,$i3,"adm_no");  
     $adm_no       = mysql_result($result3,$i3,"adm_no");  
     $balance_db   = mysql_result($result3,$i3,"balance");  
     $i3++;
   }

            
  
   $query3="SELECT * FROM medicalfile WHERE adm_no ='$adm_no' AND date = '$date'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $history      = mysql_result($result3,$i3,"history");  
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     if ($history==''){
        $history ="No medical history for the specified date";
     }
     $i3++;
   }


   echo"<table><tr><td width ='50'>File:</td><td width ='30'>";
   echo"<input type='text' name='adm_no' size='10' value ='$client_no'></td>";
   
   echo"<td width ='20'>Name: </td><td width ='30'><input type='text' name='patients_name' size='30' value ='$patients_name'></td>";

   echo"<td width ='10'>Age: </td><td width ='10'><input type='text' name='age' size='10' value ='$age'></td>";
   echo"<td width ='10'>Sex: </td><td width ='10'><input type='text' name='age' size='10' value ='$gender'></td><td width ='10'>Visit Date: </td><td width ='10'><input type='text' name='date' size='10' value ='$date'></td><td><input type='text' name='balance' size='10' value ='$balance_db'></td></tr></table>";
   echo"<hr>";
   echo"<table><td align ='center'><h1>Medical<br>Notes</h1></td><td>";
   echo"<textarea name='history' rows='8' cols ='70'>";
   echo"$history";
   echo"</textarea></td><td width ='20'></td><td><img src='images/wama.jpg' alt='statement' height='150' width='180'></td><td><a href=javascript:popupbills('view_bill.php')><strong><img src='images/bills.jpg' alt='statement' height='20' width='100'></a></td></table>";

}






//if (isset($_GET['add_next2']))
if (isset($_GET['save_cancel3']))
   {
   $date=$_GET['date'];
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,"")or die ("Unable to connect");
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





   $query = "select * FROM sales" ;
   $result =mysql_query($query) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num =mysql_numrows($result) or die(mysql_error());
   $i =0;

   while ($i < $num)
      {         
      $codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"gl_account");
      $item_desc = mysql_result($result,$i,"description");
  
      //Add Qty in file
      $query2 = "select * FROM stockfile WHERE search_name ='$desc' AND location ='$codes'" ;
      $result2 =mysql_query($query2) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num2 =mysql_numrows($result2) or die(mysql_error());
      $i2 =0;

      while ($i2 < $num2)
         {
         
         $qtys   = mysql_result($result2,$i2,"qty");
         $item_desc = mysql_result($result2,$i2,"description");
  
         $i2++;
 
      }
      $upd_qty = $qtys - $qty;

      $query3= "UPDATE stockfile SET qty ='$upd_qty' WHERE search_name ='$desc' AND location ='$codes'";
      $result3 =mysql_query($query3);


      $query4= "INSERT INTO st_trans VALUES('$codes','$item_desc','Sales','-$qty_s','Stock Sales','$date','ADMIN','$rate','$total','$ref_no','$adm_no')";
      $result4 =mysql_query($query4);
      $i++;
 
   }




   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");


   $query3 = "DELETE * FROM sales WHERE description<>' '" ;
   $result3 =mysql_query($query3) or die(mysql_error());


    //$query= mysql_query('DROP TABLE IF EXISTS phpgrid.sales');
    $query= "DROP TABLE IF EXISTS hmisglob_griddemo.sales";
    $result =mysql_query($query);
}






















?>







<script>
function myFunction() {
    var no = document.getElementById("no");
    var option = no.options[no.selectedIndex].text;
    var txt = document.getElementById("amount").value;


    txt2 = txt * option;
    document.getElementById("result2").value = txt2;
}
</script>













<body>







<form action ="patient_cash_register.php" method ="GET">
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
if (isset($_GET['accounts'])){ 
   $date = $_GET['accounts9'];  
   //date('y/m/d');
   if ($date =='0000-00-00'){
      $date = date('y/m/d');       
   }
   $client_no=$_GET['accounts'];     
   $adm_no   =$_GET['accounts3'];     

   //client_id ='$client_no
   $query3="SELECT * FROM clients WHERE adm_no ='$adm_no'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     $gender       = mysql_result($result3,$i3,"gender");  
     $client_no    = mysql_result($result3,$i3,"adm_no");  
     $adm_no       = mysql_result($result3,$i3,"adm_no");       
     $balance_db   = mysql_result($result3,$i3,"balance");       

     $i3++;
   }

   $bal_account  = $patients_name.'-'.$adm_no;            
   //$cdquery="SELECT date FROM medicalfile WHERE adm_no ='$client_no'";
   //$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());


   $query3="SELECT * FROM medicalfile WHERE adm_no ='$adm_no' AND date = '$date'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $history      = mysql_result($result3,$i3,"history");  
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     if ($history==''){
        $history ="No medical history for the specified date";
     }
     $i3++;
   }
   //Go and get balance
   //------------------

  

   echo"<table><tr><td width ='50'>File:</td><td width ='30'>";
   echo"<input type='text' name='adm_no' size='10' value ='$client_no'></td>";
   
   echo"<td width ='20'>Name: </td><td width ='30'><input type='text' name='patients_name' size='30' value ='$patients_name'></td>";

   echo"<td width ='10'>Age: </td><td width ='10'><input type='text' name='age' size='10' value ='$age'></td>";
   echo"<td width ='10'>Sex: </td><td width ='10'><input type='text' name='age' size='10' value ='$gender'></td><td width ='10'>Visit Date: </td><td width ='10'><input type='text' name='date' size='10' value ='$date'></td><td><input type='text' name='balance' size='10' value ='$balance_db'></td></tr></table>";
   echo"<hr>";
   echo"<table><td align ='center'><h1>Medical<br>Notes</h1></td><td>";
   echo"<textarea name='history' rows='8' cols ='70'>";
   echo"$history";
   echo"</textarea></td><td width ='20'></td><td><img src='images/wama.jpg' alt='statement' height='150' width='180'></td><td><a href=javascript:popupbills('view_bill.php')><strong><img src='images/bills.jpg' alt='statement' height='20' width='100'></a></td></table>";


}



//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   $date = $_GET['date'];
   //date('y/m/d');
   $client_no=$_GET['adm_no'];
   $query3="SELECT * FROM clients WHERE adm_no ='$client_no'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     $gender       = mysql_result($result3,$i3,"gender");  
     $client_no    = mysql_result($result3,$i3,"adm_no");  
     $adm_no       = mysql_result($result3,$i3,"adm_no");  
     $balance_db   = mysql_result($result3,$i3,"balance");  
     $i3++;
   }

            
   //$cdquery="SELECT date FROM medicalfile WHERE adm_no ='$client_no'";
   //$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());


   $query3="SELECT * FROM medicalfile WHERE adm_no ='$adm_no' AND date = '$date'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $history      = mysql_result($result3,$i3,"history");  
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     if ($history==''){
        $history ="No medical history for the specified date";
     }
     $i3++;
   }


   echo"<table><tr><td width ='50'>File:</td><td width ='30'>";
   echo"<input type='text' name='adm_no' size='10' value ='$client_no'></td>";
   
   echo"<td width ='20'>Name: </td><td width ='30'><input type='text' name='patients_name' size='30' value ='$patients_name'></td>";

   echo"<td width ='10'>Age: </td><td width ='10'><input type='text' name='age' size='10' value ='$age'></td>";
   echo"<td width ='10'>Sex: </td><td width ='10'><input type='text' name='age' size='10' value ='$gender'></td><td width ='10'>Visit Date: </td><td width ='10'><input type='text' name='date' size='10' value ='$date'></td><td><input type='text' name='balance' size='10' value ='$balance_db'></td></tr></table>";
   echo"<hr>";
   echo"<table><td align ='center'><h1>Medical<br>Notes</h1></td><td>";
   echo"<textarea name='history' rows='8' cols ='70'>";
   echo"$history";
   echo"</textarea></td><td width ='20'></td><td><img src='images/wama.jpg' alt='statement' height='150' width='180'></td><td><a href=javascript:popupbills('view_bill.php')><strong><img src='images/bills.jpg' alt='statement' height='20' width='100'></a></td></table>";

}




//For price search button
//-----------------------
if (isset($_GET['accounts5'])){
   $todelete =$_GET['accounts5'];
   $adm_no = $_GET['accounts6'];
   $client_no=$_GET['accounts6'];

   $date = $_GET['date'];
   //date('y/m/d');
   //$client_no=$_GET['adm_no'];

   $query3 = "DELETE FROM sales WHERE id ='$todelete'";
   $result3 =mysql_query($query3) or die(mysql_error());

   $query3="SELECT * FROM clients WHERE adm_no ='$client_no'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     $gender       = mysql_result($result3,$i3,"gender");  
     $client_no    = mysql_result($result3,$i3,"adm_no");  
     $adm_no       = mysql_result($result3,$i3,"adm_no");  
     $balance_db   = mysql_result($result3,$i3,"balance");  
     $i3++;
   }

            
  
   $query3="SELECT * FROM medicalfile WHERE adm_no ='$adm_no' AND date = '$date'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $history      = mysql_result($result3,$i3,"history");  
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     if ($history==''){
        $history ="No medical history for the specified date";
     }
     $i3++;
   }


   echo"<table><tr><td width ='50'>File:</td><td width ='30'>";
   echo"<input type='text' name='adm_no' size='10' value ='$client_no'></td>";
   
   echo"<td width ='20'>Name: </td><td width ='30'><input type='text' name='patients_name' size='30' value ='$patients_name'></td>";

   echo"<td width ='10'>Age: </td><td width ='10'><input type='text' name='age' size='10' value ='$age'></td>";
   echo"<td width ='10'>Sex: </td><td width ='10'><input type='text' name='age' size='10' value ='$gender'></td><td width ='10'>Visit Date: </td><td width ='10'><input type='text' name='date' size='10' value ='$date'></td><td><input type='text' name='balance' size='10' value ='$balance_db'></td></tr></table>";
   echo"<hr>";
   echo"<table><td align ='center'><h1>Medical<br>Notes</h1></td><td>";
   echo"<textarea name='history' rows='8' cols ='70'>";
   echo"$history";
   echo"</textarea></td><td width ='20'></td><td><img src='images/wama.jpg' alt='statement' height='150' width='180'></td><td><a href=javascript:popupbills('view_bill.php')><strong><img src='images/bills.jpg' alt='statement' height='20' width='100'></a></td></table>";

}

//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = $_GET['date'];
   //date('y/m/d');
   $client_no=$_GET['adm_no'];
   $query3="SELECT * FROM clients WHERE adm_no ='$client_no'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     $gender       = mysql_result($result3,$i3,"gender");  
     $client_no    = mysql_result($result3,$i3,"adm_no");  
     $adm_no       = mysql_result($result3,$i3,"adm_no");  
     $balance_db   = mysql_result($result3,$i3,"balance");  
     $i3++;
   }

            
   //$cdquery="SELECT date FROM medicalfile WHERE adm_no ='$client_no'";
   //$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());


   $query3="SELECT * FROM medicalfile WHERE adm_no ='$adm_no' AND date = '$date'";
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $history      = mysql_result($result3,$i3,"history");  
     $patients_name= mysql_result($result3,$i3,"patients_name");  
     $age          = mysql_result($result3,$i3,"age");  
     if ($history==''){
        $history ="No medical history for the specified date";
     }
     $i3++;
   }


   echo"<table><tr><td width ='50'>File:</td><td width ='30'>";
   echo"<input type='text' name='adm_no' size='10' value ='$client_no'></td>";
   
   echo"<td width ='20'>Name: </td><td width ='30'><input type='text' name='patients_name' size='30' value ='$patients_name'></td>";

   echo"<td width ='10'>Age: </td><td width ='10'><input type='text' name='age' size='10' value ='$age'></td>";
   echo"<td width ='10'>Sex: </td><td width ='10'><input type='text' name='age' size='10' value ='$gender'></td><td width ='10'>Visit Date: </td><td width ='10'><input type='text' name='date' size='10' value ='$date'></td><td><input type='text' name='balance' size='10' value ='$balance_db'></td></tr></table>";
   echo"<hr>";
   echo"<table><td align ='center'><h1>Medical<br>Notes</h1></td><td>";
   echo"<textarea name='history' rows='8' cols ='70'>";
   echo"$history";
   echo"</textarea></td><td width ='20'></td><td><img src='images/wama.jpg' alt='statement' height='150' width='180'></td><td><a href=javascript:popupbills('view_bill.php')><strong><img src='images/bills.jpg' alt='statement' height='20' width='100'></a></td></table>";


}














$company_identity ='BUSTANI';
$location ='BUSTANI';

$item1 =' ';
$sql="SELECT * FROM stockfile WHERE search_name ='$item1'";
$result=mysql_query($sql);	 
$rows=mysql_fetch_array($result);

if (isset($_GET['revenue_search1'])){
   $item1 =$_GET['item1'];
   $item1 = trim($item1);
$item2 = trim($item1);
$item3 = trim($item1);


   //$company_identity=$_GET['company_identity'];
   //echo"1.$item1<br>";
$item2 = substr($item1, 0, -10);

   //echo"2.$item2<br>";
$item3 = substr($item3, -10);
 //echo"3.$item3";
   
   //$sql="SELECT * FROM stockfile WHERE substr(search_name,15,-1) ='$item3'";
   //$result=mysql_query($sql);	 
   //$rows=mysql_fetch_array($result);
   }




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









echo"<table border = '0' border color = 'black'><td width ='100' align ='left'><input type='submit' name='revenue_search1'  class='button' value='Search'></td><td width ='300'>";

 if (!isset($_GET['revenue_search1'])){
    echo"<select id='item1' name='item1'>";        
    $price = 0;
 }
 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
            
 $cdquery="SELECT search_name FROM stockfile WHERE location ='$company_identity'";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());

 if (isset($_GET['revenue_search1'])){

    //$user = "hmisglobal";   
    //$pass = "jamboafrica";   
    //$database = "hmisglob_griddemo";   
    //$host = "localhost";   

    //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
    //mysql_select_db($database) or die ("Unable to select the database");

   
   $query3 = "select * FROM stockfile";
   // &&WHERE substr(search_name,-10) ='$item1'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     //$price     = mysql_result($result3,$i3,"sell_price");  
     $item_desc = mysql_result($result3,$i3,"search_name");  
     $item_desc = substr($item_desc,-10);  
     if ($item_desc==$item3){
        $price     = mysql_result($result3,$i3,"sell_price");  
        $item_desc = mysql_result($result3,$i3,"search_name");  
        $item1     = mysql_result($result3,$i3,"search_name");  
//echo'$price';
     }
     $i3++;    
     }
    echo"<input type='text' name='item1' size='20' value ='$item1'>";
   }else{            
   while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["search_name"];     
   echo "<option>$cdTitle</option>";            
   }
}
 if (!isset($_GET['revenue_search1'])){
  echo"</select>";
}

echo"</td><td width ='100'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td width ='120'>";
//echo"</td>";
//echo"<td width='50' align='right'><input type='text' id ='amount' name='amount' size='10' value ='$price'></td><td>";

echo"<select id='no' name='no' onchange='myFunction()'>";        
$cdquery="SELECT qty FROM table_qtys";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["qty"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";


?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->


<!--input type='text' id = 'result' name='result' size='10' onchange ='myFunction()'-->
<td width ='100'><input type='text' id ='result2' name='result2' size='10'></td><td align ='left'><input type='submit' name='add_next'  class='button' value='Add '></td><td>
<?php echo"<a href='patient_cash_register.php?accounts8=$adm_no'>";?>Refresh<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td></tr></table>
<!--/td><th width ='300'>Action</th><th width ='100'></th></table-->




<br>
<!--table width ='400' border='0' border color ='black'><td align ='left'><input type='submit' name='billing'  class='button' value='Add '></td></table-->
<!--/FORM-->

<!--table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='100' width='130'></td>
</table-->















 <?php
//Displaying items to be adjusted
/////////////////////////////////
echo"<table bgcolor ='red' border = '0' border color = 'black'><th width ='400' align ='left'>Item Description</th><th width ='100'>Price</th><th width ='120'>Qty</th><th width ='120'>Total</th><th width ='100'>Action</th></th></table>";

 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());
 //$connect = mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword)or die ("Unable to connect");
            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 $myfile =gethostname();








 $query= "SELECT * FROM sales " or die(mysql_error());

 $result =mysql_query($query) or die(mysql_error());

 $num =mysql_numrows($result) or die(mysql_error());

 $tot =0;

 $i = 0;



                                                         
 echo"<table class='altrowstable' id='alternatecolor'>";

 $SQL = "select * FROM sales" ;
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
  
      $save ='Yes';
      $tot_amt = $tot_amt+$total;

      echo"<tr bgcolor ='white' border ='2' bordercolor='white'>";

      echo"<td width ='400' align ='left'>";
      
echo"$desc";

      echo"</td>";

      
echo"<td width ='100' align ='right'>";

      
echo"$price";

      echo"</td>";

      
echo"<td width ='120' align ='right'>";
      echo"$qty";

      echo"</td>";


      
echo"<td width ='120' align ='right'>";
      echo"$total";

      echo"</td>";



      $aa7=$row['description'];        
      $aa8=$row['id'];        

echo"<td width ='100' align ='right'><a href='patient_cash_register.php?accounts5=$aa8&accounts6=$adm_no'>Delete<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td>";


      




echo"</tr>";
   


      $i++;
  
       
}

      echo"</table>";
      //if ($save=='Yes'){
         //echo"<br>";
         //echo"<form action ='stocks_adjustment.php'>";
         //echo"<table width ='400' border='0' border color ='black'><td align ='left'><input type='submit' name='billing'  class='button' value='Save and Print''></td></table></form>";
     //    }


      




echo"<font size ='20'><table><td width ='325'></td><td width ='100'></td><td><h4>Total</h4></td><td width ='100' align ='right'>$tot_amt</td><td width ='100'></td><td><h4>Amount Paid:</h4></td><td width ='100' align ='right'><input type='text' name='paid' size='10'></td></font>";
   
      //echo"</form'>";

      //To show totals here


      echo"</table>";





echo"Payer: ";
echo"<select id='db_accounts' name='db_accounts'>";        
$cdquery="SELECT account_name FROM debtorsfile ORDER BY account_name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["account_name"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";



?>

<table width ='400' border='0' border color ='black'><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save and Print'></td></table>
</form>



</body>
</html>
