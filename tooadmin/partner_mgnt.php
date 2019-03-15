<?php  
$page="partner_mgnt";
$title="Partners";
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
		$querym = "UPDATE too_partner SET status= 'A' WHERE partner_id= ?";
		$action="GA";
	}else if($button_action=="Deactive") {
		$querym = "UPDATE too_partner SET status= 'D' WHERE partner_id= ?";
		$action="GA";
	}else if($button_action=="Delete") {
		$querym="Delete from too_partner WHERE partner_id= ?";
		$action="GA";
	}
	$statementm = $mysqli->prepare($querym);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statementm->bind_param('i',$ID);
        $statementm->execute();
}
  header("Location:partner_mgnt.php");
        exit;
}
if(isset($search))
{
	$qry='';
	if($search_partner!='' ||  $search_status!=''){
	$qry.=" AND partner_name LIKE '%".$search_partner."%'  AND status LIKE '%".$search_status."%'";
	}

}else{
$qry='';
}
$query="select partner_id, partner_category, partner_name, logo, partner_details, partner_link, DATE_FORMAT(partners_from_date, '%d/%m/%Y') as partners_from_date, status FROM too_partner WHERE partner_id!='' $qry ORDER BY partner_id DESC";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($partner_id,$partner_category,$partner_name,$logo,$partner_details,$partner_link,$partners_from_date,$status);

//========End Active / Deactive ===========//
include("header.php"); 
?>

<h1>
<span class="back">
<a href="partner_mgntAdd.php">Add Partner</a>
</span>
 Partner  &raquo;  List View 
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
		<input name="search_partner" id="search_partner" class="form-control" placeholder="Partner Name" type="text" value="<?php echo $search_partner; ?>"/>
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

<form name="partner_mgmt" action="#" method="post" enctype="multipart/form-data">
<div id="listView">
<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-striped tabBorder">
  <thead>
    <tr class="tr1">
      <th width="20"><strong>#</strong></th>
      <th width="30" align="center"><input type="checkbox" name="selall3" onclick="return selall1(this);" /></th>
      <th width="20"  align="left" ><i class="fa fa-pencil-square-o"></i></th>
      <th><strong><a href="#" class="linkB"> Partner Category </a></strong></th>
      <th><strong><a href="#" class="linkB"> Partner Name </a></strong></th>
      <th><strong><a href="#" class="linkB"> Partner Logo </a></strong></th>
      <th><strong><a href="#" class="linkB"> Partner Details </a></strong></th>
      <th><strong><a href="#" class="linkB"> Partner Link </a></strong></th>
      <th><strong><a href="#" class="linkB"> Partners from Date </a></strong></th>
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
      <td align="left"><input type="checkbox" name="checkbox1[]" value="<?php echo $partner_id; ?>"/></td>
      <td align="left"><a href="partner_mgntEdit.php?id=<?php echo $partner_id; ?>"><i class="fa fa-pencil-square-o" ></i></a> </td>
      <td><?php echo $partner_category; ?></td>
      <td><?php echo $partner_name; ?></td>
      <td><img src="../uploads/support_org/<?php echo $logo; ?>" width="60px"></td>
      <td><?php echo $partner_details; ?></td>
      <td><?php echo $partner_link; ?></td>
      <td><?php echo $partners_from_date; ?></td>
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
	checkAll(document.partner_mgmt,0)	
}else{checkAll(document.partner_mgmt,1)	}

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
for(i=0;i<=document.partner_mgmt.length-1;i++)
	{ 
	
	 if(document.partner_mgmt.elements[i].type=="checkbox") 
		{
		 if(document.partner_mgmt.elements[i].checked==true)
	        {
		
			 return true;
	 		 }
        }
	}
	
		msg+="Select the record";

		if(i!=1){i=1;
			msg1="document.partner_mgmt.elements[i]";
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
for(i=0;i<=document.partner_mgmt.length-1;i++)
	{ 
		if(document.partner_mgmt.elements[i].type=="checkbox") 
		{
		 if(document.partner_mgmt.elements[i].checked==true)
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
