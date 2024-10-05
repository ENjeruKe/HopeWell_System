<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$store_select = $_SESSION['store_select'];
?>

<!DOCTYPE html>
<html>
<head>
<?php
$q = intval($_GET['q']); 
$q2 = $_GET['q'];
$_SESSION['store_select'] = $q2;
?>
</body>
</html>