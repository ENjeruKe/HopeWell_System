<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>

<!DOCTYPE html>
<html>
<head>
</style>
</head>
<body>


<?php
$q = intval($_GET['q']); 
$q2 = $_GET['q'];
//echo $q2;
$_SESSION['status'] = $q2;
 
?>
</body>
</html>