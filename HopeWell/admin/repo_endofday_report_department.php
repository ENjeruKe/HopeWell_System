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
   $time1 = $_GET['time1'];
   $time2 = $_GET['time2'];

   $date1x = $date1.$time1;
   $date2x = $date2.$time2;
   
   $date1z = $date1.' '.$time1;
   $date2z = $date2.' '.$time2;
   
   
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
   echo"<table width ='500'>";      
   echo"<tr><td align ='left'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$address3</b></td></tr>";
   echo"</table><br>";
   echo"<h3><u>COLLECTION REPORT BY DEPARTMENT</u></h3><img src='space.jpg' style='width:20px;height:2px;'>";
   //echo"<img src='ico/black.jpg' style='width:500px;height:1px;'><br>";

   $today = date('y/m/d');


   //$query13 = "DROP TABLE summary IF EXISTS summary";
   $query13 = "DROP TABLE summary";
   $result13 =mysql_query($query13);
   
   //$query3 = "DROP TABLE summary2 IF EXISTS summary2";
   $query3 = "DROP TABLE summary2";
   $result3 =mysql_query($query3);
   
   $query3 = "CREATE TABLE summary SELECT location, inputby from receiptf where date >= '$date1' and date <='$date2'";
   $result3 = mysql_query($query3);
   
   echo $date1x;
   echo $date2x;
   
   //Get all receipts from receiptf and add invoices from htransf
   //------------------------------------------------------------
   $query32 = "CREATE TABLE summary2 SELECT location, inputby,total,date,time from receiptf where date >= '$date1' and date <='$date2'";
   
   //where date >= '$date1' and date <='$date2'";
   $result32 = mysql_query($query32);
   

//$query3 = "DELETE FROM summary2 WHERE total > 0";
 //  $result3 =mysql_query($query3);
  
   
//Now get info from htransf
//-------------------------
$sql3s="SELECT * FROM htransf where type ='DB' and invoice_no<>' ' and date >= '$date1' and date <='$date2'";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;

while ($i3s < $num3s)
      {
      $a0        = mysql_result($result3s,$i3s,"id"); 
      $a1        = mysql_result($result3s,$i3s,"trans2"); 
      $a2        = mysql_result($result3s,$i3s,"date");        
      $a3        = mysql_result($result3s,$i3s,"amount");        
      $a4        = mysql_result($result3s,$i3s,"username");  
      $a5        = mysql_result($result3s,$i3s,"company");  
   
   //echo"ID:".$a0."Amount".$a3."<br>";
   
$query5= "INSERT INTO summary2 (location, date, total, inputby, time) VALUES('$a1','$a2','$a3','$a4','$a5')";

   //$query5= "INSERT INTO summary2 VALUES('','','','','')";

   $result5 =mysql_query($query5); 
   
       $i3s++;
       //echo "No:".$i3++;
}
   
   //die();
   
   
   
   $tot_credx =0;   
   
echo"<h4>From Date:&nbsp&nbsp$date1z&nbsp&nbspTo Date&nbsp&nbsp$date2z</h4>";
   echo"<table width ='100%' border ='1'><tr><th width ='80%' bgcolor ='black' align ='left'><font color ='white'>Narration</th><th width ='20%' bgcolor ='black' align='center'><font color ='white'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspAmount</th></tr>";   
   
$sql3s="SELECT location, inputby FROM summary GROUP BY location";
$result3s = mysql_query($sql3s);
$num3s =mysql_numrows($result3s);
$found ='No';
$i3s =0;

while ($i3s < $num3s)
      {
      $department     = mysql_result($result3s,$i3s,"location"); 
      $usernamex        = mysql_result($result3s,$i3s,"inputby");        
       
   //echo"<tr><th width ='20' align ='left'><font color ='blue'><b>xxxx$usernamex</th><th width ='50'></th></tr>";   
   
   //$query = "SELECT location, inputby, sum(total) FROM receiptf WHERE date >= '$date1' and date <='$date2' and inputby ='$usernamex' GROUP BY location"//; 
   
   
   
   $query = "SELECT location, inputby,date,time, sum(total) FROM summary2 WHERE CONCAT(date, time) >= '$date1x' and CONCAT(date, time) <='$date2x' GROUP BY location"; 
   //and inputby ='$usernamex' 
   
   
   
   
   
   $result = mysql_query($query) or die(mysql_error());
   $tot_cred =0;
   // Print out result
   while($row = mysql_fetch_array($result)){
	echo "<tr><td width ='300'>";
        echo $row['location'];
        $amount = $row['sum(total)'];
        echo"</td><td width = '10' align ='right'>"; 
        //if ($amount >0){
           echo number_format($row['sum(total)']);
        //}
        echo"</td>"; 
        //if ($amount <0){
        //   echo number_format($row['sum(amount)']);
        //}
        echo"</tr>";
        $tot_cred = $tot_cred+$amount;
        $tot_credx =$tot_credx+$amount;
   }
   $tot_cred = $tot_cred;
   $yes_income = $tot_cred;
   $income =number_format($tot_cred);
 echo"<tr><td></td><td align ='right'><font color ='black'>TOTAL SALES&nbsp&nbsp&nbsp$income</td></tr></font>";
   //echo 'Count'.$i3s;
   $i3s = $i3s+1000;
   $i3s++;
}










 












echo"</table>";

echo"<br><br><br><br>";
 $incomex =number_format($tot_credx);
 $sat =$tot_credx+ $pti;
$incom =number_format($sat);
 
// echo"<table width ='100%'><tr><td width ='20'></td><td align 
//='right' width ='150'><font color ='black'>GROSS SALES Without //Invoice&nbsp&nbsp&nbsp$incomex</td></tr></font></table>";
  
  
 echo"<table width ='100%'><tr><td width ='20'></td><td align ='right' width ='150'><font color ='black'>GROSS SALES &nbsp&nbsp&nbsp$incom</td></tr></font></table>";

      echo"<hr>";
  






      echo"<hr>";






$query3 = "DROP TABLE summary";
$result3 =mysql_query($query3);
   

}else{

?>
<!-- Now working on main page -->







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




   $date1 = date('y-m-d');
   $date2 = date('y-m-d');
   echo"<form><table width ='400' border='0' border color ='black'>";
   echo"<tr><td width ='100' align ='right'><b>From Date: </b></td><td><input type='date' name='date1' size='20' value='$date1'></td></tr>";
   echo"<tr><td width ='100' align ='right'><b>To Date: </b></td><td><input type='date' name='date2' size='20' value='$date2'></td></tr>";
   
   
   echo"<tr><td width ='100' align ='right'><b>Start Time: </b></td><td><input type='text' name='time1' size='20' value='00:00:00'></td></tr>";
   echo"<tr><td width ='100' align ='right'><b>End Time: </b></td><td><input type='text' name='time2' size='20' value='24:60:60'></td></tr></table>";
   
   
   
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


