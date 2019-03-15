<?php 
$page="trans_mgnt";

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
		$querym = "UPDATE  too_transactions SET status= 'A' WHERE trans_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE too_transactions SET status= 'D' WHERE trans_id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym="Delete from too_transactions WHERE trans_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
        header("Location:trans_mgnt.php");
        
}

if(isset($search))
{
	$qry='';
	if($trans_id!=''){
	$qry.=" AND trans_id LIKE '%".$trans_id."%'";
	}

}else{
$qry='';
}

$sql1="SELECT trans_id, user_id, trans_currency, trans_amt, DATE_FORMAT(updated_on, '%d/%m/%Y') as updated_on FROM too_transactions WHERE trans_id!='' $qry";
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($trans_id, $user_id, $trans_currency, $trans_amt, $updated_on);


include("header.php"); ?> 


<h3>Transactions &raquo; List View
<a href="trans_add.php" class="submitM pull-right">Add</a>
</h3>

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
					<td><input name="trans_id" id="trans_id" class="form-control" placeholder="Transactions Id" type="text" value="<?php echo $trans_id; ?>"/></td>
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
      <td align="center">Date</td>
      <td align="center">Transactions Id</td>
      <td align="center">User</td>
      <td align="center">Currency</td>
      <td align="center">Transaction Amount</td>
    </tr>
  </thead>
<?php
$i=1;
while($statement1->fetch()) {

$sql2="SELECT co_name FROM customer_organisation WHERE user_id=$user_id";
$statement2=$mysqli->prepare($sql2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($co_name2);
$statement2->fetch();

$sql3="SELECT currency FROM master_country WHERE country_id=$trans_currency";
$statement3=$mysqli->prepare($sql3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($currency3);
$statement3->fetch();

?>

  <tr class="tr">
	<td align="center"><input type="checkbox" name="checkbox1[]" value="<?php echo $trans_id;?> "/></td>
	<td align="center"><?php echo $i;?></td>
	<td align="center"><?php echo $updated_on;?></td>
	<td align="center"><?php echo $trans_id;?></td>
	<td align="center"><?php echo $co_name2;?></td>
	<td align="center"><?php echo $currency3;?></td>
	<td align="center"><?php echo numbToDesi($trans_amt);?></td>
    </tr>
 <?php $i++; } ?>
</table>
</div>

<br>
<table class="table table-bordered table-striped tabBorder">
   <tr class="tr" align="center">
      <td   align="left" colspan="5">
	<input type="submit" name="button_action" id="button_action" value="Delete" class="submitM" onclick="return confirmDelete();">
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
 					   trans_id: {
                                            alphanumeric: true,
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

