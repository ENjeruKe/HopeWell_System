<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
<?php
   $_SESSION['username']=$_POST['username'];   
   $_SESSION['company']=$_POST['company'];   
   $date = $_SESSION['sys_date'];

   $company = $_POST['company'];
   $location =$company;
   $username =$_POST['username'];
   $password =$_POST['password'];


   //$_SESSION['database']=$database;
   
   $username = $_SESSION['username'];   
   $location1 =$_SESSION['company'];   

   $acess  = "no";
   $debtors= "no";
   $stocks = "no";
   $doctors = "no";
   $supplier = "no";
   $gledger = "no";
   $patients="no";
   $triage="no";
   $users="no";
   $revenue ="no";
   $beds ="no";
   $laboratory ="no";
   $pharmacy ="no";
   $accounts ="no";
   $nurses ="no";
   $doctors_p ="no";
   $cashier ="no";
   $reception='no';

   $found = "No";
   $query3 = "select * FROM systemfile2" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;

   while ($i3 < $num3)
     {
     $name   = mysql_result($result3,$i3,"username");
     $pass   = mysql_result($result3,$i3,"password");
     if ($name==$username AND $pass==$password){
        $found ='Yes';
        $acess  = mysql_result($result3,$i3,"access_all");
        $debtors= mysql_result($result3,$i3,"db_reg");
        $doctors= mysql_result($result3,$i3,"doc_reg");
        $stocks = mysql_result($result3,$i3,"stocks_reg");
        $supplier  = mysql_result($result3,$i3,"sup_reg");
        $gledger   = mysql_result($result3,$i3,"gl_reg");
        $beds      = mysql_result($result3,$i3,"bed_reg");
        $patients  = mysql_result($result3,$i3,"pat_reg");
        $revenue   = mysql_result($result3,$i3,"rev_reg");
        $triage   = mysql_result($result3,$i3,"triage");
        $users     = mysql_result($result3,$i3,"user_reg");
        $laboratory = mysql_result($result3,$i3,"laboratory");
        $pharmacy = mysql_result($result3,$i3,"pharmacy");
        $accounts = mysql_result($result3,$i3,"accounts");
        $nurses = mysql_result($result3,$i3,"nurses");
        $doctors_p = mysql_result($result3,$i3,"doctors_p");
        $cashier = mysql_result($result3,$i3,"accounts");
        $reception = mysql_result($result3,$i3,"reception");
      }
     $i3++;
     }

   $query= "UPDATE companyfile SET dates='$date'";
   $result =mysql_query($query);

   $query = "select * FROM companyfile where company<>''" ;
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $i=0;
   while ($i < $num)
    {
     $date   = mysql_result($result,$i,"dates");
     $last_date   = mysql_result($result,$i,"last_date");
     $update   = mysql_result($result,$i,"update");
    $i++;
    }
//echo 'Today'.$date;
//echo 'Last Date'.$last_date;
    if ($date==$last_date){
    //
    }else{
//echo 'To update';
     //echo"<script type='text/javascript' src='ward_visits.php'></script>";
$query00= "UPDATE companyfile SET update='$date'";
     $result00 =mysql_query($query00);


$query= "UPDATE companyfile SET last_date='$date'";
     $result =mysql_query($query);
     require('ward_visits.php');

    }


     if($found=='No'){
     echo"<table border ='0'><tr><td width ='900' align ='center'><img src='images/access_denied.jpg' alt='statement' height='301' width='465'><br><font color ='red'></td></tr><tr><td align ='center'>";die('Invalid Username and Password');
echo"</font></td></tr></table>";
       

     }
    

$_SESSION['debtors'] = $debtors;
$_SESSION['doctors'] = $doctors;
$_SESSION['stocks']  = $stocks;
$_SESSION['counselor'] = $counselor;
$_SESSION['suppliers'] = $suppliers;
$_SESSION['triage'] = $triage;
$_SESSION['gledger'] = $gledger;
$_SESSION['laboratory'] = $laboratory;
$_SESSION['pharmacy'] = $pharmacy;
$_SESSION['accounts'] = $accounts;
$_SESSION['nurses'] = $nurses;
$_SESSION['doctors_p'] = $doctors_p;
$_SESSION['cashier'] = $cashier;
$_SESSION['reception'] = $reception;


