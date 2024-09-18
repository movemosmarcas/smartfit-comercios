<?php 

class ControllerSlug
{


  public function apiSlug($param) {
    $method = $param->get_method();

    $update_code = isset($param['update_id']) ? true : false;

    if( $method === 'GET' && $update_code === false ) {
      return $this->getSlug($param);
    }

    if( $update_code ) {
      return $this->putCheck($param);
    }
  }

  public function getSlug($param) {
    $get_page_info = new RepositorySlug($param);
    $page_info = $get_page_info->get_page_data_by_slug();

    return rest_ensure_response( $page_info, 200 );
  }

  public function putCheck($param) {
    $put_check = new RepositorySlug($param);
    return $put_check->put_check();
  }

}