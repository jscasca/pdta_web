<?php
require("../utils/commons.php");
/**
 * Check if an email is available
 */
if(!isset($_REQUEST['email'])) die("false");
$email = $_REQUEST['email'];
$call = authenticationlessCurlCall("GET", "public/emailAvailability", array("email"=>$email));
if($call[HTTP_STATUS] == 200) echo $call[RESPONSE];
?>
