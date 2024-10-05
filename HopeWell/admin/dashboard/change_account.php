<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>


<form action ="change_account.php" method ="GET">

<h3>Change Account</h3>
<?php



if (isset($_GET['save_cancel'])){ 
   $id     = $_GET['id'];
   $desc   = $_GET['db_account'];
   $account1= $_GET['old_account'];
   $ref_no  = $_GET['invoice'];
   $idx  = $_GET['idx'];

   $query= "UPDATE medicalfile set gl_account ='$desc' where id ='$id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());   

   $query= "UPDATE appointmentf set payer ='$desc' where adm_no ='$idx'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());   

   //Now moving items from one file to another
   //-----------------------------------------
   if ($account1=='' and $desc<>''){


  $query= "SELECT * FROM auto_transact where invoice_no ='$ref_no'";
   $SQL  = "SELECT * FROM auto_transact where invoice_no ='$ref_no'";

$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());

$tot =0;
$i = 0;
                                                    
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {               
      $loc      = mysql_result($result,$i,"location");  
      $desc     = mysql_result($result,$i,"description");   
      $price    = mysql_result($result,$i,"sell_price");
      $qty      = mysql_result($result,$i,"qty");  
      $credit   = mysql_result($result,$i,"credit_rate");
      $gl_acc   = mysql_result($result,$i,"gl_account");
      $date     = mysql_result($result,$i,"date");
      $line_no  = mysql_result($result,$i,"line_no");
      $selected = mysql_result($result,$i,"selected");
      $invoice = mysql_result($result,$i,"invoice_no");  
      $balance = mysql_result($result,$i,"balance");

      $query5= "INSERT INTO auto_transact_inv 
      VALUES('','$loc','$desc','$price','$qty','$credit','$gl_acc','$date','$line_no','$selected','$invoice','$balance')";
      $result5 =mysql_query($query5);

$i++;
}
$query5= "DELETE FROM auto_transact where invoice_no ='$ref_no'";
$result5 =mysql_query($query5);







echo"<h1><font color ='red'>Changes completed.......</font></h1>";





}
//From company to cash
//--------------------
   if ($account1<>'' and $desc==''){

  $query= "SELECT * FROM auto_transact_inv where invoice_no ='$ref_no'";
   $SQL  = "SELECT * FROM auto_transact_inv where invoice_no ='$ref_no'";

$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());

$tot =0;
$i = 0;
                                                    
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {               
      $loc      = mysql_result($result,$i,"location");  
      $desc     = mysql_result($result,$i,"description");   
      $price    = mysql_result($result,$i,"sell_price");
      $qty      = mysql_result($result,$i,"qty");  
      $credit   = mysql_result($result,$i,"credit_rate");
      $gl_acc   = mysql_result($result,$i,"gl_account");
      $date     = mysql_result($result,$i,"date");
      $line_no  = mysql_result($result,$i,"line_no");
      $selected = mysql_result($result,$i,"selected");
      $invoice = mysql_result($result,$i,"invoice_no");  
      $balance = mysql_result($result,$i,"balance");

      $query5= "INSERT INTO auto_transact 
      VALUES('','$loc','$desc','$price','$qty','$credit','$gl_acc','$date','$line_no','$selected','$invoice','$balance')";
      $result5 =mysql_query($query5);

$i++;
}

$query5= "DELETE FROM auto_transact_inv where invoice_no ='$ref_no'";
$result5 =mysql_query($query5);







echo"<h1><font color ='red'>Changes completed.......</font></h1>";
}

}
//End of saving
//-------------





if (isset($_GET['accounts'])){ 
   $id     = $_GET['accounts'];
   $query= "SELECT * FROM medicalfile where id ='$id'";
   $SQL  = "SELECT * FROM medicalfile where id ='$id'";
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());

$tot =0;
$i = 0;


                                                      
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {               
      $codes      = mysql_result($result,$i,"adm_no");  
      $patient    = mysql_result($result,$i,"name");   
      $account    = mysql_result($result,$i,"gl_account");
      $myid       = mysql_result($result,$i,"id");  
      $invoice = mysql_result($result,$i,"ref_no");  
}




echo "<table width ='100%'>";
    echo "<tr><td width ='20' bgcolor ='black'><font color ='white'>ID</td>";
    echo "<td align ='left'>"."<input type='text' id ='line' name='id' size='5' value ='$myid' readonly><input type='hidden' id ='linex' name='idx' size='5' value ='$codes' readonly>" . "</td></tr>";

    echo "<tr><td width ='20' bgcolor ='black'><font color ='white'>Invoice No</td>";
    echo "<td align ='left'>"."<input type='text' id ='line' name='invoice' size='5' value ='$invoice' readonly>" . "</td></tr>";

    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Patient:</td>";
    echo "<td align ='left'>"."<input type='text' id ='desc' name='desc' size='30' value ='$patient'>" . "</td></tr>";
    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Account:</td>";
    echo "<td align ='left'>"."<input type='text' id ='price' name='old_account' size='30' value ='$account'>" . "</td></tr>";


echo"<tr><td width ='100' align ='left' border ='3'><b>Select  A/c:</b></td><td>";

echo"<select id='db_account' name='db_account'>";
$cdquery="SELECT account_name FROM debtorsfile order by account_name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM suppliersfile order by account_name";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td></tr>";

echo "</table>";

echo"<table><td width ='20'><input type='submit' name='save_cancel'  class='button' value='Save'></td></table>";
}
