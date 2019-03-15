<?php
$page="myProject";
$title="My Projects";

include_once("class/config.php");
include_once("includes/functions.php");
extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];
//echo $user_id;


//========Start interested Project===========//
$button_action=$_POST["button_action"];	
if(isset($_POST["button_action"]))
{
for ($i=0; $i <count($_REQUEST['changeStatus']); $i++)
{
	$ID=$_REQUEST['changeStatus'][$i];
	if ($button_action=="Add interested project") {
		$query = "INSERT INTO mentor_interested_project (mentor_id, proj_id) VALUES (?,?)";
		$statements = $mysqli->prepare($query);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        	$statements->bind_param('ii',$user_id,$ID);
       		 $statements->execute();

		header("location:mentorProjectSelection.php");
	}
}
}


$button_action1=$_POST["button_action1"];	
if(isset($_POST["button_action1"]))
{
for ($k=0; $k <count($_REQUEST['changeStatus1']); $k++)
{
	$ID=$_REQUEST['changeStatus1'][$k];
	if($button_action1=="Reject project") {
		$query="Delete from mentor_interested_project where mentor_interested_project_id=?";
		$statements = $mysqli->prepare($query);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        	$statements->bind_param('i',$ID);
       		 $statements->execute();
	     header("location:mentorProjectSelection.php");
	}
}

}
      	//Notification Message
        
        

//========End interested Project ===========//
$tech_area='';
$sql1s = "SELECT s_technical_area FROM student_technical_skills WHERE user_id='$user_id'";
$statement1s=$mysqli->prepare($sql1s);
$statement1s->execute();
$statement1s->store_result();
$statement1s->bind_result($technical);
while($statement1s->fetch()){
	if($tech_area!=''){
	$tech_area.="','";
	}
	$tech_area.=$technical;
}

$sql1 = "SELECT a.proj_id, a.project_id, a.name, a.proj_abstract FROM too_projects a, student_technical_skills b WHERE a.dev_platform IN('$tech_area') AND a.dev_platform=b.s_technical_area AND b.user_id='$user_id' AND a.status='A'";
//$sql1 = "SELECT proj_id, project_id, name, proj_abstract FROM too_projects WHERE dev_platform LIKE '%$technical%' AND status='A'";
//echo $sql1;
$statement11=$mysqli->prepare($sql1);
$statement11->execute();
$statement11->store_result();
$statement11->bind_result($proj_id, $project_id, $name, $proj_abstract);
$nrows1=$statement11->num_rows();


$sql3s = "SELECT mentor_interested_project_id,proj_id,mentor_id FROM mentor_interested_project WHERE mentor_id='$user_id'";
$statement3s=$mysqli->prepare($sql3s);
$statement3s->execute();
$statement3s->store_result();
$statement3s->bind_result($mentor_interested_project_id7,$proj_id7,$mentor_id7);
$nrows2=$statement3s->num_rows();

include("header.php"); 
?>

<h3 class=""> Projects</h3>
<div class="gap30"></div>

<form name="categoryView" method="post">

<div class="table-responsive">
	<table id="dataTable" class="table table-bordered table-striped">
		 <thead>
		<tr class="tr1">
			<td>S.No.</td>
			<td width="10" align="center"><input type="checkbox" onclick="return selall1(this);" /></td>
			<td>Project Code</td>
			<td>Project Name</td>
			<td width="60%">Abstract</td>
			<td>View</td>
			
		</tr>
		 </thead>
<?php if($nrows1>0) {
$i=1; While($statement11->fetch()) {

$nrows4=0;
$sql1e = "SELECT mentor_interested_project_id FROM mentor_interested_project WHERE mentor_id='$user_id' AND proj_id='$proj_id'";
$statement1e=$mysqli->prepare($sql1e);
$statement1e->execute();
$statement1e->store_result();
$statement1e->bind_result($mentor_interested_project_id);
$nrows4=$statement1e->num_rows();

if($nrows4==0) { 
?>
		<tr>
			<td><?php echo $i;?></td>
			<td align="left"><input type="checkbox" name="changeStatus[]" value="<?php echo $proj_id;?>" /></td>
			<td><?php echo $project_id;?></td>
			<td><?php echo $name;?></td>
			<td><?php echo $proj_abstract;?></td>
			<td><a href="tooprojects_view.php?pid=<?php echo $proj_id;?>&shw=Y" class="btn btn-success"><i class="fa fa-search"></i></a></td>
		</tr>

<?php $i++; } } } else { ?>
	<tr class="text-center"><td colspan="6" >No Records Found</td></tr>
<?php } ?>

	</table>
</div>
<div class="gap20"></div>
		<div>
			<input id="button_action" name="button_action" class="submitM" type="submit" value="Add interested project" onclick="return confirms();">
		</div>
</form>
<div class="gap20"></div>
<hr>
<div class="gap20"></div>
<h3 class="">Interested Projects</h3>
<div class="gap15"></div>


<form name="categoryView1" method="post">
<div class="table-responsive">
	<table id="dataTable11" class="table table-bordered table-striped">
		 <thead>
		<tr class="tr1">
			<td>S.No.</td>
			<td width="10" align="center"><input type="checkbox" onclick="return selall2(this);" /></td>
			<td>Project Code</td>
			<td>Project Name</td>

			<td width="60%">Abstract</td>
			<td>View</td>
		</tr>
		 </thead>
<?php $i=0; While($statement3s->fetch()) { $i++;


$sql2d = "SELECT proj_id,project_id,name,proj_abstract FROM too_projects WHERE proj_id='$proj_id7'";
$statement2d=$mysqli->prepare($sql2d);
$statement2d->execute();
$statement2d->store_result();
$statement2d->bind_result($proj_id1,$project_id1,$name1,$proj_abstract1);
$statement2d->fetch();

?>
		<tr>
			<td><?php echo $i;?></td>
			<td align="left"><input type="checkbox" name="changeStatus1[]" value="<?php echo $mentor_interested_project_id7;?>" /></td>
			<td><?php echo $project_id1;?></td>
			<td><?php echo $name1;?></td>

			<td><?php echo $proj_abstract1;?></td>
			<td><a href="tooprojects_view.php?pid=<?php echo $proj_id1;?>&shw=Y" class="btn btn-success"><i class="fa fa-search"></i></a></td>

		</tr>
<?php } if($nrows2<1) { ?>
	<tr class="text-center"><td colspan="7" >No Record selected</td></tr>
<?php } ?>		
	</table>
</div>
<div class="gap20"></div>
<div>
			<input id="button_action1" name="button_action1" class="submitM" type="submit" value="Reject project" onclick="return confirms1();">
		</div>
</form>
<div class="gap20"></div>
<?php include("footer.php"); ?>

<script type="text/javascript">
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
</script>
<script type="text/javascript">
function selall2(aa1){ 

if(aa1.checked==true){
	checkAll(document.categoryView1,0)	
}else{checkAll(document.categoryView1,1)	}

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

function confirms1()
{	
var msg='';
var i=0;
for(i=0;i<=document.categoryView1.length-1;i++)
	{ 
	
	 if(document.categoryView1.elements[i].type=="checkbox") 
		{
		 if(document.categoryView1.elements[i].checked==true)
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
</script>
