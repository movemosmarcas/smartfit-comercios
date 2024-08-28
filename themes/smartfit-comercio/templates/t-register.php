<?php 

if (!defined('ABSPATH')) exit;

// include_once 'open-graph.php';
$timestamp = time();
$version = mt_rand(1, $timestamp);

// register global function 
if (!function_exists('resiger_templates_elements')) :
    function resiger_templates_elements(){      
      wp_enqueue_style('home', PATH_STYLE . 'templates/home/home.css', array(), '1.1' . VERSION);
    }
  
endif;
  
add_action('wp_enqueue_scripts', 'resiger_templates_elements', 10);