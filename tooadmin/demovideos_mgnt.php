<?php  
$page="demovideos_mgnt";
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
		$querym = "UPDATE too_demovideos SET status= 'A' WHERE demovid_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE too_demovideos SET status= 'D' WHERE demovid_id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym="Delete from too_demovideos WHERE demovid_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
  header("Location:demovideos_mgnt.php");
        exit;
}
if(isset($search))
{
	$qry='';
	if($search_title!=''){
		$qry.=" AND demovid_title LIKE '%".$search_title."%'";
	}
	if($search_status!=''){
		$qry.=" AND status='$search_status'";
	}

}else{
$qry='';
}
$query="select demovid_id, demovid_title, status from too_demovideos where demovid_id!='' $qry ORDER BY demovid_id DESC";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($demovid_id, $demovid_title, $status);

//========End Active / Deactive ===========//

include("header.php"); ?>
<?php// include("setTop.php");  ?>


<h1>
<span class="back">
<a href="demovideos_mgntAdd.php">Add Demo Video</a>
</span>
 Demo Video Managment
</h1>
 
<div id="searchBox">
<h2 class="show_hide"> Filter </h2><br class="clear" />


<div class="well filterBox">

<div class="searchBox">
<form name="frm1" id="frm1" action="" method="post" >
    <table align="center" cellpadding="0" cellspacing="0">
      <tr>
	<td><input name="search_title" id="search_title" class="form-control" placeholder="Video Title" type="text" value="<?php echo $search_title; ?>"/></td>
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
 <div class="gap100"></div>
<form name="too_demovideos" action="#" method="post" enctype="multipart/form-data">
<div id="listView">
<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-striped tabBorder">
  <thead>
    <tr class="tr1">
      <th width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></th>
      <td width="16" align="center"><img src="images/edit.png" alt="edit" /></td>
      <td><strong>#</strong></td>
      <td><strong><a href="#" class="linkB"> Video Title </a></strong></td>
      <td><strong><a href="#" class="linkB"> Status</a></strong></td>
    </tr>
  </thead>
    

<?php $i=0;
while($statement->fetch())
{ 
if($status=='A'){
$status1='Active';
}
elseif($status=='D'){
$status1='Deactive';
}
	$i++;
?>
    <tr class="tr">
      <td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $demovid_id;?> "/></td>
      <td   align="left"><a href="demovideos_mgntEdit.php?id=<?php echo $demovid_id; ?>"><img src="images/edit.png" alt="edit" /></a> </td>
      <td><?php echo $i;?></td>
      <td><?php echo $demovid_title; ?></td>
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
  <?php// include("setBot.php");  ?>

<?php include("footer.php");  ?>
<script type="text/javascript">
function selall1(aa1){ 

if(aa1.checked==true){
	checkAll(document.too_demovideos,0)	
}else{checkAll(document.too_demovideos,1)	}
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
for(i=0;i<=document.too_demovideos.length-1;i++)
	{ 
	 if(document.too_demovideos.elements[i].type=="checkbox") 
		{
		 if(document.too_demovideos.elements[i].checked==true)
	        {	
			 return true;
	 		 }
        }
	}
		msg+="Select the record";

		if(i!=1){i=1;
			msg1="document.too_demovideos.elements[i]";
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
for(i=0;i<=document.too_demovideos.length-1;i++)
	{ 
		if(document.too_demovideos.elements[i].type=="checkbox") 
		{
		 if(document.too_demovideos.elements[i].checked==true)
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

