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

//$sql="SELECT * FROM st_locationf WHERE description = '".$q2."'";
//$result = mysqli_query($con,$sql);
//while($row = mysqli_fetch_array($result)) {
   //$cdlocation = $row['description'];
   $_SESSION['cdlocation'] =$q2;
   $cdlocation =$_SESSION['cdlocation'];
        echo"<input type='text' id ='s_desc_three' size ='45' name='s_desc_three' value 
        ='$cdlocation'>";
//}

?>
</body>
</html>