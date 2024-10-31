<?php 

  define('API_ROUTE', 'smartfit/v1');
  
  //post types
  include_once 'v1/postType/domain/registerDomain.php';
  include_once 'v1/postType/infrastructure/registerInfrastructure.php';
  include_once 'v1/postType/application/registerApplication.php';

    //code config
    include_once 'v1/updatecode/domain/registerDomain.php';
    include_once 'v1/updatecode/infrastructure/registerInfrastructure.php';
    include_once 'v1/updatecode/application/registerApplication.php';

  //taxonomies
  include_once 'v1/tax-list/domain/registerDomain.php';
  include_once 'v1/tax-list/infrastructure/registerInfrastructure.php';
  include_once 'v1/tax-list/application/registerApplication.php';

  //isblack
  include_once 'v1/isblack/domain/registerDomain.php';
  include_once 'v1/isblack/infrastructure/registerInfrastructure.php';
  include_once 'v1/isblack/application/registerApplication.php';

  function add_cors_http_header() {
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
      header("Access-Control-Allow-Headers: Content-Type, Authorization");
  }
  add_action('init', 'add_cors_http_header');

