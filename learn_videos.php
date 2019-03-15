<?php
$page="learn_videos";
$title="Learn Videos";
include_once("class/config.php");
include_once("includes/functions.php");
include("class/paging.php");

extract($_REQUEST);

session_start();
$type=$_SESSION['type'];
$user_id=$_SESSION["userid"];


if(isset($search_submit)) {

	if($search_title!='') {
		$qry.=" AND resource_title LIKE '%".$search_title."%'";
	} elseif($search_cat!='') {
		$qry.=" AND resource_category='$search_cat'";
	} else {
		$qry='';
	}
}



				////======= Paging =====///
				$display=$_REQUEST["display"];
				$oldStatus=$_REQUEST["oldStatus"];
				$no=$_REQUEST["no"];
				$startrow=$_REQUEST['startrow'];
				if (empty($startrow)){ $startrow=0; $no=0;}
				$display =6; 
				////======= Paging =====///
$query1= "SELECT resource_id, resource_category, resource_title, resource_contents, resource_link FROM  too_resources  WHERE resource_id!='' AND status='A' AND resource_type='21' $qry ORDER BY resource_id DESC";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($resource_id, $resource_category, $resource_title, $resource_contents, $resource_link);
$numRows=$statement1->num_rows();
//echo $query1;

			////======= Paging =====///
				$endrow=$startrow + $display;
				if ($endrow > $numRows)
				{
					$endrow= $numRows;
				}
				$query1.=" LIMIT $startrow, $display";
				$statement2=$mysqli->prepare($query1);//echo $query1;
				
				$statement2->execute();
				$statement2->store_result();
				$statement2->bind_result($resource_id, $resource_category, $resource_title, $resource_contents, $resource_link);
				$numRows1=$statement2->num_rows();//echo " numRows1= ".$numRows1;
				////======= Paging =====///

include("header.php"); 

$query3="select category_id, category_name from master_category where category_for='21' AND status='A' ORDER BY category_id DESC";
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($category_id, $category_name);

?>

<h3 class="">Learn Videos</h3>
<div class="gap30"></div>

<div class="well filterBox">
	<form id="form_search" method="POST" enctype="multipart/form-data">
		<div class="col-md-2 col-sm-6">
				<input type="text" id="search_title" name="search_title" class="form-control" placeholder="Videos Name" value="<?php echo $search_title; ?>">
		</div>
		<div class="col-md-2 col-sm-6">
			<select name="search_cat" id="search_cat" class="form-control">
				<option value="">Videos Category</option>
			<?php while($statement3->fetch()) { ?>
				<option value="<?php echo $category_id; ?>" <?php if($search_cat==$category_id) { echo 'selected'; } ?>><?php echo $category_name; ?></option>
			<?php } ?>
			</select>
		</div>
		<div class="col-md-1 col-sm-6">
			<input type="submit" id="search_submit" name="search_submit" class="btn submitM" value="Search">

		</div>
		<div class="col-md-1 col-sm-6">

		
			<a href="learn_videos.php" class="btn submitM cancelBtn">Clear</a>
		</div>
		<div class="gap1"></div>
	</form>
</div>
<div class="gap10"></div>


<div class="row">
<?php $i=1; while($statement2->fetch()) { ?>
	<div class="col-sm-6">
		<div class="videosBox">
			<h3><?php echo $resource_title; ?></h3>
			<div class="gap5"></div>
			<h4><?php echo getValue('master_category', 'category_name', 'category_id', $resource_category); ?></h4>
			<div class="gap5"></div>
			<?php echo $resource_link; ?>
		</div>
	</div>
<?php if($i==2) { ?>
	<div class="gap30"></div>
<?php $i=0; } ?>

<?php $i++; } ?>

	<div class="gap1"></div>
</div>

<div class="gap20"></div>

	<!-- Paging Start -->
	<div class="text-center">
	<?php //echo $numRows." ## ".$display." ## ".$startrow; 
	if($numRows>$display) {?> 
	<nav aria-label="Page navigation">
	<ul class="pagination">
			<?php
			if($_SERVER["QUERY_STRING"]!=""){$qs=explode("&",$_SERVER["QUERY_STRING"]);}

				$qstr="";		
				for($q=0;$q<count($qs);$q++){
					$varname=explode("=",$qs[$q]);				
					if($varname[0]!='startrow')
					{
						$qstr.=$varname[0]."=".$varname[1]."&";
					}
				}
			
				if ($startrow != 0) {  
					$prevrow = $startrow - $display;	
					print("<li><a href='learn_videos.php?$qstr&startrow=$prevrow' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a> </li>");
				} 

				$pages = intval($numRows / $display);
				$parapages=intval($pages/3);

				if ($numRows % $display) {
					$pages++;
				}
				if ($pages > 1) {
					for ($i=1; $i <= $pages; $i++) { 
						$nextrow = $display * ($i - 1);
						$presPage=($startrow/$display) +1 ;
						if ($presPage==$i){
							print("<li><span  class='active' style='color:#000000;'>$i</span></li>  "); 
						}else{
							print("<li><a href='learn_videos.php?$qstr&startrow=$nextrow'>$i </a></li>");
						}
					} 
				}
									
				if ($endrow	< $numRows){
					if ($pages != 1){
						$nextrow = $startrow + $display;
						echo("<li><a href='learn_videos.php?$qstr&startrow=$nextrow' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
					}
				}
			?>
		  </ul></nav>
	<?php }?>
	
	 </div>
	<!-- paging End -->
	<div class="gap20"></div>

<?php include("footer.php"); ?>
