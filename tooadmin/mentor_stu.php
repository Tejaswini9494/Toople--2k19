<?php 
$page="userView";
include("header.php");?>
<link href="css/evince.css" rel="stylesheet" type="text/css" />


 
<h3>
<a href="Javascript:history.back()" class="submitM pull-right">Back</a>
Service Providers &raquo; Assigned Students</h3>

<div class="gap10"></div>

<!--content Box -->
<div class="x_panel">
<div class="x_content">

<div class="gap15"></div>

<h3>Service Providers Info</h3>
<table class="table table-bordered table-striped tabBorder" id="dataTable2">
  <thead>
    <tr class="tr1">
      <td align="left">Plan</td>
      <td align="left">Type</td>
      <td align="left">Name</td>
      <td align="left">Email ID</td>
      <td align="left">Identity Number</td>
      <td align="left">Country</td>
      <td align="left">State</td>
      <td align="left">City</td>
      <td align="left">Primary Contact </td>
      <td align="left">Reg Date</td>
      <td align="center"> Status</td>
    </tr>
  </thead>
  <tr class="tr">
    <td class="td_txt">Silver</td>
    <td class="td_txt">Mentor </td>
    <td class="td_txt"><a href="profileView2.php">Varun</a></td>
    <td class="td_txt">Varun@email.com</td>
    <td class="td_num">9898989898</td>
    <td class="td_txt">India</td>
    <td class="td_txt">Tamilnadu</td>
    <td class="td_txt">Chennai</td>
    <td class="td_num">9898989898</td>
    <td class="td_date">22/04/2016</td>
    <td class="td_txt">Approved</td>
  </tr>
</table>
<div class="gap15"></div>
<div class="well filterBox">

<form name="frm" action="#" method="post" >
  <table class=" " align="center" >
    <tbody>
      <tr>
        <td>
          <input name="textfield1" class="boxM" placeholder="Name" type="text" />
          <input name="textfield2" class="boxM" placeholder="Emil Id" type="text" />
          <select name="membership_status" class="seM" >
            <option value="">Country</option>
            <option  value="Deactivated">Loaded from master</option>
          </select>
          <select name="membership_status3" class="seM" >
            <option value="">All Type</option>
            <option value=" " >Project </option>
            <option  value=" "> Internship </option>
          
          </select></td>
        <td><?php include("in_range.php"); ?></td>
        <td><input name="button" id="button" value="Search" class="submitM" type="submit" /></td>
      </tr>
    </tbody>
  </table>
</form>

</div>
 
 <h3>Assigned Students</h3>

<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-striped tabBorder">
  <thead>
    <tr class="tr1">
      <td width="20" align="center">#</td>
      <td align="left">Plan</td>
      <td align="left">Type</td>
      <td align="left">Name</td>
      <td align="left">Email ID</td>
      <td align="left">Identity Number</td>
      <td align="left">Country</td>
      <td align="left">State</td>
      <td align="left">City</td>
      <td align="left">Primary Contact </td>
      <td align="left">Products</td>
      <td align="left">Reg Date</td>
      </tr>
  </thead>
    <tr class="tr">
      <td align="center">1</td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Project </td>
      <td class="td_txt"><a href="profileView.php">Jack</a></td>
      <td class="td_txt">Jack@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_num"><a href="productView_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
      </tr>
    <tr class="tr">
      <td align="center">2</td>
      <td class="td_txt">Silver</td>
      <td class="td_txt"> Internship </td>
      <td class="td_txt"><a href="profileView.php">Jack</a></td>
      <td class="td_txt">Jack@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_num"><a href="productView_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
      </tr>
    <tr class="tr">
      <td align="center">3</td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Project </td>
      <td class="td_txt"><a href="profileView.php">Jack</a></td>
      <td class="td_txt">Jack@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_num"><a href="productView_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
      </tr>
    <tr class="tr">
      <td align="center">4</td>
      <td class="td_txt">Silver</td>
      <td class="td_txt"> Internship </td>
      <td class="td_txt"><a href="profileView.php">Jack</a></td>
      <td class="td_txt">Jack@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_num"><a href="productView_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
      </tr>
    <tr class="tr">
      <td align="center">5</td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Project </td>
      <td class="td_txt"><a href="profileView.php">Jack</a></td>
      <td class="td_txt">Jack@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_num"><a href="productView_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
      </tr>
</table>
</div>

<br>
<?php  include("footer.php"); ?>
