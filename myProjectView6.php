<?php
$page="myProjectView6";
$title="My Project View";
include_once("class/config.php");
include_once("includes/functions.php");

extract($_REQUEST);

session_start();
$user_id=$_SESSION["userid"];
$user_type=$_SESSION["type"];

$query12 = "SELECT institution_project_id FROM  institution_project_assign  WHERE institution_project_assign_id=$ipaid";
//echo $query12;
$statement12=$mysqli->prepare($query12);
$statement12->execute();
$statement12->store_result();
$statement12->bind_result($ipid12);
$statement12->fetch();

$query13 = "SELECT institution_project_assign_id FROM  institution_project_assign  WHERE institution_project_id=$ipid12 AND mentor_id!=0";
//echo $query13;
$statement13=$mysqli->prepare($query13);
$statement13->execute();
$statement13->store_result();
$statement13->bind_result($menid13);
$statement13->fetch();

$query14 = "SELECT institution_project_assign_id FROM  institution_project_assign  WHERE institution_project_id=$ipid12 AND coordinator_id!=0";
//echo $query14;
$statement14=$mysqli->prepare($query14);
$statement14->execute();
$statement14->store_result();
$statement14->bind_result($cooid14);
$statement14->fetch();


if(isset($review_submit)) {

	$nrows10=0;
	$query10 = "SELECT project_review_id, star FROM  too_project_review  WHERE institution_project_id=$ipid12";
	//echo $query10;
	$statement10=$mysqli->prepare($query10);
	$statement10->execute();
	$statement10->store_result();
	$statement10->bind_result($project_review_id10, $star10);
	$nrows10=$statement10->num_rows();

	if($nrows10>0) {
		while($statement10->fetch()) {

			$query11 = "UPDATE too_project_review SET star=?, comments=? WHERE project_review_id='$project_review_id10'";
			$statement11= $mysqli->prepare($query11);  
			$statement11->bind_param('is', $update_rank[$project_review_id10], $commentBox[$project_review_id10]);
			$statement11->execute();
		}
	} else {

		$status="A";

		$query1a = "SELECT category_id FROM  master_category  WHERE category_id!='' AND category_for='10' ORDER BY category_id ASC";
		//echo $query1a;
		$statement1a=$mysqli->prepare($query1a);
		$statement1a->execute();
		$statement1a->store_result();
		$statement1a->bind_result($category_id1a);

		while($statement1a->fetch()) {
			//echo $category_id1a."#".$project[$category_id1a]."<br>";
			$query4 = "INSERT INTO  too_project_review (institution_project_assign_id, institution_project_id, user_id, category_id, star, comments, added_date, status) VALUES(?,?,?,?,?,?, now(), ?)";
			$statement4= $mysqli->prepare($query4);
			$statement4->bind_param('iiiiiss', $ipaid, $ipid12, $user_id, $category_id1a, $project[$category_id1a], $commentBox[$category_id1a], $status);
			$statement4->execute();
		}

		$query2a = "SELECT category_id FROM  master_category  WHERE category_id!='' AND category_for='11' ORDER BY category_id ASC";
		//echo $query2a;
		$statement2a=$mysqli->prepare($query2a);
		$statement2a->execute();
		$statement2a->store_result();
		$statement2a->bind_result($category_id2a);

		while($statement2a->fetch()) {
			$query5 = "INSERT INTO  too_project_review (institution_project_assign_id, institution_project_id, user_id, category_id, star, comments, added_date, status) VALUES(?,?,?,?,?,?, now(), ?)";
			$statement5= $mysqli->prepare($query5);
			$statement5->bind_param('iiiiiss', $menid13, $ipid12, $user_id, $category_id2a, $project[$category_id2a], $commentBox[$category_id2a], $status);
			$statement5->execute();
		}

		$query3a = "SELECT category_id FROM  master_category  WHERE category_id!='' AND category_for='12' ORDER BY category_id ASC";
		//echo $query3a;
		$statement3a=$mysqli->prepare($query3a);
		$statement3a->execute();
		$statement3a->store_result();
		$statement3a->bind_result($category_id3a);

		while($statement3a->fetch()) {
			$query6 = "INSERT INTO  too_project_review (institution_project_assign_id, institution_project_id, user_id, category_id, star, comments, added_date, status) VALUES(?,?,?,?,?,?, now(), ?)";
			$statement6= $mysqli->prepare($query6);
			$statement6->bind_param('iiiiiss', $cooid14, $ipid12, $user_id, $category_id3a, $project[$category_id3a], $commentBox[$category_id3a], $status);
			$statement6->execute();
		}
	}
}

