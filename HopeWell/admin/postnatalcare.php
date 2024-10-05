<?php
session_start();
?>
<?php include 'includes/session.php'; ?>
<?php 
  include '../timezone.php'; 
  require('open_database.php');
  $today = date('Y-m-d');
  $year = date('Y');
  
  if(isset($_GET['year'])){
    $year = $_GET['year'];
  }
?>


<?php

$name =$_SESSION['name'];
$ref_nos =$_SESSION['ref_no'];
$adm_no =$_SESSION['adm_no'];
$sex =$_SESSION['sex'];


echo $name;


?>





<form action ="postnatalcare.php" method ="GET">

<?php

$mdate =date(y-m-d);




if (isset($_GET['add_next'])){ 
 

$query= "SELECT * FROM hosp_clinic where ref_no='$adm_no'";
   $result =mysql_query($query);
//   $num =mysql_numrows($result);
   $tot =0;
   $i = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($i < $num)

    
      { 
$found ='Yes';
$i++;
}

















$sex =$_SESSION['sex'];

$adm_no =$_SESSION['adm_no'];
$name   =$_SESSION['name'];
$ref_no =$_SESSION['ref_no'];
$payer  =$_SESSION['payer'];
 
$item =$_SESSION['item'];
$price =$_SESSION['price'];
$short =$_SESSION['short'];
$glacc =$_SESSION['glaccount'];
 
   $line1 =$_GET['line1'];
   $line2 =$_GET['line2'];
   $line3 =$_GET['line3'];
   $line4 =$_GET['line4'];
   $line5 =$_GET['line5'];
   $line6 =$_GET['line6'];
   $line7 =$_GET['line7'];
   $line8 =$_GET['line8'];
   $line9 =$_GET['line9'];
   $line10 =$_GET['line10'];
   $line11 =$_GET['line11'];
   $line12 =$_GET['line12'];
   $line13 =$_GET['line13'];
   $line14 =$_GET['line14'];
   $line15 =$_GET['line15'];
   $line16 =$_GET['line16'];
   $line17 =$_GET['line17'];
   $line18 =$_GET['line18'];
   $line19 =$_GET['line19'];
   $line20 =$_GET['line20'];
   $line21 =$_GET['line21'];
   $line22 =$_GET['line22'];
   $line23 =$_GET['line23'];
   $line24 =$_GET['line24'];
   $line25 =$_GET['line25'];
   $line26 =$_GET['line26'];
   $line27 =$_GET['line27'];
   $line28 =$_GET['line28'];
   $line29 =$_GET['line29'];
   $line30 =$_GET['line30'];
   $line31 =$_GET['line31'];
   $line32 =$_GET['line32'];
   $line33 =$_GET['line33'];
   $line34 =$_GET['line34'];
   $line35 =$_GET['line35'];
   $line36 =$_GET['line36'];
   $line37 =$_GET['line37'];
   $line38 =$_GET['line38'];
   $line39 =$_GET['line39'];
   $line40 =$_GET['line40'];
   $line41 =$_GET['line41'];
   $line42 =$_GET['line42'];
   $line43 =$_GET['line43'];
   $line44 =$_GET['line44'];
   $line45 =$_GET['line45'];
   $line46 =$_GET['line46'];
   $line47 =$_GET['line47'];
   $line48 =$_GET['line48'];
   $line49 =$_GET['line49'];
   $line50 =$_GET['line50'];
   $line51 =$_GET['line51'];
   $line52 =$_GET['line52'];
   $line53 =$_GET['line53'];
   $line54 =$_GET['line54'];
   $line55 =$_GET['line55'];
   $line56 =$_GET['line51'];
   $line57 =$_GET['line51'];
   $line58 =$_GET['line51'];
   $line59 =$_GET['line51'];
   $line60 =$_GET['line60'];
   $line61 =$_GET['line61'];
   $line62 =$_GET['line62'];
   $line63 =$_GET['line63'];
   $line64 =$_GET['line64'];
   $line65 =$_GET['line65'];
   $line66 =$_GET['line66'];
   $line67 =$_GET['line67'];
   $line68 =$_GET['line68'];
   $line69 =$_GET['line69'];
   $line70 =$_GET['line70'];
   $line71 =$_GET['line71'];
   $line72 =$_GET['line72'];
   $line73 =$_GET['line73'];
   $line74 =$_GET['line74'];
   $line75 =$_GET['line75'];
   $line76 =$_GET['line76'];
   $line77 =$_GET['line77'];
   $line78 =$_GET['line78'];
   $line79 =$_GET['line79'];
   $line80 =$_GET['line80'];
   $line81 =$_GET['line81'];
   $line82 =$_GET['line82'];
   $line83 =$_GET['line83'];
   $line84 =$_GET['line84'];
   $line85 =$_GET['line85'];
   $line86 =$_GET['line86'];
   $line87 =$_GET['line87'];
   $line88 =$_GET['line88'];
   $line89 =$_GET['line89'];
   $line90 =$_GET['line90'];
   $line91 =$_GET['line91'];
   $line92 =$_GET['line92'];
   $line93 =$_GET['line93'];
   $line94 =$_GET['line94'];
   $line95 =$_GET['line95'];
   $line96 =$_GET['line96'];
   $line97 =$_GET['line97'];
   $line98 =$_GET['line98'];
   $line99 =$_GET['line99'];
   $line100 =$_GET['line100'];
   $line101 =$_GET['line101'];
   $line102 =$_GET['line102'];
   $line103 =$_GET['line103'];
   $line104 =$_GET['line104'];
   $line105 =$_GET['line105'];
   $line106 =$_GET['line106'];
   $line107 =$_GET['line107'];
   $line108 =$_GET['line108'];
   $line109 =$_GET['line109'];
   $line110 =$_GET['line110'];


If ($found =='No'){
 
$query9= "INSERT INTO hosp_clinic VALUES ('','$adm_no','$name','$sex','$mdate','$adm_no','good','$line2','$line3','$line4','$line5','$line6','$line7','$line8','$line9','$line10','$line11','$line12','$line13','$line14',
'$line15','$line16','$line17','$line18','$line19','$line20',
'$line21','$line22','$line23','$line24','$line25','$line26',
'$line27','$line28','$line29','$line30','$line31','$line32',
'$line33','$line34','$line35','$line36','$line37','$line38',
'$line39','$line40','$line41','$line42','$line43','$line44',
'$line45','$line46','$line47','$line48','$line49','$line50',
'$line51','$line52','$line53','$line54','$line55','$line56',
'$line57','$line58','$line59','$line60','$line61','$line62',
'$line63','$line64','$line65','$line66','$line67','$line68',
'$line69','$line70','$line71','$line72','$line73','$line74',
'$line75','$line76','$line77','$line78','$line79','$line80',
'$line81','$line82','$line83','$line84','$line85','$line86',
'$line87','$line88','$line89','$line90','$line91','$line92',
'$line93','$line94','$line95','$line96','$line97','$line98',
'$line99','$line100','$line101','$line102','$line103','$line104','$line105','$line106','$line107','$line108','$line109',
'$line110')"; 
  $result9 =mysql_query($query9);


}else{


$query9= "UPDATE hosp_clinic  SET line1='$line1',line2='$line2',line3='$line3',line4='$line4',line5='$line5',line6='$line6',line7='$line7',line19='$line19',line20='$line20',line21='$line21',line22='$line22',line23='$line23',line24='$line24',line25='$line25'
where adm_no ='$adm_no' and ref_no='$adm_no'"; 
  
   $result9 =mysql_query($query9);




$query9= "UPDATE hosp_clinic  SET line39='$line39',line40='$line40',line41='$line41',line42='$line42',line43='$line43',line44='$line44',line45='$line45',line46='$line46',line47='$line47',line48='$line48',line49='$line49',line50='$line50',line51='$line51',line52='$line52',line53='$line53',line54='$line54',line55='$line55',line56='$line56',line57='$line57',line58='$line58',line59='$line59',line60='$line60',line61='$line61',line62='$line62',line63='$line63',line64='$line64',line65='$line65',line66='$line66' where adm_no ='$adm_no' and ref_no='$adm_no'"; 
 $result9 =mysql_query($query9);



$query9= "UPDATE hosp_clinic  SET line67='$line67',line68='$line68',line69='$line69',line70='$line70',line71='$line71',line72='$line72',line73='$line73',line74='$line74',line75='$line75',line76='$line76',line77='$line77',line78='$line78',line79='$line79',line80='$line80',line81='$line81',line82='$line82',line83='$line83',line84='$line84',line85='$line85',line86='$line86',line87='$line87',line88='$line88',line89='$line89',line90='$line90',line91='$line91',line92='$line92',line93='$line93',line94='$line94',line95='$line95',line96='$line96',line97='$line97',line98='$line98',line99='$line99',line100='$line100',line101='$line101',line102='$line102',line103='$line103',line104='$line104',line105='$line105',line106='$line106',line107='$line107',line108='$line108',line109='$line109',line110='$line110' where adm_no ='$adm_no' and ref_no='$adm_no'"; 


  $result9 =mysql_query($query9);

   }












}else{



$query= "SELECT * FROM hosp_clinic ";
   $result =mysql_query($query);
   $num =mysql_numrows($result);
   $tot =0;
   $i = 0;
   $results ='No';
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($i < $num)
   


      { 



   $line1 =mysql_result($result,$i,'line1');
   $line2 =mysql_result($result,$i,'line2');
   $line3 =mysql_result($result,$i,'line3');
   $line4 =mysql_result($result,$i,'line4');
   $line5 =mysql_result($result,$i,'line5');
   $line6 =mysql_result($result,$i,'line6');
   $line7 =mysql_result($result,$i,'line7');
   $line8 =mysql_result($result,$i,'line8');
   $line9 =mysql_result($result,$i,'line9');
   $line10 =mysql_result($result,$i,'line10');
   $line11 =mysql_result($result,$i,'line11');
   $line12 =mysql_result($result,$i,'line12');
   $line13 =mysql_result($result,$i,'line13');
   $line14 =mysql_result($result,$i,'line14');
   $line15 =mysql_result($result,$i,'line15');
   $line16 =mysql_result($result,$i,'line16');
   $line17 =mysql_result($result,$i,'line17');
   $line18 =mysql_result($result,$i,'line18');
   $line19 =mysql_result($result,$i,'line19');
   $line20 =mysql_result($result,$i,'line20');
   $line21 =mysql_result($result,$i,'line21');
   $line22 =mysql_result($result,$i,'line22');
   $line23 =mysql_result($result,$i,'line23');
   $line24 =mysql_result($result,$i,'line24');
   $line25 =mysql_result($result,$i,'line25');
   $line26 =mysql_result($result,$i,'line26');
   $line27 =mysql_result($result,$i,'line27');
   $line28 =mysql_result($result,$i,'line28');
   $line29 =mysql_result($result,$i,'line29');
   $line30 =mysql_result($result,$i,'line30');
   $line31 =mysql_result($result,$i,'line31');
   $line32 =mysql_result($result,$i,'line32');
   $line33 =mysql_result($result,$i,'line33');
   $line34 =mysql_result($result,$i,'line34');
   $line35 =mysql_result($result,$i,'line35');
   $line36 =mysql_result($result,$i,'line36');
   $line37 =mysql_result($result,$i,'line37');
   $line38 =mysql_result($result,$i,'line38');
   $line39 =mysql_result($result,$i,'line39');
   $line40 =mysql_result($result,$i,'line40');
   $line41 =mysql_result($result,$i,'line41');
   $line42 =mysql_result($result,$i,'line42');
   $line43 =mysql_result($result,$i,'line43');
   $line44 =mysql_result($result,$i,'line44');
   $line45 =mysql_result($result,$i,'line45');
   $line46 =mysql_result($result,$i,'line46');
   $line47 =mysql_result($result,$i,'line47');
   $line48 =mysql_result($result,$i,'line48');
   $line49 =mysql_result($result,$i,'line49');
   $line50 =mysql_result($result,$i,'line50');
   $line51 =mysql_result($result,$i,'line51');
   $line52 =mysql_result($result,$i,'line52');
   $line53 =mysql_result($result,$i,'line53');
   $line54 =mysql_result($result,$i,'line54');
   $line55 =mysql_result($result,$i,'line55');
   $line56 =mysql_result($result,$i,'line51');
   $line57 =mysql_result($result,$i,'line51');
   $line58 =mysql_result($result,$i,'line51');
   $line59 =mysql_result($result,$i,'line51');
   $line60 =mysql_result($result,$i,'line60');
   $line61 =mysql_result($result,$i,'line61');
   $line62 =mysql_result($result,$i,'line62');
   $line63 =mysql_result($result,$i,'line63');
   $line64 =mysql_result($result,$i,'line64');
   $line65 =mysql_result($result,$i,'line65');
   $line66 =mysql_result($result,$i,'line66');
   $line67 =mysql_result($result,$i,'line67');
   $line68 =mysql_result($result,$i,'line68');
   $line69 =mysql_result($result,$i,'line69');
   $line70 =mysql_result($result,$i,'line70');
   $line71 =mysql_result($result,$i,'line71');
   $line72 =mysql_result($result,$i,'line72');
   $line73 =mysql_result($result,$i,'line73');
   $line74 =mysql_result($result,$i,'line74');
   $line75 =mysql_result($result,$i,'line75');
   $line76 =mysql_result($result,$i,'line76');
   $line77 =mysql_result($result,$i,'line77');
   $line78 =mysql_result($result,$i,'line78');
   $line79 =mysql_result($result,$i,'line79');
   $line80 =mysql_result($result,$i,'line80');
   $line81 =mysql_result($result,$i,'line81');
   $line82 =mysql_result($result,$i,'line82');
   $line83 =mysql_result($result,$i,'line83');
   $line84 =mysql_result($result,$i,'line84');
   $line85 =mysql_result($result,$i,'line85');
   $line86 =mysql_result($result,$i,'line86');
   $line87 =mysql_result($result,$i,'line87');
   $line88 =mysql_result($result,$i,'line88');
   $line89 =mysql_result($result,$i,'line89');
   $line90 =mysql_result($result,$i,'line90');
   $line91 =mysql_result($result,$i,'line91');
   $line92 =mysql_result($result,$i,'line92');
   $line93 =mysql_result($result,$i,'line93');
   $line94 =mysql_result($result,$i,'line94');
   $line95 =mysql_result($result,$i,'line95');
   $line96 =mysql_result($result,$i,'line96');
   $line97 =mysql_result($result,$i,'line97');
   $line98 =mysql_result($result,$i,'line98');
   $line99 =mysql_result($result,$i,'line99');
   $line100 =mysql_result($result,$i,'line100');
   $line101 =mysql_result($result,$i,'line101');
   $line102 =mysql_result($result,$i,'line102');
   $line103 =mysql_result($result,$i,'line103');
   $line104 =mysql_result($result,$i,'line104');
   $line105 =mysql_result($result,$i,'line105');
   $line106 =mysql_result($result,$i,'line106');
   $line107 =mysql_result($result,$i,'line107');
   $line108 =mysql_result($result,$i,'line108');
   $line109 =mysql_result($result,$i,'line109');
   $line110 =mysql_result($result,$i,'line110');     








  $i++;
}
}

  
?>




