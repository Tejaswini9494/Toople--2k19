<?php

extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];
$user_type=$_SESSION["type"];

?>


<ul class="nav nav-tabs projTabUl">
	<li class="<?php if($page=="myProjectView") { echo "active"; } ?>"><a href="myProjectView.php?ipaid=<?php echo $ipaid; ?>">Participant Info</a></li>
	<li class="<?php if($page=="myProjectView2") { echo "active"; } ?>"><a href="myProjectView2.php?ipaid=<?php echo $ipaid; ?>">Project Info</a></li>
<!--	<li class="<?php if($page=="myProjectView3") { echo "active"; } ?>"><a href="myProjectView3.php?ipaid=<?php echo $ipaid; ?>">Project Additional Info</a></li>	-->
	<li class="<?php if($page=="myProjectView3") { echo "active"; } ?>"><a href="myProjectView3.php?ipaid=<?php echo $ipaid; ?>">Project Deliverables</a></li>
<!--	<li class=""><a href="#spro8">My Deliverables</a></li>	-->
	<li class="<?php if($page=="myProjectView4") { echo "active"; } ?>"><a href="myProjectView4.php?ipaid=<?php echo $ipaid; ?>">Project Solution</a></li>
	<li class="<?php if($page=="myProjectView5") { echo "active"; } ?>"><a href="myProjectView5.php?ipaid=<?php echo $ipaid; ?>">Student Evaluation</a></li>
	<li class="<?php if($page=="myProjectView6") { echo "active"; } ?>"><a href="myProjectView6.php?ipaid=<?php echo $ipaid; ?>">Review and Rank</a></li>
<?php if($user_type=='COO' || $user_type=='MEN' ) { ?>
	<li class="<?php if($page=="myProjectView7") { echo "active"; } ?>"><a href="myProjectView7.php?ipaid=<?php echo $ipaid; ?>">Mentor Report</a></li>
<?php } ?>
	<li class="<?php if($page=="myProjectView8") { echo "active"; } ?>"><a href="myProjectView8.php?ipaid=<?php echo $ipaid; ?>">Mentor Calendar Info</a></li>
</ul>

