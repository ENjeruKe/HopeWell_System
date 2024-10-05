<?php
session_start();
?>
<?php
 require('open_database.php');

 $branch     = $_SESSION['branch']; 
 $date2 = date('y-m-d');
 $date1 = date('y-m-d');
 if (isset($_GET['accounts3'])){
    $ref_no = $_GET['accounts3'];
    
   $query= "UPDATE ranges set balance ='Yes' where invoice_no ='$ref_no'";
   $result =mysql_query($query) or die(mysql_error());  
    
    
   $SQL= "SELECT * FROM medicalfile where ref_no ='$ref_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);

   $query= "SELECT * FROM medicalfile where ref_no ='$ref_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;
   $i = 0;

   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   while ($row=mysql_fetch_array($hasil)) 
      { 
      $id      = mysql_result($result,$i,"adm_no");          
      $adm_no  = mysql_result($result,$i,"adm_no");          
      $doctor  = mysql_result($result,$i,"doctor");   
      $appointment = mysql_result($result,$i,"date");   
      $name        = mysql_result($result,$i,"name");   
      $date        = mysql_result($result,$i,"date");  
      $telephone   = mysql_result($result,$i,"description");  
      $status      = mysql_result($result,$i,"status");  
      $sex         = mysql_result($result,$i,"sex");
      $weight      = mysql_result($result,$i,"weight");
      $height      = mysql_result($result,$i,"height");
      $temp         = mysql_result($result,$i,"temp");
      $b_p         = mysql_result($result,$i,"b_p");
      $age         = mysql_result($result,$i,"age");  
      $payer       = mysql_result($result,$i,"gl_account");  
      $textarea    = mysql_result($result,$i,"notes");  
      $ref_nos     = mysql_result($result,$i,"ref_no");  
      $time        = '';  
      $email       = '';  
      $image_id = ''; 
      $sign1       = mysql_result($result,$i,"sign1");  
      $sign2       = mysql_result($result,$i,"sign2"); 
      $sign3       = mysql_result($result,$i,"sign3"); 
      $diag1       = mysql_result($result,$i,"diag1"); 
      $diag2       = mysql_result($result,$i,"diag2"); 

      $test1       = mysql_result($result,$i,"test1");  
      $test1_qty   = 1; 
      $test1_results  = mysql_result($result,$i,"test1_result"); 
      $test2       = mysql_result($result,$i,"test2");  
      $test2_qty   = 1; 
      $test2_results  = mysql_result($result,$i,"test2_result"); 
      $test3       = mysql_result($result,$i,"test3");  
      $test3_qty   = 1; 
      $test3_results  = mysql_result($result,$i,"test3_result"); 

      $test4       = mysql_result($result,$i,"test4");  
      $test4_qty   = 1; 
      $test4_results  = mysql_result($result,$i,"test4_result"); 

      $test5       = mysql_result($result,$i,"test5");  
      $test5_qty   = mysql_result($result,$i,"test5_qty"); 
      $test5_results  = mysql_result($result,$i,"test5_result"); 

      $drug1       = mysql_result($result,$i,"med1");  
      $drug1_qty   = mysql_result($result,$i,"med1_qty"); 
      $drug1_dx    = mysql_result($result,$i,"med1_dx");  
      $drug1_dx2   = mysql_result($result,$i,"med1_dx2");  
  
      $drug2       = mysql_result($result,$i,"med2");  
      $drug2_qty   = mysql_result($result,$i,"med2_qty"); 
      $drug2_dx    = mysql_result($result,$i,"med2_dx");  
      $drug2_dx2   = mysql_result($result,$i,"med2_dx2");  

      $drug3       = mysql_result($result,$i,"med3");  
      $drug3_qty   = mysql_result($result,$i,"med3_qty"); 
      $drug3_dx    = mysql_result($result,$i,"med3_dx"); 
      $drug3_dx2   = mysql_result($result,$i,"med3_dx2");  
 
      $drug4       = mysql_result($result,$i,"med4");  
      $drug4_qty   = mysql_result($result,$i,"med4_qty"); 
      $drug4_dx    = mysql_result($result,$i,"med4_dx"); 
      $drug4_dx2   = mysql_result($result,$i,"med4_dx2");  
 
      $drug5       = mysql_result($result,$i,"med5");  
      $drug5_qty   = mysql_result($result,$i,"med5_qty"); 
      $drug5_dx    = mysql_result($result,$i,"med5_dx");
      $drug5_dx2   = mysql_result($result,$i,"med5_dx2");  
  
      $drug6       = mysql_result($result,$i,"med6");  
      $drug6_qty   = mysql_result($result,$i,"med6_qty"); 
      $drug6_dx    = mysql_result($result,$i,"med6_dx");  
      $drug6_dx2   = mysql_result($result,$i,"med6_dx2");  

      $drug7       = mysql_result($result,$i,"med7");  
      $drug7_qty   = mysql_result($result,$i,"med7_qty"); 
      $drug7_dx    = mysql_result($result,$i,"med7_dx");  
      $drug7_dx2   = mysql_result($result,$i,"med7_dx2");  
   $i++;
   }
   //will get information from patients master file later
   //----------------------------------------------------

   //--------------------------------------------
   $query= "SELECT * FROM appointmentf WHERE adm_no ='$adm_no'" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "SELECT * FROM medicalfile WHERE adm_no ='$adm_no'" or die(mysql_error());
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $acc_no      = mysql_result($result,$i,"adm_no");  
      $acc_no2      = mysql_result($result,$i,"adm_no");  
      $name           = mysql_result($result,$i,"name");
  //     $xp          = mysql_result($result,$i,"MiddleName");
  //     $xw          = mysql_result($result,$i,"LastName");
   //   $caddress1    = mysql_result($result,$i,"Mobile");   
  //    $caddress2    = mysql_result($result,$i,"PositionId");   
//      $caddress3    = mysql_result($result,$i,"Address1");   
//      $sex          = mysql_result($result,$i,"gender");   

   }


  // $name = $xx.' '.$xp.' '.$xw; 
   $acc_name =$name;

   $query= "SELECT * FROM companyfile" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $tot =0;

   $i = 0;
   $SQL = "select * FROM companyfile" ;
   $hasil=mysql_query($SQL, $connect);
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;

   while ($row=mysql_fetch_array($hasil)) 
   {         
      $company     = mysql_result($result,$i,"company");  
      $address1    = mysql_result($result,$i,"address1");   
      $address2    = mysql_result($result,$i,"address2");   
      $address3    = mysql_result($result,$i,"address3");   
      $address4    = mysql_result($result,$i,"address4");   

   }
 
   echo"<table width ='100%'><h1>";      
   echo"<tr><td align ='left' width ='20%'></td><td align ='left' width ='30%'></td><td width ='0%'></td><td align ='right' width ='50%'><b>$company</b></td></tr>";
   echo"<tr><td align ='left' width ='20%'></td><td align ='left' width ='30%'></td><td width ='0%'></td><td align ='right' width ='50%'><b>$address1</b></td></tr>";
   echo"<tr><td align ='left' width ='20%'></td><td align ='left' width ='30%'></td><td width ='0%'></td><td align ='right' width ='50%'><b>$address2</b></td></tr>";
   echo"<tr><td align ='left' width ='20%'></td><td align ='left' width ='30%'></td><td width ='0%'></td><td align ='right' width ='50%'><b>$address3</b></td></tr>";
   echo"<tr><td align ='left' width ='20%'></td><td align ='left' width ='10%'></td><td width ='0%'></td></td><td align ='right' width ='70%'><b>$address4</b></td></tr>";
   echo"</table>";
 
   echo"<table width ='100%'><h1>";      
   echo"<tr><td align ='left' width ='30%'><b>Patients Name</b></td><td align ='left' width ='40%'><b>$acc_name</b></td><td width ='0%'></td><td align ='right' width ='30%'></td></tr>";
   echo"<tr><td align ='left' width ='100'><b>Address</b></td><td align ='left'><b>$caddress3</b></td><td width ='100'></td><td align ='right' width ='50%'></td></tr>";
   echo"<tr><td align ='left' width ='100'><b>Telephone</b></td><td align ='left'><b>+254$caddress1</b></td><td width ='100'></td><td align ='right' width ='50%'></td></tr>";
   echo"<tr><td align ='left' width ='100'><b>Payableby</b></td><td align ='left'><b>$caddress2</b></td><td width ='100'></td><td align ='right' width ='50%'></td></tr>";
   echo"<tr><td>Gender:</td><td align ='left'><b>$sex</b></td><td width ='50'></td><td align ='right' width ='50%'></td></tr>";
   echo"</table>";

   echo"<p align ='centre'><h3><u>MEDICAL TESTS RESULTS</u></h3></p>";

   $to ='  To  ';
  
