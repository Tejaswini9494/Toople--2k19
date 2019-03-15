<?php
$page="toorecurit";
$title="Tooople Recuritment";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
include("class/paging.php");
extract($_REQUEST);
include("header.php");
if(isset($search_submit)) {

	if($company1!='' || $position1!='' || $job_location1!='') {
		$qry.=" AND company LIKE '%".$company1."%' AND position LIKE '%".$position1."%' AND job_location LIKE '%".$job_location1."%'";
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
				$display =9; 
				////======= Paging =====///

$query1= "SELECT recruitment_id, company, position, job_location, status FROM  recruitment_details  WHERE recruitment_id!='' AND status='A'$qry ORDER BY recruitment_id DESC";

$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($recruitment_id, $company, $position, $job_location, $status);
$numRows=$statement1->num_rows();
				////======= Paging =====///
				$endrow=$startrow + $display;
				if ($endrow	> $numRows)
				{
					$endrow= $numRows;
				}
				$query1.=" LIMIT $startrow, $display";
				$statement2=$mysqli->prepare($query1);//echo $query1;
				
				$statement2->execute();
				$statement2->store_result();
				$statement2->bind_result($recruitment_id, $company, $position, $job_location, $status);
				$numRows1=$statement2->num_rows();//echo " numRows1= ".$numRows1;
				////======= Paging =====///


 ?>

<h3>Recruitment

</h3>
<div class="gap20"></div>
<div class="well filterBox">
	<form id="form_search" method="POST" enctype="multipart/form-data">
	<div class="col-md-3 col-sm-6">
		<input type="text" id="company1" name="company1" class="form-control" placeholder="Company" value="<?php echo $company1; ?>">
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
				<input type="text" id="position1" name="position1" class="form-control" placeholder="Position" value="<?php echo $position1; ?>">
	</div>
	<div class="gap15 yes800"></div>

	<div class="col-md-3 col-sm-6">
		<input type="text" id="job_location1" name="job_location1" class="form-control" placeholder="Job location" value="<?php echo $job_location1; ?>">
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<input type="submit" id="search_submit" name="search_submit" class="btn submitM" value="Search"> &nbsp;
		<a href="toorecurit.php" class="btn submitM cancelBtn">Clear</a>
	</div>
	<div class="gap1"></div>
	</form>
</div>
<div class="gap20"></div>

<div class="row">
<?php while($statement2->fetch()) { 
?>

<div class="col-sm-4">
	<div class="courseBox">
		<h4><a href="recruitmentDetailView.php?id=<?php echo $recruitment_id; ?>"><?php echo $company; ?></a></h4>
		<div class="gap10"></div>

		<span class="text-grey">Position :</span> <?php echo $position; ?>
		<div class="gap10"></div>

		<span class="text-grey">Location :</span> <?php echo $job_location; ?>
		<div class="gap15"></div>

 		<!--<a href="algorithmSolution.php?aid=<?php echo $algo_id; ?>" class="btn submitM">Solve Algorithm</a>
		<?php if($_SESSION["sesLoggedInTOOPLE2016"]=="") { ?>
		<a href="index.php" class="btn submitM">Take Algorithm</a>
		<?php } else { ?>
		<a href="paySummary.php" class="btn submitM">Take Algorithm</a>
		<?php } ?>-->
	</div>
	<img width="100%" src="images/shd.png">
	<div class="gap20"></div>
</div>
<?php } ?>
<div class="gap1"></div>
</div>


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
				print("<li><a href='$PHP_SELF?$qstr&startrow=$prevrow' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a> </li>");
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
						print("<li><a href='$PHP_SELF?$qstr&startrow=$nextrow'>$i </a></li>");
					}
				} 
			}
									
			if ($endrow	< $numRows){
				if ($pages != 1){
					$nextrow = $startrow + $display;
					echo("<li><a href='$PHP_SELF?$qstr&startrow=$nextrow' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
				}
			}
		?>
	  </ul></nav>
<?php }?>
	
 </div>
<!-- paging End -->

<div class="gap20"></div>
<?php include("footer.php"); ?>
<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {


            //form validation rules
            $("#form_search").validate({
				errorClass:"errors",  
				onkeyup: true,
				
                rules: {
			


					company1:{
						lettersonly: true,
						},
                                            position1: {
                                           lettersonly: true,
                                            },
                                           
                                           job_location1: {
                                          lettersonly: true,
                                            },

					                                             
               },


				//The error message Str here

           messages: {


					    ecpercent: {
                                            required: "Please enter % Obtained",
					    decimalnum: "Kindly Enter the Numbers and dot",
					    },

		
	},
                submitHandler: function(form) {
                    form.submit();
                }
            });
        }
    }


    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

function empty_form(val1){
        $("#"+val1).closest('#form_search').find("input[type=text], select, textarea").val("");
	
}
</script>
