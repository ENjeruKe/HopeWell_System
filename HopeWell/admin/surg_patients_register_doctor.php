<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
$today = $_SESSION['sys_date'];
$username = $_SESSION['username'];
?>



<?php
if (isset($_GET['save_cancel'])){  
   //Go and save first
   //-----------------

   $adm_no=$_GET['id'];
   $date=$_GET['date'];
   $doctor = $_GET['doc_account'];
   $customer =$_GET['customer'];
   $status =$_GET['status'];
   $height =$_GET['height'];
   $weight =$_GET['weight'];
   $temp =$_GET['temp'];
   $b_p =$_GET['b_p'];
   $today = $_SESSION['sys_date'];
   $sex =$_GET['sex'];
   $age =$_GET['age'];
   $sign1 =$_GET['symptom1'];
   $sign2 =$_GET['symptom2'];
   $sign3 =$_GET['symptom3'];
   $sign4 =$_GET['symptom4'];
   $sign5 =$_GET['symptom5'];

   //$diag1 =$_GET['diag1'];
   //$diag2 =$_GET['diag2'];
   //$diag3 =$_GET['diag3'];

   $test1 =$_GET['test1'];
   $test1_qty =1;
   $test2 =$_GET['test2'];
   $test2_qty =1;
   $test3 =$_GET['test3'];
   $test3_qty =1;
   $test4 =$_GET['test4'];
   $test4_qty =1;
   $test5 =$_GET['test5'];
   $test5_qty =1;
   $textarea =$_GET['textarea'];
   $med1     =$_GET['drugs1'];
   $med1_qty =$_GET['drug1_qty'];
   $med1_dx  =$_GET['drug1_dx'];
   $med1_dx2 =$_GET['drug1_dx2'];
   $med1_qtys=$_GET['drug1_qty'];



   $payer    =$_GET['payer'];
   $ref_nos  =$_GET['ref_no'];

   $med2     =$_GET['drugs2'];
   $med2_qty =$_GET['drug2_qty'];
   $med2_dx  =$_GET['drug2_dx'];
   $med2_dx2 =$_GET['drug2_dx2'];
   $med2_qtys=$_GET['drug2_qty'];

   $med3     =$_GET['drugs3'];
   $med3_qty =$_GET['drug3_qty'];
   $med3_dx  =$_GET['drug3_dx'];
   $med3_dx2 =$_GET['drug3_dx2'];
   $med3_qtys=$_GET['drug3_qty'];

   $med4     =$_GET['drugs4'];
   $med4_qty =$_GET['drug4_qty'];
   $med4_dx  =$_GET['drug4_dx'];
   $med4_dx2 =$_GET['drug4_dx2'];
   $med4_qtys=$_GET['drug4_qty'];

   $med5     =$_GET['drugs5'];
   $med5_qty =$_GET['drug5_qty'];
   $med5_dx  =$_GET['drug5_dx'];
   $med5_dx2 =$_GET['drug5_dx2'];
   $med5_qtys=$_GET['drug5_qty'];

   $med6     =$_GET['drugs6'];
   $med6_qty =$_GET['drug6_qty'];
   $med6_dx  =$_GET['drug6_dx'];
   $med6_dx2 =$_GET['drug6_dx2'];
   $med6_qtys=$_GET['drug6_qty'];

   $med7     =$_GET['drugs7'];
   $med7_qty =$_GET['drug7_qty'];
   $med7_dx  =$_GET['drug7_dx'];
   $med7_dx2 =$_GET['drug7_dx2'];
   $med7_qtys=$_GET['drug7_qty'];


//$time = date('y-m-d h:i:s a', time());
 $time = date("Y-m-d H:i:s");

 //---------------------------------------
 $query5= "INSERT INTO logfile VALUES('$time','$customer','$username','Doctor')";
 $result5 =mysql_query($query5);

   //Now go and get prices and tabulate cost
   //---------------------------------------
   //Add Qty in file
   $query2 = "select * FROM stockfile" ;
   $result2 =mysql_query($query2) or die(mysql_error());
   $id = 0;
   $nRecord = 1;
   $No = $nRecord;
   $num2 =mysql_numrows($result2) or die(mysql_error());
   $i2 =0;
   $drug_total = 0;
   $med1_cost=0;
   $med2_cost=0;
   $med3_cost=0;
   $med4_cost=0;
   $med5_cost=0;
   $med6_cost=0;
   $med7_cost=0;
   $price8=0;
   $price9=0;
   $price10=0;

   while ($i2 < $num2)
      {                  
         $price   = mysql_result($result2,$i2,"sell_price");
         $item    = mysql_result($result2,$i2,"description");
         if ($med1 <>' ' AND $item==$med1){
            $med1_qtys = $med1_qty*$med1_dx*$med1_dx2;
            $price1   = mysql_result($result2,$i2,"sell_price");
            $med1_cost = $price1*$med1_qtys;
            $drug_total = $drug_total +$med1_cost;

         }

         if ($med2 <>' ' AND $item==$med2){
            $med2_qtys = $med2_qty*$med2_dx*$med2_dx2;
            $price2   = mysql_result($result2,$i2,"sell_price");
            $med2_cost = $price2*$med2_qtys;
            $drug_total = $drug_total +$med2_cost;
         }

         if ($med3 <>' ' AND $item==$med3){
            $med3_qtys = $med3_qty*$med3_dx*$med3_dx2;
            $price3   = mysql_result($result2,$i2,"sell_price");
            $med3_cost = $price3*$med3_qtys;
            $drug_total = $drug_total +$med3_cost;

         }

         if ($med4 <>' ' AND $item==$med4){
            $med4_qtys = $med4_qty*$med4_dx*$med4_dx2;
            $price4   = mysql_result($result2,$i2,"sell_price");
            $med4_cost = $price4*$med4_qtys;
            $drug_total = $drug_total +$med4_cost;
         }
         if ($med5 <>' ' AND $item==$med5){
            $med5_qtys = $med5_qty*$med5_dx*$med5_dx2;
            $price5   = mysql_result($result2,$i2,"sell_price");
            $med5_cost = $price5*$med5_qtys;
            $drug_total = $drug_total +$med5_cost;
         }

         if ($med6 <>' ' AND $item==$med6){
            $med6_qtys = $med6_qty*$med6_dx*$med6_dx2;
            $price6   = mysql_result($result2,$i2,"sell_price");
            $med6_cost = $price6*$med6_qtys;
            $drug_total = $drug_total +$med6_cost;
         }
         if ($med7 <>' ' AND $item==$med7){
            $med7_qtys = $med7_qty*$med7_dx*$med7_dx2;
            $price7   = mysql_result($result2,$i2,"sell_price");
            $med7_cost = $price7*$med7_qtys;
            $drug_total = $drug_total +$med7_cost;
         }
         $i2++;

    }
    $location ='DRUGS';
    if ($payer==''){
       //Save in cash file if Cash sale only
       //-----------------------------------
      if ($med7_cost >0 and med7 <>' '){
            $query7= "INSERT INTO auto_transact VALUES('','$location','$med7','$price7','$med7_qtys','$med7_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);
         }
         if ($med6_cost >0 and med6 <>' '){
            $query7= "INSERT INTO auto_transact VALUES('','$location','$med6','$price6','$med6_qtys','$med6_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);
         }
         if ($med5_cost >0 and med5 <>' '){
            $query7= "INSERT INTO auto_transact VALUES('','$location','$med5','$price5','$med5_qtys','$med5_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);
         }
         if ($med4_cost >0 and med4 <>' '){
            $query7= "INSERT INTO auto_transact VALUES('','$location','$med4','$price4','$med4_qtys','$med4_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);
         }
         if ($med3_cost >0 and med3 <>' '){
            $query7= "INSERT INTO auto_transact VALUES('','$location','$med3','$price3','$med3_qtys','$med3_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);
         }   
         if ($med2_cost >0 and med2<>' '){
            $query7= "INSERT INTO auto_transact VALUES('','$location','$med2','$price2','$med2_qtys','$med2_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);
         }
         if ($med1_cost >0 and med1<>' '){
            $query7= "INSERT INTO auto_transact VALUES('','$location','$med1','$price1','$med1_qtys','$med1_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);
         }
   //End of Cash sale
   //----------------

   }else{
      if ($med7_cost >0 and med7 <>' '){

            $query7= "INSERT INTO auto_transact_inv VALUES('','$location','$med7','$price7','$med7_qtys','$med7_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$med7','DB','$med7_cost','IP','DB','$username','$today','$med7_qtys','PHARMACY DRUGS')"; 
  $result9 =mysql_query($query9);
         }
         if ($med6_cost >0 and med6 <>' '){
            $query7= "INSERT INTO auto_transact_inv VALUES('','$location','$med6','$price6','$med6_qtys','$med6_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$med6','DB','$med6_cost','IP','DB','$username','$today','$med6_qtys','PHARMACY DRUGS')"; 
  $result9 =mysql_query($query9);
         }
         if ($med5_cost >0 and med5 <>' '){
            $query7= "INSERT INTO auto_transact_inv VALUES('','$location','$med5','$price5','$med5_qtys','$med5_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$med5','DB','$med5_cost','IP','DB','$username','$today','$med5_qtys','PHARMACY DRUGS')"; 
  $result9 =mysql_query($query9);
         }
         if ($med4_cost >0 and med4 <>' '){
            $query7= "INSERT INTO auto_transact_inv VALUES('','$location','$med4','$price4','$med4_qtys','$med4_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$med4','DB','$med4_cost','IP','DB','$username','$today','$med4_qtys','PHARMACY DRUGS')"; 
  $result9 =mysql_query($query9);
         }
         if ($med3_cost >0 and med3 <>' '){
            $query7= "INSERT INTO auto_transact_inv VALUES('','$location','$med3','$price3','$med3_qtys','$med3_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$med3','DB','$med3_cost','IP','DB','$username','$today','$med3_qtys','PHARMACY DRUGS')"; 
  $result9 =mysql_query($query9);
         }   
         if ($med2_cost >0 and med2<>' '){
            $query7= "INSERT INTO auto_transact_inv VALUES('','$location','$med2','$price2','$med2_qtys','$med2_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$med2','DB','$med2_cost','IP','DB','$username','$today','$med2_qtys','PHARMACY DRUGS')"; 
  $result9 =mysql_query($query9);
         }

         if ($med1_cost >0 and med1<>' '){
            $query7= "INSERT INTO auto_transact_inv VALUES('','$location','$med1','$price1','$med1_qtys','$med1_cost','$customer','$today','$adm_no','','$ref_nos','')";
            $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$med1','DB','$med1_cost','IP','DB','$username','$today','$med1_qtys','PHARMACY DRUGS')"; 
  $result9 =mysql_query($query9);
         }
   }

   
   //Go and get cost of tests
   //------------------------
   $price1=0;
   $price2=0;
   $price3=0;
   $price4=0;
   $price5=0;
   $price6=0;
   $price7=0;
   $price8=0;
   $price9=0;
   $price10=0;
   $query3 = "select * FROM revenuef" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {     
     $price   = mysql_result($result3,$i3,"cash_rate");
     $item    = mysql_result($result3,$i3,"name");
     if ($test1 <>' ' AND $item==$test1){
         $price1   = mysql_result($result3,$i3,"cash_rate");
         $rev1     = mysql_result($result3,$i3,"gl_account");
         $rev1     = substr($rev1,0,3);
         $test1_cost = $price1*$test1_qty;
         $test_total = $test_total +$test1_cost;
      }

     if ($test2 <>' ' AND $item==$test2){
         $price2   = mysql_result($result3,$i3,"cash_rate");
         $rev2     = mysql_result($result3,$i3,"gl_account");
         $rev2     = substr($rev2,0,3);
         $test2_cost = $price2*$test2_qty;
         $test_total = $test_total +$test2_cost;
      }

     if ($test3 <>' ' AND $item==$test3){
         $price3   = mysql_result($result3,$i3,"cash_rate");
         $rev3     = mysql_result($result3,$i3,"gl_account");
         $rev3     = substr($rev3,0,3);
         $test3_cost = $price3*$test3_qty;
         $test_total = $test_total +$test3_cost;
      }

     if ($test4 <>' ' AND $item==$test4){
         $price4   = mysql_result($result3,$i3,"cash_rate");
         $rev4     = mysql_result($result3,$i3,"gl_account");
         $rev4     = substr($rev4,0,3);
         $test4_cost = $price4*$test4_qty;
         $test_total = $test_total +$test4_cost;
      }

     if ($test5 <>' ' AND $item==$test5){
         $price5   = mysql_result($result3,$i3,"cash_rate");
         $rev5     = mysql_result($result3,$i3,"gl_account");
         $rev5     = substr($rev5,0,3);
         $test5_cost = $price5*$test5_qty;
         $test_total = $test_total +$test5_cost;
      }
 

     $i3++;
   }

   //Check test groups again
   //-----------------------
   if ($test1<>''){
   $query3 = "select * FROM revenuef where name ='$test1'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {     
         $rev1     = mysql_result($result3,$i3,"gl_account");
         $rev1     = substr($rev1,0,3);
     $i3++;
     }
   }

   if ($test5<>''){
   $query3 = "select * FROM revenuef where name ='$test5'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {     
         $rev5     = mysql_result($result3,$i3,"gl_account");
         $rev5     = substr($rev5,0,3);
     $i3++;
     }
   }

   if ($test2<>''){
   $query3 = "select * FROM revenuef where name ='$test2'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {     
         $rev2     = mysql_result($result3,$i3,"gl_account");
         $rev2     = substr($rev2,0,3);
     $i3++;
     }
   }

   if ($test3<>''){
   $query3 = "select * FROM revenuef where name ='$test3'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {     
         $rev3     = mysql_result($result3,$i3,"gl_account");
         $rev3     = substr($rev3,0,3);
     $i3++;
     }
   }

   if ($test4<>''){
   $query3 = "select * FROM revenuef where name ='$test4'" ;
   $result3 =mysql_query($query3) or die(mysql_error());
   $num3 =mysql_numrows($result3) or die(mysql_error());
   $i3=0;
   while ($i3 < $num3)
     {     
         $rev4     = mysql_result($result3,$i3,"gl_account");
         $rev4     = substr($rev4,0,3);
     $i3++;
     }
   }


 $location ='LABS';
 if ($payer==''){
     //Save in cash file if Cash sale only
     //-----------------------------------
     if ($test1<>''){
         $query7= "INSERT INTO auto_transact VALUES('','$rev1','$test1','$price1','$test1_qty','$test1_cost','$customer','$today','$adm_no','','$ref_nos','')";
         $result7 =mysql_query($query7);
      }
     if ($test5<>''){
         $query7= "INSERT INTO auto_transact VALUES('','$rev5','$test5','$price5','$test5_qty','$test5_cost','$customer','$today','$adm_no','','$ref_nos','')";
         $result7 =mysql_query($query7);
      }
      if ($test4<>''){
         $query7= "INSERT INTO auto_transact VALUES('','$rev4','$test4','$price4','$test4_qty','$test4_cost','$customer','$today','$adm_no','','$ref_nos','')";
         $result7 =mysql_query($query7);
      }
      if ($test3<>''){
         $query7= "INSERT INTO auto_transact VALUES('','$rev3','$test3','$price3','$test3_qty','$test3_cost','$customer','$today','$adm_no','','$ref_nos','')";
         $result7 =mysql_query($query7);
      }
      if ($test2<>''){
         $query7= "INSERT INTO auto_transact VALUES('','$rev2','$test2','$price2','$test2_qty','$test2_cost','$customer','$today','$adm_no','','$ref_nos','')";
         $result7 =mysql_query($query7);
      }

   //End of Cash sale
   //----------------
   }else{
     if ($test1<>''){
         $query7= "INSERT INTO auto_transact_inv VALUES('','$rev1','$test1','$price1','$test1_qty','$test1_cost','$customer','$today','$adm_no','','$ref_nos','')";
         $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$test1','DB','$test1_cost','IP','DB','$username','$today','1','$rev1')"; 
  $result9 =mysql_query($query9);
      }
     if ($test5<>''){
         $query7= "INSERT INTO auto_transact_inv VALUES('','$rev5','$test5','$price5','$test5_qty','$test5_cost','$customer','$today','$adm_no','','$ref_nos','')";
         $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$test5','DB','$test5_cost','IP','DB','$username','$today','1','$rev5')"; 
  $result9 =mysql_query($query9);
      }
      if ($test4<>''){
         $query7= "INSERT INTO auto_transact_inv VALUES('','$rev4','$test4','$price4','$test4_qty','$test4_cost','$customer','$today','$adm_no','','$ref_nos','')";
         $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$test4','DB','$test4_cost','IP','DB','$username','$today','1','$rev4')"; 
  $result9 =mysql_query($query9);
      }
      if ($test3<>''){
         $query7= "INSERT INTO auto_transact_inv VALUES('','$rev3','$test3','$price3','$test3_qty','$test3_cost','$customer','$today','$adm_no','','$ref_nos','')";
         $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$test3','DB','$test3_cost','IP','DB','$username','$today','1','$rev3')"; 
  $result9 =mysql_query($query9);
      }
      if ($test2<>''){
         $query7= "INSERT INTO auto_transact_inv VALUES('','$rev2','$test2','$price2','$test2_qty','$test2_cost','$customer','$today','$adm_no','','$ref_nos','')";
         $result7 =mysql_query($query7);

 $query9= "INSERT INTO htransf (adm_no,patients_name,date,doc_no,service,type,amount,trans_type,ledger,username,inputdate,qty,trans2) VALUES ('$adm_no','$customer','$today','$ref_nos','$test2','DB','$test2_cost','IP','DB','$username','$today','1','$rev2')"; 
  $result9 =mysql_query($query9);
      }
 //End of Invoice transactions
 //---------------------------
}


   $grand_total = $test_total+$drug_total;

