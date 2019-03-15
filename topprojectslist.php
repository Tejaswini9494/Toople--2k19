<?php
$page="my Student";
$title="Top Student";
$ses='no';
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

include("header.php");

include("toppro.php");

if(isset($search_submit))
{
	$qry='';
	if($search_name!='' || $search_duration!='' || $search_tech!=''){
	$qry.=" AND name LIKE '%".$search_name."%' AND duration LIKE '%".$search_duration."%'  AND dev_platform LIKE '%".$search_tech."%'";
	}

}else{
$qry='';
}

$sql1="select name,duration,dev_platform,rank from topprojects where id!='' $qry ORDER BY rank DESC";
$stmnt1=$mysqli->prepare($sql1);
$stmnt1->execute();
$stmnt1->store_result();
$stmnt1->bind_result($name,$duration,$dev_platform,$rank);



 ?>
<h3 class="">Top Projects</h3>
<div class="gap20"></div>
<div class="well1 filterBox">

	<form id="frm1" method="POST" enctype="multipart/form-data">
	<div class="col-md-3 col-sm-6">
		<input name="search_name" id="search_name" class="form-control" placeholder="Project Name" type="text" value="<?php echo $search_name; ?>"/>
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<input name="search_duration" id="search_duration" class="form-control" placeholder="Duration" type="text" value="<?php echo $search_duration; ?>" />
	</div>
	<div class="gap15 yes800"></div>
	<div class="col-md-3 col-sm-6">
		<input name="search_tech" id="search_tech" class="form-control" placeholder="Technology" type="text" value="<?php echo $search_tech; ?>" />
	</div>
	<div class="gap15 yes800"></div>

	<div class="col-md-3 col-sm-6">
		<input type="submit" id="search_submit" name="search_submit" class="btn submitM" value="Search"> &nbsp;
		<a href="topprojectslist.php" class="btn submitM cancelBtn">Clear</a>
	</div>
	<div class="gap1"></div>
	</form>
</div>

<div class="gap30"></div>
<div class="table-responsive">
	<table id="dataTable" class="table table-bordered table-striped">
		 <thead>
       <tr class="tr1">
			<td>Rank</td>
			<td>Project Name</td>
			<td>Duration</td>
			<td>Technology</td>
			<td>Rating</td>
			
			
		</tr>
  </thead>
<?php $i=0; while($stmnt1->fetch()){ $i++;
?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $name;?> </td>
			<td><?php echo $duration;?> </td>
			<td><?php echo $dev_platform;?> </td>
			<td><?php echo numbToDesi($rank); ?></td>
			
		</tr>
	
	<?php  }?>



	</table>
</div>

<div class="gap20"></div>
<?php include("footer.php"); ?>

<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#frm1").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            search_name: {
                                            lettersonly: true,
                                            },
					     search_duration: {
                                            alphanumeric: true,
                                            },
                                            search_tech: {
                                            alphanumeric: true, 					
                                            },
                                           

               },


				//The error message Str here

           messages: {
		
					
       },
       
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }


    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


function empty_form(val1){
    $("#"+val1).closest('form').find("input[type=text], select").val("");
}
</script>
