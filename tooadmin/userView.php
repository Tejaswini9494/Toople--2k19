<?php 
$page="userView";
include("../class/config.php");
include("../includes/functions.php");

extract($_REQUEST);


//========Start Active / Deactive ===========//
$button_action=$_POST["button_action"];	
if(isset($_POST["button_action"]))
{
for ($i=0; $i <count($_REQUEST['changeStatus']); $i++)
{
	$ID=$_REQUEST['changeStatus'][$i];
	if ($button_action=="Active") {
		$query = "UPDATE too_users SET status= 'A' WHERE user_id= ?";
		
	}else if($button_action=="De Active") {
		$query = "UPDATE too_users SET status= 'D' WHERE user_id= ?";
		
	}else if($button_action=="Delete") {
		$query="Delete from student_info where student_info_id=?";
		//$action="GA";
	}
	$statement = $mysqli->prepare($query);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('i',$ID);
        $statement->execute();
}
      	//Notification Message
        
        
}
//========End Active / Deactive ===========//


if(isset($search))
{
	$qry='';
	if($search_name!='' || $search_email!='' || $search_country!='' || $search_state!='' || $search_city!='' || $search_status!=''){
	$qry.=" AND a.s_first_name LIKE '%".$search_name."%' AND b.user_email LIKE '%".$search_email."%' AND a.s_country LIKE '%".$search_country."%' AND a.s_state LIKE '%".$search_state."%' AND a.s_city LIKE '%".$search_city."%' AND b.status LIKE '%".$search_status."%'";
	}

}else{
$qry='';
}
if($proj_id!='') {

	$sql2 = "SELECT student_id FROM institution_project_assign WHERE institution_project_id=$proj_id AND student_id!=0";
	$statement2=$mysqli->prepare($sql2);
	$statement2->execute();
	$statement2->store_result();
	$statement2->bind_result($student_id);
	$nums2=$statement2->num_rows();

	if($nums2>0){
		$ioi=1;
		$exqry.=" AND (";
		while($statement2->fetch()) {
			if($ioi!=1) {
				$exqry.=" OR ";
			}
			$exqry.="b.user_id='".$student_id."'";
			$ioi++;
		}
		$exqry.=")";
	}else {
		$exqry.="AND b.user_id=''";
	}

	$user_sql="SELECT DISTINCT a.student_info_id,a.user_id,a.s_first_name,a.s_last_name,a.s_identify_number,a.s_country,a.s_state,a.s_city,b.user_email,a.s_primary_contact,b.added_date,b.status FROM student_info a, too_users b WHERE a.user_id=b.user_id $exqry $qry";

}
else
{
	$user_sql="SELECT a.student_info_id,a.user_id,a.s_first_name,a.s_last_name,a.s_identify_number,a.s_country,a.s_state,a.s_city,b.user_email,a.s_primary_contact,b.added_date,b.status 
	FROM student_info a, too_users b WHERE a.user_id=b.user_id AND b.user_type='$type' $qry";
}
//echo $user_sql."##############".$proj_id;
$st=$mysqli->prepare($user_sql);
$st->execute();
$st->store_result();
$st->bind_result($student_info_id,$user_id,$s_first_name,$s_last_name,$s_identify_number,$s_country,$s_state,$s_city,$user_email,$s_primary_contact,$added_date,$status);

include("header.php");

if($type=='SP'){
$header_name='Project Student';
}
elseif($type=='SI'){
$header_name='Intern Student';
}
?>
<link href="css/evince.css" rel="stylesheet" type="text/css" />


 
<h3>
<!--<a href="userAdd.php" class="submitM pull-right">Add</a>-->
<?php echo $header_name; ?></h3>

<div class="gap10"></div>

<!--content Box -->
<div class="x_panel">
<div class="x_content">

<div class="gap15"></div>

