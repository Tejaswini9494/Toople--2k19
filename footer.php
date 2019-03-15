<?php if($page!="index") { ?>
  </div> <!--midO ends-->
</div> <!--mid ends-->
<?php } ?>

<?php if($page=="index" || $page=="contact") { ?>
<!------------ Section 5 ------------>
<div class="container-fluid sec5">
  <div class="container">
	<div class="row">
	<div class="col-md-9">
		<h2 style="line-height:1.7;">Lets Discuss How We Can Work Together.<br>Email Us: enquiry@tooople.com</h2>
	</div>
	<div class="col-md-3 text-right">
		<div class="gap20"></div>
		<a href="contact.php"><button class="btn btnContact">Contact Us</button></a>
	</div>
	</div>
  </div>
</div> 
<?php } ?>

<div class="container-fluid footerO"> <!--footerO starts-->
  <div class="container">
	<div class="row">
	<!--<div class="col-md-2 col-sm-1">
		<h1><img src="images/favicon.ico" height="" width="83px"></h1>
	</div>
	<div class="col-md-2 col-sm-2">
		<div class="footBox">
			<h1>TOOOPLE</h1>
			<div class="gap10"></div>
		<!--
			<li><a href="index.php">Home</a></li>
			<li><a href="toocontents.php">Algorithm</a></li>
			<li><a href="tooprojects.php">Projects</a></li>
			<li><a href="about.php">About Us</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		-->
		<!--</div>
	</div>-->
	<!--<div class="gap20 yes600"></div>-->

	<div class="col-md-3 col-sm-4">
		<!--<div class="footBox">-->
		<div class="foot">
		<a href="contact.php">
			<h1>Contact Us</h1>
			<div class="gap10"></div>TOOOPLE Pte. Ltd.<br>
			<div class="footI"><i class="fa fa-location-arrow"></i></div><div class="footCT">#19-09, 5000C,</div>
			<div class="gap1"></div>

			<div class="footI">&emsp;</div><div class="footCT">Marine Parade Road</div>
			<div class="gap1"></div>

			<div class="footI">&emsp;</div><div class="footCT">Singapore, 449286</div>
			<div class="gap10"></div>
		</a>
			<a href="https://www.facebook.com/Tooople-1965214403529791/?modal=admin_todo_tour" target="_blank"><i class="fa fa-facebook"></i></a> &emsp;
			<a href="https://in.linkedin.com/company/tooople" target="_blank"><i class="fa fa-linkedin"></i></a> &emsp;
			<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>

			<div class="gap1"></div>
		</div>
	</div>
	<div class="gap20 yes600"></div>

	<div class="col-md-5 col-sm-5">
		<div class="footBox fb1">
		<a href="contact.php">
			TOOOPLE Digital Skills Pvt.Ltd.<br>
			<div class="footI"><i class="fa fa-location-arrow"></i></div><div class="footCT">16-11/741/D/193/6, FNO:302, Maruthi Classic,</div>
			<div class="gap1"></div>

			<div class="footI">&emsp;</div><div class="footCT">Salivahana Nagar,Saroor Nagar,P&T Colony</div>
			<div class="gap1"></div>

			<div class="footI">&emsp;</div><div class="footCT">Hyderabad,Telangana - 500060.</div>
			<div class="gap1"></div>
		</a>
		</div>
	</div>

	</div>
	<div class="gap30"></div>

	<div class="text-center">&copy; <?php echo date('Y'); ?> TOOOPLE Pte. Ltd.</div>
	<div class="gap1"></div>
  </div> <!--footer ends-->
</div> <!--footerO ends-->


<?php include("modal_startup.php"); ?>
<?php include("modal_success.php"); ?>
<?php include("modal_success1.php"); ?>
<?php include("modal_algosuccess.php"); ?>
<?php include("modal_contentsuccess.php"); ?>
<?php include("modal_regsuccess.php"); ?>
<?php include("modal_regList.php"); ?>
<?php include("modal_otlSuccess.php"); ?>
<?php include("modal_pwdSuccess.php"); ?>
<?php include("modal_assignsuccess.php"); ?>
<?php include("modal_mentor.php"); ?>




    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<!-- Tooltip & Popover -->
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

