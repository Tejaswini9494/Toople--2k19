<?php
	class incFunctions
	{

	function Total_Members($ids)
	{
	$list=explode(",",$ids);
	$count=count($list);
	return $count;
	} 

	function show_substring($str,$start,$end)
	{
	//echo $str;
	if($start==''){$start=0;}
	$strlen=strlen($str);		
	$showstr=substr($str,$start,$end);
	$showinc=substr($str,$end+1);
	if($showinc!=""){$showstr.="...";}
	return $showstr;
	} 

	
	//Paging for UI
	function pagingUI($totalrec,$limit)
	{
	//echo $totalrec;
	$start=$_REQUEST["startrow"];
	if($_SERVER["QUERY_STRING"]!=""){$qs=explode("&",$_SERVER["QUERY_STRING"]);}
	$qstr="";		
	for($q=0;$q<count($qs);$q++){
	$varname=explode("=",$qs[$q]);				
	if($varname[0]!='startrow'){$qstr.=$varname[0]."=".$varname[1]."&";}
	}
	if($start==""){$start=1;}

	$k=0;
	if(($totalrec%$limit)!=0){
	$trec=$totalrec+($limit-($totalrec%$limit));}else{$trec=$totalrec;}

	?><table width='' border='0' cellspacing='0' cellpadding='2' align="center" style="font-size:14px; font-weight:bold;"><tr><td><?php
	if($start!=0 && $start!="" && $start>($limit-1)){?>
	<a href="<?php echo $_SERVER["PHP_SELF"]."?".$qstr."startrow=".($start-$limit)?>" class=<?php echo $class;?>>
	<img src="images/leftarrow1.gif" alt=" " width="7" height="14" border="0" /></a></td><td><?php
	}		
	for($i=1;$i<$trec;$i=$i+$limit){ 				
	if($start==($k*$limit)){$class="link12";}else{$class="linkU";}
	if($_REQUEST["startrow"]=="" && $i==1){$class="linkN";}		
	if($start==($k*$limit)){?><span class=<?php echo $class;?>><?php $k=$k+1;?>
	<?php echo $k;?></span><?php }else{?><a href="<?php echo $_SERVER["PHP_SELF"]."?".$qstr."startrow=".($k*$limit)?>" class=<?php echo $class;?>><?php $k=$k+1;
	echo $k;?></a><?php }?></td><td><?php
	}

	if($start==0 or $start=="" or $start!=(($k-1)*$limit)){?>
	<?php if($_REQUEST["startrow"]==""){$start=0;}?>
	<a href="<?php echo $_SERVER["PHP_SELF"]."?".$qstr."startrow=".($start+$limit)?>" class=<?php echo $class;?>>
	<img src="images/rightarrow1.gif" alt=" " width="7" height="14" border="0" /></a><?php echo "&nbsp;&nbsp;";
	}
	?></td><tr></table><?php
	}//UI paging function END

	//Paging for UI Key wor search
	function pagingS($totalrec,$limit, $keyword='', $state_name='', $city_name='')
	{
	//echo $totalrec;
	$start=$_REQUEST["startrow"];
	if($_SERVER["QUERY_STRING"]!=""){$qs=explode("&",$_SERVER["QUERY_STRING"]);}
	$qstr="";		
	for($q=0;$q<count($qs);$q++){
	$varname=explode("=",$qs[$q]);				
	if($varname[0]!='startrow'){$qstr.=$varname[0]."=".$varname[1]."&";}
	}
	if($start==""){$start=1;}

	$k=0;
	if(($totalrec%$limit)!=0){
	$trec=$totalrec+($limit-($totalrec%$limit));}else{$trec=$totalrec;}

	?><table width='' border='0' cellspacing='0' cellpadding='2' class='contentB' align="center"><tr><td><?php
	if($start!=0 and $start!="" and $start>($limit-1)){?>
	<a href="<?php echo $_SERVER["PHP_SELF"]."?".$qstr."startrow=".($start-$limit)."&keyword=".$keyword."&state_name=".$state_name."&city_name=".$city_name?>" class=<?=$class;?>>
	<img src="images/leftarrow1.gif" alt=" " width="7" height="14" border="0" /></a></td><td><?php
	}		
	for($i=1;$i<$trec;$i=$i+$limit){ 				
	if($start==($k*$limit)){$class="link12";}else{$class="linkU";}
	if($_REQUEST["startrow"]=="" && $i==1){$class="linkN";}		
	if($start==($k*$limit)){?><span class=<?php echo $class;?>><?php $k=$k+1; ?>
	<?php echo $k;?></span><?php }else{?><a href="<?php echo $_SERVER["PHP_SELF"]."?".$qstr."startrow=".($k*$limit)."&keyword=".$keyword."&state_name=".$state_name."&city_name=".$city_name?>" class=<?php echo $class;?>><?php $k=$k+1; ?>
	<?php echo $k;?></a><?php }?></td><td><?php }

	if($start==0 or $start=="" or $start!=(($k-1)*$limit)){?>
	<?php if($_REQUEST["startrow"]==""){$start=0;}?>
	<a href="<?php echo $_SERVER["PHP_SELF"]."?".$qstr."startrow=".($start+$limit)."&keyword=".$keyword."&state_name=".$state_name."&city_name=".$city_name?>" class=<?php echo $class;?>>
	<img src="images/rightarrow1.gif" alt=" " width="7" height="14" border="0" /></a><?php echo "&nbsp;&nbsp;";
	}
	?></td><tr></table><?php
	}//Paging for UI Key wor search END

	//Pagin for AI
	function pagingAI($totalrec,$limit)
	{
	//echo $totalrec;
	$start=$_REQUEST["startrow"];
	if($_SERVER["QUERY_STRING"]!=""){$qs=explode("&",$_SERVER["QUERY_STRING"]);}
	$qstr="";		
	for($q=0;$q<count($qs);$q++){
	$varname=explode("=",$qs[$q]);				
	if($varname[0]!='startrow'){$qstr.=$varname[0]."=".$varname[1]."&";}
	}
	if($start==""){$start=1;}

	$k=0;
	if(($totalrec%$limit)!=0){
	$trec=$totalrec+($limit-($totalrec%$limit));}else{$trec=$totalrec;}

	?><table width='' border='0' cellspacing='0' cellpadding='2' id="paging" align="center"><tr><td><?php
	if($start!=0 and $start!="" and $start>($limit-1)){?>
	<a href="<?php echo $_SERVER["PHP_SELF"]."?".$qstr."startrow=".($start-$limit)?>" class=<?php echo $class;?>>
	<img src="../images/leftarrow1.gif" alt=" " width="7" height="14" border="0" /></a></td><td><?php
	}		
	for($i=1;$i<$trec;$i=$i+$limit){ 				
	if($start==($k*$limit)){$class="link12";}else{$class="linkU";}
	if($_REQUEST["startrow"]=="" && $i==1){$class="linkN";}		
	if($start==($k*$limit)){?><span class=<?php echo $class;?>><?php $k=$k+1; ?>
	<?php echo $k;?></span><?php }else{?><a href="<?php echo $_SERVER["PHP_SELF"]."?".$qstr."startrow=".($k*$limit)?>" class=<?php echo $class;?> style="size:12px;font-weight: bold;"><?php $k=$k+1;?>
	<?php echo $k;?></a><?php }?></td><td><?php
	}

	if($start==0 or $start=="" or $start!=(($k-1)*$limit)){?>
	<?php if($_REQUEST["startrow"]==""){$start=0;}?>
	<a href="<?php echo $_SERVER["PHP_SELF"]."?".$qstr."startrow=".($start+$limit)?>" class=<?php echo $class;?>>
	<img src="../images/rightarrow1.gif" alt=" " width="7" height="14" border="0" /></a><?php echo "&nbsp;&nbsp;";
	}
	?></td><tr></table><?php
	}//AI paging function END



} // end of db class
?>