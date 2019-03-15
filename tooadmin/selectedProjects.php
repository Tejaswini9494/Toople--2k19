<?php 
$page="products";

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
		$querym = "UPDATE  too_algorithm SET status= 'A' WHERE algo_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE too_algorithm SET status= 'D' WHERE algo_id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym="Delete from too_algorithm WHERE algo_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
        header("Location:selectedProjects.php");
        
}

if(isset($search))
{
	$qry='';
	if($search_id!='' || $search_name!='' || $search_category!='' || $search_status!=''){
	$qry.=" AND algorithm_id LIKE '%".$search_id."%' AND name LIKE '%".$search_name."%' AND category LIKE '%".$search_category."%' AND status LIKE '%".$search_status."%'";
	}

}else{
$qry='';
}


$sql="select * from too_algorithm where algo_id!='' $qry";
//echo $sql;
$sql=$mysqli->prepare($sql);
$sql->execute();
$sql->store_result();
$sql->bind_result($algo_id,$algorithm_id,$name,$category,$objectives,$complexity,$busi_scenerio,$pblm_stmt,$exp_outcome,$tools,$ref_url,$imgdoc,$created_by,$added_date,$updated_on,$status);


include("header.php");?> 


<h3>
<!--<a href="algoadd.php" class="submitM pull-right">Add</a>-->
Algorithm &raquo; List View</h3>

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
					<td><input name="search_id" id="search_id" class="form-control" placeholder="Algorithm Id" type="text" value="<?php echo $search_id; ?>"/></td>
					<td><input name="search_name" id="search_name" class="form-control" placeholder="Algorithm Name" type="text" value="<?php echo $search_name; ?>" /></td>
					<td>
					<input name="search_category" id="search_category" placeholder="Category" class="form-control" value="<?php echo $search_category; ?>" / >
					
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
<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
  <thead>
      <tr class="tr1">
     <th width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></th>
      <td width="20" align="center">#</td>
      <td width="16" align="center"><img src="images/edit.png" alt="edit" /></td>
      <td align="left">Algorithm Id</td>
      <td align="left">Algorithm Name</td>
      <td align="left"> Category</td>
      <td align="left">Objectives</td>
      <td align="left">Complexity</td>
      <td align="left">Tools</td>
      <td align="left">Status</td>
      </tr>
  </thead>
<?php $i=0;
while($sql->fetch())
{ 
	$abc="select subcategory_name from master_subcategory where subcategory_id='$category'";
	$statementt=$mysqli->prepare($abc);
	$statementt->execute();
	$statementt->store_result();
	$statementt->bind_result($subcategory_name);
	$statementt->fetch();

	$sql4 = "SELECT subcategory_id, subcategory_name FROM  master_subcategory  WHERE subcategory_id='$complexity'";
	$statement4=$mysqli->prepare($sql4);
	$statement4->execute();
	$statement4->store_result();
	$statement4->bind_result($subcategory_id1, $subcategory_name1);
	$statement4->fetch();

	if($status=='A'){
	$status1='Active';
	}
	elseif($status=='D'){
	$status1='Dective';
	}
	elseif($status=='SFA'){
	$status1='Sending For Approval';
	}
	$i++;
?>
  <tr class="tr">
      <td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $algo_id;?> "/></td>
	 <td><?php echo $i;?></td>
      <td align="left"><a href="algoadd.php?aid=<?php echo $algo_id; ?>"><i class="fa fa-pencil-square-o" ></i></a></td>
	 <td><?php echo $algorithm_id; ?></td>
      <td><a href="algoView.php?id=<?php echo $algo_id; ?>"><?php echo $name; ?></a></td>
	 <td><?php echo $subcategory_name; ?></td>
	 <td><?php echo $objectives; ?></td>
	 <td><?php echo $subcategory_name1; ?></td>
	 <td><?php echo $tools; ?></td>
	<td><?php echo $status1; ?></td>
	
      
    </tr>
<?php } ?>
</table>
</div>

<br>
<table class="table table-bordered table-striped tabBorder">
   <tr class="tr" align="center">
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
	
                                            search_category: {
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

