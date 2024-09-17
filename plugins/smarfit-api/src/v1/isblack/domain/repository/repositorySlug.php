<?php

class RepositoryIsBlack{

  private $id;

  public function __construct($data) {
    $this->id = $data['id'];
  }

  public function val_user_black() {
    $token = '3952b3501112af42f568221f1c10da54';
    $url_blac ="https://app.smartfit.com.br/api/v3/validate_black/" . $this->id . "";
    $response = wp_remote_get( $url_blac, array(
      'headers' => array(
        'Authorization' => 'Bearer ' . $token
      )
    ) );
    return array('isBlack'=>$response['body']);
  }

}