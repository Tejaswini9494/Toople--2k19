<?php
$page="myAssignProjectView";
$title="My Project View";
include("header.php"); ?>

<h3 class="">My Project View</h3>
<div class="gap30"></div>

<div class="animated fadeInUp">

<ul class="nav nav-tabs">
	<li class="active ntab"><a data-toggle="tab" href="#spro1">Student Info</a></li>
	<li class="ntab"><a data-toggle="tab" href="#spro2">Product Info</a></li>
	<li class="ntab"><a data-toggle="tab" href="#spro7">Product Additional Info</a></li>
<!--	<li class="ntab"><a data-toggle="tab" href="#spro3">Product Deliverables</a></li>
	<li class="ntab"><a data-toggle="tab" href="#spro8">My Deliverables</a></li>
	<li class="ntab"><a data-toggle="tab" href="#spro4">Product Solution</a></li>	-->
	<li class="ntab"><a data-toggle="tab" href="#spro5">Product Evaluation</a></li>
	<li class="ntab"><a data-toggle="tab" href="#spro6">Product Review and Rank</a></li>
</ul>

<div class="tab-content">
	<!---------- 1 --------->
	<div id="spro1" class="tab-pane fade in active">
		<div class="gap20"></div>
		<h4>Student Info</h4>
		<div class="gap15"></div>
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<tr class="tr1">
					<td width="150">S.No.</td>
					<td>Student Name</td>
					<td>Identity Number</td>
					<td>Gender</td>
					<td>Date of Birth</td>
				</tr>
				<tr>
					<td>1</td>
					<td>Jack</td>
					<td>654654</td>
					<td>Male</td>
					<td>12/12/1999</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Jerry</td>
					<td>654654</td>
					<td>Male</td>
					<td>12/12/1999</td>
				</tr>
				<tr>
					<td>3</td>
					<td>John</td>
					<td>654654</td>
					<td>Male</td>
					<td>12/12/1999</td>
				</tr>
				<tr>
					<td>4</td>
					<td>Anand</td>
					<td>654654</td>
					<td>Male</td>
					<td>12/12/1999</td>
				</tr>
			</table>
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
			<label class="col-md-3 col-sm-6">Program Id</label>
			<div class="col-md-5 col-sm-6 text-bold">4535</div>
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
		<h4>Product Additional Info</h4>

		<div class="viewTab">

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Mentor Guidelines</label>
			<div class="col-md-5 col-sm-6 text-bold">Lorem ipsum is a simple dummy text.</div>
			<div class="gap1"></div>
		</div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Product Scenario</label>
			<div class="col-md-5 col-sm-6 text-bold">Lorem ipsum is a simple dummy text.</div>
			<div class="gap1"></div>
		</div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Learning Objectives</label>
			<div class="col-md-5 col-sm-6 text-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra sollicitudin est. Morbi lacus. Phasellus fringilla nisi id mi. Nulla adipiscing, nunc id ultrices fermentum, nunc dui rutrum orci, et fringilla mi ante vitae magna. Morbi faucibus nulla mattis libero.</div>
			<div class="gap1"></div>
		</div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Expected Outcome</label>
			<div class="col-md-5 col-sm-6 text-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra sollicitudin est. Morbi lacus. Phasellus fringilla nisi id mi. Nulla adipiscing, nunc id ultrices fermentum, nunc dui rutrum orci, et fringilla mi ante vitae magna. Morbi faucibus nulla mattis libero.</div>
			<div class="gap1"></div>
		</div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Product Reference</label>
			<div class="col-md-5 col-sm-6 text-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra sollicitudin est. Morbi lacus. Phasellus fringilla nisi id mi. Nulla adipiscing, nunc id ultrices fermentum, nunc dui rutrum orci, et fringilla mi ante vitae magna. Morbi faucibus nulla mattis libero.</div>
			<div class="gap1"></div>
		</div>

		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Software Requirement</label>
			<div class="col-md-5 col-sm-6 text-bold">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra sollicitudin est. Morbi lacus. Phasellus fringilla nisi id mi. Nulla adipiscing, nunc id ultrices fermentum, nunc dui rutrum orci, et fringilla mi ante vitae magna. Morbi faucibus nulla mattis libero.</div>
			<div class="gap1"></div>
		</div>

		</div>

		<div class="gap20"></div>
	</div>


	<!---------- 3 --------->
	<div id="spro3" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Product Deliverables</h4>

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

	<!---------- 8 --------->
	<div id="spro8" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>My Deliverables</h4>

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
		<h4>Product Solution</h4>
		<div class="gap20"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Solution Notes <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="text" placeholder="" class="form-control" id="" name="">
				</div>
				<div class="gap1"></div>
				<span class="errors" for=""></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Solution Diagram <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="file" placeholder="" class="form-control" id="" name="">
				</div>
				<div class="gap1"></div>
				<span class="errors" for=""></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="form-group">
			<label class="col-sm-3 text-right">Solution Files <span class="red">*</span></label>
			<div class="col-sm-9">
				<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-pencil"></i></span>
				<input type="file" placeholder="" class="form-control" id="" name="">
				</div>
				<div class="gap1"></div>
				<span class="errors" for=""></span>
			</div>
			<div class="gap1"></div>
		</div>
		<div class="gap10"></div>

		<div class="col-sm-9 col-sm-push-3">
			<input type="submit" placeholder="" class="btn submitM" id="" name="" value="Submit">
		</div>
		<div class="gap30"></div>

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
	<!---------- 5 --------->
	<div id="spro5" class="tab-pane fade">
		<div class="gap20"></div>
		<h4>Product Evaluation</h4>

		<div class="viewTab">
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Program ID</label>
			<div class="col-md-5 col-sm-6 text-bold">EV123456</div>
			<div class="gap1"></div>
		</div>
		<div class="viewTab1">
			<label class="col-md-3 col-sm-6">Evaluation Description</label>
			<div class="gap5"></div>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<tr class="tr1">
						<td>Evaluation Description</td>
						<td>Maximum Score</td>
						<td>Score awarded By Mentor</td>
						<td>Score awarded By Project Coordinator</td>
						<td>Score awarded By External Entity</td>
					</tr>
					<tr>
						<td>Communication</td>
						<td>10</td>
						<td>9</td>
						<td>8</td>
						<td>7</td>
					</tr>
					<tr>
						<td>Team Work</td>
						<td>10</td>
						<td>7</td>
						<td>8</td>
						<td>9</td>
					</tr>
					<tr>
						<td>Problem Solving</td>
						<td>10</td>
						<td>9</td>
						<td>8</td>
						<td>7</td>
					</tr>
					<tr>
						<td>Initiative and Enterprise</td>
						<td>10</td>
						<td>7</td>
						<td>8</td>
						<td>9</td>
					</tr>
					<tr>
						<td>Planning and Organising</td>
						<td>10</td>
						<td>9</td>
						<td>7</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Self Motivation</td>
						<td>10</td>
						<td>8</td>
						<td>7</td>
						<td>9</td>
					</tr>
					<tr>
						<td>Learning</td>
						<td>10</td>
						<td>8</td>
						<td>6</td>
						<td>7</td>
					</tr>
					<tr>
						<td>Technology</td>
						<td>10</td>
						<td>7</td>
						<td>6</td>
						<td>8</td>
					</tr>
					<tr>
						<td>Time Management</td>
						<td>10</td>
						<td>9</td>
						<td>8</td>
						<td>7</td>
					</tr>
					<tr>
						<td>Leadership</td>
						<td>10</td>
						<td>8</td>
						<td>7</td>
						<td>9</td>
					</tr>
					<tr>
						<td>Presentation</td>
						<td>10</td>
						<td>7</td>
						<td>8</td>
						<td>9</td>
					</tr>
					<tr>
						<td>Personal Developer</td>
						<td>10</td>
						<td>7</td>
						<td>7</td>
						<td>7</td>
					</tr>
					<tr>
						<td>Creative Thinking</td>
						<td>10</td>
						<td>8</td>
						<td>8</td>
						<td>8</td>
					</tr>
				</table>
			</div>

			<!--<div class="col-md-5 col-sm-6 text-bold">Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text. Lorem Ipsum is simply dummy text.</div>
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
		</div>-->
		</div>
		<div class="gap20"></div>
	</div>

</div>

<div class="gap30"></div>
</div>
    <!--inner  /-->

<div class="gap30"></div>
<?php include("footer.php"); ?>
