<?php 
$page="user2View";
include_once ("include/functions.php");
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
		$querym = "UPDATE representative_service_provider SET status= 'A' WHERE representative_service_provider_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE representative_service_provider SET status= 'D' WHERE representative_service_provider_id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym="Delete from representative_service_provider WHERE representative_service_provider_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
        header("Location:user2View.php");
        
}

$query1="select user_id,user_type from too_users where user_type='SPM'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($user_id,$user_type);
$statement1->fetch();

$query="select * from representative_service_provider where user_id='$user_id' ORDER BY updated_on DESC";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($representative_service_provider_id,$user_id,$rsp_org_name,$rsp_email,$rsp_web,$rsp_lang,$rsp_phone,$rsp_city,$rsp_postal,$rsp_country,$rsp_pan,$rsp_tin,$rsp_tax,$rsp_bank_details,$rsp_bank_name,$rsp_branch_name,$rsp_branch_code,$rsp_country1,$rsp_type_account,$rsp_benefi_name,$rsp_account_no,$rsp_bank_details1,$rsp_agreement,$rsp_start_date,$rsp_end_date,$rsp_note,$status,$ip_address,$created_on,$updated_on);

if ($user_type=='SPM')
{
$type='Mentor';
}
else
{
$type='CP';
}

include("header.php");?> 
<h3>
<!--<a href="user2Add.php" class="submitM pull-right">Add</a>-->
Representative of Service Provider Organization &raquo; List View </h3>

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
          <select name="membership_status3" class="seM" >
            <option value="">All Type</option>
            <option value=" " > Mentor </option>
            <option  value=" "> Content Provider </option>
          </select>
          <select name="membership_status2" class="seM" >
            <option value="">All Staus</option>
            <option value="Approve" >Approved</option>
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
      <td align="left">Type</td>
      <td align="left">Name</td>
      <td align="left">Email ID</td>
      <td align="left">WebSite</td>
      <td align="left">Phone</td>
      <td align="left">Country</td>
      <td align="left">City</td>
     
      <td align="center">Assigned Students</td>
      <td align="left">Reg Date</td>
      <td align="center"> Status</td>
    </tr>
  </thead>
     <?php $i=0;
while($statement->fetch())
{ 

$nab="select representative_service_provider_id,rsp_org_name,rsp_email,rsp_web,rsp_phone,rsp_country,rsp_city,rsp_start_date from representative_service_provider where representative_service_provider_id='$representative_service_provider_id'";
	$statementt=$mysqli->prepare($nab);
$statementt->execute();
$statementt->store_result();
$statementt->bind_result($representative_service_provider_id,$rsp_org_name,$rsp_email,$rsp_web,$rsp_phone,$rsp_country,$rsp_city,$rsp_start_date);
$statementt->fetch();
	$i++;
?>
  <tr class="tr">
      <td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $representative_service_provider_id;?> "/></td>
	 <td><?php echo $i;?></td>
      <td align="left"><a href="edit2.php?id=<?php echo $representative_service_provider_id; ?>"><i class="fa fa-pencil-square-o" ></i></a></td>
     
	<td>plan</td>
	<td>type</td>
      <td><a href="profileView2.php?id=<?php echo $representative_service_provider_id; ?>"><?php echo $rsp_org_name; ?></a></td>
	 <td><?php echo $rsp_email; ?></td>
	 <td><?php echo $rsp_web; ?></td>
	 <td><?php echo $rsp_phone; ?></td>
	 <td><?php echo $rsp_country; ?></td>
	<td><?php echo $rsp_city; ?></td>
	 <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
	<td><?php echo $rsp_start_date; ?></td>
	<td><?php echo $status; ?></td>
      
    </tr>
 <?php
} 
?>
</table>
</div>

<br>
<table class="table table-bordered table-striped tabBorder">
    <tr class="tr2">
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
