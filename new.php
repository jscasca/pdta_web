<?php
session_start();
require("php/utils/commons.php");

$indexUrl = "index.php";

$query = isset($_REQUEST['q']) ? $_REQUEST['q'] : '';

$author = isset($_REQUEST['a']) ? $_REQUEST['a'] : '-1';
$work = isset($_REQUEST['w']) ? $_REQUEST['w'] : '-1';

//if(!isset($_SESSION[SID])){header('Location: '.$indexUrl);die();}
?>
<!doctype HTML>
<html>
<head>
	<title>Posdta. Encuentra tu libro</title>
	
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
				<div class="col-xs-8 col-md-4 col-md-offset-2 formContainer">
					<div class="">
						<form role="form" action="php/submit/bookRequest.php" method="POST"  class="containedForm">
							<div class="formInstructions">
								<label for="instructions">Solicita que un nuevo libro sea agregado.</label>
								<p id="instructions">Si no encontraste el libro que buscabas solicitalo para que sea agregado a nuestra base de datos.</p>
							</div>
							<div class="form-group">
								<label for="author">Autor:</label>
								<input type="text" class="form-control" id="author" name="author" placeholder="Autor" />
								<input type="hidden" id="authorId" name="authorId" value="<?php echo $author;?>">
							</div>
							<div class="form-group">
								<input type="hidden" id="workId" name="workId" value="<?php echo $work;?>">
								<label for="title">T&iacute;tulo del libro:</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="Titulo" value="<?php echo $query;?>" />
							</div>
							<div class="form-group">
								<label for="">Idioma:</label>
								<select class="form-control" id="language" name="language">
									<option value="ES">Español</option>
									<option value="FR">Frances</option>
									<option value="EN">Ingles</option>
									<option value="JA">Japones</option>
								</select>
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-lg btn-primary center-block">Solicita tu libro!</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-xs-4 col-md-4 col-md-offset-2">
					<img src="img/default.png" class="img-responsive"/>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
