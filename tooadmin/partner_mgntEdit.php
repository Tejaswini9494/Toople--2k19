<?php  
$page="client_mgntEdit";
$title="Clients Edit";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

//$id=$_GET['id'];
/*----------------- -----------------*/
if(isset($submit))
{

	$path = "../uploads/support_org/";
	$imgUp= "";
        $name="logo";
        if($_FILES[$name]["size"]>0)
        {
                //echo $_FILES[$name]["size"].'###';

                $img_name= $_FILES[$name]['name']; 
                $val1=explode(".",$img_name);
                $tmp_file = $_FILES[$name]['tmp_name'];
                $imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
                $imgtype=strtolower($imgtype);        
                if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg'){
                $name_file = $val1[0].time().".".$imgtype;
                move_uploaded_file($tmp_file,$path.$name_file);
		
                $imgUp=", logo='$name_file'";

                }
        }

	$dte = sysConvert($partners_from);
	///echo $id."#".$partner_category."#".$partner_name."#".$partner_details."#".$partner_link."#".$dte;
	$query = "UPDATE too_partner SET partner_category=?, partner_name=? $imgUp,  partner_details=?, partner_link=?, partners_from_date=? WHERE partner_id='$id'";
	
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('sssss', $partner_category, $partner_name , $partner_details, $partner_link, $dte);
	$statement->execute();
	
	header("Location:partner_mgnt.php");
}

include("header.php"); 
//$id=$_GET['id'];
$sql1 = "SELECT partner_id, partner_category, partner_name, logo, partner_details, partner_link, DATE_FORMAT(partners_from_date, '%d/%m/%Y') as partners_from_date FROM  too_partner  WHERE partner_id='$id'";
//echo $sql1;
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($partner_id1, $partner_category1, $partner_name1, $logo1, $partner_details1, $partner_link1, $partners_from_date1);
$statement1->fetch();
?>

<h1> Partner  &raquo;  Edit </h1>

<form method="post" id="form_org" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="right"> Partner Category :<span class="red">*</span></td>
      <td><input type="text" name="partner_category" id="partner_category" placeholder=" Partner Category" class="boxM" value="<?php echo $partner_category1; ?>"></td>
    </tr>
    <tr>
      <td align="right"> Partner Name :<span class="red">*</span></td>
      <td><input type="text" name="partner_name" id="partner_name" placeholder=" Partner Name" class="boxM" value="<?php echo $partner_name1; ?>"></td>
    </tr>

    <tr>
      <td align="right"> Logo :<span class="red">*</span></td>
      <td><input type="file" name="logo" id="logo" placeholder="" class="boxM" ></td>
	 <td><img src="../uploads/support_org/<?php echo $logo1;?>" width="100" height="100"></td>
    </tr>
   <tr>
      <td align="right"> Partner Details :<span class="red">*</span></td>
      <td><input type="text" name="partner_details" id="partner_details" placeholder=" Partner Details" class="boxM" value="<?php echo $partner_details1; ?>" ></td>
    </tr>
   <tr>
      <td align="right"> Partner Link :<span class="red">*</span></td>
      <td><input type="text" name="partner_link" id="partner_link" placeholder=" Partner Link" class="boxM " value="<?php echo $partner_link1; ?>"></td>
    </tr>
   <tr>
      <td align="right"> Partners from Date :<span class="red">*</span></td>
      <td><input type="text" name="partners_from" id="partners_from"  class=" boxM" value="<?php echo $partners_from_date1; ?>" ></td>
    </tr>

	<tr>
	    <td align="right" valign="top">&nbsp;</td>
	    <td><input name="submit" id="submit" type="submit" value="Submit" class="submit" />
		<a href="partner_mgnt.php" class="submit">Cancel</a></td>
	</tr>  </table>
</form>

<?php include("footer.php");  ?>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/validation.js"></script>

<script type="text/javascript">

$( function() {

		$( "#partners_from" ).datepicker({
               dateFormat:"dd/mm/yy",
		       	}); 
});

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#form_org").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					    org_name: {
                                            required: true,
                                            },
					    logo: {
                                            //required: true,
					    accept: "jpg|jpeg|gif|png",
                                            },
                    },


				//The error message Str here

           messages: {
			logo: {
			accept: "Please enter a valid extension(.png, .jpg, .jpeg, .gif)."
			},
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
