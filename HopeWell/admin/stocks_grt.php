<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }

$store_select = $_SESSION['store_select'];
if ($store_select<>''){
}else{
    echo"<p align ='center'><font color ='red'><h1>Kindly select the Store Location before you can proceed</p></font>";
    die();
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
  	<?php include 'includes/stocks.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	




<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>

<?php
//session_start();
$_SESSION['discount']= $_GET['no_disc'];       
$company_identity = $_SESSION['company'];


$ref_no =' ';
$query3 = "select * FROM companyfile" ;
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($i3 < $num3)
  {
  $ref_no   = mysql_result($result3,$i3,"next_ref");  
  $i3++;
  }
//For save and print button the correct one
//-----------------------------------------
if (isset($_GET['save_cancel'])){
   //Go and save first
   //-------------------
   $location1 = $_SESSION['store_select'];
   //$_GET['patient'];
   $location2 = $_GET['patient2'];
   $date      = $_GET['date'];
   $inv_no    = $_GET['inv_no'];
   $deliv_no    = $_GET['deliv_no'];
   //$location1   = $_SESSION['company'];
   //$_GET['patient'];
   $supplier    = $_GET['patient2'];

   //Get the receipt No.   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   $tot_discs =0;
   $tot_vats=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");
  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
     $result3 = mysql_query($query3);


     $query = "select * FROM stock_transfer WHERE description <>''" ;
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
      $disc    = mysql_result($result,$i,"line_no");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"gl_account");  
      $tot_vat = mysql_result($result,$i,"tot_vat");  
      $tot_disc= mysql_result($result,$i,"tot_disc");  
      $net_total= $total -$tot_disc +$tot_vat;
      //mysql_result($result,$i,"total"); 
      $vat      = mysql_result($result,$i,"credit_rate"); 
      $disc     = mysql_result($result,$i,"line_no"); 
      $search_id= mysql_result($result,$i,"search_id"); 

      $tot_amt = $tot_amt + $net_total;
      if ($tot_vat >0){
         $vat_control ='V.A.T. CONTROL';
         $tot_vats = $tot_vats+$tot_vat;
      }
      if ($tot_disc >0){
         $tot_discs=$tot_discs+$tot_disc;
         $disc_control ='DISCOUNTS CONTROL';
      }

      //Add Qty in file
      //$query2 = "select * FROM stockfile WHERE description ='$desc'" ;
      $query2 = "select * FROM stockfile WHERE id ='$search_id'" ;
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
      $desc2 ='GRN'.':'.$ref_no.':'.$deliv_no;
      $costs = 1.33*$rate;
         $qty = $qtys-$qty_s;
         //,sell_price='$costs' disbled by loice
      $query3= "UPDATE stockfile SET qty ='$qty' WHERE id ='$search_id'";
      $result3 =mysql_query($query3);

      $query4= "INSERT INTO st_trans VALUES('','$location1','$desc','$desc2','-$qty_s','GRT','$date','ADMIN','$rate','$total','$inv_no','$supplier','$vat','$disc','$tot_vat','$tot_disc','$net_total')";
      $result4 =mysql_query($query4);

      $i++;
 
   }

   $today =date('y-m-d');
   $orig_amt = $tot_amt+$tot_discs-$tot_vats;

   //Now go and update the suppliers account
   //---------------------------------------   
   $query2 = "select * FROM suppliersfile WHERE account_name ='$supplier'" ;
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;
   while ($i2 < $num2)
         {         
         $qtys   = mysql_result($result2,$i2,"os_balance");  
         $i2++;
      }
      $desc2 ='GRN'.':'.$ref_no.':'.$deliv_no;

      $qty = $qtys-$tot_amt;
      $query3= "UPDATE suppliersfile SET os_balance ='$qty' WHERE account_name ='$supplier'";
      $result3 =mysql_query($query3);

      $query4= "INSERT INTO supplierstrfile VALUES('','$location1','$supplier','$date','$inv_no','$desc2','CRN','-$tot_amt','INV','$deliv_no','ADMIN','$disc2','$today','','$supplier','-$tot_amt')";
      $result4 =mysql_query($query4);


   $debit_account ='ACCOUNTS PAYABLES';
   $credit_account ='INVENTORY';
   $desc = $supplier.'::'.$desc2;

   //Go and update gltransf
   //----------------------
   $query5= "INSERT INTO gltransf    VALUES('','$date','$debit_account','$ref_no','GRT','$desc','$orig_amt','admin','$company_identity')";
   $result5 =mysql_query($query5);

   if ($tot_vats>0){
      $query5= "INSERT INTO gltransf       VALUES('','$date','$vat_control','$ref_no','GRT','$desc','-$tot_vats','admin','$company_identity')";
      $result5 =mysql_query($query5);

      $query5= "INSERT INTO gltransf 
      VALUES('','$date','$debit_account','$ref_no','GRN','$desc','$tot_vats','admin','$company_identity')";
      $result5 =mysql_query($query5);
   }

   if ($tot_discs>0){
      $query5= "INSERT INTO gltransf 
      VALUES('','$date','$disc_control','$ref_no','GRN','$desc','$tot_discs','admin','$company_identity')";
      $result5 =mysql_query($query5);

      $query5= "INSERT INTO gltransf 
     VALUES('','$date','$debit_account','$ref_no','GRN','$desc','-$tot_discs','admin','$company_identity')";
      $result5 =mysql_query($query5);
   }


   //Now go and credit the bank
   //--------------------------
   $query5= "INSERT INTO gltransf VALUES('','$date','$credit_account','$ref_no','GRN','$desc',
