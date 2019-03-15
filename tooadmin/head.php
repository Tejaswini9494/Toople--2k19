<?php require_once("sesChk.php");?>
<!DOCTYPE HTML>
<html>
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toople &raquo; <?php echo $tit; ?></title>
	<link rel="icon" href="images/favicon.ico">
    
    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-jvectormap-2.0.1.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/jquery-1.11.1.min.js"></script>

<script language="javascript" type="text/javascript" src="js/image_modify.js"></script>
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->


    <link href="css/evince.css" rel="stylesheet">
</head>

<body class="nav-md">
<!--show div str -->
<script type='text/JavaScript'>
	var prevpage = "testing";
	function showdiv2(namediv)
	{
		document.getElementById(prevpage).style.display = 'none';	
		if (prevpage == namediv){
			document.getElementById(namediv).style.display = 'none';
			prevpage="testing";
		}else{
		document.getElementById(namediv).style.display = 'block';	
		prevpage = namediv;
		}
		
	}	
</script>
