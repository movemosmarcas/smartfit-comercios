<?php 
  
  class RouterSlug {

    public function REST_API_SLUG() {

      add_action('rest_api_init', 
      function(){
        register_rest_route(
          API_ROUTE, 
          '/(?P<post_type>[a-zA-Z0-9-]+)', 
          array(
            'methods' => array('GET', 'POST', 'PUT', 'DELETE'),
            'callback' => array(new ControllerSlug(), 'apiSlug'),
            'permission_callback' => '__return_true'
          )
        );     
      }); 
     
    }

  }

