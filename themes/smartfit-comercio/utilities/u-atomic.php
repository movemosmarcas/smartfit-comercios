<?php

function template_part_atomic($template_route, $args = array()) {

  $name = basename($template_route);
  wp_enqueue_style($name, get_stylesheet_directory_uri() . "/$template_route.css", array(), '1.0.0', 'all');
  wp_enqueue_script($name, get_stylesheet_directory_uri() . "/$template_route.js", array('jquery'), '1.0.0', true);
  
  get_template_part($template_route, null, $args);
}