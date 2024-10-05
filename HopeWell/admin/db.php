<?php
$sql = mysql_connect("localhost","root","0710958791");
if(!$sql)
{
	echo "Connection Not Created";
}
//$con = mysql_select_db("graphs");
$con = mysql_select_db("ahmadiyya4");
if(!$sql)
{
	echo "Database Not Connected";
}

?>