<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">
  
  
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>




<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/account/balnc.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
<div>	

<?php
 require('open_database.php');
//session_start();
// $username =$_SESSION['username'];
// $database =$_SESSION['database'];



if (isset($_GET['prints'])){
   $date = date('d-m-y');
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;
   $SQL = "select * FROM companyfile" ;
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $company     = mysql_result($result,$i,"company");  
      $address1    = mysql_result($result,$i,"address1");   
      $address2    = mysql_result($result,$i,"address2");   
      $address3    = mysql_result($result,$i,"address3");   
   }
   echo"<font size ='2'>";
   echo"<table width ='700'>";      
   echo"<tr><td width ='700' align ='center'><b>$company</b></td></tr>";
   echo"<tr><td width ='700' align ='center'><b>$address1</b></td></tr>";
   echo"<tr><td width ='700' align ='center'><b>$address2</b></td></tr>";
   echo"<tr><td width ='700' align ='center'><b>$address3</b></td></tr></table>";
   echo"<br><br><table><tr><td width ='350' align ='left'><b>DAILY COLLECTION REPORT</b></td><td width ='500' align ='right'><b>Print Date:.$date</b></td></tr></table>";

   $query= "SELECT * FROM balancesf WHERE type > '' ORDER BY type " or die(mysql_error());
   $SQL  = "SELECT * FROM balancesf WHERE  type > '' ORDER BY type " or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;











echo"<hr>";
   echo"<table>";
   echo"<tr><th>Adm No</th><th width='10'></th><th width ='300' align='left'>Patient </th><th width='200'>Cost</th><th width = '100'></th><th>Paid</th><th width = '100'></th><th>Balance</th>   
   </tr></table>";
echo"<hr>";

$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$db_total = 0;
$cr_total = 0;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
echo"<table>";

      $codes   = mysql_result($result,$i,"client_id");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = " ";   
      $type       = mysql_result($result,$i,"telephone_no");   
      $last_trans = mysql_result($result,$i,"address");  
      $balance    = mysql_result($result,$i,"os_balance");    
      $update2 = $balance; 
      $tot = $tot +$update2;
      
      //$update = number_format($update);
      //$codes   = number_format($codes2);
      $balances  = number_format($balance);

      $update2 = number_format($update2);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='60' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='400' align ='left'>";      
      echo"$desc";
      echo"</td>";            
      echo"<td width ='200'>";      
      echo"$type";
      echo"</td>";      
      echo"<td width = '20'></td>";
      echo"<td width ='100' align ='right'>";
      if ($balance > 0){
         echo"$update2";
         $db_total = $db_total+$balance;
      }
      echo"</td>";
      echo"<td width = '20'></td>";

      echo"<td width ='100' align ='right'>";
      if ($balance < 0){
         echo"$update2";
         $cr_total = $cr_total+$balance;
      }
      echo"</td>";
      echo"<td width ='100' align ='right'></td>";
      

      echo"</tr>";   
echo"</table>";
echo"<hr>";   


      $i++;      
}
//      echo"</table>";
echo"<table>";


      $tot = number_format($tot);
      $cr_total = number_format($cr_total);
      $db_total = number_format($db_total);

      echo"<table><tr>";
      echo"<table>";
      echo"<tr bgcolor ='white'>";
      echo"<td width ='60' align ='left'>";      
      echo"</td>";
      echo"<td width ='400' align ='left'>";      
      echo"</td>";            
      echo"<td width ='200'>";      
      echo"</td>";      
      echo"<td width = '20'></td>";
      echo"<td width ='100' align ='right'>Total Balance";
      echo"</td>";
      echo"<td width = '20'></td>";
      echo"<td width ='100' align ='right'>";
      echo"$tot";
      echo"</td>";
      echo"<td width ='100' align ='right'></td>";      
      echo"</tr></table><hr>";
die();


}




































//End of printing TB
//------------------




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">






<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>



























<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=850');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>


</head>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">












<body background="images/background.jpg">
<form action ="patients_balances.php" method ="GET">
<table>
<td><input type="submit" name="Submit"  class="button" value="Search Patient"></td>
<?php
$mdate =date('y-m-d');
echo"<td><input type='text' name='search' size='50'>Search by:</td>";
echo"<td><select name ='search_by'>";
echo"<option value='Name'>Name</option>";
echo"<option value='Adm_no'>Adm no</option>";
echo"<option value='Date'>Date</option></select></td>";
?>
<td><input type="submit" name="print"  class="button" value="Send to Printer"></td></table>
</FORM>
<?php

   
$mleast =123552620;
$mdate =date('y-m-d');
$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $date1 = $_GET['date1'];
   $date2 = $_GET['date2'];
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Record'){
     $query = "select * FROM  balancesf WHERE client_id LIKE '%$search%' ORDER BY type" ;
     $SQL = "select * FROM  balancesf WHERE client_id LIKE '%$search%' ORDER BY type" ;
   }
   if ($search_by =='Date'){
     $query = "select * FROM  balancesf WHERE register_date LIKE '%$search%' ORDER BY type" ;
     $SQL   = "select * FROM  balancesf WHERE register_date LIKE '%$search%' ORDER BY type" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  balancesf WHERE type LIKE '%$search%' ORDER BY type" ;
     $SQL   = "select * FROM  balancesf WHERE type LIKE '%$search%' ORDER BY type" ;
   }
 }else{
   $query= "SELECT * FROM balancesf WHERE type > '' ORDER BY type" or die(mysql_error());
   $SQL  = "SELECT * FROM balancesf WHERE type > '' ORDER BY type" or die(mysql_error());
}

