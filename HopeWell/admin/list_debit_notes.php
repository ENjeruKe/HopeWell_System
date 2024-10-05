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
if (isset($_GET['print'])){
   $_SESSION['patient'] = $_GET['supplier'];
   $patient1 = $_SESSION['patient'];
   //echo $_SESSION['patient'];
   //$user = "hmisglobal";   
   //$pass = "jamboafrica";   
   //$database = "hmisglob_griddemo";   
   //$host = "localhost";   
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
   //mysql_select_db($database) or die ("Unable to select the database");
   //Get data from temp file and save
   //Checking if Invoice Exist
}
?>

<html>


<form action ="list_debit_notes.php" method ="GET">
    
</head>
<body> 
<!--background="images/background.jpg"-->


<?php
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 $go_on ='Yes';
//if ($go_on=='Yes'){
if (! isset($_GET['print'])){
 //$mysqlserver="localhost";
 //$mysqlusername="hmisglobal";
 //$mysqlpassword="jamboafrica";
 $go_on = 'No';
 //$link=mysql_connect($mysqlserver, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql server: 
 //".mysql_error());            
 //$dbname = 'hmisglob_griddemo';
 //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: ".mysql_error());
 
   
 $date = date('y-m-d');


 echo"<table width ='400' border='0' border color ='black'><tr><td width ='100' align ='right'><b>Print Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr><tr><td width='150' align='right'><b>To Date: </b></td><td><input type='text' name='date2' size='20' value='$date2'>";
echo"</td></tr></table>";

echo"<table width ='400' border='0' border color ='black'><td width ='100'></td><td><input type='submit' name='print'  class='button' value='Print Preview'></td></table>";
echo"</FORM><table width ='400'><td align ='center'></td></table>";

}else{
   //$user = "hmisglobal";   
   //$pass = "jamboafrica";   
   //$database = "hmisglob_griddemo";   
   //$host = "localhost";   
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
   //mysql_select_db($database) or die ("Unable to select the database");
   //Get data from temp file and save

   $date1         =$_GET['date'];
   $date2         =$_GET['date2'];
   //Checking if Invoice Exist
   
   //echo $_SESSION['patient'];
   $mm =$_SESSION['patient'];
 
   //$query= "SELECT * FROM htransf WHERE type ='DB' AND date >= '$date1' AND date <='$date2'" or die(mysql_error());
   //$result =mysql_query($query) or die(mysql_error());
   //$num =mysql_numrows($result) or die(mysql_error());
   //$tot =0;
   //$i = 0;


   //$SQL= "SELECT * FROM htransf WHERE type ='DB' AND date >= '$date1' AND date <='$date2'" or die(mysql_error());
   //$hasil=mysql_query($SQL, $connect);
   //$id = 0;
   //$nRecord = 1;
   //$No = $nRecord;
   //$ok ='No';   
   //while ($row=mysql_fetch_array($hasil)) 
   //{  
   //   $patient     = mysql_result($result,$i,"patients_name");  
   //   //if ($_SESSION['patient']==$patient){
   //      $patients      = mysql_result($result,$i,"patients_name");         
   //      $codes   = "";  
   //      $desc        = mysql_result($result,$i,"patients_name");  
   //      $pay_company = mysql_result($result,$i,"company");  
   //      $adm_no      = mysql_result($result,$i,"adm_no");  
   //      $reg_no      = mysql_result($result,$i,"adm_no");  
   //      $ok = 'Yes';          
   //   //}
   //   //if ($patient2==$patient){
   //   //   $ok = 'Yes';          
   //   //}
   //  $i++;      
   //}
   //if ($ok=="No"){      
   //   echo"No Transaction in the given range";
   //   echo"<table width ='400' border='0' border color ='black'><td width ='100'></td><td><input type='submit' 
   //   name='print2'  class='button' value='Refresh'></td></table>";
   //   echo"</FORM><table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' 
   //   height='100' width='130'></td></table>";
   //   die();
   //}




   $today = date('y/m/d');
   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;

   echo"<table class='altrowstable' id='alternatecolor'>";
   $SQL= "SELECT * FROM companyfile" or die(mysql_error());
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



      //Now put the heading
      //-------------------
      echo"<h2><p align ='left'>$company</p></h2>";
      echo"<h3><p align ='left'>$address1</p></h3>";
      echo"<h3><u><p align ='left'>LIST OF DEBIT NOTES</p></u></h3>";
      echo"<font size ='2'>";
      echo"<hr>";


echo"<div><b>";
echo"Date<img src='space.jpg' style='width:80px;height:2px;'>";
echo"Description of Services<img src='space.jpg' style='width:170px;height:2px;'>";
echo"Ref No.<img src='space.jpg' style='width:120px;height:2px;'>";
echo"Type<img src='space.jpg' style='width:50px;height:2px;'>";
echo"<img src='space.jpg' style='width:10px;height:2px;'>";
echo"Debit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Credit<img src='space.jpg' style='width:50px;height:2px;'>";
echo"Balance<img src='space.jpg' style='width:1px;height:2px;'>";
echo"</b></div>";
echo"<hr>";

   $item_search ='';

   //use the revenue file to group items   
   //-------------------------------------
   $query3 = "SELECT * FROM glaccountsf" or die(mysql_error());
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $tot =0;
   $i3 = 0;
   while ($i3 < $num3)
      {
      $item     = mysql_result($result3,$i3,"account_name");  
      //Search this item in htransf
      //---------------------------
      $today = date('y/m/d');
      $query= "SELECT * FROM htransf WHERE type <>'RC' AND type <>'CR' AND date >='$date1' AND date <='$date2' ORDER BY date" or 
      die(mysql_error());
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $tot =0;
      $i = 0;
      $SQL = "SELECT * FROM htransf WHERE type <>'RC' AND type <>'CR'  AND date >='$date1' AND date <='$date2' ORDER BY date"  or die(mysql_error());

      $hasil=mysql_query($SQL, $connect);
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $desc2 =' ';
      $print='yes';
      //$rates = 0;
      $count = 0;
      $group_t = 0;
      $group_all  = 0;
      while ($row=mysql_fetch_array($hasil)) 
         { 
         $item_search  = mysql_result($result,$i,"trans2");         
         //if item found
         //-------------
         if ($item==$item_search){
            $patient      = mysql_result($result,$i,"patients_name");         
            $codes   = "";  
            $desc        = mysql_result($result,$i,"patients_name");  
            $group       = mysql_result($result,$i,"trans_type");         
            $rate        = mysql_result($result,$i,"amount");   
            //$group_t     = mysql_result($result,$i,"amount");   
            $code        = mysql_result($result,$i,"doc_no");   
            $update      = mysql_result($result,$i,"service");  
            $contact     = mysql_result($result,$i,"date"); 
            $amount      = mysql_result($result,$i,"amount");    
            $type        = mysql_result($result,$i,"type");  
            $pay_company = mysql_result($result,$i,"company");  
            $adm_no      = mysql_result($result,$i,"adm_no");  
            $reg_no      = mysql_result($result,$i,"adm_no");  
            $qty         = mysql_result($result,$i,"qty");  
            $item_search2  = mysql_result($result,$i,"trans2");         
            $street  = " ";  
            $pay_mode= " ";  
            $codes2 = $rate; 
            $update2 = $codes2; 
            $tot = $tot +$update2;
            $update2 = number_format($update2);
            $rate = number_format($rate);
            $group_t       = $group_t + $amount;
            //$group_all     = $group_all + $amount;

      $desc2  = $desc;
      $rates  = $rates + $amount;
      $rates2 = $rates;
      $rates3 = number_format($rates2);        
      echo"<table class='altrowstable' id='alternatecolor'>";
      echo"<tr bgcolor ='white'>";
      echo"<td width ='100' align ='left'>";      
      echo"$contact";
      echo"</td>";
      echo"<td width ='300' align ='left'>";      
      $update =substr($update,0,15).' - '.substr($patient,0,15);
      echo"$update";
      echo"</td>";
      echo"<td width ='150' align ='left'>";      
      echo"$code";
      echo"</td>";
      echo"<td width ='50' align ='left'>";      
      echo"$type";
      echo"</td>";
      echo"<td width ='55' align ='right'>";      
      if ($rate >0){
         echo"$rate";
      }
      //echo"$qty";
      echo"</td>";
      echo"<td width ='45' align ='right'>";      
      //if ($rate >0){
      //   echo"$rate";
      //}
      echo"</td>";
      echo"<td width ='50' align ='right'>";
      if ($rate <0){
         echo"$rate";
      }
      echo"</td>";
      echo"<td width ='100' align ='right'>$rates3</td>";
      echo"</tr>";
      $desc2 = $desc;         

           echo"</table>";
           //return here
           $group2= $group;
           $count++;
    }


         $i++;      
      }
      // Display the sub-total
      //----------------------
      if ($group_t <> 0){
         $group_t2 = number_format($group_t);
         $rates2 = $rates2+$group_t;
         //echo"$rates2";
//$item_search2
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         echo"<table border ='0'><td width ='800' align='right'><b>$item_search2</b></td><td width ='75' align ='right'><b>$group_t2</td></table>";
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         $group_t =0;
      }
     //We are moving to the next item in revenue file
     //------------------------------------------------
     //if it is the same item skip
     //---------------------------
     //}

     $i3++;      
   }




      $query= "SELECT * FROM htransf WHERE invoice_no =' ' AND patients_name ='$patient1' AND type ='RC' ORDER BY date" or 
      die(mysql_error());
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $tot =0;
      $i = 0;
      $SQL = "SELECT * FROM htransf WHERE invoice_no =' ' AND patients_name ='$patient1' AND type ='RC' ORDER BY date"  or die(mysql_error());

      $hasil=mysql_query($SQL, $connect);
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $desc2 =' ';
      $print='yes';
      //$rates = 0;
      $count = 0;
      $group_t = 0;
      $total_rc  = 0;
      while ($row=mysql_fetch_array($hasil)) 
         { 
         $patient      = mysql_result($result,$i,"patients_name");         
         $codes   = "";  
         $desc        = mysql_result($result,$i,"patients_name");  
         $group       = mysql_result($result,$i,"trans_type");         
         $rate        = mysql_result($result,$i,"amount");   
         $code        = mysql_result($result,$i,"doc_no");   
         $update      = mysql_result($result,$i,"service");  
         $contact     = mysql_result($result,$i,"date"); 
         $amount      = mysql_result($result,$i,"amount");    
         $type        = mysql_result($result,$i,"type");  
         $pay_company = mysql_result($result,$i,"company");  
         $adm_no      = mysql_result($result,$i,"adm_no");  
         $reg_no      = mysql_result($result,$i,"adm_no");  
         $qty         = mysql_result($result,$i,"qty");  
         $street  = " ";  
         $pay_mode= " ";  
         $codes2 = $rate; 
         $update2 = $codes2; 
         $tot = $tot +$update2;
         $total_rc = $total_rc + $amount;
         $update2 = number_format($update2);
         $rate = number_format($rate);
         $group_t       = $group_t + $amount;
         $desc2  = $desc;
         $rates  = $rates + $amount;
         $rates2 = $rates;
         $rates3 = number_format($rates2);        
         echo"<table class='altrowstable' id='alternatecolor'>";
         echo"<tr bgcolor ='white'>";
         echo"<td width ='100' align ='left'>";      
         echo"$contact";
         echo"</td>";
         echo"<td width ='300' align ='left'>";      
         echo"$update";
         echo"</td>";
         echo"<td width ='150' align ='left'>";      
         echo"$code";
         echo"</td>";
         echo"<td width ='50' align ='left'>";      
         echo"$type";
         echo"</td>";
         echo"<td width ='50' align ='right'>";      
         echo"";
         echo"</td>";
         echo"<td width ='50' align ='right'>";      
         //echo"$qty";
         echo"</td>";
         echo"<td width ='50' align ='right'>$rate</td>";
         echo"<td width ='100' align ='right'>$rates3</td>";
         echo"</tr>";
         $i++;
      }


      $total_rc = number_format($total_rc);
      if ($total_rc <> 0){
         echo"<table><tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td>  
         <img src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr>";
         echo"<tr><td width ='600'></td><td><b>Sub-Total<img src='space.jpg' 
         style='width:60px;height:2px;'>$total_rc</td></tr>";
         echo"<tr><td width ='600'><img src='space.jpg' style='width:600px;height:2px;'></td><td><img    
         src='images/black-1.jpg' style='width:300px;height:2px;'></td></tr></table>";
         $group_t =0;
      }
         
      echo"<hr>";
      //The bottom line
      echo"<table>";   
      $tot = number_format($tot);
      echo"<tr>";
      echo"<td width ='320' align ='left'>";
      echo"</td>";      
      echo"<td width ='200'>";
      echo"</td>";      
      echo"<td width ='150'><h4>";      
      echo"Invoice Total Due";      
      echo"</h4></td>";      
      echo"<td width ='100' align ='right'>";      
      echo"</td>";      
      echo"<td width ='200' align ='right'>";      
      echo"</td>";      
      echo"<td width ='100' align ='right'><h4>$rates3</h4></td>";      
      echo"<td width ='50'></td>";
      echo"</tr>";   
      echo"</table>";
      echo"<hr>";

}
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


