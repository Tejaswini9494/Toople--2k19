<?php
$page="discussion";
$title="Discussion";
$ses="yes";
session_start();
$uid=$_SESSION["costudies_user_id"];
$ses_user_name=$_SESSION["costudies_user_name"];
include('class/config.php');
include('includes/encrypt.php');
include('includes/functions.php');
include('email_sms.php');
include_once 'in_ht_url.php';
extract($_REQUEST);
$dis_id_enc=$_GET['d_id'];
$dis_id=decrypt($dis_id_enc,'co_@#2016_studies');

$ip_adress=$_SERVER['REMOTE_ADDR'];

//post discussion
if(isset($Submit_diss)){

    require_once("class/FormValidator.class.php");//This class for form validation in PHP
	$err=0;
	$fv = new FormValidator();
        
        //dbd_title
        $fv->isEmpty("dbd_title","Enter the discussion title");
        if($dbd_title!="") $fv ->isWithinLengthmin("dbd_title","Discussion Title - Enter atleast 3 characters","3");
        
        //category_id
        $fv->isEmpty("category_id","Select the category");
        
        //sub_category_id
        $fv->isEmpty("sub_category_id","Select the sub category");
        
        //dbd_content
       // $fv->isEmpty("dbd_content","Enter the content");
        
        //dbd_tags
       // $fv->isEmpty("dbd_tags","Enter the tags");
        
       
        
        
        
        //Error message display	

	if ($fv->isError())
	{
            $err=1;
		$errorval=0;
		$errors = $fv->getErrorList();
		
		foreach ($errors as $e) $val.=$e['msg']."<br>";   
		for($j=0;$j<count($errorval);$j++) $val.=$errorval[$j]."<br>";
		
	}  else {
    
        //Image upload  1
        $path="upload/";
        $name1=dbd_attachment;
        $name_file1='';
        if($_FILES[$name1]["size"]>0) 
        {

            $img_name= $_FILES[$name1]['name'];
            $val5=explode(".",$img_name);
            $tmp_file = $_FILES[$name1]['tmp_name'];
            $imgtype=substr(strrchr(basename($_FILES[$name1]["name"]),"."),1);
            $imgtype=strtolower($imgtype);	
            if($imgtype=='txt' || $imgtype=='rtf' || $imgtype=='doc'|| $imgtype=='docx' || $imgtype=='xls'|| $imgtype=='xlsx' || $imgtype=='ppt'|| $imgtype=='pps' || $imgtype=='ppsx'|| $imgtype=='pptx' || $imgtype=='pdf'|| $imgtype=='odt' || $imgtype=='odp'|| $imgtype=='ods' || $imgtype=='jpg'|| $imgtype=='jpeg' || $imgtype=='png' || $imgtype=='gif'|| $imgtype=='arf' || $imgtype=='zip')
            {                
                $name_file1 = $val5[0].time().".".$imgtype;
                move_uploaded_file($tmp_file,$path.$name_file1);
            }
        } 
        if($name_file1==''){
            $name_file1=$dbd_attachment1;
        } else if($name_file1!=''){
            $name_file1=$name_file1;
        }    
            
        $dbd_title =htmlspecialchars(trim($_POST['dbd_title']));
        $category_id =htmlspecialchars(trim($_POST['category_id']));
        $sub_category_id =htmlspecialchars(trim($_POST['sub_category_id']));
        $dbd_content =trim($_POST['dbd_content']);
        $dbd_tags =htmlspecialchars(trim($_POST['dbd_tags']));
        $dbd_tags1=rtrim($dbd_tags,',');
	$youtube_url=trim($_POST['youtube_url']);
        $disc_type='D';
        $disc_post_by='U';
        $sta='D';
        
        $log_module1='POST';
        
        
        if($dis_id!=''){
        $log_module_desc1="has updated ";
        $query_ups="UPDATE co_discussions SET dbd_title=?, category_id=?, sub_category_id=?,youtube_url=?,dbd_content=?, dbd_attachment=?, dbd_tags=?,dbd_status=? where dbd_id=?"; 
        $statement_ups = $mysqli->prepare($query_ups);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement_ups->bind_param('siisssssi',$dbd_title, $category_id, $sub_category_id,$youtube_url, $dbd_content, $name_file1, $dbd_tags1, $sta, $dis_id);
        $statement_ups->execute();
        $dis_id_enc=encrypt($dis_id,'co_@#2016_studies');
        
         //insert the log
         $query_log_ch1="INSERT INTO co_log (user_id, log_module, log_activity_id, log_activity, log_disc_id, ip_address, created_on) VALUES (?, ?, ?, ?, ?, ?, now())"; 
        $statement_log_ch1 = $mysqli->prepare($query_log_ch1);
        $statement_log_ch1->bind_param('isisis',$uid, $log_module1, $dis_id, $log_module_desc1, $dis_id, $ip_adress);
        $statement_log_ch1->execute(); 
        
        } else {
        $log_module_desc1="has created ";
        $query_ins="INSERT INTO co_discussions (user_id, dbd_type, dbd_title, category_id, sub_category_id, youtube_url, dbd_content, dbd_attachment, dbd_tags,  dbd_posted_by, dbd_status, ip_address, created_on) VALUES (?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, now())"; 
        $statement_ins = $mysqli->prepare($query_ins);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement_ins->bind_param('issiisssssss',$uid,$disc_type, $dbd_title, $category_id, $sub_category_id,$youtube_url,$dbd_content, $name_file1, $dbd_tags1, $disc_post_by, $sta, $ip_adress);
        $statement_ins->execute();
        
        $dis_id=$mysqli->insert_id;
        $dis_id_enc=encrypt($dis_id,'co_@#2016_studies');
        
        //insert the log
         $query_log_ch1="INSERT INTO co_log (user_id, log_module, log_activity_id, log_activity, log_disc_id, ip_address, created_on) VALUES (?, ?, ?, ?, ?, ?, now())"; 
        $statement_log_ch1 = $mysqli->prepare($query_log_ch1);
        $statement_log_ch1->bind_param('isisis',$uid, $log_module1, $dis_id, $log_module_desc1, $dis_id, $ip_adress);
        $statement_log_ch1->execute(); 
        email('06',$dis_id,'');
        }
        //$dbd_title_disd=substr($dbd_title,0,-1);
        $dbd_title_disd=str_replace('.',' ', $dbd_title);
        $dbd_title_dis=str_replace(' ','-', $dbd_title_disd);
        session_start();
        $_SESSION['poppostDISSNOTI']="DISSNOTI"; 
        $_SESSION['ses_discussion_id']=$dis_id_enc;
        header("location:".$ht_hurl."discussion/$dis_id_enc/0/$dbd_title_dis");
        exit;
}}


