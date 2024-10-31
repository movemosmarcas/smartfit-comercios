<?php 

class ControllerCode
{

  public function apiSlug($param) {
    $method = $param->get_method();

    if( $method === 'GET') {
      return $this->putCheck($param);
    }

  }


  public function putCheck($param) {
    $put_check = new RepositoryCode($param);
    return $put_check->put_check();
  }

}