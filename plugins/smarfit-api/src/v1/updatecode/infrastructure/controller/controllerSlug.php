<?php 

class ControllerCode
{

  public function apiSlug($param) {
    $method = $param->get_method();

    $limit = control_limit($_SERVER['REMOTE_ADDR']);
    if ($limit) {
      return new WP_REST_Response(
          $limit,
          429 
      );
    }

    if( $method === 'GET') {
      return $this->putCheck($param);
    }

  }


  public function putCheck($param) {
    $put_check = new RepositoryCode($param);
    return $put_check->put_check();
  }

}