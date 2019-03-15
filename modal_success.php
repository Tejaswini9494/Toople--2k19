<div class="modal fade" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header"> <a href="myProject.phpp" class="close" >x</a>
<h2 class="modal-title" id="myModalLabel" style="width:auto;"><?php echo $_SESSION["title_message"]; ?></h2>
			</div>
			<div class="modal-body"> 
				<div class="col-sm-12">
					<div class="gap20"></div>
					<h5><?php echo $_SESSION["user_message"];?></h5>
				<div class="gap30"></div>

				</div> 
				<br class="clear">
			</div>

			<div class="modal-footer">
				<button type="button" class="btn submitM cancelBtn" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>

