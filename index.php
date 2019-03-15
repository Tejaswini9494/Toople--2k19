<?php
$page="index";
$title="Welcome";
$ses="no";
include_once ("class/config.php");

extract($_REQUEST);

$query="select news, news_content, DATE_FORMAT(added_date,'%b') as mon, DATE_FORMAT(added_date,'%e') as dt from master_news WHERE status='A'" ;
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($news,$news_content, $mon, $dt);
$num1=$statement->num_rows();

function limitTxt($strg) {
	if (strlen($strg) > 330) {
	   echo substr($strg, 0, 312).'<a href="#" class="font14"> &emsp;Read More...</a>';
	} else {
	   echo $strg;
	}
}
function limitNews($nstrg) {
	if (strlen($nstrg) > 250) {
	   echo substr($nstrg, 0, 240).'...'.'<a href="news.php" class="font14"> <br>Read More...</a>';
	} else {
	   echo $nstrg;
	}
}

include("header.php"); 

$query3="select  home_video_title,  home_video_url from home_video WHERE home_video_id!='' AND status='A'  ORDER BY home_video_id DESC   limit 0, 3" ;
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($home_video_title,$home_video_url);


?>



<!------------ Section 6 ------------>
<div class="container-fluid sec6">
  <div class="container">
	
	<div class="gap50"></div>

	<div class="row">
	<?php while($statement3->fetch()) {?>
		<div class="col-md-4 col-sm-4 ">
			<div class="video" >
				<?php echo $home_video_url;?>
			</div>
		<!--<img src="images/whatWeDo.png" class="img-responsive">-->
		</div>
	<?php  } ?>
	</div>
  </div>
</div> 

<!------------ Section 1 ------------>
<div class="container-fluid sec1"> 
  <div class="container">
	<div class="row">
	<div class="col-md-3 col-sm-6">
		<div class="col-xs-2 numL padclr">1</div>
		<div class="col-xs-10 head1">Tooople Academy</div>
		<div class="gap5"></div>

		<div class="limitTxt"><span>Helps students to develop problem-solving skills through algorithms and hosts the curriculum from new generation companies to develop the industry relevant skills.</span></div>
		<div class="gap20"></div>
		<a class="btn pull-right btnRead" href="toocontents.php">View Algorithms</a>
	</div>
	<div class="gap30 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<div class="col-xs-2 numL padclr">2</div>
		<div class="col-xs-10 head1">Students Projects</div>
		<div class="gap5"></div>
		<div class="limitTxt" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="The students from member institutions will be able to develop final projects on key technologies in a cloud environment with support from certified individual mentors and faculty members supported by peer to peer evaluation. Upon successful completion, the student will be provided with Project Completion Certificate. The students will be updating a dedicated ePortfolio to showcase their accredited skills and knowledge to potential employers."><span>The students from member institutions will be able to develop final projects on key technologies in a cloud environment with support from certified individual mentors...</span></div>
		<div class="gap20"></div>
		<a class="btn pull-right btnRead" href="tooprojects.php">View Projects</a>
	</div>
	<div class="gap30 yes800"></div>

	<div class="col-md-3 col-sm-6">
		<div class="col-xs-2 numL padclr">3</div>
		<div class="col-xs-10 head1">Internship</div>
		<div class="gap5"></div>

		<div class="limitTxt" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="The students from member institutions or deserving individuals will be able enroll into the program to develop industry related complex projects virtually using key technologies in a cloud environment. They will be supported by mentors recommended by companies or experienced individual representing their own organizations. The students will be updating their personalized ePortfolio to showcase their accredited skills and knowledge to potential employers. Upon successful completion, the student will be provided with an Internship Completion Certificate."><span>The students from member institutions or deserving individuals will be able enroll into the program to develop industry related complex projects virtually using key...</span></div>
		<div class="gap20"></div>
		<span class="btn pull-right btnRead">Coming Soon...</span>
		<!--<a class="btn pull-right btnRead" href="toointernship.php">View Internships</a>-->
	</div>
	<div class="gap30 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<div class="col-xs-2 numL padclr">4</div>
		<div class="col-xs-10 head1">Job Matching</div>
		<div class="gap5"></div>

		<div class="limitTxt" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="The enrolled organizations will be able to find a best match of skilled graduating or graduated students using ePortfolio and dynamically created reports. Our goal is to optimize job-matching opportunities to benefit both organizations and the students in various countries."><span>The enrolled organizations will be able to find a best match of skilled graduating or graduated students using ePortfolio and dynamically created reports. Our goal is...</span></div>
		<div class="gap20"></div>
		<span class="btn pull-right btnRead">Coming Soon...</span>
		<!--<a class="btn pull-right btnRead" href=toorecurit.php>Apply</a>-->
	</div>
	<div class="gap1"></div>
	</div>
  </div>
