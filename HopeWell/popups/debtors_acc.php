

<?PHP

if (isset($_POST['submit'])){

   $acc_no =$_POST['code'];
   $name   =$_POST['name'];
   $type   =$_POST['type'];
   $bal    =$_POST['address2'];


   $user = "root";
   $pass = "kenya";
   $database = "busiacounty";
   $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");
   
   $query= "INSERT INTO debtorsfile VALUES('$acc_no','$name','$type','$bal','CURDATE()')";
   $result =mysql_query($query);
   //echo"<h5>Ledger A/c: ".$name." Saved....</h5>";
  }
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Pop Up Info</title>


<link rel=StyleSheet href="pop-upstyle.css" type="text/css" media="screen">
<script language="JavaScript" src="pop-up.js"></script>

<BODY BGCOLOR="#FFFFFF" TEXT="#000000" LINK="#99CCFF" VLINK="#99CCFF" ALINK="#99CCFF" leftmargin=0 rightmargin=0 topmargin=0 bottommargin=0 marginheight=0 marginwidth=0>



<link rel="stylesheet" type="text/css" href="CollectPayment_files/datetimepicker.css"><link rel="stylesheet" type="text/css" href="CollectPayment_files/DXR.css"><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="description"><meta name="keywords"><meta name="robots" content="ALL,FOLLOW"><meta name="Author" content="SuiteBlue Inc."><meta http-equiv="imagetoolbar" content="no"><link rel="stylesheet" href="CollectPayment_files/reset.css" type="text/css"><link rel="stylesheet" href="CollectPayment_files/screen.css" type="text/css"><link rel="stylesheet" href="CollectPayment_files/fancybox.css" type="text/css"><link rel="stylesheet" href="CollectPayment_files/jquery.css" type="text/css"><link rel="stylesheet" href="CollectPayment_files/jquery_002.css" type="text/css"><link rel="stylesheet" href="CollectPayment_files/visualize.css" type="text/css"><link rel="stylesheet" href="CollectPayment_files/visualize-light.css" type="text/css"><link rel="stylesheet" href="CollectPayment_files/bigbutton.css" type="text/css"><link id="ctl00_Link1" rel="shortcut icon" href="https://app.123landlord.com/favicon.png" type="image/x-icon">

    <!--[if IE 7]>
	    <link rel="stylesheet" type="text/css" href="css/ie7.css" />
    <![endif]-->
    
    <script src="CollectPayment_files/ga.js" async="" type="text/javascript"></script><script src="CollectPayment_files/track.js" defer="defer" async="" type="application/javascript"></script><script src="CollectPayment_files/lyhzpK4njWvtMSnvo08dA.js" async="" type="text/javascript"></script><script type="text/javascript" src="CollectPayment_files/typeface-0.js"></script>
    <script type="text/javascript" src="CollectPayment_files/zurich_cn_bt_regular.js"></script>
    <script type="text/javascript" src="CollectPayment_files/zurich_cn_bt_bold.js"></script>
    <script type="text/javascript" src="CollectPayment_files/frutigercnd-normal_regular.js"></script>
    <script type="text/javascript" src="CollectPayment_files/Messages.js"></script>

      <script language="javascript" type="text/javascript">
          function SetSelectedGlobalSearchChoice(source, eventArgs) {
              loadSearchResults(eventArgs.get_value(), eventArgs.get_text(), source.get_contextKey());
              $("a.modalSearch").trigger("click");
          }

          function loadSearchResults(id, nm, ownerId ) {
              PageMethods.LoadSearchResultsScreen(id, nm, ownerId, displaySearchResults, onTimeout, onError, onAbort, "", 300, 100);
          }

          function displaySearchResults(result, response, context) {
              document.getElementById('searchResultsPanel').innerHTML = result;
          }

          function onError(error) {
              document.body.style.cursor = 'default';
              // Alert user to the error.
              alert(error.get_message());
          }

          function onTimeout(request, context) {
              document.body.style.cursor = 'default';
              //alert('timeout');
          }

          function onAbort(request, context) {
              document.body.style.cursor = 'default';
              alert('abort');
          }
          
          
      
      </script>
        
<title>
	Pafoma-Landlord | Financial Management Software for Landlords and Owners | Auto-Invoices
