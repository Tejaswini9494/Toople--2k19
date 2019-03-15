<li ><a href="myHome.php"><i class="fa fa-home fa-fw"></i> Dashboard</a></li>

<?php if($_SESSION["usertype"]==1) { ?>
<li><a href="profileView.php"><i class="fa fa-user fa-fw"></i> My Profile</a></li>
<li><a href="products_stu.php"><i class="fa fa-list fa-fw"></i> My Products</a></li>
<li><a href="search_product.php"><i class="fa fa-search fa-fw"></i> Product Search</a></li>
<li><a href="paymentStatus_stu.php"><i class="fa fa-rupee fa-fw"></i> My Transations</a></li>

<?php } else if($_SESSION["usertype"]==2) { ?>
<li><a href="profileView2.php"><i class="fa fa-user fa-fw"></i> My Profile</a></li>
<li><a href="#"><i class="fa fa-list fa-fw"></i> My Students</a></li>
<li><a href="search_product.php"><i class="fa fa-search fa-fw"></i> Product Search</a></li>
<li><a href="#"><i class="fa fa-rupee fa-fw"></i> My Transations</a></li>

<?php } else if($_SESSION["usertype"]==3) { ?>

<li><a href="user_mgnt.php"><i class="fa fa-users fa-fw"></i> User Mgnt</a></li>

<li><a href="product_mgnt.php"><i class="fa fa-cubes fa-fw"></i> Product Mgnt</a></li>

<li><a href="program_mgnt.php"><i class="fa fa-user fa-fw"></i> Program Mgnt</a></li>

<li><a href="procurement_mgnt.php"><i class="fa fa-credit-card fa-fw"></i>  Procurement</a></li>

<li><a href="trans_mgnt.php"><i class="fa fa-money fa-fw"></i>  Transactions</a></li>

<li><a href="news_mgnt.php"><i class="fa fa-cube fa-fw"></i> News Mgnt</a></li>

<li><a href="resource_mgnt.php"><i class="fa fa-handshake-o fa-fw"></i> Resources Mgnt</a></li>

<li><a href="reports_mgnt.php"><i class="fa fa-pencil fa-fw"></i> Reports</a></li>

<!--<li><a href="staticpage.php"><i class="fa fa-cubes fa-fw"></i> CMS</a></li>-->

<li><a href="testimonials.php"><i class="fa fa-tags fa-fw"></i> Testimonials</a></li>

<li><a href="client_mgnt.php"><i class="fa fa-id-badge fa-fw"></i> Organisations</a></li>

<li><a href="partner_mgnt.php"><i class="fa fa-users fa-fw"></i> Partners</a></li>

<li><a href="faq_mgnt.php"><i class="fa fa-question fa-fw"></i> FAQ</a></li>

<li><a href="homevideos_mgnt.php"><i class="fa fa-youtube fa-fw"></i> Home Videos</a></li>

<li><a href="demovideos_mgnt.php"><i class="fa fa-youtube fa-fw"></i> Demo Videos</a></li>
 
<li><a href="masters.php"><i class="fa fa-cogs fa-fw"></i> Master</a></li>

<!--<li><a href="log_mgnt.php"><i class="fa fa-sign-in fa-fw"></i> Log Management</a></li>-->

<?php } ?>
