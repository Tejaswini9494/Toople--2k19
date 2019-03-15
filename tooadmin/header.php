<?php include("head.php"); ?>
<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="myHome.php" class="site_title">
			<!--<img src="images/logo_icon.png" width="50">
			<span><img src="images/logo_text.png" width="100"></span> -->
			Tooople
			</a>
                    </div>
                    <div class="clearfix"></div>

              

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                        <div class="menu_section">
                           
                            <ul class="nav side-menu">
                                 <?php  include("in_menu.php"); ?>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <!--<img src="images/na.jpg" class="border" alt="">-->User Name
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="changePassword.php">Change Password</a></li>
				<?php if($_SESSION["usertype"]==3) { ?>
                                    <li><a href="mySetting.php">Settings </a></li>
				<?php } ?>
                                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->
            
            
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">

                    <div class="page-title">
                        <div class="title_left">
                            <h3><?php echo $tit; ?></h3>
                        </div> 
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12" style="clear:both;">
                            
                                
                          
                            
