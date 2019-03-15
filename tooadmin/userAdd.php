<?php 
$page="userAdd";
include("header.php");
?> 

<?php if($_SESSION["usertype"]==1) { ?>
<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a>My Profile &raquo; Edit</h3>
<?php } else{?>

<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a>Students Managment &raquo; Add / Edit</h3>
<?php } ?>


<div class="gap10"></div>
  
<div class="animated fadeInUp">
<!-------------- Hide the Select Box     ------------------------->
<div class="item1 hidden">
	<div class="gap20"></div>
	<div class="form-group">
		<label class="col-sm-3 text-right">Are You? <span class="red">*</span></label>
		<div class="col-sm-9">
			<select required="required" class="form-control" id="usertype" name="usertype">
				<option value="">Select</option>		
				<option value="1">Project Student</option>
				<option value="2">Intern Student</option>
				<option value="3">Mentor</option>
				<option value="4">Content Provider</option>
				<option value="5">Representative of Customer Organization</option>
				<option value="6">Representative of Service Provider Organization</option>
				<option value="7">Representative of Recruiting Organization</option>
				<option value="8">Representative of Internship Organization</option>
			</select>
		</div>
		<div class="gap1"></div>
	</div>
	<div class="gap10"></div>
</div>
<div class="gap30"></div>


<!----------- Type 1, 2, 3 ------------>
<div id="ut123">
	<?php include("in_ut123.php"); ?>
</div>
<!-----------/ Type 1, 2, 3 ------------>

<!----------- Type 5 ------------>
<div id="ut5" style="display:none;">
	<?php include("in_ut5.php"); ?>
</div>
<!-----------/ Type 5 ------------>

<!----------- Type 6 ------------>
<div id="ut6" style="display:none;">
	<?php include("in_ut6.php"); ?>
</div>
<!-----------/ Type 6 ------------>

<div class="gap30"></div>
</div>
    <!--inner  /-->


<?php  include("footer.php"); ?>

<!------ User Type ----->
<script>
$(document).ready(function(){
	$("#usertype").on('change', function(){
		$vl=$(this).val();
		if($vl<=3) {
			document.getElementById("ut123").style.display="block";
			document.getElementById("ut5").style.display="none";
			document.getElementById("ut6").style.display="none";
		}
		if($vl==5) {
			document.getElementById("ut123").style.display="none";
			document.getElementById("ut5").style.display="block";
			document.getElementById("ut6").style.display="none";
		}
		if($vl==6) {
			document.getElementById("ut123").style.display="none";
			document.getElementById("ut5").style.display="none";
			document.getElementById("ut6").style.display="block";
		}
	});
});
</script>

