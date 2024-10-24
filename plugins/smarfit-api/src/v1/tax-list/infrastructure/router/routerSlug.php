<?php 
  
  class RouterTax {

    public function REST_API_SLUG() {

      add_action('rest_api_init', 
      function(){
        register_rest_route(
          API_ROUTE, 
          '/taxonomy/(?P<taxonomy>[a-zA-Z0-9-]+)/(?P<tax_slug>[a-zA-Z0-9-]+)',
          array(
            'methods' => array('GET'),
            'callback' => array(new ControllerTax(), 'apiSlug'),
            'permission_callback' => '__return_true'
          )
        );     
      }); 
     
    }

  }

