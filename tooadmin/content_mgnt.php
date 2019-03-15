<?php 
$page="content_mgnt";
include("header.php");?> 

<h3>
<a href="content_add.php" class="submitM pull-right">Add</a>
Content Addition &raquo; List View</h3>

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
          <select class="form-control">
		<option value="">  Category</option>
        <option value="">Student Project</option>
<option value="">Algorithm</option>
<option value="">Test Scripts</option>
<option value="">Tutorials</option>
<option value="">Blog</option>
	  </select>
	</td>
        <td><input type="text" class="boxM" placeholder="Content Name" /></td>
 
        <td>
		<select name="membership_status2" class="seM" >
			<option value="">All Staus</option>
			<option value="Active" >Arrived</option>            
			<option  value="Deactivated">Sent for Approval</option>
			<option  value="Deactivated">Approved</option>
			<option  value="Deactivated">Rejected</option>
		</select>
 
        <td>
		<?php include("in_range.php"); ?>
	</td>
        <td><input name="button" id="button" value="Search" class="submitM" type="submit" /></td>
      </tr>
    </tbody>
  </table>
</form>

</div>
 

<div class="table-responsive">
<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
  <thead>
    <tr class="tr1">
      <td width="20" align="center">#</td>
      <td width="10" align="center">&nbsp;</td>
      <td width="16" align="center"><img src="images/edit.png" alt="edit" /></td>
      <td align="left">Content Id</td>
      <td align="left">Content Name</td>
      <td align="left">Category</td>
      <td align="left">Objectives</td>
      <td align="left">Complexity Level</td>
      <td align="left">Created Date</td>
      <td align="left">Status</td>
      </tr>
  </thead>
    <tr class="tr">
      <td align="center">1</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">3341</td>
      <td class="td_txt"><a href="content_view.php">Content Name1</a></td>
      <td class="td_txt">Student Project</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">2</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">3342</td>
      <td class="td_txt"><a href="content_view.php">Content Name2</a></td>
      <td class="td_txt">Algorithm</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Deactivated</td>
      </tr>
    <tr class="tr">
      <td align="center">3</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">3343</td>
      <td class="td_txt"><a href="content_view.php">Content Name3</a></td>
      <td class="td_txt">Test Scripts</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">4</td>
      <td align="center"><input type="checkbox" name="changeStatus[]" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">3344</td>
      <td class="td_txt"><a href="content_view.php">Content Name4</a></td>
      <td class="td_txt">Tutorials</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">5</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">3345</td>
      <td class="td_txt"><a href="content_view.php">Content Name5</a></td>
      <td class="td_txt">Blog</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">6</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">3346</td>
      <td class="td_txt"><a href="content_view.php">Content Name6</a></td>
      <td class="td_txt">Student Project</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Deactivated</td>
      </tr>
    <tr class="tr">
      <td align="center">7</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">3347</td>
      <td class="td_txt"><a href="content_view.php">Content Name7</a></td>
      <td class="td_txt">Algorithm</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Deactivated</td>
      </tr>
    <tr class="tr">
      <td align="center">8</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">3348</td>
      <td class="td_txt"><a href="content_view.php">Content Name8</a></td>
      <td class="td_txt">Test Scripts</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">9</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">3349</td>
      <td class="td_txt"><a href="content_view.php">Content Name9</a></td>
      <td class="td_txt">Tutorials</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">10</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">33410</td>
      <td class="td_txt"><a href="content_view.php">Content Name10</a></td>
      <td class="td_txt">Blog</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Deactivated</td>
      </tr>
    <tr class="tr">
      <td align="center">11</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">33411</td>
      <td class="td_txt"><a href="content_view.php">Content Name11</a></td>
      <td class="td_txt">Tutorials</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
      <td class="td_txt">Approved</td>
      </tr>
    <tr class="tr">
      <td align="center">12</td>
      <td align="center"><input type="checkbox" name="changeStatus[]2" value="" /></td>
      <td align="center"><a href="content_add.php"><img src="images/edit.png" alt="edit" /></a></td>
      <td class="td_txt">33412</td>
      <td class="td_txt"><a href="content_view.php">Content Name12</a></td>
      <td class="td_txt">Blog</td>
      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
      <td class="td_num">High</td>
      <td class="td_txt">12/12/15</td>
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
