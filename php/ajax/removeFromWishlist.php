<?php

session_start();
require("../utils/commons.php");

if(!isset($_SESSION[SID])) {
	//header('HTTP/1.1 401 Unauthorized', true, 401);
	http_response_code(401);//
	die();
}

if(!isset($_REQUEST['book'])) {
	http_response_code(400);//
	die();
}

$book = $_REQUEST['book'];


$token = $_SESSION[TOKEN];
//$getUser = tokenCurlCall($accessToken, "GET", ME);
$response = tokenCurlCall($token, "DELETE", "api/books/".$book."/wishlists");
$code = $response[HTTP_STATUS];
//Maybe this if is not necessary as the returned code will just go through
if($code != 200 && $code != 204) {
	http_response_code($code); die("BoS");
} else {
	header('HTTP/1.1 204 No response', true, 204);die();
}
header('HTTP/1.1 500 Internal Server E', true, 501);
?>