<?php


echo"POST NATAL EXAMINATION<br><br>";

echo"<table width ='100%'>";
echo "<tr><td width ='25%' bgcolor ='black'><font color ='white'>Date/Visit</td>";
echo "<td width ='25%' bgcolor ='black'><font color ='white'>48hrs</td>";
echo "<td width ='25%' bgcolor ='black'><font color ='white'>1 - 2 weeks</td>";
echo "<td width ='25%' bgcolor ='black'><font color ='white'>3 Targeted Visits</td>";
echo "</tr>";


echo "</table>";

echo"<table width ='100%'>";
echo "<tr><td width ='25%'>Blood Pressure</td>";
echo "<td width ='25%'><input type='text' id ='line1' name='line1' value ='$line1'></td>";

echo "<td width ='25%'><input type='text' id ='line2' name='line2' value ='$line2'></td>";
echo "<td width ='25%'><input type='text' id ='line3' name='line3' value ='$line3'></td>";
echo "</tr>";


echo "<tr>";
echo "<td width ='25%'>Temp</td>";

echo "<td width ='25%'><input type='text' id ='line4' name='line4' value ='$line4'></td>";
echo "<td width ='25%'><input type='text' id ='line5' name='line5' value ='$line5'></td>";
echo "<td width ='25%'><input type='text' id ='line6' name='line6' value ='$line6'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Pulse</td>";
echo "<td width ='25%'><input type='text' id ='line7' name='line7' value ='$line7'></td>";
echo "<td width ='25%'><input type='text' id ='line8' name='line8' value ='$line8'></td>";
echo "<td width ='25%'><input type='text' id ='line9' name='line9' value ='$line9'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Respiratory rate</td>";
echo "<td width ='25%'><input type='text' id ='line10' name='line10' value ='$line10'></td>";
echo "<td width ='25%'><input type='text' id ='line11' name='line11' value ='$line11'></td>";
echo "<td width ='25%'><input type='text' id ='line12' name='line12' value ='$line12'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Genaral Condition</td>";
echo "<td width ='25%'><input type='text' id ='line13' name='line13' value ='$line13'></td>";
echo "<td width ='25%'><input type='text' id ='line14' name='line14' value ='$line14'></td>";
echo "<td width ='25%'><input type='text' id ='line15' name='line15' value ='$line15'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Breast</td>";
echo "<td width ='25%'><input type='text' id ='line16' name='line16' value ='$line16'></td>";
echo "<td width ='25%'><input type='text' id ='line17' name='line17' value ='$line17'></td>";
echo "<td width ='25%'><input type='text' id ='line18' name='line18' value ='$line18'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>C/S Scar</td>";
echo "<td width ='25%'><input type='text' id ='line19' name='line19' value ='$line19'></td>";
echo "<td width ='25%'><input type='text' id ='line20' name='line20' value ='$line20'></td>";
echo "<td width ='25%'><input type='text' id ='line21' name='line21' value ='$line21'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Involution of Uterus</td>";
echo "<td width ='25%'><input type='text' id ='line22' name='line22' value ='$line22'></td>";
echo "<td width ='25%'><input type='text' id ='line23' name='line23' value ='$line23'></td>";
echo "<td width ='25%'><input type='text' id ='line24' name='line24' value ='$line24'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Condition of episiotomy</td>";
echo "<td width ='25%'><input type='text' id ='line25' name='line25' value ='$line25'></td>";
echo "<td width ='25%'><input type='text' id ='line26' name='line26' value ='$line26'></td>";
echo "<td width ='25%'><input type='text' id ='line27' name='line27' value ='$line27'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Lochia</td>";
echo "<td width ='25%'><input type='text' id ='line28' name='line28' value ='$line28'></td>";
echo "<td width ='25%'><input type='text' id ='line29' name='line29' value ='$line29'></td>";
echo "<td width ='25%'><input type='text' id ='line30' name='line30' value ='$line30'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Pelvic Exam</td>";
echo "<td width ='25%'><input type='text' id ='line31' name='line31' value ='$line31'></td>";
echo "<td width ='25%'><input type='text' id ='line32' name='line32' value ='$line32'></td>";
echo "<td width ='25%'><input type='text' id ='line33' name='line33' value ='$line33'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Haemoglobin</td>";
echo "<td width ='25%'><input type='text' id ='line34' name='line34' value ='$line34'></td>";
echo "<td width ='25%'><input type='text' id ='line35' name='line35' value ='$line35'></td>";
echo "<td width ='25%'><input type='text' id ='line36' name='line36' value ='$line36'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Mother's HIV satatu</td>";
echo "<td width ='25%'><input type='text' id ='line37' name='line37' value ='$line37'></td>";
echo "<td width ='25%'><input type='text' id ='line38' name='line38' value ='$line38'></td>";
echo "<td width ='25%'><input type='text' id ='line39' name='line39' value ='$line39'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Baby's Condition</td>";
echo "<td width ='25%'><input type='text' id ='line40' name='line40' value ='$line40'></td>";
echo "<td width ='25%'><input type='text' id ='line41' name='line41' value ='$line41'></td>";
echo "<td width ='25%'><input type='text' id ='line42' name='line42' value ='$line42'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Baby's feeding Method</td>";
echo "<td width ='25%'><input type='text' id ='line43' name='line43' value ='$line43'></td>";
echo "<td width ='25%'><input type='text' id ='line44' name='line44' value ='$line44'></td>";
echo "<td width ='25%'><input type='text' id ='line45' name='line45' value ='$line45'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Umblical Cord</td>";
echo "<td width ='25%'><input type='text' id ='line46' name='line46' value ='$line46'></td>";
echo "<td width ='25%'><input type='text' id ='line47' name='line47' value ='$line47'></td>";
echo "<td width ='25%'><input type='text' id ='line48' name='line48' value ='$line48'></td>";
echo "</tr>";


