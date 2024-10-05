<?php
function tinh_chi_so_BMI($chieu_cao,$can_nang)
{
	$chieu_cao = $chieu_cao/100;
	$chieu_cao = $chieu_cao * $chieu_cao;
	$BMI = $can_nang / $chieu_cao;
	$BMI = round($BMI,2);
	return $BMI;
}
function the_trang_suc_khoe($BMI)
{
	$result = '';
	if($BMI < 15){$result = 'Very severely underweight';}
	if(15 <= $BMI && $BMI < 16){$result = 'Severely underweight';}
	if(16 <= $BMI && $BMI < 18.5){$result = 'Underweight';}
	if(18.5 <= $BMI && $BMI < 25){$result = 'Normal (healthy weight)';}
	if(25 <= $BMI && $BMI < 30 ){$result = 'Overweight';}
	if(30 <= $BMI && $BMI < 35 ){$result = 'Obese Class I (Moderately obese)';}
	if(35 <= $BMI && $BMI < 40 ){$result = 'Obese Class II (Severely obese)';}
	if($BMI >= 40){$result = 'Obese Class III (Very severely obese)';}	
	return $result;
}
?>
<html>
<head>
	<title>Calculate Your BMI - Standard BMI Calculator</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<meta name="description" content="Calculate Your BMI" />
	<meta name="keywords" content="Body Max Index, BMI, Quetelet index, height, weight, Calculator, healthy" />
</head>
<body>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  $(".BMI").submit(function (e){
		if ($("#chieu_cao").val() == ""){
		  $("#chieu_cao").css('box-shadow', '0px 0px 2px red');
		  alert('Please input your height');
		  e.preventDefault(); 
		}
		if ($("#can_nang").val() == ""){
		  $("#can_nang").css('box-shadow', '0px 0px 2px red');
		  alert('Please input you weight');
		  e.preventDefault(); 
		}
	  });
	});
	</script>
	<p align="center"><span style="font-size:30px">CALCULATE YOUR BMI</span></p>
	<div align="left" style="padding-left:25%;">
	<form method="post" class="BMI">
		<table border="0">
			<tr>
				<td><label for="chieu_cao">Your Height (cm):</label></td>
				<td><input type="text" name="chieu_cao" id="chieu_cao" value=""></td>
			</tr>
			<tr>
				<td><label for="can_nang">Your Weight (kg):</label></td>
				<td><input type="text" name="can_nang" id="can_nang" value=""></td>		
			</tr>
			<tr>
				<td></td>
				<td align="right"><input type="submit" value="COMPUTE BMI"></td>
			</tr>
		</table>
	</form>
	</div>
	<?php
		if (isset($_POST['chieu_cao'])){
			$chieu_cao = $_POST['chieu_cao'];
			$can_nang = $_POST['can_nang'];
			$BMI = tinh_chi_so_BMI($chieu_cao,$can_nang);
			$the_trang = the_trang_suc_khoe($BMI);
			echo "<div align='left' style='padding-left:25%; padding-bottom:30px;'>";
			echo "Your BMI: ".$BMI;
			echo "<br>";
			echo "Condition Your Body: ".$the_trang;
			echo "</div>";
		}
	?>
	<div class="quangcao">
		<center>
			<script type="text/javascript"><!--
			google_ad_client = "ca-pub-1020443662623638";
			/* 336x280_1 */
			google_ad_slot = "2827231852";
			google_ad_width = 336;
			google_ad_height = 280;
			//-->
			</script>
			<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
			</script>
		</center>
	</div>
	</body>
</html>