<script>
$(document).ready(function(){
  $('.dropdown-submenu > a.dropdown-toggle').on("click", function(e){
	//alert("Hiii");
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>


<script>
$(document).ready(function(){
var errmsg = "<?php echo $_SESSION['user_message'];?>";
//alert(errmsg);
if(errmsg!='') {
	$('#modal_success').modal('show');
	<?php $_SESSION['user_message']='';?>
}
});
</script>


<!------ Datepicker -------->
<script src="js/bootstrap-datepicker.js"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-ui.js"></script>

<!------ Timepicker -------->
<link type="text/css" href="css/bootstrap-timepicker.min.css" />
<script type="text/javascript" src="js/bootstrap-timepicker.min.js"></script>

<script type="text/javascript">
    $('.timepicker1').timepicker({
        template: false,
        showInputs: false,
	showSeconds: false,
        minuteStep: 15
    });
</script>

<!-------- Plug in validation ---------->
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" src="js/validation.js"></script>

<script>
$(function(){
	$.datepicker.setDefaults({
		"prevText" : '&#x3c;',
		"nextText" : '&#x3e;',
		"beforeShow": function(i, o){
			$(o.dpDiv).addClass('panel panel-default');
		}
	});

	$.datepicker.__generateHTML = $.datepicker._generateHTML;
	$.datepicker._generateHTML = function(inst){
		return '<div class="panel-body">'
			+ $.datepicker.__generateHTML(inst)
				.replace(/<table/g, '<table style="width:200px;"')
				.replace('ui-datepicker-prev', 'pull-left btn btn-default btn-sm')
				.replace('ui-datepicker-next', 'pull-right btn btn-default btn-sm')
				.replace('ui-datepicker-title', 'text-center')
				.replace('ui-state-default ui-state-active', 'btn btn-primary btn-block btn-xs')
				.replace(/ui-state-default ui-priority-secondary/g, 'btn btn-info btn-block btn-xs')
				.replace(/ui-state-default/g, 'btn btn-link btn-block btn-xs')
				.replace(/ui-datepicker-group/g, 'pull-left')
			+ '</div>';
	}
	
	$('.dateDefault').datepicker({changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy"});

	$('.dateDefault1').datepicker({minDate: 0, changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy"});

	//$('.date').datepicker({changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy"});
	 $('.date1').datepicker({changeMonth: true, changeYear: true, dateFormat:"dd/mm/yy", minDate: "-100Y", maxDate: "-18Y", yearRange: "-100:+0" }); 
	//$('.date1').datepicker({changeMonth: true, changeYear: true, dateFormat: "dd/mm/yy",maxDate:"-18Y", yearRange: "1900:2017"});
	$('.date2').datepicker({changeMonth: true, changeYear: true, dateFormat: "dd/mm/yy",maxDate:"0D", yearRange: "1900:2017"});
	$('.datepicker2').datepicker({"showOtherMonths": true, "selectOtherMonths": true});
	$('.datepicker3').datepicker({"showButtonPanel": true});
	$('.datepicker4').datepicker();
	$('.datepicker5').datepicker({changeMonth: true, changeYear: true});
	$('.datepicker6').datepicker({numberOfMonths: 3});
	$('.datepicker8').datepicker({showOn: "button", buttonImage: "calendar.gif", buttonImageOnly: true});
	
	$('.datepicker9').datepicker($.datepicker.regional['fr']);
	$('.datepicker10').datepicker({altField: ".datepicker10-2", altFormat: "DD, MM, yy"});
	$('.datepicker11').datepicker({ minDate: -20, maxDate: "+1M +10D" });
});
SyntaxHighlighter.all();
</script>


<!-- Grid Table -->
	<link href="css/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
	<script type="text/javascript" src="js/moment.min.js"></script>
	<script type="text/javascript" src="js/datetime-moment.js"></script>
	<script>
		$(document).ready(function() {
			$('#dataTable').dataTable();
		        setTimeout("hidemessage();",3000); 
		        $("#dataTable_filter").hide();
		        
		} );  
	</script>



	<script type="text/javascript" src="js/jquery.validate.php"></script>
	<script type="text/javascript" src="js/additional-methods.js"></script>
<script type="text/javascript" src="js/validation.js"></script>


<!-- Perfect Scroll -->

<link href="css/perfect-scrollbar.css" rel="stylesheet">
<script src="js/perfect-scrollbar.js"></script>

<script>
$(document).ready(function ($) {
	$('.perfectScroll').perfectScrollbar();
});
</script>


<!-- Start of   HubSpot   Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="// js.hs-scripts.com/2054276.js"></script>
<!-- End of   HubSpot  Embed Code -->


</body>
</html>
