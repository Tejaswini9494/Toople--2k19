<?php
/**
* Generate Image Example.
*	based on the submitTroughImage.class.php
*	by: Daantje Eeltink
*
*	This is an example to parse the image with the string build by createImage()
*	This example is for both backends. (lazy me)
*/

//start class
include_once("submitTroughImage.class.php");
$sti = new submitTroughImage();

//patch for harddisk backend example
if($argv[0])
	$sti->setBackendPath('sti_tmp');

//parse raw JPEG source
$sti->parseImage($argv[0]);

//parse errors when there are any
echo $sti->error();

?>