<?php
$page="reg-rsp-content-provider1";
$title="Registration &raquo; Representative for Service Provider-Content Provider";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-rsp-content-provider1.php");
}

if(isset($proceed_submit)){
	header("location:reg-rsp-content-provider2.php");
}


include("header.php"); ?>

<h2><?php echo $title; ?></h2>
<div class="gap30"></div>

<div class="formss formss3">

	<ul class="nav nav-tabs">
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Content Provider Service Provider Organization Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-rsp-content-provider2.php"></a>
			<div class="gap10"></div>Content Provider Service Provider Bank Details
		</li>
		<li>
			<div class="liLine"></div>
			<a href="reg-rsp-content-provider3.php"></a>
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
			<h3>Content Provider Service Provider Organization Details</h3>
	<div class="gap10"></div>
			<form id="form_rsp_mentor">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Organization Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="rsp_org_name" id="rsp_org_name" class="form-control" placeholder="Name">
						</div>
						<div class="gap1"></div>
						<span for="rsp_org_name" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Email <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="text" name="rsp_email" id="rsp_email" class="form-control" placeholder="Email">
						</div>
						<div class="gap1"></div>
						<span for="rsp_email" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Website Address</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-globe"></i></span>
						<input type="text" name="rsp_website" id="rsp_website" class="form-control" placeholder="Website URL">
						</div>
						<div class="gap1"></div>
						<span for="rsp_website" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Official Language</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-volume-up"></i></span>
						<input type="text" name="rsp_language" id="rsp_language" class="form-control" placeholder="Language">
						</div>
						<div class="gap1"></div>
						<span for="rsp_language" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Phone Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-phone"></i></span>
						<input type="tel" name="rsp_phone" id="rsp_phone" class="form-control" placeholder="Phone Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_phone" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

	

				<div class="form-group">
					<label class="col-sm-3 text-right">Suburb/Town/City <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
						<input type="text" name="rsp_city" id="rsp_city" class="form-control" placeholder="Suburb/Town/City">
						</div>
						<div class="gap1"></div>
						<span for="rsp_city" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Postal Code <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						<input type="tel" name="rsp_postal" id="rsp_postal" class="form-control" placeholder="Postal Code">
						</div>
						<div class="gap1"></div>
						<span for="rsp_postal" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="rsp_country" id="rsp_country" class="form-control">
							<option value="">Select</option>
							<option>Loaded Form Master</option>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="rsp_country" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">PAN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
						<input type="text" name="rsp_pan" id="rsp_pan" class="form-control" placeholder="PAN Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_pan" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">TIN Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-file-text"></i></span>
						<input type="text" name="rsp_tin" id="rsp_tin" class="form-control" placeholder="TIN Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_tin" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Service Tax Number</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="rsp_tax" id="rsp_tax" class="form-control" placeholder="Service Tax Number">
						</div>
						<div class="gap1"></div>
						<span for="rsp_tax" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>
				<div class="form-group">
					<label class="col-sm-3 text-right">Bank Details</label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-money"></i></span>
						<input type="text" name="rsp_bank_details" id="rsp_bank_details" class="form-control" placeholder="Bank Details">
						</div>
						<div class="gap1"></div>
						<span for="rsp_bank_details" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>
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
            $("#form_rsp_mentor").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

				rsp_org_name : {
				required: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				firstChar: true,
				},
				
				rsp_email: {
				required: true,
				email: true,
				},		
		
				rsp_website:{
				required: true,
				},

				rsp_language:{
				required: true,
				lettersonly: true,
				minlength: 3,
				maxlength: 50,
				firstChar: true,
				},

				rsp_phone:{
				required: true,
				phoneUS: true,
				minlength: 8,
				maxlength: 15,
				},

				rsp_city:{
				required: true,
				lettersonly: true,
				},

				rsp_postal:{
				required: true,
				minlength: 6,
				maxlength: 18,
				},

   				rsp_country:{
				required: true,
				},

				rsp_pan:{
				required: true,
				alphanumeric: true,
				minlength: 10,
				maxlength: 16,
				},

				rsp_tin:{
				required: true,
				minlength: 8,
				maxlength: 15,
				},

				rsp_tax:{
				required: true,
				numbersrest: true,
				minlength: 15,
				maxlength: 15,
				},

				rsp_bank_details:{
				required: true,
				minlength: 15,
				maxlength: 150,
				firstChar: true,
                                },
                                            
               },

				//The error message Str here

          

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

