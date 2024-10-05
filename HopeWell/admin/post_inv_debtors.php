
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
  	<?php include 'includes/account/inv.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
	

<?php
   session_start();
require('open_database.php');
?>

<?php
//session_start();
$_SESSION['discount']= $_GET['no_disc'];       
$company_identity = $_SESSION['company'];
//echo $company_identity;
//For save and print button
//------------------__-----
$codes =$_SESSION['company'];


if (isset($_GET['save_cancel']))
   {
   //Go and save first
   //-------------------
   $date=$_GET['date'];
   $patients_name =$_GET['patient'];
   $adm_no =$_GET['adm_no'];
   $paid   =$_GET['amount'];
   $payer  =$_GET['db_account'];
   $tr_type=$_GET['tr_type'];
   $narration=$_GET['narration'];
   $ref_no3 =$_GET['jv_no'];
  
   $debit_account  =$tr_type;
   $credit_account ='ACCOUNTS RECEIVABLES';


   $db_accounts  = $payer;
   $db_accounts2 = $payer;
   //Get the receipt No.   
   $query3 = "select * FROM companyfile" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $ref_no   = mysql_result($result3,$i3,"next_ref");  
     $i3++;
     }
     $ref_no2 = $ref_no +1;
     $query3  = "UPDATE companyfile SET next_ref ='$ref_no2'";
     $result3 = mysql_query($query3);



   //Update Balances if not paid in full
   //-----------------------------------
   $topay = 0;
   $tot_amt = $paid;
   $query3 = "select * FROM debtorsfile WHERE account_name ='$payer'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
       {
       $balance   = mysql_result($result3,$i3,"os_balance");  
       $i3++;
     }
     $balance2 = $balance+$paid;
     $query= "UPDATE debtorsfile SET os_balance ='$balance2' WHERE account_name ='$payer'";
     $result =mysql_query($query);
     //$receipt= $tr_type.'';


   //Go and update gltransf
   //----------------------
   $query5= "INSERT INTO gltransf 
   VALUES('','$date','$debit_account','$ref_no','INV','$payer','-$paid','admin','$company_identity')";
   $result5 =mysql_query($query5);

   

   //Now go and Debit G/L Accounts file
   //-----------------------------------
   $db_balance = 0;
   $query3 = "select * FROM glaccountsf WHERE account_name ='$debit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;

   while ($i3 < $num3)
     {
     $db_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

   $db_balance = $db_balance +$paid;

   $query2= "UPDATE glaccountsf SET balance ='$db_balance' WHERE account_name ='$debit_account'";
   $result2 =mysql_query($query2);



   //Now go and credit the Account payable
   //-------------------------------------
   $query5= "INSERT INTO gltransf VALUES('','$date','$credit_account','$ref_no','INV','$payer','$paid','admin','$company_identity')";
   $result5 =mysql_query($query5);


     $query  = "INSERT INTO dtransf 
VALUES('$payer','$date','$narration','$ref_no3','INV','INV','$paid','$paid','$username')";
     $result =mysql_query($query);


   //Now go and update G/L Accounts file
   //-----------------------------------
   $query3 = "select * FROM glaccountsf WHERE account_name ='$credit_account'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $credit_balance   = mysql_result($result3,$i3,"balance");
     $i3++;
     }

     $credit_balance = $credit_balance -$paid;
     $query2= "UPDATE glaccountsf SET balance ='$credit_balance' WHERE account_name ='$credit_account'";
     $result2 =mysql_query($query2);

     echo '<script language="javascript">';
     echo 'alert("Data successfully saved")';
     echo '</script>';
     //die();
     //Print the receipt before deleting these stuff
     //---------------------------------------------
}
//}



?>


<!DOCTYPE html>
<html lang="en">  
<head>    






<?php

if (isset($_GET['refresh'])){
   $date = date('y/m/d');
}

?>







<script>
function myFunction() {
    var no = document.getElementById('no').value;   
    alert(no); 

    var txt = document.getElementById('amount').value;

    alert(txt); 

    //var option = no.options[no.selectedIndex].text;

    txt2 = txt * no;
    document.getElementById("result2").value = txt2;
}
</script>











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
        xmlhttp.open("GET","getaccount.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

















<script>
function function3() {
    var no = document.getElementById('no_three').value;   
    var txt = document.getElementById('amount_three').value;
    txt2 = txt * no;
    document.getElementById("result_three").value = txt2;
}
</script>

<script>
function function4() {
    var no = document.getElementById('no_4').value;   
    var txt = document.getElementById('amount_4').value;
    txt2 = txt * no;
    document.getElementById("result_4").value = txt2;
}
</script>

<script>
function function2() {
    var no = document.getElementById('no_two').value;   
    alert(no); 
    var txt = document.getElementById('amount_two').value;
    alert(txt); 
    txt2 = txt * no;
    document.getElementById("result_two").value = txt2;
}
</script>

<script>
function function1() {
 alert('here');
    var no = document.getElementById('no_one').value;   
    var txt = document.getElementById('amount_one').value;
    txt2 = txt * no;
    document.getElementById("result_one").value = txt2;
}
</script>












<body>
<!-- background="images/background.jpg"-->







<form action ="post_inv_debtors.php" method ="GET">
<?php


 $company_identity =$company_identity;            
 $cdquery="SELECT client_id,patients_name FROM clients";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            


$date = date('y-m-d');
//<td>";


?>





 <?php
  
//Displaying items to be adjusted
$mydate = date('y-m-d');
/////////////////////////////////
echo"<table>";
echo"<tr><td width ='100'><b>Invoice No.</td><td width='50' align='left'><input type='text' id ='jv_no' name='jv_no' size='10' required></td></tr>";

echo"<tr><td width ='100'><b>Date:</td><td width='50' align='left'><input type='text' id ='date' name='date' size='10' value ='$mydate'></td></tr>";

//Select the trans type if cash,cheque,visa or any other
//------------------------------------------------------

echo"<tr><td width ='100' align ='left'><b>Debtors A/c:</b></td><td>";
echo"<select id='db_account' name='db_account'>";
$cdquery="SELECT account_name FROM debtorsfile order by account_name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM debtorsfile";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td></tr>"; 

echo"<tr><td width ='100' align ='left'><b>Credit A/c:</b></td><td>";
echo"<select id='tr_type' name='tr_type'>";
$cdquery="SELECT account_name FROM glaccountsf order by account_name";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
$query3 = "select * FROM glaccountsf";
$result3 =mysql_query($query3) or die(mysql_error());
$num3 =mysql_numrows($result3) or die(mysql_error());
$i3=0;
while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];     
      echo "<option>$cdTitle</option>";            
      }
echo"</select>";
echo"</td></tr>"; 

echo"<tr><td width ='50'><b>Narration</b></td><td width='50' align='left'><input type='text' id ='narration' name='narration' size='50' required></td></tr>";

echo"<tr><td width ='50'><b>Amount</b></td><td width='10' align='left'><input type='text' id ='amount' name='amount' size='10' required> </td></tr>";
echo"</table>";
//removed from here
//-----------------
echo"<img src='ico/black.jpg' style='width:600px;height:1px;'>";   

      echo"</table>";

?>

<div class="container">
  <h1>
  <button type="submit" class="btn btn-success" name="save_cancel" id ="save_cancel">Save Changes</button></h1>
</div>
<br>
</form>

</body>







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