//if ($grand_total > 0){   
   $query2= "UPDATE medicalfile SET location ='$location',doctor='$doctor',weight='$weight',temp='$temp',b_p='$b_p',height='$height',notes='$textarea' WHERE adm_no ='$adm_no' and date='$today'";
   $result2 =mysql_query($query2);
//}

if (isset($_GET['tests1'])){ 
   $test1 = $_GET['tests1'];
}
if (isset($_GET['tests2'])){ 
   $test2 = $_GET['tests2'];
}
if (isset($_GET['tests3'])){ 
   $test3 = $_GET['tests3'];
}
if (isset($_GET['tests4'])){ 
   $test4 = $_GET['tests4'];
}
if (isset($_GET['tests5'])){ 
   $test5 = $_GET['tests5'];
}

//if ($grand_total > 0){
//   $query3= "UPDATE medicalfile SET test1='$test1',test1
//_qty='$test1_qty',test2='$test2',test2_qty='$test2_qty' ,test3
//='$test3',test3_qty='$test3_qty',test4='$test4',test4
//_qty='$test4_qty',test5='$test5',test5_qty='$test5_qty' WHERE //ref_no = '$ref_nos'";
//   $result3 =mysql_query($query3);

//}adm_no ='$adm_no' and date='$today'


if (isset($_GET['drugz1'])){ 
   $med1 = $_GET['drugz1'];
}
if (isset($_GET['drugz2'])){ 
   $med2 = $_GET['drugz2'];
}
if (isset($_GET['drugz3'])){ 
   $med3 = $_GET['drugz3'];
}
if (isset($_GET['drugz4'])){ 
   $med4 = $_GET['drugz4'];
}
if (isset($_GET['drugz5'])){ 
   $med5 = $_GET['drugz5'];
}
if (isset($_GET['drugz6'])){ 
   $med6 = $_GET['drugz6'];
}
if (isset($_GET['drugz7'])){ 
   $med7 = $_GET['drugz7'];
}
//$status
//if ($grand_total > 0){
   $query4= "UPDATE medicalfile SET med1='$med1',med1_qty='$med1_qty',med1_dx='$med1_dx',med2='$med2',med2_qty='$med2_qty',med2_dx='$med2_dx',med3='$med3',med3_qty='$med3_qty',med3_dx='$med3_dx',med4='$med4',med4_qty='$med4_qty',med4_dx='$med4_dx',med5='$med5',med5_qty='$med5_qty',med5_dx='$med5_dx',med6='$med6',med6_qty='$med6_qty',med6_dx='$med6_dx',med7='$med7',med7_qty='$med7_qty',med7_dx='$med7_dx',med7_dx2='$med7_dx2',med6_dx2='$med6_dx2',med5_dx2='$med5_dx2',med4_dx2='$med4_dx2',med3_dx2='$med3_dx2',med2_dx2='$med2_dx2',med1_dx2='$med1_dx2' WHERE adm_no ='$adm_no' and date='$today'";
   $result4 =mysql_query($query4);
