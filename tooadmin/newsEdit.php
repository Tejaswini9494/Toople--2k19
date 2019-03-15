<?php  
$page="newsEdit";


include_once ("../class/config.php");
extract($_REQUEST);
if(isset($submit_count))
{
	$status='A';

	$path = "../uploads/master_news/";
	$name="news_image";
	if($_FILES[$name]["size"]>0)
	{
		//echo $_FILES[$name]["size"].'###';

		$img_name= $_FILES[$name]['name']; 
		$val1=explode(".",$img_name);
		$tmp_file = $_FILES[$name]['tmp_name'];
		$imgtype=substr(strrchr(basename($_FILES[$name]["name"]),"."),1); 
		$imgtype=strtolower($imgtype);        
		if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='pdf') {
			$name_file = $val1[0].time().".".$imgtype;
			move_uploaded_file($tmp_file,$path.$name_file);
	
			$imgUp=", news_image='$path$name_file'";

			$query="UPDATE master_news SET news_image=? WHERE news_id='$id'";
			//echo "UPDATE master_news SET news='$news', news_content='$news_content',news_image='$name_file' WHERE news_id='$id'";
			$statement=$mysqli->prepare($query);
			$statement->bind_param('s', $name_file);
			$statement->execute();
		}
	}

	$query="UPDATE master_news SET news=?, news_content=? WHERE news_id='$id'";
	//echo "UPDATE master_news SET news='$news', news_content='$news_content',news_image='$name_file' WHERE news_id='$id'";
	$statement=$mysqli->prepare($query);
	$statement->bind_param('ss',$news,$news_content);
	$statement->execute();

	header("location:news_mgnt.php");
	exit;
}

include("header.php"); 

$sql="SELECT news,news_content,news_image FROM master_news WHERE news_id='$id'";
$st=$mysqli->prepare($sql);
$st->execute();
$st->store_result();
$st->bind_result($news,$news_content,$news_image);
$st->fetch();
?>

<h1> News Managment  &raquo;  Edit </h1>

<form method="post" id="news_edit" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="right"> News:<span class="red">*</span></td>
      <td><input type="text" name="news" id="news" placeholder="News" maxlength="100" class="boxM" value="<?php echo $news;?>"></td>
    </tr>

   	<tr>
      <td align="right"> News Content</td>
      <td valign="top"><textarea name="news_content" id="news_content"  placeholder="News Content" class="taM"><?php echo $news_content;?></textarea></td>
    </tr>
    <tr>
        <td align="right">Image:<span class="red">* </span></td>
        <td>
            <div class="fileinput fileinput-new" data-provides="fileinput">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="tab4">
            <tr>
                <td> 
                <div>
               
                <span class="btn btn-default btn-file" style="background: #fff!important;border:1px solid #ccc!important;"><input type="file" value="<?php echo $news_image;?>" id="news_image" name="news_image"></span>
                </div>
                     
                </td>
                
                <td> 
       			<?php if($news_image!='') { ?>
			<div class="col-sm-6 col-sm-push-3">
				<img src="../uploads/master_news/<?php echo $news_image;?>" width="100" height="100">
			</div>
			<?php } ?>
               </td>
            </tr>
            </table>
		 <span for="news_image" class="errors"></span>
        </div>
        </td>
    </tr>
    <tr>
    <td align="right" valign="top">&nbsp;</td>
    <td><input name="submit_count" id="submit_count" type="submit" value="Submit" class="submit" />
        <a href="news_mgnt.php" class="submitM">CANCEL</a></td>
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
            $("#news_edit").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					news: {
                                        required:true,
                                        minlength:2,
                                        },
                                        country_comments: {
                                        minlength:2,
                                        },
					news_image: {
                                        //required: true,
					accept: "jpg|jpeg|gif|png",
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
