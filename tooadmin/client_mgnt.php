<?php  
$page="client_mgnt";
$title="Clients";
//include_once ("../includes/functions.php");
//include_once ("../class/config.php");
extract($_REQUEST);

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
		$querym = "UPDATE supporting_org SET status= 'A' WHERE id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE supporting_org SET status= 'D' WHERE id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym="Delete from supporting_org WHERE id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
  header("Location:client_mgnt.php");
        exit;
}
if(isset($search))
{
	$qry='';
	if($search_org!='' ||  $search_status!=''){
	$qry.=" AND org_name LIKE '%".$search_org."%'  AND status LIKE '%".$search_status."%'";
	}

}else{
$qry='';
}
$query="select id,org_name,org_logo,org_link,status FROM supporting_org WHERE id!='' $qry ORDER BY id DESC";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($id,$org_name,$org_logo,$org_link,$status);

//========End Active / Deactive ===========//
include("header.php"); 
?>

<h1>
<span class="back">
<a href="client_mgntAdd.php">Add Organisation</a>
</span>
 Organisations  &raquo;  List View 
</h1>
 
<div id="searchBox">
<h2 class="show_hide"> Filter </h2><br class="clear" />


<div class="well filterBox">

<div class="searchBox">
<form name="frm1" id="frm1" action="" method="post" >
    <table align="center" cellpadding="0" cellspacing="0">
      <tr>
	<td align="right"> </td>
	<td>
		<input name="search_org" id="search_org" class="form-control" placeholder="Organisation Name" type="text" value=""/>
	</td>
	<td>
		<select name="search_status" id="search_status" class="form-control" >
		<option value="">All Staus</option>
		<option value="A" <?php if($search_status=='A') { echo "selected"; } ?>>Active</option>
		<option  value="D" <?php if($search_status=='D') { echo "selected"; } ?>>Deactive</option>
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
      <th><strong><a href="#" class="linkB"> Organisation Name </a></strong></th>
      <th><strong><a href="#" class="linkB"> Organisation Logo </a></strong></th>
      <th><strong><a href="#" class="linkB"> Organisation Link </a></strong></th>
      <th><strong><a href="#" class="linkB"> Status</a></strong></th>
    </tr>
  </thead>
<?php 
$i=1;
while($statement->fetch())
{ 
if($status=='A'){
$status1='Active';
}
elseif($status=='D'){
$status1='Deactive';
}
?>
    <tr class="tr">
      <td><?php echo $i; ?></td>
      <td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $id; ?>"/></td>
      <td align="left"><a href="client_mgntEdit.php?id=<?php echo $id; ?>"><i class="fa fa-pencil-square-o" ></i></a> </td>
      <td><?php echo $org_name; ?></td>
      <td><img src="../uploads/support_org/<?php echo $org_logo; ?>" width="60px"></td>
      <td><?php echo $org_link; ?></td>
      <td><?php echo $status1; ?></td>
    </tr>
<?php $i++; } ?>
</table>
</div>
<br>

<table class="table table-bordered table-striped tabBorder">
    <tr class="tr2">
	<td align="left" colspan="5">
	<input type="submit" name="button_action" id="button_action" value="Delete" class="submitM" onclick="return confirmDelete();">
	<input type="submit" name="button_action" id="button_action" value="Active" class="submitM" onclick="return confirms();">
	<input type="submit" name="button_action" id="button_action" value="Deactive" class="submitM" onclick="return confirms();">
	</td>
    </tr>
</table>
  </div>
</form>

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

function empty_form(val1){
    $("#"+val1).closest('form').find("input[type=text], select").val("");
}
</script>
<?php include("footer.php"); ?>
