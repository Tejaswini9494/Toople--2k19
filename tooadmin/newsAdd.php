<?php  
$page="newsAdd";
include_once ("../class/config.php");
include_once("../includes/functions.php");
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
                        if($imgtype=='jpg' || $imgtype=='gif' || $imgtype=='png'|| $imgtype=='jpeg' || $imgtype=='doc' || $imgtype=='docx' || $imgtype=='pdf'){
                        $name_file = $val1[0].time().".".$imgtype;
                        move_uploaded_file($tmp_file,$path.$name_file);
			
                        $imgUp=", news_image='$path$name_file'";

                        }
                }


$query="insert into master_news( news, news_content ,news_image, status , added_date ) values(?,?,?,?,now())";
//echo "insert into master_news( news, news_content ,news_image, status , added_date ) values('$news','$news_content','$name_file','$status',now())";
$statement=$mysqli->prepare($query);
$statement->bind_param('ssss',$news,$news_content,$name_file,$status);
$statement->execute();

header("location:news_mgnt.php");
}

include("header.php"); ?>

<h1> News Managment  &raquo;  Add </h1>
<span class="back">
<a href="news_mgnt.php">View</a>
</span>

<form method="post" id="category_valid" enctype="multipart/form-data">

  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td align="right"> News :<span class="red">*</span></td>
      <td><input type="text" name="news" id="news" placeholder="News" maxlength="100" class="boxM"></td>
    </tr>
    <tr>
      	<td align="right"> News Content</td>
      	<td valign="top"><textarea name="news_content" id="news_content"  placeholder="News content" class="taM"></textarea></td>
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
					<img src="<?php echo $news_image;?>" width="100" height="100">
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
            $("#category_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					news: {
                                        required:true,
                                        minlength:2,
                                        },
                                        news_content: {
					//required:true,
                                        minlength:2,
                                        },
					news_image: {
                                        required: true,
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
