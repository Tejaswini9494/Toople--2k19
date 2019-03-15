<?php
$page="institutionMentorSelect";
$title="Mentor Services";
include("header.php"); ?>

<h3 class="">Mentor Services</h3>
<div class="gap30"></div>

<div class="well">
	<form>
	<div class="col-sm-3">
		<input type="text" placeholder="Mentor Type" class="form-control" name="" id="">
	</div>
	<div class="col-sm-3">
		<input type="text" placeholder="Mentor Name" class="form-control" name="" id="">
	</div>
	<div class="col-sm-3">
		<input type="submit" value="Search" class="btn submitM" name="" id="">
	</div>
	<div class="gap1"></div>
	</form>
</div>
<div class="gap20"></div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr class="tr1">
			<td>S.No.</td>
			<td></td>
			<td>Mentor Service ID</td>
			<td>Mentor Type</td>
			<td>Mentor Name</td>
			<td>Price(Per Hour)</td>
			<td>Number of Hours Procured</td>
			<td width="150">Net Price</td>
		</tr>
		<tr>
			<td>1</td>
			<td align="center"><input type="checkbox" value="checkbox" name="checkbox2"></td>
			<td>MEN41632</td>
			<td>PHP</td>
			<td><a href="tooMentor_view.php">Jack</a></td>
			<td>75.00</td>
			<td><input type="text" class="form-control" id="" name="" value="3"></td>
			<td>225.00</td>
		</tr>
		<tr>
			<td>2</td>
			<td align="center"><input type="checkbox" value="checkbox" name="checkbox2"></td>
			<td>MEN41632</td>
			<td>PHP</td>
			<td><a href="tooMentor_view.php">Jack</a></td>
			<td>75.00</td>
			<td><input type="text" class="form-control" id="" name="" value="3"></td>
			<td>225.00</td>
		</tr>
		<tr>
			<td>3</td>
			<td align="center"><input type="checkbox" value="checkbox" name="checkbox2"></td>
			<td>MEN41632</td>
			<td>PHP</td>
			<td><a href="tooMentor_view.php">Jack</a></td>
			<td>75.00</td>
			<td><input type="text" class="form-control" id="" name="" value="3"></td>
			<td>225.00</td>
		</tr>
		<tr>
			<td>4</td>
			<td align="center"><input type="checkbox" value="checkbox" name="checkbox2"></td>
			<td>MEN41632</td>
			<td>PHP</td>
			<td><a href="tooMentor_view.php">Jack</a></td>
			<td>75.00</td>
			<td><input type="text" class="form-control" id="" name="" value="3"></td>
			<td>225.00</td>
		</tr>
		<tr>
			<td>5</td>
			<td align="center"><input type="checkbox" value="checkbox" name="checkbox2"></td>
			<td>MEN41632</td>
			<td>PHP</td>
			<td><a href="tooMentor_view.php">Jack</a></td>
			<td>75.00</td>
			<td><input type="text" class="form-control" id="" name="" value="3"></td>
			<td>225.00</td>
		</tr>
	</table>
</div>
<div class="gap1"></div>

<ul class="pagination pull-right">
	<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
	<li class="active"><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
</ul>
<div class="gap15"></div>

<div class="table-responsive">
	<table class="table table-bordered table-striped">
		<tr>
			<td colspan="7" align="right">Total</td>
			<td width="150"><strong>1125.00</strong></td>
		</tr>
		<tr>
			<td colspan="7" align="right">Tax</td>
			<td><strong>10%</strong></td>
		</tr>
		<tr>
			<td colspan="7" align="right">Grand Total</td>
			<td><strong>1237.50</strong></td>
		</tr>
	</table>
</div>
<div class="gap20"></div>

<div class="pull-right">
	<a href="institutionProjectPayment.php" class="btn btn-primary">Continue</a>
</div>
<div class="gap20"></div>

<?php include("footer.php"); ?>