//preview

if(isset($Submit_prev)){

    require_once("class/FormValidator.class.php");//This class for form validation in PHP
	$err=0;
	$fv = new FormValidator();
        
        //dbd_title
        $fv->isEmpty("dbd_title","Enter the discussion title");
        if($dbd_title!="") $fv ->isWithinLengthmin("dbd_title","Discussion Title - Enter atleast 3 characters","3");
        
        //category_id
        $fv->isEmpty("category_id","Select the category");
        
        //sub_category_id
        $fv->isEmpty("sub_category_id","Select the sub category");
        
        //dbd_content
        //$fv->isEmpty("dbd_content","Enter the content");
        
        //dbd_tags
        //$fv->isEmpty("dbd_tags","Enter the tags");
        
       
        
        
        
        //Error message display	

	if ($fv->isError())
	{
            $err=1;
		$errorval=0;
		$errors = $fv->getErrorList();
		
		foreach ($errors as $e) $val.=$e['msg']."<br>";   
		for($j=0;$j<count($errorval);$j++) $val.=$errorval[$j]."<br>";
		
	}  else {
    
        //Image upload  1
        $path="upload/";
        $name1=dbd_attachment;
        $name_file1='';
        if($_FILES[$name1]["size"]>0) 
        {

            $img_name= $_FILES[$name1]['name'];
            $val5=explode(".",$img_name);
            $tmp_file = $_FILES[$name1]['tmp_name'];
            $imgtype=substr(strrchr(basename($_FILES[$name1]["name"]),"."),1);
            $imgtype=strtolower($imgtype);	
            if($imgtype=='txt' || $imgtype=='rtf' || $imgtype=='doc'|| $imgtype=='docx' || $imgtype=='xls'|| $imgtype=='xlsx' || $imgtype=='ppt'|| $imgtype=='pps' || $imgtype=='ppsx'|| $imgtype=='pptx' || $imgtype=='pdf'|| $imgtype=='odt' || $imgtype=='odp'|| $imgtype=='ods' || $imgtype=='jpg'|| $imgtype=='jpeg' || $imgtype=='png' || $imgtype=='gif'|| $imgtype=='arf' || $imgtype=='zip')
            {                
                $name_file1 = $val5[0].time().".".$imgtype;
                move_uploaded_file($tmp_file,$path.$name_file1);
            }
        } 
        if($name_file1==''){
            $name_file1=$dbd_attachment1;
        } else if($name_file1!=''){
            $name_file1=$name_file1;
        }    
            
        $dbd_title =htmlspecialchars(trim($_POST['dbd_title']));
        $category_id =htmlspecialchars(trim($_POST['category_id']));
        $sub_category_id =htmlspecialchars(trim($_POST['sub_category_id']));
        $dbd_content =trim($_POST['dbd_content']);
        $dbd_tags =htmlspecialchars(trim($_POST['dbd_tags']));
        $dbd_tags1=rtrim($dbd_tags,',');
        $disc_type='D';
        $disc_post_by='U';
        $sta='';
        
        $log_module1='Preview';
        if($dis_id!=''){
        $log_module_desc1="has previewed ";
        $query_ups="UPDATE co_discussions SET dbd_title=?, category_id=?, sub_category_id=?,youtube_url=?, dbd_content=?, dbd_attachment=?, dbd_tags=? where dbd_id=?"; 
        $statement_ups = $mysqli->prepare($query_ups);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement_ups->bind_param('siissssi',$dbd_title, $category_id, $sub_category_id,$youtube_url, $dbd_content, $name_file1, $dbd_tags1, $dis_id);
        $statement_ups->execute();
        $dis_id_enc=encrypt($dis_id,'co_@#2016_studies');
        
        //insert the log
         $query_log_ch1="INSERT INTO co_log (user_id, log_module, log_activity_id, log_activity, log_disc_id, ip_address, created_on) VALUES (?, ?, ?, ?, ?, ?, now())"; 
        $statement_log_ch1 = $mysqli->prepare($query_log_ch1);
        $statement_log_ch1->bind_param('isisis',$uid, $log_module1, $dis_id, $log_module_desc1, $dis_id, $ip_adress);
        $statement_log_ch1->execute(); 
        
        } else {
            
        $log_module_desc1="has previewed ";
        
        $query_ins="INSERT INTO co_discussions (user_id, dbd_type, dbd_title, category_id, sub_category_id,youtube_url, dbd_content, dbd_attachment, dbd_tags,  dbd_posted_by, dbd_status, ip_address, created_on) VALUES (?,?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, now())"; 
        $statement_ins = $mysqli->prepare($query_ins);
        //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
        $statement_ins->bind_param('issiisssssss',$uid,$disc_type, $dbd_title, $category_id, $sub_category_id, $youtube_url,$dbd_content, $name_file1, $dbd_tags1, $disc_post_by, $sta, $ip_adress);
        $statement_ins->execute();
        $dis_id_dec=$mysqli->insert_id;
        $dis_id_enc=encrypt($dis_id_dec,'co_@#2016_studies');
        
        //insert the log
         $query_log_ch1="INSERT INTO co_log (user_id, log_module, log_activity_id, log_activity, log_disc_id, ip_address, created_on) VALUES (?, ?, ?, ?, ?, ?, now())"; 
        $statement_log_ch1 = $mysqli->prepare($query_log_ch1);
        $statement_log_ch1->bind_param('isisis',$uid, $log_module1, $dis_id_dec, $log_module_desc1, $dis_id_dec, $ip_adress);
        $statement_log_ch1->execute(); 
        
        }
        //$dbd_title_dis_pd=substr($dbd_title,0,-1);
        $dbd_title_dis_pd=str_replace('.',' ', $dbd_title);
        $dbd_title_dis_p=str_replace(' ','-', $dbd_title_dis_pd);
        //session_start();
       // $_SESSION['poppostDISSNOTI']="DISSNOTI"; 
        header("location:".$ht_hurl."discussion1_did/$dis_id_enc/$dbd_title_dis_p");
        //exit;
}}

