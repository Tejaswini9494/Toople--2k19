<?php
$page="myProject";
$title="My Projects";
include("header.php"); ?>

<h3 class="">Contents</h3>
<div class="gap30"></div>

<div class="row">
<strong>Content Name</strong>: Content Title<br><br>
<strong>Content Type</strong>: Project<br><br>
<strong>Content ID</strong>: 12345<br><br>
<strong>Abstract</strong>: Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.  <br><br>
<strong>Scenario</strong>: Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.  <br><br>
<strong>Notes</strong>: Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. <br><br>
</div>

<form action="addContents.php" method="post">
	<div class="row well">
		<div class="col-md-2 text-right">
			<label>The content is :</label>
		</div>
		<div class="col-md-8">
			<label class="col-md-3"><input type="radio" name="" id=""> Approved</label>
			<label class="col-md-3"><input type="radio" name="" id=""> Rejected</label>
		</div>
		<div class="gap10"></div>
		<div class="col-md-2 text-right">
			<label>Justification :</label>
		</div>
		<div class="col-md-8">
			<textarea name="" id="" class="form-control"></textarea>
		</div>
		<div class="gap10"></div>
		<div class="col-md-4">	
			<input id="" class="btn submitM" type="submit" value="Submit">
			<input id="" class="btn submitM cancelBtn pull-right" type="reset" value="Cancel">
		</div>
	</div>
</form>

<div class="gap20"></div>
<?php include("footer.php"); ?>
