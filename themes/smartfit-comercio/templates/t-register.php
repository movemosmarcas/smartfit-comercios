<?php 

if (!defined('ABSPATH')) exit;

// register global function 
if (!function_exists('resiger_templates_elements')) :
    function resiger_templates_elements(){      
      wp_enqueue_style('home', PATH_STYLE . 'templates/home/home.css', array(), '1.1' . VERSION);

      //comercio
      wp_enqueue_style('comercio', PATH_STYLE . 'templates/comercio/comercio.css', array(), '1.1' . VERSION);
      wp_enqueue_script('comercio', PATH_STYLE . 'templates/comercio/comercio.js', array(), false, true);
    }
  
endif;
  
add_action('wp_enqueue_scripts', 'resiger_templates_elements', 10);