<?php 
extract($_POST);
include("../submitTroughImage.class.php");
$sti = new submitTroughImage();
if($STI_imgString!='')
{
	if($sti->checkPost() === false)
	{ 		
		 $capcha="Please enter the case sensitive letters correctly ";
		 echo 'false';	
	}else{
		echo 'true';
	}
}
?>
