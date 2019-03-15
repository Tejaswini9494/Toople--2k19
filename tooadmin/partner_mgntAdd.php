<?php  
$page="partner_mgntAdd";
$title="Partners Add";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit))
{
$path = "../uploads/support_org/";
        $name="org_logo";
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
		
                $imgUp=$name_file;

                }
        }

	$status="A";
	$dte = sysConvert($partners_from);
	$query = "INSERT INTO too_partner(partner_category, partner_name, logo, partner_details, partner_link, partners_from_date, status, added_date) VALUES(?,?,?,?,?,?,?,now())";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('sssssss', $partner_category, $partner_name, $imgUp,$partner_details, $partner_link, $dte, $status);
	$statement->execute();

	header("Location:partner_mgnt.php");
	exit;
}
include("header.php"); ?>

<h1> Partner  &raquo;  Add </h1>

<form method="post" id="form_org" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="right"> Partner Category :<span class="red">*</span></td>
      <td><input type="text" name="partner_category" id="partner_category" placeholder=" Partner Category" class="boxM" ></td>
    </tr>
    <tr>
      <td align="right"> Partner Name :<span class="red">*</span></td>
      <td><input type="text" name="partner_name" id="partner_name" placeholder=" Partner Name" class="boxM"></td>
    </tr>

    <tr>
      <td align="right"> Logo :<span class="red">*</span></td>
      <td><input type="file" name="org_logo" id="org_logo" placeholder="" class="boxM"></td>
    </tr>
   <tr>
      <td align="right"> Partner Details :<span class="red">*</span></td>
      <td><input type="text" name="partner_details" id="partner_details" placeholder=" Partner Details" class="boxM" ></td>
    </tr>
   <tr>
      <td align="right"> Partner Link :<span class="red">*</span></td>
      <td><input type="text" name="partner_link" id="partner_link" placeholder=" Partner Link" class="boxM"></td>
    </tr>
   <tr>
      <td align="right"> Partners from Date :<span class="red">*</span></td>
      <td><input type="text" name="partners_from" id="partners_from"  class=" boxM" ></td>
    </tr>

	<tr>
	    <td align="right" valign="top">&nbsp;</td>
	    <td><input name="submit" id="submit" type="submit" value="Submit" class="submit" />
		<a href="partner_mgnt.php" class="submit">Cancel</a></td>
	</tr>
  </table>
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
					    partner_category: {
                                            required: true,
                                            },
					    partner_name: {
                                            required: true,
                                            },
					    partner_details: {
                                            required: true,
                                            },
					    org_logo: {
                                            required: true,
					    accept: "jpg|jpeg|gif|png",
                                            },
					    partner_details: {
                                            required: true,
                                            },
					    partner_link: {
                                            required: true,
                                            },
					    partners_from: {
                                            required: true,
                                            },

                    },


				//The error message Str here

           messages: {
			org_logo: {
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
