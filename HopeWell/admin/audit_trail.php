<?php 
/** 
 * PHP Grid Component 
 * 
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org 
 * @version 1.5.2 
 * @license: see license.txt included in package 
 */ 

// include db config 
include_once("config.php"); 

// set up DB 
mysql_connect('localhost','root','0710958791');
mysql_select_db(PHPGRID_DBNAME); 

// include and create object 
include(PHPGRID_LIBPATH."inc/jqgrid_dist.php"); 
$g = new jqgrid(); 

// set few params 
$grid["caption"] = "Beds Register"; 
$g->set_options($grid); 

// set database table for CRUD operations 
$g->table = "logfile"; 

// render grid 
$out = $g->render("list1"); 

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html> 
<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
<head> 
    <link rel="stylesheet" type="text/css" media="screen" href="lib/js/themes/redmond/jquery-ui.custom.css"></link>     
    <link rel="stylesheet" type="text/css" media="screen" href="lib/js/jqgrid/css/ui.jqgrid.css"></link>     
  
    <script src="lib/js/jquery.min.js" type="text/javascript"></script> 
    <script src="lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script> 
    <script src="lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>     
    <script src="lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script> 
<style type="text/css">
html, 
body {
height: 100%;
}

body {
background-image: url(images/backgrounds.jpg);
background-repeat: no-repeat;
background-size: cover;
}
</style>

</head> 
<body> 
    <div style="margin:10px"> 
    <p align ='right'><img src='chiromo-logo33.jpg' alt='statement' height='40' width='350'></p> 
    <?php echo $out?> 
    </div> 
</body> 
</html> 

 