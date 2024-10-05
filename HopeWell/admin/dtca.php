<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
?>


<form action ="dtca.php" method ="GET">

<h3>Pay Out For Cash Drugs/Items</h3>
<?php



if (isset($_GET['save_cancel'])){ 
   $id     = $_GET['id'];
   $desc   = $_GET['desc'];
$db_account = $_GET['db_account'];
   $account1= $_GET['old_account'];
   $ref_no  = $_GET['invoice'];

//-----------------------debit----------------------
$date =date('Y-m-d');
$ff ='X-'.$ref_no;
$patients_name =$desc.':'.$ref_no;

   $query5= "INSERT INTO gltransf VALUES('','$date','ACCOUNTS PAYABLES','$ff','RC','$patients_name','$account1','$username','CONTROL')";
   $result5 =mysql_query($query5);

//-----------------------credit---------------------

   $query5a= "INSERT INTO gltransf VALUES('','$date','$db_account','$ff','RC','$patients_name','-$account1','$username','CONTROL')";
   $result5a =mysql_query($query5a);

//-----------------------update suppliers tr file---\

$ce =$id-$account1;

   $query2= "UPDATE supplierstrfile SET balance ='$ce' WHERE doc_no ='$ref_no'";
   $result2 =mysql_query($query2);

  
}





if (isset($_GET['accounts'])){ 
   $id     = $_GET['accounts'];
   $query= "SELECT * FROM supplierstrfile where doc_no ='$id'";
   $SQL  = "SELECT * FROM supplierstrfile where doc_no ='$id'";
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
      $codes      = mysql_result($result,$i,"balance");  
      $patient    = mysql_result($result,$i,"account_name");   
      $account    = mysql_result($result,$i,"balance");
      $myid       = mysql_result($result,$i,"balance");  
      $invoice = mysql_result($result,$i,"doc_no");  
}




echo "<table width ='100%'>";
    echo "<tr><td width ='20' bgcolor ='black'><font color ='white'>Amount</td>";
    echo "<td align ='left'>"."<input type='text' id ='line' name='id' size='5' value ='$myid' readonly>" . "</td></tr>";

    echo "<tr><td width ='20' bgcolor ='black'><font color ='white'>Ref No</td>";
    echo "<td align ='left'>"."<input type='text' id ='line' name='invoice' size='5' value ='$invoice' readonly>" . "</td></tr>";

    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Type:</td>";
    echo "<td align ='left'>"."<input type='text' id ='desc' name='desc' size='30' value ='$patient'>" . "</td></tr>";
    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Amount:</td>";
    echo "<td align ='left'>"."<input type='text' id ='price' name='old_account' size='30' value ='$account'>" . "</td></tr>";

 echo"<tr><td width ='100' align ='left' border ='3'><b>Select  A/c:</b></td><td>";

echo"<select id='db_account' name='db_account'>";
$cdquery="SELECT * FROM `glaccountsf` WHERE type ='BANK' or branch ='BANK' order by account_Name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "SELECT * FROM `glaccountsf` WHERE type ='BANK' or branch ='BANK' order by account_Name";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_Name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td></tr>";


echo "</table>";

echo"<table><td width ='20'><input type='submit' name='save_cancel'  class='button' value='Save'></td></table>";
}
