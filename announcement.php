<?php
$page="announcement";
$title="Announcement";
$ses="no";
include_once ("class/config.php");

extract($_REQUEST);

$query="select news, news_content, DATE_FORMAT(added_date,'%d-%m-%Y') as dt,news_image from master_news WHERE status='A'" ;
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($news,$news_content, $dt,$news_image);
$num1=$statement->num_rows();

include("header.php");?>

<h3>TOOOPLE Announcements</h3>
<div class="gap30"></div>
<?php $i=0;while($statement->fetch()) { $i++;?>
	<div class="announcement_list">
		<div class="row">
			<div class="col-md-4">
				<div class="announceImg">
				<?php if($news_image!='') { ?>
					<img src="uploads/master_news/<?php echo $news_image;?>">
				<?php } else { ?>
					<img src="images/na.jpg">
				<?php } ?>
				</div>
			</div>
			<div class="col-md-8">
				<h2 class="announment_title"><?php echo $news; ?></h2>
				<div class="gap10"></div>
				<div class="announcement_date">
					<div class="nopadL col-md-3">
						<div class="col-md-2">
							<i class="fntSize fa fa-calendar" aria-hidden="true"></i>
						</div>
						<div class="announ_date col-md-9">
							<span class="dateHead">Date</span><br>
							<span class="dateClr"><?php echo $dt; ?></span>
						</div>
					</div>
				</div>
				<div class="gap10"></div>
				<div class="announment_content text-justify perfectScroll"><?php echo $news_content; ?></div>
			</div>
		</div>
	</div>
<?php } ?>

<div class="gap10"></div>
<?php include("footer.php"); ?>
