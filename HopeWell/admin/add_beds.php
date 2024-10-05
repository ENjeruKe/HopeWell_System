<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="save_beds.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Add Beds</h4></center>
<hr>
<div id="ac">
<span>Bed No : </span><input type="text" style="width:265px; height:30px;" name="name" required/><br>

<span>Rate : </span><input type="text" style="width:265px; height:30px;" name="address" /><br>

<!--span>Credit Rate : </span><input type="text" style="width:265px; height:30px;" name="contact" /><br-->

<!--span>Department. : </span><input type="text" style="width:265px; height:30px;" name="cperson" /><br-->
<!--span>Department : </span>
<select name="cperson" required>
<option value=''></option>
<option value='Laboratory Services'>Laboratory Services</option>
<option value='CONSULTATION INCOME'>CONSULTATION INCOME</option>
<option value='Dental Income'>Dental Income</option>
<option value='Xray Income'>Xray Income</option>
<option value='Nursing Income'>Nursing Income</option>
<option value='PACKAGE'>PACKAGE</option>
<option value='AMBULANCE INCOME'>AMBULANCE INCOME</option>
<option value='Procedure Income'>Procedure Income</option>
<option value='OPTICAL INCOME'>Optical Income</option>
<option value='MEDICAL CAMP'>MEDICAL CAMP</option></select><br-->






<!--span>Auto : </span><textarea style="width:265px; height:80px;" name="note" /></textarea><br-->

<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>