$query1 = "SELECT category_for, category_id, category_name FROM  master_category  WHERE category_id!='' AND category_for='10' ORDER BY category_id ASC";
//echo $query1;
$statement1=$mysqli->prepare($query1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($category_for1, $category_id1, $category_name1);

$query2 = "SELECT category_for, category_id, category_name FROM  master_category  WHERE category_id!='' AND category_for='11' ORDER BY category_id ASC";
//echo $query2;
$statement2=$mysqli->prepare($query2);
$statement2->execute();
$statement2->store_result();
$statement2->bind_result($category_for2, $category_id2, $category_name2);

$query3 = "SELECT category_for, category_id, category_name FROM  master_category  WHERE category_id!='' AND category_for='12' ORDER BY category_id ASC";
//echo $query3;
$statement3=$mysqli->prepare($query3);
$statement3->execute();
$statement3->store_result();
$statement3->bind_result($category_for3, $category_id3, $category_name3);

include("header.php");

$query1aa = "SELECT COUNT(institution_project_assign_id) FROM institution_project_assign WHERE institution_project_assign_id='$ipaid' AND institution_id=student_id";
$statement1aa=$mysqli->prepare($query1aa);
$statement1aa->execute();
$statement1aa->store_result();
$statement1aa->bind_result($ipaid_count);
$statement1aa->fetch();
$statement1aa->close();

?>

<h3 class="">My Project View
<span class="pull-right"><a class="btn submitBk" href="javascript:history.back();">&raquo; Back</a></span>
</h3>
<div class="gap30"></div>

<?php include("in_projView_menu.php"); ?>
<div class="tab-content" readonly>
	<!---------- 1 --------->
	<div id="spro1" class="tab-pane fade in active">
		<div class="gap20"></div>
		<h4> Review and Rank</h4>
		<div class="gap20"></div>
		<form id="form_review" method="POST" enctype="multipart/form-data">
		<div class="viewTab">
			<div class="viewTab1"><h4>On the Project</h4></div>
			<div class="viewTab1">
			<?php while($statement1->fetch()) {
				$query7 = "SELECT project_review_id, star, comments FROM  too_project_review  WHERE category_id=$category_id1 AND institution_project_id=$ipid12";
				//echo $query3;
				$statement7=$mysqli->prepare($query7);
				$statement7->execute();
				$statement7->store_result();
				$statement7->bind_result($project_review_id1, $star1, $comments1);
				$statement7->fetch();
			?>
				<label class="col-md-3 col-sm-6"><?php echo $category_name1; ?></label>
				<div class="col-md-5 col-sm-6 text-bold" style="position: relative;">
					<?php if($user_type!='SP' || $user_type!='SI'){ ?>
					<div class="rating_overlay"></div>
					<?php } ?>
					<div class="stars-default reviews1" data-rating="<?php echo $star1; ?>">
						<input type="hidden" id="project[<?php echo $category_id1; ?>]" name="project[<?php echo $category_id1; ?>]" value="">
						<input type="hidden" id="update_rank[<?php echo $project_review_id1; ?>]" name="update_rank[<?php echo $project_review_id1; ?>]" value="<?php echo $star1; ?>">
					</div>

					<?php if($project_review_id1!='') { $loopID=$project_review_id1; } else { $loopID=$category_id1; } ?>

					<div id="commentDiv" style="display:none;">
						<div class="gap15"></div>
						<textarea class="form-control tal100" id="commentBox[<?php echo $loopID; ?>]" name="commentBox[<?php echo $loopID; ?>]" placeholder="Comment here"><?php echo $comments1; ?></textarea>
						<div class="gap15"></div>
					</div>
				</div>
				<div class="gap15"></div>
			<?php } ?>
			</div>

		<div style="display:<?php if($user_type=="COO") { echo "none"; } ?>;">
			<div class="viewTab1"><h4>About Mentor</h4></div>
			<div class="viewTab1">
			<?php while($statement2->fetch()) {
				$query8 = "SELECT project_review_id, star, comments FROM  too_project_review  WHERE category_id=$category_id2 AND institution_project_id=$ipid12";
				//echo $query3;
				$statement8=$mysqli->prepare($query8);
				$statement8->execute();
				$statement8->store_result();
				$statement8->bind_result($project_review_id2, $star2, $comments2);
				$statement8->fetch();
			?>
				<label class="col-md-3 col-sm-6"><?php echo $category_name2; ?></label>
				<div class="col-md-5 col-sm-6 text-bold" style="position: relative;">
					<?php if($user_type!='SP' || $user_type!='SI'){ ?>
					<div class="rating_overlay"></div>
					<?php } ?>
					<div class="stars-default reviews1" data-rating="<?php echo $star2; ?>">
						<input type="hidden" id="project[<?php echo $category_id2; ?>]" name="project[<?php echo $category_id2; ?>]" value="">
						<input type="hidden" id="update_rank[<?php echo $project_review_id2; ?>]" name="update_rank[<?php echo $project_review_id2; ?>]" value="<?php echo $star2; ?>">
					</div>

					<?php if($project_review_id2!='') { $loopID=$project_review_id2; } else { $loopID=$category_id2; } ?>

					<div id="commentDiv" style="display:none;">
						<div class="gap15"></div>
						<textarea class="form-control tal100" id="commentBox[<?php echo $loopID; ?>]" name="commentBox[<?php echo $loopID; ?>]" placeholder="Comment here"><?php echo $comments2; ?></textarea>
						<div class="gap15"></div>
					</div>
				</div>
				<div class="gap15"></div>
			<?php } ?>
			</div>
		</div>


		<div style="display:<?php if($user_type=="MEN" || $ipaid_count>0) { echo "none"; } ?>;">
			<div class="viewTab1"><h4>About Co-ordinator</h4></div>
			<div class="viewTab1">
			<?php while($statement3->fetch()) {
				$query9 = "SELECT project_review_id, star, comments FROM  too_project_review  WHERE category_id=$category_id3 AND institution_project_id=$ipid12";
				//echo $query3;
				$statement9=$mysqli->prepare($query9);
				$statement9->execute();
				$statement9->store_result();
				$statement9->bind_result($project_review_id3, $star3, $comments3);
				$statement9->fetch();
			?>
				<label class="col-md-3 col-sm-6"><?php echo $category_name3; ?></label>
				<div class="col-md-5 col-sm-6 text-bold" style="position: relative;">
					<?php if($user_type!='SP' && $user_type!='SI'){ ?>
					<div class="rating_overlay"></div>
					<?php } ?>
					<div class="stars-default reviews1" data-rating="<?php echo $star3; ?>">
						<input type="hidden" id="project[<?php echo $category_id3; ?>]" name="project[<?php echo $category_id3; ?>]" value="">
						<input type="hidden" id="update_rank[<?php echo $project_review_id3; ?>]" name="update_rank[<?php echo $project_review_id3; ?>]" value="<?php echo $star3; ?>">
					</div>

					<?php if($project_review_id3!='') { $loopID=$project_review_id3; } else { $loopID=$category_id3; } ?>

					<div id="commentDiv" style="display:none;">
						<div class="gap15"></div>
						<textarea class="form-control tal100" id="commentBox[<?php echo $loopID; ?>]" name="commentBox[<?php echo $loopID; ?>]" placeholder="Comment here"><?php echo $comments3; ?></textarea>
						<div class="gap15"></div>
					</div>
				</div>
				<div class="gap15"></div>
			<?php } ?>
			</div>
		</div>
		</div>
	<?php if($user_type=="SP") { ?>
		<div class="gap15"></div>
		<div class="text-right">
			<button type="submit" class="btn submitM" id="review_submit" name="review_submit">Submit</button>
		</div>
	<?php } ?>
		</form>
		<div class="gap20"></div>
	</div>
</div>
<div class="gap30"></div>
<?php include("footer.php"); ?>


<script>

(function ( $ ) {
 
    $.fn.rating = function( method, options ) {
		method = method || 'create';
        // This is the easiest way to have default options.
        var settings = $.extend({
            // These are the defaults.
			limit: 10,
			value: 0,
			glyph: "glyphicon-star",
            coloroff: "#ccc",
			coloron: "#fea500",
			size: "2.0em",
			cursor: "pointer",
			onClick: function () {},
            endofarray: "idontmatter"
        }, options );
		var style = "";
		style = style + "font-size:" + settings.size + "; ";
		style = style + "background:" + settings.coloroff + "; ";
		style = style + "cursor:" + settings.cursor + "; ";
	

		
		if (method == 'create')
		{
			//this.html('');	//junk whatever was there
			
			//initialize the data-rating property
			this.each(function(){
				attr = $(this).attr('data-rating');
				if (attr === undefined || attr === false) { $(this).attr('data-rating',settings.value); }
			})
			
			//bolt in the glyphs
			for (var i = 0; i < settings.limit; i++)
			{
				this.append('<span data-value="' + (i+1) + '" class="ratingicon glyphicon ' + settings.glyph + '" style="' + style + '" aria-hidden="true"></span>');
			}
			
			//paint
			this.each(function() { paint($(this)); });

		}
		if (method == 'set')
		{
			this.attr('data-rating',options);
			this.each(function() { paint($(this)); });
		}
		if (method == 'get')
		{
			return this.attr('data-rating');
		}
		//register the click events
		this.find("span.ratingicon").click(function() {
			rating = $(this).attr('data-value')
			$(this).parent().attr('data-rating',rating);
			paint($(this).parent());
			settings.onClick.call( $(this).parent() );
		})
		function paint(div)
		{
			rating = parseInt(div.attr('data-rating'));
			div.find("input").val(rating);	//if there is an input in the div lets set it's value
			div.find("span.ratingicon").each(function(){	//now paint the stars
				
				var rating = parseInt($(this).parent().attr('data-rating'));
				var value = parseInt($(this).attr('data-value'))-1;
				if (value < rating) {
					$(this).css('background',settings.coloron);
				}
				else { $(this).css('background',settings.coloroff); }
			})
			if (rating < 5 &&  rating > 0) {
				div.next("#commentDiv").show();
			} else if(rating >= 5 || rating == 0) {
				div.next("#commentDiv").hide();
			}
		}

    };
 
}( jQuery ));
</script>
<script>
$(document).ready(function(){$(".stars-default").rating();});
</script>

