<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 


<?php
session_start();
require('open_database.php');
?>



<?php
 $branch     = $_SESSION['branch']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 if (isset($_GET['print'])){
    $search = $_GET['search'];
    $date1  = $_GET['date1'];
    $date2  = $_GET['date2'];

    $amount1  = $_GET['amount1'];
    $amount2  = $_GET['amount2'];

    $ref1  = $_GET['ref1'];
    $ref2  = $_GET['ref2'];
    if ($amount1 <=0){
       $amount1  = -99999999;
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
   echo"<h3>G/L All Ttransaction by date</h3>";

   echo"<font size ='2'>";
   echo"<table width ='900'>";      
   echo"<tr><td align ='left'><b><u></u></b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
   echo"<tr><td align ='left'><b></b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress2</b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress1</b></td><td width ='500'></td><td align ='left'><b></b></td></tr>";
   echo"</table><br>";
   $to ='  To  ';
   echo"Report Date Range From :.$date1.  $to. $date2";

 

$tot =0;
$i = 0;
echo"<hr>";                                                         
echo"<table width ='100%' border ='1'><b><tr>";
echo"<th width ='10%' bgcolor ='black'><font color ='white'>Date</th>";
//echo"<td width ='10%'>INV No.</th>";
echo"<th width ='20%' bgcolor ='black' align ='right'><font color ='white'>Account Description</th>";
echo"<th width ='10%' bgcolor ='black'><font color ='white'>Ref No.</th>";
echo"<th width ='40%' bgcolor ='black'><font color ='white'>Narration</th>";
echo"<th width ='10%' bgcolor ='black'><font color ='white'>Debit</th>";
echo"<th width ='10%' bgcolor ='black'><font color ='white'>Credit</th>";
echo"<th width ='10%' bgcolor ='black'><font color ='white'>Balance</th></font>";
echo"</b></tr>";
//echo"<hr>";

//echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $SQL = "select * FROM gltransf WHERE amount <> 0 and ref_no >= '$ref1' and ref_no <= '$ref2' and amount >= '$amount1' and amount <= '$amount2' and date >='$date1' AND date <= '$date2' order by id"; 
 }else{
  $SQL= "SELECT * FROM gltransf" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);
$query  = "select * FROM gltransf WHERE amount <> 0 and ref_no >= '$ref1' and ref_no <= '$ref2' and amount >= '$amount1' and amount <= '$amount2' and date >='$date1' AND date <= '$date2' order by id"; 
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());

$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$first = 'Yes';
$total = 0;
$i=0;
$tot = 0;
//$open_bal;
echo"<font size ='1'>";
while ($row=mysql_fetch_array($result)) 
      {         
      //Show opening balance if any
      //---------------------------
      
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"account_name");   
      $rate    = mysql_result($result,$i,"amount");   
      $code    = mysql_result($result,$i,"ref_no");   
      $update = "";
      $bik = mysql_result($result,$i,"ref_no");   
      $service =mysql_result($result,$i,"narration");  
      $contact = mysql_result($result,$i,"branch");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"type");  
      $total   = mysql_result($result,$i,"amount");  
     $code2 = $bik;
     $code2 = substr($code,0,1);
//     if ($contact=='INCOME'){
//         if ($total < 0){
//             $total = $total*-1;
//         }
//     }
     //if ($code2=='K'){
     //    $total = $total*-1;
     //}else if ($code2<>'K'){
    //     $total = $total;
     //}
     
     
     
     $tot = $tot +$total;

      $qty     = 0;
      $codes2 = $rate; 
      $update2 = $codes2; 
      $update2 = number_format($update2);
      $tot2 = number_format($tot);
      $rate = number_format($rate);

      //End of show opening balance
      //---------------------------
      echo"<tr>";
      echo"<td width ='10%' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='20%' align ='left'>";      
      echo strtoupper("$desc");
      echo"</td>";
      echo"<td width ='10%' align ='left'>";      
      echo strtoupper("$code");
      echo"</td>";
      echo"<td width ='40%' align ='left'>";      
      echo strtolower("$service");
      echo"</td>";
      $bb =$row['acc_no'];                    
      echo"<td width ='10%' align ='right'>";
      if ($rate > 0){
         echo"$update2";
      }
      echo"</td>";
      echo"<td width ='10%' align ='right'>";
      if ($rate < 0){
         echo"$update2";
      }
      echo"</td>";              
      echo"<td width ='10%' align ='right'>";
      echo strtolower("$tot2");
      echo"</td></tr>";
      $i++;      
     }
      echo"</table>";
      echo"<hr>";
      echo"<table border='0' width ='100%'>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='80%' align ='left'>";
      echo"Total";      
      echo"</b></td>";      
      echo"<td width ='20%' align ='right'><b>$tot</b></td>";      
      echo"</tr>";   
      echo"</table>";
      echo"<hr>";

}else{
?>





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
    
<meta charset="utf-8">

<?php













   echo"<form action ='gl_transactions_bydate.php' method ='GET'>";
   //echo"<input type='submit' name='print'  class='button' value='Print Report'>";

//   echo"<table><tr><td>G/L Account</td><td>";
//   echo"<select id='search' name='search'>"; 
//   $cdquery="SELECT account_name FROM glaccountsf";
//   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
//   while ($cdrow=mysql_fetch_array($cdresult)) {
//         $cdTitle=$cdrow["account_name"];
//   echo "<option>$cdTitle</option>";            
//   }
//   echo"</select></td><td></td>";


 echo"<tr><td>Date Range From</td><td><input type='text' name='date1' value ='$date1' size='12' ></td><td> To 
Date</td><td><input type='text' name='date2' value ='$date2' size='12'></td></tr>";

 echo"<tr><td>Amount from</td><td><input type='text' name='amount1' value ='0' size='12' ></td><td> To 
Amount</td><td><input type='text' name='amount2' value ='9999999999' size='12'></td></tr>";

 echo"<tr><td>From Ref No</td><td><input type='text' name='ref1' value ='' size='12' ></td><td> To 
Ref No.</td><td><input type='text' name='ref2' value ='ZZZZZZZ' size='12'></td></tr>";


echo"<tr><td><input type='submit' name='print'  class='button' value='Print'></td></tr></table>";

echo"</FORM>";

}

?>






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


