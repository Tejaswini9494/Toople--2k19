<?php 
$page="user9View";
include("header.php");?> 
<h3>
<!--<a href="user3Add.php" class="submitM pull-right">Add</a>-->
Representative of Institution - Coordinator &raquo; List View </h3>

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
          <input name="textfield2" class="boxM" placeholder="Email Id" type="text" />
          <select name="membership_status" class="seM" >
            <option value="">Country</option>
            <option  value="Deactivated">Loaded from master</option>
          </select>
          <select name="membership_status2" class="seM" >
            <option value="">All Staus</option>
            <option value="Active" >Approved</option>
            <option  value="Deactivated">Rejected</option>
            <option  value="Deactivated">Pending</option>
        </select></td>
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
<!--      <td width="16" align="center"><img src="images/edit.png" alt="edit" /></td>	-->
      <td align="left">Plan</td>
      <td align="left">Name</td>
      <td align="left">Org Name</td>
      <td align="left">Email ID</td>
      <td align="left">Identity Number</td>
      <td align="left">Country</td>
      <td align="left">State</td>
      <td align="left">City</td>
      <td align="left">Primary Contact </td>
      <td align="left">Date</td>
      <td align="center"> Status</td>
    </tr>
  </thead>
    <tr class="tr">
      <td align="center">1</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Approved</td>
    </tr>
    <tr class="tr">
      <td align="center">2</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Pending</td>
    </tr>
    <tr class="tr">
      <td align="center">3</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Approved</td>
    </tr>
    <tr class="tr">
      <td align="center">4</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Approved</td>
    </tr>
    <tr class="tr">
      <td align="center">5</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Approved</td>
    </tr>
    <tr class="tr">
      <td align="center">6</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Pending</td>
    </tr>
    <tr class="tr">
      <td align="center">7</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Rejected</td>
    </tr>
    <tr class="tr">
      <td align="center">8</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Approved</td>
    </tr>
    <tr class="tr">
      <td align="center">9</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Approved</td>
    </tr>
    <tr class="tr">
      <td align="center">10</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Rejected</td>
    </tr>
    <tr class="tr">
      <td align="center">11</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Approved</td>
    </tr>
    <tr class="tr">
      <td align="center">12</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
<!--      <td align="center"><a href="user3Add.php"><img src="images/edit.png" alt="edit" /></a></td>	-->
      <td class="td_txt">Silver</td>
      <td class="td_txt">Jack</td>
      <td class="td_txt"><a href="profileView3.php">Demo</a></td>
      <td class="td_txt">Demo@email.com</td>
      <td class="td_num">9898989898</td>
      <td class="td_txt">India</td>
      <td class="td_txt">Tamilnadu</td>
      <td class="td_txt">Chennai</td>
      <td class="td_num">9898989898</td>
      <td class="td_date">22/04/2016</td>
      <td class="td_txt">Approved</td>
    </tr>
</table>
</div>

<br>
<table class="table table-bordered table-striped tabBorder">
    <tr class="tr" align="center">
      <td colspan="11" align="left"><input type="submit" name="active3" value="Archive" class="submitM" onclick="return confirmDelete();" />
        <input type="submit" name="active" value="Approve" class="submitM" />
        <input type="submit" name="dective" value="Reject" class="submitM" />
	<a href="user3ViewArchive.php" class="submitM pull-right">Archive List</a>
</td>
    </tr>
</table>
<?php  include("footer.php"); ?>
