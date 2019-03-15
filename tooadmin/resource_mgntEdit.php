<?php  
$page="resource_mgntEdit";
$title="Resources Edit";
include_once ("../class/config.php");
include_once("../includes/functions.php");
extract($_REQUEST);

if(isset($submit_count)) {

	if($resource_type=='25') {
		$resource_category=$resource_category1;
	} elseif($resource_type=='26') {
		$resource_category=$resource_category2;
	} elseif($resource_type=='27') {
		$resource_category=$resource_category3;
	}

	//echo $resource_category; exit;


	$query="UPDATE too_resources SET resource_category=?, resource_title=?, resource_contents=?, resource_link=?, resource_type=? WHERE resource_id='$id'";
	$statement=$mysqli->prepare($query);
	$statement->bind_param('issss',$resource_category, $resource_title, $resource_contents, $resource_link, $resource_type);
	$statement->execute();
	$statement->close();

	header("location:resource_mgnt.php");
}

include("header.php");

$query_edit="select resource_category, resource_title, resource_contents, resource_link, resource_type from too_resources WHERE resource_id='$id'";
$statement_edit=$mysqli->prepare($query_edit);
$statement_edit->execute();
$statement_edit->store_result();
$statement_edit->bind_result($resource_category1a, $resource_title1, $resource_contents1, $resource_link1, $resource_type1);
$statement_edit->fetch();
$statement_edit->close();


$query1="select category_id, category_name from master_category where category_for='20' AND status='A' ORDER BY category_id DESC";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($category_id, $category_name);

$query2="select category_id, category_name from master_category where category_for='21' AND status='A' ORDER BY category_id DESC";
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($category_id, $category_name);

$query3="select category_id, category_name from master_category where category_for='22' AND status='A' ORDER BY category_id DESC";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($category_id, $category_name);

?>

<h1> Resources  &raquo;  Edit </h1>

<form id="form_resource" method="post" id="" enctype="multipart/form-data" action="">
  <table cellpadding="0" cellspacing="0" align="center">

    <tr>
      <td align="right"> Resources Type :<span class="red">*</span></td>
      <td>
		<select name="resource_type" id="resource_type" class="boxM" onchange="load_rescategory(this.value)">
			<option value="">Select</option>
			<option value="20" <?php if($resource_type1=='20') { echo 'selected'; } ?>>Tutorial</option>
			<option value="21" <?php if($resource_type1=='21') { echo 'selected'; } ?>>Learn Videos</option>
			<option value="22" <?php if($resource_type1=='22') { echo 'selected'; } ?>>Assessments</option>
		</select>
	</td>
    </tr>
    <tr class="showHide" id="rcat20" style="display:none;">
      <td align="right"> Resources Category :<span class="red">*</span></td>
      <td>
		<select name="resource_category1" id="resource_category1" class="boxM">
			<option value="">Select</option>
		<?php while($statement1->fetch()) { ?>
			<option value="<?php echo $category_id; ?>" <?php if($resource_category1a==$category_id) { echo 'selected'; } ?>><?php echo $category_name; ?></option>
		<?php } ?>
		</select>
	</td>
    </tr>

    <tr class="showHide" id="rcat21" style="display:none;">
      <td align="right"> Resources Category :<span class="red">*</span></td>
      <td>
		<select name="resource_category2" id="resource_category2" class="boxM">
			<option value="">Select</option>
		<?php while($statement2->fetch()) { ?>
			<option value="<?php echo $category_id; ?>" <?php if($resource_category1a==$category_id) { echo 'selected'; } ?>><?php echo $category_name; ?></option>
		<?php } ?>
		</select>
	</td>
    </tr>

    <tr class="showHide" id="rcat22" style="display:none;">
      <td align="right"> Resources Category :<span class="red">*</span></td>
      <td>
		<select name="resource_category3" id="resource_category3" class="boxM">
			<option value="">Select</option>
		<?php while($statement3->fetch()) { ?>
			<option value="<?php echo $category_id; ?>" <?php if($resource_category1a==$category_id) { echo 'selected'; } ?>><?php echo $category_name; ?></option>
		<?php } ?>
		</select>
	</td>
    </tr>

    <tr>
      <td align="right"> Resources Title :<span class="red">*</span></td>
      <td><input type="text" name="resource_title" id="resource_title" placeholder="Enter Resources Title" class="boxM" value="<?php echo $resource_title1; ?>"></td>
    </tr>
    <tr>
      <td align="right"> Contents :<span class="red">*</span></td>
      <td><textarea name="resource_contents" id="resource_contents" placeholder="Enter Resource Contents" class="boxM"><?php echo $resource_contents1; ?></textarea></td>
    </tr>
<!--
    <tr>
      <td align="right"> Attachments :</td>
      <td><input type="file" name="resource_attachments" id="resource_attachments" placeholder="" class="boxM"></td>
    </tr>
-->
    <tr id="only21" style="display:none;">
      <td align="right"> Links :<span class="red">*</span></td>
      <td><textarea name="resource_link" id="resource_link" placeholder="" class="boxM"><?php echo $resource_link1; ?></textarea></td>
    </tr>

	<tr>
	    <td align="right" valign="top">&nbsp;</td>
	    <td><input name="submit_count" type="submit" value="Submit" class="submit" />
		<a href="resource_mgnt.php" class="submit">Cancel</a></td>
	</tr>
  </table>
</form>
<?php include("footer.php");  ?>

<script>
function load_rescategory(val1) {
	$('.showHide').hide();
	$('#rcat'+val1).show();
	if(val1=='21') {
		$('#only21').show();
	} else {
		$('#only21').hide();
	}
}
</script>

<script type="text/javascript">

(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#form_resource").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					resource_type: {
                                        required:true,
                                        },
					resource_category1: {
                                        required:true,
                                        },
					resource_category2: {
                                        required:true,
                                        },
					resource_category3: {
                                        required:true,
                                        },
                                        resource_title: {
					required:true,
                                        minlength:2,
                                        },
					resource_contents: {
                                        required:true,
                                        },
					resource_link: {
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


<script>
$(document).ready(function() {
	var valO="<?php echo $resource_type1; ?>";
	load_rescategory(valO);
} );  
</script>
