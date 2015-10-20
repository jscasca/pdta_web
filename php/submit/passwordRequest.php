<?php

session_start();
require("../utils/commons.php");

$loginUrl = BASE_DIR."login.php";
$notFoundUrl = BASE_DIR."404.html";
$internalErrorPage = BASE_DIR."500.html";
$indexUrl = BASE_DIR."index.php";
$successUrl = BASE_DIR."successful.html";



$user = $_REQUEST['user'];

$response = authenticationlessCurlCall("POST", "public/passwordRequest", $user);
if($response[HTTP_STATUS] != 204) {
	print_r($response);die();
}
header('Location: '. $successUrl);

/**
function getToken($clientId, $clientSecret, $username, $pass) {
	if(!preg_match(USERNAME_REGEX, $username) && !preg_match(EMAIL_REGEX, $username)) throw new Exception("Invalid username", 1);
	$tokenParams = "?grant_type=password&username=" . $username . "&password=" . urlencode($pass);
	$response = basicCurlCall($clientId, $clientSecret, "POST", TOKEN_URL . $tokenParams);
	if($response[HTTP_STATUS] != 200) {
		//print_r($response);die("DEAD: On get token");
		throw new Exception("Token request failed", $response[HTTP_STATUS]);
	}
	return $response;
} 
*/
/*
try {
	logIn($user, $pass);
	header('Location: '.$indexUrl);
} catch(Exception $e) {
	$code = $e->getCode();
	$message = $e->getMessage();
	
	//print($code);die();
	if($code == 1 || $code == 401 || $message == "Token request failed") {
		header('Location: '.$loginUrl.'?l=failed'); die();
	} else if($code == 500 || $code == 404) {
		header('Location: '.$internalErrorPage); die();
	} else {
		header('Location: '.$notFoundUrl); die();
	}
}*/
?>
