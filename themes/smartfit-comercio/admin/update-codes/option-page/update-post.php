<?php 

  class update_repeater_post {

    function __construct() {}

    function acf_update_codes($post_id, $codes)   {
      $repeater_field = get_field('codigos', $post_id);
      $code_array = explode(',', $codes);

      if (!$repeater_field) {
        $repeater_field = array();
      }
      
      foreach ($code_array as $value) {
        $exists = false;
    
        foreach ($repeater_field as $item) {
            if ($item['codigo'] == $value) {
                $exists = true;
                break; 
            }
        }
    
        if (!$exists) {
            $repeater_field[] = array(
                'codigo' => $value
            );
        }
    }
    
      update_field('codigos', $repeater_field, $post_id);


    }

  }