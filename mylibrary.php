<?php
/**
 * book.php
 * 
 * 
 */
session_start();
require("php/utils/commons.php");

if(!isset($_SESSION[SID])){
	header("Location: ".$internalErrorPage);
	die();
}

$me = $_SESSION[SID];
$token = $_SESSION[TOKEN];

$callForLibrary = tokenCurlCall($token, "GET", "api/me/libraryView");
$library = json_decode($callForLibrary[RESPONSE], true);

$reading = $library['reading'];
$wishlisted = $library['wishlisted'];
$favorited = $library['favorited'];
$posdtas = $library['posdtas'];

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
	</script>
</head>
<body>
	<div class="container">
		<?php
		include("_navbar.php");
		?>
		<div class="mainpage">
			<div class="row">
				<div class="col-md-12 content-container">
					<div class="col-md-12 col-xs-12 library-header"></div>
					<div class="col-md-12 col-xs-12 library-divider">Leyendo actualmente</div>
					<div class="col-md-12 col-xs-12 library-shelf">
					<?php
					if(sizeOf($reading) > 0) {
						echo "<div class='col-md-12 col-xs-12 book-shelf'>";
						echo "<ul class='list-inline'>";
						foreach($reading as $book) {
							echo "<li><div class='shelf-book'><img src='".$book['icon']."' />".$book['title']."</div></li>";
						}
						echo "</ul>";
						echo "</div>";
					} else {
						echo "Por el momento no esta leyendo nada";
					}
					?>
					</div>
					<div class="col-md-12 col-xs-12 library-divider">En tu lista de siguientes lecturas</div>
					<?php
					if(sizeOf($wishlisted) > 0) {
						echo "<div class='col-md-12 col-xs-12 book-shelf'>";
						echo "<ul class='list-inline'>";
						foreach($wishlisted as $book) {
							echo "<li><div class='shelf-book'><img src='".$book['icon']."' />".$book['title']."</div></li>";
						}
						echo "</ul>";
						echo "</div>";
					} else {
						echo "Por el momento no esta leyendo nada";
					}
					?>
					<div class="col-md-12 col-xs-12 library-divider">Favoritos</div>
					<?php
					if(sizeOf($favorited) > 0) {
						echo "<div class='col-md-12 col-xs-12 book-shelf'>";
						echo "<ul class='list-inline'>";
						foreach($favorited as $book) {
							echo "<li><div class='shelf-book'><img src='".$book['icon']."' />".$book['title']."</div></li>";
						}
						echo "</ul>";
						echo "</div>";
					} else {
						echo "Por el momento no hay ningun favorito";
					}
					?>
					<div class="col-md-12 col-xs-12 library-divider">Leidos</div>
					<?php
					if(sizeOf($posdtas) > 0) {
						echo "<div class='col-md-12 col-xs-12 book-shelf'>";
						echo "<ul class='list-inline'>";
						foreach($posdtas as $posdta) {
							$book = $posdta['book'];
							echo "<li><div class='shelf-book'><img src='".$book['icon']."' />".$book['title']."</div></li>";
						}
						echo "</ul>";
						echo "</div>";
					} else {
						echo "No hay ninguna Posdta";
					}
					?>
				</div>
			</div>
			
			<div class="row">
				<div class="">
					<?php
					//print_r($library);
					?>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
