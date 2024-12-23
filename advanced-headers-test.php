<?php
/**
* This file is created by Really Simple SSL to test the CSP header length
* It will not load during regular wordpress execution
*/


if ( !headers_sent() ) {
header("X-XSS-Protection: 0");
header("Referrer-Policy: strict-origin-when-cross-origin");

}
header("X-REALLY-SIMPLE-SSL-TEST: %F6%C0%98K%DEM%1C%0D%9F%161%EA%E3%FE%E3%B2%02%B9%0E%CFus%B2KE%F0%82%3C%0B%E0i%F5%C9aAmC%DAi%CC%C1%C7%9E%7F%F2%D4%9A%FBDg%058%E0_%F4l1%CA%BC%5B%B3%EE%91%DDp%B7%F8%B3%F0%19%D1%C8%F7%F2%15%13%5C%3C%F3O%F5%D4%7F%40i%7EC%28%9A%9C%F0%86%CB2%F8%C9%07%C7-%AD%1A%2Cf%A4K%8B%F9V8F%DE%093%E2%A7%D2193%13e%13c%3B%0Ba%83%05%D7%1F%C4%ED%BDkRI%5C%07s%AE%24%3A7%5C%0C%B5%3F%D3%FC%7C%0B%81%92%91%25eG%1D%0D%00%9C%DB%8C%E05%BEK%2Fp%5E%8C%EB%14+Hu%D5F%A8U%E1%BE%09%D4%97ZM%A5%AC%8B%23%90%5Bo%AC%97%D1%AB%89%04%1A%60%EE%");

 echo '<html><head><meta charset="UTF-8"><META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"></head><body>Really Simple SSL headers test page</body></html>';