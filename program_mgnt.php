<?php 
$page="program_mgnt";
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
		$query = "UPDATE institution_project SET status= 'A' WHERE institution_project_id= ?";
		
	}else if($button_action=="De Active") {
		$query = "UPDATE institution_project SET status= 'D' WHERE institution_project_id= ?";
		
	}else if($button_action=="Delete") {
		$query="Delete from institution_project where institution_project_id=?";
		//$action="GA";
	}
	$statement = $mysqli->prepare($query);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('i',$ID);
        $statement->execute();
}
      	//Notification Message
        header("Location:program_mgnt.php");
        exit;
}
//========End Active / Deactive ===========//


$sql1s = "SELECT institution_project_id,user_id,project_id,updated_on,status FROM institution_project WHERE assigned_status='Y'";
$statement1s=$mysqli->prepare($sql1s);
$statement1s->execute();
$statement1s->store_result();
$statement1s->bind_result($institution_project_id,$user_id,$project_id,$updated_on,$status);


include("header.php");


?> 

<h3>
<!--<a href="productsAdd.php" class="submitM pull-right">Add</a>-->
Program &raquo; List View</h3>

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
          <select class="form-control">
		<option value="">  Category</option>
        <option value="">Loaded From Master</option>
	  </select>
	</td>
        <td>
          <select class="form-control">
		<option value="">  Project Type</option>
        <option value="">Loaded From Master</option>
	  </select>
	</td>
         <td>
          <select class="form-control">
		<option value="">  Project Duration</option>
        <option value="">Loaded From Master</option>
	  </select>
	</td>
       <td>
          <select class="form-control">
		<option value="">  Development Platform</option>
        <option value="">Loaded From Master</option>
	  </select>
	</td>
        <td>
		<select name="membership_status2" class="seM" >
			<option value="">All Staus</option>
			<option value="Active" >Arrived</option>            
			<option  value="Deactivated">Sent for Approval</option>
			<option  value="Deactivated">Approved</option>
			<option  value="Deactivated">Rejected</option>
		</select>
 
        <td>
		<?php include("in_range.php"); ?>
	</td>
        <td><input name="button" id="button" value="Search" class="submitM" type="submit" /></td>
      </tr>
    </tbody>
  </table>
</form>

</div>
 

<div class="table-responsive">
<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
  <thead>
    <tr class="tr1">
      <td width="20" align="center">#</td>
      <td width="10" align="center">&nbsp;</td>
      <td align="left">Program Id</td>
      <td align="left">Project Id</td>
      <td align="left">Project Name</td>
      <td align="left">Abstract</td>
      <td align="left">Institution Name</td>
      <td align="left">Student Details</td>
      <td align="left">Mentor</td>
      <td align="left">Created Date</td>
      <td align="left">Status</td>
      <td align="left">Completion Status</td>
      </tr>
  </thead>
<?php $i=0; While($statement1s->fetch()) { $i++;

$updated_on=sysDBDateConvert($updated_on);

$sql2 = "SELECT co_name FROM customer_organisation WHERE user_id='$user_id'";
$statement2=$mysqli->prepare($sql2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($co_name);
$statement2->fetch();

$sql3 = "SELECT proj_id,project_id,name,proj_abstract FROM too_projects WHERE proj_id='$project_id'";
$statement3=$mysqli->prepare($sql3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($proj_id,$project_id,$name,$proj_abstract);
$statement3->fetch();

$sql4 = "SELECT mentor_id FROM institution_project_assign WHERE institution_project_id='$institution_project_id' AND mentor_id!=''";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($mentor_id);
$statement4->fetch();

$sql5 = "SELECT student_info_id,s_first_name FROM student_info WHERE user_id='$mentor_id'";
$statement5=$mysqli->prepare($sql5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($student_info_id,$s_first_name);
$statement5->fetch();


?>
    <tr class="tr">
      <td align="center"><?php echo $i;?></td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="<?php echo $institution_project_id;?>" /></td>
      <td align="left"><?php echo $institution_project_id;?></td>
      <td class="td_txt"><?php echo $project_id;?></td>
      <td class="td_txt"><a href="productsView.php?id=<?php echo $proj_id;?>"><?php echo $name;?></a></td>
      <td class="td_num"><?php echo $proj_abstract;?></td>
      <td class="td_num"><a href="profileView3.php?id=<?php echo $user_id;?>" class=""><?php echo $co_name;?></a></td>
      <td class="td_num"><a href="userView.php?projectid=<?php echo $institution_project_id;?>" class="btn submitS"><i class="fa fa-search"></i></a></td>
      <td class="td_num"><a href="profileView8.php?id=<?php echo $student_info_id;?>" class=""><?php echo $s_first_name?></a></td>
      <td class="td_txt"><?php echo $updated_on;?></td>
      <td class="td_txt"><?php echo $status;?></td>
      <td class="td_txt">100%</td>
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
		<input id="button_action" name="button_action" class="submitM" type="submit" value="Delete" onclick="return confirmDelete();">
	 
		</td>				
    </tr>
</table>

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
