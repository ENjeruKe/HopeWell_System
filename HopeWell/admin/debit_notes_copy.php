<?php
require('open_database.php');
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    
<meta charset="utf-8">
    
<title>Medi+ V10 (HMIS Global)| www.hmisglobal.com</title>
    
<div class="navbar navbar-inverse navbar-fixed-top">
      
<div class="navbar-inner">                  
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a>
<a class="brand" href="#">Medi+ V10 (HMIS Global)</a><div class="nav-collapse collapse"><p class="navbar-text pull-right"><a target="_blank" href="http://www.hmisglobal.com" class="navbar-link">www.hmisglobal.com</a></p>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>







<!-- Le styles -->
    
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
<style type="text/css">
	body {
		padding-top: 0px;
		padding-bottom: 40px;
                background-image:url('images/background.jpg');
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





<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php



if (isset($_GET['billing']))
   {
      $mamount1 = 0;
      $mamount2 = 0;
      $mamount3 = 0;
      $mamount4 = 0;
      $mamount5 = 0;
      $account =' ';
      $doc_account =$_GET['account'];
      $total = 0;
      //Get the invoice No.
      //here
      $query3 = "select * FROM companyfile" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      while ($i3 < $num3)
        {
        $ref_no   = mysql_result($result3,$i3,"next_sup_inv"); 
        $debt_control     = mysql_result($result3,$i3,"PAT_CONTROL"); 
        $doctors_control  = mysql_result($result3,$i3,"CRED_CONTROL"); 
        $i3++;
        }
        $ref_no2 = $ref_no +1;
        $query3  = "UPDATE companyfile SET next_sup_inv ='$ref_no2'";
        $result3 = mysql_query($query3);

        //Get data from temp file and save
        $supplier         =$_GET['supplier'];
        $amount           =$_GET['amount'];
        $desc             =$_GET['supplier'];
        $ref_no           =$_GET['ref_no'];
        $date             =$_GET['date'];

        if (isset($_GET['account'])){
           $account        =$_GET['account'];
           $desc           =$_GET['account'];
        }else{
           $account        =' ';
           $desc           =$_GET['supplier'];
        }
        $patient        =$_GET['patient'];
        if (isset($_GET['account1'])){
           $anaesthetist =$_GET['account1'];
        }
        $mydate = date('y-m-d');

   //Now go and get name and file from the clients file
   $query3 = "select * FROM appointmentf" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {
     $idno     = mysql_result($result3,$i3,"adm_no");  
     $pat_name   = mysql_result($result3,$i3,"name");   
     $pay_company= mysql_result($result3,$i3,"payer");   
     $ward_bed = $pat_name.'-'.$idno;
     if ($ward_bed==$patient){
        $patient  = $pat_name;
        $idno    = $idno;
        $adm_no    = $idno;      
     }
     $i3++;    
   }
   //$query  = "UPDATE appointmentf SET pay_account ='$account',adm_date ='$date',disch_date =' ',bed_no ='$bed' WHERE patients_name ='$update_bed' AND client_id ='$update_ward'";
   //$result = mysql_query($query);

    $chargable ='No';
   //Now go and Check Bed Charge in Revenue file
   $query3 = "select * FROM revenuef WHERE name ='$supplier'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $gledger ='Bed Income';
   $i3=0;
   while ($i3 < $num3)
     {
     $gledger     = mysql_result($result3,$i3,"gl_account");  
     $g_id        = mysql_result($result3,$i3,"client_id");  
     //$chargable   = mysql_result($result3,$i3,"chargable");  
     $i3++;
   }

  //Asign ECT value if selected
   //---------------------------
   $mstep1 = "Yes";
   if ($supplier == "E.C.T"){
      $mstep1 = "No";
      $mamount1 = 1000;
      $mrev1    = "ECT-STAFF A/C";         
      $mamount2 = 6000;
      $mrev2    = "ECT-INCOME";                  
      $mamount3 = 3000;
      $mrev3    = "ECT-ANAESTHETIST";         
      $mamount4 =  500;
      $mrev4    = "ECT-DRUGS";
      $mrev5    = "ECT-DOCTORS FEE";
      $mamount5 = $amount-10500;
      //$mamount1-$mamount2-$mamount3-$mamount4;
   }
     
   if ($supplier == "E.C.T 2"){
      $mstep1 = "No";
      $mamount1 = 1000;
      $mrev1    = "ECT-STAFF A/C";         
      $mamount2 = 8000;
      $mrev2    = "ECT-INCOME";                  
      $mamount3 = 3000;
      $mrev3    = "ECT-ANAESTHETIST";         
      $mamount4 =  500;
      $mrev4    = "ECT-DRUGS";
      $mrev5    = "ECT-DOCTORS FEE";
      $mamount5 = $amount-12500;
      //$mamount1-$mamount2-$mamount3-$mamount4;
   }
   //End of ECT Values
   

   //Check if it is doctors fee and update the doctors invoice
   //---------------------------------------------------------
   $patient_ref =$adm_no.'-'.$patient;
   if ($gledger==$doctors_control){
      //if ($mamount5 == 0){
         $query5= "INSERT INTO doctorstrfile VALUES('$codes','$doc_account','$date','$ref_no','$patient_ref','INV',
         '$amount','DOC','$ref_no','admin',' ','$date','$amount','$desc','$amount')";
         $result5 =mysql_query($query5);

         //Now go check balances in master file
         //------------------------------------
         $query3 = "select * FROM doctorsfile WHERE account_name ='$doc_account'" ;
         $result3 =mysql_query($query3) or die(mysql_error());
         $num3 =mysql_numrows($result3) or die(mysql_error());
         $i3=0;
         $sup_balance = 0;
         while ($i3 < $num3)
           {
           $sup_balance   = mysql_result($result3,$i3,"os_balance");
           $i3++;
           }
         $sup_balance = $sup_balance +$amount;
         $query2= "UPDATE doctorsfile SET os_balance ='$sup_balance' WHERE account_name ='$doc_account'";
         $result2 =mysql_query($query2);
      //}
   }

   //if ($supplier == "E.C.T 2"){
   //   $mamount5 = $amount-12500;
   //}
   //if ($supplier == "E.C.T"){
   //   $mamount5 = $amount-10500;
   //}

   //Anaesthetist fee
   if ($gledger=='ECT-INCOME'){
      $descs ='E.C.T - '.$patient_ref;
      //$query5= "INSERT INTO doctorstrfile VALUES('$codes','$doc_account','$date','$ref_no','$patient_ref','INV',
      //'$mamount5','DOC','$ref_no','admin',' ','$date','$mamount5','$desc','$mamount5')";
      //$result5 =mysql_query($query5);

      //Doctors fee with ECT
      //--------------------
      if ($mamount5 > 0){
         $query5= "INSERT INTO doctorstrfile VALUES('$codes','$doc_account','$date','$ref_no','$patient_ref','INV',
         '$mamount5','DOC','$ref_no','admin',' ','$date','$mamount5','$descs','$mamount5')";
         $result5 =mysql_query($query5);
      }

      //Now go check balances in master file
      //------------------------------------
      $query3 = "select * FROM doctorsfile WHERE account_name ='$doc_account'" ;
      $result3 =mysql_query($query3) or die(mysql_error());
      $num3 =mysql_numrows($result3) or die(mysql_error());
      $i3=0;
      $sup_balance = 0;
      while ($i3 < $num3)
        {
        $sup_balance   = mysql_result($result3,$i3,"os_balance");
        $i3++;
        }

      $sup_balance = $sup_balance +$amount;
      $query2= "UPDATE doctorsfile SET os_balance ='$sup_balance' WHERE account_name ='$doc_account'";
      $result2 =mysql_query($query2);
      //Anaesthetist fee
      if ($mamount3 > 0){
         $query5= "INSERT INTO doctorstrfile VALUES('$codes','$anaesthetist','$date','$ref_no','$patient_ref','INV',
         '$mamount3','DOC','$ref_no','admin',' ','$date','$mamount3','$descs','$mamount3')";
         $result5 =mysql_query($query5);
      }
      //Staff fee
      if ($mamount1 > 0){
         $query5= "INSERT INTO doctorstrfile VALUES('$codes','ECT STAFF A/C','$date','$ref_no','$patient_ref','INV',
         '$mamount1','DOC','$ref_no','admin',' ','$date','$mamount1','$descs','$mamount1')";
         $result5 =mysql_query($query5);
      }

   }
   //Now go and post Bed Charge at the beds rate
   if ($gledger=='ECT-INCOME'){
      $query= "INSERT INTO htransf 
      VALUES('$adm_no','$patient','$date','$ref_no','E.C.T','DB','$amount','$chargable','$gledger','DB',' ','ADMIN','    
      ','$mydate','1','$pay_company')";
   }else{
      $query= "INSERT INTO htransf 
      VALUES('$adm_no','$patient','$date','$ref_no','$desc','DB','$amount','$chargable','$gledger','DB',' ','ADMIN','    
      ','$mydate','1','$pay_company')";
   }
   $result =mysql_query($query);


   //Now go and pass a Debit entry in G/Ledger if NOT ECT
   //----------------------------------------------------
   if ($gledger <>'ECT-INCOME'){
      $desc ='E.C.T - '.$patient_ref;
      $query= "INSERT INTO gltransf VALUES(' 
      ','$date','$debt_control','$ref_no','DB','$desc','$amount','ADMIN','$company')";
      $result =mysql_query($query);
      $query = "select * FROM glaccountsf WHERE account_name='$debt_control'" ;
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $i=0;
      while ($i < $num)
        {
        $balances = mysql_result($result,$i,"balance"); 
        $i++;
        }
        $balance = $balances + $amount;
        $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='$debt_control'";
        $result3 = mysql_query($query3);


      //Now go and pass a Credit entry in G/Ledger
      $query= "INSERT INTO gltransf VALUES(' ','$date','$gledger','$ref_no','CR','$desc',
     '-$amount','ADMIN','CHIROMO')";
      $result =mysql_query($query);

      $query = "select * FROM glaccountsf WHERE account_name='$gledger'" ;
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $i=0;
      while ($i < $num)
           {
           $balances = mysql_result($result,$i,"balance"); 
           $i++;
           }
           $balance = $balances - $amount;
           $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='$gledger'";
           $result3 = mysql_query($query3);
   }

   ///- Not checked yet
   //-------------------
   //Now go and pass a Debit entry in G/Ledger if ECT
   //------------------------------------------------
   if ($gledger =='ECT-INCOME'){
      $desc ='E.C.T - '.$patient_ref;
      $query= "INSERT INTO gltransf VALUES(' 
      ','$date','$debt_control','$ref_no','DB','$desc','$amount','ADMIN','$company')";
      $result =mysql_query($query);
      $query = "select * FROM glaccountsf WHERE account_name='$debt_control'" ;
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $i=0;
      while ($i < $num)
        {
        $balances = mysql_result($result,$i,"balance"); 
        $i++;
        }
        $balance = $balances + $amount;
        $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='$debt_control'";
        $result3 = mysql_query($query3);


      //Now go and pass a Credit entry in G/Ledger
      //1. ECT Income 
      //-------------
      $gledger = "ECT-INCOME";
      $query= "INSERT INTO gltransf VALUES(' ','$date','ECT-INCOME','$ref_no','CR','$desc',
     '-$mamount2','ADMIN','CHIROMO')";
      $result =mysql_query($query);

      $query = "select * FROM glaccountsf WHERE account_name='ECT-INCOME'" ;
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $i=0;
      while ($i < $num)
           {
           $balances = mysql_result($result,$i,"balance"); 
           $i++;
           }
           $balance = $balances - $amount;
           $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='ECT-INCOME'";
           $result3 = mysql_query($query3);

      //2. ECT Staff A/c 
      //----------------
      $gledger = "ECT-STAFF A/C";
      $query= "INSERT INTO gltransf VALUES(' ','$date','ECT-STAFF A/C','$ref_no','CR','$desc',
     '-$mamount1','ADMIN','CHIROMO')";
      $result =mysql_query($query);

      $query = "select * FROM glaccountsf WHERE account_name='ECT-STAFF A/C'" ;
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $i=0;
      while ($i < $num)
           {
           $balances = mysql_result($result,$i,"balance"); 
           $i++;
           }
           $balance = $balances - $mamount1;
           $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='ECT-STAFF A/C'";
           $result3 = mysql_query($query3);


      //3. ECT Anaesthetist 
      //-------------------
      $gledger = "ECT-ANAESTHETIST";
      $query= "INSERT INTO gltransf VALUES(' ','$date','ECT-ANAESTHETIST','$ref_no','CR','$desc',
     '-$mamount3','ADMIN','CHIROMO')";
      $result =mysql_query($query);

      $query = "select * FROM glaccountsf WHERE account_name='ECT-ANAESTHETIST'" ;
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $i=0;
      while ($i < $num)
           {
           $balances = mysql_result($result,$i,"balance"); 
           $i++;
           }
           $balance = $balances - $mamount3;
           $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='ECT-ANAESTHETIST'";
           $result3 = mysql_query($query3);

      //4. ECT Drugs 
      //------------
      $gledger = "ECT-DRUGS";
      $query= "INSERT INTO gltransf VALUES(' ','$date','ECT-DRUGS','$ref_no','CR','$desc',
     '-$mamount4','ADMIN','CHIROMO')";
      $result =mysql_query($query);

      $query = "select * FROM glaccountsf WHERE account_name='ECT-DRUGS'" ;
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $i=0;
      while ($i < $num)
           {
           $balances = mysql_result($result,$i,"balance"); 
           $i++;
           }
           $balance = $balances - $mamount4;
           $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='ECT-DRUGS'";
           $result3 = mysql_query($query3);

      //Doctors Control Account - Doctors $ Anaesthetist
      //------------------------------------------------
      //5. ECT Doctors and Anaesthetist
      //-------------------------------      
      $gledger = "Doctors Control Account";
      //$mamount5 = $mamount5+$mamount3;
      $query= "INSERT INTO gltransf VALUES(' ','$date','Doctors Control Account','$ref_no','CR','$desc',
     '-$mamount5','ADMIN','CHIROMO')";
      $result =mysql_query($query);

      $query = "select * FROM glaccountsf WHERE account_name='Doctors Control Account'" ;
      $result =mysql_query($query) or die(mysql_error());
      $num =mysql_numrows($result) or die(mysql_error());
      $i=0;
      while ($i < $num)
           {
           $balances = mysql_result($result,$i,"balance"); 
           $i++;
           }
           $balance = $balances - $mamount5;
           $query3  = "UPDATE glaccountsf SET balance ='$balance' WHERE account_name ='Doctors Control Account'";
           $result3 = mysql_query($query3);

}
//--













   }




