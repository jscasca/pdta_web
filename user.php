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
				<div class="book-card clearfix">
					<div class="col-md-3 book-cover-container">
						<img id="user_icon" class="book-cover">
					</div>
					<div class="col-md-9">
						<div class="col-md-12"><div class="book-title"><h1 id="user_display"></h1></div></div>
						<div class="col-md-12"><div class="book-author"><h2 id="user_name"></h2></div></div>
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
					<div class="col-md-12" id="same-author">
						
						
						<!--<div class="col-md-4 related-container">
							<div class="book-sm">
		        				<div class="book-cover"><img src="img/sj.jpg"></div>
		        				<div class="book-title">Steve Jobs La Biogra&iacute;a</div>
		        				<div class="book-author">Issac Walterson</div>
		        				<div class="book-rating thumb">4.5/5.0</div>
							</div>
						</div>-->
					</div>
					<div class="col-md-12 dividing-title">
						Opiniones sobre este libro
					</div>
					<div class="" id="posdtas"></div>
					
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
    getUserInfo(p_user);
    console.log(isLogged);
    if(isLogged) {
		//getUserInteractions(p_user);
	}
    /*getBookInfo(p_user);
    getBookPosdtas(p_book);
    getBooksFromSameAuthor(p_book);
    if(isLogged) {
		getBookInteractions(p_book);
	}*/
});

function getUserInfo(user) {
	$.ajax({
		type:"GET",
		url: "php/ajax/getUserInfo.php",
		data: {"user": user},
		success: function(data) {
			//Do some fancy stuff
			displayUserInfo(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function displayUserInfo(data) {
	console.log(data);
	var userInfo = jQuery.parseJSON(data);
	var user = userInfo['user'];
	$("#user_icon").attr('src', user['icon']);
	$("#user_display").html(user['displayName']);
	$("#user_name").html(user['userName']);
	/*
	var obj = jQuery.parseJSON(data);
	var book = obj["book"];
	var ratings = book["rating"];
	var author = book["author"];
	console.log(book);
	$("#registry-id").val(book['id']);
	$("#book_title").html(book['title'] + " (" + book['language']['code'] + ")");
	$("#book_icon").attr('src', book['icon']);
	$("#book_rating").html(ratings["rating"].toFixed(1)+"/5.0");
	$("#book_author").html("<a href='author.php?author=" + author['id'] + "'>" + author['name'] + "</a>");
	*/
}

function getBooksFromSameAuthor(book) {
	$.ajax({
		type:"GET",
		url: "php/ajax/getBooksFromSameAuthor.php",
		data: {"book": book},
		success: function(data) {
			//Do some fancy stuff
			displayBooksFromSameAuthor(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function displayBooksFromSameAuthor(data) {
	var books = jQuery.parseJSON(data);
	jQuery.each(books, function(index, book) {
		//<li><img src="img/sj.jpg">La biograf&iacute;a de Steve Jobs</li>
		var div = $('<div></div>', {bookId: book['id'], class: 'col-md-4 related-container'});
		var divSm = $('<div></div>', {class: 'book-sm'});
		divSm.append('<div class="book-cover"><img src="'+book['thumbnail']+'"></div>');
		divSm.append('<div class="book-title"><a href="book.php?book='+book['id']+'" >'+book['title']+'</a></div>');
		var rating = book['rating'];
		if(rating == null) rating = 0;
		else rating = book['rating']['rating'];
		divSm.append('<div class="book-rating thumb">'+rating.toFixed(1)+'/5.0</div>');
		div.append(divSm);
		$('#same-author').append(div);
	});
}

function postPosdta(book, posdta, rating) {
	$.ajax({
		type:"GET",
		url: "php/ajax/postPosdta.php",
		data: {"book": book, "rating": rating, "posdta": posdta},
		success: function(data) {
			//Do some fancy stuff
			donePosdating(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function donePosdating(data) {
	$("#myModal").modal('hide');
	//Update stuff;
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
			displayPosdtas(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function displayPosdtas(data) {
	var posdtas = jQuery.parseJSON(data);
	if(posdtas.length == 0) {
		//Set to no posdtas
	} else {
		jQuery.each(posdtas, function(index, obj) {
			console.log(obj);
			var posdtaHolder = $("<div class='col-md-12 comment'></div>");
			var posdtaText = $("<div class='col-md-12 comment-text'></div>");
			var posdtaHeader = $("<div class='col-md-12'></div>");
			var posdtaUser = $("<div class='comment-name'><a href='user.php?user="+obj['user']['id']+"'>"+obj['user']['userName']+"</a></div>");
			var posdtaRating = $("<div class='comment-rating'>"+obj['rating']+".0/5.0</div>");
			var posdtaContent = $("<div class='col-md-12 comment-content'>"+obj['posdta']+"</div>");
			var posdtaActions = $("<div class='col-md-12 comment-actions'><div>Seguir</div><div>Reportar</div></div>");
			posdtaHeader.append(posdtaUser).append(posdtaRating);
			posdtaText.append(posdtaHeader).append(posdtaContent).append(posdtaActions);
			posdtaHolder.append(posdtaText);
			//posdtaHolder.insertAfter('#posdtas');
			$('#posdtas').after(posdtaHolder);
			//print each posdta
			/*
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
			*/
		});
	}
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
	$.ajax({
		type:"GET",
		url: "php/ajax/deleteFromReadings.php",
		data: "book="+bookId,
		success: function(data) {
			$('#startBook').html('<button class="bookActionButton"><img src="img/marcar.png"></button><br>Marcado');
			$('#finishBook').html('<button class="bookActionButton" ><img src="img/posdted.png"></button><br>Sellar');
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
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
	$("#book_rating").html(ratings["rating"].toFixed(1)+"/5.0");
	$("#book_author").html("<a href='author.php?author=" + author['id'] + "'>" + author['name'] + "</a>");
	
}
</script>
<script>
</body>
