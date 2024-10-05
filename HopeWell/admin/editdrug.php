<?php
  require('open_database.php');
  $username =$_SESSION['username'];
?>
<?php
	include('includes/connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM stockfile WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditdrug.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Drug</h4></center><hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Location : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['location']; ?>" readonly/><br>
<span>Description : </span><input type="text" style="width:265px; height:30px;" name="address" value="<?php echo $row['description']; ?>" /><br>
<span>Sell Price : </span><input type="text" style="width:265px; height:30px;" name="cperson" value="<?php echo $row['sell_price']; ?>" /><br>
<!--font color ='red'>***please use stock take to adjust quantity of your stocks***</font-->
<?php
$locationz =$row['location'];
//if ($locationz=='PHARMACY'){
if ($username=='admin' or $username=='josephmaina'){
?>
<span>Qty: </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['qty']; ?>" /><br>
<?php
}else{
?>
<span>Qty: </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['qty']; ?>" / readonly><br>
<?php
}
?>
<span>NHIF Price: </span><input type="text" style="width:265px; height:30px;" name="con" value="<?php echo $row['credit_price']; ?>" /><br>

<span>Search Name: </span><input type="text" style="width:265px; height:30px;" name="cont" value="<?php echo $row['search_name']; ?>" /><br>
<span>Cost Price: </span><input type="text" style="width:265px; height:30px;" name="conta" value="<?php echo $row['cost_price']; ?>" /><br>
<span>Re-order: </span><input type="text" style="width:265px; height:30px;" name="coct" value="<?php echo $row['reoder']; ?>" /><br>


<?php

echo"<span>Category : </span>";
echo"<select id='ctact' name='ctact' required>";        
$cdquery="SELECT description FROM st_categoryf ORDER BY description ";
$cdresult=mysql_query($cdquery);            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["description"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select><br>";

?>
<!--span>Maximum: </span><input type="text" style="width:265px; height:30px;" name="ctact" value="<?php echo $row['maximum']; ?>" /><br-->



<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>