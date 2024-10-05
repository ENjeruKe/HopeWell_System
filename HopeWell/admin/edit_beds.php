<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM allbedsfile WHERE client_id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveedit_beds.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Edit Beds</h4></center><hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Bed No : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $row['bed_no']; ?>" /><br>
<span>Rate : </span><input type="text" style="width:265px; height:30px;" name="address" value="<?php echo $row['Rate']; ?>" /><br>
<span>Patiens Name : </span><input type="text" style="width:265px; height:30px;" name="cperson" value="<?php echo $row['Patients_Name']; ?>" /><br>
<span>File No: </span><input type="text" style="width:265px; height:30px;" name="contact" value="<?php echo $row['adm_no']; ?>" /><br>

<span>Visit No: </span><input type="text" style="width:265px; height:30px;" name="note" value="<?php echo $row['visit_no']; ?>" /><br>



<div style="float:right; margin-right:10px;">

<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>