'-$tot_amt','admin','$company_identity')";
   $result5 =mysql_query($query5);
   


   //Now go and Debit G/L Accounts file
   //-----------------------------------
   //Post Debit control first
   //-------------------------
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

   $db_balance = $db_balance -$tot_amt;
   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);



   //Now go and credit control Accounts file
   //-----------------------------------

   $query3 = "select * FROM glaccountsf WHERE account_name ='$credit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $credit_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

     $credit_balance = $credit_balance +$tot_amt;

     $query2= "UPDATE glaccountsf SET balance ='$credit_balance' WHERE account_name ='$credit_account'";
     $result2 =mysql_query($query2);

   //Now go and print GRN NOTE
   //-------------------------




   //--------------------------------------------


   //Now go and update the suppliers account
   //---------------------------------------   
   $query2 = "select * FROM suppliersfile WHERE account_name ='$supplier'" ;
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;
   while ($i2 < $num2)
         {         
         $balance   = mysql_result($result2,$i2,"os_balance");  
         $acc_no      = mysql_result($result2,$i2,"client_id");  
         $acc_no2      = mysql_result($result2,$i2,"client_id");  
         $acc_name    = mysql_result($result2,$i2,"account_name");  
         $caddress1    = mysql_result($result2,$i2,"telephone_no");   
         $caddress2    = mysql_result($result2,$i2,"address");   
         $contact      = mysql_result($result2,$i2,"contact");   
         $i2++;
      }
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "select * FROM companyfile" ;
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
      $address4    = mysql_result($result,$i,"address4");   

   }
   echo"<p align ='centre'><h3><u>GOODS RETURN NOTE</u></h3></p>";

   echo"<table width ='100%'><h1>";      
   echo"<tr><td align ='left'><b>Supplier Name</b></td><td align ='left'><b>$acc_name</b></td><td width ='100'></td><td align ='right' width ='350'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>Address</b></td><td align ='left'><b>$caddress1</b></td><td width ='100'></td><td align ='right' width ='350'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>Telephone</b></td><td align ='left'><b>$caddress2</b></td><td width ='100'></td><td align ='right' width ='350'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>Contact</b></td><td align ='left'><b>$contact</b></td><td width ='100'></td><td align ='right' width ='350'><b>$address3</b></td></tr>";
   echo"<tr><td></td><td align ='left'></td><td width ='50'></td><td align ='right'><b>$address4</b></td></tr>";
   echo"</table><br>";
   $to ='  To  ';
  

 

