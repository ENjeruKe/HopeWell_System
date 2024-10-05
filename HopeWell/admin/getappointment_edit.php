<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
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
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
if (isset($_GET['account3'])){ 
   $id    = $_GET['account3'];
   $adm_no =$_GET['accountss'];
   $q = $_GET['accountss'];
   $sql="DELETE FROM htransf WHERE id ='$id'";
   $result = mysql_query($sql);
}else{
   $q = intval($_GET['q']);
   $q = $_GET['q'];
}
$con = mysqli_connect('localhost','root','0710958791','wama');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
echo"File No."."<a href=javascript:popcontact('issuetopatients.php?accounts=$q&accounts3=$q&accounts4=$q')>".$q."</a>";

mysqli_select_db($con,"wama");




$sql="SELECT * FROM htransf WHERE adm_no = '".$q."'";
$result = mysqli_query($con,$sql);
$found ='No';
echo "<table>
<tr>
<th bgcolor ='black'><font color ='white'>ID</th>
<th bgcolor ='black'><font color ='white'>File Number</th>
<th bgcolor ='black'><font color ='white'>Date</th>
<th bgcolor ='black'><font color ='white'>Service</th>
<th bgcolor ='black'><font color ='white'>Ref No.</th>
<th bgcolor ='black'><font color ='white'>Type</th>
<th bgcolor ='black'><font color ='white'>Amount</th>
<th bgcolor ='black'><font color ='white'>Action</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    $found ='Yes';
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['adm_no'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['service'] . "</td>";
    echo "<td>" . $row['doc_no'] . "</td>";
    echo "<td>" . $row['type'] . "</td>";
    echo "<td>" . $row['amount'] . "</td>";

   $aa = $row['date'];
   $bb = $row['adm_no'];
   $bp = $row['id'];
   echo "<td align ='right'>" ."<a href='getappointment_edit.php?accountss=$bb&accounts33=$bp&account3=$bp')>"."Delete"."</a>" . "</td>";
    //echo "<td>" . $row['pay_account']. "</td>";
    echo "</tr>";
}
echo "</table>";
//mysqli_close($con);
if ($found=='No'){
   echo'<br><br><b>Invoice NOT found, kindly check if it was finalised....<br><b>';
   echo"<a href ='posts_invoice.php'><h2>Click here to go Back for another invoice</h2></a>";
   die();
}
?>
<br>
<!--Send SMS: 
<br><br>
<textarea name="comment" form="usrform" rows="10" cols="145">Enter text here...</textarea-->
</body>
</html>