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
     $location  = $_GET['search'];
$today = date('y/m/d');
//$query  = "select * FROM st_trans WHERE type ='Stock Take' ORDER BY date" ;
//$result =mysql_query($query);
//$num =mysql_numrows($result);
//$tot =0;
//$i = 0;

echo"<h3>Stock Take Report From ".$date1." To ".$date2;
echo"<br><br> Store Location ".$location." </h3>";
//echo"<div><b>";
//echo"<hr>";
//echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
//echo"Item Description<img src='space.jpg' style='width:150px;height:2px;'>";
//echo"Narration<img src='space.jpg' style='width:200px;height:2px;'>";
//echo"Level<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"Count<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"Variance<img src='space.jpg' style='width:1px;height:2px;'>";
//echo"</b></div>";
echo"<hr>";





echo"<table class='altrowstable' id='alternatecolor' border ='1' width ='100%'>";
echo"<tr><th bgcolor ='black'><font color ='white'>Date</th><th bgcolor ='black'><font color ='white'>Item Description</th><th bgcolor ='black'><font color ='white'>Narration</th><th bgcolor ='black'><font color ='white' align ='right'>Level</th><th bgcolor ='black' align ='right'><font color ='white'>Count</th><th align ='center' bgcolor ='black'><font color ='white'>Variance</font></th></tr>";

//echo"<table class='altrowstable' id='alternatecolor' border ='0'>";

//Now go and get non-chargables
//-----------------------------
//$sql ="INSERT INTO stock_alloc_rpt SELECT * FROM st_trans  WHERE type ='Stock Take' and date >='$date1' AND date <='$date2' GROUP BY location,description"; 	 
//$result = mysqli_query($sql);

//$query2 = "SELECT location, description FROM stock_alloc_rpt GROUP BY location"; 	 
//$result2 = mysql_query($query2);
//$id = 0;
//$nRecord = 1;
//$No = $nRecord;
//$num2 =mysql_numrows($result2);
//$i2 =0;
//while ($i2 < $num2){
//      $location   = mysql_result($result2,$i2,"location");  
//      $description= mysql_result($result2,$i2,"description");  
//echo"<tr bgcolor ='white'>";
//echo"<th width ='150' align ='left'>";      
//echo"";
//echo"</th>";
//echo"<th width ='400' align ='left'>";
//echo"$location";      
//echo"</th>";
//echo"<th width ='450' align ='left'>";      
//echo"</th>";
//echo"<th width ='100' align ='right'></th>";
//echo"<th width ='100' align ='right'></th>";
//echo"<th width ='100' align ='right'></th>";
//echo"</tr>";

$query = "SELECT * FROM st_trans WHERE date >='$date1' AND date <='$date2' and type ='Stock Take' and location ='$location'  ORDER BY description"; 	 
$result = mysql_query($query);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$num =mysql_numrows($result);
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

      $codes2 = $qty; 
      $update2 = $codes2; 
      //$price   = number_format($rate);
      $tot = $tot +$update2;
      $tot = $qty-$rate;
      //$rate-$qty; changed because of shilla
      //$update2 = number_format($update2);
      //$rate = number_format($total);
      //$totss = -1*$qty*$rate;
      //$totss =number_format($tots);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='150' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='400' align ='left'>";      
      echo"$contact";
      echo"</td>";
      echo"<td width ='300' align ='left'>";      
      echo"$update";
      echo"</td>";
      //$qty = -1*$qty;
      $bb =$row['acc_no'];              
      echo"<td width ='100' align ='right'>$rate</td>";
      echo"<td width ='100' align ='right'>$qty</td>";
      $tot_1 = $qty*$price;
      $tot_2 = $tot_2+$tot_1;
      //echo"<td width ='30' align ='right'></td>";
      $totss = number_format($total);
      echo"<td width ='100' align ='right'>$tot</td>";
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['payer']; 
      $aa3=$row['name'];        
      $aa4=$row['type'];   
      $aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      //echo"<td width ='100' align ='right'></td>";
echo"</tr>";
      $i++;      
     }
 //$i2++;
//}
die();

}
?>





<?php



echo"<h1>Stock Take Report</h1><br><br>";
echo"<form action ='stock_take_report.php' method ='GET'>";

   echo"<table><tr><td>Select Store:</td><td>";
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







