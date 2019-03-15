<?php
$page="tooprojects";
$title="Tooople Projects";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
include("class/paging.php");

extract($_REQUEST);

session_start();
$type=$_SESSION['type'];
$user_id=$_SESSION["userid"];

include("header.php");
?>

<ol class="breadcrumb ">
	<li><a href="index.php">Home</a></li>
	<li class="active">Projects</li>				
</ol> <!--product header ends-->
<div class="gap10"></div>

<!--<h4>Projects</h4>-->
<div class="gap10"></div>

	<div class="well filterBox">
		<form id="form_search" method="POST" enctype="multipart/form-data">
			<div class="row"><div class="col-md-12">

				<div class="col-md-3 col-sm-6">
					<input type="text" id="duration" name="duration" class="form-control" placeholder="Project Id" value="">
				</div>

				<div class="col-md-3 col-sm-6">
						<input type="text" id="name" name="name" class="form-control" placeholder="Project Name" value="<?php echo $name; ?>">
				</div>

				<!--<div class="col-md-3 col-sm-6">
					<select id="dev_platform" name="dev_platform" class="form-control">
						<option value="" >Technology</option>
						<?php categoryForProgram(9,$dev_platform2); ?>
					</select>
				</div>-->

				<div class="col-md-3 col-sm-6">
					<input type="text" id="duration" name="duration" class="form-control" placeholder="Duration in Weeks" value="<?php echo $duration; ?>">
				</div>

				<!--<div class="col-md-2 col-sm-6">
					<select name="category" id="category" class="form-control">
						<option value="">Project Category</option>
						<?php projectcategory($category) ?>
					</select>
					
					<input type="text" id="proj_cat" name="proj_cat" class="form-control" placeholder="Project Category" onkeypress="return alpha(event)" onchange="AllowOnlyAlphabates(this);" onpaste="return AllowOnlyAlphabates(this);" oncopy="return AllowOnlyAlphabates(this);" onblur="FormatString(this);" value="<?php echo $proj_cat; ?>">
					
				</div>-->
				<div class="col-md-3 col-sm-6">
					<button class="btn searchSub1" name="search" id="button" value="submit">
					<i class="ace-icon fa fa-search bigger-125"></i>
					</button>
					<!--<a href="tooprojects.php" class="btn submitM cancelBtn">Clear</a>-->
				</div>
				<div class="gap1"></div>
			</div></div>
		</form>
	</div>
	<div class="gap10"></div>


	<div class="row"><!-------row------->
		<div class="col-md-9"><div class="row">
			<div class="col-md-4">
				<div class="courseBox"><!-------courseBox------->
					<div class="projImgBox">
						<a href="#"><img src="images/images3.jpeg"></a>
					</div>

					<div class="projContentBox">
						<h4 class="proj_title"><a href="#">Project Title</a></h4>
						<h6 class="projCategoryTit">Project Category1 - 110312</h6>
						<div class="gap20"></div>
						<div class="projContent absoverflow perfectScroll" style="height:70px;">
							<span>TOOOPLE offers cloud-based solutions to address the significant shortage of skilled IT graduates. The TOOOPLE platform will allow students (I) to develop problem solving skills through algorithms (II) Major/Macro projects under the guidance of mentors/with peers; (III) build their e-Portfolio of projects and accredited skills to showcase for future studies and to the potential employers; The Andhra Pradesh State Skills Development Corporation has intent to support few thousands of students every year from colleges in Andhra Pradesh to create jobs in IT sector.
							</span>
						</div>
					</div>

					<div class="cBox">
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-gears"></i></span> : Java
						</div>
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-clock-o"></i></span> : 20 Weeks
						</div>
					</div>
					<div class="gap10"></div>

					<div class="projPriceBox">
						<!--<span class="price1">INR 1000</span>
						<a href="institutionSelectedProject.php?pid=5"><i class="fa fa-check-circle-o active projSel pull-right"></i></a>-->
						<span class="projContimg"><img src="images/my_acc4.png">&nbsp;<a href="#">Hima</a></span>
			 			<a class="btn submitM pull-right"  href="institutionSelectedProject.php?pid=5" style="padding:5px;">Select Project</a>
					</div>
				</div><!-------courseBox------->
			</div>

			<div class="col-md-4">
				<div class="courseBox"><!-------courseBox------->
					<div class="projImgBox">
						<a href="#"><img src="images/images3.jpeg"></a>
					</div>

					<div class="projContentBox">
						<h4 class="proj_title"><a href="#">Project Title</a></h4>
						<h6 class="projCategoryTit">Project Category1 - 110312</h6>
						<div class="gap20"></div>
						<div class="projContent absoverflow perfectScroll" style="height:70px;">
							<span>TOOOPLE offers cloud-based solutions to address the significant shortage of skilled IT graduates. The TOOOPLE platform will allow students (I) to develop problem solving skills through algorithms (II) Major/Macro projects under the guidance of mentors/with peers; (III) build their e-Portfolio of projects and accredited skills to showcase for future studies and to the potential employers; The Andhra Pradesh State Skills Development Corporation has intent to support few thousands of students every year from colleges in Andhra Pradesh to create jobs in IT sector.
							</span>
						</div>
					</div>

					<div class="cBox">
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-gears"></i></span> : Java
						</div>
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-clock-o"></i></span> : 20 Weeks
						</div>
					</div>
					<div class="gap10"></div>

					<div class="projPriceBox">
						<!--<span class="price1">INR 1000</span>
						<a href="institutionSelectedProject.php?pid=5"><i class="fa fa-check-circle-o active projSel pull-right"></i></a>-->
						<span class="projContimg"><img src="images/my_acc4.png">&nbsp;<a href="#">Hima</a></span>
			 			<a class="btn submitM pull-right"  href="institutionSelectedProject.php?pid=5" style="padding:5px;">Select Project</a>
					</div>
				</div><!-------courseBox------->
			</div>

			<div class="col-md-4">
				<div class="courseBox"><!-------courseBox------->
					<div class="projImgBox">
						<a href="#"><img src="images/images3.jpeg"></a>
					</div>

					<div class="projContentBox">
						<h4 class="proj_title"><a href="#">Project Title</a></h4>
						<h6 class="projCategoryTit">Project Category1 - 110312</h6>
						<div class="gap20"></div>
						<div class="projContent absoverflow perfectScroll" style="height:70px;">
							<span>TOOOPLE offers cloud-based solutions to address the significant shortage of skilled IT graduates. The TOOOPLE platform will allow students (I) to develop problem solving skills through algorithms (II) Major/Macro projects under the guidance of mentors/with peers; (III) build their e-Portfolio of projects and accredited skills to showcase for future studies and to the potential employers; The Andhra Pradesh State Skills Development Corporation has intent to support few thousands of students every year from colleges in Andhra Pradesh to create jobs in IT sector.
							</span>
						</div>
					</div>

					<div class="cBox">
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-gears"></i></span> : Java
						</div>
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-clock-o"></i></span> : 20 Weeks
						</div>
					</div>
					<div class="gap10"></div>

					<div class="projPriceBox">
						<!--<span class="price1">INR 1000</span>
						<a href="institutionSelectedProject.php?pid=5"><i class="fa fa-check-circle-o active projSel pull-right"></i></a>-->
						<span class="projContimg"><img src="images/my_acc4.png">&nbsp;<a href="#">Hima</a></span>
			 			<a class="btn submitM pull-right"  href="institutionSelectedProject.php?pid=5" style="padding:5px;">Select Project</a>
					</div>
				</div><!-------courseBox------->
			</div>
			<div class="gap20"></div>
			<div class="col-md-4">
				<div class="courseBox"><!-------courseBox------->
					<div class="projImgBox">
						<a href="#"><img src="images/images3.jpeg"></a>
					</div>

					<div class="projContentBox">
						<h4 class="proj_title"><a href="#">Project Title</a></h4>
						<h6 class="projCategoryTit">Project Category1 - 110312</h6>
						<div class="gap20"></div>
						<div class="projContent absoverflow perfectScroll" style="height:70px;">
							<span>TOOOPLE offers cloud-based solutions to address the significant shortage of skilled IT graduates. The TOOOPLE platform will allow students (I) to develop problem solving skills through algorithms (II) Major/Macro projects under the guidance of mentors/with peers; (III) build their e-Portfolio of projects and accredited skills to showcase for future studies and to the potential employers; The Andhra Pradesh State Skills Development Corporation has intent to support few thousands of students every year from colleges in Andhra Pradesh to create jobs in IT sector.
							</span>
						</div>
					</div>

					<div class="cBox">
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-gears"></i></span> : Java
						</div>
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-clock-o"></i></span> : 20 Weeks
						</div>
					</div>
					<div class="gap10"></div>

					<div class="projPriceBox">
						<!--<span class="price1">INR 1000</span>
						<a href="institutionSelectedProject.php?pid=5"><i class="fa fa-check-circle-o active projSel pull-right"></i></a>-->
						<span class="projContimg"><img src="images/my_acc4.png">&nbsp;<a href="#">Hima</a></span>
			 			<a class="btn submitM pull-right"  href="institutionSelectedProject.php?pid=5" style="padding:5px;">Select Project</a>
					</div>
				</div><!-------courseBox------->
			</div><!-----col-md-4------>

			<div class="col-md-4">
				<div class="courseBox"><!-------courseBox------->
					<div class="projImgBox">
						<a href="#"><img src="images/images3.jpeg"></a>
					</div>

					<div class="projContentBox">
						<h4 class="proj_title"><a href="#">Project Title</a></h4>
						<h6 class="projCategoryTit">Project Category1 - 110312</h6>
						<div class="gap20"></div>
						<div class="projContent absoverflow perfectScroll" style="height:70px;">
							<span>TOOOPLE offers cloud-based solutions to address the significant shortage of skilled IT graduates. The TOOOPLE platform will allow students (I) to develop problem solving skills through algorithms (II) Major/Macro projects under the guidance of mentors/with peers; (III) build their e-Portfolio of projects and accredited skills to showcase for future studies and to the potential employers; The Andhra Pradesh State Skills Development Corporation has intent to support few thousands of students every year from colleges in Andhra Pradesh to create jobs in IT sector.
							</span>
						</div>
					</div>

					<div class="cBox">
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-gears"></i></span> : Java
						</div>
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-clock-o"></i></span> : 20 Weeks
						</div>
					</div>
					<div class="gap10"></div>

					<div class="projPriceBox">
						<!--<span class="price1">INR 1000</span>
						<a href="institutionSelectedProject.php?pid=5"><i class="fa fa-check-circle-o active projSel pull-right"></i></a>-->
						<span class="projContimg"><img src="images/my_acc4.png">&nbsp;<a href="#">Hima</a></span>
			 			<a class="btn submitM pull-right"  href="institutionSelectedProject.php?pid=5" style="padding:5px;">Select Project</a>
					</div>
				</div><!-------courseBox------->
			</div><!-----col-md-4------>

			<div class="col-md-4">
				<div class="courseBox"><!-------courseBox------->
					<div class="projImgBox">
						<a href="#"><img src="images/images3.jpeg"></a>
					</div>

					<div class="projContentBox">
						<h4 class="proj_title"><a href="#">Project Title</a></h4>
						<h6 class="projCategoryTit">Project Category1 - 110312</h6>
						<div class="gap20"></div>
						<div class="projContent absoverflow perfectScroll" style="height:70px;">
							<span>TOOOPLE offers cloud-based solutions to address the significant shortage of skilled IT graduates. The TOOOPLE platform will allow students (I) to develop problem solving skills through algorithms (II) Major/Macro projects under the guidance of mentors/with peers; (III) build their e-Portfolio of projects and accredited skills to showcase for future studies and to the potential employers; The Andhra Pradesh State Skills Development Corporation has intent to support few thousands of students every year from colleges in Andhra Pradesh to create jobs in IT sector.
							</span>
						</div>
					</div>

					<div class="cBox">
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-gears"></i></span> : Java
						</div>
						<div class="col-md-6">
							<span class="proI"><i class="fa fa-clock-o"></i></span> : 20 Weeks
						</div>
					</div>
					<div class="gap10"></div>

					<div class="projPriceBox">
						<!--<span class="price1">INR 1000</span>
						<a href="institutionSelectedProject.php?pid=5"><i class="fa fa-check-circle-o active projSel pull-right"></i></a>-->
						<span class="projContimg"><img src="images/my_acc4.png">&nbsp;<a href="#">Hima</a></span>
			 			<a class="btn submitM pull-right"  href="institutionSelectedProject.php?pid=5" style="padding:5px;">Select Project</a>
					</div>
				</div><!-------courseBox------->
			</div><!-----col-md-4------>



		</div></div><!-------col-md-9-------->

		<div class="col-md-3"><!-----col-md-3-------->
			<div class="projDetail_rhs"><!-----projDetail_rhs-------->
				<div class="rhs_cat">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"><!----category----->
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h5 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#category" aria-expanded="true" aria-controls="collapseOne">
									PROJECT CATEGORIES<span class="pull-right">+</span>
									</a>
								</h5>
								<span class="separateLine"></span>
							</div>
							<div id="category" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<ul class="projRhsList">
									<li><a href="#">Project Category1</a><span class="pull-right">25</span></li>
									<li><a href="#">Project Category2</a><span class="pull-right">5</span></li>
									<li><a href="#">Project Category3</a><span class="pull-right">15</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div><!-------category------>
				</div>
				<div class="dividerLine"></div>

				<div class="rhs_cat">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"><!----TECHNOLOGY----->
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h5 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#tech" aria-expanded="true" aria-controls="collapseOne">
									TECHNOLOGY<span class="pull-right">+</span>
									</a>
								</h5>
								<span class="separateLine"></span>
							</div>
							<div id="tech" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<ul class="projRhsList">
										<li><a href="#">Php</a><span class="pull-right">25</span></li>
										<li><a href="#">Java</a><span class="pull-right">5</span></li>
										<li><a href="#">C,C++</a><span class="pull-right">15</span></li>
										<li><a href="#">Photoshop</a><span class="pull-right">15</span></li>
										<li><a href="#">Dot Net</a><span class="pull-right">5</span></li>
										<li><a href="#">Networking</a><span class="pull-right">10</span></li>
									</ul>
								</div>
							</div>
						</div>
					</div><!-------TECHNOLOGY------>
				</div>
				<div class="dividerLine"></div>

				<div class="rhs_cat">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"><!----Date----->
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne">
								<h5 class="panel-title">
									<a role="button" data-toggle="collapse" data-parent="#accordion" href="#proj_date" aria-expanded="true" aria-controls="collapseOne">
									PROJECT DATE<span class="pull-right">+</span>
									</a>
								</h5>
								<span class="separateLine"></span>
							</div>
							<div id="proj_date" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<form id="" method="POST" enctype="multipart/form-data">
									<input type="text" id="" name="" class="form-control dateDefault" placeholder="From" value="">
									<div class="gap10"></div>
									<input type="text" id="" name="" class="form-control dateDefault" placeholder="To" value="">
									<div class="gap10"></div>
									<input type="submit" id="search_submit" name="search_submit" class="btn submitM" value="Search" style="width:100%;">
									</form>
								</div>
							</div>
						</div>
					</div><!-------Date------>
				</div>

			</div><!-----projDetail_rhs-------->
		</div><!-----col-md-3-------->

	</div><!-------row------->

	<div class="gap40"></div>
	<a class="btn submitM font16" href="institutionSelectedProject.php">Add Selected Projects</a>
	<div class="gap20"></div>


	<div class="text-center">
		<nav aria-label="Page navigation">
			<ul class="pagination">
				<li><span class="active" style="color:#000000;">1</span></li>
				<li><a href="tooprojects.php?&startrow=9">2 </a></li>
				<li><a href="tooprojects.php?&startrow=9" aria-label="Next"><span aria-hidden="true">»</span></a></li>
			</ul>
		</nav>
	</div>
	<div class="gap20"></div>





<?php include("footer.php"); ?>

<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#form_search").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
                                            name: {
                                           lettersonly: true,
                                            },
                                           
                                            dev_platform: {
                                          alphanumeric: true,
                                            },
					    duration: {
						 alphanumeric: true,
					     }
					     proj_cat: {
					     lettersonly: true,
                                            },
					                                             
               },


				//The error message Str here

           messages: {


					    ecpercent: {
                                            required: "Please enter % Obtained",
					    decimalnum: "Kindly Enter the Numbers and dot",
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

function empty_form(val1){
        $("#"+val1).closest('#form_search').find("input[type=text], select, textarea").val("");
	
}
</script>
