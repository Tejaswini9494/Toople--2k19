<?php  
$page="faq_mgntEdit";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit_count))
{
	$status='A';

	$query="UPDATE too_faq SET faq_ques=?, faq_ans=? WHERE faq_id='$id'";
	$statement=$mysqli->prepare($query);
	$statement->bind_param('ss',$faq_ques, $faq_ans);
	$statement->execute();

	header("location:faq_mgnt.php");
	exit;
}

include("header.php");

$query1="select faq_ques, faq_ans from too_faq where faq_id='$id'";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($faq_ques1, $faq_ans1);
$statement1->fetch();
$statement1->close();

?>

<h1> FAQ Managment  &raquo;  Edit </h1>
<span class="back">
<a href="faq_mgnt.php">View</a>
</span>

<form method="post" id="category_valid" enctype="multipart/form-data">

  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="right"> Question :<span class="red">*</span></td>
      <td><input type="text" name="faq_ques" id="faq_ques" placeholder="Question" class="boxM" value="<?php echo $faq_ques1; ?>"></td>
    </tr>
    <tr>
      	<td align="right"> Answer :<span class="red">*</span></td>
      	<td valign="top"><textarea name="faq_ans" id="faq_ans"  placeholder="Answer" class="taM"><?php echo $faq_ans1; ?></textarea></td>
    </tr>
<tr>
    <td align="right" valign="top">&nbsp;</td>
    <td><input name="submit_count" id="submit_count" type="submit" value="Submit" class="submit" />
       <a href="faq_mgnt.php" class="submitM">CANCEL</a></td>
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
							 
					faq_ques: {
                                        required:true,
                                        minlength:2,
                                        },
                                        faq_ans: {
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
