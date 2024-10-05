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




<?php
$q = intval($_GET['q']); 
$q2 = $_GET['q'];

echo $q2;

$sql="SELECT * FROM stockfile WHERE search_name = '".$q2."' ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
   $qty         = $row['qty'];
}
echo 'Level:'.$qty;
?>
</body>
</html>