//}



if ($grand_total <= 0 and $status=='To cash office'){
//
}else{
   $query4= "UPDATE medicalfile SET status='$status' WHERE adm_no ='$adm_no' and date='$today'";
   $result4 =mysql_query($query4);
}

//Now go and update invoices file if credit sale
//----------------------------------------------
 if ($payer<>''){
   $query3 = "select * FROM hdnotef2 WHERE invoice_no ='$ref_nos'" ;
   $result3 = mysql_query($query3) or die(mysql_error());
   $num3    = mysql_numrows($result3) or die(mysql_error());
   $i=0;
   while ($i < $num3)
     {
      $amount      = mysql_result($result3,$i,"inv_amount");          
      $total       = mysql_result($result3,$i,"tot_amount");   
      $i++;
    }
    $amount2 = $amount+$grand_total;
    $total2  = $total+$grand_total;
    $query5= "UPDATE hdnotef2 SET (inv_amount ='$amount2',tot_amount='$total2' WHERE invoice_no ='$ref_nos')";
    $result5 =mysql_query($query5);
  }
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>HMIS | Doctors Page </title>
<head>

<script type="text/javascript">
function altRows(id){
	if(document.getElementsByTagName){  
		
		var table = document.getElementById(id);  
		var rows = table.getElementsByTagName("tr"); 
		 
		for(i = 0; i < rows.length; i++){          
			if(i % 2 == 0){
				rows[i].className = "evenrowcolor";
			}else{
				rows[i].className = "oddrowcolor";
			}      
		}
	}
}
window.onload=function(){
	altRows('alternatecolor');
}
</script>

