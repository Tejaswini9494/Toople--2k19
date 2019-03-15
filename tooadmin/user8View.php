<?php 
$page="user8View";

include_once ("../includes/functions.php");
include_once ("../class/config.php");
extract($_REQUEST);

//========Start Active / Deactive ===========//
$button_action=$_POST["button_action"];
if(isset($_POST["button_action"]))
{
for ($i=0; $i <count($_REQUEST['checkbox1']); $i++)
{
	$ID=$_REQUEST['checkbox1'][$i];
	//echo $ID;
	//exit;
	if ($button_action=="Active") {
		$querym = "UPDATE too_users SET status= 'A' WHERE user_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE too_users SET status= 'D' WHERE user_id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym="Delete from student_info WHERE student_info_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
       
        
}


if(isset($search))
{
	$qry='';
	if($search_name!='' || $search_email!='' || $search_country!='' || $search_state!='' || $search_city!='' || $search_status!=''){
	$qry.=" AND a.s_first_name LIKE '%".$search_name."%' AND a.s_email_id LIKE '%".$search_email."%' AND a.s_country LIKE '%".$search_country."%' AND a.s_state LIKE '%".$search_state."%' AND a.s_city LIKE '%".$search_city."%' AND b.status LIKE '%".$search_status."%'";
	}

}else{
$qry='';
}

include("header.php");

if($type=='MEN'){
$header_name='Mentor of Service Provider Organization';
}
elseif($type=='CP'){
$header_name='Content Provider Organization';
}


?>


<h3>
<!--<a href="user8Add.php" class="submitM pull-right">Add</a>-->
<?php echo $header_name;?> &raquo; List View </h3>

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
 
<form name="frm" action="#" method="post" enctype="multipart/form-data">
<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-striped tabBorder">
  <thead>
    <tr class="tr1">
     <th width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></th>
      
      <td width="20" align="center">#</td>
      <td width="16" align="center"><img src="images/edit.png" alt="edit" /></td>
      
      <td align="center">Name</td>
      <td align="center">Email ID</td>
      <td align="center">Identity Number</td>
      <td align="center">Country</td>
      <td align="center">State</td>
      <td align="center">City</td>
      <td align="center">Primary Contact </td>
      <td align="center"> Status</td>
    </tr>
  </thead>
   <?php $i=0;
$sql="select user_id from too_users where user_type='$type'";
$statement1=$mysqli->prepare($sql);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($user_id);
while($statement1->fetch())
{
$nab="select a.student_info_id,a.user_id,a.s_institution_name,a.s_first_name,a.s_last_name,a.s_dob,a.s_gender,a.s_identify_number,a.s_upload_photo,a.s_addressline1,
a.s_addressline2,a.s_country,a.s_state,a.s_city,a.s_primary_contact,a.s_email_id,a.s_alternate_email_id,a.s_secondary_contact,b.status from student_info a,too_users b where b.user_id=a.user_id AND a.user_id='$user_id'$qry";
$statementt=$mysqli->prepare($nab);
$statementt->execute();
$statementt->store_result();
$statementt->bind_result($student_info_id,$user_id,$s_institution_name,$s_first_name,$s_last_name,$s_dob,$s_gender,$s_identify_number,$s_upload_photo,$s_addressline1,$s_addressline2,$s_country,$s_state,$s_city,$s_primary_contact,$s_email_id,$s_alternate_email_id,$s_secondary_contact,$status);
while($statementt->fetch())
{
if($status=='A'){
$status1='Active';
}
else if($status=='D'){
$status1='Deactive';
}
	$i++;
?>
  <tr class="tr">
      <td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $user_id;?> "/></td>
	 <td align="left"><?php echo $i;?></td>
      <td align="left"><a href="mentor1edit.php?edit_id=<?php echo $student_info_id;?>"><i class="fa fa-pencil-square-o" ></i></a></td>
	
      <td align="left"><a href="profileView8.php?id=<?php echo $student_info_id;?>&type=<?php echo $type;?>"><?php echo $s_first_name." ".$s_last_name; ?></a></td>
	 <td align="left"><?php echo $s_email_id; ?></td>
	 <td align="left"><?php echo $s_identify_number; ?></td>
	 <td align="left"><?php echo getCountryName($s_country); ?></td>
	 <td align="left"><?php echo getStateName($s_state); ?></td>
	<td align="left"><?php echo getCityName($s_city); ?></td>
	<td align="left"><?php echo $s_primary_contact; ?></td>
	<td align="left"><?php echo $status1; ?></td>
      
    </tr>
 <?php
} 
}
?>
</table>
</div>

<br>
<table class="table table-bordered table-striped tabBorder">
    <tr class="tr" align="center">
      <td   align="left" colspan="5">
	<input type="submit" name="button_action" id="button_action" value="Active" class="submitM" onclick="return confirms();">
	<input type="submit" name="button_action" id="button_action" value="Deactive" class="submitM" onclick="return confirms();"></td>
    </tr>
</table>
</form>
<?php  include("footer.php"); ?>


<script type="text/javascript">
<!--
function selall1(aa1){ 

if(aa1.checked==true){
	checkAll(document.frm,0)	
}else{checkAll(document.frm,1)	}
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
for(i=0;i<=document.frm.length-1;i++)
	{ 
	 if(document.frm.elements[i].type=="checkbox") 
		{
		 if(document.frm.elements[i].checked==true)
	        {	
			 return true;
	 		 }
        }
	}
		msg+="Select the record";

		if(i!=1){i=1;
			msg1="document.frm.elements[i]";
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
for(i=0;i<=document.frm.length-1;i++)
	{ 
		if(document.frm.elements[i].type=="checkbox") 
		{
		 if(document.frm.elements[i].checked==true)
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

