<?php 
$page="program_mgnt";
include("../class/config.php");
include("../includes/functions.php");
extract($_REQUEST);

//echo date('d/m/Y');

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
		$query100="Delete from institution_project where institution_project_id=?";
		$statement100 = $mysqli->prepare($query100);
		$statement100->bind_param('i',$ID);
		$statement100->execute();

		$query101="Delete from institution_project_assign where institution_project_id=?";
		$statement101 = $mysqli->prepare($query101);
		$statement101->bind_param('i',$ID);
		$statement101->execute();

		$query102="DELETE FROM too_calender WHERE institution_project_id='$ID' AND calender_date <= '".date('Y-m-d')."'";
		//echo $query102; exit;
		$statement102 = $mysqli->prepare($query102);
		$statement102->execute();

		$query103 = "UPDATE too_calender SET status='A', institution_project_id='' WHERE institution_project_id= ?";
		$statement103 = $mysqli->prepare($query103);
		//bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
		$statement103->bind_param('i',$ID);
		$statement103->execute();

	}

	if($button_action!="Delete") {
	$statement = $mysqli->prepare($query);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement->bind_param('i',$ID);
        $statement->execute();
	}
}
      	//Notification Message
        header("Location:program_mgnt.php");
        exit;
}

if(isset($search))
{
	$qry='';
	if($search_id!='' || $search_name!=''){
	$qry.=" AND b.project_id LIKE '%".$search_id."%' AND b.name LIKE '%".$search_name."%'";
	}

}else{
$qry='';
}
//========End Active / Deactive ===========//


$sql1s = "SELECT a.institution_project_id,a.user_id,a.project_id, a.mentor_completion, a.coo_completion, a.updated_on,a.status,b.proj_id,b.project_id,b.name,b.proj_abstract FROM institution_project a,too_projects b WHERE a.project_id=b.proj_id AND a.assigned_status='Y'$qry";
$statement1s=$mysqli->prepare($sql1s);
$statement1s->execute();
$statement1s->store_result();
$statement1s->bind_result($institution_project_id,$user_id,$project_id, $mentor_completion, $coo_completion, $updated_on,$status,$proj_id,$project_id,$name,$proj_abstract);


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

<form name="frm1" id="frm1" action="" method="post" >
		<table class=" " align="center" >
			<tbody>
				<tr>
					<td><input name="search_id" id="search_id" class="form-control" placeholder="Project Id" type="text" value="<?php echo $search_id; ?>"/></td>
					<td><input name="search_name" id="search_name" class="form-control" placeholder="Project Name" type="text" value="<?php echo $search_name; ?>" /></td>
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
 

<form name="categoryView" action="#" method="post" enctype="multipart/form-data">
<div class="table-responsive">
<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
  <thead>
    <tr class="tr1">
      <td width="20" align="center">#</td>
      <td width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></td>  
      <td align="center">Program Id</td>
      <td align="center">Project Id</td>
      <td align="center">Project Name</td>
      <td align="center">Abstract</td>
      <td align="center">Institution Name</td>
      <td align="center">Student Details</td>
      <td align="center">Mentor</td>
      <td align="center">Payment</td>
      <td align="center">Created Date</td>
      <td align="center">Status</td>
<!--      <td align="left">Completion Status</td>	-->
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



$sql4 = "SELECT mentor_id FROM institution_project_assign WHERE institution_project_id='$institution_project_id' AND mentor_id!=''";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($mentor_id);
$statement4->fetch();

$sql5 = "SELECT student_info_id,user_id,s_first_name FROM student_info WHERE user_id='$mentor_id'";
$statement5=$mysqli->prepare($sql5);
$statement5->execute();
$statement5->store_result();
$statement5->bind_result($student_info_id,$user_id,$s_first_name);
$statement5->fetch();

if($mentor_completion=='Y' && $coo_completion=='Y') {
	$status_complete="Completed";
} else {
	$status_complete="In Process";
}

?>
    <tr class="tr">
      <td align="center"><?php echo $i;?></td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="<?php echo $institution_project_id;?>" /></td>
      <td align="center"><?php echo $institution_project_id;?></td>
      <td align="center" class="td_txt"><?php echo $project_id;?></td>
      <td  align="center" class="td_txt"><a href="productsView.php?id=<?php echo $proj_id;?>"><?php echo $name;?></a></td>
      <td><?php echo $proj_abstract;?></td>
      <td  align="center"class="td_num"><a href="profileView3.php?id=<?php echo $user_id;?>" class=""><?php echo $co_name;?></a></td>
      <td align="center" class="td_num"><a href="userView.php?proj_id=<?php echo $institution_project_id;?>" class="btn submitS"><i class="fa fa-search"></i></a></td>
      <td align="center" class="td_num"><a href="profileView8.php?id=<?php echo $student_info_id;?>" class=""><?php echo $s_first_name?></a></td>
      <td>
	<a href="mentorTransaction.php?uid=<?php echo $user_id; ?>&pid=<?php echo $proj_id;?>&instpid=<?php echo $institution_project_id;?>" class="submitM">Apply</a>
      </td>
      <td align="center" class="td_txt"><?php echo $updated_on;?></td>
      <td align="center"class="td_txt"><?php echo $status_complete;?></td>
<!--      <td class="td_txt">100%</td>	-->
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
 					    search_id: {
                                            alphanumeric: true,
                                            },
                                            search_name: {
                                            lettersonly: true,
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

