<?php 

class ControllerSaveData
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
    $data_saved = new RepositorySaveData($param);
    return $data_saved->to_save();
  }

}