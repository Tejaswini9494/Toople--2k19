<?php 
$page="user2ViewArchive";
include("header.php");?> 
<h3>
<a href="javascript:history.back();" class="submitM pull-right">Back</a>
Representative of Service Provider Organization &raquo; Archive List </h3>

<div class="gap10"></div>

<!--content Box -->
<div class="x_panel">
<div class="x_content">

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
	</td>
        <td><?php include("in_range.php"); ?></td>
        <td><input name="button" id="button" value="Search" class="submitM" type="submit" /></td>
      </tr>
    </tbody>
  </table>
</form>

</div>
 

<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-striped tabBorder">
  <thead>
    <tr class="tr1">
      <td width="20" align="center">#</td>
      <td width="10" align="center"><input type="checkbox" name="changeStatus[]3" value="" /></td>
      <td align="left">Plan</td>
      <td align="left">Type</td>
      <td align="left">Name</td>
      <td align="left">Email ID</td>
      <td align="left">Identity Number</td>
      <td align="left">Country</td>
      <td align="left">State</td>
      <td align="left">City</td>
      <td align="left">Primary Contact </td>
      <td align="center">Assigned Students</td>
      <td align="left">Reg Date</td>
    </tr>
  </thead>
    <tr class="tr">
      <td align="center">1</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Mentor </td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">2</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Content Provider</td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">3</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Mentor </td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">4</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Content Provider</td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">5</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Mentor </td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">6</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Content Provider</td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">7</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Mentor </td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">8</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Content Provider</td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">9</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Mentor </td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">10</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Content Provider</td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">11</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Mentor </td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
    <tr class="tr">
      <td align="center">12</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td class="td_txt">Silver</td>
      <td class="td_txt">Content Provider</td>
      <td class="td_txt"><a href="profileView2.php">Varun</a></td>
      <td class="td_txt">Varun@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td align="center" class="td_num"><a href="mentor_stu.php"><img src="images/view.png"  alt="View" /></a></td>
      <td class="td_date">22/04/2016</td>
    </tr>
</table>
</div>

<br>
<table class="table table-bordered table-striped tabBorder">
    <tr class="tr" align="center">
      <td colspan="11" align="left">
        <input type="submit" name="active" value="De-Archive" class="submitM" />
      </td>
    </tr>
</table>
<?php  include("footer.php"); ?>
