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
<section>
	<div class="container-fluid" style="padding-left:0;">
		<div class="row margin-of-top-bar">
			<div class="col-md-12 content-container">
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
				    <div class="modal-content">
				    	<input type="hidden" name="product-fund-id" id="product-fund-id" value="">
				    	<input type="hidden" name="registry-id" id="registry-id" value="<?php echo $parameters[2]; ?>">
				        <div class="modal-header">
				            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				            <h3 class="modal-title"><span id="modal-title-placeholder">Sellar este libro</span></h3>
				        </div>
				        <div class="modal-body">
					        <h2>1.-Califica el libro</h2>
					        <div class="ratingContainer">
						         <span class="starRating">
								  <input id="rating5" type="radio" name="rating" value="5">
								  <label for="rating5">5</label>
								  <input id="rating4" type="radio" name="rating" value="4">
								  <label for="rating4">4</label>
								  <input id="rating3" type="radio" name="rating" value="3">
								  <label for="rating3">3</label>
								  <input id="rating2" type="radio" name="rating" value="2">
								  <label for="rating2">2</label>
								  <input id="rating1" type="radio" name="rating" value="1">
								  <label for="rating1">1</label>
								</span>
							</div>
							<h2>2.-Deja una posdta</h2>
							<div class="posdtaBoxContainer">
								<textarea id="posdtaBody" class="posdtaBox"></textarea>
							</div>
				        </div>
				        <div class="modal-footer">
				            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				            <button type="button" id="btn-to-review" class="btn btn-success">Sellar</button>
				        </div>
				    </div>
				</div>
				</div>
				<div class="book-card clearfix">
					<div class="col-md-3 book-cover-container">
						<img id="book_icon" class="book-cover">
					</div>
					<div class="col-md-9">
						<div class="col-md-12"><div class="book-title"><h1 id="book_title"></h1></div></div>
						<div class="col-md-12"><div class="book-author"><h2 id="book_author"></h2></div></div>
						<!--<div class="col-md-12"><div class="book-publisher">Random House</div></div>
						<div class="col-md-12"><div class="book-year">2012</div></div>-->
						<div class="col-md-12"><div class="book-rating" id="book_rating">0.0/5.0</div></div>
						<div class="col-md-12 actions-container">
							<div class="col-md-3" id="startBook"></div>
							<div class="col-md-3" id="finishBook"></div>
							<div class="col-md-3" id="favoriteBook"></div>
							<div class="col-md-3" id="wishlistBook"></div>
						</div>
					</div>
					<div class="col-md-12 module">
										<div class="col-md-12 dividing-title">
						Mas libros de este autor
					</div>
					<div class="col-md-12">
						<div class="col-md-4 related-container">
							<div class="book-sm">
		        				<div class="book-cover"><img src="img/sj.jpg"></div>
		        				<div class="book-title">Steve Jobs La Biogra&iacute;a</div>
		        				<div class="book-author">Issac Walterson</div>
		        				<div class="book-rating thumb">4.5/5.0</div>
							</div>
						</div>
						<div class="col-md-4 related-container">
							<div class="book-sm">
		        				<div class="book-cover"><img src="img/sj.jpg"></div>
		        				<div class="book-title">Steve Jobs La Biogra&iacute;a</div>
		        				<div class="book-author">Issac Walterson</div>
		        				<div class="book-rating thumb">4.5/5.0</div>
							</div>
						</div>
						<div class="col-md-4 related-container">
							<div class="book-sm">
		        				<div class="book-cover"><img src="img/sj.jpg"></div>
		        				<div class="book-title">Steve Jobs La Biogra&iacute;a</div>
		        				<div class="book-author">Issac Walterson</div>
		        				<div class="book-rating thumb">4.5/5.0</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 dividing-title">
						Opiniones sobre este libro
					</div>
					<div class="col-md-12 comment">
						<div class="col-md-12 comment-text">
							<div class="col-md-12">
								<div class="comment-name">Erik Sthal</div><div class="comment-rating">4.5/5.0</div>
							</div>				
							<div class="col-md-12 comment-content">Me gusto mucho el libro, creo que está muy bien entender ciertos asuntos que se manejan en el. Ayuda a aclarar el panorama y te hace sentir muy bien cuando terminas de leerlo, me gusta mucho, quiero o</div>
							<div class="col-md-12 comment-actions">
								<div>Seguir</div><div>Reportar</div>
							</div>
						</div>
					</div>
						<div class="col-md-12 comment">
							<div class="col-md-12 comment-text">
								<div class="col-md-12">
									<div class="comment-name">Erik Sthal</div><div class="comment-rating">4.5/5.0</div>
								</div>				
								<div class="col-md-12 comment-content">Me gusto mucho el libro, creo que está muy bien entender ciertos asuntos que se manejan en el. Ayuda a aclarar el panorama y te hace sentir muy bien cuando terminas de leerlo, me gusta mucho, quiero o</div>
								<div class="col-md-12 comment-actions">
									<div>Seguir</div><div>Reportar</div>
								</div>
							</div>
					</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/unslider.js"></script>
<script src="js/commons.js"></script>
<script>



$(function() {
    $('.banner').unslider();
    getBookInfo(p_book);
    getBookPosdtas(p_book);
    if(isLogged) {
		getBookInteractions(p_book);
	}
});

$("#finishBook").click(function(){
	$("#myModal").modal('show');
});
$("#btn-to-review").click(function(){
	var book = p_book;
	var posdta = $("#posdtaBody").val();
	var rating = $("input[name=rating]:checked").val();
	if(rating === undefined) {return false;}
	if(posdta == "") {return false;}
	postPosdta(book, posdta, rating);
});

