<?php  include("modal_review.php"); ?> 
<?php include("modal_plans.php"); ?>
<?php include("modal_terms.php"); ?>
<?php include("modal_privacy.php"); ?>


 
	  <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

<!------ Datepicker -------->
<script src="js/bootstrap-datepicker.js"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-ui.js"></script>
    
    
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
	
	$('.date').datepicker({changeMonth: true, changeYear: true, altFormat: "DD, MM, YY"});
	$('.date1').datepicker({changeMonth: true, changeYear: true, dateFormat: "dd/mm/yy",maxDate:"-18Y"});
	$('.date2').datepicker({changeMonth: true, changeYear: true, dateFormat: "dd/mm/yy",maxDate:"0D"});
	$('.datepicker2').datepicker({"showOtherMonths": true, "selectOtherMonths": true});
	$('.datepicker3').datepicker({"showButtonPanel": true});
	$('.datepicker4').datepicker();
	$('.datepicker5').datepicker({changeMonth: true, changeYear: true});
	$('.datepicker6').datepicker({numberOfMonths: 3});
	$('.datepicker8').datepicker({showOn: "button", buttonImage: "calendar.gif", buttonImageOnly: true});
	
	$('.datepicker9').datepicker($.datepicker.regional['fr']);
	$('.datepicker10').datepicker({altField: ".datepicker10-2", altFormat: "DD, MM, yy"});
	$('.datepicker11').datepicker({ minDate: -20, maxDate: "+1M +10D" });
	$('.dateIcon').datepicker({changeMonth: true, changeYear: true, dateFormat: "dd/mm/yy"});
});
SyntaxHighlighter.all();
</script>

<script>
    $(document).ready(function($) {
	$(".loginLHS").height($(document).height());
    });
</script>



	<!-- chart js -->
	<script src="js/chartjs/chart.min.js"></script>

	<!-- bootstrap progress js -->
	<script src="js/progressbar/bootstrap-progressbar.min.js"></script>
	<script src="js/nicescroll/jquery.nicescroll.min.js"></script>

	<!-- icheck -->
	<script src="js/icheck/icheck.min.js"></script>

	<script src="js/custom.js"></script>



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

	

  <br class="clear" />


</body>

</html>
