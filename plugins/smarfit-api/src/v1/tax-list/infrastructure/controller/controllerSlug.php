<?php 

class ControllerTax{


  public function apiSlug($param) {
    $method = $param->get_method();
    
    if( $method === 'GET' ) {
      return $this->getSlug($param);
    }
  }

  public function getSlug($param) {
    $get_page_info = new RepositoryTax($param);
    $page_info = $get_page_info->get_tax_by_slug();

    return rest_ensure_response( $page_info, 200 );
  }

}