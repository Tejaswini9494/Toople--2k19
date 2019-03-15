<?php  
$page="paymentStatus";
 
include("header.php"); ?> 
<h1> Payment Status &raquo; View </h1>

<div class="gap10"></div>

<!--content Box -->
<div class="x_panel">
<div class="x_content">

<div class="gap15"></div>
<div class="well filterBox">
 
  <table class=" " align="center" >
  <tbody>
  <tr>
    <td><input readonly="readonly" placeholder="From Date" name="dob" id="dob" class="date" />
      <input readonly="readonly" name="dob2" placeholder="To Date" id="dob2" class="date" /></td>
    <td><select name="select6" id="select6" class="boxM" >
      <option value="">Payment Status</option>
      <option value="">Progress</option>
      <option value="" selected="selected">Pending</option>
      <option value="">Paid</option>
    </select></td>
    <td><input name="textfield2" class="boxM" placeholder="Product Name" type="text" /></td>
    <td><input name="button" id="button" value="Search" class="submitM" type="submit"></td>
  </tr>
 </tbody>
</table>
</div>
<br>

<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-striped tabBorder">
  <thead>
<tr class="tr1">
    <td class="" align="center" width="20">&nbsp;</td>
    <td width="20" align="center" class="">#</td>
    <td class="">Payment Detail</td>
    <td class="">Trasanction Id [View Invoice]</td>
    <td align="left">Product Name</td>
    <td class="">Contact Person</td>
    <td class="" align="center">Amount</td>
	<td width="100" align="center" class="">Payment Status</td>
	<td align="center" >Remarks</td>
	</tr>
  </thead>
  <tr class="tr">
    <td class="" align="center"><input name="checkbox2" value="checkbox" type="checkbox"></td>
    <td class="" align="center">1</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">600</td>
	<td class="" align="center"><select name="select" id="select" class="boxM" >
	  <option value="">Progress</option>
	  <option value="">Pending</option>
	  <option value="">Paid</option>
	  </select></td>
	<td align="center"><a href="#" data-toggle="modal" data-target="#modal_remarks" class="submitM" >Add / View</a><a href="#"></a><a href="#"></a></td>
	</tr>
  <tr class="tr">
    <td class="" align="center"><input name="checkbox3" value="checkbox" type="checkbox"></td>
    <td class="" align="center">2</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">900</td>
	<td class="" align="center"><select name="select2" id="select2" class="boxM" >
	  <option value="">Progress</option>
	  <option value="" selected="selected">Pending</option>
	  <option value="">Paid</option>
	  </select></td>
	<td align="center"><a href="#" data-toggle="modal" data-target="#modal_remarks" class="submitM" >Add / View</a><a href="#"></a></td>
	</tr>
  <tr class="tr">
    <td class="" align="center"><input name="checkbox4" value="checkbox" type="checkbox"></td>
    <td class="" align="center">3</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">1200</td>
	<td class="" align="center"><select name="select3" id="select3" class="boxM" >
	  <option value="">Progress</option>
	  <option value="">Pending</option>
	  <option value="" selected="selected">Paid</option>
	  </select></td>
	<td align="center"><a href="#" data-toggle="modal" data-target="#modal_remarks" class="submitM" >Add / View</a><a href="#"></a></td>
	</tr>
  <tr class="tr">
    <td class="" align="center"><input name="checkbox5" value="checkbox" type="checkbox"></td>
    <td class="" align="center">4</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">600</td>
    <td class="" align="center"><select name="select4" id="select4" class="boxM" >
      <option value="">Progress</option>
      <option value="">Pending</option>
      <option value="" selected="selected">Paid</option>
    </select></td>
    <td align="center"><a href="#" data-toggle="modal" data-target="#modal_remarks" class="submitM" >Add / View</a><a href="#"></a><a href="#"></a></td>
    </tr>
  <tr class="tr">
    <td class="" align="center"><input name="checkbox6" value="checkbox" type="checkbox"></td>
    <td class="" align="center">5</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">900</td>
    <td class="" align="center"><select name="select5" id="select5" class="boxM" >
      <option value="">Progress</option>
      <option value="">Pending</option>
      <option value="" selected="selected">Paid</option>
    </select></td>
    <td align="center"><a href="#" data-toggle="modal" data-target="#modal_remarks" class="submitM" >Add / View</a><a href="#"></a></td>
    </tr>
  <tr class="tr">
    <td class="" align="center"><input name="checkbox" value="checkbox" type="checkbox" /></td>
    <td class="" align="center">6</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">600</td>
    <td class="" align="center"><select name="select7" id="select11" class="boxM" >
      <option value="">Progress</option>
      <option value="">Pending</option>
      <option value="">Paid</option>
    </select></td>
    <td align="center"><a href="#" data-toggle="modal" data-target="#modal_remarks" class="submitM" >Add / View</a><a href="#"></a></td>
    </tr>
  <tr class="tr">
    <td class="" align="center"><input name="checkbox" value="checkbox" type="checkbox" /></td>
    <td class="" align="center">7</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">900</td>
    <td class="" align="center"><select name="select7" id="select10" class="boxM" >
      <option value="">Progress</option>
      <option value="" selected="selected">Pending</option>
      <option value="">Paid</option>
    </select></td>
    <td align="center"><a href="#" data-toggle="modal" data-target="#modal_remarks" class="submitM" >Add / View</a><a href="#"></a><a href="#"></a></td>
    </tr>
  <tr class="tr">
    <td class="" align="center"><input name="checkbox" value="checkbox" type="checkbox" /></td>
    <td class="" align="center">8</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">1200</td>
    <td class="" align="center"><select name="select7" id="select9" class="boxM" >
      <option value="">Progress</option>
      <option value="">Pending</option>
      <option value="" selected="selected">Paid</option>
    </select></td>
    <td align="center"><a href="#" data-toggle="modal" data-target="#modal_remarks" class="submitM" >Add / View</a><a href="#"></a></td>
    </tr>
  <tr class="tr">
    <td class="" align="center"><input name="checkbox" value="checkbox" type="checkbox" /></td>
    <td class="" align="center">9</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">600</td>
    <td class="" align="center"><select name="select7" id="select8" class="boxM" >
      <option value="">Progress</option>
      <option value="">Pending</option>
      <option value="" selected="selected">Paid</option>
    </select></td>
    <td align="center"><a href="#" data-toggle="modal" data-target="#modal_remarks" class="submitM" >Add / View</a><a href="#"></a></td>
    </tr>
  <tr class="tr">
    <td class="" align="center"><input name="checkbox" value="checkbox" type="checkbox" /></td>
    <td class="" align="center">10</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">900</td>
    <td class="" align="center"><select name="select7" id="select7" class="boxM" >
      <option value="">Progress</option>
      <option value="">Pending</option>
      <option value="" selected="selected">Paid</option>
      </select></td>
    <td align="center"><a href="#" data-toggle="modal" data-target="#modal_remarks" class="submitM" >Add / View</a><a href="#"></a></td>
  </tr>
</table>

</div>


<br>
<table class="table table-bordered table-striped tabBorder">
    <tr class="tr" align="center">
      <td colspan="11" align="left"><input name="Submit2" value="Update" class="but_update" type="submit" />
       <input name="Submit3" value="Export CSV" class="but_ecsv" type="submit" /></td>
    </tr>
</table>
 <?php  include("modal_remarks.php"); ?>
<?php  include("footer.php"); ?>