?>








<body>
<form action ="" method ="GET">
<?php

 
 //Get the receipt No.


$code2 =' ';
$sql="SELECT * FROM revenuef WHERE name <>'$code2'";
$result=mysql_query($sql);	 
$rows=mysql_fetch_array($result);

if (isset($_GET['revenue_search'])){
   $code2=$_GET['supplier'];
   $sql="SELECT * FROM revenuef WHERE name ='$code2'";
   $result=mysql_query($sql);	 
   $rows=mysql_fetch_array($result);
   }







   
 $query3 = "select * FROM companyfile" ;
 $result3 = mysql_query($query3) or die(mysql_error());
 $num3 = mysql_numrows($result3) or die(mysql_error());
 $i3=0;
 while ($i3 < $num3)
  {
  $ref_no   = mysql_result($result3,$i3,"next_sup_inv");
  $i3++;
  }
  $ref_no = $ref_no;

$date = date('y-m-d');


echo"<table width ='400' border='0' border color ='black'><tr><td width='50' align='right'><b>Ref No.: </b></td><td><input type='text' name='ref_no' size='20' value ='$ref_no'></td></tr><tr><td width ='50' align ='right'><b>Date: </b></td><td><input type='text' name='date' size='20' value='$date'></td></tr><tr><td width='100' align='right'><b>Service Off.: </b></td><td>";
 if (!isset($_GET['revenue_search'])){
    echo"<select id='supplier' name='supplier'>";        
 }

            
 $cdquery="SELECT name FROM revenuef";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());

 if (isset($_GET['revenue_search'])){
     echo"<input type='text' name='supplier' size='20' value ='$code2'>";
   }else{            
   while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["name"];
   echo "<option>$cdTitle</option>";            
   }
}
 if (!isset($_GET['revenue_search'])){
  echo"</select>";
}
echo"</td><td><input type='submit' name='revenue_search'  class='button' value='Search'></td></tr>";
echo"<tr><td width='100' align='right'><b>Rate: </b></td><td>";
$mm = $rows['gl_account'];
?>
<input type='text' name='amount' size='20' value ="<?php echo $rows['credit_rate'];?>">

