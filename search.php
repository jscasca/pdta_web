<?php
session_start();
require("php/utils/commons.php");

if(isset($_SESSION[SID])){}
if(!isset($_REQUEST['q'])) {
	header('Location: '.'index.php');
} 
$query = $_REQUEST['q'];
$limit = 10;
$call = authenticationlessCurlCall("GET", "api/search/anything", array('start'=>0, 'limit'=>10, 'query'=>$query));
//print_r($call);
if($call[HTTP_STATUS] != 200) {
	header('Location: '.'index.php');die();
}
$results = json_decode($call[RESPONSE], true);
$gResults = array();
if(isset($_SESSION[SID]) && sizeOf($results) < 5) {
	//Get google search
	$gQuery = "https://www.googleapis.com/books/v1/volumes?q=".urlencode($query)."&maxResults=10";
	$gCall = file_get_contents($gQuery);
	$gItems = json_decode($gCall, true);
	if(isset($gItems['items'])) {
		foreach($gItems['items'] as $gItem) {
			$gResults[] = $gItem;
		}
	}
	/*private function search($from) {
		$query = "https://www.googleapis.com/books/v1/volumes?q=inauthor:".$queryAuthor."&maxResults=".$maxResults."&startIndex=".$from;
		$get = file_get_contents($query);
		$results = json_decode($get, true);
		if(isset($results['items'])) {
			foreach($results['items']) {
				print_r($results);
			}
		} else {
			return
		}
	}*/
}

/*

if(!isset($_REQUEST['email'])) die("false");
$user = $_REQUEST['user'];
$email = $_REQUEST['email'];
$pass = $_REQUEST['pwd'];
$passConf = $_REQUEST['pwdConfirmation'];
$call = authenticationlessCurlCall("POST", "public/registration", array("username" => $user, "email" => $email, "password" => $pass));
//print_r($call);
if($call[HTTP_STATUS] == 200) {
	header("Location: ".$indexUrl);
} else if($call[HTTP_STATUS] == 409) {
	$exception = json_decode($call[RESPONSE], true);
	if(startsWith($exception["message"], "User")){
		header("Location: ".$registrationUrl."?e=user");
	} else {
		header("Location: ".$registrationUrl."?e=email");
	}
} else {
	header("Location: ".$internalErrorPage);
}
*/
//die();
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
				<div class="col-xs-8 col-md-6">
					<div class="list-group">
					<?php
					foreach($results as $result) {
						if(isset($result['name'])) {
							//The obj is an author
							echo "<a href='author.php?author=".$result['id']."' class='list-group-item'>".$result['name']."</a>";
						} else {
							//The obj is a book
							echo "<a href='book.php?book=".$result['id']."' class='list-group-item'>".$result['title']."</a>";
						}
					}
					?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-8 col-md-6">
					<div class="list-group">
					<?php
					if(sizeOf($gResults) > 0) {
						foreach($gResults as $result) {
							$author = isset($result['volumeInfo']['authors'][0])?$result['volumeInfo']['authors'][0]:'';
							$title = isset($result['volumeInfo']['title'])?$result['volumeInfo']['title']:'';
							$lang = isset($result['volumeInfo']['language'])?$result['volumeInfo']['language']:'';
							$icon = isset($result['volumeInfo']['imageLinks']['thumbnail'])?$result['volumeInfo']['imageLinks']['thumbnail']:'';
							$thumbnail = isset($result['volumeInfo']['imageLinks']['smallThumbnail'])?$result['volumeInfo']['imageLinks']['smallThumbnail']:'';
							echo "<form action='php/submit/googleBookRequest.php'>
								<input type='hidden' name='author' value='".$author."'>
								<input type='hidden' name='title' value='".$title."'>
								<input type='hidden' name='language' value='".$lang."'>
								<input type='hidden' name='icon' value='".$icon."'>
								<input type='hidden' name='thumbnail' value='".$thumbnail."'>
							";
							echo "<div class='gResult'>
								<img src='".$icon."' />".$title." (".$lang.") ".$author."<button>Submit</button>
							</div></form>";
							//print_r($result);
						}
					}
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
