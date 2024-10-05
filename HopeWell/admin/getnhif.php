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



<script>
function showtotal() {
    var days = document.getElementById('days').value;   
    var txt = document.getElementById('dis_date').value;
    //var option = no.options[no.selectedIndex].text;
    txt2 = txt * days;
alert(txt2); 

    document.getElementById("amount").value = txt2;
}
</script>


<?php
$q = intval($_GET['q']); 
$q2 = $_GET['q'];

//$con = mysqli_connect('localhost','hmisglobal','jamboafrica','hmisglob_griddemo');
//if (!$con) {
//    die('Could not connect: ' . mysqli_error($con));
//}

$rebate = 0;
//mysqli_select_db($con,"hmisglob_griddemo");
$sql="SELECT * FROM companyfile";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $rebate = $row['nhif_rebate'];
}


//mysqli_select_db($con,"hmisglob_griddemo");
$sql="SELECT * FROM appointmentf WHERE name = '".$q2."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
   $description   = $row['name'];
   $item_price    = $row['adm_no'];
   $adm_no        = $row['adm_no'];
   $search_item   = $row['name'];
   $adm_date      = $row['adm_date'];
   $dis_date      = $row['dis_date'];

}
if ($dis_date < $adm_date){
   $dis_date =date('y-m-d');
}
 
//Convert them to timestamps.
$date1Timestamp = strtotime($adm_date);
$date2Timestamp = strtotime($dis_date);

 
//Calculate the difference.
$difference = $date2Timestamp - $date1Timestamp;
 
$days = ($difference/86400);
$days = round($days);
$amount = $rebate*$days;



//echo"<form action ='nhif_credit.php' method ='GET'>";
echo"<table border = '0'>";

echo"<tr><td width ='50' align ='right'><b>Adm No: </b></td><td><input type='text' name='adm_no' size='20' value='$adm_no' readonly></td></tr>";
echo"<tr><td width ='50' align ='right'><b>NHIF Reg. No: </b></td><td><input type='text' name='nhif_reg' size='20' ></td></tr>";

echo"<tr><td width ='50' align ='right'><b>Admitted-Date: </b></td><td><input type='text' name='adm_date' size='20' value='$adm_date'></td></tr>";
echo"<tr><td width ='50' align ='right'><b>Days Admited: </b></td><td><input type='text' id='days' name='days' size='20' value='$days'></td></tr>";
echo"<tr><td width ='50' align ='right'><b>NHIF Rate : </b></td><td><input type='text' name='dis_date' id='dis_date' size='20' value='$rebate' onchange='showtotal()'></td></tr>";


echo"<tr><td width ='50' align ='right'><b>Total Credit: </b></td><td><input type='text' id ='amount' name='amount' size='20' value ='$amount' readonly></td></tr>";






$_SESSION['adm_no']=$adm_no;  
$_SESSION['adm_date']=$adm_date;  
$_SESSION['dis_date']=  $dis_date ;
$_SESSION['days'] =  $days;     
$_SESSION['nhif_reg'] =  $nhif_reg ;
$_SESSION['amount'] =  $amount   ;
$_SESSION['ref_no']=  $ref_nos  ;


 //echo"<td align ='left'><input type='submit' name='billing'  class='button' value='Add '></td></table>";

 
//echo"<table width ='400' border='0' border color ='black'><td align ='center'><input type='submit' name='billing'  class='button' value='Save '></td></table></form>";


//echo "</table>";
//mysqli_close($con);
?>
</body>
</html>