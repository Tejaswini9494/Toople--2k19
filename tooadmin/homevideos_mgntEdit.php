<?php  
$page="homevideos_mgntEdit";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit_count))
{
	$status='A';

	$query="UPDATE home_video SET home_video_title=?, home_video_url=? WHERE home_video_id='$id'";
	$statement=$mysqli->prepare($query);
	$statement->bind_param('ss',$home_video_title, $home_video_url);
	$statement->execute();

	header("location:homevideos_mgnt.php");
	exit;
}

include("header.php");

$query1="select home_video_title, home_video_url from home_video where home_video_id='$id'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($home_video_title1, $home_video_url1);
$statement1->fetch();
$statement1->close();

?>

<h1> Home Video Managment  &raquo;  Edit </h1>
<span class="back">
<a href="homevideos_mgnt.php">View</a>
</span>

<form method="post" id="category_valid" enctype="multipart/form-data">

  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="right"> Video Title :<span class="red">*</span></td>
      <td><input type="text" name="home_video_title" id="home_video_title" placeholder="Question" class="boxM" value="<?php echo $home_video_title1; ?>"></td>
    </tr>
    <tr>
      	<td align="right"> Youtube IFrame :<span class="red">*</span></td>
      	<td valign="top"><textarea name="home_video_url" id="home_video_url"  placeholder="" class="taM"><?php echo $home_video_url1; ?></textarea></td>
    </tr>
<tr>
    <td align="right" valign="top">&nbsp;</td>
    <td><input name="submit_count" id="submit_count" type="submit" value="Submit" class="submit" />
       <a href="homevideos_mgnt.php" class="submitM">CANCEL</a></td>
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
            $("#category_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					home_video_title: {
                                        required:true,
                                        minlength:2,
                                        },
                                        home_video_url: {
					required:true,
                                        minlength:2,
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
