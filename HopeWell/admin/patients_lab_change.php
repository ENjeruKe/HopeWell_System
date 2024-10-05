<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>


<form action ="patients_lab_change.php" method ="GET">

<h3>Laboratory Amendments</h3>
<?php

if (isset($_GET['save_cancel'])){ 
   $date = $_GET['date'];
   $id     = $_GET['line'];
   $desc   = $_GET['desc'];
   $price  = $_GET['price'];
   $query= "UPDATE auto_transact set credit_rate ='$price',qty=0 where id ='$id'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());   
}

if (isset($_GET['accounts33'])){ 
   $price = $_GET['account3'];
   $id     = $_GET['accountss'];
   $name   = $_GET['accountss'];
   $name   = $name.'_name';
   $id_no =  $_SESSION['id_no'];
   $adm_no=  $_SESSION['adm_no'];
   $prices = $_GET['55name'];
}


$sql="SELECT * FROM  auto_transact WHERE id = '$id'";
$result = mysql_query($sql);
$found ='No';
echo "<table width ='100%'>";
while($row = mysql_fetch_array($result)) {
    $price =  $row['credit_rate'];
    $line=  $row['id'];
    $id = $line.'name';
    $date = $row['date'];
    $description = $row['description'];

    echo "<tr><td width ='20' bgcolor ='black'><font color ='white'>ID</td>";
    echo "<td align ='left'>"."<input type='text' id ='line' name='line' size='5' value ='$line' readonly>" . "</td></tr>";
    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Date</td>";
    echo "<td align ='left'>"."<input type='text' id ='date' name='date' size='5' value ='$date'>" . "</td></tr>";
    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Description</td>";
    echo "<td align ='left'>"."<input type='text' id ='desc' name='desc' size='30' value ='$description'>" . "</td></tr>";
    echo "<tr><td width ='50' bgcolor ='black'><font color ='white'>Amount</td>";
    echo "<td align ='left'>"."<input type='text' id ='price' name='price' size='30' value ='$price'>" . "</td></tr>";
}
echo "</table>";
echo"<table><td width ='20'><input type='submit' name='save_cancel'  class='button' value='Save'></td></table>";