<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM systemfile2 WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditusers.php" method="POST">
<center><h4><i class="icon-edit icon-large"></i> Edit Users</h4></center><hr>
<div id="ac">
<input type="hidden" name="memi" value="<?php echo $id; ?>" />
<span>Username : </span><input type="text" style="width:165px; height:30px;" name="a1"  value="<?php echo $row['username']; ?>" required/><br>
<span>Password : </span><input type="text" style="width:165px; height:30px;" name="a2"  value="<?php echo $row['password']; ?>"  required/><br>
<span>Name : </span><input type="text" style="width:165px; height:30px;" name="a45"  value="<?php echo $row['name']; ?>" required/><br>

<span>Department : </span><input type="text" style="width:165px; height:30px;" name="a3"  value="<?php echo $row['account']; ?>"  required/><br>

<span>Telephone : </span><input type="text" style="width:165px; height:30px;" name="a4"  value="<?php echo $row['access_all']; ?>"  required/><br>

<span>Reception : </span><input type="text" style="width:165px; height:30px;" name="a5"  value="<?php echo $row['rec']; ?>"  ><br>

<span>Cashier : </span><input type="text" style="width:165px; height:30px;" name="a6"  value="<?php echo $row['cas']; ?>"  ><br>

<span>Vitals : </span><input type="text" style="width:165px; height:30px;" name="a7"  value="<?php echo $row['vit']; ?>"  ><br>

<span>Medical : </span><input type="text" style="width:165px; height:30px;" name="a8"  value="<?php echo $row['med']; ?>"  ><br>

<span>Investigation : </span><input type="text" style="width:165px; height:30px;" name="a9"   value="<?php echo $row['inve']; ?>" ><br>

<span>Pharmacy : </span><input type="text" style="width:165px; height:30px;" name="a10"  value="<?php echo $row['pha']; ?>"  ><br>

<span>Reports : </span><input type="text" style="width:165px; height:30px;" name="a11"  value="<?php echo $row['repo']; ?>"  ><br>

<span>Accounts : </span><input type="text" style="width:165px; height:30px;" name="a12"  value="<?php echo $row['acc']; ?>"  ><br>

<span>Stocks : </span><input type="text" style="width:165px; height:30px;" name="a13"  value="<?php echo $row['stk']; ?>"  ><br>

<span>Settings : </span><input type="text" style="width:165px; height:30px;" name="a14"  value="<?php echo $row['sets']; ?>"  ><br>

<font color='blue'><b>Medical:</b><br>

<span>Gen Doctor: </span><input type="text" style="width:165px; height:30px;" name="a15"  value="<?php echo $row['doc']; ?>"  ><br>

<span>ANC dept : </span><input type="text" style="width:165px; height:30px;" name="a16"  value="<?php echo $row['anc']; ?>"  ><br>

<span>Nutri Dept : </span><input type="text" style="width:165px; height:30px;" name="a17"  value="<?php echo $row['nut']; ?>"  ><br>

<span>WBC Dept : </span><input type="text" style="width:165px; height:30px;" name="a18"  value="<?php echo $row['wbc']; ?>"  ><br>

<span>Dental Dept : </span><input type="text" style="width:165px; height:30px;" name="a19"  value="<?php echo $row['dent']; ?>"  ><br>

<span>Eye Dept : </span><input type="text" style="width:165px; height:30px;" name="a20"  value="<?php echo $row['adms']; ?>"  ></font><br>

<font color='purple'><b>Investigations / Findings</b><br>


<span>Laboratory : </span><input type="text" style="width:165px; height:30px;" name="a21"  value="<?php echo $row['lab']; ?>"  ><br>

<span>Radiology : </span><input type="text" style="width:165px; height:30px;" name="a22"  value="<?php echo $row['rad']; ?>"  ><br>

<span>Thearter : </span><input type="text" style="width:165px; height:30px;" name="a23"  value="<?php echo $row['theat']; ?>"  ></font><br>

<font color='blue'><b>Account Department</b><br>

<span>Statements : </span><input type="text" style="width:165px; height:30px;" name="a24"  value="<?php echo $row['stmt']; ?>"  ><br>

<span>Payments : </span><input type="text" style="width:165px; height:30px;" name="a25"  value="<?php echo $row['paym']; ?>"  ><br>

<span>Invoices : </span><input type="text" style="width:165px; height:30px;" name="a26"  value="<?php echo $row['invo']; ?>"  ><br>

<span>G Ledger : </span><input type="text" style="width:165px; height:30px;" name="a27"  value="<?php echo $row['gl']; ?>"  ><br>

<span>Balances : </span><input type="text" style="width:165px; height:30px;" name="a28"  value="<?php echo $row['blnc']; ?>"  ><br>

<span>In Patient : </span><input type="text" style="width:165px; height:30px;" name="a29"   value="<?php echo $row['in_p']; ?>" ></font><br>

<font color='orange'><b>Stocks Managment</b><br>

<span>Registration : </span><input type="text" style="width:165px; height:30px;" name="a30"  value="<?php echo $row['reg_stk']; ?>"  ><br>

<span>Reports : </span><input type="text" style="width:165px; height:30px;" name="a31"   value="<?php echo $row['repo_stk']; ?>" ><br>

<span>Transfers : </span><input type="text" style="width:165px; height:30px;" name="a32"  value="<?php echo $row['trans_stk']; ?>"  ><br>

<span>Counts : </span><input type="text" style="width:165px; height:30px;" name="a33"   value="<?php echo $row['co_stk']; ?>" ><br>

<span>Suppliers : </span><input type="text" style="width:165px; height:30px;" name="a34"  value="<?php echo $row['rec_stk']; ?>"  ><br>

<span>Statements : </span><input type="text" style="width:165px; height:30px;" name="a35"  value="<?php echo $row['pds_stk']; ?>"  ></font><br>

<font color='violet'><b>System / Hospital Settings</b><br>

<span>User Rights : </span><input type="text" style="width:165px; height:30px;" name="a36"  value="<?php echo $row['users']; ?>"  ><br>

<span>Chart of Acc: </span><input type="text" style="width:165px; height:30px;" name="a37"  value="<?php echo $row['charts']; ?>"  ><br>

<span>Receivables : </span><input type="text" style="width:165px; height:30px;" name="a38"  value="<?php echo $row['receiv']; ?>"  ><br>

<span>Payables : </span><input type="text" style="width:165px; height:30px;" name="a39"  value="<?php echo $row['payables']; ?>"  ><br>

<span>Doctors : </span><input type="text" style="width:165px; height:30px;" name="a40"  value="<?php echo $row['doc_reg']; ?>"  ><br>

<span>Revenue : </span><input type="text" style="width:165px; height:30px;" name="a41"  value="<?php echo $row['rev_reg']; ?>"  ><br>

<span>Diagnosis : </span><input type="text" style="width:165px; height:30px;" name="a42"   value="<?php echo $row['diag_reg']; ?>" ><br>

<span>Signs : </span><input type="text" style="width:165px; height:30px;" name="a43"  value="<?php echo $row['signs_reg']; ?>" ><br>

<span>Editing : </span><input type="text" style="width:165px; height:30px;" name="a44"  value="<?php echo $row['edit']; ?>" ><br>

������
<div style="float:right; margin-right:0px;">

<button class="btn btn-success btn-block btn-large" style="width:167px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>
