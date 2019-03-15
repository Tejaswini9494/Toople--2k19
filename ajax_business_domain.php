<?php 
include_once("class/config.php");
extract($_POST);
$category=$_POST['category'];
$business_domain=$_POST['business_domain'];
$sql1 = "SELECT a.busi_domain, b.category_name FROM too_projects a, master_category b  WHERE a.busi_domain=b.category_id AND a.category='$category' GROUP BY a.busi_domain";
//echo $sql1;
$statement1=$mysqli->prepare($sql1);
$statement1->execute();
$statement1->store_result();
$statement1->bind_result($busi_domain_id, $busi_domain_name); 

?>
		<select id="search_business_domain" name="search_business_domain" class="form-control">
				<option value="" >Business Domain</option>
				<?php while($statement1->fetch()) {?>
				<option value="<?php echo $busi_domain_id;?>"<?php if($business_domain==$busi_domain_id){echo 'selected';}?>><?php echo $busi_domain_name;?></option>
				<?php }?>
		</select>



