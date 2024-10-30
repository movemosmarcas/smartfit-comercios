<?php
/**
* This file is created by Really Simple SSL to test the CSP header length
* It will not load during regular wordpress execution
*/


if ( !headers_sent() ) {
header("X-XSS-Protection: 0");
header("Referrer-Policy: strict-origin-when-cross-origin");

}
header("X-REALLY-SIMPLE-SSL-TEST: %24%8Bc%CFy%FB%0Fo%00G%1B%D2%0B%BF%861%F6Re+%F8%D0%D6%A7L%91%2C7%EA%DCb%88P%CA%B1%B9%14%DE%87%A00%02%8D%F1%DDT%D8%1Cv%8DL4+%93%2F%DA%F9%5E%DEG%13%26%90r%B0l%85%91%98%84x%94%A1%08%7BO%7CMd%B9%5BS5%D2%AD%F9%2B%B7%03%9BV%FA%17%95%3Cy3%04%C4%D9%91%11W%3C%B4K%809%A1k%85+%BA%2B%7C%C3%F2%9C%B8n%A8%D3%B7%C9tf%25%A0%AD%CE%7F%60%DC%F5%E8B%EE%FBo%F2%D7%B1%DB%AC%24%AC%E0bBN%98%E5%E0y%06%9A%98%A0%93o%82%7B%13%1Dw%18%DA%08%1B%A6%29%AA%AE%07%9D%FBO%FD%91%24%88%AB%DB%86%B2%D0E%C3EWzT%08%D2%95%3F%D9L%7B%C4%D6%F1");

 echo '<html><head><meta charset="UTF-8"><META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"></head><body>Really Simple SSL headers test page</body></html>';