<!-- CSS goes in the document HEAD or added to your external stylesheet -->
<style type="text/css">
table.altrowstable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #a9c6c9;
	border-collapse: collapse;
}
table.altrowstable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
table.altrowstable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #a9c6c9;
}
.oddrowcolor{
	background-color:#d4e3e5;
}
.evenrowcolor{
	background-color:#c3dde0;
}
</style>



























<script language="javascript" type="text/javascript">
<!--
function popitup(url) {
	newwindow=window.open(url,'name','height=300,width=850');
	if (window.focus) {newwindow.focus()}
	return false;
}

// -->
</script>


</head>
<script language="JavaScript" src="popups/pop-up.js"></script>
<link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
</head>
<!--link rel=StyleSheet href="popups/pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="popups/debtors-pop-up.js"></script-->

	<meta charset="utf-8" />
	<title>Patient Register - Formoid contact form</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">















<body>
<table align ='right'><td align ='right'>
<form action ="wbc_patients_register_doctor.php" method ="GET">
<input type="submit" name="Submit"  class="button" value="Search Patient">
<?php
$mdate =date('y-m-d');
echo"<input type='text' name='search' size='50'>Search by:";
echo"<select name ='search_by'>";
//echo"<option value='Selection Option'>A Selection Option required</option>";
echo"<option value='Name'>Name</option>";
echo"<option value='Mobile'>Mobile</option>";
echo"<option value='Doctor'>Doctor</option></select>";
//echo"<input type='text' name='date' size='15' value ='$mdate'><br>";
?>
</FORM>
</td></table><br>
<?php

   