$cat_id_enc=$_GET['cat1'];
 $category_id=decrypt($cat_id_enc,'co_@#2016_studies');  //category_id

$sub_cat_id_enc=$_GET['sub_cat1'];
$sub_category_id=decrypt($sub_cat_id_enc,'co_@#2016_studies'); //sub_category_id

include("header.php");
$sql_edit_cat = "SELECT dbd_title,category_id,sub_category_id,youtube_url,dbd_content,dbd_attachment,dbd_tags,dbd_posted_by FROM co_discussions  where dbd_id=?";
//echo $sql_uni_view;
$statement_edit_cat=$mysqli->prepare($sql_edit_cat);
$statement_edit_cat->bind_param('i',$dis_id);
$statement_edit_cat->execute();
$statement_edit_cat->store_result();
$statement_edit_cat->bind_result($dbd_title,$category_id,$sub_category_id,$youtube_url,$dbd_content,$dbd_attachment,$dbd_tags,$dbd_posted_by);

$statement_edit_cat->fetch();
$statement_edit_cat->close();
?>

<div class="gap20"></div>
<h1>Discussion <a href="Javascript:history.back()" class="pull-right blue bold font16"><i class="fa fa-angle-double-right"></i> Back</a></h1>
<div class="gap10"></div>
<!--action="discussion2.php"-->
<?php  if($val!=''){?>
    <div style="color:#ff0000;padding:10px;margin-left:42px;"><br><?php echo $val;?></div>
<?php }?>
    <?php if($_SESSION['poppostDELNOTI']!="")
{
?>
<script type="text/javascript">
$( document ).ready(function() {
$('#modal_regSuc').modal('show');
});
</script>
<?php }?>  
<form id="discussion_valid"  method="POST" enctype="multipart/form-data">
<div class="discBox">
	<div class="form-group">
		Title <span class="red">*</span>
		<div class="gap5"></div>
		<input type="text" class="form-control" id="dbd_title" name="dbd_title" placeholder="Discussion Title" value="<?php echo $dbd_title;?>" autofocus>
	</div>
	<div class="form-group">
		Community to post in <span class="red">*</span>
		<div class="gap5"></div>
		<div class="col-md-3 col-sm-5 nopadL">
			<select class="form-control" id="category_id" name="category_id" onchange="loadsubcat();">
                        <option value="">Select a Category</option>
                        <?php echo getCategory($category_id);?>
			</select>
		</div>
		<div class="gap15 yes600"></div>
		<div class="col-md-3 col-sm-5 nopadL" id="shw_sub_cat1" style="display:none;">
			<select class="form-control" id="sub_category_id" name="sub_category_id">
                        <option value="">Select a Sub Category</option>
                        <?php echo getSubCategory($category_id,$sub_category_id);?>
			</select>
		</div>
	</div>
	<div class="gap15"></div>
	<div class="form-group">
		Youtube Url 
		<div class="gap5"></div>
		<input type="text" class="form-control" id="youtube_url" name="youtube_url" placeholder="http://www.youtube.com/watch?v=asadsGT46_a" value="<?php echo $youtube_url;?>"></input>
	</div>
	<div class="gap1"></div>
