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

if(!isset($_SESSION[SID])) {header('Location: '.$loginUrl);die();}

//TODO: put validations for particular cases
$author = isset($_REQUEST['author'])?$_REQUEST['author']:'';
$title = isset($_REQUEST['title'])?$_REQUEST['title']:'';
$lang = isset($_REQUEST['language'])?$_REQUEST['language']:'';
$gIcon = isset($_REQUEST['icon'])?$_REQUEST['icon']:'';
$gThumbnail = isset($_REQUEST['thumbnail'])?$_REQUEST['thumbnail']:'';

$img = uniqid('', true);

$ext = ".jpeg";
copy($gIcon, '../../img/books/'.$img.$ext);
copy($gThumbnail, '../../img/books/'.$img.'_thumb'.$ext);

$icon = "localhost".'/bootstrapPd/img/books/'.$img.$ext;
$thumbnail = "localhost".'/bootstrapPd/img/books/'.$img.'_thumb'.$ext;

//Store icon and thumbnail

$request['author'] = $author;
$request['authorId'] = -1;
$request['workId'] = -1;
$request['title'] = $title;
$request['language'] = $lang;
$request['icon'] = $icon;
$request['thumbnail'] = $thumbnail;

//print_r($request);

$token = $_SESSION[TOKEN];
//$getUser = tokenCurlCall($accessToken, "GET", ME);
$response = tokenCurlCall($token, "POST", "api/books/requests", $request);
$code = $response[HTTP_STATUS];
if($code != 200) {
	//print_r($response);
	if($code == 500 || $code == 404) {
		header('Location: '.$internalErrorPage); die();
	} else {
		header('Location: '.$notFoundUrl); die();
	}
} else {
	//$response[RESPONSE] should be a book
	$book = json_decode($response[RESPONSE], true);
	header('Location: '.$bookUrl.'?book='.$book['id']);die();
}
header('Location: '. $successUrl);

?>
