<?php
   session_start();
require('open_database.php');
$location = $_SESSION['company'];
?>
﻿
<?PHP

 //$user = "hmisglobal";   
 //$pass = "jamboafrica";   
 //$database = "hmisglob_griddemo";   
 //$host = "localhost";   
 //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
 //mysql_select_db($database) or die ("Unable to select the database");
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
   
      $adm_no     = mysql_result($result,$i,"next_stock");  
   }

   $date = date('y/m/d');
   //$user = "hmisglobal";
   //$pass = "jamboafrica";
   //$database = "hmisglob_griddemo";
   //$host = "localhost";
   //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");
   //mysql_select_db($database) or die ("Unable to select the database");
   $next_adm = $adm_no+1;

   if (isset($_POST['submit'])){
      //$adm_no    =$_POST['adm_no'];
      $name      =$_POST['name'];
      $email     =$_POST['email'];
      $phone     =$_POST['phone'];
      $street    =$_POST['street'];
      $acc_name  =$_POST['account'];
      $doctor    =$_POST['doctor'];
      $amount    = 0;
      //$adm_no    = $doctor.$adm_no;
      $desc_adm_no = $name.'-'.$adm_no;


     if ($name<>''){
         //$connect = mysql_connect($host,$user,$pass)or die ("Unable to connect");   
         //mysql_select_db($database) or die ("Unable to select the database");
         $query= "INSERT INTO stockfile VALUES('','$doctor','$name','$street','','$desc_adm_no','$phone')";
      $result =mysql_query($query);



      $query= "UPDATE companyfile SET next_stock ='$next_adm' WHERE company <>''"; 
      $result =mysql_query($query);
     }
}
?>
<?php


if (isset($_POST['edit'])){

   $acc_no    =$_POST['acc_no'];
   $account   =$_POST['account'];
   $contact   =$_POST['contact'];
   $type      =$_POST['type'];
   $tel       =$_POST['tel'];
   $comment   =$_POST['comment'];
   //echo"$contact";

   $query= "UPDATE glaccountsf SET account ='$account',contact ='$contact',type ='$type',last_trans='CURDATE()',tel='$tel',comment='$comment' WHERE acc_no ='$acc_no'"; 
   $result =mysql_query($query);

  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"><head>
        <title>HMIS - Global: Patients Register</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="patients_reg_add_files/default.css">
    </head>
    <body> 

     
        <form method="post" action="stocks_register2.php" class="register">
            <h1>Registration</h1>
            <!--fieldset class="row1">
                <legend>Account Details
                </legend>
                <p>
                    <label>Email *
                    </label>
                    <input type="text">
                    <label>Repeat email *
                    </label>
                    <input type="text">
                </p>
                <p>
                    <label>Password*
                    </label>
                    <input type="text">
                    <label>Repeat Password*
                    </label>
                    <input type="text">
                    <label class="obinfo">* obligatory fields
                    </label>
                </p>
            </fieldset-->

            <fieldset class="row2">
                <legend>Stock Details
                </legend>
                <p>
                    <label>St.Code *
                    </label>
                    <?php
                    echo"<input class='long' type='text' name ='adm_no' value ='$adm_no'>";
                    ?>
                </p>
                <p>
                    <label>Desc. *
                    </label>
                    <input class="long" type="text" name ="name">
                </p>
           
                <p>
                    <label>Cost price*
                    </label>
                    <input maxlength="10" type="text" name ="phone">
                </p>
                <p>
                    <label class="optional">Sell Price
                    </label>
                    <input class="long" type="text" name ="street">
                </p>
                <!--p>
                    <label>City *
                    </label>
                    <input class="long" type="text" name ="city">
                </p>
                <p>
                    <label>Country *
                    </label>
                    <input class="long" type="text" name ="country">
                </p-->
                <p>
                    <label class="optional">Other Info:
                    </label>
                    <input class="long" value="Manufacturer" type="text" name ="email">

                </p>


                <p>
                    <label>Store *
                    </label>

<?php
 echo"<select id='doctor' name='doctor'>";        
 $cdquery="SELECT description FROM st_locationfile";
 $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
 while ($cdrow=mysql_fetch_array($cdresult)) {
   $cdTitle=$cdrow["description"];
   echo "<option>$cdTitle</option>";            
   }
  echo"</select>";
?>



         </p>




                <p>
                    <label class="optional"></label>
                    <!--input class="long"   type="text" name ="acc_name"-->

                </p>



            </fieldset>



            <fieldset class="row3">
                <legend>Further Information
                </legend>


                <!--p>
                    <label class="optional">Admission Date
                    </label>
                    <?php
                    $date = date('y-m-d');
                    echo"<input maxlength='10' value='$date' type='text' name ='adm_date'>";
                    ?>
                </p>

                <p>
                    <label class="optional">Discharge Date                    </label>
                    <input maxlength="10" value="  /  /    " type="text" name ="dis_date">

                </p>



                <p>
                    <label>Bed No. *</label>
                    <input class="long" type="text" name ="bed_no">
                </p>

                <p>
                    <label>Gender *</label>
                    <input class="long" type="text" name ="gender">
                </p>

                <p>
                    <label>Age *</label>
                    <input class="year" size="4" maxlength="4" type="text" name ="age">
                </p-->
                <!--p>


                </p-->
                <!--p>
                    <label>Children *
                    </label>
                    <input checked="checked" value="" type="checkbox" name ="child">
                </p-->


                <p>


                <label class="optional">Supplier </label>
                 <!--input maxlength="10"   type="text" name ="acc_no"-->


               <select id="account" name="account">
        
               <?php
            
               //$mysqlserver="localhost";
               //$mysqlusername="hmisglobal";
               //$mysqlpassword="jamboafrica";
               //$link=mysql_connect(localhost, $mysqlusername, $mysqlpassword) or die ("Error connecting to mysql //server: ".mysql_error());
            
               //$dbname = 'hmisglob_griddemo';
               //mysql_select_db($dbname, $link) or die ("Error selecting specified database on mysql server: //".mysql_error());
            
               $cdquery="SELECT account_name FROM debtorsfile";
               $cdresult=mysql_query($cdquery) or die ("Query to get data from firsttable failed: ".mysql_error());
            
               while ($cdrow=mysql_fetch_array($cdresult)) {
               $cdTitle=$cdrow["account_name"];
                   echo "<option>
                    $cdTitle
                   </option>";
            
               }
                
               ?>
    
              </select>



                </p>













            </fieldset>
            <fieldset class="row4">
                <!--legend>Terms and Mailing
                </legend>
                <p class="agreement">
                    <input value="" type="checkbox">
                    <label>*  I accept the <a href="#">Terms and Conditions</a></label>
                </p>
                <p class="agreement">
                    <input value="" type="checkbox">
                    <label>I want to receive personalized offers by your site</label>
                </p>
                <p class="agreement">
                    <input value="" type="checkbox">
                    <label>Allow partners to send me personalized offers and related services</label>
                </p-->
            </fieldset>
            <div><button name='submit' type='submit' class='button' id='contact-submit' data-submit='...Sending' >Submit</button></div>
            <!--div><input type="submit" name="Submit"  class="button" value="New Patient" /></div-->
            <!--input type="submit" name="Submit" class="button" onclick="return popitup('http://localhost/HGlobal/reg_add.html')">Register »</button-->
        </form>
    






</body></html>