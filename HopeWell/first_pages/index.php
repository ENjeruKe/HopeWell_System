<?php
//echo"System was down...Kindly call 0729446243 to report the system is back";
//die();
date_default_timezone_set("Africa/Nairobi"); 
ini_set('date.timezone','Africa/Nairobi');

$now = time();
$twoPm = mktime(14); // first argument is HOUR

//if ( $now < $twoPm ){
    // do this
  //echo 'My Time is....'.$now;
//}else{
 // echo 'Time is....'.$twoPm;
//}


include_once("z_db.php");
include 'includes/mysqli_connect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']))
{
$status = "OK"; //initial status
$msg="";
	$username=mysqli_real_escape_string($con,$_POST['username']); //fetching details through post method
     $password = mysqli_real_escape_string($con,$_POST['password']);

$_SESSION['username']  =$username ;
$_SESSION['password']= $password;


if ( strlen($username) < 2 ){
$msg=$msg."Username must be more than 5 char legth<BR>";
$status= "NOTOK";}

if ( strlen($password) < 2 ){ //checking if password is greater then 8 or not
$msg=$msg."Password must be more than 5 char legth<BR>";
$status= "NOTOK";}

if($status=="OK"){

// Retrieve username and password from database according to user's input, preventing sql injection
$query ="SELECT * FROM systemfile2 WHERE (username = '" . mysqli_real_escape_string($con,$_POST['username']) . "') AND (password = '" . mysqli_real_escape_string($con,$_POST['password']) . "')";

if ($stmt = mysqli_prepare($con, $query)) {
   
    /* execute query */
    mysqli_stmt_execute($stmt);

    /* store result */
    mysqli_stmt_store_result($stmt);

    $num=mysqli_stmt_num_rows($stmt);
//echo "The user....".$num;

    /* close statement */
    mysqli_stmt_close($stmt);
}
//mysqli_close($con);
// Check username and password match

if (($num) >= 1) {

session_start();
        // Set username session variable
        $_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
 		
	$sql = "SELECT * FROM systemfile2 WHERE username = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
	
	
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
$_SESSION['pat_reg'] = $patients;
	
	
	
	

        // Jump to secured page
		print "
				<script language='javascript'>
					window.location = 'admin/atttendance.php';
				</script>"; 


}



else{
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>Username And Password Does Not Match Or Your Account Is Inactive.</div>"; //printing error if found in validation
				
}
    
}else {
        
$errormsg= "
<div class='alert alert-danger'>
                    <button type='button' class='close' data-dismiss='alert'>&times;</button>
                    <i class='fa fa-ban-circle'></i><strong>Please Fix Below Errors : </br></strong>".$msg."</div>"; //printing error if found in validation
				
	 
}
}


?>

<!DOCTYPE html>
<html lang="en" class="app">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<title>Medi +</title>
<meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="css/app.v1.css" type="text/css" />
<!--[if lt IE 9]> <script src="js/ie/html5shiv.js"></script> <script src="js/ie/respond.min.js"></script> <script src="js/ie/excanvas.js"></script> <![endif]-->
<style type="text/css">html {
    overflow-y: scroll;
background: url(images/login2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

</style>


<script language="javascript" type="text/javascript">
var newwindow;
function popcontact505(url) {
	newwindow=window.open(url,'newwindow','height=400,width=600');
	if (window.focus) {newwindow.focus()}
	return false;
}
</script>




<!--div id="google_translate_element" align="right"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script-->



        
</head>
<body>
<section id="content" class="m-t-lg wrapper-md animated fadeInUp">
  <div class="container aside-xl"> <a class="navbar-brand block" href="index.php">Login</a>
    <section class="m-b-lg">
      <header class="wrapper text-center"> <strong>Sign in to to see stats</strong> </header>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"], ENT_QUOTES, "utf-8"); ?>" method="post">
        <div class="list-group">
		<?php 
						if($_SERVER['REQUEST_METHOD'] == 'POST' && ($errormsg!=""))
						{
						print $errormsg;
						}
						?>
          <div class="list-group-item">
            <input type="text" placeholder="Username" class="form-control no-border" name="username" required>
          </div>
          <div class="list-group-item">
            <input type="password" placeholder="Password" class="form-control no-border" name="password" required>
          </div>
        </div>
        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
        <div class="text-center m-t m-b"><a href="#"><small style="color:#ffffff;">Forgot password?</small></a></div>
        <div class="line line-dashed"></div>
</form>
    </section>
    
   
  </div>
</section>
 
<!-- footer -->
<footer id="footer">
  <div class="text-center padder">
    <p> <small style="color:#ffffff;"><?php $query="SELECT footer from settings where sno=0"; 
 
 
 $result = mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
{
	$footer="$row[footer]";
	print $footer;
	}
  ?></small> </p>
  </div>
  

</footer>

<!-- / footer -->
<!-- Bootstrap -->
<!-- App -->
<script src="js/app.v1.js"></script><br><br>



    
     <li><a href=javascript:popcontact505('admin/clockin.php')><i class="fa fa-share-alt"></i> <span><img src='clockin.jpg' alt='Smiley face' height='10%' width='10%'></span></a></li><br>
        <li><a href=javascript:popcontact505('admin/test_sms.php')><i class="fa fa-send-o"></i> <span><img src='clockout.jpg' alt='Smiley face' height='10%' width='10%'></span></a></li>
        
<script src="js/app.plugin.js"></script>
</body>
 
</html>