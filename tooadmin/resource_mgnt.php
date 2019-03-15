<?php  
$page="resource_mgnt";
$title="Resources";
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
		$querym = "UPDATE too_resources SET status= 'A' WHERE resource_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE too_resources SET status= 'D' WHERE resource_id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym="Delete from too_resources WHERE resource_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
  header("Location:resource_mgnt.php");
        exit;
}
if(isset($search))
{
	$qry='';
	if($search_restype!='') {
	$qry.=" AND resource_type='$search_restype'";
	}
	if($search_restitle!='') {
	$qry.=" AND resource_title LIKE '%".$search_restitle."%'";
	}


}else{
$qry='';
}
$query="select resource_id, resource_title, resource_type, status from too_resources where resource_id!='' $qry ORDER BY resource_id DESC";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($resource_id, $resource_title, $resource_type, $status);

//========End Active / Deactive ===========//

include("header.php"); 
?>

<?php// include("setTop.php");  ?>


<h1>
<span class="back">
<a href="resource_mgntAdd.php">Add Resources</a>
</span>
 Resources  &raquo;  List View 
</h1>
 
<div id="searchBox">
<h2 class="show_hide"> Filter </h2><br class="clear" />


<div class="well filterBox">

<div class="searchBox">
<form name="frm1" id="frm1" action="" method="post" >
    <table align="center" cellpadding="0" cellspacing="0">
      <tr>
	<td align="right"> </td>
	<td><input name="search_restitle" id="search_restitle" class="form-control" placeholder="Resources Name" type="text" value="<?php echo $search_restitle; ?>"/></td>
	<td>
		<select name="search_restype" id="search_restype" class="form-control">
			<option value="">Resource Type</option>
			<option value="20" <?php if($search_restype=='20') { echo 'selected'; } ?>>Tutorial</option>
			<option value="21" <?php if($search_restype=='21') { echo 'selected'; } ?>>Learn Videos</option>
			<option value="22" <?php if($search_restype=='22') { echo 'selected'; } ?>>Assessments</option>
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
      <th width="20"><strong>#</strong></th>
      <th width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></th>
      <th width="20"  align="left" ><i class="fa fa-pencil-square-o"></i></th>
      <th><strong><a href="#" class="linkB"> Resource Type </a></strong></th>
      <th><strong><a href="#" class="linkB"> Resource Title </a></strong></th>
      <th><strong><a href="#" class="linkB"> Status</a></strong></th>
    </tr>
  </thead>
<?php $i=0; while($statement->fetch()) {
	if($status=='A'){
	$status1='Active';
	}
	elseif($status=='D'){
	$status1='Deactive';
	}
	$i++;
?>

    <tr class="tr">
      <td><?php echo $i; ?></td>
      <td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $resource_id; ?>"/></td>
      <td align="left"><a href="resource_mgntEdit.php?id=<?php echo $resource_id; ?>"><i class="fa fa-pencil-square-o" ></i></a> </td>
      <td><?php echo getValue('category_for', 'category_list', 'category_for', $resource_type); ?></td>
      <td><?php echo $resource_title; ?></td>
      <td><?php echo $status1; ?></td>
    </tr>
<?php } ?>  

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
 					    search_news: {
                                            lettersonly: true,
                                            },
                                           search_content: {
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

