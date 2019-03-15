<?php include_once("class/config.php");
include_once("includes/encrypt.php");

if($_SESSION["profile_complete"]=='N') {
	$profile_alert='<span class="quesGif" title="" data-content="Please Complete Your Profile Details" data-toggle="popover" data-placement="top" data-trigger="hover"><img src="images/Flashing.gif" width="100%"></span>';
} else {
	$profile_alert="";
}

//echo $page;
echo $murl;
?>
<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
</style>
	      <ul class="nav navbar-nav navbar-right">

<!--		<li><a href="news.php">News</a></li>
		<li><a href="resources.php">Resources</a></li>
		<li><a href="investors.php">Investors</a></li>
		<li><a href="careers.php">Careers</a></li>
		<li><a href="blog.php">Blogs</a></li>
		<li><a href="toocontents.php">Tooople Algorithms</a></li>
		<li><a href="tooprojects.php">Tooople Projects</a></li>
		<li><a href="about.php">About Us</a></li>	-->

		<li class="<?php if($page=='index') { echo 'active'; } ?>"><a href="index.php">Home</a></li>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Academy <span class="caret"></span></a>
		  <ul class="dropdown-menu">
		    <li><a href="toocontents.php">Algorithms</a></li>
		    <li class="dropdown-submenu">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Resources <span class="caret"></span></a>
		  <ul class="dropdown-menu">
		    <li><a href="staticP.php">Blog</a></li>
		    <li><a href="tutorial.php">How to’s</a></li>
		    <li><a href="learn_videos.php">Learning Videos</a></li>
		    <li><a href="assessments.php">Assessments</a></li>
		  </ul>
		</li>
		  </ul>
		</li>				
		<li class="<?php if($page=='tooprojects') { echo 'active'; } ?>"><a href="tooprojects.php">Projects</a></li>
		<li class="<?php if($page=='toopartners') { echo 'active'; } ?>"><a href="toopartners.php">Partners</a></li>
<li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Company <span class="caret"></span></a>
	<ul class="dropdown-menu">
		<li><a href="about.php">About Us</a></li>
		<li><a href="news.php">Announcements</a></li>
		<li><a href="contact.php">Contact us</a></li>
		<li class="dropdown-submenu">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Downloads <span class="caret"></span></a>
		  <ul class="dropdown-menu">
		    <li><a href="docs/TOOOPLE Brochure_SmartStart Program.pdf" target="_blank">Brochure</a></li>
		    <li><a href="docs/TOOOPLE_CorporateDeck_2018.pdf" target="_blank">Corporate Deck</a></li>
		    <li><a href="docs/TOOOPLE_WhitePaper_2018.pdf" target="_blank">White Paper</a></li>
		   
		    
		    <li><a href="myEportfolio.php">Templates </a></li> 
		    
		    
		  </ul>
		</li>
	</ul>
