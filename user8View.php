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
		$querym = "UPDATE student_info SET status= 'A' WHERE student_info_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE student_info SET status= 'D' WHERE student_info_id= ?";
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
        header("Location:user8View.php");
        
}
include("header.php");

$query="select * from student_info ORDER BY updated_on DESC";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($student_info_id,$user_id,$s_institution_name,$s_first_name,$s_last_name,$s_dob,$s_gender,$s_identify_number,$s_upload_photo,$s_addressline1,$s_addressline2,$s_country,$s_state,$s_city,$s_primary_contact,$s_email_id,$s_alternate_email_id,$s_secondary_contact,$status,$ip_address,$created_on,$updated_on);

?>


<h3>
<!--<a href="user8Add.php" class="submitM pull-right">Add</a>-->
Mentor of Service Provider Organization &raquo; List View </h3>

<div class="gap10"></div>

<!--content Box -->
<div class="x_panel">
<div class="x_content">

<div class="gap15"></div>

<div class="well filterBox">

<form name="" action="#" method="post" >
  <table class=" " align="center" >
    <tbody>
      <tr>
        <td>
          <input name="textfield1" class="boxM" placeholder="Name" type="text" />
          <input name="textfield2" class="boxM" placeholder="Email Id" type="text" />
          <select name="membership_status" class="seM" >
            <option value="">Country</option>
            <option  value="Deactivated">Loaded from master</option>
          </select>
          <select name="membership_status2" class="seM" >
            <option value="">All Staus</option>
            <option value="Active" >Approved</option>
            <option  value="Deactivated">Rejected</option>
            <option  value="Deactivated">Pending</option>
        </select></td>
        <td><?php include("in_range.php"); ?></td>
        <td><input name="button" id="button" value="Search" class="submitM" type="submit" /></td>
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
      <td align="left">Plan</td>
      <td align="left">Name</td>
      <td align="left">Email ID</td>
      <td align="left">Identity Number</td>
      <td align="left">Country</td>
      <td align="left">State</td>
      <td align="left">City</td>
      <td align="left">Primary Contact </td>
      <td align="center"> Status</td>
    </tr>
  </thead>
   <?php $i=0;
while($statement->fetch())
{ 

$nab="select student_info_id,user_id,s_institution_name,s_first_name,s_last_name,s_dob,s_gender,s_identify_number,s_upload_photo,s_addressline1,
s_addressline2,s_country,s_state,s_city,s_primary_contact,s_email_id,s_alternate_email_id,s_secondary_contact from student_info where student_info_id='$student_info_id'";
	$statementt=$mysqli->prepare($nab);
$statementt->execute();
$statementt->store_result();
$statementt->bind_result($student_info_id,$user_id,$s_institution_name,$s_first_name,$s_last_name,$s_dob,$s_gender,$s_identify_number,$s_upload_photo,$s_addressline1,$s_addressline2,$s_country,$s_state,$s_city,$s_primary_contact,$s_email_id,$s_alternate_email_id,$s_secondary_contact);
$statementt->fetch();
	$i++;
?>
  <tr class="tr">
      <td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $student_info_id;?> "/></td>
	 <td><?php echo $i;?></td>
      <td align="left"><a href="user8Add.php?id=<?php echo $student_info_id; ?>"><i class="fa fa-pencil-square-o" ></i></a></td>
	<td>silver</td>
      <td><a href="profileView8.php?id=<?php echo $student_info_id; ?>"><?php echo $s_institution_name; ?></a></td>
	 <td><?php echo $s_email_id; ?></td>
	 <td><?php echo $s_identify_number; ?></td>
	 <td><?php echo getCountryName($s_country); ?></td>
	 <td><?php echo getStateName($s_state); ?></td>
	<td><?php echo getCityName($s_city); ?></td>
	<td><?php echo $s_primary_contact; ?></td>
	<td><?php echo $status; ?></td>
      
    </tr>
 <?php
} 
?>
</table>
</div>

<br>
<table class="table table-bordered table-striped tabBorder">
    <tr class="tr" align="center">
      <td   align="left" colspan="5"><input type="submit" name="button_action" id="button_action" value="Delete" class="submitM" onclick="return confirmDelete();">
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
