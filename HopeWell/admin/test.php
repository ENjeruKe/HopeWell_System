<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>

<!DOCTYPE html>
<html>
<head>
<script type='text/javascript'
  src='http://code.jquery.com/jquery-2.0.2.js'></script>
<link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<script type='text/javascript'
  src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
<style type='text/css'>
.panel-heading a:after {<!--   w w  w .  j a v a  2 s  . c  o m-->
  font-family: 'Glyphicons Halflings';
  content: "\e114";
  float: right;
  color: grey;
}

.panel-heading a.collapsed:after {
  content: "\e00";
}
</style>
</head>
<body>
  <div class="panel-group" id="accordion"><div class="panel panel-default" id="panel3"><div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-target="#collapseThree"  href="#collapseThree" class="collapsed"> Collapsible Group 
            Item #3 </a></h4></div><div id="collapseThree" class="panel-collapse collapse"><div class="panel-body">

<?php
echo"<b>Med.Test Request</h3><br>";
?>

</div></div></div></div>
  <!-- Post Info -->
<div  style='position: fixed; bottom: 0; left: 0; background: lightgray; width: 100%;'>Based off this SO Question: <a
      href='http://stackoverflow.com/a/11658976/1366033'>Keep Bootstrap Grid Open</a><br /> Based off this SO Question: <a href='http://stackoverflow.com/a/18568997/1366033'>Show Collapse state with Chevron Icon</a><br /> Find documentation: <a href='http://getbootstrap.com/javascript/#collapse-usage'>Bootstrap Collapse Usage</a><br /> Fork This Skeleton Here <a href='http://jsfiddle.net/KyleMit/kcpma/'>Bootrsap 3.0 Skeleton</a><br /><div>
</body>
</html>