<div class="well filterBox">

	<form name="frm1" id="frm1" action="" method="post" >
		<table class=" " align="center" >
			<tbody>
				<tr>
					<td><input name="search_name" id="search_name" class="form-control" placeholder="First Name" type="text" value="<?php echo $search_name; ?>"/></td>
					<td><input name="search_email" id="search_email" class="form-control" placeholder="Email Id" type="text" value="<?php echo $search_email; ?>" /></td>
					<td>
					<select name="search_country" id="search_country" class="form-control" >
					<option value="">Country</option>
					 <?php countryId($search_country);?>
					</select>
					</td>
					<td>
					<select name="search_state" id="search_state" class="form-control" >
					<option value="">State</option>
					<?php categoryForState($search_country,$search_state);?>
					</select>
					</td>
					<td>
					<select name="search_city" id="search_city" class="form-control" >
					<option value="">City</option>
					<?php categoryForCity($search_state,$search_city);?>
					</select>
					</td>
					<td>
					<select name="search_status" id="search_status" class="form-control" >
					<option value="">All Staus</option>
					<option value="A" <?php if($search_status=='A') { echo "selected"; } ?>>Active</option>
					<option  value="D" <?php if($search_status=='D') { echo "selected"; } ?>>Deactivated</option>
					</select>
					</td>
					<td><input name="search" id="search" value="Search" class="submitM" type="submit" /></td>
					<td><input name="reset" id="reset" value="Reset" class="submitM" type="submit" onclick="empty_form('reset')"/></td>
				</tr>
			</tbody>
		</table>
	</form>

</div>

</div>
</div>

<?php 
	$sql2a = "SELECT COUNT(institution_project_id) FROM institution_project WHERE institution_project_id='$proj_id' AND mentor_completion='Y' AND coo_completion='Y'";
	$statement2a=$mysqli->prepare($sql2a);
	$statement2a->execute();
	$statement2a->store_result();
	$statement2a->bind_result($cntIPID);
	$statement2a->fetch();
	$statement2a->close();
?>

<div class="table-responsive" style="overflow:hidden;">
<form name="categoryView" method="post">
<table id="dataTable" class="table table-bordered table-striped tabBorder">

	<thead>
		<tr class="tr1">
			<td width="20" align="center">#</td>
			<td width="10" align="center"><input type="checkbox" onclick="return selall1(this);" /></td>
			<td width="16" align="center"><img src="images/edit.png" alt="edit" /></td>
			
			<td align="center">Name</td>
			<td align="center">Email ID</td>
			<td align="center">Identity Number</td>
			<td align="center">Country</td>
			<td align="center">State</td>
			<td align="center">City</td>
			<td align="center">Primary Contact </td>
			<td align="center">Reg Date</td>
		<?php if($cntIPID>0) { ?>
			<td align="center">Certificate</td>
		<?php } ?>
			<td align="center">Status</td>
		</tr>
	</thead>
	<?php 
	$i=0;
	while($st->fetch()) {
		if($status=='A'){
		$status1='Active';
		}
		elseif($status=='D'){
		$status1='Deactive';
		}
		 $i++; 
		$added_date=sysDBDateConvert($added_date);

		$sql2b = "SELECT institution_project_assign_id FROM institution_project_assign WHERE institution_project_id='$proj_id' AND student_id='$user_id'";
		$statement2b=$mysqli->prepare($sql2b);
		$statement2b->execute();
		$statement2b->store_result();
		$statement2b->bind_result($institution_project_assign_id);
		$statement2b->fetch();
		$statement2b->close();

	?>
		<tr class="tr">
			<td align="left"><?php echo $i;?></td>
			<td align="left"><input type="checkbox" name="changeStatus[]" value="<?php echo $user_id;?>" /></td>
			<td align="left"><a href="reg-project-stud1edit.php?edit_id=<?php echo $student_info_id; ?>"><img src="images/edit.png" alt="edit" /></a></td>
			
			<td align="left" class="td_txt"><a href="profileView.php?id=<?php echo $student_info_id;?>&type=<?php echo $type;?>"><?php echo $s_first_name." ".$s_last_name;?></a></td>
			<td align="left" class="td_txt"><?php echo $user_email;?></td>
			<td align="left" class="td_num"><?php echo $s_identify_number;?></td>
			<td align="left" class="td_txt"><?php getCountryName($s_country);?></td>
			<td align="left" class="td_txt"><?php getStateName($s_state);?></td>
			<td align="left" class="td_txt"><?php getCityName($s_city);?></td>
			<td align="left" class="td_num"><?php echo $s_primary_contact;?></td>
			<td align="left" class="td_date"><?php echo $added_date;?></td>
		<?php if($cntIPID>0) { ?>
			<td align="center">
				<a class="" href="../certificate.php?id=<?php echo $institution_project_assign_id; ?>" target="_blank">
					<i class="fa fa-print"></i>
				</a>
			</td>
		<?php } ?>
			<td align="left" class="td_txt"><?php echo $status1;?></td>
		</tr>
	<?php } ?>
