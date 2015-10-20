<?php

session_start();
require("../utils/commons.php");

$loginUrl = BASE_DIR."login.php";
$notFoundUrl = BASE_DIR."404.html";
$internalErrorPage = BASE_DIR."500.html";
$indexUrl = BASE_DIR."index.php";
$successUrl = BASE_DIR."successful.html";



$user = $_REQUEST['user'];
$token = $_REQUEST['anchor'];
$pwd = $_REQUEST['pwd'];

$response = authenticationlessCurlCall("POST", "public/passwordReset", array('token'=>$token, 'username'=>$user,'password'=>$pwd));
$code = $response[HTTP_STATUS];
if($code != 204) {
	if($code == 500 || $code == 404) {
		header('Location: '.$internalErrorPage); die();
	} else {
		header('Location: '.$notFoundUrl); die();
	}
}
header('Location: '. $successUrl);

?>
