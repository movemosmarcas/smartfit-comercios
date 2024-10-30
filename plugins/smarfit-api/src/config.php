<?php 

  define('API_ROUTE', 'smartfit/v1');
  
  //post types
  include_once 'v1/postType/domain/registerDomain.php';
  include_once 'v1/postType/infrastructure/registerInfrastructure.php';
  include_once 'v1/postType/application/registerApplication.php';

  //taxonomies
  include_once 'v1/tax-list/domain/registerDomain.php';
  include_once 'v1/tax-list/infrastructure/registerInfrastructure.php';
  include_once 'v1/tax-list/application/registerApplication.php';

  //isblack
  include_once 'v1/isblack/domain/registerDomain.php';
  include_once 'v1/isblack/infrastructure/registerInfrastructure.php';
  include_once 'v1/isblack/application/registerApplication.php';

  add_action('init', 'add_cors_http_headers');
  function add_cors_http_headers() {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');
}