</title><style></style><style media="screen" type="text/css">.uv-icon{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;display:inline-block;cursor:pointer;position:relative;-webkit-transition:all 300ms;-moz-transition:all 300ms;-o-transition:all 300ms;transition:all 300ms;width:39px;height:39px;position:fixed;z-index:100002;opacity:0.8;-webkit-transition:opacity 100ms;-moz-transition:opacity 100ms;-o-transition:opacity 100ms;transition:opacity 100ms}.uv-icon.uv-bottom-right{bottom:10px;right:12px}.uv-icon.uv-top-right{top:10px;right:12px}.uv-icon.uv-bottom-left{bottom:10px;left:12px}.uv-icon.uv-top-left{top:10px;left:12px}.uv-icon.uv-is-selected{opacity:1}.uv-icon svg{width:39px;height:39px}.uv-popover{font-family:sans-serif;font-weight:100;font-size:13px;color:black;position:fixed;z-index:100001}.uv-popover-content{-webkit-border-radius:5px;-moz-border-radius:5px;-ms-border-radius:5px;-o-border-radius:5px;border-radius:5px;background:white;position:relative;width:325px;height:325px;-webkit-transition:background 200ms;-moz-transition:background 200ms;-o-transition:background 200ms;transition:background 200ms}.uv-bottom .uv-popover-content{-webkit-box-shadow:rgba(0,0,0,0.3) 0 -10px 60px,rgba(0,0,0,0.1) 0 0 20px;-moz-box-shadow:rgba(0,0,0,0.3) 0 -10px 60px,rgba(0,0,0,0.1) 0 0 20px;box-shadow:rgba(0,0,0,0.3) 0 -10px 60px,rgba(0,0,0,0.1) 0 0 20px}.uv-top .uv-popover-content{-webkit-box-shadow:rgba(0,0,0,0.3) 0 10px 60px,rgba(0,0,0,0.1) 0 0 20px;-moz-box-shadow:rgba(0,0,0,0.3) 0 10px 60px,rgba(0,0,0,0.1) 0 0 20px;box-shadow:rgba(0,0,0,0.3) 0 10px 60px,rgba(0,0,0,0.1) 0 0 20px}.uv-left .uv-popover-content{-webkit-box-shadow:rgba(0,0,0,0.3) 10px 0 60px,rgba(0,0,0,0.1) 0 0 20px;-moz-box-shadow:rgba(0,0,0,0.3) 10px 0 60px,rgba(0,0,0,0.1) 0 0 20px;box-shadow:rgba(0,0,0,0.3) 10px 0 60px,rgba(0,0,0,0.1) 0 0 20px}.uv-right .uv-popover-content{-webkit-box-shadow:rgba(0,0,0,0.3) -10px 0 60px,rgba(0,0,0,0.1) 0 0 20px;-moz-box-shadow:rgba(0,0,0,0.3) -10px 0 60px,rgba(0,0,0,0.1) 0 0 20px;box-shadow:rgba(0,0,0,0.3) -10px 0 60px,rgba(0,0,0,0.1) 0 0 20px}.uv-ie8 .uv-popover-content{position:relative}.uv-ie8 .uv-popover-content .uv-popover-content-shadow{display:block;background:black;content:'';position:absolute;left:-15px;top:-15px;width:100%;height:100%;filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius=15,MakeShadow=true,ShadowOpacity=0.30);z-index:-1}.uv-popover-tail{border:8px solid transparent;width:0;z-index:10;position:absolute;-webkit-transition:border-top-color 200ms;-moz-transition:border-top-color 200ms;-o-transition:border-top-color 200ms;transition:border-top-color 200ms}.uv-top .uv-popover-tail{bottom:-20px;border-top:12px solid white}.uv-bottom .uv-popover-tail{top:-20px;border-bottom:12px solid white}.uv-left .uv-popover-tail{right:-20px;border-left:12px solid white}.uv-right .uv-popover-tail{left:-20px;border-right:12px solid white}.uv-popover-loading{background:white;-webkit-border-radius:5px;-moz-border-radius:5px;-ms-border-radius:5px;-o-border-radius:5px;border-radius:5px;position:absolute;width:100%;height:100%;left:0;top:0}.uv-popover-loading-text{position:absolute;top:50%;margin-top:-0.5em;width:100%;text-align:center}.uv-popover-iframe-container{height:100%}.uv-popover-iframe{-webkit-border-radius:5px;-moz-border-radius:5px;-ms-border-radius:5px;-o-border-radius:5px;border-radius:5px;overflow:hidden}.uv-is-hidden{display:none}.uv-is-invisible{display:block !important;visibility:hidden !important}.uv-is-transitioning{display:block !important}.uv-no-transition{-moz-transition:none !important;-webkit-transition:none !important;-o-transition:color 0 ease-in !important;transition:none !important}.uv-fade{opacity:1;-webkit-transition:opacity 200ms ease-out;-moz-transition:opacity 200ms ease-out;-o-transition:opacity 200ms ease-out;transition:opacity 200ms ease-out}.uv-fade.uv-is-hidden{opacity:0}.uv-scale-top,.uv-scale-top-left,.uv-scale-top-right,.uv-scale-bottom,.uv-scale-bottom-left,.uv-scale-bottom-right,.uv-scale-right,.uv-scale-right-top,.uv-scale-right-bottom,.uv-scale-left,.uv-scale-left-top,.uv-scale-left-bottom,.uv-slide-top,.uv-slide-bottom,.uv-slide-left,.uv-slide-right{opacity:1;-webkit-transition:all 80ms ease-out;-moz-transition:all 80ms ease-out;-o-transition:all 80ms ease-out;transition:all 80ms ease-out}.uv-scale-top.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(-15%);-moz-transform:scale(0.8) translateY(-15%);-ms-transform:scale(0.8) translateY(-15%);-o-transform:scale(0.8) translateY(-15%);transform:scale(0.8) translateY(-15%)}.uv-scale-top-left.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(-15%) translateX(-10%);-moz-transform:scale(0.8) translateY(-15%) translateX(-10%);-ms-transform:scale(0.8) translateY(-15%) translateX(-10%);-o-transform:scale(0.8) translateY(-15%) translateX(-10%);transform:scale(0.8) translateY(-15%) translateX(-10%)}.uv-scale-top-right.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(-15%) translateX(10%);-moz-transform:scale(0.8) translateY(-15%) translateX(10%);-ms-transform:scale(0.8) translateY(-15%) translateX(10%);-o-transform:scale(0.8) translateY(-15%) translateX(10%);transform:scale(0.8) translateY(-15%) translateX(10%)}.uv-scale-bottom.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(15%);-moz-transform:scale(0.8) translateY(15%);-ms-transform:scale(0.8) translateY(15%);-o-transform:scale(0.8) translateY(15%);transform:scale(0.8) translateY(15%)}.uv-scale-bottom-left.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(15%) translateX(-10%);-moz-transform:scale(0.8) translateY(15%) translateX(-10%);-ms-transform:scale(0.8) translateY(15%) translateX(-10%);-o-transform:scale(0.8) translateY(15%) translateX(-10%);transform:scale(0.8) translateY(15%) translateX(-10%)}.uv-scale-bottom-right.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateY(15%) translateX(10%);-moz-transform:scale(0.8) translateY(15%) translateX(10%);-ms-transform:scale(0.8) translateY(15%) translateX(10%);-o-transform:scale(0.8) translateY(15%) translateX(10%);transform:scale(0.8) translateY(15%) translateX(10%)}.uv-scale-right.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateX(15%);-moz-transform:scale(0.8) translateX(15%);-ms-transform:scale(0.8) translateX(15%);-o-transform:scale(0.8) translateX(15%);transform:scale(0.8) translateX(15%)}.uv-scale-right-top.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateX(15%) translateY(-10%);-moz-transform:scale(0.8) translateX(15%) translateY(-10%);-ms-transform:scale(0.8) translateX(15%) translateY(-10%);-o-transform:scale(0.8) translateX(15%) translateY(-10%);transform:scale(0.8) translateX(15%) translateY(-10%)}.uv-scale-right-bottom.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateX(15%) translateY(10%);-moz-transform:scale(0.8) translateX(15%) translateY(10%);-ms-transform:scale(0.8) translateX(15%) translateY(10%);-o-transform:scale(0.8) translateX(15%) translateY(10%);transform:scale(0.8) translateX(15%) translateY(10%)}.uv-scale-left.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateX(-15%);-moz-transform:scale(0.8) translateX(-15%);-ms-transform:scale(0.8) translateX(-15%);-o-transform:scale(0.8) translateX(-15%);transform:scale(0.8) translateX(-15%)}.uv-scale-left-top.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateX(-15%) translateY(-10%);-moz-transform:scale(0.8) translateX(-15%) translateY(-10%);-ms-transform:scale(0.8) translateX(-15%) translateY(-10%);-o-transform:scale(0.8) translateX(-15%) translateY(-10%);transform:scale(0.8) translateX(-15%) translateY(-10%)}.uv-scale-left-bottom.uv-is-hidden{opacity:0;-webkit-transform:scale(0.8) translateX(-15%) translateY(10%);-moz-transform:scale(0.8) translateX(-15%) translateY(10%);-ms-transform:scale(0.8) translateX(-15%) translateY(10%);-o-transform:scale(0.8) translateX(-15%) translateY(10%);transform:scale(0.8) translateX(-15%) translateY(10%)}.uv-slide-top.uv-is-hidden{-webkit-transform:translateY(-100%);-moz-transform:translateY(-100%);-ms-transform:translateY(-100%);-o-transform:translateY(-100%);transform:translateY(-100%)}.uv-slide-bottom.uv-is-hidden{-webkit-transform:translateY(100%);-moz-transform:translateY(100%);-ms-transform:translateY(100%);-o-transform:translateY(100%);transform:translateY(100%)}.uv-slide-left.uv-is-hidden{-webkit-transform:translateX(-100%);-moz-transform:translateX(-100%);-ms-transform:translateX(-100%);-o-transform:translateX(-100%);transform:translateX(-100%)}.uv-slide-right.uv-is-hidden{-webkit-transform:translateX(100%);-moz-transform:translateX(100%);-ms-transform:translateX(100%);-o-transform:translateX(100%);transform:translateX(100%)}
</style><style media="print" type="text/css">#uvTab,.uv-tray,.uv-icon,.uv-popover,.uv-bubble{display:none!important}</style><style type="text/css"></style><script src="CollectPayment_files/mixpanel-2.js" async="" type="text/javascript"></script><style media="screen" type="text/css">#dddContent {visibility:hidden}</style></head>
<!--body id="body"><div class="uv-tab uv-slide-bottom " id="uvTab" style="background:red url(https://widget.uservoice.com/images/clients/widget2/tab-horizontal-dark.png) 0 50% no-repeat;border:1px solid #FFF;border-bottom:none;-moz-border-radius:4px 4px 0 0;-webkit-border-radius:4px 4px 0 0;border-radius:4px 4px 0 0;-moz-box-shadow:inset rgba(255,255,255,.25) 1px 1px 1px, rgba(0,0,0,.5) 0 1px 2px;-webkit-box-shadow:inset rgba(255,255,255,.25) 1px 1px 1px, rgba(0,0,0,.5) 0 1px 2px;box-shadow:inset rgba(255,255,255,.25) 1px 1px 1px, rgba(0,0,0,.5) 0 1px 2px;font:normal normal bold 14px/1em Arial, sans-serif;position:fixed;right:10px;bottom:0;z-index:9999;background-color:#25587E;"><a id="uvTabLabel" style="background-color: transparent; display:block;padding:6px 10px 2px 42px;text-decoration:none;" href="javascript:return%20false;"><img src="CollectPayment_files/feedback-tab.png" alt="suggest a feature" style="border:0; background-color: transparent; padding:0; margin:0;"></a></div-->
    <!--form name="aspnetForm" method="post" action="http://localhost/webs/save_tenant_invoices.php" id="aspnetForm" onkeypress="javascript:if (event.keyCode == 13) return false;"-->
<div>
<input name="ctl00_ScriptManager2_HiddenField" id="ctl00_ScriptManager2_HiddenField" value=";;AjaxControlToolkit, Version=1.0.20229.20821, Culture=neutral, PublicKeyToken=28f01b0e84b6d53e:en-US:c5c982cc-4942-4683-9b48-c2c58277700f:e2e86ef9:9ea3f0e2:9e8e87e9:1df13a87:4c9865be:ba594826:2d0cbeda:fde3863c;;AjaxControlToolkit, Version=1.0.20229.20821, Culture=neutral, PublicKeyToken=28f01b0e84b6d53e:en-US:c5c982cc-4942-4683-9b48-c2c58277700f:af22e781" type="hidden">



</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<script src="CollectPayment_files/WebResource.js" type="text/javascript"></script>

<script id="dxis_237035718" src="CollectPayment_files/DXR.axd" type="text/javascript"></script><script id="dxss_780433647" type="text/javascript">
<!--
window.__aspxServerFormID = 'aspnetForm';
window.__aspxEmptyImageUrl = '/DXR.axd?r=1_3-Hrg_2';
//-->
</script>
<script src="CollectPayment_files/ScriptResource.js" type="text/javascript"></script>
<script src="CollectPayment_files/ScriptResource_002.js" type="text/javascript"></script>
<script src="CollectPayment_files/CollectPayment.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
var PageMethods = function() {
PageMethods.initializeBase(this);
this._timeout = 0;
this._userContext = null;
this._succeeded = null;
this._failed = null;
}

<div>

	
	
</div>
    <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ScriptManager2', document.getElementById('aspnetForm'));
