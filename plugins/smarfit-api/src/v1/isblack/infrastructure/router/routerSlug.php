<?php 
  
  class RouterIsBlack {

    public function REST_API_SLUG() {

      add_action('rest_api_init', 
      function(){
        register_rest_route(
          API_ROUTE, 
          '/idblack/(?P<id>[a-zA-Z0-9-]+)',
          array(
            'methods' => array('GET'),
            'callback' => array(new ControllerIsBlack(), 'apiSlug'),
            'permission_callback' => '__return_true'
          )
        );     
      }); 
     
    }

  }

