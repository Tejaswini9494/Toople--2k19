<?php ob_start(); 

global $mysqli;
global $murl;
@$mysqli=new mysqli("localhost", "root", "","tooop9ar_dev18_1") ;
if ($mysqli->connect_error)
{
	echo "Connection not established.";
}
else{
	echo "Connection is established.";
}


$murl="http://tooople.com/dev18/";


?>
