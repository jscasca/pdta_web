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
	<ul id="resultRequests"></ul>
<?php include("_navbar.php");?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="js/unslider.js"></script>
<script>
$(function() {
    getSearchResults(p_query);
    getGglResults(p_query);
});

function getGglResults(query) {
	$.ajax({
		type:"GET",
		url: "php/ajax/gsearch.php",
		data: "q=" + query,
		success: function(data) {
			displayGglResults(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function getSearchResults(query) {
	$.ajax({
		type:"GET",
		url: "php/ajax/search.php",
		data: "q=" + query,
		success: function(data) {
			displayResults(data);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			console.log(xhr.status);
			console.log(thrownError);
		}
	});
}

function displayGglResults(data) {
	obj = jQuery.parseJSON(data);
	$.each(obj, function(index, result) {
		console.log(result);
		var requestForm = $("<form action='php/submit/googleBookRequest.php'></form>");
		requestForm.append("<input type='hidden' name='author' value='"+result['author']+"'>");
		requestForm.append("<input type='hidden' name='title' value='"+result['title']+"'>");
		requestForm.append("<input type='hidden' name='language' value='"+result['lang']+"'>");
		requestForm.append("<input type='hidden' name='icon' value='"+result['icon']+"'>");
		requestForm.append("<input type='hidden' name='thumbnail' value='"+result['thumbnail']+"'>");
		
		var div = $('<div>',{});
		var img = $("<img src='"+ result['icon'] +"' />");
		var span = $("<span class='gglResult'>"+result['title']+"("+result['lang']+") de " + result['author'] + "</span>");
		var submit = $("<button>Agregar</button>");
		div.append(img).append(span).append(submit);
		requestForm.append(div);
		$('#resultRequests').append(requestForm);
	});
}

function displayResults(data) {
	obj = jQuery.parseJSON(data);
	$.each(obj, function(index, result) {
		var img = "";
		var linkSpan = "";
		if(result['icon'] == null) result['icon'] = 'http://posdta.com/web/img/default.png';
		if(result['className']=='Author') {
			img = $("<img height='40' src='"+ result['icon'] +"' />");
			title = $("<a href='author.php?author="+result['id']+"'>" + result['name'] +"</a>");
		} else {
			
			img = $("<img height='40' src='"+ result['icon'] +"' />");
			title = $("<a href='book.php?book="+result['id']+"'>" + result['title'] +"</a> de <span>" + result['authorName'] +"</span>");
		}
		var li = $("<li>");
		var div = $("<div>",{});
		div.append(img).append(title);
		li.append(div);
		$('#resultList').append(li);
	});
}
</script>
