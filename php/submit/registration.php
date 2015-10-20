<?php

require("../utils/commons.php");
$loginUrl = "";
$registrationUrl = BASE_DIR."/register.html";
$indexUrl = BASE_DIR."/index.php";
$internalErrorPage = BASE_DIR."/bootstrapPd/500.html";

$header = "Location: ";
/**
 * 409 if already exists
 */
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
//if($call[HTTP_STATUS] == 200) echo $call[RESPONSE];
?>
