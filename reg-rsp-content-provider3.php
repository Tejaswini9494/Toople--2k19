<?php
$page="reg-rsp-content-provider3";
$title="Registration &raquo; Representative for Service Provider-Content Provider";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-rsp-content-provider3.php");
}

if(isset($proceed_submit)){
	header("location:reg-rsp-content-provider4.php");
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss formss3">

	<ul class="nav nav-tabs">
		<li>
			<div class="liLine"></div>
			<a href="reg-rsp-content-provider1.php"></a>
			<div class="gap10"></div>Content Provider Service Provider Organization Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-rsp-content-provider2.php"></a>
			<div class="gap10"></div>Content Provider Service Provider Bank Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Content Provider Service Provider Representative Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-rsp-content-provider4.php"></a>
			<div class="gap10"></div>Content Provider Service Provider Agreement
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Content Provider Service Provider Representative Details</h3>
			<div class="gap10"></div>
			<form id="form_rsp_cp3">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="reg_cpsprep_name" id="reg_cpsprep_name" class="form-control" placeholder="Name">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsprep_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Employee ID No. <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-users"></i></span>
						<input type="text" name="reg_cpsprep_idno" id="reg_cpsprep_idno" class="form-control" placeholder="ID Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsprep_idno" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Designation/Role <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
						<input type="text" name="reg_cpsprep_desig" id="reg_cpsprep_desig" class="form-control" placeholder="Designation/Role">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsprep_desig" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email ID <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="reg_cpsprep_email" id="reg_cpsprep_email" class="form-control" placeholder="Email">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsprep_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Alternative Email ID</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="reg_cpsprep_altemail" id="reg_cpsprep_altemail" class="form-control" placeholder="Email">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsprep_altemail" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="reg_cpsprep_phone" id="reg_cpsprep_phone" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsprep_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Alternative Phone Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="reg_cpsprep_altphone" id="reg_cpsprep_altphone" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsprep_altphone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Upload Photo </label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-picture-o"></i></span>
						<input type="file" name="reg_cpsprep_photo" id="reg_cpsprep_photo" class="form-control" placeholder="">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsprep_photo" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="col-sm-9 col-sm-push-3">
					<input type="submit" id="" name="" value="Add Representative" class="btn submitM">
				</div>
				<div class="gap30"></div>

				<div class="col-md-12">
				<div class="table-responsive">
					<table width="100%" class="table table-striped border">
						<tr>
						  <td>Name</td>
						  <td>ID No.</td>
						  <td>Designation/Role</td>
						  <td>Language</td>
						  <td>Email</td>
						  <td>Phone</td>
						  <td>Suburb/Town/City</td>
						  <td>Postal Code</td>
						  <td>Country</td>
						  <td align="right">Action</td>
						</tr>
						<tr>
						  <td>Jack</td>
						  <td>ID101</td>
						  <td>Tutor</td>
						  <td>English</td>
						  <td>jack@email.com</td>
						  <td>98xxxxxxxxx</td>
						  <td>Chennai</td>
						  <td>60xxxxxx</td>
						  <td>India</td>
						  <td align="right"><i class="fa fa-pencil edit"></i><i class="fa fa-trash trash"></i></td>
						</tr>
					</table>
				</div>
				</div> 

				<div class="gap20"></div>

		      </div>  
			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Save"> &nbsp;
				<input type="submit" class="btn submitM" id="proceed_submit" name="proceed_submit" value="Save & Proceed"> &nbsp;
				<input type="reset" class="btn submitM" id="" value="Clear"> &nbsp;
				<a class="btn submitM" id="" href="index.php">Cancel</a>
			</div>
			</form>
			<div class="gap20"></div>
		</div>
	</div>

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
            $("#form_rsp_cp3").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

				reg_cpsprep_name: {
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				firstChar: true,
				required: true,
				},

				reg_cpsprep_idno: {
				required: true,
				numbersrest: true,
				minlength: 8,
				maxlength: 15,
				},

				reg_cpsprep_desig: {
				required: true,
				firstChar: true,
				minlength: 3,
				maxlength: 50,
				},

				reg_cpsprep_email: {
				required: true,
				email: true,
				firstChar: true,
				},

				reg_cpsprep_altemail: {
				email: true,
				firstChar: true,
				required: true,
				},

				reg_cpsprep_phone: {
				phoneNL: true,
				minlength: 8,
				maxlength: 15,
				required: true,
				},

				reg_cpsprep_altphone: {
				required: true,
				phoneNL: true,
				minlength: 8,
				maxlength: 15,
				},

				reg_cpsprep_photo: {
				required: true,
				imgextension: true,
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
