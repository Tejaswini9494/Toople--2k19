<?php
$page="testimonials";
$title="Testimonials";
$ses="no";
//include_once ("class/config.php");

extract($_REQUEST);

include("header.php"); 
$query="select title,image,content,DATE_FORMAT(created_on,'%e') as date,DATE_FORMAT(created_on,'%b') as month,DATE_FORMAT(created_on,'%Y') as year FROM testimonial WHERE id!='' AND status='A' ORDER BY id DESC" ;
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($title,$image,$content,$date,$month,$year);
?>

<div class="pageTitle1">Testimonials<span></span></div>
<div class="gap40"></div>

<?php while($statement->fetch()){ ?>
<div class="testiBox">
	<div class="row">
		<div class="col-sm-2">
			<img src="uploads/testimonial/<?php echo $image; ?>" width="100%">
		</div>
		<div class="col-sm-10">
			<h3><?php echo $title; ?></h3>
			<div class="gap5"></div>

			<h5><?php echo $date." ".$month." ".$year; ?></h5>
			<div class="gap10"></div>

			<p>
				<i class="fa fa-quote-left"></i>
				<?php echo $content; ?>
				<i class="fa fa-quote-right"></i>
			</p>
			<div class="gap1"></div>
		</div>
	</div>
	<div class="gap1"></div>
</div>
<div class="gap40"></div>
<?php } ?>

<div class="gap20"></div>
<?php include("footer.php"); ?>

