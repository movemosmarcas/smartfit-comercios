<?php

  class RepositoryCode
  {
    private $id;

    public function __construct($params){
      $this->id = $params->get_param('id');
    }


    public function put_check() {

      $post_id = $this->id;
      $i = 0;

      if( have_rows('codigos', $post_id) ) {
        while( have_rows('codigos', $post_id) ) {
          the_row();
          $status = get_sub_field('estado', $post_id);         
            if($status[0] !== "true"){
              update_post_meta($post_id, 'codigos_'.$i.'_estado', 'true');
              return new WP_REST_Response('Código entregado', 200);
            }
          $i++;
        }
      }
      return new WP_REST_Response('data updated: '.$post_id, 200);

    }

}