echo "<tr>";
echo "<td width ='25%'>Baby Immunization Started</td>";
echo "<td width ='25%'><input type='text' id ='line49' name='line49' value ='$line49'></td>";
echo "<td width ='25%'><input type='text' id ='line50' name='line50' value ='$line50'></td>";
echo "<td width ='25%'><input type='text' id ='line51' name='line51' value ='$line51'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Mother given Vit A</td>";
echo "<td width ='25%'><input type='text' id ='line52' name='line52' value ='$line52'></td>";
echo "<td width ='25%'><input type='text' id ='line53' name='line53' value ='$line53'></td>";
echo "<td width ='25%'><input type='text' id ='line54' name='line54' value ='$line54'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Mother given ARV prophlaxis</td>";
echo "<td width ='25%'><input type='text' id ='line55' name='line55' value ='$line55'></td>";
echo "<td width ='25%'><input type='text' id ='line56' name='line56' value ='$line56'></td>";
echo "<td width ='25%'><input type='text' id ='line57' name='line57' value ='$line57'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Mother on HAART</td>";
echo "<td width ='25%'><input type='text' id ='line58' name='line58' value ='$line58'></td>";
echo "<td width ='25%'><input type='text' id ='line59' name='line59' value ='$line59'></td>";
echo "<td width ='25%'><input type='text' id ='line60' name='line60' value ='$line60'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Moth. Cotrimoxazole prophalaxis</td>";
echo "<td width ='25%'><input type='text' id ='line61' name='line61' value ='$line61'></td>";
echo "<td width ='25%'><input type='text' id ='line62' name='line62' value ='$line62'></td>";
echo "<td width ='25%'><input type='text' id ='line63' name='line63' value ='$line63'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Infant given ARV prophylaxis</td>";
echo "<td width ='25%'><input type='text' id ='line64' name='line64' value ='$line64'></td>";
echo "<td width ='25%'><input type='text' id ='line65' name='line65' value ='$line65'></td>";
echo "<td width ='25%'><input type='text' id ='line66' name='line66' value ='$line66'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Infant cotrimoxazole prophylaxix</td>";
echo "<td width ='25%'><input type='text' id ='line67' name='line67' value ='$line67'></td>";
echo "<td width ='25%'><input type='text' id ='line68' name='line68' value ='$line68'></td>";
echo "<td width ='25%'><input type='text' id ='line69' name='line69' value ='$line69'></td>";
echo "</tr>";

echo "<tr>";
echo "<td width ='25%'>Counseling on family Planning</td>";
echo "<td width ='25%'><input type='text' id ='line70' name='line70' value ='$line70'></td>";
echo "<td width ='25%'><input type='text' id ='line71' name='line71' value ='$line71'></td>";
echo "<td width ='25%'><input type='text' id ='line72' name='line72' value ='$line72'></td>";
echo "</tr>";


echo"</table>";

echo"<table><td width ='20'><input type='submit' name='add_next'  class='button' value='Save'></td></table>";



?>



