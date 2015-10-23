<?php
/**
 * book.php
 * 
 * 
 */
session_start();
require("php/utils/commons.php");

if(isset($_SESSION[SID])){}
$bookId = -1;
if(!isset($_REQUEST['book'])) {
	die();
}
$bookId = $_REQUEST['book'];

if(isset($_SESSION[SID])){
	$token = $_SESSION[TOKEN];
	$callForUserInteraction = tokenCurlCall($token, "GET", "api/books/".$bookId."/interactions");
	
	//Get friends reading this
	
	//get friends who read it
}

$callForPosdtas = authenticationlessCurlCall("GET", "api/books/".$bookId."/posdtas", array('start'=>0, 'limit'=>10));

$callForInfo = authenticationlessCurlCall("GET", "api/books/".$bookId."/info");
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
	<script type="text/javascript">
	function wishlist(book) {
		alert("wishlist");
		$.ajax({
			url: 'php/ajax/addToWishlist.php',
			data: {book: book},
			success: function() {
				//Change controls
			},
			error: function(data) {
				//TODO Check error
				console.log(data);
			}
		});
	}
	
	function unwishlist(book) {
		alert("unwishlist");
		$.ajax({
			url: 'php/ajax/removeFromWishlist.php',
			data: {book: book},
			success: function() {
				//Change controls
			},
			error: function(data) {
				//TODO Check error
				console.log(data);
			}
		});
	}
	
	function favorite() {
		alert("favroiting");
	}
	
	function unfavorite() {
		alert("unfavoriting");
	}
	
	function startReading() {
		alert("started reading");
	}
	
	function stopReading() {
		alert("stop reading");
	}
	
	function posdta() {
		alert("posdtating");
	}
	</script>
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
					if(isset($_SESSION[SID])){
						$interaction = json_decode($callForUserInteraction[RESPONSE], true);
						print_r($interaction);
						var_dump($interaction);
						if($interaction['wishlisted'] == false){
							echo "<button type='button' onclick='wishlist(".$bookId.");'>Add to wishlist</button>";
						} else {
							echo "<button type='button' onclick='unwishlist(".$bookId.");'>Remove from wishlist</button>";
						}
						if($interaction['favorite'] == false){
							echo "<button type='button' onclick='favorite(".$bookId.");'>Favortie</button>";
						} else {
							echo "<button type='button' onclick='unfavorite(".$bookId.");'>Unfavorite</button>";
						}
						if($interaction['reading'] == false){
							echo "<button type='button' onclick='startReading(".$bookId.");'>Start reading</button>";
						} else {
							if($interaction['posdta'] == false) {
								echo "<button type='button' onclick='posdta();'>Posdta</button>";
							} else {
								echo "<button type='button' onclick='stopReading(".$bookId.");'>Stop Reading</button>";
							}
							
						}
					}
					print_r($callForPosdtas);
					print_r($callForInfo);
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
