<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM diseasefile WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditdiag.php" method="POST">
<center><h4><i class="icon-edit icon-large"></i> Edit Supplier</h4></center><hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['name']; ?>" /><br>
<span>Drug Used : </span><input type="text" style="width:265px; height:30px;" name="address" value="<?php echo $row['drugs_used']; ?>" /><br>
<!--span>Address : </span><input type="text" style="width:265px; height:30px;" name="cperson" value="<?php echo $row['Address']; ?>" /><br>
<span>Os Balance.: </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['os_balance']; ?>" /><br>
<span>Contact : </span><textarea style="width:265px; height:80px;" name="note"><?php echo $row['contact']; ?></textarea><br-->
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>