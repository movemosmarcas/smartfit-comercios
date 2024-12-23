<?php 
  
  class RouterSaveData {

    public function REST_API_SLUG() {

      add_action('rest_api_init', 
      function(){
        register_rest_route(
          API_ROUTE, 
          '/savedata/(?P<name>[a-zA-Z0-9-]+)/(?P<cedula>[a-zA-Z0-9-]+)/(?P<codigo>[a-zA-Z0-9-]+)', 
          array(
            'methods' => array('GET'),
            'callback' => array(new ControllerSaveData(), 'apiSlug'),
            'permission_callback' => '__return_true'
          )
        );     
      }); 
     
    }
  }