echo"<table width ='100%'><tr><th width ='200' bgcolor ='black' align ='left'><font color ='white'>Item Description</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>@cost</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>Qty</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>Total</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>Discount</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>Net Total</th></tr>";
     $query = "update stock_transfer set total =gl_account-tot_disc+tot_vat WHERE description <>''" ;
     $result =mysql_query($query) or die(mysql_error());

     $query = "select * FROM stock_transfer WHERE description <>''" ;
     $result =mysql_query($query) or die(mysql_error());
     $id = 0;
     $nRecord = 1;
     $No = $nRecord;
     $num =mysql_numrows($result) or die(mysql_error());
     $i =0;
     $tot_amt =0;
     $mnet_total=0;
     $codes = $_SESSION['company'];
     $mtot_disc =0;
     while ($i < $num)
      {         
      //$codes   = mysql_result($result,$i,"location");  
      $desc    = mysql_result($result,$i,"description");   
      $disc    = mysql_result($result,$i,"line_no");   
      $rate    = mysql_result($result,$i,"sell_price");   
      $qty     = mysql_result($result,$i,"qty");  
      $qty_s   = mysql_result($result,$i,"qty");  
      $total   = mysql_result($result,$i,"gl_account");  
      $tot_vat = mysql_result($result,$i,"tot_vat");  
      $tot_disc= mysql_result($result,$i,"tot_disc");  
      $net_total= mysql_result($result,$i,"total"); 
      $vat      = mysql_result($result,$i,"credit_rate"); 
      $disc     = mysql_result($result,$i,"line_no"); 

      $tot_amt = $tot_amt + $total;
      $mnet_total= $mnet_total+$net_total;
      $mtot_disc = $mtot_disc+$tot_disc;


      if ($desc<>''){
   echo"<tr><td width ='200' align ='left'>$desc</td><td width ='50' align ='right'>$rate</td><td width ='50' align ='right'>$qty</td><td width ='50' align ='right'>$total</td><td width ='50' align ='right'>$tot_disc</td><td width ='50' align ='right'>$net_total</td></tr>";
      }
   $i++;
  }
   echo"<tr><th width ='200' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='right'></th><th width ='100' align ='right'></th></tr>";
   echo"<tr><th width ='200' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='left'></th><th width ='50' align ='right'></th><th width ='100' align ='right'></th></tr>";
//echo"<hr>";
echo"<tr><th width ='200'></th><th width ='50'></th><th width ='50'  align='right'><font color ='black'>TOTAL</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>$tot_amt</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>$mtot_disc</th><th width ='50' bgcolor ='black' align='right'><font color ='white'>$mnet_total</th></tr></table>";




   echo"<table><tr><th width ='100' align ='left'>Date received:</th><th width ='50' align ='left'>$date</th></tr>";
   echo"<tr><th width ='100' align ='left'>Received by:</th><th width ='50' align ='left'>________________________________</th></tr>";
   echo"<tr><th width ='100' align ='left'>Checked & Approved by:</th><th width ='50' align ='left'>________________________________</th></tr></table>";
echo"<br><br><br><br>";
echo"Official Stamp";








   //Delete entries from temp file
   //-----------------------------
   $query3 = "DELETE FROM stock_transfer WHERE qty > 0";
   $result3 =mysql_query($query3) or die(mysql_error());
   die();
}









if (isset($_GET['accounts5'])){      
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM stock_transfer WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());



}





?>


<!DOCTYPE html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php






