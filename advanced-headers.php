<?php
/**
* This file is created by Really Simple SSL
*/

if ( isset($_GET["rsssl_header_test"]) && (int) $_GET["rsssl_header_test"] ===  522090050 ) return;

if (defined("RSSSL_HEADERS_ACTIVE")) return;
define("RSSSL_HEADERS_ACTIVE", true);
//RULES START

if ( !headers_sent() ) {
header("X-XSS-Protection: 0");
header("Referrer-Policy: strict-origin-when-cross-origin");

}
