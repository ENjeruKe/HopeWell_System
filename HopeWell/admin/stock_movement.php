<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
    
$store_select = $_SESSION['store_select'];
if ($store_select<>''){
}else{
    echo"<p align ='center'><font color ='red'><h1>Kindly select the Store Location before you can proceed</p></font>";
    die();
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
?>




<?php
  $company_identity = $_SESSION['company'];
  $location1 = $_SESSION['company'];
  $branch     = $_SESSION['company'];
  $date2 = date('y-m-d');
  $date1 = date('y-m-d');
  if (isset($_GET['print'])){
    $search = $_GET['search'];
    $searcht = $_GET['searcht'];
    $date1  = $_GET['date1'];
    $date2  = $_GET['date2'];
    $location1 =  $searcht;
    $branch = $_SESSION['store_select'];
    //$search = $_SESSION['store_select'];
    //$searcht= $_SESSION['store_select'];
    
   //Get the account Number of this very account
   //--------------------------------------------
   $query= "SELECT * FROM stockfile WHERE description ='$search'  ORDER BY description" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "SELECT * FROM stockfile WHERE description ='$search'  ORDER BY description" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
   {         
      $acc_no      = mysql_result($result,$i,"id");  
      $acc_name    = mysql_result($result,$i,"description");  
      $caddress1    = mysql_result($result,$i,"location");   
      $caddress2    = '';
   }

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


   echo"<h2>$company</h2>";
   echo"<h3>Stock Movement Report</h3>";

   echo"<font size ='2'>";
   echo"<table width ='900'>";      
   echo"<tr><td align ='left'><b><u>A/C DETAILS</u></b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
   echo"<tr><td align ='left'><b>$acc_name</b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress2</b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress1</b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
   echo"</table><br>";
   $to ='  To  ';
   echo"Report Date Range From :.$date1.  $to. $date2";

 

$tot =0;
$i = 0;

echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
echo"<tr><td bgcolor ='black'><font color ='white'>Date</font></td>";
echo"<td bgcolor ='black'><font color ='white'>Doc No</font></td>";
echo"<td bgcolor ='black'><font color ='white'>Description of Services</font></td>";
echo"<td bgcolor ='black'><font color ='white'>Ref No</font></td>";
echo"<td bgcolor ='black'><font color ='white'>Type</font></td>";
echo"<td bgcolor ='black'><font color ='white'>In</font></td>";
echo"<td bgcolor ='black'><font color ='white'>Out</font></td>";
echo"<td bgcolor ='black'><font color ='white'>Balance</font></td></tr>";
//echo"<hr>";





//Get opening balance
//-------------------

if (isset($_GET['search'])){
   $search = $_GET['search'];
   
   
   $SQL    = "select * FROM st_trans WHERE description = '$acc_name' AND location ='$branch' ORDER BY date"; 
   $query  = "select * FROM st_trans WHERE description = '$acc_name' AND location ='$branch' ORDER BY date"; 
 }else{
  $SQL= "SELECT * FROM st_trans WHERE location ='$branch' ORDER BY date" or die(mysql_error());
  $query  = "select * FROM st_trans WHERE description = '$acc_name' AND location ='$branch' ORDER BY date"; 
}
$hasil=mysql_query($SQL, $connect);
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());

$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$open_bal = 0;
echo"<font size ='1'>";
$date1 = strtotime($date1);

$yr = date("Y", $date1); 
$mon = date("m", $date1); 
$date= date("d",$date1); 

$date1 ="$yr-$mon-$date";

while ($row=mysql_fetch_array($hasil)) 
      { 
      $codes   = mysql_result($result,$i,"date");  
      if ($date1 > $codes){;     
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"qty");   
      $code    = mysql_result($result,$i,"ref_no");   
      $update = "";
      $service = mysql_result($result,$i,"trans_desc");  
      $contact = mysql_result($result,$i,"ref_no");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"type");  
      $total   = mysql_result($result,$i,"qty");  
      $qty     = 0;
      $codes2 = $rate; 
      $update2 = $codes2; 
      $tot = $tot +$total;
      $update2 = number_format($update2);
      $tot2 = number_format($tot);
      $rate = number_format($rate);
      $open_bal = $open_bal +$total;
      }
     $i++;  
}
//End of opening balance
//----------------------

$i=0;