</li>
		<!-- <li><a href="news.php">Announcements</a></li>
		<li><a href="about.php">About Us</a></li>
		<li><a href="contact.php">Contact Us</a></li>-->

	<?php if($_SESSION["sesLoggedInTOOPLE2016"]=="") { ?>
		<li><a href="login.php" class="btn btnLog">Login / Signup</a></li>
	<?php } ?>
	<?php if($_SESSION["sesLoggedInTOOPLE2016"]=="YES") { 
		$user_idmenu=$_SESSION["userid"];


		$sql_sts="select status from too_users where user_id='$user_idmenu'";
		$statement_sts=$mysqli->prepare($sql_sts);
		$statement_sts->execute();
		$statement_sts->store_result();
		$statement_sts->bind_result($status);
		$statement_sts->fetch();

		$sql_pho1="select s_first_name, s_last_name, s_upload_photo from student_info where user_id='$user_idmenu'";
		$statement_pho1=$mysqli->prepare($sql_pho1);
		$statement_pho1->execute();
		$statement_pho1->store_result();
		$statement_pho1->bind_result($s_first_namepho1, $s_last_namepho1, $s_upload_photo_pho1);
		$statement_pho1->fetch();

		if($s_last_namepho1!='') {
			$stuName=$s_first_namepho1.' '.$s_last_namepho1;
		} else {
			$stuName=$s_first_namepho1;
		}

		$sql_pho2="select cr_photo from customer_organisation where user_id='$user_idmenu'";
		$statement_pho2=$mysqli->prepare($sql_pho2);
		$statement_pho2->execute();
		$statement_pho2->store_result();
		$statement_pho2->bind_result($s_upload_photo_pho2);
		$statement_pho2->fetch();

		$sql_pho3="select rsp_photo from representative_service_provider where user_id='$user_idmenu'";
		$statement_pho3=$mysqli->prepare($sql_pho3);
		$statement_pho3->execute();
		$statement_pho3->store_result();
		$statement_pho3->bind_result($s_upload_photo_pho3);
		$statement_pho3->fetch();

		$sql_pho4="select cr_photo from co_representative_details where coordinator_id='$user_idmenu'";
		$statement_pho4=$mysqli->prepare($sql_pho4);
		$statement_pho4->execute();
		$statement_pho4->store_result();
		$statement_pho4->bind_result($s_upload_photo_pho4);
		$statement_pho4->fetch();

		$eportUID=encrypt($user_idmenu, 'tooople#@D2016');
?>
		<?php if($_SESSION["type"]=="SP") { ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $s_upload_photo_pho1;?>" class="logImg"> <span class="caret"></span></a>
		
		  <ul class="dropdown-menu">
		    <li><a href="reg-project-stud1.php">My Profile <?php echo $profile_alert; ?></a></li>
		<!--<?php if($status=="A") { ?>-->
		    <li><a href="myOrders.php">My Orders</a></li>
		    <li><a href="myProject.php">My Projects</a></li>
		    <li><a href="institutionSelectedProject.php" name="project_cart">Selected Projects</a></li>
		    <li><a href="myEportfolio/<?php echo $eportUID; ?>/<?php echo $stuName; ?>">My e-Portfolio</a></li>
		<!--<?php } ?> -->
		    <li class="dropdown-submenu">
			<!--<a href="#modal_startup" data-toggle="modal" data-backdrop="static" data-keyboard="false">Help</a>-->
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help</a>
			<ul class="dropdown-menu">
				<li><a href="toofaq.php">FAQ</a></li>
				<li><a href="too_demovideos.php">Demo Videos</a></li>
			</ul>
		    </li>
		    <li><a href="changePassword.php">Change Password</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
		<?php  } else if($_SESSION["type"]=="SI") { ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $s_upload_photo_pho1;?>" class="logImg"> <span class="caret"></span></a>

		  <ul class="dropdown-menu">
		    <li><a href="reg-project-stud1.php">My Profile <?php echo $profile_alert; ?></a></li>
		<!--<?php if($status=="A") { ?>-->
		    <li><a href="internship_search.php">Search</a></li>
		    <li><a href="myInternships.php">My Internships</a></li>
		    <li><a href="internship_matches.php">Internship Matches</a></li>
			<!--<?php } ?> -->
		    <li><a href="changePassword.php">Change Password</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
		<?php  } else if($_SESSION["type"]=="MEN") { ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $s_upload_photo_pho1;?>" class="logImg"> <span class="caret"></span></a>

		  <ul class="dropdown-menu">
		    <li><a href="reg-mentor1.php">My Profile <?php echo $profile_alert; ?></a></li>
		    <li><a href="mentorProjectSelection.php">My Additional Information</a></li>
		    <li><a href="calenderInfoView.php">My Calender Info</a></li>
		    <li><a href="mentorProject.php">My Projects</a></li>
		    <li><a href="mentorCalendarMEN.php">Mentor Reports</a></li>
		    <li><a href="myTransactionMEN.php">My Transaction</a></li>
		    <li><a href="changePassword.php">Change Password</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
		<?php  } else if($_SESSION["type"]=="CP") { ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $s_upload_photo_pho1;?>" class="logImg"> <span class="caret"></span></a>

		  <ul class="dropdown-menu">
		    <li><a href="reg-mentor1.php">My Profile <?php echo $profile_alert; ?></a></li>
		<!--<li><a href="contentProviderHome.php">My Additional Information</a></li>	-->
		    <li><a href="addContents.php">Contents</a></li>
		    <li><a href="myTransactionCP.php">My Transaction</a></li>
		    <li><a href="changePassword.php">Change Password</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
		<?php  } else if($_SESSION["type"]=="CIN") { ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $s_upload_photo_pho2;?>" class="logImg"> <span class="caret"></span></a>

		  <ul class="dropdown-menu">
		    <li><a href="reg-institution1.php">My Profile <?php echo $profile_alert; ?></a></li>
		<!--<?php if($status=="A") { ?>-->
		    <li><a href="studentMgnt.php">Students</a></li>
		    <li><a href="institutionProject.php">My Projects</a></li>
		    <li><a href="institutionSelectedProject.php" name="project_cart">Selected Projects</a></li>
		    <li><a href="myTransactions.php">My Transactions</a></li>
			<!--<?php } ?> -->
		    <li><a href="changePassword.php">Change Password</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
		<?php  } else if($_SESSION["type"]=="CIS") { ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $s_upload_photo_pho2;?>" class="logImg"> <span class="caret"></span></a>

		  <ul class="dropdown-menu">
		    <li><a href="reg-institution1.php">My Profile <?php echo $profile_alert; ?></a></li>
		<!--<?php if($status=="A") { ?>-->
		    <li><a href="internshipPost.php">My Internships</a></li>
		    <li><a href="myInterns.php">My Interns</a></li>
			<!--<?php } ?> -->
		    <li><a href="changePassword.php">Change Password</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
		<?php  } else if($_SESSION["type"]=="CRC") { ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $s_upload_photo_pho2;?>" class="logImg"> <span class="caret"></span></a>

		  <ul class="dropdown-menu">
		    <li><a href="reg-institution1.php">My Profile <?php echo $profile_alert; ?></a></li>
		<!--<?php if($status=="A") { ?>-->
		    <li><a href="recuritmentPost.php">Recuritment</a></li>
			<!--<?php } ?> -->
		    <li><a href="changePassword.php">Change Password</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
		<?php  } else if($_SESSION["type"]=="SPM") { ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $s_upload_photo_pho3;?>" class="logImg"> <span class="caret"></span></a>

		  <ul class="dropdown-menu">
		    <li><a href="reg-rsp-mentor1.php">My Profile <?php echo $profile_alert; ?></a></li>
		<!--<?php if($status=="A") { ?>-->
		    <li><a href="myrspo_mentor.php">My Mentors</a></li>
		    <li><a href="mentorCalendarSP.php">Mentor Reports</a></li>
			<!--<?php } ?> -->
		    <li><a href="changePassword.php">Change Password</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
		<?php  } else if($_SESSION["type"]=="SPC") { ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $s_upload_photo_pho3;?>" class="logImg"> <span class="caret"></span></a>

		  <ul class="dropdown-menu">
		    <li><a href="reg-rsp-mentor1.php">My Profile <?php echo $profile_alert; ?></a></li>
		<!--<?php if($status=="A") { ?>-->
		    <li><a href="myrspo_mentor.php">My Content Providers</a></li>
			<!--<?php } ?> -->
		    <li><a href="changePassword.php">Change Password</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
		<?php  } else if($_SESSION["type"]=="COO") { ?>
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $s_upload_photo_pho4;?>" class="logImg"> <span class="caret"></span></a>

		  <ul class="dropdown-menu">
		    <li><a href="coordinator_profile.php">My Profile <?php echo $profile_alert; ?></a></li>
		<!--<?php //if($status=="A") { ?>-->
		    <li><a href="coordinator_project.php">My Projects</a></li>
		    <li><a href="mentorCalendarCoordi.php">Mentor Reports</a></li>
			<!--<?php //} ?> -->
		    <li><a href="changePassword.php">Change Password</a></li>
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</li>
		<?php  } ?>
	<?php } ?>
<!--
		<li class="dropdown">
		  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		  <ul class="dropdown-menu">
		    <li><a href="#">Action</a></li>
		    <li><a href="#">Another action</a></li>
		    <li><a href="#">Something else here</a></li>
		    <li role="separator" class="divider"></li>
		    <li><a href="#">Separated link</a></li>
		  </ul>
		</li>
-->
	      </ul>