$mleast =123552620;
$mdate =date('y-m-d');

$mdate = $_SESSION['sys_date'];
//$mdate ='2016-04-27';
if (isset($_GET['search'])){
   $search = $_GET['search'];
   $search_by = $_GET['search_by'];
   if ($search_by =='Doctor'){
     $query = "select * FROM  medicalfile WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
     $SQL = "select * FROM  medicalfile WHERE doctor LIKE '%$search%' ORDER BY app_date desc" ;
   }
   if ($search_by =='Diagnosis'){
     $query = "select * FROM  medicalfile WHERE diag1,diag2,diag3 LIKE '%$search%' ORDER BY date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE diag1,diag2,diag3 LIKE '%$search%' ORDER BY date desc" ;
   }
   if ($search_by =='Name'){
     $query = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE name LIKE '%$search%' ORDER BY name,date desc" ;
   }
   if ($search_by =='Date'){
     $query = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
     $SQL   = "select * FROM  medicalfile WHERE date = '$search' ORDER BY name,date desc" ;
   }
 }else{
   $query= "SELECT * FROM medicalfile where status ='To Clinic' and date ='$mdate' and type='Outpatient'" or die(mysql_error());
   $SQL  = "SELECT * FROM medicalfile where status ='To Clinic' and date ='$mdate' and type='Outpatient'" or die(mysql_error());
}


