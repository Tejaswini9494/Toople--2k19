<?php  
$page="product_buy"; 
include("header.php"); ?> 
<h1> Product &raquo; Buy </h1>

 
<div class="gap10"></div>

<!--content Box -->
<div class="x_panel">
<div class="x_content">


<h2>Product info</h2>
<ul class="searchBoxN">
<li> <?php include("in_search_item.php"); ?>	</li>
</ul>

        
<div class="gap30"></div>

<h2>
<a href="#" data-toggle="modal" data-target="#modal_plans" class="submitM pull-right">Check our Pricing</a>
Choose Plans</h2> 

<div class="form-group">
	<label class="col-md-5 text-right">Product Name <span class="red">*</span></label>
	<div class="col-md-5">
	 <select id="pro_category" name="pro_category" class="form-control">
			<option value="">Plan1</option>
			<option>Plan2</option>
			<option>Plan3</option>
		</select>
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">Amount for Plan1<span class="red">*</span></label>
	<div class="col-md-5">
	 <span class="font24 pcolor">Rs. 12,000</span>
	</div>
</div>
<div class="gap15"></div>

<div class="gap30"></div>


<h2>Agreement Info</h2> 

 <div class="form-group">
	<label class="col-md-5 text-right">Agreement Date  </label>
	<div class="col-md-5">
	  20/05/2016
	</div>
</div>
<div class="gap15"></div>


<div class="form-group">
	<label class="col-md-5 text-right">Start Date  </label>
	<div class="col-md-5">
	   20/05/2016
	</div>
</div>
<div class="gap15"></div>

<div class="form-group">
	<label class="col-md-5 text-right">End Date  </label>
	<div class="col-md-5">
	   20/05/2016
	</div>
</div>
<div class="gap15"></div>


<div class="form-group">
	<label class="col-md-5 text-right">Self Declaration  </label>
	<div class="col-md-5">
	    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra sollicitudin est. Morbi lacus. Phasellus fringilla nisi id mi. Nulla adipiscing, nunc id ultrices fermentum, nunc dui rutrum orci, et fringilla mi ante vitae magna. Morbi faucibus nulla mattis libero. Nam sit amet neque. Suspendisse in ligula. Suspendisse at lectus. Nulla porta augue nec neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis euismod justo. Donec dapibus enim in dolor. Morbi a odio vehicula dolor viverra blandit. Mauris rhoncus. In pulvinar. Sed leo magna, dictum non, rhoncus id, bibendum sed, sem. Fusce et purus.
	</div>
</div>
<div class="gap15"></div>


<div class="form-group">
	<label class="col-md-5 text-right">Notes </label>
	<div class="col-md-5">
	    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra sollicitudin est. Morbi lacus. Phasellus fringilla nisi id mi. Nulla adipiscing, nunc id ultrices fermentum, nunc dui rutrum orci, et fringilla mi ante vitae magna. Morbi faucibus nulla mattis libero. Nam sit amet neque. Suspendisse in ligula. Suspendisse at lectus. Nulla porta augue nec neque. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis euismod justo. Donec dapibus enim in dolor. Morbi a odio vehicula dolor viverra blandit. Mauris rhoncus. In pulvinar. Sed leo magna, dictum non, rhoncus id, bibendum sed, sem. Fusce et purus.
	</div>
</div>
<div class="gap15"></div>
<hr />
<div class="gap15"></div>

<div class="text-center">
<button>Proceed to Payment</button>
<p class="red">/*After payment success the below button will be showed on the payment sucess page*/</p>

<a href="#" class="submitM">View & Config your Product</a>
</div>


<?php  include("footer.php"); ?>