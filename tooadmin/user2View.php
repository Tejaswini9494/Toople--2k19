<?php 
$page="user2View";
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
		$querym="Delete from too_users WHERE user_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
        
        
}

$button_action=$_POST["button_action"];
if(isset($_POST["button_action"]))
{
for ($i=0; $i <count($_REQUEST['checkbox1']); $i++)
{
	$ID=$_REQUEST['checkbox1'][$i];
	//echo $ID;
	//exit;
	if ($button_action=="Active") {
		$querym1 = "UPDATE too_users SET status= 'A' WHERE rsp_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym1= "UPDATE too_users SET status= 'D' WHERE rsp_id= ?";
		
		$action="GA";
	}else if($button_action=="Delete") {
		$querym1="Delete from too_users WHERE rsp_id= ?";
		$action="GA";
	}
	$statementm1 = $mysqli->prepare($querym1);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm1->bind_param('i',$ID);
        $statementm1->execute();
}
        
        
}
if(isset($search))
{
	$qry='';
	if($search_name!='' || $search_email!='' || $search_country!='' || $search_state!='' || $search_city!=''|| $search_status!=''){
	$qry.=" AND a.rsp_org_name LIKE '%".$search_name."%' AND a.rsp_email LIKE '%".$search_email."%' AND a.rsp_country LIKE '%".$search_country."%' AND a.rsp_state LIKE '%".$search_state."%' AND a.rsp_city LIKE '%".$search_city."%' AND b.status LIKE '%".$search_status."%'";
	}

}else{
$qry='';
}

include("header.php");




/* if ($user_type=='SPM')
{
$type='Mentor';
}
else
{
$type='CP';
}  */

?> 
<h3>
<!--<a href="user2Add.php" class="submitM pull-right">Add</a>-->
Representative of Service Provider Organization &raquo; List View </h3>

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
     <td width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></td>
      
      <td width="20" align="center">#</td>
      <td width="16" align="center"><img src="images/edit.png" alt="edit" /></td>
     <td align="center">Type</td>
      <td align="center">Name</td>
      <td align="center">Email ID</td>
      <td align="center">WebSite</td>
      <td align="center">Phone</td>
      <td align="center">Country</td>
	<td align="center">State</td>
      <td align="center">City</td>
     
    
      <td align="center">Reg Date</td>
      <td align="center"> Status</td>
      <td align="center"> Report</td>
    </tr>
  </thead>
     <?php $i=0;

$query="select a.*, b.status from representative_service_provider a,too_users b where a.user_id=b.user_id AND a.user_id!=''$qry";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($representative_service_provider_id, $user_id, $rsp_org_name, $rsp_email, $rsp_web, $rsp_lang, $rsp_phone, $rsp_country, $rsp_state, $rsp_city, $rsp_posral, $rsp_pan, $rsp_tin, $rsp_tax, $rsp_photo, $rsp_bank_details, $rsp_bank_name, $rsp_branch_name, $rsp_branch_code, $rsp_country1, $rsp_type_account, $rsp_benefi_name, $rsp_account_no, $rsp_bank_details1, $rsp_agreement, $rsp_start_date, $rsp_end_date, $rsp_note, $sts, $ip_address, $created_on, $updated_on, $status);
while($statement->fetch())
{

$query1="select user_type from too_users where user_id='$user_id'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($user_type);
while($statement1->fetch())
{

if($user_type=='SPM'){
$type='mentor';
}
else{
$type='content provider';
}

if($status=='A'){
$status1='Active';
}
elseif($status=='D'){
$status1='Deactive';
}

	$i++;
?>
  <tr class="tr">
      <td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $user_id;?> "/></td>
	 <td align="left"><?php echo $i;?></td>
      <td align="left"><a href="repmentor1.php?edit_id=<?php echo $representative_service_provider_id; ?>"><i class="fa fa-pencil-square-o" ></i></a></td>
     
	
	<td align="left"><?php echo $type;?></td>
      <td align="left"><a href="profileView2.php?id=<?php echo $representative_service_provider_id; ?>"><?php echo $rsp_org_name; ?></a></td>
	 <td align="left"><?php echo $rsp_email; ?></td>
	 <td align="left"><?php echo $rsp_web; ?></td>
	 <td align="left"><?php echo $rsp_phone; ?></td>
	 <td align="left"><?php echo getCountryName($rsp_country); ?></td>
	<td align="left"><?php echo getStateName($rsp_state); ?></td>
	<td align="left"><?php echo getCityName($rsp_city); ?></td>

	<td align="left"><?php echo sysDBDateConvert($rsp_start_date); ?></td>
	<td align="left"><?php echo $status1; ?></td>
	<td align="center">
	<?php if($user_type=='SPM') { ?>
		<a href="mentorCalendarSP.php?userid=<?php echo $user_id; ?>"><i class="fa fa-calendar"></i></a>
	<?php } else { echo "-"; }?>
	</td>
    </tr>
 <?php
} 
}
?>
</table>
</div>

<br>
<table class="table table-bordered table-striped tabBorder">
    <tr class="tr2">
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

