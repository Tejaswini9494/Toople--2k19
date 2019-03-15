<?php  
$page="metaMentorPricingEdit";
include_once("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit_state))
{
	$nrows5=0;
	$query5 = "SELECT mentor_price_id FROM  master_mentor_price  WHERE mentor_price_id!='$id' AND mentor_price_name='$mentor_price_name' AND mentor_currency='$mentor_currency'";
	//echo $query5;
	$statement5=$mysqli->prepare($query5);
	$statement5->execute();
	$statement5->store_result();
	$statement5->bind_result($mentor_price_id5);
	$nrows5=$statement5->num_rows();

	if($nrows5==0) {
		$query1s="UPDATE master_mentor_price SET mentor_price_name=?, mentor_currency=?, mentor_price_amt=? where mentor_price_id=?";
		$statement1s=$mysqli->prepare($query1s);
		$statement1s->bind_param('sisi',$mentor_price_name, $mentor_currency, $mentor_price_amt,$id);
		$statement1s->execute();
		header("location:metaMentorPricing.php");
	}
}

include("header.php"); 

$query="select mentor_price_name, mentor_currency, mentor_price_amt from master_mentor_price where mentor_price_id='".$id."'";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($mentor_price_name, $mentor_currency, $mentor_price_amt);
$statement->fetch();

$query1="select country_id, country_name, currency from master_country where country_id!=''";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($country_id, $country_name, $currency);

?>

<h1> Settings  &raquo;  Meta  &raquo; Mentor Pricing &raquo; Edit
<span class="back">
<a href="metaMentorPricing.php">View</a>
</span></h1>

<?php if($nrows5>0) { ?>
	<div class="alert alert-danger alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		Mentor Cost already added for this currency.
	</div>
<?php } ?>

<form id="subCategory_valid" method="post" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
   
    <tr>
      <td align="right"> Mentor Type :<span class="red">*</span></td>
      <td valign="top"><input name="mentor_price_name" id="mentor_price_name" type="text" value="<?php echo $mentor_price_name;  ?>"  class="boxM" placeholder="Mentor Pricing" maxlength="100"/></td>
    </tr>
    <tr>
      <td align="right"> Currency :<span class="red">*</span></td>
      <td valign="top">
		<select name="mentor_currency" id="mentor_currency" class="boxM">
			<option value="">Select</option>
		<?php while($statement1->fetch()) { ?>
			<option value="<?php echo $country_id; ?>" <?php if($country_id==$mentor_currency) { echo "selected"; } ?>><?php echo $currency."-".$country_name; ?></option>
		<?php } ?>
		</select>
      </td>
    </tr>	
	<tr>

      <td align="right"> Mentor Cost:<span class="red">*</span> </td>
      <td valign="top"><input type="text" name="mentor_price_amt" id="mentor_price_amt"  placeholder="Amount" class="boxM" value="<?php echo $mentor_price_amt; ?>"></td>
    </tr>
   
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top"><input type="submit" name="submit_state" value=" SAVE " class="submitM" /> &nbsp;
       <a href="metaMentorPricing.php" class="submitM">CANCEL</a></td>


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
            $("#subCategory_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					category_id: {
                                        required:true,
                                        },
                                        subcategory_id: {
                                        required:true,
                                       
                                        },
                                        mentor_price_name: {
					required:true,
                                        },
                                        mentor_currency: {
					required:true,
                                        },
                                        mentor_price_amt: {
                                        required:true,
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


