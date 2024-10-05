<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
            } else {
                $("#dvPassport").hide();
            }
        });
    });
</script>
<label for="chkPassport">
    <input type="checkbox" id="chkPassport" />
    User Password
</label>

<div id="dvPassport" style="display: none">
    Password:
    <input type="text" id="txtPassportNumber" />
</div>

<br /><br  />





<script type="text/javascript">
$(function () {
$('#chkStatus').change(function () {
if ($('#chkStatus').is(':checked'))
$("#testdiv").fadeIn();
else
$('#testdiv').fadeOut();
});
});
</script>



<html xmlns="http://www.w3.org/1999/xhtml">
<head id="Head1">
<title>jQuery Show or Hide Div on Check Check whether Checkbox Selected or Not</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>
<script type="text/javascript">
$(function () {
$('#chkStatus').change(function () {
if ($('#chkStatus').is(':checked'))
$("#testdiv").fadeIn();
else
$('#testdiv').fadeOut();
});
});
</script>
</head>
<body>
<form id="form">
<div><input type="checkbox" id="chkStatus" checked="checked"/>Register <br/><br/>
<div id="testdiv" >
<input type="checkbox" id="chkStatus" check="checked5"/>Cash
<input type="checkbox" id="chkStatus" check="checked4"/>Petty
<input type="checkbox" id="chkStatus" check="checked3"/>pitty
<input type="checkbox" id="chkStatus" check="checked2"/>testy
</div>


</div>

</form>






</body>
</html>






















<html>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Show Related Content when Checkbox Checked</title>

<!--meta name="description" content="Example demonstrates using JavaScript to show or hide related content depending upon whether a checkbox is checked or not." /--->

<link rel="stylesheet" href="/lib/css/page_v2.css" />
<link rel="stylesheet" media="screen and (max-width: 900px)" href="/lib/css/small_v2.css" />
<script src="/lib/js/page_v2.js" type="text/javascript"></script>
<link rel="stylesheet" href="/tutorials/forms/checkbox/css/demos.css" type="text/css" />
<style type="text/css">
#active_sub {
    display: none;
}
.demoForm input {
    vertical-align: middle;
}
</style>
<style type="text/css">
#active_ksub {
    display: none;
}
.demoForm input {
    vertical-align: middle;
}
</style>

<script type="text/javascript">
(function(){
  var bsa = document.createElement('script');
     bsa.type = 'text/javascript';
     bsa.async = true;
     bsa.src = 'http://s3.buysellads.com/ac/bsa.js';
  (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
})();
</script>
<body>

<form action="#" method="post" class="demoForm" id="demoForm">
    
    <!--fieldset>
        <legend>Demo: Show/Hide Related Onclick</legend-->
    
    <p><input type="checkbox" name="active" id="active" value="1" />Registration</p>
    
    <div id="active_sub">
        <p><!--span>Check which types</span-->
        <label><input type="checkbox" name="sports[]" value="cycling" />New Patient</label>
        <label><input type="checkbox" name="sports[]" value="running" />NHIF Verify</label>
        <label><input type="checkbox" name="sports[]" value="visit gym" />Pending Patients</label>
        <label><input type="checkbox" name="sports[]" value="swimming" />Total Day Count</label>
        <!--label><input type="checkbox" name="sports[]" value="team sports" /> team sport(s)</label>
        <label><input type="checkbox" name="sports[]" value="other" /> other</label--></p>
    </div>
    




    <!--/fieldset-->



    
</form>






<script src="/lib/js/an.js" type="text/javascript"></script>

<script type="text/javascript">
// to remove fn's from global namespace
(function() {
    
    // for toggle related demo
    function toggleSub(box, id) {
        // get reference to related content to display/hide
        var el = document.getElementById(id);
        
        if ( box.checked ) {
            el.style.display = 'block';
        } else {
            el.style.display = 'none';
        }
    }
    
    var active = document.getElementById('active');
    active.checked = false; // for soft reload
    
    // attach function that calls toggleSub to onclick property of checkbox
    // toggleSub args: checkbox clicked on (this), id of element to show/hide
    active.onclick = function() { toggleSub(this, 'active_sub'); };
    
    
    // disable submission of all forms on this page
    for (var i=0, len=document.forms.length; i<len; i++) {
        document.forms[i].onsubmit = function() { return false; };
    }

}());
</script>






</html>