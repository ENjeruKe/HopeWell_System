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
?>



<?php
 $branch     = $_SESSION['branch']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 if (isset($_GET['print'])){
    $search = $_GET['search'];
    $date1  = $_GET['date1'];
    $date2  = $_GET['date2'];


   //<img src='space.jpg' style='width:20px;height:2px;'>
   //Get the account Number of this very account
   //--------------------------------------------
   $query= "SELECT * FROM glaccountsf WHERE account_name ='$search' ORDER BY account_name" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "SELECT * FROM glaccountsf WHERE account_name ='$search' ORDER BY account_name" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      //$acc_no      = mysql_result($result,$i,"client_id");  
      $acc_name    = mysql_result($result,$i,"account_name");  
      $caddress1    = mysql_result($result,$i,"type");   
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
   echo"<h3>G/L Ttransaction by Account</h3>";

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
echo"<hr>";                                                         
echo"<table width ='100%' border ='1'><b><tr>";
echo"<th width ='10%' bgcolor ='black'><font color ='white'>Date</th>";
//echo"<td width ='10%'>INV No.</th>";
echo"<th width ='20%' bgcolor ='black' align ='right'><font color ='white'>Description of Services</th>";
echo"<th width ='10%' bgcolor ='black'><font color ='white'>Ref No.</th>";
echo"<th width ='40%' bgcolor ='black'><font color ='white'>Narration</th>";
echo"<th width ='10%' bgcolor ='black'><font color ='white'>Debit</th>";
echo"<th width ='10%' bgcolor ='black'><font color ='white'>Credit</th>";
echo"<th width ='10%' bgcolor ='black'><font color ='white'>Balance</th></font>";
echo"</b></tr>";
//echo"<hr>";


//Get opening balance
//-------------------
if (isset($_GET['search'])){
   // echo "1";
   $search = $_GET['search'];
   $SQL    = "select * FROM gltransf WHERE account_name = '$acc_name' and date >='$date1' and date <='$date2' ORDER BY date"; 
   $query  = "select * FROM gltransf WHERE account_name = '$acc_name' and date >='$date1' and date <='$date2' ORDER BY date"; 
 }else{
    // echo "2";
  $SQL= "SELECT * FROM gltransf ORDER BY date and date >='$date1' and date <='$date2'" or die(mysql_error());
  $query  = "select * FROM gltransf WHERE account_name = '$acc_name' and date >='$date1' and date <='$date2' ORDER BY date"; 
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
//echo "3";
$date1 ="$yr-$mon-$date";

while ($row=mysql_fetch_array($hasil)) 
      { 
      $codes   = mysql_result($result,$i,"date");  
      //echo 'Code'.$codes;
      //if ($date1 >= $codes){;     
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"amount");   
      $code    = mysql_result($result,$i,"ref_no");   
      $update = "";
      $service = mysql_result($result,$i,"narration");  
      $contact = mysql_result($result,$i,"branch");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"type");  
      $total   = mysql_result($result,$i,"amount");  
      $qty     = 0;
      $codes2 = $rate; 
      $update2 = $codes2; 
      $tot = $tot +$total;
      $update2 = number_format($update2);
      $tot2 = number_format($tot);
      $rate = number_format($rate);
      $open_bal = $open_bal +$total;
      //}
     $i++;  
}
//End of opening balance
//----------------------

$i=0;
//echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $SQL = "select * FROM gltransf WHERE account_name = '$acc_name' AND date >='$date1' AND date <= '$date2'
ORDER BY date"; 
 }else{
  $SQL= "SELECT * FROM gltransf ORDER BY date" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);

$query  = "select * FROM gltransf WHERE account_name = '$acc_name' AND date >='$date1' AND date <= '$date2' ORDER BY date"; 
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());

$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
$first = 'Yes';
$total = 0;
$tot = 0;
//$open_bal;
echo"<font size ='1'>";
while ($row=mysql_fetch_array($hasil)) 
      {         
      //Show opening balance if any
      //---------------------------
      if ($open_bal <>0){
         echo"<!--tr>";
         echo"<td width ='10%' align ='left'>";      
         echo"$codes";
         echo"</td>";
         echo"<td width ='20%' align ='left'>";      
         echo 'Balance B/F';
         echo"</td>";
         echo"<td width ='10%' align ='left'>";      
         //echo strtoupper("$code");
         echo"</td>";
         echo"<td width ='40%' align ='left'>";      
         //echo strtoupper("$desc");
         echo"</td>";
         echo"<td width ='10%' align ='right'>";
         echo"</td>";              
         echo"<td width ='10%' align ='right'>";
         echo"</td>";              
         echo"<td width ='10%' align ='right'>";
         echo strtolower("$open_bal");
         echo"</td></tr-->";
         //$tot = $tot +$open_bal;
         $open_bal = 0;
      }



      
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
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
     if ($contact=='INCOME'){
         if ($total < 0){
             $total = $total*-1;
         }
     }
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
    
<meta charset="utf-8">

<?php













   echo"<form action ='repo_gl_transactions.php' method ='GET'>";
   //echo"<input type='submit' name='print'  class='button' value='Print Report'>";

   echo"<table><tr><td>G/L Account</td><td>";
   echo"<select id='search' name='search'>"; 
   $cdquery="SELECT account_name FROM glaccountsf ORDER BY account_name";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   while ($cdrow=mysql_fetch_array($cdresult)) {
         $cdTitle=$cdrow["account_name"];
   echo "<option>$cdTitle</option>";            
   }
   echo"</select></td><td></td>";


 echo"<tr><td>Date Range From</td><td><input type='text' name='date1' value ='$date1' size='12' ></td><td> To 
Date</td><td><input type='text' name='date2' value ='$date2' size='12'></td></tr>";

echo"<tr><td><input type='submit' name='print'  class='button' value='Print Statement'></td></tr></table>";

echo"</FORM>";

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