function postPosdta(book, posdta, rating) {
	$.ajax({
		type:"GET",
		url: "php/ajax/postPosdta.php",
		data: {"book": book, "rating": rating, "posdta": posdta},
		success: function(data) {
			//Do some fancy stuff
			displayBookData(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function getBookInfo(book) {
	$.ajax({
		type:"GET",
		url: "php/ajax/getBookInfo.php",
		data: "book="+book,
		success: function(data) {
			displayBookData(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function getBookInteractions(book) {
	var bookId = book;
	$.ajax({
		type:"GET",
		url: "php/ajax/getInteractionsWithBook.php",
		data: "book="+book,
		success: function(data) {
			setBookActions(data, bookId);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function getBookPosdtas(book) {
	$.ajax({
		type:"GET",
		url: "php/ajax/getBookPosdtas.php",
		data: "book="+book,
		success: function(data) {
			console.log(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function setBookActions(data, bookId) {
	console.log(bookId);
	var obj = jQuery.parseJSON(data);
	var isReading = obj['reading'];
	var isFavorited = obj['favorite'];
	var isWishlisted = obj['wishlisted'];
	var hasPosdta = obj['posdta'];
	if(isWishlisted) {
		$('#wishlistBook').html('<button class="bookActionButton" onclick="unwishlistBook('+bookId+');" ><img src="img/wishlisted.png"></button><br>Quiero leer');
	} else {
		$('#wishlistBook').html('<button class="bookActionButton" onclick="wishlistBook('+bookId+');" ><img src="img/wishlist.png"></button><br>Quiero leer');
	}
	if(isFavorited) {
		$('#favoriteBook').html('<button class="bookActionButton" onclick="unfavoriteBook('+bookId+');" ><img src="img/favorited.png"></button><br>Favorito');
	} else {
		$('#favoriteBook').html('<button class="bookActionButton" onclick="favoriteBook('+bookId+');" ><img src="img/favorite.png"></button><br>Favorito');
		//<button id="startBook" class="bookActionButton"><img src="img/marcar.png"></button><br>Marcar
	}
	if(isReading) {
		$('#wishlistBook').html('<button class="bookActionButton" ><img src="img/wishlist_disabled.png"></button><br>Quiero leer');
		$('#startBook').html('<button class="bookActionButton"><img src="img/marcar_disabled.png"></button><br>Marcado');
	} else {
		$('#startBook').html('<button class="bookActionButton" onclick="startBook('+bookId+');" ><img src="img/marcar.png"></button><br>Marcar');
	}
	if(hasPosdta) {
		if(isReading) {
			$('#finishBook').html('<button class="bookActionButton" onclick="finishBook('+bookId+');" ><img src="img/sello.png"></button><br>Sellar');
		} else {
			$('#finishBook').html('<button class="bookActionButton" ><img src="img/posdted.png"></button><br>Sellar');
		}
	} else {
		$('#finishBook').html('<button class="bookActionButton" onclick="showPosdtaModal();" ><img src="img/sello.png"></button><br>Sellar');
	}
}

function showPosdtaModal() {
	$("#myModal").modal('show');
}

function startBook(bookId) {
	$.ajax({
		type:"GET",
		url: "php/ajax/postStartReading.php",
		data: "book="+bookId,
		success: function(data) {
			$('#wishlistBook').html('<button class="bookActionButton" ><img src="img/wishlist_disabled.png"></button><br>Quiero leer');
			$('#startBook').html('<button class="bookActionButton"><img src="img/marcar_disabled.png"></button><br>Marcado');
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function finishBook(bookId) {
	console.log("terminar de leer");
}

function wishlistBook(bookId) {
	$.ajax({
		type:"GET",
		url: "php/ajax/postAddToWishlist.php",
		data: "book="+bookId,
		success: function(data) {
			$('#wishlistBook').html('<button class="bookActionButton" onclick="unwishlistBook('+bookId+');" ><img src="img/wishlisted.png"></button><br>Quiero leer');
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function unwishlistBook(bookId) {
	$.ajax({
		type:"GET",
		url: "php/ajax/deleteFromWishlist.php",
		data: "book="+bookId,
		success: function(data) {
			$('#wishlistBook').html('<button class="bookActionButton" onclick="wishlistBook('+bookId+');" ><img src="img/wishlist.png"></button><br>Quiero leer');
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function favoriteBook(bookId) {
	$.ajax({
		type:"GET",
		url: "php/ajax/postAddToFavorites.php",
		data: "book="+bookId,
		success: function(data) {
			$('#favoriteBook').html('<button class="bookActionButton" onclick="unfavoriteBook('+bookId+');" ><img src="img/favorited.png"></button><br>Favorito');
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function unfavoriteBook(bookId) {
	$.ajax({
		type:"GET",
		url: "php/ajax/deleteFromFavorites.php",
		data: "book="+bookId,
		success: function(data) {
			$('#favoriteBook').html('<button class="bookActionButton" onclick="favoriteBook('+bookId+');" ><img src="img/favorite.png"></button><br>Favorito');
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function displayBookData(data) {
	var obj = jQuery.parseJSON(data);
	var book = obj["book"];
	var ratings = book["rating"];
	var author = book["author"];
	console.log(book);
	$("#registry-id").val(book['id']);
	$("#book_title").html(book['title'] + " (" + book['language']['code'] + ")");
	$("#book_icon").attr('src', book['icon']);
	$("#book_rating").html(ratings["rating"].toFixed(1));
	$("#book_author").html("<a href='author.php?author=" + author['id'] + "'>" + author['name'] + "</a>");
	
}
</script>
<script>
</body>
