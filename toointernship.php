<?php
$page="toointernship";
$title="Tooople Internship";
$ses="no";
include_once("class/config.php");
include_once("includes/functions.php");
include("class/paging.php");
extract($_REQUEST);
include("header.php"); 
if(isset($search_submit)) {

	if($category!='' || $title1!='' || $company1!='') {
		$qry.=" AND category LIKE '%".$category."%' AND ins_title LIKE '%".$title1."%' AND company LIKE '%".$company1."%'";
	} else {
		$qry='';
	}
}

$sql4 = "SELECT subcategory_id, category_id, subcategory_name FROM  master_subcategory  WHERE category_id=26";
$statement4=$mysqli->prepare($sql4);
$statement4->execute();
$statement4->store_result();
$statement4->bind_result($subcategory_id, $category_id, $subcategory_name);

				////======= Paging =====///
				$display=$_REQUEST["display"];
				$oldStatus=$_REQUEST["oldStatus"];
				$no=$_REQUEST["no"];
				$startrow=$_REQUEST['startrow'];
				if (empty($startrow)){ $startrow=0; $no=0;}
				$display =9; 
				////======= Paging =====///

$query1 = "SELECT internship_id, category, ins_title, company, job, ecprogram, ecyoc, ecpercent, ecgender, compensation, techarea, certificate, tsdate, tedate, joblocation, worktype, hireprocess, doi, status FROM  too_internship  WHERE internship_id!='' AND status='A'$qry ORDER BY internship_id DESC";
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($internship_id, $category, $ins_title, $company, $job, $ecprogram, $ecyoc, $ecpercent, $ecgender, $compensation, $techarea, $certificate, $tsdate, $tedate, $joblocation, $worktype, $hireprocess, $doi, $status);
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
				$statement2->bind_result($internship_id, $category, $ins_title, $company, $job, $ecprogram, $ecyoc, $ecpercent, $ecgender, $compensation, $techarea, $certificate, $tsdate, $tedate, $joblocation, $worktype, $hireprocess, $doi, $status);
				$numRows1=$statement2->num_rows();//echo " numRows1= ".$numRows1;
				////======= Paging =====///


?>

<h3>Internship

</h3>
<div class="gap20"></div>
<div class="well filterBox">
	<form id="form_search" method="POST" enctype="multipart/form-data">
	<div class="col-md-3 col-sm-6">
		<select id="category" name="category" class="form-control">
			<option value="" >Select</option>
			<?php while($statement4->fetch()) { ?>
				<option value="<?php echo $subcategory_id; ?>" <?php if($subcategory_id==$category) { echo "selected"; } ?>><?php echo $subcategory_name; ?></option>
			<?php } ?>
		
		</select>
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
				<input type="text" id="title1" name="title1" class="form-control" placeholder="Title" value="<?php echo $title1; ?>">
	</div>
	<div class="gap15 yes800"></div>

	<div class="col-md-3 col-sm-6">
		<input type="text" id="company1" name="company1" class="form-control" placeholder="Company" value="<?php echo $company1; ?>">
	</div>
	<div class="gap15 yes600"></div>

	<div class="col-md-3 col-sm-6">
		<input type="submit" id="search_submit" name="search_submit" class="btn submitM" value="Search"> &nbsp;
<a href="toointernship.php" class="btn submitM cancelBtn">Clear</a>
	</div>
	<div class="gap1"></div>
	</form>
</div>
<div class="gap20"></div>

<div class="row">

<?php while($statement2->fetch()) { 

	$sql4 = "SELECT subcategory_id, category_id, subcategory_name FROM  master_subcategory  WHERE subcategory_id=$category";
$statement6=$mysqli->prepare($sql4);
$statement6->execute();
$statement6->store_result();
$statement6->bind_result($subcategory_id1, $category_id1, $subcategory_name1);
$statement6->fetch();

?>
<div class="col-sm-4">
	<div class="courseBox">
		<h4><a href="internshipView.php?insid=<?php echo $internship_id; ?>"><span class="red"><?php echo $ins_title; ?></span></a></h4>
		<div class="gap10"></div>

		<span class="text-grey">Internship Category :</span> <?php echo $subcategory_name1; ?>
		<div class="gap10"></div>

		<span class="text-grey">Company :</span><?php echo $company; ?>
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
                                            title1: {
                                           alphanumeric: true,
                                            },
                                           
                                            company1: {
                                          alphanumeric: true,
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
