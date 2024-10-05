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
//$user = "hmisglobal";   
//$pass = "jamboafrica";   
//$database = "hmisglob_griddemo";   
//$host = "localhost";   
//$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
//mysql_select_db($database) or die ("Unable to select the database");

$today = date('y/m/d');
$query  = "select * FROM st_trans WHERE type ='Stock Adjustment' ORDER BY date" ;
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<th><h3>Low Stock Report</h3></th></tr>";
echo"<div><b>";
echo"<hr>";
echo"<table class='altrowstable' id='alternatecolor' border ='0'>";

//echo"Item Description<img src='space.jpg' style='width:350px;height:2px;'>";
//echo"Qty<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"Reorder<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"Cost<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"To Order<img src='space.jpg' style='width:50px;height:2px;'>";


         echo"<tr bgcolor ='white'>";
//         echo"<td width ='100' align ='left'>";      
//         echo"$location";
//         echo"</td>";
         echo"<th width ='450' align ='left'>";      
         echo"Item Description";
         echo"</th>";
         echo"<th width ='60' align ='right'>Qty</td>";
         echo"<th width ='80' align ='right'>Re Order</th>";
         echo"<th width ='30' align ='right'>Cost</th>";
         echo"<th width ='60' align ='right'>To Order</th>";
         echo"<th width ='100' align ='right'></th>";
         echo"</th></tr>";

echo"</b></div>";
echo"<hr>";


//$SQL ="select * FROM stockfile" ;
$SQL ="SELECT * FROM stockfile WHERE qty <='3' ORDER BY location";
$hasil=mysql_query($SQL, $connect);
$id = 0;
$location1 ='';
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)){         
      $level       = $row['qty'];  
      $reorder     = $row['reorder'];  
      $location    = $row['location'];  
      $description    = $row['description'];  
      if ($level < $reorder){
      if ($location <> $location1){
         $location1    = $row['location'];
         echo"<tr bgcolor ='white'>";
         echo"<td width ='100' align ='left'>";      
         echo"$location";
         echo"</td>";
         echo"<td>";
         echo"</td>";
         echo"<td>";
         echo"</td>";
         echo"<td>";
         echo"</td>";
         echo"<td>";
         echo"</td>";
      }
         $location   = mysql_result($result,$i,"location");  
//        $description    = mysql_result($result,$i,"description");   
        $price       = mysql_result($result,$i,"cost_price");   
        $balance     = mysql_result($result,$i,"qty");   
        $reorder     = mysql_result($result,$i,"reorder");  
        $reorder     = $row['reorder'];
         $price       = $row['cost_price'];

         $vary = $reorder - $balance;
         echo"<tr bgcolor ='white'>";
//         echo"<td width ='100' align ='left'>";      
//         echo"$location";
//         echo"</td>";
         echo"<td width ='450' align ='left'>";      
         echo"$description";
         echo"</td>";
         echo"<td width ='60' align ='right'>$level</td>";
         echo"<td width ='80' align ='right'>$reorder</td>";
         echo"<td width ='30' align ='right'>$price</td>";
         echo"<td width ='60' align ='right'>$vary</td>";
         echo"<td width ='100' align ='right'></td>";
         echo"</tr>";
      }
      $i++;      
     }
      echo"</table>";
echo"<hr>";
die();

//Now go and show summary
//-----------------------

 $date2 = date('y-m-d');
 $date1 = date('y-m-d');

$today = date('y/m/d');
$query  = "select * FROM receiptf WHERE adm_no ='$adm_no' ORDER BY date" ;
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

echo"<th>Low Stock Items</th></tr>";
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:60px;height:2px;'>";
echo"Payer<img src='space.jpg' style='width:180px;height:2px;'>";
echo"Description <img src='space.jpg' style='width:150px;height:2px;'>";
echo"Total<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Paid<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:50px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
$SQL ="select * FROM receiptf WHERE adm_no ='$adm_no' ORDER BY date" ;
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;



while ($row=mysql_fetch_array($hasil)) 
      {         
     $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"price");   
      $code   = mysql_result($result,$i,"ref_no");   
      $update = mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"description");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"trans_desc");  
      $total   = mysql_result($result,$i,"total");  
      $balance   = mysql_result($result,$i,"balance");  

      $codes2 = $total; 
      $update2 = $codes2; 
      $tot = $tot +$balance;
      $update2 = number_format($update2);
      $bals    = number_format($balance);
      $price   = number_format($rate);
      $rate = number_format($total);
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='200' align ='left'>";      
      echo"$desc";
      echo"</td>";
      echo"<td width ='220' align ='left'>";      
      echo"$contact";
      echo"</td>";
      $bb =$row['acc_no'];              
      echo"<td width ='60' align ='right'>$price</td>";
      echo"<td width ='70' align ='right'>$update2</td>";
      echo"<td width ='20' align ='right'></td>";

      echo"<td width ='60' align ='right'>$bals</td>";
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['payer']; 
      $aa3=$row['name'];        
      $aa4=$row['type'];   
      $aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      echo"<td width ='100' align ='right'><a href='print_receipt.php?accounts=$aa2&account=$aa&contact=$aa3&type=$aa4&tel=$aa5&comment=$aa6&   date=$aa7'/></a></td>";
echo"</tr>";
      $i++;      
     }
      echo"</table>";
echo"<hr>";
      echo"<table>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><h4>";      
      echo"Total";      
      echo"</h4></td>";      
      echo"<td width ='70' align ='right'><h4>$tot</h4></td>";      
      echo"</tr>";   
      echo"</table>";
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