// Create connection
$conn = new mysqli($host, $user, $pass, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE stock_transfer (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
location VARCHAR(30) NOT NULL,
description VARCHAR(100) NOT NULL,
sell_price INT(11),
qty INT(11),
credit_rate INT(11),
gl_account INT(11),
date TIMESTAMP)";

if ($conn->query($sql) === TRUE) {
    //echo "Table MyGuests created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}


if (isset($_GET['add_next'])){
//if (isset($_GET['accounts6'])){ 
   $count = $_GET['accounts6']; 

   $query= "CREATE TEMPORARY TABLE stock_transfer IF NOT EXISTS stock_transfer (location varchar(100) NOT NULL,
   description varchar(200),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);
   //Initiolize the new entries
   //---------------------------
   $myDate = date('y/m/d');
   $location      = $_SESSION['company'];
   $location1     = $_SESSION['store_select'];
   //$_SESSION['company'];
   //"BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   $total        = $_GET["result_three"];
   $vat          = $_GET["no_vat"];
   $search_id    = $_GET["search_id"];

   $vats = ($vat/100)*$total;

   //$vats          = $_GET["tot_vat"];
   $disc         = $_GET["tot_disc"];


   $net_total    = $_GET["net_total"];

   //$count        = $num;
   //$desc         = substr($description, -10);
   $net_totals    = $_GET["net_total"];



   //get price for this item as you save it in temporary file
      

   $disc2 =$_SESSION['discount'];
   $tot_vat      = $total+$disc2;
   //$disc = ($disc2/100)*$total+;

   $query9= "INSERT INTO stock_transfer  VALUES('','$location','$description','$amount','$qty','$vat','$total','$search_id','$disc2','$vats','$disc',
'$net_total')";
   $result9 =mysql_query($query9);
   $myDate =date('y-m-d');


   $query3 = "DELETE FROM stock_transfer WHERE description <>'' and qty = 0";
   $result3 =mysql_query($query3) or die(mysql_error());


}






if (isset($_GET['refresh'])){
   $date = date('y/m/d');
   //echo"Put some details heare 7";

}

if (isset($_GET['delete'])){
   $date = date('y/m/d');
   //End of printing receipt
   //-----------------------

   $query3 = "DELETE FROM stock_transfer WHERE qty > 0";
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
        xmlhttp.open("GET","getpricegrn.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
















<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    var txtz = document.getElementById('result_three').value;
    
    //txt2 = txt * no;
    txt2 = txtz/no;
    
    //document.getElementById("result_three").value = txt2;
    document.getElementById("amount_three").value = txt2;
}
</script>
<script>
function function3x() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    txt2 = txt * no;
    document.getElementById("result_three").value = txt2;
}
</script>

