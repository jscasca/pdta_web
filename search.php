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
	<ul id="resultList"></ul>
<?php include("_navbar.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/unslider.js"></script>
<script>
$(function() {
    getSearchResults(p_query);
});

function getSearchResults(query) {
	$.ajax({
		type:"GET",
		url: "php/ajax/search.php",
		data: "q=" + query,
		success: function(data) {
			//console.log(data);
			displayResults(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function displayResults(data) {
	//console.log(data);
	obj = jQuery.parseJSON(data);
	$.each(obj, function(index, book) {
		console.log(book);
		var li = $("<li>");
		var div = $("<div>",{});
		var img = $("<img src='"+ book['icon'] +"' />");
		var title = $("<a href='book.php?book="+book['id']+"'>" + book['title'] +"</a>");
		div.append(img).append(title);
		li.append(div);
		$('#resultList').append(li);
	});
	/*
	for(var book in obj) {
		var li = $("<li>");
		var div = $("<div>",{});
		var img = $("<img src='"+ book['icon'] +"' />");
		var title = $("<a href='book.php?book="+book['id']+"'>" + book['title'] +"</a>");
		div.append(img).append(title);
		li.append(div);
		$('#resultList').append(li);
	}*/
}
</script>
