<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
$username = $_SESSION['username'];
?>




<?php
echo"<br><br><br><br><table width ='100%' align ='center'><td><font color ='green'><h3>Files updated...., kindly close this window and proceed. This utility function was requested by" .$username;
echo"</font></td></table></h3>";
?>