<script>
function function44() {
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

<script>
function function6() {
    var no_disc = document.getElementById('no_disc').value;   
    var txt     = document.getElementById('result_three').value;
    txt2 = (no_disc/100)*txt;
//alert(txt2);
    txt2 = txt-txt2;
    //document.getElementById("result_three").value = txt2;



    var price  = parseInt(document.getElementById('amount_three').value); 
    var qty    = parseInt(document.getElementById('no_three').value); 
    var txts     = parseInt(document.getElementById('result_three').value);
    var vats     = parseInt(document.getElementById('tot_vat').value);
    var total  = price*qty;

    var totals  = price*qty+vats;

    var txts     = parseInt(document.getElementById('net_total').value);
    var no_discs = parseInt(document.getElementById('no_disc').value);

    //var disc = ((no_disc/100)*totals);
   var disc = ((no_disc/100)*txt);
//alert(disc);

    //document.getElementById("result_three").value = total;
    document.getElementById("tot_disc").value = disc;
    document.getElementById("net_total").value = total+vats-disc;


}
</script>
<script>
function function4() {
    var no_vat = parseInt(document.getElementById('no_vat').value); 
    var price  = parseInt(document.getElementById('amount_three').value); 
    var qty    = parseInt(document.getElementById('no_three').value); 
    var txts     = parseInt(document.getElementById('result_three').value);

    var tot_vat  = parseInt(document.getElementById('tot_vat').value); 
    var tot_disc = parseInt(document.getElementById('tot_disc').value); 



    var total  = price*qty;

    var txts     = parseInt(document.getElementById('net_total').value);
    vats = ((no_vat/100)*total)
   
    txt4 = vats;
    document.getElementById("result_three").value = total;
    document.getElementById("tot_vat").value = vats;
    document.getElementById("net_total").value = total+vats;

}
</script>










<body>







<form action ="stocks_grt.php" method ="GET">
<?php

//New changes
if (isset($_GET['accounts5'])){ 
   $record =$_GET['accounts5'];
   $query3 = "DELETE FROM stock_transfer WHERE id ='$record'";
   $result3 =mysql_query($query3) or die(mysql_error());

}



//For price search button
//-----------------------
if (isset($_GET['revenue_search1'])){
   $date = date('y/m/d');
}










//For Next item button
//--------------------
if (isset($_GET['add_next'])){
   $date = date('y/m/d');

}














$company_identity =$_SESSION['company'];

            
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


















$date = date('y-m-d');





?>

<!--input type="text" id="result" size="20">
<input type="text" id="result2" size="20"-->



 <?php
$location1     = $_SESSION['store_select'];
//$_SESSION['company'];

$store_select = $_SESSION['store_select'];
if ($store_select<>''){
   echo"<p align ='center'><font color ='red'><h1>Store Location: ".$store_select;
   echo"</p></font>";
}else{
    echo"<p align ='center'><font color ='red'><h1>Kindly select the Store Location before you can proceed</p></font>";
    die();
}   
//Displaying items to be adjusted
/////////////////////////////////
echo"<img src='ico/black.jpg' style='width:100%;height:1px;'>";
//echo"<table bgcolor ='red' border = '0' border color = 'black' width ='100%'><th width ='350' align ='left'>Item Description</th><th width ='100'>@Cost</th><th width ='50'>Qty</th><th width ='50'></th><th width ='10'>%Disc.</th><th width ='100'>Total</th><th width ='50' align ='right'>Action</th></th></table>";
/////////////////////////////////
//echo"<img src='ico/black.jpg' style='width:100%;height:1px;'>";
echo"<table bgcolor ='red' border = '0' border color = 'black' width ='100%'>";
echo"<th width ='10%' align ='left' bgcolor='blue'><font color='white'><h4>Item Code</h4></font></th>";
echo"<th width ='35%' align ='left' bgcolor='blue'><font color='white'><h4>Item Description</h4></font></th>";
echo"<th width ='10%' bgcolor='blue'><font color='white'><h4>@Cost</h4></font></th>";
echo"<th width ='10%' bgcolor='blue'><font color='white'><h4>Qty</h4></font></th>";
echo"<th width ='10%' bgcolor='blue'><font color='white'><!--h4>%Disc.</h4--></font></th>";
echo"<th width ='10%' bgcolor='blue'><font color='white'><h4>Total</h4></font></th>";
echo"<th width ='5%'  bgcolor='blue' align ='right'><font color='white'><h4>Action</h4></font></th></table>";

 $myfile =gethostname();


 $query3 = "DELETE FROM stock_transfer WHERE description <>'' and qty = 0";
 $result3 =mysql_query($query3) or die(mysql_error());


 $query= "SELECT * FROM stock_transfer " or die(mysql_error());
 $result =mysql_query($query) or die(mysql_error());
 $num =mysql_numrows($result) or die(mysql_error());
 $tot =0;
 $i = 0;
                                                         
 echo"<table class='altrowstable' id='alternatecolor' width ='100%'>";
 $company_identity =$_SESSION['company'];
 $SQL = "select * FROM stock_transfer" ;
 $hasil=mysql_query($SQL, $connect);
 $id = 0;
 $nRecord = 1;
 $No = $nRecord;
 $tot = 0;
 $save ='No';
 $tot_amt =0;
 $tot_vats   = 0;
 $tot_discs  = 0;
 $net_totals = 0;
 while ($row=mysql_fetch_array($hasil)) 
      {               
      $desc    = mysql_result($result,$i,"description");   
      $qty    = mysql_result($result,$i,"qty");   
      $price   = mysql_result($result,$i,"sell_price");   
      $total = mysql_result($result,$i,"gl_account");
      $line  = mysql_result($result,$i,"line_no");
      $disc  = mysql_result($result,$i,"line_no");
      $vat   = mysql_result($result,$i,"credit_rate");

      $tot_vat = mysql_result($result,$i,"tot_vat");
      $tot_disc= mysql_result($result,$i,"tot_disc");
      $net_total= mysql_result($result,$i,"total");
      $search_id= mysql_result($result,$i,"search_id");

      $save ='Yes';
      $tot_amt = $tot_amt+$total;

      $tot_vats   = $tot_vats+$tot_vat;
      $tot_discs  = $tot_discs+$tot_disc;
      $net_totals = $net_totals+$total+$tot_vat-$tot_disc;

      if ($desc > ' '){
         echo"<tr border ='2' bordercolor='black'>";
         echo"<td align ='left' width ='10%'><input type='text' name='search_id'  id ='search_id' value='$search_id' size ='5' readonly></td>";
         echo"<td width ='35%'><input type='text' id ='s_desc_three' size ='100' name='s_desc_three' value 
        ='$desc'></td>";
      }else{
         echo"<tr border ='2' bordercolor='black'>";
         echo"<td align ='left' width ='5'><input type='text' name='search_id1'  id ='search_id1' value='XX' size ='5' readonly></td>";
         echo"<td width ='250' align ='left'>";
         echo"<select id='item1' name='item1' onchange='showUser(this.value)' readonly>";
         $cdquery="SELECT description FROM stockfile WHERE description<>'' and location ='$store_select' ORDER BY description";
         $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
         $query3 = "select * FROM stockfile";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["description"];     
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
        echo"<td width ='10%'><input type='text' id ='s_amount_three' name='amount_three' size='10' value 
        ='$price' readonly></td>";
        echo"<td width ='10%'><input type='text' id ='s_no_three' name='s_no_three' size='5' value ='$qty' readonly></td>";
        echo"<td width ='10%'><!--input type='text' id ='s_no_three' name='no_vat' size='5' value ='$vat' readonly--></td>";
        echo"<td><!--input type='text' id ='s_no_three' name='no_disc' size='5' value ='$disc' readonly--></td>";
        echo"<td width ='10%'><input type='text' id ='s_result_three' name='s_result_three' size='10' value 
        ='$total' readonly></td>";
    }else{
        //echo"<td><input type='text' id ='s_amount_three' name='s_amount_three' size='5' 
        //value ='$price'></td>";
        //echo"<td><input type='text' id ='s_no_three' name='s_no_three' size='5' onchange='function33()'>
//</td>";
        //echo"<td><input type='text' id ='s_no_three' name='no_vat' size='5' onchange='function4()'></td>";
        //echo"<td><input type='text' id ='s_no_three' name='no_disc' size='5' onchange='function6()'>
//</td>";
        //echo"<td><input type='text' id ='s_result_three' name='s_result_three' size='5'></td>";
    }
  

 
   
      $aa7=$row['description'];        
      $aa8=$row['id'];        
if ($aa8<>'1'){
echo"<td width ='90' align ='right'><a href='stocks_grt.php?accounts5=$aa8'>Del<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td>";
}

      




echo"</tr>";

      $i++;
  
       
}

echo"<img src='ico/black.jpg' style='width:100%;height:1px;'>";   

      echo"</table>";
echo"<table><br><tr><div id='txtHint'><b>.</b></div></tr><br></table>";


      



echo"<img src='ico/black.jpg' style='width:100%;height:1px;'><br>";
echo"<font size ='20'><table border ='0' width ='100%'><tr><td width ='100'><b>Date</b></td><td><input type='text' name='date' size ='10' value='$date'></td><td width ='100' align ='right'></td><td width ='100' align ='right'><b>GRN No.</b></td><td width ='100' align ='right'><input type='text' name='grn_no' size ='10' value='$ref_no'></td><td></td><td align ='right'><b>Total:</b></td><td width ='10' align ='right'><b><input type='text' size ='10' name='gross_total' id='gross_total' value='$tot_amt' readonly></b></td></tr>";

echo"<tr><td width ='100'><b>Invoice No.</b></td><td><input type='text' name='inv_no' size ='10' ></td><td width ='100' align ='right'></td><td width ='100' align ='right'><b>Delivery No.</b></td><td width ='100' align ='right'><input type='text' name='deliv_no' size ='10'></td><td></td><td align ='right' width ='200'><b>Tot-VAT:</b></td><td width ='10' align ='right'><b><input type='text' size ='10' name='tot_vat' id='tot_vat' value='$tot_vats'readonly></b></td></tr>";


echo"<tr><td width ='100'><!--b>Receiving Store </b--></td><td>";
//echo"<select id='patient' name='patient'>";        
//$cdquery="SELECT description FROM st_locationf ORDER BY description ";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
//while ($cdrow=mysql_fetch_array($cdresult)) {
//  $cdTitle=$cdrow["description"];
//  echo "<option>$cdTitle</option>";            
//  }
// echo"</select>";
echo"</td>";

echo"<td width ='100'></td><td align ='right' width ='100'></td><td width ='100' align ='right'></td><td width ='100' align ='right'></td><td align ='right'><b>Tot-Disc:</b></td><td width ='10' align ='right'><b><input type='text' size ='10' name='tot_disc' id='tot_disc' value='$tot_discs' readonly></b></td></tr>";





echo"<tr><td align ='left' width ='100'><b>Supplier A/c </b></td><td>";
echo"<select id='patient2' name='patient2'>";        
$cdquery="SELECT account_name FROM suppliersfile ORDER BY account_name ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["account_name"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select>";



echo"</td><td></td><td></td><td></td><td width ='100' align ='right'></td><td width ='5' align ='right'><b>Net-Total:</b></td><td width ='10' align ='right'><b><input type='text' size ='10' align ='right' id='net_total' name='net_total' value='$net_totals' readonly></b></td></tr>";

      echo"</table>";







echo"<tr><td align ='left'><input type='submit' name='save_cancel'  class='button' value='Save Details'></td>";

echo"<td align ='left'></td></td>";

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





   $query = "select * FROM stock_transfer" ;
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
      $tot_vat = mysql_result($result,$i,"tot_vat");  
      $tot_disc= mysql_result($result,$i,"tot_disc");  
      $net_total= mysql_result($result,$i,"total"); 
      $vat      = mysql_result($result,$i,"credit_rate"); 
      $disc     = mysql_result($result,$i,"line_no"); 
      $codes =$_SESSION['store_select'];
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
      $costs = 1.33*$rate;
      //,sell_price='$costs' Disabled by loice
      $query3= "UPDATE stockfile SET qty ='$qty',cost_price='$rate' WHERE description ='$desc' AND location ='$codes'";
      $result3 =mysql_query($query3);

      $patient =$patients_name;
      $query4= "INSERT INTO st_trans VALUES('','$codes','$desc','','$qty_s','Goods Received.','$date','ADMIN','$rate','$total','$ref_no','$ref_no','$vat','$disc','$tot_vat','$tot_disc','$net_total')";
      $result4 =mysql_query($query4);
      //Now go and update the receipt file

      $i++;
 
   }


   //Update Balances if not paid in full
   //-----------------------------------
   $topay = $tot_amt - $paid;
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
     $query5= "INSERT INTO receiptf VALUES('',$codes','CASH SALE','$patient','','CASH 
     RECEIPT','$date','ADMIN','$tot_amt','$paid','$ref_no','$topay','','')";
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
    

    


