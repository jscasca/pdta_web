<?php

//IMPORTS
require 'exceptions.php';

//WEB CLIENT CREDENTIALS (CHANGE FOR PRODUCTIVE)
define('CLIENT_ID', 'webApp');
define('CLIENT_SECRET', 'web123');

//FRONT_END SERVER
define('BASE_DIR', '/bootstrapPd/');

//BACK_END SERVER (CHANGE FOR PRODUCTIVE)
define('REST_API','http://localhost:8080/Posdta/');

//SERVER PATHS
define('TOKEN_URL', 'oauth/token');
define('ME', 'api/me');

//CONSTANTS
//session
define('SID','user_id');
define('ICON','user_icon');
define('DISPLAY_NAME','user_display');
define('USERNAME','user_name');
define('TOKEN','user_token');
define('REFRESH','user_refresh');
//curl calls
define('HTTP_STATUS', 'http_status');
define('CURL_ERRNO', 'curl_errno');
define('RESPONSE', 'response');
//http method
define('POST', 'POST');
define('GET', 'GET');
define('PUT', 'PUT');
define('DELETE', 'DELETE');

define('USERNAME_REGEX', '#^[a-zA-Z0-9_]{1,24}$#');
define('EMAIL_REGEX', '#^[_A-Za-z0-9-\\+]+(\\.[_A-Za-z0-9-]+)*@[A-Za-z0-9-]+(\\.[A-Za-z0-9]+)*(\\.[A-Za-z]{2,})$#');

define('JSON_START', '{');
define('JSON_END', '}');
define('XML_START', '<');
define('XML_END', '>');

/********************FUNCTIONS********************************/ 


/**
 * Calls for a token an sets it in the session variables
 * May throw exceptions
 */
function logIn($username, $password) {
	$logIn = getToken(CLIENT_ID, CLIENT_SECRET, $username, $password);
	//print_r($logIn);die("ON LOGIN");
	$logInInfo = json_decode($logIn[RESPONSE], true);
	$accessToken = $logInInfo["value"];
	$refreshToken = $logInInfo["refreshToken"];
	$getUser = tokenCurlCall($accessToken, "GET", ME);
	$userInfo = json_decode($getUser[RESPONSE], true);
	//Void function, sets the values in session vars
	$_SESSION[SID] = $userInfo['id'];
	$_SESSION[ICON] = $userInfo['icon'];
	$_SESSION[DISPLAY_NAME] = $userInfo['displayName'];
	$_SESSION[USERNAME] = $userInfo['userName'];
	$_SESSION[TOKEN] = $logInInfo['value'];
	$_SESSION[REFRESH] = $logInInfo['refreshToken'];
}

/**
 * Refreshes the token and sets it in the session vars
 * 
 */
function updateToken($token) {
	try {
		$response = refreshToken(CLIENT_ID, CLIENT_SECRET, $token);
		
	} catch(Exception $e) {
		
	}
}

/**
 * Refreshes the token and cleans it from the vars (also cleans the session vars)
 */
function logout($token) {
	
}

/**
 * Refreshes the token and sets it in the session vars
 * 
 * returns an access token
 * {"value":"xxxx","expiration":000,"tokenType":"bearer","refreshToken":{"value":"xxxx","expiration":000},"scope":[],"additionalInformation":{},"expiresIn":000,"expired":false} 
 */
function refreshToken($clientId, $clientSecret, $token) {
	//http://localhost:8080/Posdta/oauth/token?grant_type=refresh_token&refresh_token=48b527bc-2614-46c9-bfc0-d5c7961a0212" -H "Accept: application/json"
	$tokenParams = "?grant_type=refresh_token&refresh_token=" . $token;
	$response = basicCurlCall($clientId, $clientSecret, "POST", TOKEN_URL . $tokenParams);
	if($response[HTTP_STATUS] != 200) {
		throw new Exception("Token request failed", $response[HTTP_STATUS]);
	}
	return $response;
}

/**
 * 
 * 
 * returns an access token
 * {"value":"xxxx","expiration":000,"tokenType":"bearer","refreshToken":{"value":"xxxx","expiration":000},"scope":[],"additionalInformation":{},"expiresIn":000,"expired":false} 
 */
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

function authenticationlessCurlCall($method, $url, $data = false) {
	$url = REST_API . $url;
	$curl = curl_init();
	$headers = [];
	switch($method) {
		case "POST":
			curl_setopt($curl, CURLOPT_POST, 1);
			if($data) {
				$data_string = $data;
				if(is_array($data)) {
					$data_string = json_encode($data);
				}
				$headers[] = "Content-Type: application/json";
				$headers[] = "Content-Length: ".strlen($data_string);
				//curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type:application/json", "Content-Length:".strlen($data_string)));
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
			}
			break;
		case "PUT":
			curl_setopt($curl, CURLOPT_PUT, 1);
			break;
		default:
			if($data) {
				$url = sprintf("%s?%s", $url, http_build_query($data));
			}
	}
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	return executeCurl($curl);
}

function basicCurlCall($user, $password, $method, $url, $data = false) {
	$url = REST_API . $url;
	$curl = curl_init();
    switch ($method)
    {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data) {
                curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			}
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }
    // Optional Authentication:
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, $user . ":" . $password);

    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    return executeCurl($curl);
}

function tokenCurlCall($token, $method, $url, $data = false) {
	$url = REST_API . $url;
	$curl = curl_init();
	$headers = [];
	$headers[] = "Authorization: Bearer " . $token;
	switch($method) {
		case "POST":
			curl_setopt($curl, CURLOPT_POST, 1);
			if($data) {
				$data_string = $data;
				if(is_array($data)) {
					$data_string = json_encode($data);
				}
				$headers[] = "Content-Type: application/json";
				$headers[] = "Content-Length: ".strlen($data_string);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
			}
			/*if($data) {
				$headers[] = "Content-Type: application/json";
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			}*/
			break;
		case "PUT":
			curl_setopt($curl, CURLOPT_PUT, 1);
			break;
		case "DELETE":
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
			break;
		default: if($data) {
			$url = sprintf("%s?%s", $url, http_build_query($data));
		}
	}
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    return executeCurl($curl);
}

function executeCurl($curl) {
	$result = curl_exec($curl);
	$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	$curl_errno = curl_errno($curl);
	$response = array();
	$response[HTTP_STATUS] = $http_status;
	$response[CURL_ERRNO] = $curl_errno;
	/*if(startsWith($result, JSON_START) && endsWith($result, JSON_END)) {
		$response[RESPONSE] = json_decode($result, true);
	} else if(startsWith($result, XML_START) && endsWith($result, XML_END)) {
		$response[RESPONSE] = "";
	} else {
		$response[RESPONSE] = $result;
	}*/$response[RESPONSE] = $result;
	curl_close($curl);
	return $response;
}

function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
}
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}
?>
