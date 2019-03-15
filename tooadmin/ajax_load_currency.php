<?php
require_once '../class/config.php';
require_once '../includes/functions.php';

extract($_REQUEST);

$sql9 = "SELECT currency FROM  master_country  WHERE country_id=$country";
$statement9=$mysqli->prepare($sql9);
$statement9->execute();
$statement9->store_result();
$statement9->bind_result($currency);
$statement9->fetch();
?>
<label class="col-sm-3 text-right">Currency <span class="red">*</span></label>
<div class="col-sm-9">
	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-cube"></i></span>
	<input type="text" name="currency" id="currency" class="form-control" value="<?php echo $currency; ?>" readonly>
	</div>
	<div class="gap1"></div>
	<span for="currency" class="errors"></span>
</div>
<div class="gap1"></div>