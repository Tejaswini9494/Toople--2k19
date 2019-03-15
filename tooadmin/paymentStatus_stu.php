<?php  
$page="paymentStatus_stu"; 
include("header.php"); ?> 
<h1> My Transaction &raquo; List View </h1><br />

 
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
    <td><select name="select" id="select" class="boxM" >   <option value="">Payment Status</option>
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
  
  <tbody><tr class="tr1">
    <td width="20" align="center" class="">#</td>
    <td class="">Payment Detail</td>
    <td class="">Trasanction Id [View Invoice]</td>
    <td align="left">Product Name</td>
    <td class="">Contact Person</td>
    <td class="" align="center">Amount</td>
	<td width="100" align="center" class="">Payment Status</td>
	</tr>
  <tr class="tr">
    <td class="" align="center">1</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">600</td>
	<td class="" align="center">Progress</td>
	</tr>
  <tr class="tr">
    <td class="" align="center">2</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">900</td>
	<td class="" align="center">Paid</td>
	</tr>
  <tr class="tr">
    <td class="" align="center">3</td>
    <td class="">12/05/15</td>
    <td class=""><a href="#">#334533</a></td>
    <td><a href="productsView.php">demoname</a></td>
    <td class="">demo name</td>
    <td class="" align="center">1200</td>
	<td class="" align="center">Pending</td>
	</tr>
  
  <tr class="tr1">
    <td colspan="7" align="right" height="28"><?php  include("paging.php"); ?>
      </td>
  </tr>

</tbody></table>

</div>

 
 <?php  include("modal_remarks.php"); ?>
<?php  include("footer.php"); ?>