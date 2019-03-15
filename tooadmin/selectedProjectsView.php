<?php 
$page="selectedProjectsView";
include("header.php");?> 

<h3><a href="Javascript:history.back()" class="submitM pull-right">Back</a>Selected Projects &raquo; View</h3>



<div class="gap10"></div>
  
<div class="animated fadeInUp">

<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#spro1">User Info</a></li>
	<li><a data-toggle="tab" href="#spro2">Product Info</a></li>
	<li><a data-toggle="tab" href="#spro7">Mentor Info</a></li>
	<li><a data-toggle="tab" href="#spro3">Product Deliverables</a></li>
	<li><a data-toggle="tab" href="#spro4">Product Solution</a></li>
	<li><a data-toggle="tab" href="#spro5">Product Evaluation</a></li>
	<li><a data-toggle="tab" href="#spro6">Product Review and Rank</a></li>
</ul>

<div class="tab-content">
	<!---------- 1 --------->
	<div id="spro1" class="tab-pane fade in active">
		<div class="gap20"></div>
		<h4>User Info</h4>
		<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Name</label>
			<div class="col-md-5 col-sm-6 text-bold">Jack</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Date of Birth</label>
			<div class="col-md-5 col-sm-6 text-bold">12/12/1999</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Gender</label>
			<div class="col-md-5 col-sm-6 text-bold">Male</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Identity Number</label>
			<div class="col-md-5 col-sm-6 text-bold">654654</div>
			<div class="gap1"></div>
		</div>
		</div>
		<div class="gap20"></div>
	</div>

	<!---------- 2 --------->
	<div id="spro2" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Product Info</h4>

		<div class="viewTab">

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Product Id</label>
			<div class="col-md-5 col-sm-6 text-bold">4535</div>
			<div class="gap1"></div>
		</div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Product Category</label>
			<div class="col-md-5 col-sm-6 text-bold">Student Project</div>
			<div class="gap1"></div>
		</div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Created By</label>
			<div class="col-md-5 col-sm-6 text-bold">Admin</div>
			<div class="gap1"></div>
		</div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Product Status</label>
			<div class="col-md-5 col-sm-6 text-bold">Approved</div>
			<div class="gap1"></div>
		</div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Created Date</label>
			<div class="col-md-5 col-sm-6 text-bold">12/12/15</div>
			<div class="gap1"></div>
		</div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Abstract</label>
			<div class="col-md-5 col-sm-6 text-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra sollicitudin est. Morbi lacus. Phasellus fringilla nisi id mi. Nulla adipiscing, nunc id ultrices fermentum, nunc dui rutrum orci, et fringilla mi ante vitae magna. Morbi faucibus nulla mattis libero. Nam sit amet neque. Suspendisse in ligula. Suspendisse at lectus. Nulla porta augue nec neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis euismod justo. Donec dapibus enim in dolor. Morbi a odio vehicula dolor viverra blandit. Mauris rhoncus. In pulvinar. Sed leo magna, dictum non, rhoncus id, bibendum sed, sem. Fusce et purus.</div>
			<div class="gap1"></div>
		</div>

		</div>

		<div class="gap20"></div>
	</div>

	<!---------- 7 --------->
	<div id="spro7" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Mentor Info</h4>
		<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Mentor</label>
			<div class="col-md-5 col-sm-6 text-bold">
				<select class="form-control">
					<option>Select</option>
					<option>Mentor1</option>
				<select>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Hours</label>
			<div class="col-md-5 col-sm-6 text-bold"><input type="text" class="form-control"></div>
			<div class="gap1"></div>
		</div>
		</div>
		<div class="gap20"></div>
	</div>

	<!---------- 3 --------->
	<div id="spro3" class="tab-pane fade">
		<div class="gap20"></div>
		<h2>Product Deliverables</h2>

		<div class="table-responsive">
		<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
		  <thead>
		    <tr class="tr1">
		      <td width="20" align="center">#</td>
		      <td align="left">Date</td>
		      <td align="left">Week Number</td>
		      <td align="left" width="400">Deliverable</td>
		      <td align="left">Status</td>
		      <td align="left">Deadline</td>
		      <td align="left">Duration - Number Of Weeks</td>
		      <td align="left">% of Completion</td>
		      </tr>
		  </thead>
		    <tr class="tr">
		      <td align="center">1</td>
		      <td class="td_txt">12/12/15</td>
		      <td class="td_txt">2</td>
		      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
		      <td class="td_txt">Delivered</td>
		      <td class="td_txt">02/02/16</td>
		      <td class="td_txt">3</td>
		      <td class="td_txt">50%</td>
		    </tr>
		    <tr class="tr">
		      <td align="center">2</td>
		      <td class="td_txt">12/12/15</td>
		      <td class="td_txt">2</td>
		      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
		      <td class="td_txt">Delivered</td>
		      <td class="td_txt">02/02/16</td>
		      <td class="td_txt">3</td>
		      <td class="td_txt">50%</td>
		    </tr>
		    <tr class="tr">
		      <td align="center">3</td>
		      <td class="td_txt">12/12/15</td>
		      <td class="td_txt">2</td>
		      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
		      <td class="td_txt">Delivered</td>
		      <td class="td_txt">02/02/16</td>
		      <td class="td_txt">3</td>
		      <td class="td_txt">50%</td>
		    </tr>
		    <tr class="tr">
		      <td align="center">4</td>
		      <td class="td_txt">12/12/15</td>
		      <td class="td_txt">2</td>
		      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
		      <td class="td_txt">Delivered</td>
		      <td class="td_txt">02/02/16</td>
		      <td class="td_txt">3</td>
		      <td class="td_txt">50%</td>
		    </tr>
		    <tr class="tr">
		      <td align="center">5</td>
		      <td class="td_txt">12/12/15</td>
		      <td class="td_txt">2</td>
		      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
		      <td class="td_txt">Delivered</td>
		      <td class="td_txt">02/02/16</td>
		      <td class="td_txt">3</td>
		      <td class="td_txt">50%</td>
		    </tr>
		</table>
		</div>

		<div class="gap20"></div>
	</div>

	<!---------- 4 --------->
	<div id="spro4" class="tab-pane fade">
		<div class="gap20"></div>
		<h2>Product Solution</h2>

		<div class="table-responsive">
		<table width="100%" class="table table-bordered table-striped tabBorder" id="dataTable">
		  <thead>
		    <tr class="tr1">
		      <td width="20" align="center">#</td>
		      <td align="left">Date</td>
		      <td align="left">Solution Notes</td>
		      <td align="left">Solution Diagram</td>
		      <td align="left">Solution Files</td>
		      </tr>
		  </thead>
		    <tr class="tr">
		      <td align="center">1</td>
		      <td class="td_txt">12/12/15</td>
		      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
		      <td class="td_txt"><a href="images/na.jpg" target="_blank"><img src="images/na.jpg"></a></td>
		      <td class="td_txt"><a href="images/na.jpg" target="_blank"><img src="images/na.jpg"></a></td>
		    </tr>
		    <tr class="tr">
		      <td align="center">2</td>
		      <td class="td_txt">12/12/15</td>
		      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
		      <td class="td_txt"><a href="images/na.jpg" target="_blank"><img src="images/na.jpg"></a></td>
		      <td class="td_txt"><a href="images/na.jpg" target="_blank"><img src="images/na.jpg"></a></td>
		    </tr>
		    <tr class="tr">
		      <td align="center">3</td>
		      <td class="td_txt">12/12/15</td>
		      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
		      <td class="td_txt"><a href="images/na.jpg" target="_blank"><img src="images/na.jpg"></a></td>
		      <td class="td_txt"><a href="images/na.jpg" target="_blank"><img src="images/na.jpg"></a></td>
		    </tr>
		    <tr class="tr">
		      <td align="center">4</td>
		      <td class="td_txt">12/12/15</td>
		      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
		      <td class="td_txt"><a href="images/na.jpg" target="_blank"><img src="images/na.jpg"></a></td>
		      <td class="td_txt"><a href="images/na.jpg" target="_blank"><img src="images/na.jpg"></a></td>
		    </tr>
		    <tr class="tr">
		      <td align="center">5</td>
		      <td class="td_txt">12/12/15</td>
		      <td class="td_txt">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</td>
		      <td class="td_txt"><a href="images/na.jpg" target="_blank"><img src="images/na.jpg"></a></td>
		      <td class="td_txt"><a href="images/na.jpg" target="_blank"><img src="images/na.jpg"></a></td>
		    </tr>
		</table>
		</div>
		<div class="gap20"></div>
	</div>

	<!---------- 5 --------->
	<div id="spro5" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Product Evaluation</h4>

		<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Evaluation ID</label>
			<div class="col-md-5 col-sm-6 text-bold">EV123456</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Evaluation Description</label>
			<div class="col-md-5 col-sm-6 text-bold">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Maximum Score</label>
			<div class="col-md-5 col-sm-6 text-bold">100%</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Score awarded By Mentor</label>
			<div class="col-md-5 col-sm-6 text-bold">90%</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Score awarded By Coordinator</label>
			<div class="col-md-5 col-sm-6 text-bold">99%</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Score awarded By External Environment</label>
			<div class="col-md-5 col-sm-6 text-bold">100%</div>
			<div class="gap1"></div>
		</div>
		</div>
		<div class="gap20"></div>
	</div>

	<!---------- 6 --------->
	<div id="spro6" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Product Review and Rank</h4>

		<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Product Review</label>
			<div class="col-md-5 col-sm-6 text-bold">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Product Rank</label>
			<div class="col-md-5 col-sm-6 text-bold">I</div>
			<div class="gap1"></div>
		</div>
		</div>
		<div class="gap20"></div>
	</div>
</div>

<div class="gap30"></div>
</div>
    <!--inner  /-->



<?php  include("footer.php"); ?>
