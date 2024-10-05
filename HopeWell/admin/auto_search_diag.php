<?php
   session_start();
require('open_database.php');
$company_identity = $_SESSION['company'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--title>Autocomplete search in PHP, Mysql, Json, Autosuggestion search in PHP, Jquery UI</title-->
<!--meta name="description" content="This is a programming code for auto complete search in PHP, Mysql, Json or Facebook like Autosuggestion. This is a auto Complete Search tutorial developed in php, mysql and jQuery UI. Here I use Json to get response from database. After getting search data user can navigate to respective URL by href link in json."/-->
<!--meta name="keywords" content="Auto complete search, jQuery UI Autocomplete Search, PHP Autocomplete, Auto complete, Facebook Like auto complete, Facebook like Auto suggestion, Autosuggestion, Search, Search in PHP, autocomplete search, autocomplete search in Json, json, php, mysql, online demo, download code, rss, codeing, code, php programming, programming, php demo, jquery demo, discussdesk programming blog, discussdesk, jquery tutorial, technology"/-->

<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script-->

<script src="jquery.min.js"></script>
<script type="text/javascript" src="jquery-ui-1.8.2.custom.min.js"></script> 
<link href="css.css" rel="stylesheet" type="text/css" />

<script type="text/javascript"> 
$(function() {

$("#dd_user_input3").autocomplete({
source: "autodiag1_search.php?cityId=28",
minLength: 2,
select: function(event, ui) {
var getUrl = ui.item.id;
if(getUrl != '#') {
location.href = getUrl;
}
},

html: true, 

open: function(event, ui) {
$(".ui-autocomplete").css("z-index", 1000);
}
});

});
</script>


<script type="text/javascript"> 
$(function() {

$("#dd_user_input4").autocomplete({
source: "autodiag1_search.php?cityId=28",
minLength: 2,
select: function(event, ui) {
var getUrl = ui.item.id;
if(getUrl != '#') {
location.href = getUrl;
}
},

html: true, 

open: function(event, ui) {
$(".ui-autocomplete").css("z-index", 1000);
}
});

});
</script>


<script type="text/javascript"> 
$(function() {

$("#dd_user_input5").autocomplete({
source: "autodiag1_search.php?cityId=28",
minLength: 2,
select: function(event, ui) {
var getUrl = ui.item.id;
if(getUrl != '#') {
location.href = getUrl;
}
},

html: true, 

open: function(event, ui) {
$(".ui-autocomplete").css("z-index", 1000);
}
});

});
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

    //var no = document.getElementById('dd_user_input').value;   

        xmlhttp.open("GET","getservices_diag.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>


<script>
function showUser2(str) { 
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

    //var no = document.getElementById('dd_user_input').value;   

        xmlhttp.open("GET","getservices_diag2.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>


<script>
function showUser3(str) { 
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

    //var no = document.getElementById('dd_user_input').value;   

        xmlhttp.open("GET","getservices_diag3.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>

<style>
.cnt_left {
    border: 1px solid #EEEEEE;
    padding-right: 20px;
    width: 660px;
	height:250px;
}
.cnt_right {
    width: 316px;
	border: 1px solid #EEEEEE;
	height: 250px;
}
.floatL {
	float:left;
}
.floatR {
	float:right;
}
.container{width:1000px;margin:auto;}
.home_link{padding:10px;}
.home_link a {
    color: #0D92E1;
    font: bold 23px arial;
    text-decoration:underline;
}
.main_subs{ border:1px solid #0D92E1;  background:#F3F3F3; height:180px;}
.main_subs p{padding:5px 0 0 5px; color:#0D92E1; font: bold 18px arial,tahoma;}
.subs_email{font: normal 12px arial,tahoma; padding: 26px 0 0 35px;}
.in_subs{padding:5px 0 0 5px; color:#0D92E1; font: bold 18px arial,tahoma;}
.in_subs input{padding:5px 0 0 5px; color:#ccc; font: normal 15px arial,tahoma;}
</style>
</head>
<body>

<!--166/011 doctors of 09
517/17 david lagat drug screen-->

<form onsubmit="return false;">
<?php
$diag1 = $_SESSION['diag1'];
$diag2 = $_SESSION['diag2'];
$diag3 = $_SESSION['diag3'];


echo"<input id='dd_user_input3' type='text' size ='100' class='search_form3' onblur='if(this.value=='')this.value=this.defaultValue;' onfocus='if(this.value==this.defaultValue)this.value='';' value='$diag1' onchange='showUser(this.value)' required";
?>
/><br>

<?php
echo"<input required id='dd_user_input4' type='text' size ='100' class='search_form4' onblur='if(this.value=='')this.value=this.defaultValue;' onfocus='if(this.value==this.defaultValue)this.value='';' value='$diag2' onchange='showUser2(this.value)'";
?>
/><br>

<?php
echo"<input id='dd_user_input5' type='text' size ='100' class='search_form5' onblur='if(this.value=='')this.value=this.defaultValue;' onfocus='if(this.value==this.defaultValue)this.value='';' value='$diag3' onchange='showUser3(this.value)'";
?>
/><br>


</form>

<div id='txtHint'><font size ='1'>Tests requested will be listed here....</font></div>


</div>
<!--div class="cnt_right floatR">
<div class="main_subs">
<p>Subscribe for our Latest articles</p>

<form onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=discussdesk', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target="popupwindow" method="post" action="http://feedburner.google.com/fb/a/mailverify">
<div class="in_subs"><input type="text" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';" value="Enter your email address:" name="email" style="width:258px; height:30px; float:left; border: 2px double #DDDDDD;"></div>
<input type="hidden" name="uri" value="discussdesk">
<input type="hidden" value="en_US" name="loc">
<input type="submit" value="Subscribe" style="font: 17px arial,tahoma;height: 39px;margin: 10px 9px 4px;width: 142px;" class="gsc-search-button"></form>
</div>
</div-->

</div>
</div>

<a href ='auto_display.php'><img src='images/backward22.jpg'></a>
</body>
</html>
