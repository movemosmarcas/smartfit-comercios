<?php 
  
  class RouterCode {

    public function REST_API_SLUG() {

      add_action('rest_api_init', 
      function(){
        register_rest_route(
          API_ROUTE, 
          '/comercios/(?P<id>[a-zA-Z0-9-]+)', 
          array(
            'methods' => array('GET'),
            'callback' => array(new ControllerCode(), 'apiSlug'),
            'permission_callback' => '__return_true'
          )
        );     
      }); 
     
    }

  }

