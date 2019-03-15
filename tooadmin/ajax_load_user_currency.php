<?php
include_once("../class/config.php");
include_once("../includes/functions.php");

extract($_REQUEST);

$query3 = "SELECT co_country FROM  customer_organisation  WHERE user_id=$user_id";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($co_country3);
$statement3->fetch();

$query4 = "SELECT currency FROM  master_country  WHERE country_id=$co_country3";
$statement4=$mysqli->prepare($query4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($currency4);
$statement4->fetch();

?>

<div class="form-group">
	<label class="col-sm-3 text-right">Currency <span class="red">*</span></label>
	<div class="col-sm-9">
		<div class="input-group">
		<span class="input-group-addon"><i class="fa fa-cube"></i></span>
		<input type="text" name="" id="" class="form-control" placeholder="" value="<?php echo $currency4; ?>" readonly>
		<input type="hidden" name="trans_currency" id="trans_currency" class="form-control" placeholder="Currency" value="<?php echo $co_country3; ?>">
		</div>
		<div class="gap1"></div>
		<span for="trans_currency" class="errors"></span>
	</div>
	<div class="gap1"></div>
</div>
<div class="gap15"></div>