Sys.WebForms.PageRequestManager.getInstance()._updateControls(['fctl00$UserSettings$updFromEml','fctl00$CurrentOwner$updateOwners','tctl00$MessageModalForms$updateRecipients','fctl00$llee$ReceiptHelperForm$updatePmtsOnReceipt','fctl00$llee$InvoiceHelperForm$updateAmtsDueOnInvoice','tctl00$llee$emailReceipt$updateAddresses','tctl00$llee$updateTenantPropDetails','tctl00$llee$updateSideMenuLinks','tctl00$llee$updLeaseSelector','fctl00$llee$updatePaymentPanel'], ['ctl00$MessageModalForms$lnkAddRecipient','ctl00$llee$ReceiptHelperForm$btnEmailReceipt','ctl00$llee$InvoiceHelperForm$btnEmailInvoice','ctl00$llee$emailReceipt$lnkAddToRecip','ctl00$llee$emailReceipt$lnkAddCCRecip','ctl00$llee$emailReceipt$lnkAddBccRecip','ctl00$llee$emailReceipt$btnClearScreen','ctl00$llee$lnkFindTenantProp','ctl00$llee$emailReceipt'], [], 90);
//]]>
</script>

    
    <script type="text/javascript">
        var showBusyIcon = true;
	    var prm = Sys.WebForms.PageRequestManager.getInstance();
	    prm.add_initializeRequest(InitializeRequest);
	    prm.add_endRequest(EndRequest);
	    function InitializeRequest(sender, args) {
	        if (showBusyIcon) {
	            document.getElementById('loadingIco').style.visibility = 'visible'
	            showdeadcenterdiv(48, 48, 'loadingIco');
	        }
	    }
	    function EndRequest(sender, args) {
	        document.getElementById('loadingIco').style.visibility = 'hidden';
	    }
    </script>

    
    
    <div class="pagetop">
	<div class="head pagesize"> <!-- *** head layout *** -->
	    <div class="head_top">


			
			<div class="logo clear">
			<a href="Dashboard.htm" title="View dashboard">
			    <img id="ctl00_logoImage" class="picture" src="login_files/images/123landlordlogo.png" style="border-width:0px;">
			</a>
			</div>
		</div>
		


	</div>
	
	


	
<!-- User Settings Edit Form -->


	

<!-- User Add/Edit Form -->



    </div>
    
    <div>
        <div style="visibility: hidden; position: absolute; top: 344px; left: 616px; display: block;" id="loadingIco" class="loadingicon">&nbsp;</div>
        

<script src="CollectPayment_files/Payments.js" language="javascript" type="text/javascript"></script>


<div class="main pagesize"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">

<!-- Testing from here
		<div class="page clear">
		    <div class="content-box">
			<div class="box-body">
				<div class="box-header clear">
					<h2 style="visibility: visible;"><span style="display: inline-block;" id="ctl00_llee_lblTitle"><span class="typeface-js-vector-container"><canvas style="margin-top: -1px; margin-bottom: -1px;" width="54" height="22"></canvas><span style="margin-left: -55px; letter-spacing: -1.5px; width: 54px;" class="typeface-js-selected-text">Collect </span><canvas style="margin-top: -1px; margin-bottom: -1px;" width="62" height="22"></canvas><span style="margin-left: -63px; letter-spacing: -2.28571px; width: 62px;" class="typeface-js-selected-text">Payment</span></span></span></h2><input name="ctl00$llee$hidden_SelectedID" id="ctl00_llee_hidden_SelectedID" type="hidden"><input name="ctl00$llee$hidden_SelectedType" id="ctl00_llee_hidden_SelectedType" type="hidden">
				</div>
				<div class="box-wrap clear"-->
					
					



<!-- Receipt Helper Form -->




					
   


<!-- Invoice Helper Form -->
<div id="modalInvoiceHelper" class="modal-window modal-650" style="height:640px;">
    
    <div id="ctl00_llee_InvoiceHelperForm_updateAmtsDueOnInvoice">
	
    
    <input name="ctl00$llee$InvoiceHelperForm$hiddenUseBulkSendMode" id="ctl00_llee_InvoiceHelperForm_hiddenUseBulkSendMode" value="n" type="hidden">
    
    <div class="mark_blue add-category" style="height:590px;">
		<h2 style="visibility: visible;"><span class="typeface-js-vector-container"><canvas style="margin-top: -4px; margin-bottom: -4px;" width="56" height="22"></canvas><span style="margin-left: -57px; letter-spacing: 7px; width: 56px;" class="typeface-js-selected-text">Invoice </span><canvas style="margin-top: -4px; margin-bottom: -4px;" width="54" height="22"></canvas><span style="margin-left: -55px; letter-spacing: 7.71429px; width: 54px;" class="typeface-js-selected-text">Options</span></span></h2>
		<div class="rule"></div>
		



</td>
		</tr>
	</tbody></table><input id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDDWS" name="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDDWS" value="0:0:-1:-10000:-10000:0:-10000:-10000:1" type="hidden"><div id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_PW-1" style="position:absolute;left:0px;top:0px;z-index:10000;visibility:hidden;display:none;">




</td>
							</tr><tr>



							</tr>
						</tbody></table><input id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNPWS" name="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNPWS" value="0:0:-1:-10000:-10000:0:0px:-10000:1" type="hidden"><div id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_PW-1" style="position:absolute;left:0px;top:0px;z-index:10000;visibility:hidden;display:none;">
							<table id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_PWST-1" style="border-collapse:collapse;border-collapse:separate;position:relative;" border="0" cellpadding="0" cellspacing="0">
								<tbody><tr>
									<td onmousedown="aspxPWMDown(event,'ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP',-1,false)" style="width:0px;cursor:default;"><table id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_CLW-1" style="width:0px;border-collapse:collapse;border-collapse:separate;" border="0" cellpadding="0" cellspacing="0">
										<tbody><tr>
											<td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_PWC-1" style="height:100%;"><div class="dxeCalendarFastNav">
												<div class="dxeCalendarFastNavMonthArea">
													<table id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_m" style="width:100%;border-collapse:collapse;border-collapse:separate;" border="0" cellpadding="0" cellspacing="0">
														<tbody><tr>
															<td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M0" class="dxeCalendarFastNavMonth">Jan</td><td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M1" class="dxeCalendarFastNavMonth">Feb</td><td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M2" class="dxeCalendarFastNavMonth">Mar</td><td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M3" class="dxeCalendarFastNavMonth">Apr</td>
														</tr><tr>
															<td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M4" class="dxeCalendarFastNavMonth">May</td><td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M5" class="dxeCalendarFastNavMonth">Jun</td><td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M6" class="dxeCalendarFastNavMonth">Jul</td><td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M7" class="dxeCalendarFastNavMonth">Aug</td>
														</tr><tr>
															<td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M8" class="dxeCalendarFastNavMonth">Sep</td><td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M9" class="dxeCalendarFastNavMonth">Oct</td><td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M10" class="dxeCalendarFastNavMonth">Nov</td><td id="ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD_C_FNP_M11" class="dxeCalendarFastNavMonth">Dec</td>
														</tr>
													</tbody></table>
												</div><div class="dxeCalendarFastNavYearArea">



												</div>
											</div><div class="dxeCalendarFastNavFooter" style="text-align:center;">




											</div></td>
										</tr>
									</tbody></table></td><td style="background:url('/DXR.axd?r=1_18-Hrg_2') no-repeat left top;"></td>
								</tr><tr>
									<td style="background:url('/DXR.axd?r=1_17-Hrg_2') no-repeat left top;"></td><td style="background:url('/DXR.axd?r=1_19-Hrg_2') no-repeat left top;"><div style="height:5px;width:5px;">

									</div></td>
								</tr>
							</tbody></table>
						</div>
<script id="dxss_390949976" type="text/javascript">
<!--



//-->
</script></td>
					</tr>
				</tbody></table></td>




			</tr>
		</tbody></table>
	</div>
<script id="dxss_1983090850" type="text/javascript">
<!--

var dxo = new ASPxClientPopupControl('ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD');
window['ctl00_llee_InvoiceHelperForm_dtmInvoiceDate_DDD'] = dxo;
dxo.uniqueID = 'ctl00$llee$InvoiceHelperForm$dtmInvoiceDate$DDD';
dxo.Shown.AddHandler(function (s, e) { aspxDDBPCShown('ctl00_llee_InvoiceHelperForm_dtmInvoiceDate', e); });
dxo.adjustInnerControlsSizeOnShow=false;
dxo.closeAction='CloseButton';
dxo.popupHorizontalAlign='LeftSides';
dxo.popupVerticalAlign='Below';
dxo.isPopupPositionCorrectionOn=false;
dxo.width=0;
dxo.height=0;
dxo.InlineInitialize();

//-->
</script>



		


				
	</div>
	
	
</div>
		
</div>





                   
<!-- Email Report Form -->


   <h3>Debtors | Account Register </h3> <? if (isset($_POST['submit'])){echo"<h5>Ledger A/c: ".$name." Saved....</h5>";}?>

<br>






			                <tr>


<?PHP

