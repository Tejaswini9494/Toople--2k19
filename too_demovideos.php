<?php
$page="too_demovideos";
$title="Demo Videos";
include_once("class/config.php");
include_once("includes/functions.php");
include("class/paging.php");

extract($_REQUEST);

session_start();
$type=$_SESSION['type'];
$user_id=$_SESSION["userid"];

include("header.php");
?>

<ol class="breadcrumb ">
	<li><a href="index.php">Home</a></li>
	<li class="active">Demo Videos</li>				
</ol> <!--product header ends-->
<div class="gap10"></div>

<!--<h4>Projects</h4>-->
<div class="gap10"></div>
<?php
	////======= Paging =====///
	$display=$_REQUEST["display"];
	$oldStatus=$_REQUEST["oldStatus"];
	$no=$_REQUEST["no"];
	$startrow=$_REQUEST['startrow'];
	if (empty($startrow)){ $startrow=0; $no=0;}
	$display =9; 
	////======= Paging =====///

	$query1="select demovid_id, demovid_title, demovid_content FROM too_demovideos WHERE demovid_id!='' AND status='A'";
	$statement1=$mysqli->prepare($query1);
	$statement1->execute();
	$statement1->store_result();
	$statement1->bind_result($demovid_id, $demovid_title, $demovid_content);
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
	$statement2->bind_result($demovid_id, $demovid_title, $demovid_content);
	$numRows1=$statement2->num_rows();//echo " numRows1= ".$numRows1;
	////======= Paging =====///
?>

	<div class="row">
	<?php while($statement1->fetch()) { ?>
		<div class="col-sm-6">
			<div class="videosBox">
				<h3><?php echo $demovid_title; ?></h3>
				<div class="gap5"></div>
				<?php echo $demovid_content; ?>
			</div>
			<div class="gap20"></div>
		</div>
	<?php } ?>
	</div>
			
	<div class="gap10"></div>

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
					print("<li><a href='too_demovideos.php?$qstr&startrow=$prevrow' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a> </li>");
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
							print("<li><a href='too_demovideos.php?$qstr&startrow=$nextrow'>$i </a></li>");
						}
					} 
				}
									
				if ($endrow	< $numRows){
					if ($pages != 1){
						$nextrow = $startrow + $display;
						echo("<li><a href='too_demovideos.php?$qstr&startrow=$nextrow' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
					}
				}
			?>
		  </ul></nav>
	<?php }?>
	
	<!-- paging End -->


</div>

<?php include("footer.php"); ?>

