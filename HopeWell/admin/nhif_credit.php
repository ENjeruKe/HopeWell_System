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
  	<?php include 'includes/account/in_pat.php'; ?>

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
//session_start();
  $adm_no   = $_SESSION['adm_no'];
  $adm_date = $_SESSION['adm_date'];
  $dis_date = $_SESSION['dis_date'];
  $days     = $_GET['days'];
  $nhif_reg = $_SESSION['nhif_reg'];
  $amount   = $_SESSION['amount'];
  $name     = $_SESSION['patient'];
  $ref_nos  = $_GET['ref_no'];
  $nhif_reg = $_GET['nhif_reg'];
  $date     = $_GET['date'];
?>
<!DOCTYPE html>
<html lang="en">
  


<?php

if (isset($_GET['billing']))
   {

     if ($amount==0){
        echo"<font color ='red'>Transaction NOT saved.Zero Credit Amount is invalid.....</font>";
        die();
     }
      //Get info from getnhif.php file


      $mnhif_acc= 'NHIF';


      //$user = "hmisglobal";
      //$pass = "jamboafrica";
      //$database = "hmisglob_griddemo";
      //$host = "localhost";
      //$connect = mysql_connect($host,$user,"$pass")or die ("Unable to connect");
      //mysql_select_db($database) or die ("Unable to select the database");
      $total = 0;
      //Get the invoice No.
      $query3 = "select * FROM companyfile" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ref_no     = mysql_result($result3,$i3,"next_ref"); 
        $nhif_acc   = mysql_result($result3,$i3,"NHIF_ACC"); 
        $debt_control     = mysql_result($result3,$i3,"DEBT_CONTROL"); 
        $nhif_control     = mysql_result($result3,$i3,"NHIF_CONTROL"); 

        $i3++;
        }
        $ref_no2 = $ref_no +1;
        $query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
        $result3 = mysql_query($query3);
        $mydate = date('y-m-d');
        $desc = $name;
        //.' Reg:'.$nhif_reg;
        //Now go and post credit to the bill

     $query  = "INSERT INTO htransf VALUES('$adm_no','$desc','$date','$ref_nos','NHIF CARD','CR','-$amount','Yes','NHIF REBATE','IP/OPD','','','','','','')";
     $result =mysql_query($query);

//        $query= "INSERT INTO htransf   
//        VALUES('$adm_no','$name','$date','$ref_nos','$desc','','-$amount','IP','NHIF','CR','   
//        ','ADMIN',' ','$mydate','$days','NHIF')";
//         $result =mysql_query($query);

      $query = "select * FROM debtorsfile WHERE account_name='$nhif_acc'" ;
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $i=0;
      while ($i < $num)
        {
        $balances = mysql_result($result,$i,"os_balance"); 
        $i++;
        }
        $balance = $balances + $amount;
        $query3  = "UPDATE debtorsfile SET os_balance ='$balance' WHERE account_name ='$nhif_acc'";
        $result3 = mysql_query($query3);


        //Now go and post the same entry in dtransf
        $query= "INSERT INTO dtransf 
        VALUES('$nhif_acc','$date','$desc','$ref_nos','$adm_no','INV','$amount','$amount','ADMIN')";
        $result =mysql_query($query);

        //Now go and pass a Debit entry in G/Ledger
        $query= "INSERT INTO gltransf VALUES('   
        ','$date','$debt_control','$ref_nos','INV','$desc','$amount','ADMIN','CHIROMO')";
        $result =mysql_query($query);

        $query = "select * FROM glaccountsf WHERE account_name='$debt_control'" ;
        $result =mysql_query($query) or die(mysql_error());
        $num =mysql_numrows($result) or die(mysql_error());
        $i=0;
        while ($i < $num)
           {
           $balances = mysql_result($result,$i,"balance"); 
           $i++;
           }
           $balance = $balances + $amount;
           $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='$debt_control'";
           $result3 = mysql_query($query3);
           //Now go and pass a Credit entry in G/Ledger
           $query= "INSERT INTO gltransf VALUES(' ','$date','$nhif_control','$ref_nos','INV','$desc','-    
           $amount','ADMIN','CHIROMO')";
           $result =mysql_query($query);
           echo"3";  

           $query = "select * FROM glaccountsf WHERE account_name='$nhif_control'" ;
           $result =mysql_query($query) or die(mysql_error());
           $num =mysql_numrows($result) or die(mysql_error());
           $i=0;
           while ($i < $num)
             {
             $balances = mysql_result($result,$i,"balance"); 
             $i++;
             }
             $balance = $balances - $amount;
             $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='$nhif_control'";
             $result3 = mysql_query($query3);


}

?>




<body>



<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getnhif.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>



<form action ="nhif_credit.php" method ="GET">
<?php


 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";

 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
 //Get the receipt No.


$code2 =' ';
$sql="SELECT * FROM revenuef WHERE name ='$code2'";
$result=mysql_query($sql);	 
$rows=mysql_fetch_array($result);

if (isset($_GET['revenue_search'])){
   $code2=$_GET['supplier'];
   $sql="SELECT * FROM revenuef WHERE name ='$code2'";
   $result=mysql_query($sql);	 
   $rows=mysql_fetch_array($result);
   }







   
 $query3 = "select * FROM companyfile" ;
 $result3 = mysql_query($query3) or die(mysql_error());
 $num3 = mysql_numrows($result3) or die(mysql_error());
 $i3=0;
 while ($i3 < $num3)
  {
  $ref_no   = mysql_result($result3,$i3,"next_sup_inv");
  $i3++;
  }
  $ref_no = $ref_no;
  //$query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
  //$result3 = mysql_query($query3);
  //Will update next ref when saving this transaction

$date = date('y-m-d');


$dateValue = strtotime($date);

$yr = date("Y", $dateValue); 
$mon = date("m", $dateValue); 


$ref_nos = $yr.$mon.$ref_no;

echo"<table width ='400' border='0' border color ='black'>";
echo"<tr><td width ='50' align ='right'><b>Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td>";
echo"<tr><td width='50' align='right'><b>Claim No.: </b></td><td><input type='text' name='ref_no' size='20' value ='$ref_nos'></td></tr>";
//Select the patient

//chaged  patient to adm no line 2 from here
echo"<tr><td width='100' align='right'><b>Adm no: </b></td><td>";
echo"<input type='text' name='adm_no' size='20' onchange='showUser(this.value)'>";
//echo"<select id='patient' name='patient'  onchange='showUser(this.value)'>";        

//$cdquery="SELECT patients_name,client_id FROM clients ORDER BY patients_name ";
//$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());            
//while ($cdrow=mysql_fetch_array($cdresult)) {
//  $cdTitle=$cdrow["patients_name"];
//  echo "<option>$cdTitle</option>";            
//  }
// echo"</select>";

echo"</td></tr>";




echo"<table><tr><div id='txtHint'><b>Patient info will be listed here...</b></div></tr></table>";

echo"<table width ='400' border='0' border color ='black'><td align ='center'><input type='submit' name='billing'  class='button' value='Save '></td></table></form>";

?>










</body>
</html>












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


