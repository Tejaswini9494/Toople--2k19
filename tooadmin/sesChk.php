<?php
ob_start();
session_start();
	if($_SESSION["sesLoggedInToople"]=="" && $page!="index" 
	&& $page!="about"
	&& $page!="features"
	&& $page!="pricing"
	&& $page!="benefits"
	&& $page!="support"
	&& $page!="contact"
	&& $page!="signup"
	&& $page!="forgotPassword"
	&& $ses!="no"
	)	{header("location:index.php?st=ses");}
?>