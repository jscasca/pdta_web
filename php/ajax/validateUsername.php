<?php
require("../utils/commons.php");
/**
 * Check if an username is available
 */
if(!isset($_REQUEST['username'])) die("false");
$username = $_REQUEST['username'];
$call = authenticationlessCurlCall("GET", "public/usernameAvailability", array("username"=>$username));
if($call[HTTP_STATUS] == 200) echo $call[RESPONSE];
?>
