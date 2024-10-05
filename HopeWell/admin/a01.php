
<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>example-des_decrypt - php mysql examples | w3resource</title>
</head>
<body>
<?php
echo "<h2>Decrypting the encrypt string 'mytext' :</h2>";
echo "<table border='1' style='border-collapse: collapse;border-color: silver;'>";
echo "<tr style='font-weight: bold;'>";
echo "<td width='100' align='center'>DES_DECRYPT(DES_ENCRYPT('mytext','mypassward'),'mypassward')</td>";
echo "</tr>";




$result = mysql_query("SELECT password DES_DECRYPT(DES_ENCRYPT('password','mypassward'),'mypassward')");
while($row=mysql_fetch_array($result))
{
echo "<tr>";
echo "<td align='center' width='200'>" . $row["DES_DECRYPT(DES_ENCRYPT('password','mypassward'),'mypassward')"] . "</td>";
echo "</tr>";
}
echo "</table>";
?>
</body>
</html>