<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 

     
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>




<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/stocks/repor.php'; ?>

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
$date2 = date('y-m-d');
$date1 = date('y-m-d');

if (isset($_GET['print'])){
    $date1  = $_GET['date1'];
    $date2  = $_GET['date2'];
    $locations  = $_GET['search'];
$today = date('y/m/d');
$query  = "select * FROM st_trans WHERE trans_desc <>'' ORDER BY date" ;
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<th><h3>Stock Movement (All items by store) Report</h3></th></tr>";
echo"<div><b>";
echo"<hr><table border='0'>";
echo"<td width ='100'>Date</td>";
echo"<td width ='450'>Item Description</td>";
echo"<td width ='450' align ='center'>Narration</td>";
echo"<td width ='60' align='center'>Transaction</td>";
echo"<td width ='60' align ='right'>Qty</td>";
echo"<td width ='80' align ='right'>Price</td>";
echo"<td width ='30' align ='right'></td>";
echo"<td width ='60' align ='right'>Total</td>";
echo"<td width ='50'></td></table>";
echo"</b></div>";
echo"<hr>";



echo"<table class='altrowstable' id='alternatecolor' border ='0'>";

//Now go and get non-chargables
//-----------------------------
$query2 = "SELECT location,description FROM st_trans WHERE date >='$date1' AND date <='$date2' and location ='$locations' GROUP BY location,description"; 	 
$result2 = mysql_query($query2) or die(mysql_error());




$id = 0;
$nRecord = 1;
$No = $nRecord;
$num2 =mysql_numrows($result2);
$i2 =0;
while ($i2 < $num2){
      $location   = mysql_result($result2,$i2,"location");  
      $description= mysql_result($result2,$i2,"description");  
      
      
      $query6 = "SELECT * FROM stockfile WHERE location ='$locations' and description ='$description'"; 	 
      $result6 = mysql_query($query6);
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num6 =mysql_numrows($result6);
      $i6 =0;
      while ($i6 < $num6){
            $balance   = mysql_result($result6,$i6,"qty");  
            $i6++;
      }      
      
      
      
echo"<tr bgcolor ='white'>";
echo"<th width ='100' align ='left'>";      
echo"$location";
echo"</th>";
echo"<th width ='450' align ='left'>";
echo"$description";      
echo"</th>";
echo"<th width ='450' align ='left'>";      
echo"</th>";
echo"<th width ='60' align ='right'></th>";
echo"<th width ='60' align ='right'></th>";
echo"<th width ='80' align ='right'>Balance</th>";
echo"<th width ='30' align ='left'></th>";
echo"<th width ='60' align ='right'>$balance</th>";
echo"<th width ='50' align ='right'></th>";
echo"</tr>";

$query = "SELECT * FROM st_trans WHERE date >='$date1' AND date <='$date2' and description ='$description' and location ='$locations' ORDER BY description"; 	 
$result = mysql_query($query) or die(mysql_error());
$id = 0;
$nRecord = 1;
$No = $nRecord;
$num =mysql_numrows($result) or die(mysql_error());
$i =0;
while ($i < $num){
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"price");   
      $code   = mysql_result($result,$i,"ref_no");   
      $update = mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"description");  
      $qty     = mysql_result($result,$i,"qty");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"trans_desc");  
      $total   = mysql_result($result,$i,"total");  

      $codes2 = $total; 
      $update2 = $codes2; 
      $price   = number_format($rate);
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($total);
      $totss =$qty*$rate;
      //$totss =number_format($tots);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='450' align ='left'>";      
      echo"$contact";
      echo"</td>";
      echo"<td width ='450' align ='left'>";      
      echo"$update";
      echo"</td>";
      //$qty = $qty;
      $bb =$row['acc_no'];              
      echo"<td width ='60' align ='right'>$pay_mode</td>";
      echo"<td width ='60' align ='right'>$qty</td>";
      echo"<td width ='80' align ='right'>$price</td>";
      $tot_1 = $qty*$price;
      $tot_2 = $tot_2+$tot_1;
      echo"<td width ='30' align ='right'></td>";
      $totss = number_format($total);
      echo"<td width ='60' align ='right'>$totss</td>";
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['payer']; 
      $aa3=$row['name'];        
      $aa4=$row['type'];   
      $aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      echo"<td width ='50' align ='right'></td>";
echo"</tr>";
      $i++;      
     }
 $i2++;
}
die();

}
?>





<?php



echo"<h1>Weekly Report</h1><br><br>";
echo"<form action ='stocks_weekly.php' method ='GET'>";

   echo"<table><tr><td>Department:</td><td>";
   echo"<select id='search' name='search'>"; 
   $cdquery="SELECT description FROM st_locationf ORDER BY description";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   while ($cdrow=mysql_fetch_array($cdresult)) {
         $cdTitle=$cdrow["description"];
   echo "<option>$cdTitle</option>";            
   }
   echo"</select></td><td></td>";


 echo"<tr><td>Date Range From</td><td><input type='date' name='date1' value ='$date1' size='12' ></td><td></td><td></td></tr>";

 echo"<tr><td>TO Date Range</td><td><input type='date' name='date2' value ='$date2' size='12' ></td><td></td><td></td></tr>";


echo"<tr><td><input type='submit' name='print'  class='button' value='Print Statement'></td></tr></table>";

echo"</FORM>";


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







