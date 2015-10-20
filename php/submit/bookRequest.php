<?php

session_start();
require("../utils/commons.php");

$loginUrl = BASE_DIR."login.php";
$notFoundUrl = BASE_DIR."404.html";
$internalErrorPage = BASE_DIR."500.html";
$indexUrl = BASE_DIR."index.php";
$successUrl = BASE_DIR."successful.html";
$bookUrl = BASE_DIR."book.php";
$requestUrl = BASE_DIR."new.php";

//TODO: put validations for particular cases
$author = isset($_REQUEST['author'])?$_REQUEST['author']:'';
$authorId = isset($_REQUEST['authorId'])?$_REQUEST['authorId']:'';
if($author == '' && ($authorId == '' || $authorId == '-1')) {
	//Go back to book request
	header('Location: '.$requestUrl.'?e=401&field=author');die();
}
$workId = isset($_REQUEST['workId'])?$_REQUEST['workId']:'';
$title = isset($_REQUEST['title'])?$_REQUEST['title']:'';
if($title == '') {
	//
	header('Location: '.$requestUrl.'?e=401&field=title');die();
}
$lang = isset($_REQUEST['language'])?$_REQUEST['language']:'';

$request['author'] = $author;
$request['authorId'] = $authorId;
$request['workId'] = $workId;
$request['title'] = $title;
$request['language'] = $lang;

$token = $_SESSION[TOKEN];
//$getUser = tokenCurlCall($accessToken, "GET", ME);
$response = tokenCurlCall($token, "POST", "api/books/requests", $request);
$code = $response[HTTP_STATUS];
if($code != 200) {
	print_r($response);
	if($code == 500 || $code == 404) {
		//header('Location: '.$internalErrorPage); die();
	} else {
		//header('Location: '.$notFoundUrl); die();
	}
} else {
	//$response[RESPONSE] should be a book
	$book = json_decode($response[RESPONSE], true);
	header('Location: '.$bookUrl.'?id='.$book['id']);die();
}
//header('Location: '. $successUrl);

?>
