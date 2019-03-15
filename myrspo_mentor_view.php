<?php
$page="myrspo_mentor_view";
$title="Mentor View";
include("header.php"); ?>

<h3 class="">Mentor View - <small>Mentor Name</small></h3>
<div class="gap30"></div>

<div class="panel-group" id="stu1" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="stu1a">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#stu1" href="#stu1b" aria-expanded="true" aria-controls="collapseOne">
          1. Project1
        </a>
      </h4>
    </div>
    <div id="stu1b" class="panel-collapse collapse" role="tabpanel" aria-labelledby="stu1a">
      <div class="panel-body">
	<?php include("in_myrspo_mentorProView.php"); ?>
      </div>
    </div>
  </div>
</div>
<div class="gap10"></div>

<div class="panel-group" id="stu2" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="stu2a">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#stu2" href="#stu2b" aria-expanded="true" aria-controls="collapseOne">
          2. Project2
        </a>
      </h4>
    </div>
    <div id="stu2b" class="panel-collapse collapse" role="tabpanel" aria-labelledby="stu2a">
      <div class="panel-body">
	<?php include("in_myrspo_mentorProView.php"); ?>
      </div>
    </div>
  </div>
</div>
<div class="gap10"></div>

<div class="panel-group" id="stu3" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="stu3a">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#stu3" href="#stu3b" aria-expanded="true" aria-controls="collapseOne">
          3. Project3
        </a>
      </h4>
    </div>
    <div id="stu3b" class="panel-collapse collapse" role="tabpanel" aria-labelledby="stu3a">
      <div class="panel-body">
	<?php include("in_myrspo_mentorProView.php"); ?>
      </div>
    </div>
  </div>
</div>
<div class="gap10"></div>

<div class="panel-group" id="stu4" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="stu4a">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#stu4" href="#stu4b" aria-expanded="true" aria-controls="collapseOne">
          4. Project4
        </a>
      </h4>
    </div>
    <div id="stu4b" class="panel-collapse collapse" role="tabpanel" aria-labelledby="stu4a">
      <div class="panel-body">
	<?php include("in_myrspo_mentorProView.php"); ?>
      </div>
    </div>
  </div>
</div>

<div class="gap30"></div>
<?php include("footer.php"); ?>
