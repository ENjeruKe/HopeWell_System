<?php
session_start();
 require('open_database.php');

?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 0px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>



<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    txt2 = txt * no;
    document.getElementById("result_three").value = txt2;
}
</script>



<?php
$q = intval($_GET['q']); 
$q2 = $_GET['q'];

//$con = mysqli_connect('localhost','hmisglobal','jamboafrica','hmisglob_griddemo');
//if (!$con) {
//    die('Could not connect: ' . mysqli_error($con));
//}

//mysqli_select_db($con,"hmisglob_griddemo");
$sql="SELECT * FROM glaccountsf WHERE type ='EXPENSE' and account_name = '".$q2."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
   $location =$row['location'];
   $description = $row['account_name'];
   $item_price   = 0;
   //$row['sell_price'];
   $search_item   = $row['account_name'];
   $account_type = $row['type'];
}
$_SESSION['account_type'] = $account_type;
echo"<form action ='petty_cash.php' method ='GET'>";

 echo"<table border = '0' width ='100%'><td width ='30%'><input type='text' id ='s_desc_three' name='s_desc_three' size ='25' value ='$q2'</td><td width ='50'></td>";
 //echo"<td><input type='text' id ='no_three' name='no_three' size='10' onchange='function3()'></td>";
 //echo"<td width ='25%'><input type='text' id ='narrations' name='narrations' size='30' value='$location'></td>";








         echo"<td width ='25%' align ='left' size='20'>";
         echo"<select id='narrationsx' name='narrationsx'>";
         $cdquery="SELECT account_name FROM glaccounts_sub WHERE branch='$q2'";
         $cdresult=mysql_query($cdquery);
         $query3 = "select * FROM glaccounts_sub WHERE branch='$q2'";
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         while ($cdrow=mysql_fetch_array($cdresult)) {
            $cdTitle=$cdrow["account_name"];     
            echo "<option>$cdTitle</option>";            
         }
         echo"</select>";
         echo"</td>"; 




 echo"<td width ='15%'><input type='text' id ='narrations' name='narrations' size='5'></td>";

 echo"<td width ='15%'><input type='text' id ='result_three' name='result_three' size='5'></td>";

//echo"<td width ='1' align ='right'></td>";

 echo"<td align ='left' width ='5%'><input type='submit' name='add_next'  class='button' value='Add '></td></table></form>";

 

//echo "</table>";
//mysqli_close($con);
?>
