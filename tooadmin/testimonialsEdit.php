<?php  
$page="testimonialsEdit";
$title="Testimonials Edit";
include_once ("../class/config.php");
extract($_REQUEST);

$id=$_GET['id'];
/*----------------- -----------------*/
if(isset($submit_testimonial))
{
	$path = "../uploads/testimonial/";
        $name="image";
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
		
                $imgUp=", image='$name_file'";

                }
        }

	$query = "UPDATE testimonial SET title=? $imgUp,content=?  WHERE id='$id'";
	$statement= $mysqli->prepare($query);  
	$statement->bind_param('ss', $title,$content);
	$statement->execute();
	header("Location:testimonials.php");
}

include("header.php"); 
$sql1 = "SELECT title,image,content FROM testimonial WHERE id='$id'";
//echo $sql1;
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($title1,$image1,$content1);
$statement1->fetch();
?>

<h1> Testimonials  &raquo;  Edit </h1>

<form method="post" id="form_testi" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="right"> Title :<span class="red">*</span></td>
      <td><input type="text" name="title" id="title" placeholder="Enter Title" class="boxM" value="<?php echo $title1;?>"></td>
    </tr>
    <tr>
      <td align="right"> Image :<span class="red">*</span></td>
      <td><input type="file" name="image" id="image" placeholder="" class="boxM"></td>
      <td><img src="../uploads/testimonial/<?php echo $image1;?>" width="100" height="100"></td>
    </tr>
    <tr>
      <td align="right"> Content :<span class="red">*</span></td>
      <td><textarea name="content" id="content" placeholder="Enter Content" class="boxM"><?php echo $content1;?></textarea></td>
    </tr>
	<tr>
	    <td align="right" valign="top">&nbsp;</td>
	    <td><input name="submit_testimonial" id="submit_testimonial" type="submit" value="Submit" class="submit" />
		<a href="testimonials.php" class="submit">Cancel</a></td>
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
            $("#form_testi").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					    title: {
                                            required: true,
                                            },
					    image: {
                                            //required: true,
					    accept: "jpg|jpeg|gif|png",
                                            },
					    content: {
                                            required: true,
                                            },
                    },


				//The error message Str here

           messages: {
			image: {
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
