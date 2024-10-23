<?php 

if (!defined('ABSPATH')) exit;

// include_once 'open-graph.php';
$timestamp = time();
$version = mt_rand(1, $timestamp);

define("VERSION", $version);
define("PATH_STYLE", 'https://beneficioscolombia.smartfitcolombia.com/wp-content/themes/smartfit-comercio/');

// register global function 
if (!function_exists('register_custom_elements')) :
  
    function register_custom_elements(){      
      //Objects - globa styles //				
      wp_enqueue_style('w-globals', PATH_STYLE . 'w-globals/w-globals.css', array(), '1.1' . VERSION);
      wp_enqueue_script('w-globals', PATH_STYLE . 'w-globals/w-globals.js', array(), false, true);

    }
  
endif;
  
add_action('wp_enqueue_scripts', 'register_custom_elements', 10);