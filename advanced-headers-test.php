<?php
/**
* This file is created by Really Simple SSL to test the CSP header length
* It will not load during regular wordpress execution
*/


if ( !headers_sent() ) {
header("X-XSS-Protection: 0");
header("Referrer-Policy: strict-origin-when-cross-origin");

}
header("X-REALLY-SIMPLE-SSL-TEST: m%A1%3B%E9+%28%5DAJ%ED%B2%96%11%D5%BA%98%87%F0%1E%D1%DFl%84%94%0D%21F%BC%DAN%21c%00V%CA2%CB%DF%D0E%3E%D3%9AdY%E1I%16%CA%0AIB%A5%F7A%C0%27%C9%EA%1E%9A%C7z%3F%A6%FD%BATx%03%A2%C8%2C%9F%16%D3%96f%A3K%CA%CCHx%90%1FW%97%A1%A9%93%DB%3EN%A6%BE%3C%FDai%B13%BA%1CN%04%C6%B9%A8J%86%60%7D%0E%CBp%BEx%27%8A%8D%A1K%93%86%B5%9E%11%98e%FB%22XM%EA%5E%C1%D5%08%F0BZw%F4u%28%86%BC%B9%C9%88h%26%BA.%E18%23D%E94s%24h%7F%F6%C0%80%E7%87%F5.I%03%B8%F9i%BF%DE%B7%D6%D8%CA%8Ax%D4%21%114%11kE%29Hh%0D%A1a%15%F29%D0k%FF%B0%C8%D");

 echo '<html><head><meta charset="UTF-8"><META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"></head><body>Really Simple SSL headers test page</body></html>';