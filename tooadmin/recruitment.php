<?php 
$page="recruitment";
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
		$querym = "UPDATE  recruitment_details SET status= 'A' WHERE recruitment_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE recruitment_details SET status= 'D' WHERE recruitment_id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym="Delete from recruitment_details WHERE recruitment_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
        header("Location:recruitment.php");
        
}






if(isset($search))
{
	$qry='';
	if($search_company!='' || $search_position!='' || $search_job_location!=''|| $search_status!=''){
	$qry.=" AND company LIKE '%".$search_company."%' AND position LIKE '%".$search_position."%' AND job_location LIKE '%".$search_job_location."%' AND status LIKE '%".$search_status."%'";
	}

}else{
$qry='';
}
include("header.php");
?> 

<h3>
<!--<a href="productsAdd.php" class="submitM pull-right">Add</a>-->
Recruitment &raquo; List View</h3>

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
					<td><input name="search_company" id="search_company" class="form-control" placeholder="company" type="text" value="<?php echo $search_company; ?>"/></td>
					<td><input name="search_position" id="search_position" class="form-control" placeholder="position" type="text" value="<?php echo $search_position; ?>"/></td>
					<td>
					<input type="text" name="search_job_location" id="search_job_location" placeholder="job_location" class="form-control"  value="<?php echo $search_job_location; ?>" />
					
					</td>
					
					<td>
					<select name="search_status" id="search_status" class="form-control" >
					<option value="">All Staus</option>
					<option value="A" <?php if($search_status=='A') { echo "selected"; } ?>>Active</option>
					<option  value="D" <?php if($search_status=='D') { echo "selected"; } ?>>Deactivated</option>
					<option value="SFA" <?php if($search_status=='SFA') { echo "selected"; } ?>>Sending for Approval</option>
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
<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
  <thead>
       <tr class="tr1">
     <td width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></td>
      <td width="20" align="center">#</td>
      <td width="16" align="center"><img src="images/edit.png" alt="edit" /></td>
      <td align="left">Company</td>
      <td align="left">Position</td>
      <td align="left">% Achieved</td>
      <td align="left">Job Location</td>
      <td align="left">Hiring Process</td>
      <td align="left">Status</td>
      </tr>
  </thead>

 <?php $i=0;

$sql="select recruitment_id,company, position, eligibility_percentage_achieved, job_location, hiring_process, status FROM recruitment_details where recruitment_id!=''$qry";
$sql=$mysqli->prepare($sql);
$sql->execute();
$sql->store_result();
$sql->bind_result($recruitment_id,$company,$position,$eligibility_percentage_achieved,$job_location,$hiring_process,$status);
while($sql->fetch())
{ 
	

      

if($status=='A'){
$status1='Active';
}
elseif($status=='D'){
$status1='Deactive';
}
elseif($status=='SFA'){
$status1='Sending for Approval';
}
    $i++;
?>
  <tr class="tr">
      <td align="center"><input type="checkbox" name="checkbox1[]" value="<?php echo $recruitment_id;?> "/></td>
	 <td><?php echo $i;?></td>
      <td align="left"><a href="recruitmentedit.php?pid=<?php echo $recruitment_id; ?>"><i class="fa fa-pencil-square-o" ></i></a></td>
	
      <td><?php echo $company; ?></a></td>
	 <td><?php echo  $position; ?></td>
	 <td><?php echo $eligibility_percentage_achieved; ?></td>
	 <td><?php echo $job_location; ?></td>
	 <td><?php echo $hiring_process; ?></td>
	<td><?php echo $status1; ?></td>
	
      
    </tr>
 <?php
} 
?>
</table>
</div>

<br>
<table class="table table-bordered table-striped tabBorder">
    <tr class="tr" align="center">
      <td align="left" colspan="5">
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
 					    
                                            search_company: {
                                            lettersonly: true,
                                            },
	
                                            search_position: {
                                            lettersonly: true, 					
                                            },
                                           search_job_location: {
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