?>

<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    
<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<meta name="description" content="">
    
<meta name="author" content="">
<!--embed name="GoodEnough" src="images/background.mp3" loop="true" hidden="true" autostart="true"-->
    
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="white">
<script type="text/javascript" src="ajax-menu.files/dmenu.js"></script>
  <!--style type="text/css">#deluxeMenu{display:none}</style-->
<noscript><link type="text/css" href="ajax-menu.files/style.css" rel="stylesheet"></noscript>
  
    
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
<style type="text/css">
	body {
		padding-top: 60px;
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

    
      
<!--script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script-->      
</head>
<!--body -->
<!--body background="images/background.jpg"-->
<body >
<link rel="stylesheet" href="css/style.css" type="text/css" media="white">
    
<div class="navbar navbar-inverse navbar-fixed-top">
      
<div class="navbar-inner">
        
<div class="container-fluid">
          
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            


          </a>
          <a class="brand" href="#">Medi+ V10 (HMIS Global)</a>
          <div class="nav-collapse collapse">
            
<p class="navbar-text pull-right">
              <a target="_blank" href="http://www.hmisglobal.com" class="navbar-link">www.hmisglobal.com</a>
            </p>
            <!--ul class="nav" id="deluxeMenu"-->
              <ul id="deluxeMenu"-->

              <!--li><a target="_blank" href="http://www.hmisglobal.com">Home</a></li>
              <li class="active"><a href="http://www.hmisglobal.com/setup">Setup</a></li>
              <li><a target="_blank" href="http://www.hmisglobal.com/setup">FAQ</a></li>              
              <li><a target="_blank" href="http://www.hmisglobal/docs">Docs</a></li>
              <li><a href="#contact">Contact</a></li-->



              <!--li><a href=''>Medical Page</a></li-->





<?php
if ($doctors_p=='yes'){
echo"<li><a href='#'><span>Medical Page</span></a><a href='medical_page.html' style='display: none;'></a></li>";
}


if ($username<>'Admin'){
   //
}else{
   echo"<li><a href='#'><span>Hospital Settings </span></a><a href='info1.html' style='display: none;'></a></li><li><a href='#'><span>Patient Billing     </span></a><a href='info.html' style='display: none;'></a></li>";
}
if ($stocks=='yes'){	        
    echo"<li><a href='#'><span>Stocks Ledger</span></a><a href='stocks_ledger.html' style='display: none;'></a></li>";
}
if ($gledger=='yes'){	        
	      echo"<li><a href='#'><span>General Ledger</span></a><a href='general_ledger.html' style='display: none;'></a></li>";
}
if ($username=='Admin'){	        
	      echo"<li><a href='#'><span>System Settings</span></a><a href='settings.html' style='display: none;'></a></li>";
}

if ($reception=='yes' or $username=='Admin'){	        
	      echo"<li><a href='#'><span>Reports</span></a><a href='reports.html' style='display: none;'></a></li>";
}

?>

	<li><a href="#">Contact Us</a></li>
</ul>

              <!-- End of Code for Deluxe Menu Items -->
              <!-- --> 
<!--noscript><p style="display:none"><a href="http://deluxe-menu.com">java dropdown menu by Deluxe-Menu.com</a></p--><!--/noscript>          (c) 2009, Deluxe-Menu.com -->


              <script type="text/javascript" src="ajax-menu.files/data.js"></script>





            <!--/ul-->



          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

	
    
<div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">

			
<div class="accordion" id="accordion_menu">
					
						
<div class="accordion-group">
						
<div class="accordion-heading">
						



<!--a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_menu" href="info.html"-->
<?php
if ($users=='yes'){
echo"<a href=javascript:popcontact('users_register.php')><strong><img src='images/user_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}else{
echo"<a href=javascript:popcontactz6('access_denied.php')><strong><img src='images/user_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}
?>
						</div>
<div id="collapseappearence" class="accordion-body collapse">
							<div class="accordion-inner">
								
<a href='demos/appearence/alternate-row.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/appearence/alternate-row.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Alternate Row </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/bar-graph.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/bar-graph.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Bar Graph <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/calc-column.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/calc-column.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Calc Column <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/conditional-data.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/conditional-data.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Conditional Data <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/conditional-format.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/conditional-format.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Conditional Format <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/custom-grid-button.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/custom-grid-button.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Custom Grid Button <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/custom-row-button.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/custom-row-button.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Custom Row Button <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/dropdown-callback.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/dropdown-callback.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Dropdown Callback <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/dropdown-dependent.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/dropdown-dependent.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Dropdown Dependent <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/dropdown.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/dropdown.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Dropdown <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/excel-blank-rows.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/excel-blank-rows.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Excel Blank Rows <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/excel-view.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/excel-view.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Excel View <font color='red'>*</font> </a><br/><a href='demos/appearence/external-link.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/appearence/external-link.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> External Link </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/footer-row.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/footer-row.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Footer Row <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/frozen-columns.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/frozen-columns.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Frozen Columns <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/group-headers.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/group-headers.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Group Headers <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/grouping.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/grouping.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Grouping <font color='red'>*</font> </a><br/><?php if ($date >$update){    die(); }?>
<a href='http://www.phpgrid.org/demo/demos/appearence/image.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/image.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Image <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/persist-settings.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/persist-settings.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Persist Settings <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/row-button-edit-dialog.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/row-button-edit-dialog.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Row Button Edit Dialog <font color='red'>*</font> </a><br/><a href='demos/appearence/themes.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/appearence/themes.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Themes </a><br/><a href='http://www.phpgrid.org/demo/demos/appearence/toolbar-button.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/appearence/toolbar-button.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Toolbar Button <font color='red'>*</font> </a><br/><a href='demos/appearence/twitter-bootstrap.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/appearence/twitter-bootstrap.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Twitter Bootstrap </a><br/>							
</div>
						
</div>				
						
</div>				
						
						
<div class="accordion-group">
						
<div class="accordion-heading">
						
<!--a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_menu" href="#collapseediting"-->
<?php
if ($debtors=='yes'){
   echo"<a href=javascript:popcontact('debtors_register.php')><strong><img src='images/account_receivables.jpg' alt='statement' height='40' width='200'></strong></a>";
}else{
 echo"<a href=javascript:popcontactz6('access_denied.php')><strong><img src='images/account_receivables.jpg' alt='statement' height='40' width='200'></strong></a>";
}
?>
						</div>
<div id="collapseediting" class="accordion-body collapse">
							<div class="accordion-inner">
								
<a href='http://www.phpgrid.org/demo/demos/editing/bulk-edit.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/bulk-edit.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Bulk Edit <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/editing/clone-row.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/clone-row.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Clone Row <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/editing/column-access.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/column-access.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Column Access <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/editing/custom-events.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/custom-events.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Custom Events <font color='red'>*</font> </a><br/><a href='demos/editing/db-table-grid.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/editing/db-table-grid.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Db Table Grid </a><br/><a href='http://www.phpgrid.org/demo/demos/editing/default-edit.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/default-edit.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Default Edit <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/editing/dialog-layout.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/dialog-layout.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Dialog Layout <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/editing/file-upload.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/file-upload.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> File Upload <font color='red'>*</font> </a><br/><a href='demos/editing/index.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/editing/index.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Index </a><br/><a href='http://www.phpgrid.org/demo/demos/editing/inline-add.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/inline-add.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Inline Add <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/editing/js-validation-form.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/js-validation-form.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Js Validation Form <font color='red'>*</font> </a><br/><a href='demos/editing/js-validation.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/editing/js-validation.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Js Validation </a><br/><a href='http://www.phpgrid.org/demo/demos/editing/server-errors.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/server-errors.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Server Errors <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/editing/server-validation.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/editing/server-validation.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Server Validation <font color='red'>*</font> </a><br/>							
</div>
						
</div>				
						
</div>				
						
						
<div class="accordion-group">
						
<div class="accordion-heading">
						
<!--a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_menu" href="#collapseexport"><strong-->
<?php
if ($supplier=='yes'){																								
   echo"<a href=javascript:popcontact('suppliers_register.php')><img src='images/account_payables.jpg' alt='statement' height='90' width='200'></a>";
}else{
   echo"<a href=javascript:popcontactz6('access_denied.php')><img src='images/account_payables.jpg' alt='statement' height='90' width='200'></a>";
}
?>						</div>
<div id="collapseexport" class="accordion-body collapse">
							<div class="accordion-inner">
								
<a href='http://www.phpgrid.org/demo/demos/export/export-all.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/export/export-all.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Export All <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/export/export-csv.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/export/export-csv.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Export Csv <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/export/export-custom.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/export/export-custom.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Export Custom <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/export/export-excel.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/export/export-excel.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Export Excel <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/export/export-pdf-html.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/export/export-pdf-html.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Export Pdf Html <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/export/export-pdf.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/export/export-pdf.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Export Pdf <font color='red'>*</font> </a><br/>							
</div>
						
</div>				
						
</div>				
						
						
<div class="accordion-group">
						
<div class="accordion-heading">
<?php
if ($doctors=='yes'){																								
echo"<a href=javascript:popcontact('doctors_register.php')><strong><img src='images/doctors_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}else{
echo"<a href=javascript:popcontactz6('access_denied.php')><strong><img src='images/doctors_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}
?>						
						</div>
<div id="collapseintegrations" class="accordion-body collapse">
							<div class="accordion-inner">
								
<a href='http://www.phpgrid.org/demo/demos/integrations/autocomplete.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/integrations/autocomplete.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Autocomplete <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/integrations/datepicker.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/integrations/datepicker.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Datepicker <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/integrations/datetimepicker.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/integrations/datetimepicker.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Datetimepicker <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/integrations/dropdown-select2.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/integrations/dropdown-select2.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Dropdown Select2 <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/integrations/fancy-box.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/integrations/fancy-box.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Fancy Box <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/integrations/html-editor.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/integrations/html-editor.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Html Editor <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/integrations/tag-it.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/integrations/tag-it.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Tag It <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/integrations/timepicker.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/integrations/timepicker.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Timepicker <font color='red'>*</font> </a><br/>							
</div>
						
</div>				
						
</div>				
						
						
<div class="accordion-group">
						
<div class="accordion-heading">
<?php
if ($stocks=='yes'){																		
echo"<a href=javascript:popcontact('stocks_register2.php')><strong><img src='images/stocks_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}else{
echo"<a href=javascript:popcontactz6('access_denied.php')><strong><img src='images/stocks_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}
?>						
						</div>
<div id="collapseloading" class="accordion-body collapse">
							<div class="accordion-inner">
								
<a href='http://www.phpgrid.org/demo/demos/loading/db-layer-access.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/loading/db-layer-access.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Db Layer Access <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/loading/db-layer-oracle-join.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/loading/db-layer-oracle-join.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Db Layer Oracle Join <font color='red'>*</font> </a><br/><a href='demos/loading/db-layer-oracle.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/loading/db-layer-oracle.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Db Layer Oracle </a><br/><a href='demos/loading/db-layer-pgsql.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/loading/db-layer-pgsql.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Db Layer Pgsql </a><br/><a href='demos/loading/db-layer-sqlsvr.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/loading/db-layer-sqlsvr.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Db Layer Sqlsvr </a><br/><a href='demos/loading/load-array.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/loading/load-array.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Load Array </a><br/>							
</div>
						
</div>				
						
</div>				
						
						
<div class="accordion-group">
						
<div class="accordion-heading">
<?php
if ($gledger=='yes'){												
echo"<a href=javascript:popcontact('gl_accounts_register.php')><strong><img src='images/gl_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}else{
echo"<a href=javascript:popcontactz6('access_denied.php')><strong><img src='images/gl_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}
?>						
						</div>
<div id="collapsemaster-detail" class="accordion-body collapse">
							<div class="accordion-inner">
								
<a href='http://www.phpgrid.org/demo/demos/master-detail/master-detail-dropdown.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/master-detail/master-detail-dropdown.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Master Detail Dropdown <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/master-detail/master-detail-fancy.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/master-detail/master-detail-fancy.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Master Detail Fancy <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/master-detail/master-detail.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/master-detail/master-detail.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Master Detail <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/master-detail/master-multi-detail.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/master-detail/master-multi-detail.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Master Multi Detail <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/master-detail/multi-subgrid.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/master-detail/multi-subgrid.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Multi Subgrid <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/master-detail/multiple-grids.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/master-detail/multiple-grids.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Multiple Grids <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/master-detail/multiple-tab-grids.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/master-detail/multiple-tab-grids.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Multiple Tab Grids <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/master-detail/nested-master-detail.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/master-detail/nested-master-detail.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Nested Master Detail <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/master-detail/subgrid.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/master-detail/subgrid.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Subgrid <font color='red'>*</font> </a><br/>							
</div>
						
</div>				
						
</div>				
<divclass="accordion-group">
						
<div class="accordion-heading">
<?php
if ($revenue=='yes'){						
echo"<a href=javascript:popcontact('revenue_register.php')><strong><img src='images/revenue_register.jpg' alt='statement' height='200' width='200'></strong></a>";
}else{
 echo"<a href=javascript:popcontactz6('access_denied.php')><strong><img src='images/revenue_register.jpg' alt='statement' height='200' width='200'></strong></a>";
}							
?>
	</div>
<div id="collapsemisc" class="accordion-body collapse">
<div class="accordion-inner">

								

<a href='http://www.phpgrid.org/demo/demos/misc/arabic-rtl.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/misc/arabic-rtl.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Arabic Rtl <font color='red'>*</font> </a><br/><a href='demos/misc/example-all.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/misc/example-all.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Example All </a><br/><a href='http://www.phpgrid.org/demo/demos/misc/example-full.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/misc/example-full.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Example Full <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/misc/keep-vertical-scroll.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/misc/keep-vertical-scroll.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Keep Vertical Scroll <font color='red'>*</font> </a><br/><a href='demos/misc/localization.php' onclick="jQuery('#span_version').hide();;jQuery('#code').load('index.php?file=/misc/localization.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Localization </a><br/>							


</div>
						
</div>				
						
</div>				
						
						
<!--div class="accordion-group">

<a href=javascript:popcontact('property.php')><strong><img src='images/revenue_register.jpg' alt='statement' height='200' width='200'></strong></a>	</div-->
<div id="collapsemisc" class="accordion-body collapse">
						
<div class="accordion-heading">
						
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion_menu" href="#collapsesearch">

						  <strong>
</strong>
						</a>
						</div>







<div id="collapsesearch" class="accordion-body collapse">
							<div class="accordion-inner">
								
<a href='http://www.phpgrid.org/demo/demos/search/autofilter.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/search/autofilter.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Autofilter <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/search/search-form.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/search/search-form.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Search Form <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/search/search-onload.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/search/search-onload.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Search Onload <font color='red'>*</font> </a><br/><a href='http://www.phpgrid.org/demo/demos/search/search-template.php' onclick="jQuery('#div_version').html('(*) Available in Licensed Version. Currently loaded from www.phpgrid.org');jQuery('#span_version').show();;jQuery('#code').load('index.php?file=/search/search-template.php'); $('#grid-demo-tabs a:first').tab('show');" target='demo_frame'> Search Template <font color='red'>*</font> </a><br/>							
</div>
						
</div>				
						
</div>				
						
<!--img src='images/image.jpg' alt='statement' height='600' width='200'-->
<img src='images/healthcare.gif' alt='statement' height='600' width='200'>





<?php
echo"<table><td align='right'><b><font color ='blue'>";
//echo $_SESSION['company'];
echo"<br><br><br>";
echo"</b></font></td></table>";
?>
<?php
if ($counselor=='yes' OR $username=='admin'){
echo"<a href=javascript:popcontact('councilors_page3.php')><strong><img src='images/wards_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}else{
echo"<a href=javascript:popcontactz6('access_denied.php')><strong><img src='images/wards_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}
?>
<?php

if ($beds=='yes'){
echo"<a href=javascript:popcontact('beds_register.php')><strong><img src='images/beds_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}else{
echo"<a href=javascript:popcontactz6('access_denied.php')><strong><img src='images/beds_register.jpg' alt='statement' height='40' width='200'></strong></a>";
}


if ($beds=='yes'){
echo"<a href=javascript:popcontact('audit_trail.php')><strong><img src='images/end_month.jpg' alt='statement' height='40' width='200'></strong></a>";
}
?>
<!--strong><img src='images/end_month.jpg' alt='statement' height='40' width='200'></strong-->

<!--a href=javascript:popcontact('')><strong><img src='images/profile.jpg' alt='statement' height='100' width='200'></strong></a-->	


		
</div>	  
<!--p align ='center'><a href=javascript:popcontact('mail_to_us.php')><img src='images/dashboard.jpg' alt='statement' height='50' width='700'></a></p-->	


			








						















        <!--/div-->
<!--/span-->
        
<div class="span10">
          
<div class="row-fluid">
            
<div class="span12">
			
				
<ul class="nav nav-tabs" id="grid-demo-tabs">
					
<li class="active"><a href="#demo" data-toggle="tab">

<!--div id="section">
<OBJECT data="slider.html" type="text/html" style="margin: 0; width: 600px; height: 140px; padding 0px; text-align:left;"></OBJECT>
</div-->



<!--?php echo"<h3>$company</h3>";?-->

</a></li>
<!--li><a href="#code" data-toggle="tab">Code</a></li-->
<!--IFRAME SRC="clock.html" style="margin: 0px; width: 160px; height: 160px; padding 0px;"-->
<table width ='100%'><td width ='100' align ='left'><img src='images/retreat.jpg' alt='statement' height='100' width='50'><!--/td><td width = '50' align ='right'><input type="submit" name="Submit"  class="button" value="Address Book" onclick="return popcontact('address_book.php')"/></td--><td width ='100' align ='right'>
<?php
echo "<h1>Loged in as: ".$username;
?>
</h1>
</td><td width ='10' align ='right'><a href=javascript:popchat('mini_chat.php')><!--img src='chat.jpg' alt='statement' height='120' width='92'--></a></td></table>
		</ul>
				
				
<div class="tab-content" id="grid-demo-tabs-content" style="margin: 0; width: 1100px; height: 1000px;><div id="demo" class="tab-pane fade in active"><span id="span_version" style="display:none">
		        		
<!--a id="div_version" style="margin-left:18px; width:100px; font-family: tahoma; padding:5px; background-color: #117AC0; letter-spacing:1px; color: white; text-decoration:underline;" target="_blank" href="http://www.phpgrid.org/download/"></a-->
						
<br>
						
</span>						
						
<!--iframe onload="iframeLoaded(this)" name="demo_frame" frameborder="0" width="100%" height="600" src="demos/editing/index.php"-->

<table width ='100%' border ='0'><tr>
<?php
if ($patients=='yes'){
echo"<td align ='center'><a href=javascript:popcontact('patient_register.php')><img src='dashboard/patient.bmp' alt='statement' height='200' width='200'></a></td>";
}else{
echo"<td align ='center'><a href=javascript:popcontactz6('access_denied.php')><img src='dashboard/patient.bmp' alt='statement' height='200' width='200'></a></td>";
}


if ($cashier=='yes'){
echo"<td align ='center'><a href=javascript:popcontact5('auto_receipt.php')><img src='dashboard/cashbooks.png' alt='statement' height='200' width='200'></a></td>";
}else{
echo"<td align ='center'><a href=javascript:popcontactz6('access_denied.php')><img src='dashboard/cashbooks.png' alt='statement' height='200' width='200'></a></td>";
}


if ($doctors=='yes'){
echo"<td align ='center'><a href=javascript:popcontact4('patients_doctor.php')><img src='dashboard/doctors.jpg' alt='statement' height='200' width='200'></a></td>";
}else{
echo"<td align ='center'><a href=javascript:popcontactz6('access_denied.php')><img src='dashboard/doctors.jpg' alt='statement' height='200' width='200'></a></td>";
}

if ($pharmacy=='yes'){
echo"<td align ='center'><a href=javascript:popcontact8('patients_pharmacy.php')><img src='dashboard/stocks.jpg' alt='statement' height='200' width='200'></a></td>";
}else{
echo"<td align ='center'><a href=javascript:popcontactz6('access_denied.php')><img src='dashboard/stocks.jpg' alt='statement' height='200' width='200'></a></td>";
}

if ($laboratory=='yes'){
echo"<td align ='center'><a href=javascript:popcontact('patients_lab.php')><img src='dashboard/laboratory.jpg' alt='statement' height='200' width='200'></a></td>";
}else{
echo"<td align ='center'><a href=javascript:popcontactz6('access_denied.php')><img src='dashboard/laboratory.jpg' alt='statement' height='200' width='200'></a></td>";
}

if ($triage=='yes'){
echo"<td align ='center'><a href=javascript:popcontact('patients_triage.php')><img src='dashboard/triage.jpg' alt='statement' height='200' width='200'></a></td>";
}else{
echo"<td align ='center'><a href=javascript:popcontactz6('access_denied.php')><img src='dashboard/triage.jpg' alt='statement' height='200' width='200'></a></td>";
}

?>

<!--td align ='center'><a href="javascript:popcontact5('auto_receipt.php')"><img src='dashboard/cashbooks.png' alt='Cashier' width ='200' height ='200'></a></td-->
<!--td align ='center'><a href="javascript:popcontact14('patients_doctor.php')"><img src='dashboard/doctors.jpg' alt='Doctors' width ='200' height ='200'></a></td-->
<!--td align ='center'><a href="javascript:popcontact('patients_pharmacy.php')"><img src='dashboard/stocks.jpg' alt='Pharmacy' width ='200' height ='200'></a></td-->

<!--td align ='center'><a href="javascript:popcontact('patients_lab.php')"><img src='dashboard/laboratory.jpg' alt='Laboratory' width ='200' height ='200'></a></td-->
<!--td align ='center'><a href="javascript:popcontact('patients_triage.php')"><img src='dashboard/triage.jpg' alt='triage' width ='200' height ='200'></a-->

<tr><td align ='center'><b>Reception</b></td><td align ='center'><b>Cashier</b></td><td align ='center'><b>Doctors</b></td><td align ='center'><b>Pharmacy</b></td><td align ='center'><b>Laboratory</b></td><td align ='center'><b>Triage</b></td></tr></table>
<br><br>
<table width ='100%'><tr><td align ='center'><a href=javascript:popcontact4('wbc_patients_doctor.php')><img src='dashboard/wbclinic.jpg' alt='statement' height='300' width='300'></a></td><td><img src='dashboard/haven.jpg' alt='Pharmacy' width ='800' height ='200'></td></tr><tr><td align ='center'><b>Well Baby Clinic</b></td><td></td></tr></table>
<br><br>

	
<?php

$tod =date("y-m-d g:i:s", strtotime("now"));
$tod = strtotime("now");
$time =$tod-10800;
//-3600;
$mtod =date("y-m-d","$time");
$today = $mtod;

$todv =date("y-m-d g:i:s", "$time");
echo "<font color ='red'>Server times is:" . $todv."</font>";




?>

<!--OBJECT data="slider.html" type="text/html" style="margin: 0; width: 1200px; height: 140px; padding 0px; text-   align:left;"></OBJECT-->
</div>
				  
					
			  
				
</div>

            
</div><!--/span-->
          
</div><!--/row-->
        
</div><!--/span-->
		
		

      
</div><!--/row-->

		
<!-- Le javascript
		================================================== -->
		
<!-- Placed at the end of the document so the pages load faster -->
		
<script src="bootstrap/js/jquery.js"></script>
		
<script src="bootstrap/js/bootstrap.min.js"></script>
		
<script>$('#grid-demo-tabs a').click(function (e) {
	e.preventDefault();
			$(this).tab('show');
			})
			
			jQuery('#code').load('index.php?file=/editing/index.php'); >

			
function iframeLoaded(iFrameID) 
			{
				

				
				
if (!stop)
				
setTimeout(function(){iframeLoaded(iFrameID,1);},1000);
			}
		
</script>
    
</div><!--/.fluid-container-->

	
<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	  ga('create', 'UA-50875146-1', 'phpgrid.org');
	  ga('send', 'pageview');
	
</script>
  
</body>
</html>