</div> 


<!------------ Section 2 ------------>
<div class="container-fluid sec2"> 
  <div class="container">
	<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
	<!-- Indicators -->
		<ol class="carousel-indicators">
<?php
for($j=0;$j<$num1;$j++) {
?>
		<li data-target="#myCarousel" data-slide-to="<?php echo $j;?>" class="<?php if($j==0) { echo "active"; } ?>"></li>
<?php } ?>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">

<?php 
$i=1;
while($statement->fetch()) {
?>

			<div class="item <?php if($i==1) { echo "active"; } ?>">

				<div class="row">
				<div class="col-md-1 col-sm-2">
					<div class="monthBox"><?php echo $mon; ?></div>
					<div class="dayBox"><?php echo $dt; ?></div>
				</div>
				<div class="col-md-10 col-sm-10 nopadL">
					<a href=news.php ><?php echo $news; ?></a>
					<div class="gap5"></div>
					<span class="font18"><?php echo limitNews($news_content); ?></span>
				</div>
				</div>
			
	</div>
<?php $i++; } ?>		
				
				
			

			
		</div>
	</div>
	
  </div>
</div> 


<!------------ Section 3 ------------>
<div class="container-fluid sec3"> 
  <div class="container text-justify">
	<div class="head2">Working with TOOOPLE</div>
	<div class="gap40"></div>

	<div class="row">

	<div class="col-md-6">
		<div class="col-sm-2 text-center"><i class="fa fa-sliders"></i></div>
		<div class="col-sm-10"><div class="headS"> Macro Projects</div>
		<p>These projects provide an opportunity for students to work in teams on a comprehensive project over a semester using popular technologies. They are ideal for Final Year Engineering students but are just as well-suited for those pursuing further studies or starting their careers. The scope of the project is large and intensive for the group. Successful participants will be able to develop deep technical knowledge and broad collaborative skills that makes them industry-ready.</p>
		</div>
	</div>

	<div class="gap40 yes800"></div>

	<div class="col-md-6">
		<div class="col-sm-2 text-center"><i class="fa fa-star-o"></i></div>
		<div class="col-sm-10"><div class="headS"> e-Portfolio Development</div>
		<p>The project-related work and achievements of each student are recorded and monitored through an e-Portfolio that is created and updated regularly with their respective mentors’ support during the project lifecycle. This will help students showcase their projects and associated achievements as they progress through the TOOOPLE ecosystem. Additionally, the e-Portfolio will serve as a Curriculum Vitae of all the technical and soft skills and skills-based certifications that the students have honed through completion of various TOOOPLE projects/initiatives.</p>
		</div>
	</div>
	<div class="gap40"></div>

	<div class="col-md-6">
		<div class="col-sm-2 text-center"><i class="fa fa-paper-plane-o"></i></div>
		<div class="col-sm-10"><div class="headS"> Mini Projects</div>
		<p>These projects provide an opportunity for students to work on projects of a shorter duration to gain hands-on experience on industry-relevant technologies through experienced mentors. The project work is done on technologies that are quite popular and could be used by educational institutions to supplement their standard projects and recognize as part of the curriculum. They are popularly used by Year III Engineering students before stepping into final project work subsequently.</p>
		</div>
	</div>
	<div class="gap40 yes800"></div>

	<div class="col-md-6">
		<div class="col-sm-2 text-center"><i class="fa fa-thumbs-o-up"></i></div>
		<div class="col-sm-10"><div class="headS"> Industry Attachments</div>
		<p>Organizations that are enrolled with the TOOOPLE platform will be able to find a best match of skilled graduating or graduated students using TOOOPLE’s Student ePortfolios. Our goal is to optimize job-matching opportunities to benefit both hiring organizations and students across the Asia Pacific region.</p>
		</div>
	</div>
	<div class="gap40"></div>

	<div class="col-md-6">
		<div class="col-sm-2 text-center"><i class="fa fa-search-minus"></i></div>
		<div class="col-sm-10"><div class="headS"> Micro Projects</div>
		<p>These projects are designed to introduce students to emerging and industry-relevant technologies through workshops conducted by experienced mentors in a project-based-learning format. These are well-suited for Year I and Year II Engineering students, as also trainees and new corporate hires.</p>
		</div>
	</div>


	</div>
  </div>
