<?php 
include 'includes/session.php';
require('open_database.php');
 ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  	<?php include 'includes/navbar.php'; ?>
  	<?php include 'includes/ssm.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


    <?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  $today = date('Y-m-d');
  $year = date('Y');
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>

 <html>

     
       <!--link href="css/bootstrap-responsive.css" rel="stylesheet"-->
<link href="dcss/style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>

<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">

      

<div>
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/bootstrap-responsive.css" rel="stylesheet">


<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>




<?php 

include('open_database.php');

$username = $_SESSION['username'];


			include('includes/connect.php');
				$result = $db->prepare("SELECT * FROM attendance WHERE status<>'' ORDER BY employee_id DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>



</div>
<input type="text" name="filter" style="height:35px; margin-top: -1px;" value="" id="filter" placeholder="Search Shift.........." autocomplete="off" />
<!--a rel="facebox" href="class_add.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Add class</button></a--><br><br>


<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
        <th> Username </th>
			<th> In Date / Time </th>
			<th> Department </th>
			<th> Status </th>
			<!--th> Type Of leave </th>
			<th> Reason </th-->
                <th> Out Date / Time </th>
			<!--th> To </th-->
			<th> Allocated time </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('includes/connect.php');
				$result = $db->prepare("SELECT * FROM attendance WHERE status<>'' ORDER BY employee_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
<?php
$acc =$row['name_id'];
//$acc =$row['name'];
$bb =$row['adm_no'];

//echo"<td><a href=javascript:popcontact7('patients_reg_edit.php?accounts3=$bb')>$acc</td>";
?>



            <td><?php echo $row['employee_id']; ?></td>
            <td><?php echo $row['date'].'&nbsp'. $row['time_in']; ?></td>
            <td><?php echo $row['status']; ?></td>
            <td><?php 
            $acc =$row['num_hr']; 

            if($acc=='Continues'){
                echo "<font color ='FireBrick'>$acc<font>";
            }elseif ($acc=='Active'){
               echo "<font color ='red'>$acc<font>"; 
            }else{ 
               echo "<font color ='blue'>$acc<font>"; 
            }         
              
            ?></td>
			<!--td><?php //echo $row['leave_type']; ?></td>
			<td><?php //echo $row['leave_reason']; ?></td-->
            <td><?php  echo $row['out_dte'].'&nbsp'. $row['time_out']; ?></td>
            <td><?php  echo $row['date_plusday'].'&nbsp'. $row['time_plusday']; ?></td>
			
			<!--td><a rel="facebox" href="apprv.php?id=<?php echo $row['id']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Accept </button></a>
			<a href="#" id="<?php echo $row['id']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Reject</button></a></td-->
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
</div>
</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "reject.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>











  	<?php include 'includes/footer.php'; ?>

</div>
<!-- ./wrapper -->

<!-- Chart Data -->

<!-- End Chart Data -->
<?php include 'includes/scripts.php'; ?>
</body>
</html>