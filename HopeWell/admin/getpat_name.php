<?php
session_start();
 require('open_database.php');

?>
<!DOCTYPE html>
<html>
<head>
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

//$con = mysqli_connect('localhost','root','0710958791','wama');
//if (!$con) {
//    die('Could not connect: ' . mysqli_error($con));
//}

$rebate = 0;
//mysqli_select_db($con,"wama");
$sql="SELECT * FROM companyfile";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $rebate = $row['nhif_rebate'];
}


//mysqli_select_db($con,"wama");
$sql="SELECT * FROM appointmentf WHERE adm_no = '".$q2."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
   $description   = $row['name'];
   $aa   = $row['name'];
   $item_price    = $row['adm_no'];
   $adm_no        = $row['adm_no'];
   $search_item   = $row['name'];
   $adm_date      = $row['adm_date'];
   $dis_date      = $row['disch_date'];


}
if ($description == ''){
    $description ="Patient NOT on file............";    
} 
$_SESSION['name']=  $description  ;
$_SESSION['adm_no']=  $adm_no;
//echo $description;
//echo"<table border = '0'>";
//echo"<tr><td width ='90' align ='right'></td><td>
echo"<input type='text' name='patient2' size='40' value='$description' >";
//</td></tr></table>";
//}
?>
</body>
</html>