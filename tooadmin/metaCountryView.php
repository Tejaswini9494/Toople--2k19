<?php  
$page="metaCountryView";
include("header.php");
include_once("class/config.php");
extract($_REQUEST);
$query="select country_name,currency,isd_code from master_country where country_id='".$id."'";
$statement=$mysqli->prepare($query);
$statement->execute();
$statement->store_result();
$statement->bind_result($country_name,$currency,$isd_code);
$statement->fetch();
?>
<h1>
<span class="back">
<a href="metaCountry.php">View</a>
</span>
 Settings  &raquo;  Meta  &raquo;    Country  &raquo;  View 
</h1>
  
<form name="#" action="#" method="post" onsubmit="return contival();" enctype="multipart/form-data">
  <table cellpadding="0" cellspacing="0" align="center">
    
    <tr>
      <td>Country: <span class="red">*</span></td>
        <td><?php echo $country_name;?></td>
    </tr>

   <tr>
      <td>Currency: <span class="red">*</span></td>
      <td valign="top"><?php echo $currency;?></td>
   </tr>
   <tr>
      <td>ISD Code: <span class="red">*</span></td>
      <td valign="top"><?php echo $isd_code;?></td>
   </tr>
  </table>
</form>
<?php include("footer.php");  ?>
