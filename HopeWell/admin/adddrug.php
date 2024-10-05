<?php
  require('open_database.php');
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savedrugs.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Drug</h4></center>
<hr>
<div id="ac">

<?php

echo"<span>Location : </span>";
echo"<select id='name' name='name' >";        
$cdquery="SELECT description FROM st_locationf ORDER BY description ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["description"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select><br>";

?>



<!--span>Location : </span><input type="text" style="width:265px; height:30px;" name="name" required/><br-->

<!--span>Location : </span>
<select name="location" required>
<option value=''></option>
<option value='PHARMACY'>PHARMACY</option>
<option value='MAIN STORE'>MAIN STORE</option></select><br-->


<span>Description : </span><input type="text" style="width:265px; height:30px;" name="name2" required/><br>
<span>Cash price : </span><input type="text" style="width:265px; height:30px;" name="address" required/><br>

<!--span>Qty : </span><input type="text" style="width:265px; height:30px;" name="contact" required/><br-->

<span>NHIF Price : </span><input type="text" style="width:265px; height:30px;" name="cperson" /><br>
<span>Search Name : </span><input type="text" style="width:265px; height:30px;" name="name6" required/><br>
<span>Cost Price : </span><input type="text" style="width:265px; height:30px;" name="name3" required/><br>
<span>Re-order : </span><input type="text" style="width:265px; height:30px;" name="name4" /><br>

<?php

echo"<span>Category : </span>";
echo"<select id='name5' name='name5' required>";        
$cdquery="SELECT description FROM st_categoryf ORDER BY description ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["description"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select><br>";

?>
<!--span>Category : </span><input type="text" style="width:265px; height:30px;" name="name5" /--><br>
<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>