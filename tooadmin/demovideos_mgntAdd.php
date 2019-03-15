<?php  
$page="demovideos_mgntAdd";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit_count))
{
	$status='A';

	$query="insert into too_demovideos( demovid_title, demovid_content, status, added_date ) values(?,?,?,now())";
	$statement=$mysqli->prepare($query);
	$statement->bind_param('sss',$demovid_title, $demovid_content, $status);
	$statement->execute();

	header("location:demovideos_mgnt.php");
}

include("header.php"); ?>

<h1> Demo Video Managment  &raquo;  Add </h1>
<span class="back">
<a href="demovideos_mgnt.php">View</a>
</span>

<form method="post" id="category_valid" enctype="multipart/form-data">

  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="right"> Video Title :<span class="red">*</span></td>
      <td><input type="text" name="demovid_title" id="demovid_title" placeholder="Question" class="boxM"></td>
    </tr>
    <tr>
      	<td align="right"> Youtube IFrame :<span class="red">*</span></td>
      	<td valign="top"><textarea name="demovid_content" id="demovid_content"  placeholder="" class="taM"></textarea></td>
    </tr>
<tr>
    <td align="right" valign="top">&nbsp;</td>
    <td><input name="submit_count" id="submit_count" type="submit" value="Submit" class="submit" />
       <a href="demovideos_mgnt.php" class="submitM">CANCEL</a></td>
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
							 
					demovid_title: {
                                        required:true,
                                        minlength:2,
                                        },
                                        demovid_content: {
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
