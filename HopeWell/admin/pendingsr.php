<?php
   include 'includes/session.php';
  include 'includes/conn.php';
date_default_timezone_set("Africa/Nairobi"); 
ini_set('date.timezone','Africa/Nairobi');
//error_reporting(E_ERROR);
?>
<body>

<!--form action="" method="post">

  <input name="search" type="search" autofocus><input type="submit" name="button">

</form-->
<br>
<table width '100%'; class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="9%"> Adm No</th>
			<th width="15%"> Name</th>
			<th width="10%"> Phone No</th>
			<th width="9%"> App  Date</th>
			<th width="13%"> Status </th>
			<th width="13%"> Payer </th>
                <th width="10%"> Sex </th>
			<th width="10%"> Balance </th>
		</tr>
	</thead>

<!--table>

  <tr><td width ="100"><b>Adm No</td><td></td><td width ="200"><b>Name</td><td width ="100"><b>Phone No</td><td></td><td width ="100"><b>App  Date</td><td width ="100"><b>Status</td><td></td><td width ="100"><b>Payer</td><td width ="100"><b>Sex</td><td></td><td width ="100"><b>Balance</td></tr-->

<?php

$con=mysql_connect('localhost', 'root', '0710958791');
$db=mysql_select_db('test');
$date = date("y-m-d");

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("select * from medicalfile where name like '%{$search}%'");

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
       echo "<tr><td>".$row['adm_no']."</td><td>".$row['name']."</td><td>".$row['telephone']."</td><td>".$row['date']."</td><td>".$row['status']."</td><td>".$row['payer']."</td><td>".$row['sex']."</td><td>".$row['image_id']."</td></tr>";
  }
}else{
    echo "No employee Found<br><br>";
  }

}else{                          //while not in use of search  returns all the values
  $query=mysql_query("select * from medicalfile where date ='$date'  AND name <>''");

  while ($row = mysql_fetch_array($query)) {
    echo "<tr><td>".$row['adm_no']."</td><td>".$row['name']."</td><td>".$row['telephone']."</td><td>".$row['date']."</td><td>".$row['status']."</td><td>".$row['payer']."</td><td>".$row['sex']."</td><td>".$row['image_id']."</td></tr>";
  }
}

mysql_close();
?>