$_SESSION['ref_no'] = $ref_nos;

//$sql="SELECT * FROM  ranges WHERE invoice_no = '$ref_nos'";
//$result = mysql_query($sql);
$found ='No';
$grouped ='No';
echo $ref_nos;

$sql="SELECT * FROM  ranges WHERE invoice_no = '$ref_nos'";
$result = mysql_query($sql);
      $id = 0;
      $nRecord = 1;
      $No = $nRecord;
      $num =mysql_numrows($result) or die(mysql_error());
      $i =0;
 while ($i < $num){         
            
//$grouped ='No';
//while($row = mysql_fetch_array($result)) {
    $test =mysql_result($result,$i,"description");  
     $item_desc =mysql_result($result,$i,"description");  
    $xckk =mysql_result($result,$i,"date"); 
    $line1 =mysql_result($result,$i,"line1"); 
    $line2 =mysql_result($result,$i,"line2"); 
    $value =mysql_result($result,$i,"value"); 
    $time_a =mysql_result($result,$i,"time_a"); 
    $time_b =mysql_result($result,$i,"time_b"); 
    $flag =mysql_result($result,$i,"flag"); 
//$testing =mysql_result($result,$i,"description");  


   $v1  = mysql_result($result,$i,"v1"); 
   $v2   = mysql_result($result,$i,"v2"); 
   $v3  = mysql_result($result,$i,"v3"); 
   
   $v4    = mysql_result($result,$i,"v4"); 
   $v5  = mysql_result($result,$i,"v5"); 
   $v6    = mysql_result($result,$i,"v6"); 
   
   $v7 = mysql_result($result,$i,"v7"); 
   $v8  = mysql_result($result,$i,"v8"); 
   $v9   = mysql_result($result,$i,"v9"); 
   
   $v10  = mysql_result($result,$i,"v10"); 
   $v11    = mysql_result($result,$i,"v11"); 
   $v12  = mysql_result($result,$i,"v12"); 
   
   $v13    = mysql_result($result,$i,"v13"); 
   $v14 = mysql_result($result,$i,"v14"); 
   $v15  = mysql_result($result,$i,"v15"); 
   
   $v16   = mysql_result($result,$i,"v16"); 
   $v17  = mysql_result($result,$i,"v17"); 
   $v18    = mysql_result($result,$i,"v18"); 
   
   $v19  = mysql_result($result,$i,"v19"); 
   $v20    = mysql_result($result,$i,"v20"); 
   $v21 = mysql_result($result,$i,"v21"); 
   
   $v22  = mysql_result($result,$i,"v22"); 
   $v23   = mysql_result($result,$i,"v23"); 
   $v24  = mysql_result($result,$i,"v24"); 
   
   $v25    = mysql_result($result,$i,"v25"); 
   $v26  = mysql_result($result,$i,"v26"); 
   $v27    = mysql_result($result,$i,"v27"); 
   $v28 = mysql_result($result,$i,"v28"); 
   $v29  = mysql_result($result,$i,"v29"); 
   $v30    = mysql_result($result,$i,"v30"); 
   $v31  = mysql_result($result,$i,"v31"); 
   $v32    = mysql_result($result,$i,"v32"); 
   $v33 = mysql_result($result,$i,"v33"); 
    
   $v34    = mysql_result($result,$i,"v34"); 
   $v35  = mysql_result($result,$i,"v35"); 
   $v36    = mysql_result($result,$i,"v36"); 
   $v37 = mysql_result($result,$i,"v37"); 
   $v38  = mysql_result($result,$i,"v38"); 
   $v39    = mysql_result($result,$i,"v39"); 
   $v40  = mysql_result($result,$i,"v40"); 
   $v41    = mysql_result($result,$i,"v41"); 
   $v42 = mysql_result($result,$i,"v42"); 

   $v43    = mysql_result($result,$i,"v43"); 
   $v44  = mysql_result($result,$i,"v44"); 
   $v45    = mysql_result($result,$i,"v45"); 
   $v46 = mysql_result($result,$i,"v46"); 
   $v47  = mysql_result($result,$i,"v47"); 
   $v48    = mysql_result($result,$i,"v48"); 
   $v49  = mysql_result($result,$i,"v49"); 
   $v50    = mysql_result($result,$i,"v50"); 
   $v51 = mysql_result($result,$i,"v51"); 
    
   $v52    = mysql_result($result,$i,"v52"); 
   $v53  = mysql_result($result,$i,"v53"); 
   $v54    = mysql_result($result,$i,"v54"); 
   $v55 = mysql_result($result,$i,"v55"); 
   $v56  = mysql_result($result,$i,"v56"); 
   $v57    = mysql_result($result,$i,"v57"); 
   $flagx = mysql_result($result,$i,"flag"); 


 
    $test1_result=mysql_result($result,$i,"test1_result"); 
    $v1=mysql_result($result,$i,"v1"); 
    $_SESSION['test'] = $test;
 
    $testing = substr($test,0,10);
 
     $mmw = substr($test,0,25);

if ($mmw=='THYROID FUNCTION PROFILE'){
       $grouped ='Yes';
        require('report_tfp.php');
}
   
    if ($test=='Urine for Analysis' || $test=='URINALYSIS'){
        $grouped ='Yes';
         require('report_urine_analysis.php');
    }  
 $str = $item_desc;

if($test=='Full Hemograms' || $test=='FULL HAEMOGRAM')
    {
    $grouped ='Yes';


 
   echo "<table width ='100%'>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>Test</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Result</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(M)</td>";
echo "<td width ='10%' bgcolor ='black'><font color ='white'>Ranges(F)</td></tr>";
echo "<tr><td width ='50%' bgcolor ='black'><font color ='white'>$test</td><td></td><td></td><td></td></tr>";

echo "<tr><td width ='50%' >WBC</td>";
echo "</td><td><input type='text' id ='line1' name='line1' size='5' value ='$v1'></td><td><input type='text' name='line1_1' size='5' value ='4.0-10.0' readonly></td><td><input type='text' id ='line1_2' name='line1_2' size='5' value ='4.0-10.0' readonly></td></tr>";


   echo "<tr><td width ='25%'>Lymph%</td>";
    echo "</td><td><input type='text' name='line5' size='5' value ='$v13'></td><td><input type='text' name='line5_1' size='5' value ='20.0-40.0' readonly></td><td><input type='text' name='line5_2' size='5' value ='20.0-40.0' readonly></td></tr>";

    echo "<tr><td width ='25%'>Mid%</td>";
    echo "</td><td><input type='text' name='line6' size='5' value ='$v16'></td><td><input type='text' name='line6_1' size='5' value ='1.0-15.0' readonly></td><td><input type='text' name='line6_2' size='5' value ='1.0-15.0' readonly></td></tr>";

    echo "<tr><td width ='25%'>Neut%</td>";
    echo "</td><td><input type='text' name='line7' size='5' value ='$v19'></td><td><input type='text' name='line7_1' size='5' value ='50.0-70.0' readonly></td><td><input type='text' name='line7_2' size='5' value ='50.0-70.0' readonly></td></tr>";

echo "<tr><td width ='25%'>Lymph#</td>";
    echo "</td><td><input type='text' name='line2' size='5' value ='$v4'></td><td><input type='text' id ='line2_1' name='line2_1' size='5' value ='0.6-4.1' readonly></td><td><input type='text' id ='line2_2' name='line2_2' size='5' value ='0.6-4.1' readonly></td></tr>";

    echo "<tr><td width ='25%'>Mid#</td>";
    echo "</td><td><input type='text' name='line3' size='5' value ='$v7'></td><td><input type='text' name='line3_1' size='5' value ='0.1-1.8' readonly></td><td><input type='text' id ='line3_2' name='line3_2' size='5' value ='0.1-1.8' readonly></td></tr>";

echo "<tr><td width ='25%'>Neut#</td>";
    echo "</td><td><input type='text' name='line4' size='5' value ='$v10'></td><td><input type='text' id ='line4_1' name='line4_1' size='5' value ='2.0-7.8' readonly></td><td><input type='text' id ='line4_2' name='line4_2' size='5' value ='2.0-7.8' readonly></td></tr>";
    
 

//----------same down
  echo "<tr><td width ='25%' >RBC</td>";
   echo "</td><td><input type='text' name='line9' size='5' value ='$v25'></td><td><input type='text' name='line9_1' size='5' value ='4.00-5.50' readonly></td><td><input type='text' name='line9_2' size='5' value ='3.50-5.50' readonly></td></tr>";
   
echo "<tr><td width ='50%'>Hbg gm/dl</td>";
echo "</td><td><input type='text' name='line8' size='5' value ='$v22'></td><td><input type='text' name='line8_1' size='5' value ='12.0-16.0' readonly></td><td><input type='text' name='line8_2' size='5' value ='11.0-15.0' readonly></td></tr>";


  
   echo "<tr><td width ='25%'>HCT</td>";
   echo "</td><td><input type='text' name='line10' size='5' value ='$v28'></td><td><input type='text' name='line10_1' size='5' value ='40.0-48.0%' readonly></td><td><input type='text' name='line10_2' size='5' value ='36.0-48.0%' readonly></td></tr>";
//----------same up   

echo "<tr><td width ='25%'>MCV</td>";
echo "</td><td><input type='text' name='line11' size='5' value ='$v31'></td><td><input type='text' name='line11_1' size='5' value ='80.0-99.0' readonly></td><td><input type='text' name='line11_2' size='5' value ='80.0-99.0' readonly></td></tr>";


echo "<tr><td width ='25%'>M.C.H</td>";
echo "</td><td><input type='text' name='line12' size='5' value ='$v34'></td><td><input type='text' name='line12_1' size='5' value ='26-32' readonly></td><td><input type='text' name='line12_2' size='5' value ='26-32' readonly></td></tr>";

echo "<tr><td width ='25%'>M.C.H.C</td>";
echo "</td><td><input type='text' name='line13' size='5' value ='$v37'></td><td><input type='text' name='line13_1' size='5' value ='32.0-36.0' readonly></td><td><input type='text' name='line13_2' size='5' value ='32.0-36.0' readonly></td></tr>";



echo "<tr><td width ='25%'>RDW-SD</td>";
    echo "</td><td><input type='text' name='line15' size='5' value ='$v43'></td><td><input type='text' name='line15_1' size='5' value ='37.0-54.0' readonly></td><td><input type='text' name='line15_2' size='5' value ='37.0-54.0' readonly></td></tr>";

echo "<tr><td width ='25%'>RDW-CV</td>";
    echo "</td><td><input type='text' name='line14' size='5' value ='$v40'></td><td><input type='text' name='line14_1' size='5' value ='11.5-14.5' readonly></td><td><input type='text' name='line14_2' size='5' value ='11.5-14.5' readonly></td></tr>";

echo "<tr><td width ='25%' >PLT</td>";
echo "</td><td><input type='text' name='line16' size='5' value ='$v46'></td><td><input type='text' name='line16_1' size='5' value ='100-300 x10*9/L' readonly></td><td><input type='text' name='line16_2' size='5' value ='100-300 x10*9/L' readonly></td></tr>";

echo "<tr><td width ='25%'>MPV</td>";
echo "</td><td><input type='text' name='line17' size='5' value ='$v49'></td><td><input type='text' name='line17_1' size='5' value ='7.4-10.4fL' readonly></td><td><input type='text' name='line17_2' size='5' value ='7.4-10.4fL' readonly></td></tr>";

echo "<tr><td width ='25%' >PDW</td>";
echo "</td><td><input type='text' name='line18' size='5' value ='$v52'></td><td><input type='text' name='line18_1' size='5' value ='10.0-17.0' readonly></td><td><input type='text' name='line18_2' size='5' value ='10.0-17.0' readonly></td></tr>";

echo "<tr><td width ='25%'>P.C.T</td>";
 echo "</td><td><input type='text' name='line19' size='5' value ='$v55'></td><td><input type='text' name='line19_1' size='5' value ='0.10-0.28' readonly></td><td><input type='text' name='line19_2' size='5' value ='0.10-0.28' readonly></td></tr>";

echo "<tr><td width ='25%'>P-LCR</td>";
 echo "</td><td><input type='text' name='line19x' size='5' value ='$flagx'></td><td><input type='text' name='line19_1' size='5' value ='13.0-43.0' readonly></td><td><input type='text' name='line19_2' size='5' value ='13.0-43.0' readonly></td></tr>";
            
 echo "</table>";

//        require('report_full_haemogram.php');
     } 

     $mm = substr($test,0,13);

     if ($mm=='Stool For OVA' or $test=='stool analysis'){
        $grouped ='Yes';
        require('report_stool_analysis.php');
     }
 
if ($test=='INR test' or $test=='PT/INR'){
       $grouped ='Yes';
        require('report_pt.php');
}

if ($test=='UECS' or $test=='Lab UECS' or $test =='RENAL FUNCTION TEST'){
       $grouped ='Yes';
        require('report_uecs.php');
}

if ($test=='LIPID PROFILE' or $test=='Fasting Lipid Profile'){
       $grouped ='Yes';
        require('report_lp.php');
}


if ($test=='LFTS' || $test=='LIVER FUNCTION TEST'){
      $grouped ='Yes';
        require('report_lfts.php');
}


   
    if ($test=='ANC Profile'){
        $grouped ='Yes';
        require('report_ancprofile.php');
     }
     
   if ($grouped=='No'){
     $grouped ='No';
  
       echo "<table width ='100%'><tr>
<th width ='30%' bgcolor ='black'><font color ='white'>Test Description</th>
<th width ='10%' bgcolor ='black'><font color ='white'>Ranges</th>
<th width ='5%' bgcolor ='black'><font color ='white'>Value</th>
<th width ='5%' bgcolor ='black'><font color ='white'>Flag</th>
<th width ='15%' bgcolor ='black'><font color ='white'>Time</th>
<th width ='35%' bgcolor ='black'><font color ='white'>Comment</th>
</tr>";
    
    echo "<tr>";
    echo "<td width ='30%'>" . $test . "</td>";
    
    echo "<td width ='10%'>" . $line1 ."-".$line2 . "</td>";
    echo "<td align ='right' width ='5%'>".  $value. "</td>";
    echo "<td align ='right' width ='5%'>".  $flag. "</td>";
    $time1 =$time_a;
    $time1 = substr($time1,0,8);
    $time2 =$time_b;
    $time2 = substr($time2,0,8);
    
    echo "<td width ='15%'>" . $time1."-".$time2. "</td>";
    echo "<td width ='35%'>".  $test1_result. "</td>";
    echo "</tr></table>";
     
     }

   $grouped ='No';
       $i++;
   }


























echo"<hr><br><br>";
}
echo"Prepare by:_______________________________________________ Date:.$xckk.<br>";
echo"Doctor:___________________________________________________<br><br><br>";

?>