</div> 

<!------------ Section 5 ------------>
<div class="container-fluid section5"> <!--section3 starts-->
<div class="container">
	<h2 class="tstmonl">TESTIMONIAL
	<div class=".gap1"></div>
	<span class="blueLine2"></span>
	</h2>
	<div class="gap10"></div>

	<div data-ride="carousel" class="carousel slide" id="mytestimonial">
	    <!-- Indicators -->
	    <!-- Left and right controls -->
		    <a data-slide="prev" role="button" href="#mytestimonial" class="left carousel-control">
		      &nbsp; <i aria-hidden="true" class="fa fa-angle-left"></i>
		    </a>
		    <a data-slide="next" role="button" href="#mytestimonial" class="right carousel-control">
		     <i aria-hidden="true" class="fa fa-angle-right"></i>  &nbsp;
		    </a>
	    <!-- Wrapper for slides -->
	    <div role="listbox" class="carousel-inner">
<?php 
$numT=0;
$query1 = "SELECT title,image,content FROM  testimonial WHERE id!='' AND status='A' ORDER BY id DESC";
//echo $query2; style="height: 250px; overflow-y: scroll;"
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($title,$image,$content);
$numT=$statement1->num_rows();
$ti=1; $tii=1;
while($statement1->fetch()) {
if($ti==1) {
?>
	
	      <div class="item <?php if($tii==1) { echo "active"; } ?>">
		<div class="row">
<?php } ?>
			<div class="col-sm-6">
				<a class="testBox" href="testimonials.php">
					<div class="gap10"></div>
					<p class="limitTxt perfectScroll"><?php echo $content; ?></p>
					<div class="gap10"></div>
					<div class="imgpostion">
						<div class="col-xs-4">
							<div class="gap20"></div>
							<img width="100%" class="imgrounded" src="uploads/testimonial/<?php echo $image; ?>">
							<div class="gap20"></div>
						</div>
						<div class="col-xs-8 nopadL">
							<div class="gap30"></div>
							<h4 class="tumpname"><?php echo $title; ?></h4>
						</div>
					</div>
				</a>
			</div>
			<div class="gap5 yes600"></div>

	<?php if($ti==2 || $tii==$numT) { ?>
				<div class="gap1"></div>

		</div>
	      </div>

	<?php $ti=0; }
	$ti++; $tii++; } ?>

	    </div>
	</div>
</div>
</div>


<!------------ Section 4 ------------>
<?php 
$query2="select org_name,org_logo,org_link FROM supporting_org WHERE status='A'" ;
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($org_name,$org_logo,$org_link);
?>
<div class="container-fluid sec4"> 
  <div class="container">
	<div class="head2">Supporting Organization and Members Institutions (all Universities)</div>
	<div class="gap10"></div>
	<hr>
	<div class="gap20"></div>
	<div class="row">
	<?php $i=1; while($statement2->fetch()){ ?>
		<div class="col-sm-4">
			<div class="clientBox"><a href="<?php echo $org_link; ?>" target="_blank">
				<div class="col-xs-3 padclr">
					<img src="uploads/support_org/<?php echo $org_logo; ?>" width="100%">
				</div>
				<div class="col-xs-9">
					<h3><?php echo $org_name; ?></h3>
				</div></a>
				<div class="gap1"></div>
			</div>
		</div>
		<?php if($i==3) { ?>
		<div class="gap30"></div>
		<?php $i=0; } ?>
	<?php $i++; } ?>	
	</div>
	<div class="gap1"></div>
  </div>
</div>


<?php include("footer.php"); ?>
<script>

$('.carousel').carousel({
    interval: false
});

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
$('.testim').perfectScrollbar();
</script>

