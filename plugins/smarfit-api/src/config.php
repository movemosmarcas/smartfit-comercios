<?php 

  define('API_ROUTE', 'smartfit/v1');
  
  include_once 'v1/postType/domain/registerDomain.php';
  include_once 'v1/postType/infrastructure/registerInfrastructure.php';
  include_once 'v1/postType/application/registerApplication.php';

  add_action('init', 'add_cors_http_headers');
  function add_cors_http_headers() {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');
  }