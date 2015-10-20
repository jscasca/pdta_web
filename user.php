<?php
/**
 * user.php
 * 
 * 
 */
session_start();
require("php/utils/commons.php");

if(isset($_SESSION[SID])){}
$userId = -1;
if(!isset($_REQUEST['user'])) {
	die();
}
$userId = $_REQUEST['user'];

if(isset($_SESSION[SID])){
	$token = $_SESSION[TOKEN];
	$callForUserInteraction = tokenCurlCall($token, "GET", "api/users/".$userId."/interactions");
	
	//Get friends reading this
	
	//get friends who read it
}

$callForPosdtas = authenticationlessCurlCall("GET", "api/users/".$userId."/posdtas", array('start'=>0, 'limit'=>10));

$callForInfo = authenticationlessCurlCall("GET", "api/users/".$userId."/info");
?>
<!doctype HTML>
<html>
<head>
	<title>Posdta. Deja una Posdta!</title>
	
	<!--
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Posdta. Sigue leyendo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	<meta name="description" content="Comparte lo que estas leyendo con tus amigos" />
	<meta name="keywords" content="comparte,lee,libros,marcar,sellar,latinoamerica,escritores,lectores,bibliotecas,librero" />
	<meta name="author" content="Posdta" />
	-->
	<meta charset="UTF-8" />
	<meta description="Description" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta property="og:title" content="Posdta" />
	
	<link rel="shortcut icon" href="img/favicon.png"> 
	
	<!-- bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet" >
	<link href="css/submit.css" rel="stylesheet" >
	<link href="css/register.css" rel="stylesheet" >
	<link href="css/posdta.css" rel="stylesheet" >
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<!--<script src="https://code.jquery.com/jquery.js"></script>-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!-- Include all compiled plugins -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Backbone js for mvc -->
	<script type="text/javascript" src="js/underscore.1.8.3.js"></script>
	<script type="text/javascript" src="js/backbone.min.1.2.1.js"></script>
</head>
<body>
	<div class="container">
		<?php
		include("_navbar.php");
		?>
		<div class="mainpage">
			<div class="row">
				<div class="">
					<?php
					if(isset($_SESSION[SID]))print_r($callForUserInteraction);
					print_r($callForPosdtas);
					print_r($callForInfo);
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
