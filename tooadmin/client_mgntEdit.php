<?php  
$page="client_mgntEdit";
$title="Clients Edit";
include_once ("../class/config.php");
extract($_REQUEST);

$id=$_GET['id'];
/*----------------- -----------------*/
if(isset($submit_count))
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
		
                $imgUp=", org_logo='$name_file'";

                }
        }

	$query = "UPDATE supporting_org SET org_name=? $imgUp, org_link=?  WHERE id='$id'";
	//echo "UPDATE supporting_org SET org_name='$org_name',org_logo='$imgUp'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('ss', $org_name, $org_link);
	$statement->execute();
	header("Location:client_mgnt.php");
}

include("header.php"); 
$sql1 = "SELECT org_name,org_logo,org_link FROM  supporting_org  WHERE id='$id'";
//echo $sql1;
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($org_name1,$org_logo1,$org_link1);
$statement1->fetch();
?>

<h1> Organisations  &raquo;  Edit </h1>

<form method="post" id="form_org" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="right"> Organisation Name :<span class="red">*</span></td>
      <td><input type="text" name="org_name" id="org_name" placeholder="Enter Organisation Name" class="boxM" value="<?php echo $org_name1;?>"></td>
    </tr>
    <tr>
      <td align="right"> Organisation Logo :<span class="red">*</span></td>
      <td><input type="file" name="org_logo" id="org_logo" placeholder="" class="boxM"></td>
      <td><img src="../uploads/support_org/<?php echo $org_logo1;?>" width="100" height="100"></td>
    </tr>
    <tr>
      <td align="right"> Organisation Link :<span class="red"></span></td>
      <td><input type="text" name="org_link" id="org_link" value="<?php echo $org_link1;?>" class="boxM"></td>
    </tr>
	<tr>
	    <td align="right" valign="top">&nbsp;</td>
	    <td><input name="submit_count" id="submit_count" type="submit" value="Submit" class="submit" />
		<a href="client_mgnt.php" class="submit">Cancel</a></td>
	</tr>
  </table>
</form>

<?php include("footer.php");  ?>

<script type="text/javascript">
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
					    org_logo: {
                                            //required: true,
					    accept: "jpg|jpeg|gif|png",
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