if (isset($_POST['Add'])){

echo"<form name='aspnetForm' method='post' action='debtors_acc.php'>";
echo"<table class='dxbebt' style='border-collapse:collapse;border-collapse:separate; border='0' cellpadding='10' cellspacing='0'>";
echo"<tr><td width ='100'><h5>Code:</h5></td><td><input size ='15' name='code' required ></td></tr>";
echo"<tr><td width ='100'><h5>Name:</h5></td><td><input size ='65' name='name' required ></td></tr>";
echo"<tr><td width ='100'><h5>Type:</h5></td><td>";
        echo"<select name='type' required>";
	echo"<option selected='selected' ></option>";
	echo"<option value='Sacco'>Sacco</option>";
	echo"<option value='Personal'>Personal</option>";
	echo"<option value='Bank'>Bank</option></select></td></tr>";
echo"<tr><td width ='100'><h5>O/S Bal:</h5></td><td><input size ='40' name='address2'></td></tr>";
echo"<tr><td width ='100'><h5>Last Trans:</h5></td><td><input size ='40' name='email'></td></tr></table>";
?>








			</tbody></table>


</td>


<br>
<table><td align ='left'><input type="submit" name="submit" value="Save New"></td><td align ='left'><input type="submit" name="edit" value="Edit"></td><td width ='300' align ='left'><input type="submit" name="list" value="Preview"></td><td width ='300'></td><td width ='300'></td></table>


</form>

<?
}else{
?>

<form action ='debtors_acc.php' method ='POST'>
<table><td width='900'></td><td></td><td align ='left'><input type="submit" name="Add" value="New"></td><td align ='left'><input type="submit" name="list" value="Preview"></td><tr><br></tr></table></form>
<img src='black_line.jpg' border='0' width='1000' height='1'>



<?

   $name =$_POST['name'];
   $address1   =$_POST['address1'];
   $address2     =$_POST['address2'];
   $telephone     =$_POST['telephone'];
   $mobile     =$_POST['mobile'];
   $email     =$_POST['email'];

   $user = "root";
   $pass = "kenya";
   $database = "busiacounty";
   $host = "localhost";
   $connect = mysql_connect($host,$user,"")or die ("Unable to connect");
   mysql_select_db($database) or die ("Unable to select the database");
   
   $query= "SELECT * FROM debtorsfile ORDER BY account" or die(mysql_error());
   $result =mysql_query($query) or die(mysql_error());
   $num =mysql_numrows($result) or die(mysql_error());
   $i = 0;

   echo"<table boder ='1'><tr><th width ='100'>Account #</th><th width ='300' align ='left'>Description</th><th width ='100'></th><th width ='100' align ='left'>Account Type</th><th width ='200'></th><th width ='100' align ='right'>Balance</th><th width ='100' align ='right'>Last Date</th><th width ='50'></th><th width ='50'></th><th width ='50' align ='center'>Edit</th></tr>
</table><img src='black_line.jpg' border='0' width='1000' height='1'>
";   
}
?>
<font size ='20'>

	<?
		$SQL = "select * FROM debtorsfile ORDER BY account" ;
		$hasil=mysql_query($SQL, $connect);
		$id = 0;
    	        $nRecord = 1;
                $No = $nRecord;
		if (mysql_num_rows($hasil) > 0) { 
		   while ($row=mysql_fetch_array($hasil)) {                   
 	?>
     <table border ='1'><tr<? if (($nRecord % 2)==0) { ?> bgcolor="#e4e4e4"
     <? }  else {?>
     bgcolor="#FFFFCC" <? } ?>>
	  <td width ='100'><?=$row['acc_no']?></td>
      <td width ='300'><?=($row['account'])?></td>
      <td width ='100'><?=$row['type']?></td>
      <td width ='200'></td>

	  <td width ='100'><?=$row['balance']?></td>
	  <td width ='100'><?=$row['last_trans']?></td>

      <td class="style3"><div align="center">
	  <!--a href="<?=$row['acc_no'] ?>"><img src="../draft/images/user_go.png" border="0" width="16" height="16"></a-->
          <!--a href="gl_accounts.php?accounts=<?=$row['acc_no'] ?><img src='../draft/images/user_go.png' border='0' width='16' height='16'></a-->
          <? $_SESSION['acc_no'] =$row['acc_no']; ?> 
          <a href="debtors_accb.php?accounts=<?=$row['acc_no'] ?>&acc_name=<?=$row['account'] ?>"> <img src="../draft/images/user_go.png" border="0" width="16" height="16"></a>
	  </td>
    </tr>
   </table>
   <img src="black_line.jpg" border="0" width="1000" height="1">
   <? }}?>
   
</font>
				
		</div>
	</div>
</div>
		                

        
    




    <!--[if !IE]><!-->
    <script type="text/javascript">_typeface_js.initialize();</script>
    <!--<![endif]-->
       
    <script type="text/javascript" src="CollectPayment_files/jquery_002.js"></script>
    <script type="text/javascript" src="CollectPayment_files/jquery_004.js"></script>
    <script type="text/javascript" src="CollectPayment_files/jquery_007.js"></script>
    <script type="text/javascript" src="CollectPayment_files/jquery_005.js"></script>
    <script type="text/javascript" src="CollectPayment_files/jquery_003.js"></script>
    <script type="text/javascript" src="CollectPayment_files/jquery_006.js"></script>
    <script type="text/javascript" src="CollectPayment_files/jquery.js"></script>
    <script type="text/javascript" src="CollectPayment_files/excanvas.js"></script>
    <script type="text/javascript" src="CollectPayment_files/jquery_008.js"></script>
    <script type="text/javascript" src="CollectPayment_files/script.js"></script>
    

<script type="text/javascript">
//<![CDATA[

theForm.oldSubmit = theForm.submit;
theForm.submit = WebForm_SaveScrollPositionSubmit;

