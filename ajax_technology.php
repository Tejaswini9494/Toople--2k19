<?php 
include_once("class/config.php");
extract($_POST);
$category=$_POST['category'];
$technology=$_POST['technology'];
$sql1 = "SELECT a.dev_platform, b.category_name FROM too_projects a, master_category b  WHERE a.dev_platform=b.category_id AND a.category='$category' GROUP BY a.dev_platform";
//echo $sql1;
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($tech_id, $tech_name); 
//<?php if($dev_platform==$tech_id){echo 'selected';}?>

		<select id="search_dev_platform" name="search_dev_platform" class="form-control">
				<option value="" >Technology</option>
				<?php while($statement1->fetch()) {?>
				<option value="<?php echo $tech_id;?>" <?php if($technology==$tech_id){echo 'selected';}?>><?php echo $tech_name;?></option>
				<?php }?>
		</select>



