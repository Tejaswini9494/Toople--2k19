<?php 
/*	PAGE ID				:PHP#
	WEBSITE NAME		:clinic
	CLIENT NAME			:clinic
	DEVELOPED BY		:Evince [www.evincetech.com]
	CREATED ON			: 
	AUTHOR				: 
	CODE REVIEWED BY	: 
	CODE MODIFIED BY	:-
	DESCRIPTION			:-	 */

session_start();
session_destroy();
//echo "<h1 align=center>Successfully Logged Out</h1>";
header("location: index.php?status=loggedout"); 
?>