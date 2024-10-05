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

<script language="javascript" type="text/javascript">
var newwindow;
function popcontact505(url) {
	newwindow=window.open(url,'newwindow','height=800,width=900');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>

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
   //Get into printing if selected
   //-----------------------------
$date1 = $_GET['date1']; 
$date2 = $_GET['date2']; 
$search= $_GET['search']; 

$today = date('y/m/d');
if ($search==''){
$query  = "select * FROM lpo_trans WHERE real_date >='$date1' and real_date <= '$date2' GROUP BY ref_no ORDER BY date" ;
}else{
$query  = "select * FROM lpo_trans WHERE location='$search' and real_date >='$date1' and real_date <= '$date2' GROUP BY ref_no ORDER BY real_date" ;
}



$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<th><h3>List of Local Purchase Orders</h3></th></tr>";
//echo"<div><b>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0' width ='100%'>";
echo"<tr><th bgcolor ='black'><font color ='white'>Date</th><th bgcolor ='black'><font color ='white'>Supplier</th><th bgcolor ='black'><font color ='white'>Item Description</th><th bgcolor ='black' width ='10'><font color ='white'>LPO</th><th bgcolor ='black'><font color ='white'>Input by</th><th bgcolor ='black' align ='right'><font color ='white'>Qty</th><th align ='right' bgcolor ='black'><font color ='white'>Cost</th><th align ='right' bgcolor ='black' align ='right'><font color ='white'>Total</font></th></tr>";

$tot_dis = 0;
$net_tot = 0;
  while ($i < $num)
      {         
      $codes   = mysql_result($result,$i,"real_date");  
      $dept    = mysql_result($result,$i,"adm_no");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"price");   
      $code   = mysql_result($result,$i,"ref_no");   
      $update = mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"description");  
      $qty     = mysql_result($result,$i,"qty");  
      $qtyz    = mysql_result($result,$i,"qty");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"trans_desc");  
      $total   = mysql_result($result,$i,"total");  
      $net_total   = mysql_result($result,$i,"net_total");  
      $disc_total   = mysql_result($result,$i,"tot_disc");  
      $supplier     = mysql_result($result,$i,"adm_no");  
      $inputby      = mysql_result($result,$i,"inputby");  

      $codes2 = $qtyz; 
      $update2 = $codes2; 
      $price   = number_format($rate);
      $tot = $tot +$update2;
      $tot_dis = $tot_dis + $disc_total;
      $net_tot = $net_tot + $net_total;

      $update2 = number_format($update2);
      $rate = number_format($total);
      $totss = $qty*$rate;
      //$totss =number_format($tots);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='400' align ='left'>";      
      echo"$dept";
      echo"</td>";
      echo"<td width ='350' align ='left'>";      
      echo"$contact";
      echo"</td>";
      echo"<td width ='10' align ='left'>";      
      echo"<a href=javascript:popcontact505('view_lpo.php?invoice=$code')><font color ='red'>$code</font></a>";
      echo"</td>";
      echo"<td width ='100' align ='left'>";      
      echo"$inputby";
      echo"</td>";
      $bb =$row['acc_no'];              
      echo"<td width ='60' align ='right'>$qty</td>";
      echo"<td width ='80' align ='right'>$price</td>";
      $tot_1 = $qty*$price;
      //echo"<td width ='30' align ='right'></td>";
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
      //echo"<td width ='50' align ='right'>$disc_total</td>";
      //echo"<td width ='50' align ='right'>$net_total</td>";
echo"</tr>";
      $i++;      
     }
      echo"</table>";
echo"<hr>";
      echo"<table>";   
    $tot = number_format($tot);
      echo"<th width ='320' align ='left'></th>";      
      echo"<th width ='500'></th>";      
      echo"<th width ='150'>Total</th>";      
      echo"<th width ='20' align ='right'>$tot</th>";      
      echo"<th width ='50' align ='right'></th>";      
      //echo"<th width ='50' align ='right'>$tot_dis</th>";      
      //echo"<th width ='50' align ='right'>$net_tot</th>";      

      echo"</table>";
die();
}

$tot_dis = 0;
$net_tot = 0;


   echo"<form action ='stock_lpo_rpt.php' method ='GET'>";

   echo"<table><tr><td>Location:</td><td>";
   echo"<select id='search' name='search'>"; 
   $cdquery="SELECT * FROM st_locationf ORDER BY description";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   while ($cdrow=mysql_fetch_array($cdresult)) {
         $cdTitle=$cdrow["description"];
   echo "<option>$cdTitle</option>";            
   }
   echo"</select></td></tr>";

 echo"<tr><td>Date Range From</td><td><input type='text' name='date1' placeholder='dd-mm-yyyy' size='12' required></td></tr><tr><td> To 
Date</td><td><input type='text' name='date2' placeholder='dd-mm-yyyy' size='12' required></td></tr>";

echo"<tr><td><input type='submit' name='print'  class='button' value='Print Statement'></td></tr></table>";

echo"</FORM>";






//}
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







