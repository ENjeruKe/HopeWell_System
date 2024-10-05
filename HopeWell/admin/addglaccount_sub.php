<?php
  require('open_database.php');
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveglaccount_sub.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add G/L Account</h4></center>
<hr>
<div id="ac">

<?php

echo"<span>A/c group : </span>";
echo"<select id='address' name='address' >";        
$cdquery="SELECT account_Name,type FROM glaccountsf where type<>'BANK' and type<>'CONTROL' and type<>'INCOME' ORDER BY account_Name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["account_Name"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select><br>";

?>

<span>A/c Name : </span><input type="text" style="width:265px; height:30px;" name="name" required/><br>
<!--span>Comment : </span><input type="text" style="width:265px; height:30px;" name="address" /><br-->
<span>Type : </span><input type="text" style="width:265px; height:30px;" name="contact" value='EXPENSE' readonly/><br>
<span>OS Balance. : </span><input type="text" style="width:265px; height:30px;" name="cperson" /><br>
<!--span>Note : </span><textarea style="width:265px; height:80px;" name="note" /></textarea--><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>