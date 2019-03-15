<?php 
$page="productsMgnt";
include("header.php");?> 

<h3>
<a href="#" class="submitM pull-right">Create</a>
Products &raquo; List View</h3>

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
          <select class="boxM">
		<option value="">Product Category</option>
	  </select>

          <select class="boxM">
		<option value="">Product Sub-Category</option>
	  </select>
      
      <input type="text" class="boxM" placeholder="Product Name" /></td>
        <!--<td><?php //include("in_range.php"); ?></td> -->
        <td><input name="button" id="button" value="Search" class="submitM" type="submit" /></td>
      </tr>
    </tbody>
  </table>
</form>

</div>

<h2>Inventory List</h2>

<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-striped tabBorder">
  <thead>
    <tr class="tr1">
      <td width="20" align="center">#</td>
      <td align="left">&nbsp;</td>
      <td align="left">Product Id</td>
      <td align="left">Category</td>
      <td align="left">Sub-Category</td>
      <td align="left">Product Name</td>
      <td align="left"> Created By</td>
      <td align="left">Created Date</td>
      <td align="left">View</td>
      <td align="left">Status</td>
    </tr>
  </thead>
    <tr class="tr">
      <td align="center">1</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">3341</td>
      <td class="td_txt">Student Project</td>
      <td class="td_txt">PHP</td>
      <td class="td_txt">Demo Name1</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">2</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">3342</td>
      <td class="td_txt">Algorithm</td>
      <td class="td_txt">Java</td>
      <td class="td_txt">Demo Name2</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Pending</td>
      </tr>
    <tr class="tr">
      <td align="center">3</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">3343</td>
      <td class="td_txt">Test Scripts</td>
      <td class="td_txt">PHP</td>
      <td class="td_txt">Demo Name3</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">4</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">3344</td>
      <td class="td_txt">Tutorials</td>
      <td class="td_txt">Java</td>
      <td class="td_txt">Demo Name4</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">5</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">3345</td>
      <td class="td_txt">Blog</td>
      <td class="td_txt">PHP</td>
      <td class="td_txt">Demo Name5</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">6</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">3346</td>
      <td class="td_txt">Student Project</td>
      <td class="td_txt">Java</td>
      <td class="td_txt">Demo Name6</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Pending</td>
      </tr>
    <tr class="tr">
      <td align="center">7</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">3347</td>
      <td class="td_txt">Algorithm</td>
      <td class="td_txt">PHP</td>
      <td class="td_txt">Demo Name7</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Rejected</td>
      </tr>
    <tr class="tr">
      <td align="center">8</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">3348</td>
      <td class="td_txt">Test Scripts</td>
      <td class="td_txt">Java</td>
      <td class="td_txt">Demo Name1</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">9</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">3349</td>
      <td class="td_txt">Tutorials</td>
      <td class="td_txt">PHP</td>
      <td class="td_txt">Demo Name1</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">10</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">33410</td>
      <td class="td_txt">Blog</td>
      <td class="td_txt">Java</td>
      <td class="td_txt">Demo Name1</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Rejected</td>
      </tr>
    <tr class="tr">
      <td align="center">11</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">33411</td>
      <td class="td_txt">Tutorials</td>
      <td class="td_txt">PHP</td>
      <td class="td_txt">Demo Name1</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">12</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">33412</td>
      <td class="td_txt">Blog</td>
      <td class="td_txt">Java</td>
      <td class="td_txt">Demo Name1</td>
      <td class="td_num">Admin</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">&nbsp;</td>
      <td class="td_txt">Approved</td>
      </tr>
</table>
</div>

<br>
 
<table class="table table-bordered table-striped tabBorder">
    <tr class="tr" align="center">
      <td colspan="11" align="left"><input type="submit" name="active3" value="Delete" class="submitM" onclick="return confirmDelete();" />
        <input type="submit" name="active" value="Activate" class="submitM" />
        <input type="submit" name="dective" value="Deactivate" class="submitM" />
	</td>
    </tr>
</table>
 

<?php  include("footer.php"); ?>
