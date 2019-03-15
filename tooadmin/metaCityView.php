<?php  
$page="metaCityView";
include("header.php"); ?>

<h1>
<span class="back">
<a href="metaCity.php">View</a>
</span>
 Settings  &raquo;  Meta  &raquo;    City  &raquo;  View 
</h1>
  
<form name="#" action="#" method="post" onsubmit="return contival();" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td> Country : <span class="red">*</span></td>
     
      <td>some info</td>
      </tr>
      
      <tr>
      <td> State : <span class="red">*</span></td>
      <td>some info</td>
      </tr>
    <tr>
      <td>City: <span class="red">*</span></td>
        <td>some info</td>
    </tr>

   	<tr>
      <td>Comments: <span class="red">*</span></td>
      <td valign="top">some info</td>
    </tr>
  </table>
</form>
<?php include("footer.php"); ?>
