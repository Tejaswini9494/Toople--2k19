<?php 
$page="user3View";
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
		$querym="Delete from customer_organisation WHERE customer_organisation_id= ?";
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
		$querym1 = "UPDATE too_users SET status= 'D' WHERE rsp_id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym1="Delete from customer_organisation WHERE customer_organisation_id= ?";
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
	if($search_name!='' || $search_email!='' || $search_country!='' || $search_state!='' || $search_city!='' || $search_status!=''){
	$qry.=" AND a.co_name LIKE '%".$search_name."%' AND a.co_email LIKE '%".$search_email."%' AND a.co_country LIKE '%".$search_country."%' AND a.co_state LIKE '%".$search_state."%' AND a.co_city LIKE '%".$search_city."%' AND b.status LIKE '%".$search_status."%'";
	}

}else{
$qry='';
}
include("header.php");

$nab1="select user_id from too_users where user_type='$type'";
$statementt1=$mysqli->prepare($nab1);
$statementt1->execute();
$statementt1->store_result();
$statementt1->bind_result($user_id);
$statementt1->fetch();


if($type=='CIN'){
$header_name='Representative of Institution Organization';
}
elseif($type=='CIS'){
$header_name='Representative of Internship Organization';
}
elseif($type=='CRC'){
$header_name='Representative of Recruiting Organization';
}
elseif($type=='COO'){
$header_name='Representative of Institution Coordinator';
}

?> 
<h3>
<!--<a href="user3Add.php" class="submitM pull-right">Add</a>-->
<?php echo $header_name; ?> &raquo; List View </h3>

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
     
      <td align="center">Name</td>
      <td align="center">Email ID</td>
      <td align="center">WebSite</td>
      <td align="center">Phone</td>
      <td align="center">Country</td>
	 <td align="center">State</td>
      <td align="center">City</td>
      <td align="center">Status</td>
    </tr>
  </thead>
     <?php $i=0;
$nab1="select user_id from too_users where user_type='$type'";
$statementt1=$mysqli->prepare($nab1);
$statementt1->execute();
$statementt1->store_result();
$statementt1->bind_result($user_id);

while($statementt1->fetch())
{

$nab="select a.customer_organisation_id,a.user_id,a.co_name,a.co_email,a.co_website,a.co_phone,a.co_country,a.co_state,a.co_city,b.status from customer_organisation a,too_users b where a.user_id=b.user_id AND a.user_id='$user_id'$qry";
$statementt=$mysqli->prepare($nab);
$statementt->execute();
$statementt->store_result();
$statementt->bind_result($customer_organisation_id,$user_id,$co_name,$co_email,$co_website,$co_phone,$co_country,$co_state,$co_city,$status);
while($statementt->fetch())
{
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
      <td align="left"><a href="reg-institution1edit.php?edit_id=<?php echo $customer_organisation_id; ?>"><i class="fa fa-pencil-square-o" ></i></a></td>
     
	
      <td align="left"><a href="profileView3.php?id=<?php echo $customer_organisation_id; ?>&type=<?php echo $type; ?>"><?php echo $co_name; ?></a></td>
	 <td align="left"><?php echo $co_email; ?></td>
	 <td align="left"><?php echo $co_website; ?></td>
	 <td align="left"><?php echo $co_phone; ?></td>
	 <td align="left"><?php echo getCountryName($co_country); ?></td>
	<td align="left"><?php echo getStateName($co_state); ?></td>
	<td align="left"><?php echo getCityName($co_city); ?></td>
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
    <tr class="tr2">
      <td   align="left" colspan="5">
<input type="submit" name="button_action" id="button_action" value="Active" class="submitM" onclick="return confirms();">
<input type="submit" name="button_action" id="button_action" value="Deactive" class="submitM" onclick="return confirms();"></td>
    </tr>
  </table>
</form>
<?php  include("footer.php"); ?>

<script type="text/javascript">
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

