<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="save_users.php" method="POST">
<center><h4><i class="icon-plus-sign icon-large"></i> Add  Users</h4></center>
<hr>
<div id="ac">
<span>Username : </span><input type="text" style="width:165px; height:30px;" name="a1" required/><br>

<span>Password : </span><input type="text" style="width:165px; height:30px;" name="a2" required/><br>

<span>Name : </span><input type="text" style="width:165px; height:30px;" name="a45" required/><br>

<!--span>Department : </span><input type="text" style="width:165px; height:30px;" name="a3" required/><br-->

<span>Department : </span>
<select name="a3" required>
<option value=''></option>
<option value='Administrator'>Administrator</option>
<option value='Reception'>Reception</option>
<!--option value='Doctor'>Doctor</option-->
<option value='Cashier'>Cashier</option>
<option value='Doctor'>Doctor</option>
<option value='Pharmacy'>Pharmacy</option>
<option value='Nurses'>Nurses</option>
<option value='Laboratory'>Laboratory</option>
<!--option value='Doctor'>Doctor</option-->
</select><br>




<span>Telephone : </span><input type="text" style="width:165px; height:30px;" name="a4" required/><br>

<span>Reception : </span><input type="text" style="width:165px; height:30px;" name="a5" ><br>

<span>Cashier : </span><input type="text" style="width:165px; height:30px;" name="a6" ><br>

<span>Vitals : </span><input type="text" style="width:165px; height:30px;" name="a7" ><br>

<span>Medical : </span><input type="text" style="width:165px; height:30px;" name="a8" ><br>

<span>Investigation : </span><input type="text" style="width:165px; height:30px;" name="a9" ><br>

<span>Pharmacy : </span><input type="text" style="width:165px; height:30px;" name="a10" ><br>

<span>Reports : </span><input type="text" style="width:165px; height:30px;" name="a11" ><br>

<span>Accounts : </span><input type="text" style="width:165px; height:30px;" name="a12" ><br>

<span>Stocks : </span><input type="text" style="width:165px; height:30px;" name="a13" ><br>

<span>Settings : </span><input type="text" style="width:165px; height:30px;" name="a14" ><br>

<font color='blue'><u><b>Medical:</b></u><br>

<span>Gen Doctor: </span><input type="text" style="width:165px; height:30px;" name="a15" ><br>

<span>ANC dept : </span><input type="text" style="width:165px; height:30px;" name="a16" ><br>

<span>Nutri Dept : </span><input type="text" style="width:165px; height:30px;" name="a17" ><br>

<span>WBC Dept : </span><input type="text" style="width:165px; height:30px;" name="a18" ><br>

<span>Dental Dept : </span><input type="text" style="width:165px; height:30px;" name="a19" ><br>

<span>Eye Dept : </span><input type="text" style="width:165px; height:30px;" name="a20" ></font><br>

<font color='purple'><u><b>Investigations / Findings</b></u><br>


<span>Laboratory : </span><input type="text" style="width:165px; height:30px;" name="a21" ><br>

<span>Radiology : </span><input type="text" style="width:165px; height:30px;" name="a22" ><br>

<span>Thearter : </span><input type="text" style="width:165px; height:30px;" name="a23" ></font><br>

<font color='blue'><u><b>Account Department</b></u><br>

<span>Statements : </span><input type="text" style="width:165px; height:30px;" name="a24" ><br>

<span>Payments : </span><input type="text" style="width:165px; height:30px;" name="a25" ><br>

<span>Invoices : </span><input type="text" style="width:165px; height:30px;" name="a26" ><br>

<span>G Ledger : </span><input type="text" style="width:165px; height:30px;" name="a27" ><br>

<span>Balances : </span><input type="text" style="width:165px; height:30px;" name="a28" ><br>

<span>In Patient : </span><input type="text" style="width:165px; height:30px;" name="a29" ></font><br>

<font color='orange'><u><b>Stocks Managment</b></u><br>

<span>Registration : </span><input type="text" style="width:165px; height:30px;" name="a30" ><br>

<span>Reports : </span><input type="text" style="width:165px; height:30px;" name="a31" ><br>

<span>Transfers : </span><input type="text" style="width:165px; height:30px;" name="a32" ><br>

<span>Counts : </span><input type="text" style="width:165px; height:30px;" name="a33" ><br>

<span>Suppliers : </span><input type="text" style="width:165px; height:30px;" name="a34" ><br>

<span>Statements : </span><input type="text" style="width:165px; height:30px;" name="a35" ></font><br>

<font color='violet'><u><b>System / Hospital Settings</b></u><br>

<span>User Rights : </span><input type="text" style="width:165px; height:30px;" name="a36" ><br>

<span>Chart of Acc: </span><input type="text" style="width:165px; height:30px;" name="a37" ><br>

<span>Receivables : </span><input type="text" style="width:165px; height:30px;" name="a38" ><br>

<span>Payables : </span><input type="text" style="width:165px; height:30px;" name="a39" ><br>

<span>Doctors : </span><input type="text" style="width:165px; height:30px;" name="a40" ><br>

<span>Revenue : </span><input type="text" style="width:165px; height:30px;" name="a41" ><br>

<span>Diagnosis : </span><input type="text" style="width:165px; height:30px;" name="a42" ><br>

<span>Signs : </span><input type="text" style="width:165px; height:30px;" name="a43"><br>

<span>Actions : </span><input type="text" style="width:165px; height:30px;" name="a44"><br>


<div style="float:right; margin-right:10px;">
<button class="btn btn-success btn-block btn-large" style="width:167px;"><i class="icon icon-save icon-large"></i> Save</button>
</div>
</div>
</form>