<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>

	
	
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
$sql = "CREATE TABLE stock_transfer (
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
   $query= "CREATE TEMPORARY TABLE stock_transfer IF NOT EXISTS stock_transfer (location varchar(100) NOT NULL,
   description varchar(100),
   sell_price INT(11),
   qty INT(11),
   credit_rate INT(11),
   gl_account INT(11))";
   $result =mysql_query($query);

   $location     = $_SESSION['company'];
   //"BUSTANI";
   $description  = $_GET["item1"];
   $amount       = $_GET["amount_three"];
   $qty          = $_GET["no_three"];
   //$disc         = $_GET["no_disc"];
   $total        = $_GET["result2"];
   $desc         = substr($description, -10);
   $vats          = $_GET["tot_vat"];
   $vat          = $_GET["no_vat"];
   $disc         = $_GET["tot_disc"];
   $net_total    = $_GET["net_total"];


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

   $disc2 =$_SESSION['discount'];

      
   //$query= "INSERT INTO stock_transfer //VALUES('','$location','$item_desc','$item_price','$qty','$vat','$total','$myDate','$disc2','$vats','$disc'//,'$net_total')";
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

<!--body background="images/background.jpg"-->


<form action ="stocks_grt.php" method ="GET">
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














$company_identity =$_SESSION['company'];
$location =$_SESSION['company'];



$date = date('y-m-d');




 
echo"</table>";


?>



</form>



</body>
</html>
















      </section>
      <!-- right col -->
    </div>
  	<!--?php include 'includes/footer.php'; ?-->

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





