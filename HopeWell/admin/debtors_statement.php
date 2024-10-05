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
  	<?php include 'includes/account/state.php'; ?>

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

 require('open_database.php');

 $branch     = $_SESSION['branch']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 if (isset($_GET['print'])){
    $search = $_GET['search'];
    $date1  = $_GET['date1'];
    $date2  = $_GET['date2'];

   echo"<h2><u>DEBTORS STATEMENT OF ACCOUNT</u></h2>";

   //--------------------------------------------
   $query= "SELECT * FROM debtorsfile WHERE account_name ='$search' ORDER BY account_name" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "SELECT * FROM debtorsfile WHERE account_name ='$search' ORDER BY account_name" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $acc_no      = mysql_result($result,$i,"accno");  
      $acc_no2      = mysql_result($result,$i,"client_id");  
      $acc_name    = mysql_result($result,$i,"account_name");  
      $caddress1    = mysql_result($result,$i,"telephone_no");   
      $caddress2    = mysql_result($result,$i,"address");   
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
   echo"<font size ='2'>";
   echo"<table width ='900'>";      
   echo"<tr><td align ='left'><b>$acc_no</b></td><td width ='50'></td><td align ='left'><b>$company</b></td></tr>";
   echo"<tr><td align ='left'><b>$acc_name</b></td><td width ='50'></td><td align ='left'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress2</b></td><td width ='50'></td><td align ='left'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left'><b>$caddress1</b></td><td width ='50'></td><td align ='left'><b>$address3</b></td></tr>";
   echo"</table><br>";
   $to ='  To  ';
   echo"Report Date Range From :.$date1.  $to. $date2";
   $query  = "select * FROM dtransf WHERE trim(acc_no) = '$search' AND date >='$date1' AND date <= '$date2' ORDER BY date"; 
   //OR acc_no = '$acc_no2' OR acc_no = '$acc_name' 
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());





$tot =0;
$i = 0;
                                                         
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Adm No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:150px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:40px;height:2px;'>";
echo"Type<img src='space.jpg' style='width:50px;height:2px;'>";
echo"<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Debit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Credit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


echo"<table class='altrowstable' id='alternatecolor' border ='0'>";
if (isset($_GET['search'])){
   $search = $_GET['search'];
   //$SQL ="select * FROM dtransf WHERE acc_no = '$acc_no' AND date >='$date1' AND date <= '$date2' ORDER BY date" ;   
   $SQL = "select * FROM dtransf WHERE trim(acc_no) = '$search'  AND date >='$date1' AND date <= '$date2' ORDER BY date"; 
// OR acc_no = '$acc_no2' OR acc_no = '$acc_name'

 }else{
  $SQL= "SELECT * FROM dtransf ORDER BY date" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
$debit  = 0;
$credit = 0;
echo"<font size ='1'>";
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"balance");   
      $code   = mysql_result($result,$i,"doc_no");   
      $update = mysql_result($result,$i,"adm_no");  
      $contact = mysql_result($result,$i,"description");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"type");  
      $total   = mysql_result($result,$i,"balance");  
      $qty     = 0;

      $codes2 = $rate; 
      $update2 = $codes2;

      $tot = $tot +$total;
      $update2 = number_format($update2);
      $tot2 = number_format($tot);
      $rate = number_format($rate);
      echo"<tr>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='100' align ='left'>";      
      echo strtoupper("$update");
      //strtolower
      echo"</td>";
      echo"<td width ='280' align ='left'>";      
      echo strtoupper("$contact");
      echo"</td>";

      echo"<td width ='60' align ='left'>";      
      echo strtoupper("$code");
      echo"</td>";

      echo"<td width ='50' align ='left'>";      
      echo strtoupper("$desc");
      echo"</td>";

      echo"<td width ='50' align ='right'>";
      //echo"$update2";
      echo"</td>";  

      $bb =$row['acc_no'];                    
      echo"<td width ='50' align ='right'>";
      if ($rate > 0){
         echo"$update2";
      }
      echo"</td>";
      $aa =$row['doc_no'];        
      //$aa2 =$row['payer'];   
      $aa3=$row['description'];        
      $aa4=$row['type'];   
      //$aa5=$row['towards'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];

    
      echo"<td width ='60' align ='right'>";
      if ($rate < 0){
         echo"$update2";
      }
      echo"</td>";              
      echo"<td width ='50' align ='right'>";
      //echo"$update2";
      echo"</td>";              

      echo"<td width ='60' align ='right'>";
      echo strtolower("$tot2");
