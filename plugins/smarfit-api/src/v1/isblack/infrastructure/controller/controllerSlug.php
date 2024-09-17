<?php 

class ControllerIsBlack{

  public function apiSlug($param) {
    $method = $param->get_method();
    
    if( $method === 'GET' ) {
      return $this->getSlug($param);
    }
  }

  public function getSlug($param) {
    $get_page_info = new RepositoryIsBlack($param);
    $page_info = $get_page_info->val_user_black();

    return rest_ensure_response( $page_info, 200 );
  }

}