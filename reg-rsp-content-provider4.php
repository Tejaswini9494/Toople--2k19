<?php
$page="reg-rsp-content-provider4";
$title="Registration &raquo; Representative for Service Provider-Content Provider";
$ses="no";

extract($_REQUEST);

if(isset($save_submit)){
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
		<li>
			<div class="liLine"></div>
			<a href="reg-rsp-content-provider3.php"></a>
			<div class="gap10"></div>Content Provider Service Provider Representative Details
		</li>
		<li class="active">
			<div class="liLine"></div>
			<a href="javascript:void(0);"></a>
			<div class="gap10"></div>Content Provider Service Provider Agreement
		</li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="gap30"></div>

			<!------------>
			<h3>Content Provider Service Provider Agreement</h3>
			<div class="gap10"></div>
			<form id="form_rsp_cp4">
			<div class="item1">
				<div class="gap20"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Agreement No. <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-bookmark"></i></span>
						<input type="text" name="reg_cpsporg_agree" id="reg_cpsporg_agree" class="form-control" placeholder="Agreement Number">
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_agree" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Start Date <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
						<input type="text" name="reg_cpsporg_agree_sdate" id="reg_cpsporg_agree_sdate" class="form-control date" placeholder="Start Date" readonly>
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_agree_sdate" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">End Date <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-calendar-o"></i></span>
						<input type="text" name="reg_cpsporg_agree_edate" id="reg_cpsporg_agree_edate" class="form-control date" placeholder="End Date" readonly>
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_agree_edate" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap15"></div>

				<div class="form-group">
					<label class="col-sm-3 text-right">Note <span class="red">*</span></label>
					<div class="col-sm-9">
						<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
						<textarea name="reg_cpsporg_agree_note" id="reg_cpsporg_agree_note" class="form-control" placeholder="Note"></textarea>
						</div>
						<div class="gap1"></div>
						<span for="reg_cpsporg_agree_note" class="errors"></span>
					</div>
					<div class="gap1"></div>
				</div>
				<div class="gap10"></div>

		      </div>  
			<div class="gap10"></div>
			<!------------>

			<div class="col-sm-9 col-sm-push-3">
				<input type="submit" class="btn submitM" id="save_submit" name="save_submit" value="Submit"> &nbsp;
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
            $("#form_rsp_cp4").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
			reg_cpsporg_agree:{
			required: true,
			numbersrest: true,
			},

			reg_cpsporg_agree_sdate:{
			required: true,
			},

			reg_cpsporg_agree_edate: {
			required: true,
			},

			reg_cpsporg_agree_note:{
			required: true,
			firstChar: true,
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
