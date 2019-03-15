<?php require_once("sesChk.php"); 

$baseURL="http://tooople.com/dev18/";

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<base href="<?php echo $baseURL; ?>">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- standard meta data starts-->
	<link rel="shortcut icon" href="images/favicon.ico" />
	 
	<meta name="description" content="####" />
	<meta name="keywords" content="####" />
	<meta name="keyphrase" content="####" />
	<meta name="abstract" content="####" />
	<meta http-equiv="robots" content="index,follow,all" />
	<meta name="robots" content="index, follow" />
	<!-- standard meta data ends-->

    <title>Tooople - <?php echo $title; ?></title> <!-- Title -->

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

	<!-- Google+ Sharing -->
	<link rel="canonical" href="<?php echo $baseURL; ?>" />
	<script src="https://apis.google.com/js/platform.js" async defer></script>

</head>

<body>
<div class="container-fluid <?php if($page!="index") { ?>headO1<?php } else { ?>headO1<?php } ?>"> <!--headerO starts-->
  <div class="container"> <!--header starts-->
	<nav class="navbar navbar-default">
	  <div class="container-fluid"> <!-- container-fluid -->
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php"><img src="images/logo.png" height="100%"></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> <!-- navbar-collapse -->
		<?php include("in_menu.php"); ?>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

  </div> <!--header ends-->
</div> <!--headerO ends-->

<?php if($page=="index") { ?>
<div class="container-fluid banO"> <!--midO starts-->
	<div data-ride="carousel" class="carousel slide" id="myCarousel">
		<!-- Wrapper for slides -->
		<div role="listbox" class="carousel-inner">
			<div class="item active">
				<img style="width:100% !important; height:90vh !important;" alt="Chania" src="images/banner1.jpg">
				<div class="caro_text ct1"><span><strong>TOOOPLE Platform</strong> helps students develop micro and macro <strong>projects</strong> on key technologies in a <strong>virtual</strong> environment with support from experienced individual <strong>mentors</strong></span></div>
			</div>

			<div class="item">
				<img style="width:100% !important; height:90vh !important;" alt="Chania" src="images/banner2.jpg">
				<div class="caro_text ct2"><span><strong>TOOOPLE Academy</strong> helps students develop problem solving skills through <strong>algorithms</strong> and hosts the <strong>curriculum</strong> from new generation companies to develop industry relevant technical and <strong>soft skills</strong></span></div>
			</div>
		</div>

		<!-- Left and right controls -->
		<a data-slide="prev" role="button" href="#myCarousel" class="left carousel-control">
		<span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
		</a>
		<a data-slide="next" role="button" href="#myCarousel" class="right carousel-control">
		<span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
		</a>
	</div>
	<div class="container textCont">
		<div class="bannerTxt">Creating Equal Opportunity in Tech Recruitment Globally</div>
		<div class="gap20"></div>
		<div class="bannerTxtS">We are at the cusp of a digital transformation that begins with equal opportunity in education.</div>
	</div>
</div>
<?php } else { ?>
<div class="container-fluid headO"></div>
<?php } ?>


<?php if($page!="index") { ?>
<div class="gap20"></div>
<div class="container-fluid "> <!--midO starts-->
  <div class="container"> <!--mid starts-->
<?php }?>

