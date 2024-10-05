<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecustomer.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Customer</h4></center>
<hr>
<div id="ac">
<span>First Name : </span><input type="text" style="width:265px; height:30px;" name="name" placeholder="First Name" Required/><br>
<span>Surname : </span><input type="text" style="width:265px; height:30px;" name="sname" placeholder="Surame" Required/><br>
<span>Last Name : </span><input type="text" style="width:265px; height:30px;" name="lname" placeholder="Last Name" Required/><br>
<span>Mobile: </span><input type="text" style="width:265px; height:30px;" name="mobile" placeholder="Mobile no" Required/><br>
<span>D.O.B : </span><input type="date" style="width:265px; height:30px;" name="dob" placeholder="Date of birth" Required/><br>


<span>Gender : </span>
<select name="gender"  style="width:265px; height:30px; margin-left:-5px;" >

	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM gender");
		$result->bindParam(':genderid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>Marital Status: </span><input type="text" style="width:265px; height:30px;" name="marital" placeholder="Marital Status"/><br>
<span>ID/Passport : </span><input type="text" style="width:265px; height:30px;" name="id" placeholder="ID/Passport"/><br>
<span>Occupation : </span><input type="text" style="width:265px; height:30px;" name="occupation" placeholder="Occupation"/><br>
<span>Email: </span><input type="text" style="width:265px; height:30px;" name="email" placeholder="Email"/><br>
<span>Address: </span><input type="text" style="width:265px; height:30px;" name="adress" placeholder="Address"/><br>
<span>Country: </span>
<select name="country"  style="width:265px; height:30px; margin-left:-5px;" >
<option>Select Country</option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM countries");
		$result->bindParam(':countryid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>County: </span>
<select name="county"  style="width:265px; height:30px; margin-left:-5px;" >
<option>Select County</option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM counties");
		$result->bindParam(':countyid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
	}
	?>
</select><br>
<span>Town: </span>
<select name="town"  style="width:265px; height:30px; margin-left:-5px;" >
<option>Select Town</option>
	<?php
	include('../connect.php');
	$result = $db->prepare("SELECT * FROM town");
		$result->bindParam(':townid', $res);
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
		<option><?php echo $row['name']; ?></option>
	<?php
	}
	?>
</select><br>

<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>