<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM stocklab WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditsto.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Tools</h4></center><hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Location : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['location']; ?>" /><br>
<span>Description : </span><input type="text" style="width:265px; height:30px;" name="address" value="<?php echo $row['description']; ?>" /><br>
<span>Sell Price : </span><input type="text" style="width:265px; height:30px;" name="cperson" value="<?php echo $row['sell_price']; ?>" /><br>
<span>Qty: </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['qty']; ?>" /><br>
<span>Units: </span><input type="text" style="width:265px; height:30px;" name="con" value="<?php echo $row['units']; ?>" /><br>

<span>Search Name: </span><input type="text" style="width:265px; height:30px;" name="cont" value="<?php echo $row['search_name']; ?>" /><br>
<span>Cost Price: </span><input type="text" style="width:265px; height:30px;" name="conta" value="<?php echo $row['cost_price']; ?>" /><br>
<span>Re-order: </span><input type="text" style="width:265px; height:30px;" name="coct" value="<?php echo $row['reoder']; ?>" /><br>

<span>Maximum: </span><input type="text" style="width:265px; height:30px;" name="ctact" value="<?php echo $row['maximum']; ?>" /><br>



<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>