//$result =mysql_query($query) or die(mysql_error());
//$num =mysql_numrows($result) or die(mysql_error());

$tot =0;

$i = 0;



if (isset($_GET['print']) OR isset($_GET['search'])){ 
   $date1 = $_GET['date1'];
   $date2 = $_GET['date2'];
   $time1 = $_GET['time1'];
   $time2 = $_GET['time2'];

$date1= $date1.' '.$time1;
$date2= $date2.' '.$time2;
                             
                          
echo"<table class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='200'>Date</th><th width ='500'>Patient Name </th><th>Total</th><th>Paid</th><th>Balance</th><th>Pay Mode</th</tr>";
$query = "select * FROM  balancesf WHERE date >='$date1' and date <='$date2' ORDER BY date" ;
$SQL   = "select * FROM  balancesf WHERE date >='$date1' and date <='$date2' ORDER BY date" ;

$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());

$tot =0;

$i = 0;


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      //$rate    = " ";   
      $type       = mysql_result($result,$i,"total"); 
      $mode       = mysql_result($result,$i,"trans_desc");     
      $last_trans = mysql_result($result,$i,"paid");  
      $balance    = mysql_result($result,$i,"balance");  
      $last_trans2 = $last_trans; 
      $update2 = $balance; 
      $tot = $tot +$update2;
      $all = $all +$type;
      $paids = $paids +$last_trans;

      $paid = number_format($last_trans2);
      //$codes   = number_format($codes2);
      $update2 = number_format($update2);

      echo"<tr>";
      echo"<td width ='60' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='250' align ='left'>";      
      echo"$desc";
      echo"</td>";            
      echo"<td width ='60'>";      
      echo"$type";
      echo"</td>";      
      echo"<td width ='50' align ='right'>";
      echo"$paid";
      echo"</td>";

      echo"<td width ='50' align ='right'>";
      echo"$update2";
      echo"</td>";

      $bb =$row['type'];        
      $aa =$row['type'];        
      $aa8=$row['type'];
      $aa9= date('y-m-d');
      echo"<td width ='100' align ='right'>$mode</td>";
echo"</tr>";   
      $i++;      
}
      echo"</table>";
      echo"<table width ='100%' border ='0'>";
   
      echo"<tr bgcolor ='white'>";
      echo"<td width ='500' align ='left'>";      
      echo"</td>";
      echo"<td width ='250' align ='left'>";      
      echo"</td>";            
      echo"<td width ='60'>";      
      echo"</td>";      
      echo"<td width ='50' align ='right'>";
      echo"<h3>$all</h3>";
      echo"</td>";

      echo"<td width ='50' align ='right'>";
      echo"<h3>$paids</h3>";
      echo"</td>";

      $tot = number_format($tot);

      echo"<td width ='100' align ='right'><h3>$tot</h3></td>";
     echo"</tr></table>";   
}else{
  echo"<br>";
  echo"<form action ='patients_balances.php' method ='GET'>";
  echo"<table><tr><td width ='50'>From Date:</td><td><input type='date' name='date1' value ='$date1' size='12' ></td><td><input type='text' name='time1' value ='00:00:00' size='12' ></td></tr>";
  echo"<tr><td width='50'>To Date:</td><td><input type='date' name='date2' value ='$date2' size='12'></td><td><input type='text' name='time2' value ='00:00:00' size='12' ></td><tr>";
  echo"<tr><td width='50'><input type='submit' name='print'  class='button' value='Print Report'></td><td></td></tr>";
echo"</FORM>";
}


?>
</body>
</html>



</div>






      </section>
      <!-- right col -->
   <!-- ./wrapper -->

<!-- Chart Data -->

<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'Late',
        fillColor           : 'rgba(210, 214, 222, 1)',
        strokeColor         : 'rgba(210, 214, 222, 1)',
        pointColor          : 'rgba(210, 214, 222, 1)',
        pointStrokeColor    : '#c1c7d1',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(220,220,220,1)',
        data                : <?php echo $late; ?>
      },
      {
        label               : 'Ontime',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $ontime; ?>
      }
    ]
  }
  barChartData.datasets[1].fillColor   = '#00a65a'
  barChartData.datasets[1].strokeColor = '#00a65a'
  barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>
<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>
</body>
</html>


