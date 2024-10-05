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
  	<?php include 'includes/cashier.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	

<?php
   session_start();
require('open_database.php');
$branch = $_SESSION['company'];
$date = $_SESSION['sys_date'];
$today = $_SESSION['sys_date'];
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--html xmlns="http://www.w3.org/1999/xhtml"-->
<title>Search Receipt</title>






<form action ="save_receipt.php" method ="POST">
<input type="submit" name="Submit"  class="button" value="Patient receipt to Print">
<input type="text" name="search" size="150"><br>
</FORM>
<?php

   

$today = $_SESSION['sys_date'];
if (isset($_POST['search'])){
   $search = $_POST['search'];
   $query = "select * FROM receiptf WHERE type LIKE '%$search%' ORDER BY date" ;
 }else{
   $query= "SELECT * FROM receiptf WHERE date ='$today' ORDER BY date" or die(mysql_error());

}
$result =mysql_query($query) or die(mysql_error());

$num =mysql_numrows($result) or die(mysql_error());

$tot =0;

$i = 0;





//echo"<table bgcolor ='black' border ='0'>";

                                                         
echo"<table class='altrowstable' id='alternatecolor'>";
echo"<tr><th>RCT No.</th><th>Date</th><th>Payer Description </th><th>Amount</th><th>Action</th></tr>";




if (isset($_POST['search'])){
   $search = $_POST['search'];
   $SQL = "select * FROM receiptf WHERE type LIKE '%$search%' ORDER BY date" ;
//WHERE Any Column LIKE 'Something%'

 }else{
$SQL = "select * FROM receiptf WHERE date = '$today' ORDER BY date" ;
}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;

while ($row=mysql_fetch_array($hasil)) 
      {
   
      
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"adm_no");   
      $rate    = mysql_result($result,$i,"total");   
      $code   = mysql_result($result,$i,"ref_no");   
      $update = mysql_result($result,$i,"adm_no");  
      $contact = mysql_result($result,$i,"description");  
      $street  = mysql_result($result,$i,"type");
  

      $codes2 = $rate; 
      $update2 = $codes2; 
      $tot = $tot +$update2;

      $update2 = number_format($update2);
      $rate = number_format($rate);

      echo"<tr>";
     echo"<td width ='100' align ='left'>";      
echo"$code";
      echo"</td>";
      echo"<td width ='200' align ='left'>";      
echo"$codes";
      echo"</td>";
      echo"<td width ='250' align ='left'>";      
echo"$street";
      echo"</td>";

 

      $bb =$row['ref_no'];        
      

echo"<td width ='100' align ='right'>$update2<img src='ico/Profile.ico' alt='statement' height='12' width='12'></td>";
      $_SESSION['ref_no'] =$row['ref_no'];  
      $aa =$row['ref_no'];        
      $aa2 =$row['type'];   
      $aa3=$row['inputby'];        
      $aa4=$row['type'];   
      $aa5=$row['description'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];        
      echo"<td width ='100' align ='right'><a href='reprint_receipt.php?accounts=$aa2&account=$aa&date=$aa7'/>Print<img src='ico/Info.ico' alt='Smiley face' height='12' width='12'></a></td>";



      




echo"</tr>";
   

      $i++;
  
       
}

      echo"</table>";









      




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

      
echo"<td width ='100' align ='right'>";
      
echo"</td>";
      

echo"<td width ='120' align ='right'>";
      
echo"</td>";
      

echo"<td width ='100' align ='right'><h4>$tot</h4></td>";
      

echo"<td width ='50'></td>";



      




echo"</tr>";
   


      echo"</table>";



      //$myfile =gethostname();

      //$query= "DELETE * FROM $myfile WHERE ref_no <>''" or die(mysql_error());

      //$result =mysql_query($query) or die(mysql_error());


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

