<?php
//init class
include_once("submitTroughImage.class.php");
$sti = new submitTroughImage();

//use this font
$sti->setFont("fonts/DESTROY_.TTF");

//create image
$sti->createImage();

//parse form...
?>
 <?php echo $sti->parseStringInput();?>  <img src="image.php?a=<?php echo time()?>" alt="Captcha" />

<a href="javascript:changeImage();" style="position:absolute; z-index:999; border:0px solid red; top:10px; right:10px;" ><img src="images/refresh.png" width="16" height="16" alt="Try another image" /></a>
 