theForm.oldOnSubmit = theForm.onsubmit;
theForm.onsubmit = WebForm_SaveScrollPositionOnSubmit;
Sys.Application.initialize();
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.AutoCompleteBehavior, {"completionInterval":10,"completionListCssClass":"searchResultsBox","completionListElementID":"xxx","completionListItemCssClass":"searchResultsItem width350","completionSetCount":20,"contextKey":"2355||2709","delimiterCharacters":";,:","highlightedItemCssClass":"searchResultsHighlightedItem width350","id":"ctl00_searchAutoComplete","minimumPrefixLength":2,"serviceMethod":"GetGlobalSearchSuggestions","servicePath":"/landlord.php","useContextKey":true}, {"itemSelected":SetSelectedGlobalSearchChoice}, null, $get("ctl00_txtSearch"));
});
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.FilteredTextBoxBehavior, {"FilterType":2,"id":"ctl00_UserSettings_ftbExp"}, null, null, $get("ctl00_UserSettings_txtLeaseExpiryDays"));
});
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.FilteredTextBoxBehavior, {"FilterType":3,"ValidChars":".","id":"ctl00_UserSettings_ftbAppFee"}, null, null, $get("ctl00_UserSettings_txtApplicationFee"));
});
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.FilteredTextBoxBehavior, {"FilterType":3,"ValidChars":".","id":"ctl00_UserSettings_ftbDepAmt"}, null, null, $get("ctl00_UserSettings_txtDepositAmount"));
});
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.FilteredTextBoxBehavior, {"FilterType":3,"ValidChars":".","id":"ctl00_UserSettings_ftbRentAmt"}, null, null, $get("ctl00_UserSettings_txtRentAmount"));
});
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.FilteredTextBoxBehavior, {"FilterType":3,"ValidChars":".","id":"ctl00_UserSettings_ftbTax1Value"}, null, null, $get("ctl00_UserSettings_txtTax1Value"));
});
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.FilteredTextBoxBehavior, {"FilterType":3,"ValidChars":".","id":"ctl00_UserSettings_ftbTax2Value"}, null, null, $get("ctl00_UserSettings_txtTax2Value"));
});
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.FilteredTextBoxBehavior, {"FilterType":3,"ValidChars":".","id":"ctl00_llee_InvoiceHelperForm_ftbe1"}, null, null, $get("ctl00_llee_InvoiceHelperForm_txtInvNumber"));
});
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.AutoCompleteBehavior, {"completionInterval":10,"completionListCssClass":"emailSearchResults","completionListElementID":"xxx","completionListItemCssClass":"emailSearchItem","completionSetCount":20,"contextKey":"2355||2709","delimiterCharacters":";,:","highlightedItemCssClass":"emailSearchHighlightedItem","id":"ctl00_llee_emailReceipt_searchTenantEmail","minimumPrefixLength":2,"serviceMethod":"GetEmailSuggestions","servicePath":"/landlord.php","useContextKey":true}, {"itemSelected":SetEmailChoice_ctl00_llee}, null, $get("ctl00_llee_emailReceipt_txtEmailAddress"));
});
Sys.Application.add_init(function() {
    $create(AjaxControlToolkit.AutoCompleteBehavior, {"completionInterval":10,"completionListCssClass":"searchResultsBox_Alt","completionListElementID":"xxx","completionListItemCssClass":"searchResultsItem_Alt","completionSetCount":20,"contextKey":"2355||2709","delimiterCharacters":";,:","highlightedItemCssClass":"searchResultsHighlightedItem_Alt","id":"ctl00_llee_searchTenantProp","minimumPrefixLength":2,"serviceMethod":"GetCollectPaymentSuggestions","servicePath":"/CollectPayment.php2","useContextKey":true}, {"itemSelected":SetSelectedSearchChoice}, null, $get("ctl00_llee_txtSelectTenantOrProp"));
});
//]]>
</script>
<input name="hiddenInputToUpdateATBuffer_CommonToolkitScripts" id="hiddenInputToUpdateATBuffer_CommonToolkitScripts" value="1" type="hidden"><div id="fancybox-tmp"></div><div id="fancybox-loading"><div></div></div><div id="fancybox-overlay"></div><div id="fancybox-wrap"><div id="fancybox-outer"><div class="fancy-bg" id="fancy-bg-n"></div><div class="fancy-bg" id="fancy-bg-ne"></div><div class="fancy-bg" id="fancy-bg-e"></div><div class="fancy-bg" id="fancy-bg-se"></div><div class="fancy-bg" id="fancy-bg-s"></div><div class="fancy-bg" id="fancy-bg-sw"></div><div class="fancy-bg" id="fancy-bg-w"></div><div class="fancy-bg" id="fancy-bg-nw"></div><div id="fancybox-inner"></div><a id="fancybox-close"></a><a href="javascript:;" id="fancybox-left"><span class="fancy-ico" id="fancybox-left-ico"></span></a><a href="javascript:;" id="fancybox-right"><span class="fancy-ico" id="fancybox-right-ico"></span></a></div></div><input value="1_32,1_61,2_22,2_29,1_36,1_41,2_21,1_54,1_51,2_16" name="DXScript" type="hidden"><span style="display: none ! important;"><input value="" id="__EVENTTARGET" name="__EVENTTARGET" type="hidden"></span><span style="display: none ! important;"><input value="" id="__EVENTARGUMENT" name="__EVENTARGUMENT" type="hidden"></span><span style="display: none ! important;"><input value="" id="__LASTFOCUS" name="__LASTFOCUS" type="hidden"></span><span style="display: none ! important;"><input value="/wEPDwULLTE1NjExNDk0OTQPZBYCZg9kFgICAw8WAh4Kb25LZXlQcmVzcwUxamF2YXNjcmlwdDppZiAoZXZlbnQua2V5Q29kZSA9PSAxMykgcmV0dXJuIGZhbHNlOxYWAgMPFgQeDVVzZUNvbnRleHRLZXlnHgpDb250ZXh0S2V5BQoyMzU1fHwyNzA5ZAIJDxYCHgRUZXh0BV48YSBocmVmPSIjbW9kYWxVc2VyU2V0dGluZ3MiIGNsYXNzPSJtb2RhbC1saW5rIiBvbmNsaWNrPSJsb2FkVXNlclNldHRpbmdzKDI3MDkpOyI+U2V0dGluZ3M8L2E+ZAILDw8WAh8DBQR3ZXJlZGQCDQ8PFgIfAwUPcGFsdGVjaCBzeXN0ZW1zZGQCDw8WAh8DBVlDdXJyZW50bHkgbG9nZ2VkIGluIGFzIGFuIDxhIGhyZWY9JyNtb2RhbFVzZXJSb2xlVHlwZXMnIGNsYXNzPSdtb2RhbC1saW5rJz5BZG1pbiBVc2VyPC9hPmQCEQ8PFgIeCEltYWdlVXJsBRppbWFnZXMvMTIzbGFuZGxvcmRsb2dvLnBuZ2RkAhsPFgIeBWNsYXNzBQZhY3RpdmVkAicPZBYQAgEPEA8WBh4NRGF0YVRleHRGaWVsZAUDS2V5Hg5EYXRhVmFsdWVGaWVsZAUFVmFsdWUeC18hRGF0YUJvdW5kZ2QQFQIJTGFzdCBOYW1lCkZpcnN0IE5hbWUVAghMYXN0TmFtZQlGaXJzdE5hbWUUKwMCZ2dkZAIDDxAPFgYfBgUDS2V5HwcFBVZhbHVlHwhnZBAVBg1Qcm9wZXJ0eSBOYW1lCUFkZHJlc3MgMQlBZGRyZXNzIDIEQ2l0eQRTaXplCEJ1aWxkaW5nFQYMUHJvcGVydHlOYW1lCEFkZHJlc3MxCEFkZHJlc3MyBENpdHkKU3F1YXJlRmVldBVCdWlsZGluZy5CdWlsZGluZ05hbWUUKwMGZ2dnZ2dnZGQCGw8QDxYCHwhnZBAVQwAHQWxhYmFtYQZBbGFza2EHQXJpem9uYQhBcmthbnNhcwpDYWxpZm9ybmlhCENvbG9yYWRvC0Nvbm5lY3RpY3V0CERlbGF3YXJlFERpc3RyaWN0IG9mIENvbHVtYmlhB0Zsb3JpZGEHR2VvcmdpYQZIYXdhaWkFSWRhaG8ISWxsaW5vaXMHSW5kaWFuYQRJb3dhBkthbnNhcwhLZW50dWNreQlMb3Vpc2lhbmEFTWFpbmUITWFyeWxhbmQNTWFzc2FjaHVzZXR0cwhNaWNoaWdhbglNaW5uZXNvdGELTWlzc2lzc2lwcGkITWlzc291cmkHTW9udGFuYQhOZWJyYXNrYQZOZXZhZGENTmV3IEhhbXBzaGlyZQpOZXcgSmVyc2V5Ck5ldyBNZXhpY28ITmV3IFlvcmsOTm9ydGggQ2Fyb2xpbmEMTm9ydGggRGFrb3RhBE9oaW8IT2tsYWhvbWEGT3JlZ29uDFBlbm5zeWx2YW5pYQxSaG9kZSBJc2xhbmQOU291dGggQ2Fyb2xpbmEMU291dGggRGFrb3RhCVRlbm5lc3NlZQVUZXhhcwRVdGFoB1Zlcm1vbnQIVmlyZ2luaWEKV2FzaGluZ3Rvbg1XZXN0IFZpcmdpbmlhCVdpc2NvbnNpbgdXeW9taW5nB0FsYmVydGEQQnJpdGlzaCBDb2x1bWJpYQhNYW5pdG9iYQ1OZXcgQnJ1bnN3aWNrDE5ld2ZvdW5kbGFuZAhMYWJyYWRvcgtOb3ZhIFNjb3RpYQdPbnRhcmlvFFByaW5jZSBFZHdhcmQgSXNsYW5kBlF1ZWJlYwxTYXNrYXRjaGV3YW4VTm9ydGh3ZXN0IFRlcnJpdG9yaWVzB051bmF2dXQFWXVrb24HIE90aGVyIBVDAAdBbGFiYW1hBkFsYXNrYQdBcml6b25hCEFya2Fuc2FzCkNhbGlmb3JuaWEIQ29sb3JhZG8LQ29ubmVjdGljdXQIRGVsYXdhcmUURGlzdHJpY3Qgb2YgQ29sdW1iaWEHRmxvcmlkYQdHZW9yZ2lhBkhhd2FpaQVJZGFobwhJbGxpbm9pcwdJbmRpYW5hBElvd2EGS2Fuc2FzCEtlbnR1Y2t5CUxvdWlzaWFuYQVNYWluZQhNYXJ5bGFuZA1NYXNzYWNodXNldHRzCE1pY2hpZ2FuCU1pbm5lc290YQtNaXNzaXNzaXBwaQhNaXNzb3VyaQdNb250YW5hCE5lYnJhc2thBk5ldmFkYQ1OZXcgSGFtcHNoaXJlCk5ldyBKZXJzZXkKTmV3IE1leGljbwhOZXcgWW9yaw5Ob3J0aCBDYXJvbGluYQxOb3J0aCBEYWtvdGEET2hpbwhPa2xhaG9tYQZPcmVnb24MUGVubnN5bHZhbmlhDFJob2RlIElzbGFuZA5Tb3V0aCBDYXJvbGluYQxTb3V0aCBEYWtvdGEJVGVubmVzc2VlBVRleGFzBFV0YWgHVmVybW9udAhWaXJnaW5pYQpXYXNoaW5ndG9uDVdlc3QgVmlyZ2luaWEJV2lzY29uc2luB1d5b21pbmcHQWxiZXJ0YRBCcml0aXNoIENvbHVtYmlhCE1hbml0b2JhDU5ldyBCcnVuc3dpY2sMTmV3Zm91bmRsYW5kCExhYnJhZG9yC05vdmEgU2NvdGlhB09udGFyaW8UUHJpbmNlIEVkd2FyZCBJc2xhbmQGUXVlYmVjDFNhc2thdGNoZXdhbhVOb3J0aHdlc3QgVGVycml0b3JpZXMHTnVuYXZ1dAVZdWtvbgcgT3RoZXIgFCsDQ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dkZAIdDxAPFgYfBwUTU3VwcG9ydGVkQ3VycmVuY3lJRB8GBQhMb25nRm9ybR8IZ2QQFQkTVVNBL0NhbmFkYSBEb2xsYXIgJAtFVSBFdXJvIOKCrCBHcmVhdCBCcml0YWluIFBvdW5kcyBTdGVybGluZyDCoxFEZW5tYXJrIEtyb25lciBrchdDaGluYS9KYXBhbiBZZW4vWXVhbiDCpRNTb3V0aCBBZnJpY2EgUmFuZCBSFFBoaWxpcHBpbmVzIFBlc28gUGhwEFVBRSBEaXJoYW0g2K8u2KUPTWV4aWNvIFBlc28gTVhOFQkBMgEzATQCMTICMTMCMTUCMTYCMTcCMTgUKwMJZ2dnZ2dnZ2dnZGQCNQ9kFgJmD2QWAgIBDxBkEBUCIlVzZXIgQWNjb3VudDogYmVuYXJkd2VyZUB5YWhvby5jb20lQmlsbGluZyBBY2NvdW50OiBiZW5hcmR3ZXJlQHlhaG9vLmNvbRUCBFVTRVIHQUNDT1VOVBQrAwJnZ2RkAkEPDxYCHwQFD2ltYWdlcy9sb2NrLnBuZ2RkAkMPDxYCHwMFJkN1cnJlbnRseSBicm93c2luZyBpbiBzZWN1cmUgU1NMIG1vZGUuZGQCRQ8PFgIfAwUZU3dpdGNoIHRvIHVuc2VjdXJlZCBtb2RlLmRkAisPZBYCAgEPZBYCZg9kFgQCAQ8QDxYGHwcFB093bmVySUQfBgUJT3duZXJOYW1lHwhnZBAVAQROb25lFQEETm9uZRQrAwFnZGQCBw8PFgQfAwVAQWRtaW5pc3RyYXRvcnMgY2FuIGFkZCwgZWRpdCwgJiBkZWxldGUgb3duZXJzIG9uIHRoZSBhZG1pbiBwYWdlLh4HVmlzaWJsZWhkZAIvDw8WAh4NTXNnUmVjaXBpZW50czLZBAABAAAA/////wEAAAAAAAAABAEAAADhAVN5c3RlbS5Db2xsZWN0aW9ucy5HZW5lcmljLkRpY3Rpb25hcnlgMltbU3lzdGVtLkludDMyLCBtc2NvcmxpYiwgVmVyc2lvbj0yLjAuMC4wLCBDdWx0dXJlPW5ldXRyYWwsIFB1YmxpY0tleVRva2VuPWI3N2E1YzU2MTkzNGUwODldLFtTeXN0ZW0uU3RyaW5nLCBtc2NvcmxpYiwgVmVyc2lvbj0yLjAuMC4wLCBDdWx0dXJlPW5ldXRyYWwsIFB1YmxpY0tleVRva2VuPWI3N2E1YzU2MTkzNGUwODldXQMAAAAHVmVyc2lvbghDb21wYXJlcghIYXNoU2l6ZQADAAiRAVN5c3RlbS5Db2xsZWN0aW9ucy5HZW5lcmljLkdlbmVyaWNFcXVhbGl0eUNvbXBhcmVyYDFbW1N5c3RlbS5JbnQzMiwgbXNjb3JsaWIsIFZlcnNpb249Mi4wLjAuMCwgQ3VsdHVyZT1uZXV0cmFsLCBQdWJsaWNLZXlUb2tlbj1iNzdhNWM1NjE5MzRlMDg5XV0IAAAAAAkCAAAAAAAAAAQCAAAAkQFTeXN0ZW0uQ29sbGVjdGlvbnMuR2VuZXJpYy5HZW5lcmljRXF1YWxpdHlDb21wYXJlcmAxW1tTeXN0ZW0uSW50MzIsIG1zY29ybGliLCBWZXJzaW9uPTIuMC4wLjAsIEN1bHR1cmU9bmV1dHJhbCwgUHVibGljS2V5VG9rZW49Yjc3YTVjNTYxOTM0ZTA4OV1dAAAAAAtkFgQCBA8WAh8DBUlBZG1pbiB1c2VycyBjYW4gYWRkIG5ldyB1c2VycyBvbiB0aGUgPGEgaHJlZj0nQWRtaW4uYXNweCc+QWRtaW4gcGFnZS48L2E+ZAIGDxAPFgYfBgUIRnVsbE5hbWUfBwUKU2l0ZVVzZXJJRB8IZ2QQFQIJQWxsIFVzZXJzC3dlcmUgYmVuYXJkFQIJQWxsIFVzZXJzBDI3MDkUKwMCZ2dkZAIxD2QWFAIBD2QWAmYPFgIeC18hSXRlbUNvdW50AgQWCGYPZBYCZg8VAgI0MzRIb3cgQ2FuIEkgU2VlIFdoYXQncyBDb2xsZWN0ZWQgJiBEdWUgRm9yIGEgRHVlIERhdGU/ZAIBD2QWAmYPFQICNDQbMiBXYXlzIHRvIENvbGxlY3QgTGF0ZSBGZWVzZAICD2QWAmYPFQICNDYbQ29sbGVjdGluZyBQYXJ0aWFsIFBheW1lbnRzZAIDD2QWAmYPFQICNjEURGlzY291bnRpbmcgUmVudCBEdWVkAgMPFgIfAwWMATxkaXYgY2xhc3M9ImN1cnJlbnRPd25lciI+PGEgaHJlZj0iI21vZGFsQ3VycmVudE93bmVyIiBjbGFzcz0ibW9kYWwtbGluayBmciIgb25jbGljaz0ibG9hZEN1cnJlbnRPd25lcigyNzA5KTsiPkN1cnJlbnQgT3duZXI6IE5vbmU8L2E+PC9kaXY+ZAIFDw8WAh8DBQ9Db2xsZWN0IFBheW1lbnRkZAIMD2QWAgIDD2QWAmYPZBYCAgUPPCsABQEADxYCHgVWYWx1ZQYAgEITZL/QCGRkAg4PDxYKHhJFbWFpbGVkVmVyc2lvblR5cGULKX5fMTIzTGFuZGxvcmQuQ2xhc3Nlcy5FbnVtZXJhdGlvbnMrUHJpbnRQcmV2aWV3UmVwb3J0VHlwZSwgMTIzTGFuZGxvcmQsIFZlcnNpb249MTIuMS4xOS4wLCBDdWx0dXJlPW5ldXRyYWwsIFB1YmxpY0tleVRva2VuPW51bGwRHhVlbWFpbFJlY2VpcHRFbWFpbE1vZGULKXdfMTIzTGFuZGxvcmQuQ2xhc3Nlcy5FbnVtZXJhdGlvbnMrRW1haWxTY3JlZW5Nb2RlLCAxMjNMYW5kbG9yZCwgVmVyc2lvbj0xMi4xLjE5LjAsIEN1bHR1cmU9bmV1dHJhbCwgUHVibGljS2V5VG9rZW49bnVsbAMeDFRvUmVjaXBpZW50czL+AgABAAAA/////wEAAAAAAAAADAIAAABEMTIzTGFuZGxvcmQsIFZlcnNpb249MTIuMS4xOS4wLCBDdWx0dXJlPW5ldXRyYWwsIFB1YmxpY0tleVRva2VuPW51bGwEAQAAAI4BU3lzdGVtLkNvbGxlY3Rpb25zLkdlbmVyaWMuTGlzdGAxW1tfMTIzTGFuZGxvcmQuQ2xhc3Nlcy5FbWFpbFJlY2lwaWVudCwgMTIzTGFuZGxvcmQsIFZlcnNpb249MTIuMS4xOS4wLCBDdWx0dXJlPW5ldXRyYWwsIFB1YmxpY0tleVRva2VuPW51bGxdXQMAAAAGX2l0ZW1zBV9zaXplCF92ZXJzaW9uBAAAJV8xMjNMYW5kbG9yZC5DbGFzc2VzLkVtYWlsUmVjaXBpZW50W10CAAAACAgJAwAAAAAAAAAAAAAABwMAAAAAAQAAAAAAAAAEI18xMjNMYW5kbG9yZC5DbGFzc2VzLkVtYWlsUmVjaXBpZW50AgAAAAseDENDUmVjaXBpZW50czL+AgABAAAA/////wEAAAAAAAAADAIAAABEMTIzTGFuZGxvcmQsIFZlcnNpb249MTIuMS4xOS4wLCBDdWx0dXJlPW5ldXRyYWwsIFB1YmxpY0tleVRva2VuPW51bGwEAQAAAI4BU3lzdGVtLkNvbGxlY3Rpb25zLkdlbmVyaWMuTGlzdGAxW1tfMTIzTGFuZGxvcmQuQ2xhc3Nlcy5FbWFpbFJlY2lwaWVudCwgMTIzTGFuZGxvcmQsIFZlcnNpb249MTIuMS4xOS4wLCBDdWx0dXJlPW5ldXRyYWwsIFB1YmxpY0tleVRva2VuPW51bGxdXQMAAAAGX2l0ZW1zBV9zaXplCF92ZXJzaW9uBAAAJV8xMjNMYW5kbG9yZC5DbGFzc2VzLkVtYWlsUmVjaXBpZW50W10CAAAACAgJAwAAAAAAAAAAAAAABwMAAAAAAQAAAAAAAAAEI18xMjNMYW5kbG9yZC5DbGFzc2VzLkVtYWlsUmVjaXBpZW50AgAAAAseDUJDQ1JlY2lwaWVudHMy/gIAAQAAAP////8BAAAAAAAAAAwCAAAARDEyM0xhbmRsb3JkLCBWZXJzaW9uPTEyLjEuMTkuMCwgQ3VsdHVyZT1uZXV0cmFsLCBQdWJsaWNLZXlUb2tlbj1udWxsBAEAAACOAVN5c3RlbS5Db2xsZWN0aW9ucy5HZW5lcmljLkxpc3RgMVtbXzEyM0xhbmRsb3JkLkNsYXNzZXMuRW1haWxSZWNpcGllbnQsIDEyM0xhbmRsb3JkLCBWZXJzaW9uPTEyLjEuMTkuMCwgQ3VsdHVyZT1uZXV0cmFsLCBQdWJsaWNLZXlUb2tlbj1udWxsXV0DAAAABl9pdGVtcwVfc2l6ZQhfdmVyc2lvbgQAACVfMTIzTGFuZGxvcmQuQ2xhc3Nlcy5FbWFpbFJlY2lwaWVudFtdAgAAAAgICQMAAAAAAAAAAAAAAAcDAAAAAAEAAAAAAAAABCNfMTIzTGFuZGxvcmQuQ2xhc3Nlcy5FbWFpbFJlY2lwaWVudAIAAAALZBYEZg9kFgJmD2QWCgILDxYCHwtmZAINDxYCHwtmZAIPDxYCHwtmZAITDw8WBh8DBQxEb2N1bWVudC5wZGYeC05hdmlnYXRlVXJsZR4GVGFyZ2V0BQZfYmxhbmtkZAIhDxYGHwFnHhRPbkNsaWVudEl0ZW1TZWxlY3RlZAUZU2V0RW1haWxDaG9pY2VfY3RsMDBfbGxlZR8CBQoyMzU1fHwyNzA5ZAIDDxBkEBUCIlVzZXIgQWNjb3VudDogYmVuYXJkd2VyZUB5YWhvby5jb20lQmlsbGluZyBBY2NvdW50OiBiZW5hcmR3ZXJlQHlhaG9vLmNvbRUCBFVTRVIHQUNDT1VOVBQrAwJnZ2RkAhAPZBYCZg9kFgQCAw8WAh8LAgEWAmYPZBYCZg8VCAALd2VyZSBiZW5hcmQDYWxpIG5haXJvYmkga2VueWE8YnIgLz5QYWxvIEFsdG8gS1kgBTE2ODY0CDA5OTMyNTUxCTgwMDk3MjU1NABkAgUPFgIfCwIBFgJmD2QWAmYPFQsHbXV2dWxpICBuYWlyb2JpIGtlbnlhPGJyIC8+UGFsbyBBbHRvIEtZIAokMTIsMDAwLjAwB01vbnRobHkKJDEyLDAwMC4wMAtEZWMgMDUgMjAxMwtKYW4gMDUgMjAxNAZEZWMgMDUETm9uZQROb25lBTEzMDAwZAISD2QWAmYPZBYGAgEPFgIfAwV9PGxpIGNsYXNzPSdjZW50ZXInPjxhIGhyZWY9J0xlYXNlcy5hc3B4P3NyYz1UZW5hbnRzLmFzcHgmbD0xMjg4MycgdGl0bGU9J01ha2UgY2hhbmdlcyB0byB0aGlzIGxlYXNlJz5FZGl0IFRoaXMgTGVhc2U8L2E+PC9saT5kAgMPFgIfAwWpATxsaSBjbGFzcz0nY2VudGVyJz48YSB0YXJnZXQ9J19ibGFuaycgaHJlZj0nUGF5bWVudEhpc3RvcnkuYXNweD8mdD0xNjg2NCZzZWM9MicgdGl0bGU9J1ZpZXcgdGhlIGVudGlyZSBwYXltZW50IGhpc3RvcnkgZm9yIHRoaXMgdGVuYW50Jz5Db21wbGV0ZSBQYXltZW50IEhpc3Rvcnk8L2E+PC9saT5kAgUPFgIfAwWXATxsaSBjbGFzcz0nY2VudGVyJz48YSB0YXJnZXQ9J19ibGFuaycgaHJlZj0nUGF5bWVudEhpc3RvcnkuYXNweD8mdD0xNjg2NCZzZWM9MScgdGl0bGU9J1ZpZXcgYWxsIHBheW1lbnRzIGR1ZSBmb3IgdGhpcyB0ZW5hbnQnPkFsbCBQYXltZW50cyBEdWU8L2E+PC9saT5kAhQPFgIfCWgWBAIBDw9kFgIfAAVRamF2YXNjcmlwdDppZiAoZXZlbnQua2V5Q29kZSA9PSAxMykgX19kb1Bvc3RCYWNrKCdjdGwwMCRsbGVlJGxua0ZpbmROZXdMZWFzZScsJycpZAIFDxYEHwFnHwIFCjIzNTV8fDI3MDlkAhYPFgIfCWcWBgIBDw9kFgIfAAVTamF2YXNjcmlwdDppZiAoZXZlbnQua2V5Q29kZSA9PSAxMykgX19kb1Bvc3RCYWNrKCdjdGwwMCRsbGVlJGxua0ZpbmRUZW5hbnRQcm9wJywnJylkAgUPFgQfAWcfAgUKMjM1NXx8MjcwOWQCBw9kFgJmD2QWBAIBDxYCHwlnZAIDDxYCHwloFgICAQ8WAh8LAgEWBGYPZBYCAgEPDxYCHg9Db21tYW5kQXJndW1lbnQFBTEyODgzZBYCZg8VBA93ZXJlIGJlbmFyZCBhbGkAB211dnVsaSANbmFpcm9iaSBrZW55YWQCAQ9kFgICAQ8WAh8JaGQCGA9kFgJmD2QWAgIBDw8WAh8JZ2QWFgIBDw8WAh8JaGRkAgMPEA8WBh8GBQtEZXNjcmlwdGlvbh8HBRFPdGhlckNoYXJnZVR5cGVJRB8IZ2QQFUUEUmVudAhMYXRlIEZlZQxBY3Rpdml0eSBGZWUSQWRtaW5pc3RyYXRpb24gRmVlD0FwcGxpY2F0aW9uIEZlZQlCYWNrIFJlbnQMQmFuayBDaGFyZ2VzDENsZWFuaW5nIEZlZRFDb21tb24gQXJlYSBNYWludBNDb21wbGlhbmNlIERpc2NvdW50DENvc2lnbmVyIEZlZQxEZWZlcnJhbCBGZWULRGVwb3NpdCBGZWUVRWFybHkgVGVybWluYXRpb24gRmVlDkVxdWl0eSBQYXltZW50CkdhcmFnZSBGZWUHSE9BIEZlZQtIb2xkaW5nIEZlZQxIb2xkb3ZlciBGZWUJSW5zdXJhbmNlFUp1ZGdlbWVudCBJbnN0YWxsbWVudAtLZXkgRGVwb3NpdBNLZXkgUmVwbGFjZW1lbnQgRmVlF0xlYXNlIFJlaW5zdGF0ZW1lbnQgRmVlCkxlZ2FsIEZlZXMLTG9ja291dCBGZWUPTWFpbnRlbmFuY2UgRmVlDk1hbmFnZW1lbnQgRmVlDU1pc2NlbGxhbmVvdXMOTW9udGggdG8gTW9udGgITW9ydGdhZ2ULTW92ZSBJbiBGZWUHTlNGIEZlZQ5PcHRpb24gUGF5bWVudAtQYXJraW5nIEZlZRdQYXJraW5nIEZlZSwgRWxlY3RyaWNhbBNQYXJraW5nIEZlZSwgSGVhdGVkC1BldCBEZXBvc2l0B1BldCBGZWUHUGV0IEZlZRlQSEEgKFB1YmxpYyBIb3VzaW5nIEF1dGgpDFByZXBhaWQgUmVudA1Qcm9yYXRlZCBSZW50GlJlbnQgZnJvbSBTZWNvbmRhcnkgVGVuYW50ClJlcGFpciBGZWUOUmV0dXJuZWQgQ2hlY2sJU2VjdGlvbiA4EVNlY3Rpb24tOCBQb3J0aW9uEFNlY3VyaXR5IERlcG9zaXQLU3RvcmFnZSBGZWUFVGF4ZXMKVGF4ZXM6IEdvdgtUcmlwIENoYXJnZQdVdGlsaXR5EVV0aWxpdHk6IEFpciBDb25kDlV0aWxpdHk6IENhYmxlEFV0aWxpdHk6IERlcG9zaXQRVXRpbGl0eTogRWxlY3RyaWMMVXRpbGl0eTogR2FzEFV0aWxpdHk6IEdlbmVyYWwRVXRpbGl0eTogSW50ZXJuZXQTVXRpbGl0eTogSmFuaXRvcmlhbA5VdGlsaXR5OiBTZXdlchJVdGlsaXR5OiBUZWxlcGhvbmUZVXRpbGl0eTogVHJhc2ggQ29sbGVjdGlvbg5VdGlsaXR5OiBXYXRlcgtXYXJyYW50IEZlZRJXYXNoZXIgTWFjaGluZSBGZWUMV2F0ZXIgQ2hhcmdlFUUEUmVudAhMYXRlIEZlZQIzNwI2NgIxMQIyNwI1OQI1MQI2MAI2NAI2NQIzNgI1NAI0MQI2MQEyAjM4AjM5AjcwAjEzAjY4ATUBNgIzMwIzMAI1NQIxNAI2MwE5AjMxAjI5AjQ3AjE4AjQwATECMzUCMzQCNDMCNjkBOAI0NgI1NgIxNQI1OAI1MgIyOAI0NQIxNwIxMAEzAjEyAjUzAjQ5AjQyAjU3AjI0AjE5AjIyAjIwATQCMjUCNTACMjMCMjYCNDQCMjECMzICNjIBNxQrA0VnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2cWAWZkAgUPEA8WCB8HBQdEdWVEYXRlHwYFB0R1ZURhdGUeFERhdGFUZXh0Rm9ybWF0U3RyaW5nBQ97MDpNTU0tZGQteXl5eX0fCGcWAh4Ib25jaGFuZ2UFM1Nob3dIaWRlTWFudWFsQ2hhcmdlVUkoKTtTZXRTZWxlY3RlZFJlbnRhbEFtb3VudCgpOxAVAgtEZWMtMDUtMjAxMxVNYW51YWwgQ2hhcmdlIFBheW1lbnQVAhUxMi81LzIwMTMgMTI6MDA6MDAgQU0NTWFudWFsIENoYXJnZRQrAwJnZ2RkAgkPEA8WBh8HBQdEdWVEYXRlHwYFB1JlbnREdWUfCGdkEBUBBTEyMDAwFQEVMTIvNS8yMDEzIDEyOjAwOjAwIEFNFCsDAWdkZAINDxYCHgVzdHlsZQUTdmlzaWJpbGl0eTp2aXNpYmxlO2QCEQ88KwAFAQAPFgQeFUNsaWVudFZpc2libGVJbnRlcm5hbGgfDAYAiBj8jb/QiGRkAhMPPCsABQEADxYCHwwGZTx7LLu/0IhkZAIbD2QWAmYPZBYKAgEPDxYCHwMFH1BheW1lbnQgSGlzdG9yeSBmb3IgRGVjLTA1LTIwMTNkZAIDDxYCHwtmFgICAQ8WAh8JaBYCAgMPDxYCHwMFBSQwLjAwZGQCBw8PFgIfAwUdQmFsYW5jZSBPd2luZyBmb3IgRGVjLTA1LTIwMTNkZAIJDxYCHwsCARYEAgEPZBYCAgYPFQUEUmVudAokMTIsMDAwLjAwATAFJDAuMDAKJDEyLDAwMC4wMGQCAg9kFgICAw8PFgIfAwUKJDEyLDAwMC4wMGRkAgsPFgIfCWhkAh0PDxYCHwMFI0xhdGUgRmVlcyAtIERpc2FibGVkIGZvciB0aGlzIExlYXNlZGQCHw8WAh8JaBYEZg9kFgJmD2QWAmYPFgIfGAUSdmlzaWJpbGl0eTpoaWRkZW47ZAIBD2QWBmYPZBYCAgEPFgIfGAUTdmlzaWJpbGl0eTp2aXNpYmxlOxYEAgEPDxYCHwloZGQCAw8QDxYEHgdDaGVja2VkaB8JaGRkZGQCAQ9kFgICAQ8WAh8YBRN2aXNpYmlsaXR5OnZpc2libGU7FgRmDw8WAh8JaGRkAgIPDxYEHwMFATAfCWhkZAICD2QWBGYPEA9kFgIfGAUTdmlzaWJpbGl0eTp2aXNpYmxlO2RkZAIBDxYCHxgFE3Zpc2liaWxpdHk6dmlzaWJsZTtkAiEPZBYCZg9kFhICAQ8QZBAVAQAVAQAUKwMBZ2RkAgMPFgQfAgUEMjM1NR8BZ2QCBQ8QZBAVAQAVAQAUKwMBZ2RkAgcPFgQfAWcfAgUEMjM1NWQCCQ8QZBAVAQAVAQAUKwMBZ2RkAgsPFgQfAgUEMjM1NR8BZ2QCDQ8QZBAVAQAVAQAUKwMBZ2RkAg8PFgQfAWcfAgUEMjM1NWQCEQ8QDxYGHwYFDlBlcmlvZEZ1bGxOYW1lHwcFEkFjY291bnRpbmdQZXJpb2RJRB8IZ2QQFQEETm9uZRUBBE5vbmUUKwMBZ2RkGAEFHl9fQ29udHJvbHNSZXF1aXJlUG9zdEJhY2tLZXlfXxYXBSNjdGwwMCRVc2VyU2V0dGluZ3MkY2hrTGF0ZVJlbnROb3RpZgUnY3RsMDAkVXNlclNldHRpbmdzJGNoa0xlYXNlRXhwaXJlZE5vdGlmBShjdGwwMCRVc2VyU2V0dGluZ3MkY2hrV29ya09yZGVyc0R1ZU5vdGlmBS1jdGwwMCRVc2VyU2V0dGluZ3MkY2hrV29ya09yZGVyc1JlY2VpdmVkTm90aWYFS2N0bDAwJGxsZWUkUmVjZWlwdEhlbHBlckZvcm0kY3RsUmV0dXJuQWRkcmVzc09wdGlvbnNNb2RhbCRvcHRVc2VCaWxsaW5nQWNjdAVFY3RsMDAkbGxlZSRSZWNlaXB0SGVscGVyRm9ybSRjdGxSZXR1cm5BZGRyZXNzT3B0aW9uc01vZGFsJG9wdE92ZXJyaWRlBUVjdGwwMCRsbGVlJFJlY2VpcHRIZWxwZXJGb3JtJGN0bFJldHVybkFkZHJlc3NPcHRpb25zTW9kYWwkb3B0T3ZlcnJpZGUFNGN0bDAwJGxsZWUkUmVjZWlwdEhlbHBlckZvcm0kY2hrU2hvd1NlY29uZGFyeVRlbmFudHMFS2N0bDAwJGxsZWUkSW52b2ljZUhlbHBlckZvcm0kY3RsUmV0dXJuQWRkcmVzc09wdGlvbnNNb2RhbCRvcHRVc2VCaWxsaW5nQWNjdAVFY3RsMDAkbGxlZSRJbnZvaWNlSGVscGVyRm9ybSRjdGxSZXR1cm5BZGRyZXNzT3B0aW9uc01vZGFsJG9wdE92ZXJyaWRlBUVjdGwwMCRsbGVlJEludm9pY2VIZWxwZXJGb3JtJGN0bFJldHVybkFkZHJlc3NPcHRpb25zTW9kYWwkb3B0T3ZlcnJpZGUFL2N0bDAwJGxsZWUkSW52b2ljZUhlbHBlckZvcm0kZHRtSW52b2ljZURhdGUkREREBTVjdGwwMCRsbGVlJEludm9pY2VIZWxwZXJGb3JtJGR0bUludm9pY2VEYXRlJERERCRDJEZOUAUxY3RsMDAkbGxlZSRJbnZvaWNlSGVscGVyRm9ybSRjaGtTaG93U2Vjb25kVGVuYW50cwUhY3RsMDAkbGxlZSRlbWFpbFJlY2VpcHQkY2hrQXV0b0NDBSJjdGwwMCRsbGVlJGVtYWlsUmVjZWlwdCRjaGtBdXRvQkNDBRVjdGwwMCRsbGVlJGJ0blBtdEhpc3QFGGN0bDAwJGxsZWUkY2hrRmxhZ0FzUGFpZAUiY3RsMDAkbGxlZSRkdG1NYW51YWxDaGFyZ2VEYXRlJERERAUoY3RsMDAkbGxlZSRkdG1NYW51YWxDaGFyZ2VEYXRlJERERCRDJEZOUAUfY3RsMDAkbGxlZSRkdG1SZWNlaXZlT25EYXRlJERERAUlY3RsMDAkbGxlZSRkdG1SZWNlaXZlT25EYXRlJERERCRDJEZOUAUtY3RsMDAkbGxlZSRkYXRhQmFsYW5jZXMkY3RsMDEkY2hrQmFsU2VsZWN0Um936fY/HZ3YUTx630Z9v+jFjyKDVtw=" id="__VIEWSTATE" name="__VIEWSTATE" type="hidden"></span><span style="display: none ! important;"><input value="0" id="__SCROLLPOSITIONX" name="__SCROLLPOSITIONX" type="hidden"></span><span style="display: none ! important;"><input value="0" id="__SCROLLPOSITIONY" name="__SCROLLPOSITIONY" type="hidden"></span></form> 
    
    <script type="text/javascript">
        var uvOptions = {};
        (function() {
            var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
            uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/lyhzpK4njWvtMSnvo08dA.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
        })();
    </script>
    
    
    


<div style="position: fixed; top: 0px; right: 11px; width: 155px; height: 1px; z-index: 2147483647;" id="dropdowndeals"><object id="dddContent" data="CollectPayment_files/DddWrapper.swf" style="outline: medium none; visibility: visible;" type="application/x-shockwave-flash" height="100%" width="100%"><param value="false" name="menu"><param value="always" name="allowScriptAccess"><param value="transparent" name="wmode"><param value="domain=app.123landlord.com&amp;protocol=https:&amp;clientId=41EDAEA5-9910-42E1-9B04-4BD94957E068&amp;appDomain=wac.edgecastcdn.net/800952/a1001&amp;serviceDomain=c.couponsvc.com&amp;spriteUrl=//wac.edgecastcdn.net/800952/30-www/Asset/App/Deals/Sprite&amp;helpLink=http://www.browsefox.com/Deals&amp;client=DealsBar&amp;changeHeightMethod=DealsBar.changeHeight&amp;changePositionMethod=DealsBar.changePosition" name="flashvars"></object></div></body></html>