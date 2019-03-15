<?php 
$page="products_stu";
include("header.php");?> 

<h3>My Products &raquo; List View</h3>

<div class="gap10"></div>

<!--content Box -->
<div class="x_panel">
<div class="x_content">

<div class="gap15"></div>
 
 

<div class="table-responsive">
<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
  <thead>
    <tr class="tr1">
      <td width="20" align="center">#</td>
      <td align="left">Product Id</td>
      <td align="left">Product Name</td>
      <td align="left">Category</td>
      <td align="left">Sub-Category</td>
      <td align="left"> Created By</td>
      <td align="left">Abstract</td>
      <td align="left">Notes</td>
      <td align="left">Created Date</td>
      <td align="center">Mentor</td>
      <td align="center">Summary</td>
      <td align="left">Config</td>
      <td align="left">Project Status</td>
      </tr>
  </thead>
    <tr class="tr">
      <td align="center">1</td>
      <td class="td_txt">3341</td>
      <td class="td_txt"><a href="productsView.php">Demo Name1</a></td>
      <td class="td_txt">Student Project</td>
      <td class="td_txt">PHP</td>
      <td class="td_num">Admin</td>
      <td class="td_num">demo test demo test...</td>
      <td class="td_num">demo test demo test...</td>
      <td class="td_txt">12/12/15</td>
      <td align="center" class="td_num">-</td>
      <td align="center" class="td_num"><a href="productView_stu.php"><img src="images/view.png" width="16" height="16" /></a></td>
      <td class="td_txt"><a href="productView_config.php">Config</a></td>
      <td class="td_txt">Progress</td>
      </tr>
    <tr class="tr">
      <td align="center">2</td>
      <td class="td_txt">3342</td>
      <td class="td_txt"><a href="productsView.php">Demo Name2</a></td>
      <td class="td_txt">Algorithm</td>
      <td class="td_txt">Java</td>
      <td class="td_num">Admin</td>
      <td class="td_num">demo test demo test...</td>
      <td class="td_num">demo test demo test...</td>
      <td class="td_txt">12/12/15</td>
      <td align="center" class="td_num">-</td>
      <td align="center" class="td_num"><a href="productView_stu.php"><img src="images/view.png" width="16" height="16" /></a></td>
      <td class="td_txt"><a href="productView_config.php">Config</a></td>
      <td class="td_txt">Progress</td>
      </tr>
    <tr class="tr">
      <td align="center">3</td>
      <td class="td_txt">3343</td>
      <td class="td_txt"><a href="productsView.php">Demo Name3</a></td>
      <td class="td_txt">Test Scripts</td>
      <td class="td_txt">PHP</td>
      <td class="td_num">Admin</td>
      <td class="td_num">demo test demo test...</td>
      <td class="td_num">demo test demo test...</td>
      <td class="td_txt">12/12/15</td>
      <td align="center" class="td_num"><a href="profileView2.php">Demo user2</a></td>
      <td align="center" class="td_num"><a href="productView_stu.php"><img src="images/view.png" width="16" height="16" /></a></td>
      <td class="td_txt">NA</td>
      <td class="td_txt">Completed</td>
      </tr>
</table>
</div>

<br>
 
<?php  include("footer.php"); ?>