if (isset($_GET['search'])){
   $search = $_GET['search'];
   $SQL = "select * FROM st_trans WHERE description = '$acc_name' AND location ='$branch' AND date >='$date1' AND date <= '$date2'
ORDER BY date"; 
 }else{
  $SQL= "SELECT * FROM st_trans ORDER BY date" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);
$query  = "select * FROM st_trans WHERE description = '$acc_name' AND location ='$branch' AND date >='$date1' AND date <= '$date2' ORDER BY date"; 
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());

$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$first = 'Yes';
$total = 0;
$tot = $open_bal;
echo"<font size ='1'>";
while ($row=mysql_fetch_array($hasil)) 
      {         
      //Show opening balance if any
      //---------------------------
   
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"trans_desc");   
      $rate    = mysql_result($result,$i,"qty");   
      $code    = mysql_result($result,$i,"ref_no");   
      $update = "";
      $service =mysql_result($result,$i,"type");  
      $contact = mysql_result($result,$i,"ref_no");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"adm_no");  
      $total   = mysql_result($result,$i,"qty");  

      $tot = $tot +$total;
      $qty     = 0;
      $codes2 = $rate; 
      $update2 = $codes2; 
      $update2 = number_format($update2);
      $tot2 = number_format($tot);
      $rate = number_format($rate);

      //End of show opening balance
      //---------------------------
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='50' align ='left'>";      
      echo "$code";
      echo"</td>";
      echo"<td width ='380' align ='left'>";      
      echo strtolower("$service");
      echo " - ".strtolower("$pay_mode");
      echo"</td>";
      echo"<td width ='60' align ='left'>";      
      echo strtoupper("$code");
      echo"</td>";
      echo"<td width ='50' align ='left'>";      
      echo strtoupper("$desc");
      echo"</td>";
      echo"<td width ='50' align ='right'>";
      echo"</td>";  
      $bb =$row['acc_no'];                    
      echo"<td width ='50' align ='right'>";
      if ($rate > 0){
         echo"$update2";
      }
      echo"</td>";
      echo"<td width ='60' align ='right'>";
      if ($rate < 0){
         echo"$update2";
      }
      echo"</td>";              
      echo"<td width ='50' align ='right'>";
      echo"</td>";              
      echo"</tr>";
      $i++;      
     }
     
     
      $query6 = "SELECT * FROM stockfile WHERE description = '$acc_name' AND location ='$branch'"; 	 
      $result6 = mysql_query($query6) or die(mysql_error());
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num6 =mysql_numrows($result6) or die(mysql_error());
      $i6 =0;
      while ($i6 < $num6){
            $balance   = mysql_result($result6,$i6,"qty");  
            $i6++;
      }      
      
     
      echo"</table>";
      echo"<hr>";
      echo"<table border='0'>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><b>";      
      echo"<b>Balance</b>";      
      echo"</b></td>";      
      echo"<td width ='70' align ='right'>";      
      echo"</td>";      
      echo"<td width ='30' align ='right'>$balance";      
      echo"</td>";      
      //echo"<td width ='70' align ='right'><b>$balance</b></td>";      
      echo"</tr>";   
      echo"</table>";
      echo"<hr>";

}else{
?>





<!DOCTYPE html>
<html lang="en">
  
<?php




   echo"<h1>Stock Movement Report</h1><br><br>";
   echo"<form action ='stock_movement.php' method ='GET'>";
   //echo"<input type='submit' name='print'  class='button' value='Print Report'>";

   echo"<table>";

echo"<tr><td>Item Description:</td><td>";
   echo"<select id='search' name='search'>"; 
   $cdquery="SELECT description FROM stockfile where location ='$store_select' ORDER BY description";
//WHERE location ='$branch'
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   while ($cdrow=mysql_fetch_array($cdresult)) {
         $cdTitle=$cdrow["description"];
   echo "<option>$cdTitle</option>";            
   }
   echo"</select></td><td></td><tr>";


 echo"<tr><td>Date Range From</td><td><input type='text' name='date1' value ='$date1' size='12' ></td><td> To 
Date</td><td><input type='text' name='date2' value ='$date2' size='12'></td></tr>";

echo"<tr><td><input type='submit' name='print'  class='button' value='Print Statement'></td></tr></table>";

echo"</FORM>";

if ($store_select<>''){
   echo"<p align ='center'><font color ='red'><h1>Store Location: ".$store_select;
   echo"</p></font>";
}else{
    echo"<p align ='center'><font color ='red'><h1>Kindly select the Store Location before you can proceed</p></font>";
    die();
}   
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







