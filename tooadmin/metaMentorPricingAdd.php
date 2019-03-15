<?php  
$page="metaMentorPricingAdd";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);
session_start();

if($_SESSION['m_sess_id']=='') {
	$_SESSION['m_sess_id']=rand(10000000, 99999999);
}

$mentor_sess_id=$_SESSION['m_sess_id'];
//echo $_SESSION['m_sess_id']."#"; exit();

if(isset($save_submit)) {

	$query9 = "SELECT mentor_price_temp_id, mentor_sess_id, mentor_price_name, mentor_currency, mentor_price_amt FROM  master_mentor_price_temp  WHERE mentor_sess_id=$mentor_sess_id";
	$statement9=$mysqli->prepare($query9);
	$statement9->execute();
	$statement9->store_result();
	$statement9->bind_result($mentor_price_temp_id, $mentor_sess_id, $mentor_price_name, $mentor_currency, $mentor_price_amt);
	$q9=$statement9->num_rows();

	if($q9>0) {
		while ($statement9->fetch()) {
			$status="A";
			$query10 = "INSERT INTO master_mentor_price(mentor_price_name, mentor_currency, mentor_price_amt, status, added_date ) values(?,?,?,?, now())";
			$statement10 = $mysqli->prepare($query10);
			$statement10->bind_param('siss', $mentor_price_name, $mentor_currency, $mentor_price_amt, $status);
			$statement10->execute();
		}

		$mysqli->query("DELETE FROM master_mentor_price_temp WHERE mentor_price_temp_id='$mentor_price_temp_id' ");
	}

	$_SESSION['m_sess_id']='';
	header("location:metaMentorPricing.php");
	exit;
}

$query1="select country_id, country_name, currency from master_country where country_id!=''";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($country_id, $country_name, $currency);


include("header.php"); ?>

<h1> Settings  &raquo;  Meta  &raquo; Mentor Pricing &raquo; Create
<span class="back">
<a href="metaMentorPricing.php">View</a>
</span></h1>


<form id="subCategory_valid" method="post" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
   
    <tr>
      <td align="right"> Mentor Type :<span class="red">*</span></td>
      <td valign="top"><input name="mentor_price_name" id="mentor_price_name" type="text" class="boxM" placeholder="Mentor Type" maxlength="100"/></td>
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
      <td align="right"> Mentor Cost:<span class="red">*</span></td>
      <td valign="top"><input type="text" name="mentor_price_amt" id="mentor_price_amt"  placeholder="Amount" class="boxM"></td>
    </tr>
   
    <tr>
      <td valign="top">&nbsp;</td>
      <td valign="top"><input type="button" name="add_submit" id="add_submit" value=" Add " class="submitM" onclick="load_mentor_cost()"/></td>

    </tr>
  </table>


<div class="gap20"></div>

<div id="load_mentor_cost" class="table-responsive">
</div>

<div class="gap20"></div>
<hr>
<div class="text-right">
	<input type="submit" name="save_submit" id="save_submit" value="Submit" class="submitM"/> &nbsp;
	<a href="metaMentorPricing.php" class="submitM">Cancel</a>
</div>

</form>


<div class="gap20"></div>
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
                                        //required:true,
                                        },
                                        subcategory_id: {
                                        //required:true,
                                        },
                                        mentor_price_name: {
                                        //required:true,
                                        },
                                        mentor_price_amt: {
                                        //required:true,
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

<script>
function load_mentor_cost()
{
	var val1=$("#mentor_currency option:selected").val();
	var val2=$('#mentor_price_amt').val();
	var val3=$('#mentor_price_name').val();
	var val4=<?php echo $mentor_sess_id; ?>;

	$.ajax({
		url:'ajax_load_mentor_cost.php', 
		type:'POST',
		data: {mentor_currency:val1, mentor_price_amt:val2, mentor_price_name:val3, mentor_sess_id:val4},
		//data:$('#form_coursereg').serialize(),
		success:function(result){ //alert(result);
			$("#load_mentor_cost").html(result);
			$('#mentor_price_amt').val('');
			$('#mentor_currency').val('');
		}
	});
}


function deleteInsiderTips(val1, val2)
{  var agree=confirm("Are you sure want to delete this auction?");
   if (agree) {
    $.ajax({url:'ajax_load_mentor_cost.php', 
		type:'POST',
		data: {del_id:val1, mentor_sess_id:val2},
		success:function(result){	
                    document.getElementById("load_mentor_cost").innerHTML=result;
		}
	});
    }
}
</script>