</div>
<div class="gap30"></div>
<div class="txtEdit1">
    <textarea name="dbd_content" id="dbd_content" ><?php echo htmlspecialchars($dbd_content);?></textarea>
</div>
<!--<a href="#" class="blue">Disable rich-test</a>-->

<span for="discText" class="errors"></span>
<div class="gap15"></div>
<div id="dbd_content_error" class="errors"></div>





<div class="accBox">
	<h4>Attachment</h4>
	<div class="gap15"></div>
	<div class="col-md-8 nopadL">
		Add a new file
		<div class="gap5"></div>
                <div class="fileinput fileinput-new" data-provides="fileinput">
		<div class="col-md-4 col-sm-6 nopadL">
                
			<div class="gap5"></div>
                    <input type="hidden" name="dbd_attachment1" id="dbd_attachment1" value="<?php echo $dbd_attachment;?>" class="boxL" />
                    <span class="btn btn-default btn-file" style="background: #fff!important;border:1px solid #ccc!important; color: #333;"><span class="fileinput-new"><i class="fa fa-paperclip" style="color:#2f7fc4; font-size:24px;"></i> Browse...</span><span class="fileinput-exists"><i class="fa fa-paperclip" style="color:#2f7fc4 !important; font-size:24px;"></i>Change</span><input type="file" value="<?php echo $dbd_attachment;?>" id="dbd_attachment" name="dbd_attachment"></span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput" onclick="dummyimagepopulate('1');">Remove</a>
		</div>
                    
		
            <div class="col-md-8 col-sm-3 padclr text-left">
		<div class="fileinput-preview thumbnail" id="preview1"  data-trigger="fileinput">
                    <?php if($dbd_attachment!=''){?>
                    <?php echo $dbd_attachment;?>
                    <?php } else {?>
                    <img src="<?php echo $hurl;?>images/no_image.png">
                    <?php }?>
        </div>
                    <span for="dbd_attachment" class="errors"></span>
                </div>
	    </div>
                
                
		<div class="gap5"></div>
		<em>Files must be less than 2MB.<br>Allowed file types: txt, rtf, doc, docx, xls, xlsx, ppt, pps, ppsx, pptx, pdf, odt, odp, ods, jpg, jpeg, png, gif, arf, zip.</em>
		<div class="gap15"></div>
		By submitting this form, you accept the <a href="#" class="blue" data-toggle="modal" data-target="#modal_privState">CoStudies privacy policy.</a>
	</div>
	<div class="gap10 yes800"></div>
	<div class="col-md-4 col-sm-6 padclr">
		<div class="form-group">
			Tags
			<div class="gap10"></div>
			<input type="text" class="form-control" name="dbd_tags" id="dbd_tags" value="<?php echo $dbd_tags;?>" placeholder="Type some thing">
                        
		</div>
	</div>
	<div class="gap1"></div>
