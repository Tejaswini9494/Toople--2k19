<?php  
$page="metaCountry";
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
		$querym = "UPDATE master_country SET status= 'A' WHERE country_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE master_country SET status= 'D' WHERE country_id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym="Delete from master_country WHERE country_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
        header("Location:metaCountry.php");
        exit;
}
if(isset($search))
{
	$qry='';
	if($search_country!='' || $search_currency!='' || $search_status!=''){
	$qry.=" AND country_name LIKE '%".$search_country."%' AND currency LIKE '%".$search_currency."%'  AND status LIKE '%".$search_status."%'";
	}

}else{
$qry='';
}
$query="select * from master_country where country_id!='' $qry ORDER BY country_id DESC";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($country_id,$country_name,$currency,$isd_code,$created_by,$added_date,$updated_on,$status);

//========End Active / Deactive ===========//
include("header.php"); 
?>

<?php// include("setTop.php");  ?>


<h1>
<span class="back">
<a href="metaCountryAdd.php">Add Country</a>
</span>
 Settings  &raquo;  Meta  &raquo;    Country  &raquo;  View 
</h1>
 
<div id="searchBox">
<h2 class="show_hide"> Filter </h2><br class="clear" />


<div class="well filterBox">

<div class="searchBox">
<form name="frm1" id="frm1" action="" method="post" >
    <table align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right"> </td>

       		<td><input name="search_country" id="search_country" class="form-control" placeholder="Country" type="text" value="<?php echo $search_country; ?>"/></td>
		<td><input name="search_currency" id="search_currency" class="form-control" placeholder="Currency" type="text" value="<?php echo $search_currency; ?>"/></td>
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

    </table>
</form>
  </div>
</div>

 </div>
 <div class="gap50"></div>
<form name="frm" action="#" method="post" enctype="multipart/form-data">
<div id="listView">
<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-striped tabBorder">
  <thead>
    <tr class="tr1">
      <th width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></th>
      <td width="20"  align="left" ><i class="fa fa-pencil-square-o"></i></td>
      <td><strong>#</strong></td>
      <td><strong><a href="#" class="linkB"> Country </a></strong></td>
      <td><strong><a href="#" class="linkB"> Currency </a></strong></td>
      <td><strong><a href="#" class="linkB"> ISD Code</a></strong></td>
      <td><strong><a href="#" class="linkB"> Status</a></strong></td>
  
    </tr>
  </thead>

<?php $i=0;
while($statement->fetch())
{ 
if($status=='A'){
$status1="Active";
}
elseif($status=='D'){
$status1="Deactive";
}
	$i++;
?>
    <tr class="tr">
      <td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $country_id;?> "/></td>
      <td   align="left"><a href="metaCountryEdit.php?id=<?php echo $country_id; ?>"><i class="fa fa-pencil-square-o" ></i></a> </td>
      <td><?php echo $i;?></td>
      <td><?php echo $country_name; ?></td>
      <td><?php echo $currency; ?></td>
      <td><?php echo $isd_code; ?></td>
      <td><?php echo $status1; ?></td>
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
  </div>
</form>

<?php include("footer.php");  ?>

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
<script>
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
 					    search_country: {
                                            lettersonly: true,
                                            },
                                            search_currency: {
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

