<?php
$page="reg-rsp-content-provider2";
$title="Registration &raquo; Representative for Service Provider-Content Provider";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
	header("location:reg-rsp-content-provider2.php");
}

if(isset($proceed_submit)){
	header("location:reg-rsp-content-provider3.php");
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
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
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
			<h3>Content Provider Service Provider Bank Details</h3>
			<div class="gap10"></div>
			<form id="form_rsp_cp2">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Bank Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-university"></i></span>
						<input type="text" name="reg_cpsporg_bankname" id="reg_cpsporg_bankname" class="form-control" placeholder="Bank Name">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_bankname" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Branch Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-building"></i></span>
						<input type="text" name="reg_cpsporg_bankbranch" id="reg_cpsporg_bankbranch" class="form-control" placeholder="Branch Name">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_bankbranch" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Branch Code <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-building-o"></i></span>
						<input type="text" name="reg_cpsporg_bankbranchcode" id="reg_cpsporg_bankbranchcode" class="form-control" placeholder="Branch Code">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_bankbranchcode" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Country <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
						<select name="reg_cpsporg_bankcountry" id="reg_cpsporg_bankcountry" class="form-control">
							<option value="">Select</option>
							<option>Loaded Form Master</option>
						</select><i></i>
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_bankcountry" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>

				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Type of Account <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-home"></i></span>
						<input type="text" name="reg_cpsporg_bankacct" id="reg_cpsporg_bankacct" class="form-control" placeholder="Type of Account">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_bankacct" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Beneficiary Name <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"></i></span>
						<input type="text" name="reg_cpsporg_beneficiary" id="reg_cpsporg_beneficiary" class="form-control" placeholder="Beneficiary Name">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_beneficiary" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Account Number <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-list-ol"></i></span>
						<input type="text" name="reg_cpsporg_bankactno" id="reg_cpsporg_bankactno" class="form-control" placeholder="Account Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_bankactno" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Bank Details<span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-newspaper-o"></i></span>
						<textarea name="reg_cpsporg_bankdetails" id="reg_cpsporg_bankdetails" class="form-control" placeholder="Complete Bnak Address"></textarea>
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_bankdetails" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

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
            $("#form_rsp_cp2").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {

				reg_cpsporg_bankname: {
				required: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				},

				reg_cpsporg_bankbranch:{
				required: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				},

				reg_cpsporg_bankbranchcode:{
				required: true,
				},
				reg_cpsporg_bankcountry:{
				required: true,
				},

				reg_cpsporg_bankacct:{
				required: true,
				minlength: 6,
				maxlength: 15,
				},

				reg_cpsporg_beneficiary:{
				required: true,
				lettersonly4N: true,
				minlength: 3,
				maxlength: 50,
				},

				reg_cpsporg_bankactno:{
				required: true,
				},
				reg_cpsporg_bankdetails:{
				required: true,
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