</div>








<div class="gap20"></div>

<div class="btns">
<!--<button type="submit" class="btn btn-default" data-toggle="modal" data-target="#modal_Disc">Post Discussion</button>-->
        <button type="submit" name="Submit_diss"  class="btn btn-default" >Post Discussion</button>
	<div class="gap10 yes360"></div>
        <button type="submit" name="Submit_prev"  class="btn btn-default" >Preview</button>
	<!--<a href="discussion1.php" class="btn btn-default">Preview</a>-->
	<div class="gap10 yes360"></div>
	<a href="Javascript:history.back()" class="btn btn-default" style="background:#999;">Cancel</a>
</div>
</form>
<div class="gap40"></div>

<link rel="stylesheet" href="<?php echo $hurl;?>css/jasny-bootstrap.css">
<script src="<?php echo $hurl;?>js/jasny-bootstrap.js"></script>
<script src="<?php echo $hurl;?>js/jquery.raty.js"></script>
<?php include("modal_regSuc.php");
include("modal_privState.php"); ?>
<?php include("modal_Disc.php"); ?>
<?php include("txt_editor.php"); ?>
<?php include("footer.php"); ?>



<script type="text/javascript">

 function dummyimagepopulate(val)
{
  setTimeout("dummyimagepopulate2('"+val+"')",100);
}

function dummyimagepopulate2(val)
{
       document.getElementById("preview"+val).innerHTML="<img src='<?php echo $hurl;?>images/no_image.png'>";
}

//load sub category

<?php if(($_GET['cat1']!='' && $_GET['sub_cat1']!='') || $dis_id!=''){?>
loadsubcat()
<?php }?>
function loadsubcat(){
$("#shw_sub_cat1").show();
var category_id=$("#category_id option:selected").val(); 
//alert(category_id);
var sub_category_id=$("#sub_category_id option:selected").val(); 
$.ajax({url:'<?php echo $hurl;?>ajax/ajax_subcat.php', 
		type: "POST",
		data: {category_id:category_id,sub_category_id:sub_category_id},
		success:function(result){ //alert(result);
                document.getElementById("sub_category_id").innerHTML=result;
		}
	});
}   


 
 
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            //form validation rules
            $("#discussion_valid").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
							 
					    dbd_title: {
                                            required: true,
                                            minlength: 3,
                                            },
                                            category_id: {
                                            required: true,
                                            },
                                            sub_category_id: {
                                            required: true,
                                            },
                                            /*dbd_content: {
                                            required: true,
                                            },*/
                                            dbd_attachment: {
                                            /*required:{
                                            depends: function(element) {
                                            var smallimg1=document.getElementById("dbd_attachment1").value;
                                            if(smallimg1==''){
                                            return true;
                                            }else{
                                            return false;
                                            }
                                            }
                                            },*/
                                            extension: "txt|rtf|doc|docx|xls|xlsx|ppt|pps|ppsx|pptx|pdf|odt|odp|ods|jpg|jpeg|png|gif|arf|zip",
                                            filesize:2097152,
                                            },
                                            /*dbd_tags: {
                                            required: true,
                                            },*/
                                             youtube_url: {
						
						pattern:/https?:\/\/(?:[a-zA_Z]{2,3}.)?(?:youtube\.com\/watch\?)((?:[\w\d\-\_\=]+&amp;(?:amp;)?)*v(?:&lt;[A-Z]+&gt;)?=([0-9a-zA-Z\-\_]+))/i,
                                            },
                                            
                },


				//The error message Str here

           messages: {
                dbd_title: {
		required: "Please enter Title"
		},
                category_id: {
		required: "Please select Category"
		},
                sub_category_id: {
		required: "Please select Sub Category"
		},
                
                dbd_attachment: {
		extension: "Please enter a valid extension(txt, rtf, doc, docx, xls, xlsx, ppt, pps, ppsx, pptx, pdf, odt, odp, ods, jpg, jpeg, png, gif, arf, zip)."
		},
		 youtube_url: {
						
						pattern:"Enter a Valid YouTube Url",
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
