<?php
/**
 * author.php
 * 
 * 
 */
session_start();
require("php/utils/commons.php");

if(isset($_SESSION[SID])){}
$authorId = -1;
if(!isset($_REQUEST['author'])) {
	die();
}
$authorId = $_REQUEST['author'];

//$callForPosdtas = authenticationlessCurlCall("GET", "api/authors/".$authorId."/posdtas", array('start'=>0, 'limit'=>10));

//$callForInfo = authenticationlessCurlCall("GET", "api/authors/".$authorId."/info");
$callForBooks = authenticationlessCurlCall("GET", "api/authors/".$authorId."/books");
if($callForBooks[HTTP_STATUS] != 200) {
	//DO SOMETHING IF IT BREAKS
}
$authorBooks = json_decode($callForBooks[RESPONSE], true);

$authorInfo = "";
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
				
			</div>
			<div class="row">
				<div class="">
					<ul>
					<?php
					foreach($authorBooks as $book) {
						echo "<li><div class='authorBook'>
							<a href='book.php?book=".$book['id']."'>
							<img src='".$book['thumbnail']."' />".$book['title']."
							</a>
							</div></li>";
					}
					print_r($authorBooks);
					?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
