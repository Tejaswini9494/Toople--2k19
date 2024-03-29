<?php
$page="mentorProject";
$title="Mentor Projects";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
if ($_SESSION["type"]=='SPM'){
	$userid=$usid;
}else {
	$userid=$_SESSION["userid"];
}

//========Start Active / Deactive ===========//
$button_action=$_POST["button_action"];
if(isset($_POST["button_action"]))
{
for ($i=0; $i <count($_REQUEST['checkbox1']); $i++)
{
	$ID=$_REQUEST['checkbox1'][$i];
	//echo $ID;
	//exit;
	if ($button_action=="Completed") {
		$querym = "UPDATE  institution_project SET mentor_completion='Y' WHERE institution_project_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
        header("Location:mentorProject.php");
        
}


$nrows1=0;
$query1 = "SELECT institution_project_assign_id, institution_project_id, institution_id FROM  institution_project_assign  WHERE institution_project_assign_id!='' AND mentor_id='$userid' ORDER BY institution_project_assign_id DESC";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($institution_project_assign_id, $institution_project_id, $institution_id);
$nrows1=$statement1->num_rows();

include("header.php"); ?>

<h3 class="">Mentor Projects</h3>
<div class="gap30"></div>

<form name="frm" method="POST" enctype="multipart/form-data">
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></td>
			<td>Project ID</td>
			<td>Project Name</td>
			<td width="60%">Abstract</td>
			<td>View</td>
			<td>Completion Status</td>
		</tr>
	<?php $i=1; while($statement1->fetch()) {
		$query2 = "SELECT project_id, mentor_completion FROM  institution_project  WHERE institution_project_id='$institution_project_id'";
		$statement2=$mysqli->prepare($query2);
		$statement2->execute();
		$statement2->store_result();
		$statement2->bind_result($project_id, $mentor_completion);
		$statement2->fetch();

		if($mentor_completion=='Y') {
			$statusTxt="Completed";
		} else {
			$statusTxt="In Process";
		}

		$query3 = "SELECT project_id, name, proj_abstract FROM  too_projects  WHERE proj_id='$project_id'";
		$statement3=$mysqli->prepare($query3);
		$statement3->execute();
		$statement3->store_result();
		$statement3->bind_result($project_id1, $name1, $proj_abstract1);
		$statement3->fetch();
	?>
		<tr>
			<td><?php echo $i; ?></td>
			<td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $institution_project_id;?> "/></td>
			<td><?php echo $project_id1; ?></td>
			<td><?php echo $name1; ?></td>
			<td><?php echo $proj_abstract1; ?></td>
			<td><a href="mentorProjectView.php?ipid=<?php echo $institution_project_id; ?>" class="btn btn-success"><i class="fa fa-search"></i></a></td>
			<td><?php echo $statusTxt; ?></td>
		</tr>
	<?php $i++; } ?>
	</table>
</div>
<div class="gap30"></div>

<?php if($nrows1>0) { ?>
<div class="well">
	<input type="submit" name="button_action" id="button_action" value="Completed" class="submitM" onclick="return confirms();">
</div>
<?php } ?>
</form>

<div class="gap20"></div>
<?php include("footer.php"); ?>

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
</script>
