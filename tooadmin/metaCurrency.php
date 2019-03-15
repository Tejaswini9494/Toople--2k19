<?php  
$page="metaCurrency";
include_once ("include/functions.php");
include("header.php"); ?>
<?php// include("setTop.php");  ?>


<h1>
<span class="back">
<a href="metaCurrencyAdd.php">Add Currency</a>
</span>
 Settings  &raquo;  Meta  &raquo;    Currency  &raquo;  View 
</h1>
 
<form name="frm" action="#" method="post" enctype="multipart/form-data">
<div id="searchBox">
<h2 class="show_hide"> Filter </h2><br class="clear" />


<div class="well filterBox">

<div class="searchBox">

    <table align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td><select name="select" id="select" class="boxM">
		<option> Select Country </option>
		<?php echo getCountry(); ?>
        </select>
        </td>
        <td><select name="select" id="select" class="boxM">
		<option value=""> Select Currency </option>
		<option> SGD </option>
        </select>
        </td>
        <td><input type="submit" name="button" id="button" value=" Search " class="submitM" /></td>
        <td><input type="submit" name="button5" id="button5" value=" Clear " class="submitM" /></td>
      </tr>

    </table>
  </div>
</div>

 </div>
 
<div id="listView">
<div class="table-responsive">
<table id="dataTable" class="table table-bordered table-striped tabBorder">
  <thead>
    <tr class="tr1">

      <td width="30" align="left"></td>
      <td width="20"  align="left" >&nbsp;</td>
      <td><strong>#</strong></td>
      <td><strong><a href="#" class="linkB"> Country </a></strong></td>
      <td> Currency </td>
    </tr>
  </thead>
    <tr class="tr">
      <td align="left"><input type="checkbox" name="selall2" onclick="return selall1(this);" /></td>
      <td align="left"><a href="metaCurrencyEdit.php" onclick="showPopup(1000, ' EDITCOUNTRY ', '', 'dialogQ1z')"><img src="images/edit.png" width="12" height="12" alt="edit" /></a> </td>
      <td><a href="metaCurrencyView.php">123</a></td>
      <td>India</td>
      <td> SGD</td>
    </tr>
    <tr class="tr">
      <td align="left"><input type="checkbox" name="selall2" onclick="return selall1(this);" /></td>
      <td align="left"><a href="metaCurrencyEdit.php" onclick="showPopup(1000, ' EDITCOUNTRY ', '', 'dialogQ1z')"><img src="images/edit.png" width="12" height="12" alt="edit" /></a> </td>
      <td><a href="metaCurrencyView.php">123</a></td>
      <td>China</td>
      <td> SGD</td>
    </tr>
    <tr class="tr">
      <td align="left"><input type="checkbox" name="selall2" onclick="return selall1(this);" /></td>
      <td align="left"><a href="metaCurrencyEdit.php" onclick="showPopup(1000, ' EDITCOUNTRY ', '', 'dialogQ1z')"><img src="images/edit.png" width="12" height="12" alt="edit" /></a> </td>
      <td><a href="metaCurrencyView.php">123</a></td>
      <td>England</td>
      <td> SGD</td>
    </tr>
    <tr class="tr">
      <td align="left"><input type="checkbox" name="selall2" onclick="return selall1(this);" /></td>
      <td align="left"><a href="metaCurrencyEdit.php" onclick="showPopup(1000, ' EDITCOUNTRY ', '', 'dialogQ1z')"><img src="images/edit.png" width="12" height="12" alt="edit" /></a> </td>
      <td><a href="metaCurrencyView.php">123</a></td>
      <td>USA</td>
      <td> SGD</td>
    </tr>
    <tr class="tr">
      <td align="left"><input type="checkbox" name="selall2" onclick="return selall1(this);" /></td>
      <td align="left"><a href="metaCurrencyEdit.php" onclick="showPopup(1000, ' EDITCOUNTRY ', '', 'dialogQ1z')"><img src="images/edit.png" width="12" height="12" alt="edit" /></a> </td>
      <td><a href="metaCurrencyView.php">123</a></td>
      <td>Pakistan</td>
      <td> SGD</td>
    </tr>
    <tr class="tr">
      <td align="left"><input type="checkbox" name="selall" onclick="return selall1(this);" /></td>
      <td align="left"><a href="metaCurrencyEdit.php" onclick="showPopup(1000, ' EDITCOUNTRY ', '', 'dialogQ1z')"><img src="images/edit.png" width="12" height="12" alt="edit" /></a> </td>
      <td><a href="metaCurrencyView.php">123</a></td>
      <td>Srilanka</td>
      <td> SGD</td>
    </tr>
</table>
</div>
<br>

<table class="table table-bordered table-striped tabBorder">
    <tr class="tr2">
      <td align="left" colspan="5"><input type="submit" name="button" id="button" value=" Delete " class="submitM">
<input type="submit" name="button2" id="button2" value=" Active " class="submitM">
<input type="submit" name="button3" id="button3" value=" Deactive " class="submitM"></td>
    </tr>
  </table>
  </div>
</form>

<?php include("footer.php");  ?>
