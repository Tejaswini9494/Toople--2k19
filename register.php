<?php
$page="register";
$title="Register";
$ses="no";
include("header.php"); ?>

<div class="row">
<div class="col-md-4 col-md-push-4">

	<h3>Register</h3>
	<div class="gap10"></div>

	<form id="form_reg1" action="register.php?t=1" method="POST">

		<div class="form-group">
			<input type="text" class="form-control" id="user_email" name="user_email" placeholder="Email Address">
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<input type="password" class="form-control" id="" name="" placeholder="Confirm Password">
		</div>
		<div class="gap10"></div>

		<a class="btn submitM pull-right" id="" href="#modal_otlSuccess" data-toggle="modal">Register</a>
		<div class="gap20"></div>
	</form>

	<div class="gap10"></div>
</div>
</div>


<?php include("footer.php"); ?>
