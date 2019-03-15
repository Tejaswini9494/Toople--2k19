<?php
$page="mentorCalendarCOO";
$title="Mentor Calendar";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$userid=$_SESSION["userid"];


//========Start Active / Deactive ===========//
$button_action=$_POST["button_action"];
if(isset($_POST["button_action"]))
{
for ($i=0; $i <count($_REQUEST['checkbox1']); $i++)
{
	$ID=$_REQUEST['checkbox1'][$i];
	//echo $ID;
	//exit;
	if ($button_action=="Remove") {
		$querym = "UPDATE too_calender SET status='A', institution_project_id='' WHERE calender_id= ?";
		$statementm = $mysqli->prepare($querym);
		$statementm->bind_param('i',$ID);
		$statementm->execute();
	}
	elseif ($button_action=="Assign") {
		$querym1 = "SELECT SUM(total_hrs) as total_hrs FROM  too_calender  WHERE user_id='$mentor_id' AND institution_project_id='$ipid'";
		$statementm1=$mysqli->prepare($querym1);
		$statementm1->execute();
		$statementm1->store_result();
		$statementm1->bind_result($total_hrs);
		$statementm1->fetch();

		$querym2 = "SELECT mentor_hrs FROM  institution_project  WHERE institution_project_id='$ipid'";
		$statementm2=$mysqli->prepare($querym2);
		$statementm2->execute();
		$statementm2->store_result();
		$statementm2->bind_result($mentor_hrs);
		$statementm2->fetch();

		$bal_hrs=$mentor_hrs-$total_hrs;

		$querym4 = "SELECT total_hrs FROM  too_calender  WHERE calender_id='$ID'";
		$statementm4=$mysqli->prepare($querym4);
		$statementm4->execute();
		$statementm4->store_result();
		$statementm4->bind_result($total_hrs1);
		$statementm4->fetch();

		if($total_hrs1 <= $bal_hrs) {
			$querym3 = "UPDATE too_calender SET status='B', institution_project_id='$ipid' WHERE calender_id= ?";
			$statementm3 = $mysqli->prepare($querym3);
			$statementm3->bind_param('i',$ID);
			$statementm3->execute();
			$mentor_hrs="";
		}
	}

}
        //header("Location:coordinator_project.php");

}

$nrows1=0;
$query1 = "SELECT mentor_id FROM  institution_project_assign  WHERE institution_project_id='$ipid' AND mentor_id>0";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($mentor_id);
$statement1->fetch();
$nrows1=$statement1->num_rows();

$query2 = "SELECT calender_id, institution_project_id, DATE_FORMAT(calender_date, '%d/%m/%Y') as calender_date, from_time, to_time, total_hrs, status FROM  too_calender  WHERE user_id='$mentor_id' ORDER BY calender_date";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($calender_id, $institution_project_id, $calender_date, $from_time, $to_time, $total_hrs, $status);


include("header.php"); ?>

<h3 class="">Mentor Calendar</h3>
<div class="gap30"></div>

<?php if($mentor_hrs!='') { ?>
<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> Please schedule not more <?php echo $mentor_hrs; ?> than hrs.
</div>
<?php } ?>

<form name="frm" method="POST" enctype="multipart/form-data">
<input type="hidden" id="mentor_id" name="mentor_id" value="<?php echo $mentor_id; ?>">
<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></td>
			<td>Date</td>
			<td>From Time</td>
			<td>To Time</td>
			<td>Hours</td>
			<td>Status</td>
		</tr>
	<?php $i=1; while($statement2->fetch()) {
		if($status=='A') { $statusTxt="Available"; }
		elseif($status=='B') {
			if($institution_project_id==$ipid) {
				$statusTxt="Assigned";
			} else {
				$statusTxt="Blocked";
			}
		}
	?>
		<tr>
			<td width="30"><?php echo $i; ?></td>
			<td align="left">
			<?php if($statusTxt!="Blocked") { ?>
				<input type="checkbox" name="checkbox1[]" value="<?php echo $calender_id;?> "/>
			<?php } ?>
			</td>
			<td><?php echo $calender_date; ?></td>
			<td><?php echo $from_time; ?></td>
			<td><?php echo $to_time; ?></td>
			<td><?php echo $total_hrs; ?></td>
			<td align="center"><?php echo $statusTxt; ?></td>
		</tr>
	<?php $i++; } ?>
	</table>
</div>
<div class="gap30"></div>

<div class="well">
	<input type="submit" name="button_action" id="button_action" value="Remove" class="submitM" onclick="return confirms();"> &nbsp;
	<input type="submit" name="button_action" id="button_action" value="Assign" class="submitM" onclick="return confirms();">
</div>
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
