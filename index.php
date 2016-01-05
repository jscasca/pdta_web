<?php
session_start();require("php/commons.php");
?>
<!doctype HTML>
<head>
<meta charset="UTF-8">
<meta description="Awesome stories about a dude">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta property="og:title" content="Posdta" />
<meta property="og:description" content="Encuentra tu proximo libro favorito" />
<meta property="og:url" content="http://www.posdta.com" />
<meta property="og:image" content="" />
<link rel="shortcut icon" href="img/favicon.png"> 
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<title>Posdta- Sigue Leyendo</title>
</head>
<body>
<?php include("_navbar.php");?>
<section id="welcome-banner">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-9 main-background">
			<div class="welcome-text">
				<div>¿Qu&eacute; sigue?</div>
				<a class="btn btn-danger" href="#" role="button">Obtener Recomendacion »</a>
			</div>
			</div>
			<div class="col-md-3 lateral-one">
					<div class="col-md-12 sub-lateral one">
							<div class="banner">

							    <ul>
							        <li>
							        	<div class="slider-book-background">
							        		<div class="slider-book-overlay">
							        			<div class="book-sm">
							        				<div class="book-cover"><img src="img/sj.jpg"></div>
							        				<div class="book-title">Steve Jobs La Biogra&iacute;a</div>
							        				<div class="book-author">Issac Walterson</div>
							        				<div class="book-rating">4.5/5.0</div>
							        			</div>
							        		</div>
							        	</div>
							        </li>
							        <li>
							        	<div class="slider-book-background">
							        		<div class="slider-book-overlay">
							        			<div class="book-sm">
							        				<div class="book-cover"><img src="img/sj.jpg"></div>
							        				<div class="book-title">Steve Jobs La Biogra&iacute;a</div>
							        				<div class="book-author">Issac Walterson</div>
							        				<div class="book-rating">4.5/5.0</div>
							        			</div>
							        		</div>
							        	</div>
							        </li>
							        <li>
							        	<div class="slider-book-background">
							        		<div class="slider-book-overlay">
							        			<div class="book-sm">
							        				<div class="book-cover"><img src="img/sj.jpg"></div>
							        				<div class="book-title">Steve Jobs La Biogra&iacute;a</div>
							        				<div class="book-author">Issac Walterson</div>
							        				<div class="book-rating">4.5/5.0</div>
							        			</div>
							        		</div>
							        	</div>
							        </li>
							    </ul>
							</div>
					</div>
					<div class="col-md-12 sub-lateral two">
						<div class="col-md-12 title">Los mas leidos</div>
						<ul class="featured" id="most-read">
							<!--<li><img src="img/sj.jpg">La biograf&iacute;a de Steve Jobs</li>
							<li><img src="img/sj.jpg">La biograf&iacute;a de Steve Jobs</li>
							<li><img src="img/sj.jpg">La biograf&iacute;a de Steve Jobs</li>
							<li><img src="img/sj.jpg">La biograf&iacute;a de Steve Jobs</li>-->
						</ul>
					</div>
			</div>
		</div>
	</div>
</section>
<section id="additional-info">
	<div class="container-fluid">
      <!-- Example row of columns -->
      <div class="row">
       <div class="col-md-5 first info">
          <h2>¿Qu&eacute; es Posdta?</h2>
          <p>Posdta es un sistema de recomendaciones de libros, al abrir una cuenta con nosotros, llevaremos el registro de todos los libros que leas y podremos recomendarte nuevos t&iacute;tulos, cuidando siempre que sean de tu agrado, mientras m&aacute;s leas, mejores recomendaciones podemos hacerte. </p>
          <p><a class="btn btn-default" href="#" role="button">Inicia Sesi&oacute;n</a> o <a class="btn btn-default" href="#" role="button">Abre una Cuenta</a></p>
       </div>
        <div class="col-md-4 third info">
          <h2>Blog</h2>
          <p>Encuentra reseñas, opiniones y recomendaciones de nuestros lectores mas queridos.</p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div>
       <div class="col-md-3 second info">
          <h2>¿No encuentras un libro?</h2>
          <p>Encuentra reseñas, opiniones y recomendaciones de nuestros lectores mas queridos.</p>
          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
        </div>
      </div>
      <footer>
        © Posdta 2015<div class="footer-links"><a href="#">Contacto</a><a href="">Colabora</a></div>
      </footer>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/unslider.js"></script>
<script>
$(function() {
    //$('.banner').unslider();
    getMostRead();
    getTrending();
});

function getMostRead() {
	$.ajax({
		type:"GET",
		url: "php/ajax/getMostRead.php",
		success: function(data) {
			displayMostRead(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function displayMostRead(data) {
	var books = jQuery.parseJSON(data);
	jQuery.each(books, function(index, book) {
		//<li><img src="img/sj.jpg">La biograf&iacute;a de Steve Jobs</li>
		var il = $('<il></il>', {bookId: book['id'], class: 'booklisted'});
		var img = $('<img/>', {src:book['icon']});
		console.log(book);
		console.log(img);
		il.append(img).append("<a href='book.php?book="+book['id']+"' >"+book['title'] + "</a>");
		console.log(il);
		console.log($('#most-read'));
		$('#most-read').append(il);
	});
}

function getTrending() {
	$.ajax({
		type:"GET",
		url: "php/ajax/getMostRead.php",
		success: function(data) {
			displayTrending(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function displayTrending(data) {
	$('.banner').unslider();
}
</script>
</body>