echo"</td></tr>";
      $i++;      
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
      echo"Total";      
      echo"</b></td>";      
      echo"<td width ='70' align ='right'>";      
      //echo"$debit";
      echo"</td>";      
      echo"<td width ='30' align ='right'>";      
      //echo"$credit";
      echo"</td>";      
      //echo"<td width ='70' align ='right'></td>";      
      echo"<td width ='50' align ='right'></td>";      
      echo"<td width ='50' align ='right'><b>$tot</b></td>";
      echo"</tr>";   
      echo"</table>";
      echo"<hr>";

}else{

?>


<?php


 
   echo"<h1>Debtors Statement of Account</h1><br><br>";
   echo"<form action ='debtors_statement2.php' method ='GET'>";
   echo"<input type='submit' name='print'  class='button' value='Print Report'>";
   //echo"<input type='text' name='search' size='30'>


   echo"<select id='search' name='search'>"; 
   $cdquery="SELECT account_name FROM debtorsfile ORDER BY account_name";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
   while ($cdrow=mysql_fetch_array($cdresult)) {
         $cdTitle=$cdrow["account_name"];
   echo "<option>$cdTitle</option>";            
   }
   echo"</select><br>";





 echo"Date Range From : <input type='text' name='date1' value ='$date1' size='12' > To Date: <input type='text' name='date2' value ='$date2' size='12'><br>";
//echo"<input type='submit' name='print'  class='button' value='Print'>";
echo"</FORM>";


$today = date('y/m/d');
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $date1  = $_GET['date1'];
   $date2  = $_GET['date2'];
   $query  = "select * FROM dtransf WHERE description LIKE '%$search%' AND date >='$date1' AND date <= '$date2' ORDER BY date" ;
 }else{
   $query= "SELECT * FROM dtransf WHERE balance > 0 and type='TRF' ORDER BY acc_no,date" or die(mysql_error());
}
$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());
$tot =0;
$i = 0;

//echo"<table bgcolor ='black' border ='0'>";

                                                         
//echo"<table class='altrowstable' id='alternatecolor'>";
//echo"<tr><th>Date</th><th>Payer Description </th><th width ='300'>Servis Description</th><th>Amount</th><th>Action</th></tr>";
echo"<div><b>";
echo"<hr>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Adm No.<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:100px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:40px;height:2px;'>";
echo"Type<img src='space.jpg' style='width:50px;height:2px;'>";
//echo"<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Debit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Credit<img src='space.jpg' style='width:30px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";


//echo"<table class='altrowstable' id='alternatecolor' border //
//='0'>";
echo"<table width ='100%'>";
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $SQL ="select * FROM dtransf WHERE description LIKE '%$search%' AND date >='$date1' AND date <= '$date2' ORDER BY date" ;
   //"select * FROM receiptf WHERE towards LIKE '%$search%' ORDER BY date" ;
   
 }else{
   $SQL= "SELECT * FROM dtransf WHERE acc_no <>'NHIF' and type='TRF' ORDER BY acc_no,date" or die(mysql_error());
}
$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;


while ($row=mysql_fetch_array($query)) 
      {         
      $codes   = mysql_result($result,$i,"date");  
      $desc    = mysql_result($result,$i,"type");   
      $rate    = mysql_result($result,$i,"balance");   
      $code   = mysql_result($result,$i,"doc_no");   
      $update = mysql_result($result,$i,"adm_no");  
      $contact = mysql_result($result,$i,"description");  
      $street  = mysql_result($result,$i,"type");  
      $pay_mode= mysql_result($result,$i,"type");  
      $total   = mysql_result($result,$i,"balance");  
      $qty     = 0;

      $codes2 = $total; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);
      $rate = number_format($total);
      echo"<tr'>";
      echo"<td width ='100' align ='left'>";      
      echo"$codes";
      echo"</td>";
      echo"<td width ='70' align ='left'>";      
      echo"$update";
      echo"</td>";
      echo"<td width ='300' align ='left'>";      
      echo"$contact";
      echo"</td>";

      echo"<td width ='50' align ='left'>";      
      echo"$code";
      echo"</td>";
      echo"<td width ='50' align ='left'></td>";
      echo"<td width ='50' align ='left'>";      
      echo"$desc";
      echo"</td>";    
      echo"<td width ='50' align ='right'>";
      if ($pay_mode=='TRF' OR $pay_mode=='INV'){
         echo"$update2";
      }
      echo"</td>";  

      echo"<td width ='50' align ='right'>";
      if ($pay_mode=='TRF' OR $pay_mode=='INV'){
      }else{
         echo"$update2";
      }
      echo"</td>";
      echo"<td width ='50' align ='left'></td>";
  
      $bb =$row['acc_no'];                    
      $_SESSION['acc_no'] =$row['acc_no'];  
      $aa =$row['doc_no'];        
      $aa2 =$row['desc'];   
      $aa3=$row['desc'];        
      $aa4=$row['type'];   
      $aa5=$row['adm_no'];   
      $aa6=$row['type'];        
      $aa7=$row['date'];              
      echo"<td width ='100' align ='right'>$tot</td>";
echo"</tr>";
      $i++;      
     }
      echo"</table>";
echo"<hr>";
      echo"<table>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='700' align ='left'></td>";
      echo"<td width ='150'><h4></td>";      
      echo"Total";      
      echo"</h4></td>";      
      echo"<td width ='100' align ='right'><h4>$tot</h4></td>";      
      echo"</tr>";   
      echo"</table>";
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


