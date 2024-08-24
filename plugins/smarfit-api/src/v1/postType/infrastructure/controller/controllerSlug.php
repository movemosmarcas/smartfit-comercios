<?php 

class ControllerSlug
{


  public function apiSlug($param) {
    $method = $param->get_method();
    
    if( $method === 'GET' ) {
      return $this->getSlug($param);
    }
  }

  public function getSlug($param) {
    $get_page_info = new RepositorySlug($param);
    $page_info = $get_page_info->get_page_data_by_slug();

    return rest_ensure_response( $page_info, 200 );
  }

}