<?php
echo"</td></tr>";

if (isset($_GET['revenue_search']) AND ($mm=='Doctors Control Account' OR $mm=='ECT-INCOME')) {
   echo"<tr><td width='100' align='right'><b>Doctors A/c </b></td><td>";
   echo"<select id='account' name='account'>";        
   $cdquery="SELECT account_name FROM doctorsfile";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
    while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];
      echo "<option>$cdTitle</option>";            
      }
     echo"</select>";
   echo"</td></tr>";
} 


if (isset($_GET['revenue_search']) AND $mm=='ECT-INCOME') {
   echo"<tr><td width='100' align='right'><b>Anaesthetist A/c </b></td><td>";
   echo"<select id='account1' name='account1'>";        
   $cdquery="SELECT account_name FROM doctorsfile";
   $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
    while ($cdrow=mysql_fetch_array($cdresult)) {
      $cdTitle=$cdrow["account_name"];
      echo "<option>$cdTitle</option>";            
      }
     echo"</select>";
   echo"</td></tr>";
} 


echo"<tr><td width='100' align='right'><b>Select Patient: </b></td><td>";
echo"<select id='patient' name='patient'>";        
$cdquery="SELECT name,adm_no FROM appointmentf where bed_no <> '' ORDER BY name ";
$cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
while ($cdrow=mysql_fetch_array($cdresult)) {
  $cdTitle=$cdrow["name"].'-'.$cdrow["adm_no"];
  echo "<option>$cdTitle</option>";            
  }
 echo"</select>";
echo"</td></tr>";

echo"</table>";

?>
<br>
<table width ='400' border='0' border color ='black'><td align ='center'><input type='submit' name='billing'  class='button' value='Save '></td></table>
</FORM>

<!--table width ='400'><td align ='center'><img src='images/healthcare.png' alt='statement' height='100' width='130'></td-->
</table>




</body>
</html>




