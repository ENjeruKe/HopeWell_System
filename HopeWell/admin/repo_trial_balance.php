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
  	<?php include 'includes/report.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	


<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
<?php
 $branch     = $_SESSION['branch']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 if (isset($_GET['print'])){
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $date1 = $_GET['date1'];
   $date2 = $_GET['date2'];

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
   //echo"<table width ='500'>";      
   //echo"<tr><td align ='left'><b>$company</b></td></tr>";
   //echo"<tr><td align ='left'><b>$address1</b></td></tr>";
   //echo"<tr><td align ='left'><b>$address2</b></td></tr>";
   //echo"<tr><td align ='left'><b>$address3</b></td></tr>";
   //echo"</table><br>";

   echo"<table width ='100%'><td align ='center'><img src='images/heading.jpg' alt='statement' 
      height='200' width='600'></td></table><br><br>";
echo "<hr>";

   echo"<h1><u>SIMPLE TRIAL BALANCE</u></h1><img src='space.jpg' style='width:20px;height:2px;'>";
   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";
echo"From Date:<img src='space.jpg' style='width:5px;height:2px;'>".$date1."<img src='space.jpg' style='width:5px;height:2px;'>To<img src='space.jpg' style='width:20px;height:2px;'>".$date2;

   $today = date('y/m/d');


   $query= "SELECT * FROM glaccountsf where account_name<>' '" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "select * FROM glaccountsf where account_name<>' '" ;
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $account     = mysql_result($result,$i,"account_name"); 
      $type        = mysql_result($result,$i,"type");        

      //$query3  = "UPDATE gltransf SET branch ='$type' WHERE account_name ='$account'";
      //$result3 = mysql_query($query3);
     $i++; 
   }

$debit = 0;
$credit = 0;
   $query = "SELECT account_name, sum(amount) FROM gltransf WHERE account_name<>'' and date >= '$date1' and date <='$date2' GROUP BY account_name"; 	 
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   // Print out result
  
   echo"<table width ='100%'><tr><th width ='20' bgcolor ='black' align ='left'><font color ='white'>Account Name</th><th width ='150' bgcolor ='black' align='right'><font color ='white'>Debit</th><th width ='150' bgcolor ='black' align='right'><font color ='white'>Credit</th></tr>";
   while($row = mysql_fetch_array($result)){
	echo "<tr><td width ='300'>";
        echo $row['account_name'];
        $amount = $row['sum(amount)'];
        echo"</td><td width = '10' align ='right'>"; 
        if ($amount >0){
           echo number_format($row['sum(amount)']);
           $debit = $debit +$amount;
        }
        echo"</td><td width = '10' align ='right'>"; 
        if ($amount <0){
           echo number_format($row['sum(amount)']*-1);
           $credit = $credit +$amount;
        }
        echo"</td></tr>";
        $tot_cred = $tot_cred+$amount;
   }
   $credit = $credit*-1;
   $tot_cred = $tot_cred;
   $income =number_format($tot_cred);
   echo"<tr><td bgcolor ='black' align ='left'><font color ='white'>BALANCE</td><td align ='right' bgcolor ='black'><font color ='white'>$debit</td><td bgcolor ='black' align ='right' ><font color ='white'>$credit</td></tr></font>";
   echo"</table>";
}else{
   $date1 = date('y-m-d');
   $date2 = date('y-m-d');

?>




<!-- Le styles -->
    
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--background-image:url('images/background.jpg');-->
    
<style type="text/css">
	body {
		padding-top: 0px;
		padding-bottom: 40px;
	}
	.sidebar-nav {
		padding: 9px 0;
	}


	.nav
	{
		margin-bottom:10px;
	}	
	.accordion-inner a {
		font-size: 13px;
		font-family:tahoma;
	}
	.alert {
		padding:8px 14px 8px 14px;
	}
    </style>





<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">









<!DOCTYPE html>
<html lang="en">
  
<head>
<!-- end of pages -->



<?php



   echo"<form><table width ='400' border='0' border color ='black'><td width ='100' align ='right'><b>From Date: </b></td><td><input type='text' name='date1' size='20' value='$date1'></td><td width ='100' align ='right'><b>To Date: </b></td><td><input type='text' name='date2' size='20' value='$date2'></td></table>";
echo"<table><td><input type='submit' name='print'  class='button' value='Print'></td></table></form>";




}


?>








      </section>
      <!-- right col -->
    </div>
  	<?php include 'includes/footer.php'; ?>

</div>
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


