<?php
	/*	PAGE ID				:PHP#
	WEBSITE NAME		:Vastgoed
	CLIENT NAME			:Macmaan
	DEVELOPED BY		:Evince [www.evincetech.com]
	CREATED ON			: 2012
	AUTHOR				: 2018
	CODE REVIEWED BY	: 2013
	CODE MODIFIED BY	: 2018
	DESCRIPTION			:- Inc Function Page	 */
function sysConvert($fDate)
{
	$st=explode("/",$fDate);
	$evDay= $st[1];
	$evMonth= $st[0];
	$evYear= $st[2];
	$frDate="";
	if ($evDay!="" && $evMonth!="" && $evYear!="")
	$frDate=($evYear."-".$evMonth."-".$evDay);
	return $frDate;
}

function sysDBDateConvert($fDate)
{
	$st=explode("-",$fDate);
	$evYear= $st[0];// 2007
	$evMonth= $st[1];//mon
	$evDay= substr($st[2],0,2);//date
	$frDate=($evDay."/".$evMonth."/".$evYear);
	return $frDate;
}

function cutWord($goal){
	$goal=preg_replace('/([^\s]{25})(?=[^\s])/m', '$1 ', $goal);//to cut lengthy single word without space//$goal;
	return nl2br($goal);
}

function myTruncate($string, $limit, $break=".", $pad="...")
{
	// return with no change if string is shorter than $limit
	if(strlen($string) <= $limit) return $string; 
	// is $break present between $limit and the end of the string? 
	if(false !== ($breakpoint = strpos($string, $break, $limit))) 
	{
		if($breakpoint < strlen($string) - 1) { $string = substr($string, 0, $breakpoint) . $pad; } 
	}
	return $string;
}

function sql_injection($val)
{
	$val=mysql_real_escape_string(htmlspecialchars(stripslashes($val)));
	return $val;
}
function sysConvertYear($fDate)
{
	$st=explode("-",$fDate);
	$evYear= $st[0];// 2007
	$frDate=($evYear);
	return $frDate;
}
?>
