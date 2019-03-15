<?php
$page="my Student";
$title="Top Student";
$ses='no';
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

include("header.php");

include("topstu.php");

if(isset($search_submit))
{
	$qry='';
	if($search_name!=''){
	$qry.=" AND name LIKE '%".$search_name."%'";
	}

}else{
$qry='';
}

$sql1="select name,img,rank from topstudent where id!=''$qry ORDER BY rank DESC";
$stmnt1=$mysqli->prepare($sql1);
$stmnt1->execute();
$stmnt1->store_result();
$stmnt1->bind_result($name,$img,$rank);



 ?>
<h3 class="">Top Students</h3>
<div class="gap20"></div>
<div class="well1 filterBox">

	<form id="frm1" method="POST" enctype="multipart/form-data">
	<div class="col-md-3 col-sm-6">
		<input name="search_name" id="search_name" class="form-control" placeholder="Student Name" type="text" value="<?php echo $search_name; ?>"/>
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<input type="submit" id="search_submit" name="search_submit" class="btn submitM" value="Search"> &nbsp;
		<a href="topstudentslist.php" class="btn submitM cancelBtn">Clear</a>
	</div>
	<div class="gap1"></div>
	</form>
</div>

<div class="gap30"></div>
<div class="gap30"></div>
<div class="table-responsive">
	<table id="dataTable" class="table table-bordered table-striped">
		 <thead>
       <tr class="tr1">
			<td>Rank</td>
			<td>student name</td>
			<td>photo</td>
			<td>Rating</td>
			
		</tr>
  </thead>
<?php $i=0; while($stmnt1->fetch()){ $i++;
?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $name;?> </td>
			<td><img src="<?php echo $img;?>" width="50" height="50"></td>
			
			<td><?php echo $rank; ?></td>
			
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
