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



//$sql="SELECT * FROM revenuef WHERE name = '".$q2."'";
$sql="SELECT * FROM revenuef WHERE name = '$q2'";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $description = $row['name'];
   $item_price   = $row['credit_rate'];
   $search_item   = $row['name'];
}
$description = $q2;

echo"<form action ='debit_notes.php' method ='GET'>";
 echo"<table border = '0'><tr><td>Price:<input type='text' id ='amount' name='amount' size='10' value ='$item_price' readonly></td></tr>";
echo"<tr><td width ='400'>Qty:<input type='text' name='qty' size ='2' required>
</td></tr></table></form>";
?>
</body>
</html>