</table>

</div>

<br>
<table class="table table-bordered table-striped tabBorder">
	<tr class="tr" align="center">
		<td colspan="11" align="left">
			
			<input id="button_action" name="button_action" class="submitM" type="submit" value="Active" onclick="return confirms();">
			<input id="button_action" name="button_action" class="submitM" type="submit" value="De Active" onclick="return confirms();">
			
		</td>
	</tr>
</table>
</form>


<?php  include("footer.php"); ?>

<script type="text/javascript">
<!--
function selall1(aa1){ 

if(aa1.checked==true){
	checkAll(document.categoryView,0)	
}else{checkAll(document.categoryView,1)	}

}

function checkAll(formObj, invert){ 
with (formObj) { 
  for (var i=0;i < elements.length;i++){ 
    fldObj = elements[i]; 
      if(fldObj.type == "checkbox"){ 
        if(invert==0){ 
          fldObj.checked = true; 
        }
        else{ 
          fldObj.checked = false; 
        } 
      }  
    } 
  } 
} 

function confirms()
{	
var msg='';
var i=0;
for(i=0;i<=document.categoryView.length-1;i++)
	{ 
	
	 if(document.categoryView.elements[i].type=="checkbox") 
		{
		 if(document.categoryView.elements[i].checked==true)
	        {
		
			 return true;
	 		 }
        }
	}
	
		msg+="Select the record";

		if(i!=1){i=1;
			msg1="document.categoryView.elements[i]";
		}
	if(msg1!=''){
		alert(msg);
		return false;
	}
 
}

//Delete confirmation
function confirmDelete(){
var msg='';
var i=0;
for(i=0;i<=document.categoryView.length-1;i++)
	{ 
		if(document.categoryView.elements[i].type=="checkbox") 
		{
		 if(document.categoryView.elements[i].checked==true)
	        {
	         var agree=confirm("ARE YOU ABSOLUTELY SURE YOU WANT TO DELETE THIS RECORD?");
	         if (agree) {
		      return true;
	         } else {
		      return false;
		     }
	 		}
        }
	}
	
	var msg="Select any record";
	alert(msg);
		return false;

	
}


</script>
<script>
$(document).ready(function()
{
$('#search_country').change(function()
{
var con=$('#search_country').val();
if(con=='')
{
$('#search_state').html('<option>Select Country First</option>');

}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {con},                 
        success: function(response){
        $('#search_state').html(response);

        }
    });
}
});
});
</script>
<script>
$(document).ready(function()
{
$('#search_state').change(function()
{
var com=$('#search_state').val();
if(com=='')
{
$('#search_city').html('<option>Select state First</option>');
}
else
{
   $.ajax({    //create an ajax request to functions.php
        type: "POST",
        url: "stateajax.php",             
        data: {com},                 
        success: function(response){
        $('#search_city').html(response);
        }
    });
}
});
});

function empty_form(val1){
    $("#"+val1).closest('form').find("input[type=text], select").val("");
}
</script>
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
	
                                            search_email: {
                                            filteremail: true, 					
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
</script>

