<?php
$page="toopartners";
$title="Tooople Partners";
$ses="no";
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
	<li class="active">Partners</li>				
</ol> <!--product header ends-->
<div class="gap10"></div>

<!--<h4>Projects</h4>-->
<div class="gap10"></div>
<?php
if(isset($search_submit))
{
	$qry='';
	if($search_name!=''){
	$qry.=" AND partner_name LIKE '%".$search_name."%'";
	}
}else{
$qry='';
}



				////======= Paging =====///
				$display=$_REQUEST["display"];
				$oldStatus=$_REQUEST["oldStatus"];
				$no=$_REQUEST["no"];
				$startrow=$_REQUEST['startrow'];
				if (empty($startrow)){ $startrow=0; $no=0;}
				$display =9; 
				////======= Paging =====///

				$query1="select partner_id, partner_category,partner_name, logo, partner_details, partner_link FROM too_partner WHERE partner_id!='' $qry";
				$statement1=$mysqli->prepare($query1);
				$statement1->execute();
				$statement1->store_result();
				$statement1->bind_result($partner_id,$partner_category1,$partner_name,$logo,$partner_details,$partner_link);
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
				$statement2->bind_result($partner_id,$partner_category1,$partner_name,$logo,$partner_details,$partner_link);
				$numRows1=$statement2->num_rows();//echo " numRows1= ".$numRows1;
				////======= Paging =====///









?>
	<!--<div class="well filterBox">
		<form id="form_search" method="POST" enctype="multipart/form-data">
			<div class="row"><div class="col-md-12">

				<div class="col-md-3 col-sm-6">
					<input type="text" id="search_name" name="search_name" class="form-control" placeholder="Partner Name" value="<?php echo $search_name;?>">
				</div>
				
				<div class="col-md-3 col-sm-6">
					<input type="submit" id="search_submit" name="search_submit" class="btn searchSub" value="Search">
		
					
				</div>
				<div class="gap1"></div>
			</div></div>
		</form>
	</div>
	<div class="gap10"></div>
	-->
	<div class="partners">
	
	<?php
		
		while($statement1->fetch()){
	?>


		<div class="testiBox">
			<div class="col-sm-2">
				<a href="<?php echo $partner_link; ?>"><img src="uploads/support_org/<?php echo $logo; ?>" class="partner_logo" ></a>
			</div>
			<div class="col-sm-10">
				<a href="<?php echo $partner_link; ?>" class="company_name" target="_blank"><?php echo $partner_name; ?></a>
				<div class="gap10"></div>					
				<p>
					<!--<i class="fa fa-quote-left"></i>-->
					<span class="content"><?php echo $partner_details; ?></span>
					<!--<i class="fa fa-quote-right"></i>-->
				</p>
				<div class="gap1"></div>
			</div>
			<div class="gap1"></div>
		</div>

<!--


			<div class="col-md-4">
					<div class="partner_details" >
						<div class="gap10"></div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<img src="uploads/support_org/<?php echo $logo; ?>" width="100%">
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 partner_name">
							<a href="<?php echo $partner_link; ?>" target="_blank"><?php echo $partner_name; ?></a>
						</div>
						<div class="gap1"></div>
						<div class="content"><?php echo $partner_details; ?></div>
						<!--
						<div class="link">
							URL : <a href="#" target="blank" class="url"><?php echo $partner_link; ?></a>
						</div>
						-->
<!--						<div class="gap10"></div>
					</div>
			</div>-->
			
			<?php } ?>
			
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
					print("<li><a href='toopartners.php?$qstr&startrow=$prevrow' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a> </li>");
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
							print("<li><a href='toopartners.php?$qstr&startrow=$nextrow'>$i </a></li>");
						}
					} 
				}
									
				if ($endrow	< $numRows){
					if ($pages != 1){
						$nextrow = $startrow + $display;
						echo("<li><a href='toopartners.php?$qstr&startrow=$nextrow' aria-label='Next'><span aria-hidden='true'>&raquo;</span></a></li>");
					}
				}
			?>
		  </ul></nav>
	<?php }?>
	
	 </div>
	<!-- paging End -->

</div>

</div>

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
                                            name: {
                                           lettersonly: true,
                                            },
                                           
                                            dev_platform: {
                                          alphanumeric: true,
                                            },
					    duration: {
						 alphanumeric: true,
					     }
					     proj_cat: {
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
