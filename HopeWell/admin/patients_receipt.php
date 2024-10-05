<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>﻿
﻿<html>
<head>
<body>

<script language="javascript" type="text/javascript">
<!--
var newwindow;
function popitup(url) {
	newwindow=window.open(url,'newwindow','height=600,width=500');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
function popitup2(url) {
	newwindow=window.open(url,'newwindow','height=600,width=800');
	if (window.focus) {newwindow.focus()}
	return false;
}


function closeWin(url) {
    newwindow.close();   // Closes the new window
}

</script>

<style>
#header {
    line-height:30px;
    background-color:white;
    height:20px;
    width:900px;
    float:left;
    padding:2px;	      
}

#hd2 {
    background-color:blue;
    color:white;
    text-align:left;
    padding:5px;
}

#nav {
    line-height:30px;
    background-color:#eeeeee;
    height:450px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav1 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav2 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:200px;
    float:left;
    padding:5px;	      
}

#nav3 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav4 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:150px;
    float:left;
    padding:5px;	      
}

#nav4a {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:100px;
    float:left;
    padding:5px;	      
}

#nav5 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:75px;
    float:left;
    padding:5px;	      
}

#nav6 {
    line-height:20px;
    background-color:blue;
    color:white;
    height:20px;
    width:60px;
    float:left;
    padding:5px;	      
}
#nav7 {
    line-height:20px;
    background-color:blue;
    color:blue;
    height:20px;
    width:20px;
    float:left;
    padding:5px;	      
}

#nav8 {
    line-height:20px;
    background-color:blue;
    color:blue;
    height:20px;
    width:5px;
    float:left;
    padding:5px;	      
}

#section {
    height:350px;
    width:900px;
    float:left;
    padding:10px;	 	 
}
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}
</style>
</head>




<!--div id="header">
<h1>Cash Register</h1>
</div-->

<!--div id="header" align ="right">
<form action ="patients_reg.html" method ="POST">
<input type="submit" name="Submit"  class="button" value="Print" onclick="return popitup('http://localhost/HGlobal/save_receipt.php')"/>
<input type="submit" name="Submit"  class="button" value="Sales B.Item" onclick="return popitup2('http://localhost/hglobal/list_receiptsbyitem.php')"/>
<input type="submit" name="Submit"  class="button" value="Sales B.Doctor" onclick="return popitup2('http://localhost/list_receipts.php')"/>
<input type="submit" name="Submit"  class="button" value="New Patient "/>
<input type="button" value="Close" onclick="self.close()">
</form>
</div-->


<div id="section">
<OBJECT data="patient_cash_register.php" type="text/html" style="margin: 0%; width: 880px; height: 350px;"></OBJECT>
<br>


<!--OBJECT data="http://localhost/hglobal/patient_cash_details.php" type="text/html" style="margin: 0%; width: 1000px; height: 150px;"></OBJECT-->
</div>



<div id="footer">
Copyright Â© Paltech-systems.com | Affordable Connections - Call. +254-729-446-243
</div>

</body>
</DIV>
</html>