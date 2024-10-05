<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM revenuef WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditrevenue.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Supplier</h4></center><hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['Name']; ?>" /><br>
<span>Cash Rate : </span><input type="text" style="width:265px; height:30px;" name="address" value="<?php echo $row['cash_rate']; ?>" /><br>
<span>Credit Rate : </span><input type="text" style="width:265px; height:30px;" name="cperson" value="<?php echo $row['credit_rate']; ?>" /><br>
<span>Gl Account: </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['gl_account']; ?>" /><br>
<span>Auto : </span><textarea style="width:265px; height:80px;" name="note"><?php echo $row['Auto']; ?></textarea><br>
<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>