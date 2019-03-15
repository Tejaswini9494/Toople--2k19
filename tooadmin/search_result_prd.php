<?php  
$page="search_result_prd"; 
include("header.php"); ?> 
<h1> Product Search &raquo; Results</h1>

 
<div class="gap10"></div>

<!--content Box -->
<div class="x_panel">
<div class="x_content">


    <div class="row">
        <div class="col-md-9">
 
            <ul class="searchBoxN">
		<li> <?php include("in_search_item.php"); ?>	</li>
		<li> <?php include("in_search_item.php"); ?>	</li>
		<li> <?php include("in_search_item.php"); ?>	</li>
		<li> <?php include("in_search_item.php"); ?>	</li>
        
		</ul>
		<?php include("paging.php"); ?>
        
        </div>
        
        <div class="col-md-3">   
        	<h2>Search Filter</h2>        
           <?php include("in_search_filter.php"); ?>          
        </div>
        
        
    </div>    
        
       
<?php  include("footer.php"); ?>