$result =mysql_query($query) or die(mysql_error());
$num =mysql_numrows($result) or die(mysql_error());


$tot =0;

$i = 0;




                                                         
echo"<table width ='100%' class='altrowstable' id='alternatecolor' border ='1'>";
echo"<tr><th width ='10'>ID</th><th>Click to Edit Patient's Vitals.</th><th>Age</th><th>Sex</th><th>App.Date</th><th>Temp</th><th>Doctor</th><th>B.P</th></tr>";


$hasil=mysql_query($SQL, $connect);
$id = 0;
$nRecord = 1;
$No = $nRecord;
while ($row=mysql_fetch_array($hasil)) 
      {         
      $codes   = mysql_result($result,$i,"adm_no");  
      $desc    = mysql_result($result,$i,"name");   
      $rate    = mysql_result($result,$i,"sex");   
      $code   = mysql_result($result,$i,"payer");   
      $update = mysql_result($result,$i,"date");  
      $contact = mysql_result($result,$i,"weight");  
      $street  = mysql_result($result,$i,"temp");
      $age    = mysql_result($result,$i,"age");
      $time   = mysql_result($result,$i,"time");
      $doctor = mysql_result($result,$i,"b_p");
      $height = mysql_result($result,$i,"height");
      $ref_nos= mysql_result($result,$i,"ref_no");
      $att_doc = mysql_result($result,$i,"doctor");

      $codes2 = 0; 
      $update2 = $codes2; 
      $tot = $tot +$update2;
      $update2 = number_format($update2);

      echo"<tr bgcolor ='white'>";
      $bb =$row['adm_no'];        
      $aa =$row['id'];   
      $aa2 =$row['ref_no'];

      echo"<td width ='10' align ='left'><a href=javascript:popcontact2('patients_reg_info.php?accounts3=$bb&accounts=$aa&ref_no=$aa2')>$codes</a>";      
      echo"</td>";
      echo"<td width ='200' align ='left'><a href='wbc_patients_doctor_edit5.php?accounts3=$bb&accounts=$aa&ref_no=$aa2'>$desc<img src='ico/Profile.ico' alt='statement' height='12' width='12'></a>";
      echo"</td>";            
      echo"<td width ='30'>";      
      echo"$age";
      echo"</td>";      
      echo"<td width ='20'><a href=javascript:popcontact2('fix_errors.php?accounts=$aa')>$rate</a>";      

      //echo"$rate";
      echo"</td>";
      echo"<td width ='60'>";
      echo"$update";
      echo"</td>";
      echo"<td width ='50'>";
      echo"$street";
      echo"</td>";
      echo"<td width ='200'>";
      //echo"$code";
      echo"$att_doc";
      echo"</td>";

      $bb =$row['id'];        
      $aa =$row['id'];        
      $aa3=$row['age'];        
      $aa7=$row['telephone'];         
      //$aa8=$row['Name'];
      $aa9=$row['app_date']; 
      //echo"<td width ='40' align ='right'>$contact</td>";
      echo"<td width ='40'>";
      echo"$doctor";
      echo"</td>"; 
      //echo"<td width ='40' align ='right'>$time</td>";




      




echo"</tr>";
   

      $i++;
  
       
}

      echo"</table>";









      




echo"<table>";
   


      $tot = number_format($tot);

      echo"<tr>";

      echo"<td width ='320' align ='left'>";
      
//echo"$desc";

      echo"</td>";

      
echo"<td width ='200'>";
      echo"</td>";
echo"<td width ='150'><h4>";
      echo"</h4></td>";
echo"<td width ='100' align ='right'>";
echo"</td>";
echo"<td width ='120' align ='right'>";
echo"</td>";
echo"<td width ='100' align ='right'><h4></h4></td>";
echo"<td width ='50'></td>";




      




echo"</tr>";
   




      echo"</table>";




?>
</body>
</html>

