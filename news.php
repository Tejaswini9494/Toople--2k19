<?php
$page="news";
$title="News";
$ses="no";
include_once ("class/config.php");

extract($_REQUEST);
$query="select news, news_content, DATE_FORMAT(added_date,'%d/%m/%Y') as dt,news_image from master_news WHERE status='A'" ;
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($news,$news_content, $dt,$news_image);
$num1=$statement->num_rows();

include("header.php");?>

<h3>TOOOPLE Announcements</h3>
<div class="gap30"></div>
<div class="numUl">
<?php $i=0;while($statement->fetch()) { $i++;?>
	<div class="col-md-3 text-center">
		<img src="uploads/master_news/<?php echo $news_image;?>" width="100%">
		<div class="gap5"></div>
	</div>
	<div class="col-md-9 text-grey2">
		
		<strong><?php echo $news; ?></strong>
		<span class="font14 pull-right">
		</span>
		<div class="gap10"></div>
		<div class="text-justify">
			<?php echo $news_content; ?>
		</div>
	</div>
	<div class="gap10"></div>
	
	<div class="gap10"></div>
	<?php if($i<$num1) { ?>
	<hr>
	<?php } ?>
	<div class="gap20"></div>
<?php } ?>
</div>


<div class="gap10"></div>
<?php include("footer.php"); ?>
