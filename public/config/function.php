<?php
function curPageURL() {
	
 	error_reporting(~E_NOTICE);
	
	$pageURL = 'http';
	
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";

	if ($_SERVER["SERVER_PORT"] != "80") {
	//$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	$pageURL .= $_SERVER["SERVER_NAME"];
	} else {
	$pageURL .= $_SERVER["SERVER_NAME"];
	}
	return $pageURL;
}






