<head>
 <link href="css/bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>



 <script language="javascript" type="text/javascript">
/* Visit http://www.yaldex.com/ for full source code
and get more free JavaScript, CSS and DHTML scripts! */
<!-- Begin
var timerID = null;
var timerRunning = false;
function stopclock (){
if(timerRunning)
clearTimeout(timerID);
timerRunning = false;
}
function showtime () {
var now = new Date();
var hours = now.getHours();
var minutes = now.getMinutes();
var seconds = now.getSeconds()
var timeValue = "" + ((hours >12) ? hours -12 :hours)
if (timeValue == "0") timeValue = 12;
timeValue += ((minutes < 10) ? ":0" : ":") + minutes
timeValue += ((seconds < 10) ? ":0" : ":") + seconds
timeValue += (hours >= 12) ? " P.M." : " A.M."
document.clock.face.value = timeValue;
timerID = setTimeout("showtime()",1000);
timerRunning = true;
}
function startclock() {
stopclock();
showtime();
}
window.onload=startclock;
// End -->
</SCRIPT>	


</head>
<?php
function createRandomPassword() {
	$chars = "003232303232023232023456789";
	srand((double)microtime()*1000000);
	$i = 0;
	$pass = '' ;
	while ($i <= 7) {

		$num = rand() % 33;

		$tmp = substr($chars, $num, 1);

		$pass = $pass . $tmp;

		$i++;

	}
	return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<body>
<?php include('navfixed.php');?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span2">
          <div class="well sidebar-nav">
              <ul class="nav nav-list">
              <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard  </a></li> 
        <li><a href="que.php"><i class="icon-bar-chart icon-2x"></i>Que</a>                </li>

			<li><a href="patients_doctor.php"><i class="icon-shopping-cart icon-2x"></i>Doctors</a>  </li>             
			<li><a href="#"><i class="icon-list-alt icon-2x"></i>Dentist</a>                                     </li>
			<li><a href="#"><i class="icon-group icon-2x"></i>Well Baby Clinics</a>                                    </li>
			<li><a href="#"><i class="icon-group icon-2x"></i>Optician</a>                                    </li>
			<li><a href="#"><i class="icon-bar-chart icon-2x"></i>Specialist</a>                </li>
					<br><br><br><br><br><br>		
			<li>
			 <div class="hero-unit-clock">
		
			<form name="clock">
			<font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="submit" class="trans" name="face" value="">
			</form>
			  </div>
			</li>
			
				
				</ul>     
          </div><!--/.well -->
        </div><!--/span-->
	<div class="span10">
	<div class="contentheader">
			<i class="icon-group"></i> INVESTIGATIONS
			</div>
			<ul class="breadcrumb">
			<li><a href="index.php"></a></li> 
			<li class="active"></li>
			</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a></div>



</head>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>

<body>






<form action="" method="post">

  <input name="search" type="search" autofocus><input type="submit" name="button">

</form>
<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
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
$db=mysql_select_db('wama3');
$date = date("y-m-d");

if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("select * from medicalfile where name like '%{$search}%' ");

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
       echo "<tr><td>".$row['adm_no']."</td>";
$desc = $row['name'];
$bb = $row['adm_no'];
$aa = $row['adm_no'];

//echo"<td>".$row['name']."</td>";



echo"<td width ='50' align ='left'><a href=javascript:popcontact2('patients_reg_edit.php?accounts3=$bb&account3=$aa&ref_no=$aa2')>$desc</a>";      
      echo"</td>";


echo"<td>".$row['telephone']."</td><td>".$row['date']."</td><td>".$row['status']."</td><td>".$row['payer']."</td><td>".$row['sex']."</td><td>".$row['image_id']."</td></tr>";
  }
}else{
    echo "No employee Found<br><br>";
  }

}else{                          //while not in use of search  returns all the values

  $query=mysql_query("select * from medicalfile where status ='To Doctor' and date ='$date'");

  while ($row = mysql_fetch_array($query)) {
    echo "<tr><td>".$row['adm_no']."</td>";
$desc = $row['name'];
$bb = $row['adm_no'];
$aa = $row['adm_no'];

//echo"<td>".$row['name']."</td>";



echo"<td width ='50' align ='left'><a>$desc</a>";      
      echo"</td>";


echo"<td>".$row['telephone']."</td><td>".$row['date']."</td><td>".$row['status']."</td><td>".$row['payer']."</td><td>".$row['sex']."</td><td>".$row['image_id']."</td></tr>";

  }
}

mysql_close();
?>