<?php 
$page="topstudents";
include("../class/config.php");
include("../includes/functions.php");

extract($_REQUEST);
$type='SP';


if(isset($search))
     {
	$qry='';
	$qry1='';
	if($search_name!=''){
	$qry.=" AND s_first_name LIKE '%".$search_name."%'";
	}
	if($search_email!=''){
	$qry1.=" AND user_email LIKE '%".$search_email."%'";
	}
	

     }else{
        $qry='';
	$qry1='';
           }

$sql1="select project_id,name, proj_created_by";
$stmt1=$mysqli->prepare($sql1);
$stmt1->execute();
$stmt1->store_result();
$stmt1->bind_result($user_id,$email);


include("header.php");

?>
<link href="css/evince.css" rel="stylesheet" type="text/css" />


 
<h3>Top Projects</h3>

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
					<td><input name="search_name" id="search_name" class="form-control" placeholder="Student Name" type="text" value="<?php echo $search_name; ?>"/></td>
					<td><input name="search_email" id="search_email" class="form-control" placeholder="Email Id" type="text" value="<?php echo $search_email; ?>" /></td>
					<td><?php include("in_range.php"); ?></td>
					
					<td><input name="search" id="search" value="Search" class="submitM" type="submit" /></td>
					<td><input name="reset" id="reset" value="Reset" class="submitM" type="submit" onclick="empty_form('reset')"/></td>
				</tr>
			</tbody>
		</table>
	</form>

</div>

</div>
</div>

<div class="table-responsive" style="overflow:hidden;">
<form name="categoryView" method="post">
<table id="dataTable" class="table table-bordered table-striped tabBorder">

	<thead>
		<tr class="tr1">
			<td width="20" align="center">#</td>

			<td align="center">Project Id</td>
			<td align="center">Project Name</td>
			<td align="center">Project Added By</td>
			<td align="center">Institution</td>
			
		</tr>
	</thead>
	<?php 
$i=0;
while($stmt1->fetch()){
	 $i++;
	$sql2="select student_info_id,s_institution_name, s_first_name, s_last_name, status from student_info where user_id='$user_id'$qry";
	$stmt2=$mysqli->prepare($sql2);
	$stmt2->execute();
	$stmt2->store_result();
	$stmt2->bind_result($student_info_id,$s_institution_name,$s_first_name,$s_last_name,$status);
	while($stmt2->fetch()){


	$sql3="select co_name from customer_organisation where user_id='$s_institution_name'";
	$stmt3=$mysqli->prepare($sql3);
	$stmt3->execute();
	$stmt3->store_result();
	$stmt3->bind_result($co_name);
	$stmt3->fetch();

	$sql4="select count(*) as count,institution_project_id from institution_project_assign where student_id='$user_id'";
	$stmt4=$mysqli->prepare($sql4);
	$stmt4->execute();
	$stmt4->store_result();
	$stmt4->bind_result($count,$institution_project_id);
	$stmt4->fetch();

	
?>

		<tr class="tr">
			<td align="center"><?php echo $i;?></td>

			<td align="center" ><a href="profileView.php?id=<?php echo $student_info_id;?>&type=<?php echo $type;?>"><?php echo $s_first_name." ".$s_last_name;?></a></td>
			<td  align="center" ><?php echo $email;?></td>
			<td  align="center"><?php echo $co_name;?></td>
			<td  align="center" ><a href="projectsdetail.php?pro_id=<?php echo $user_id;?>"><?php echo $count;?></a></td>
			
		</tr>
	<?php } } ?>
</table>

</div>

<br>

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

function empty_form(val1){
    $("#"+val1).closest('form').find("input[type=text], select").val("");
}

</script>

