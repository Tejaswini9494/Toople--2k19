<?php  
$page="newsView";
include_once("../class/config.php");
extract($_REQUEST);
//echo $id;


$sql="SELECT news,news_content FROM master_news WHERE news_id='$id'";
$st=$mysqli->prepare($sql);
$st->execute();
$st->store_result();
$st->bind_result($news,$news_content);
$st->fetch();
include("header.php"); ?>
<h1>
<span class="back">
<a href="news_mgnt.php">View</a>
</span>
 News Managment  &raquo;  View 
</h1>
  
<form name="#" action="#" method="post" onsubmit="return contival();" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td>News: <span class="red">*</span><?php echo $news;?></td>
    </tr>

   	<tr>
      <td>News Content: <span class="red">*</span><?php echo $news_content;?></td>
    </tr>
  </table>
</form>
<?php include("footer.php");  ?>
