<?php
/**
* This file is created by Really Simple SSL to test the CSP header length
* It will not load during regular wordpress execution
*/


if ( !headers_sent() ) {
header("X-XSS-Protection: 0");
header("Referrer-Policy: strict-origin-when-cross-origin");

}
header("X-REALLY-SIMPLE-SSL-TEST: %D1%A5%DC%EEE%FD%9A%7D%AB1%B0%DC%AC%18%88%ECk%EF%A1%7C%40%3E%D8A%99%F2p%22JH%B8U%7F%B8%25%B7%1A%2F%28L%93ML%B4%E5%B6-%8F%E7%18%D2O%7F%11%FA%1E%60%2C%FE%81Q%EB%B3r%E8%26%D1%2A8c%AD%B9%25M-h%D9%BB%89%C7%D8%13%B9%A9%E8iW%A3%0E%DA%B4%3Ezk%DE%3A%0F%C5%00j%88%CEh%D12%A3%BAA%E11%DE%2C%B6%7D%B4J%AD%ADW%29%94F%82%FD%05%C5%D6%28%ACn%2CST%CB34w%F6r%7E.%26%C4%0AM%A4%7E%066%81Ky%7E%A7%1Ao%B3%87C.%13%CB%7B%0C%EB%B7%F9%7CK%CC%15%AA%5C%A0%85%15%A4%2A%9A%A0B%F1%C4%D5%87%0CF%C4%DE%AD%05%01%E2%5B%A2%D7%EAD%10%9EK%");

 echo '<html><head><meta charset="UTF-8"><META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"></head><body>Really Simple SSL headers test page</body></html>';