<?php 

// Theme support
function theme_setup(){
    add_theme_support('post-thumbnails');

    add_theme_support('custom-logo', array(
      'height'      => 100,
      'width'       => 400,
      'flex-height' => true,
      'flex-width'  => true,
    ));

    add_image_size( 'thumbnail', 150, 150, false ); 
    add_image_size( 'medium-regular', 300, 200, false ); 
    add_image_size( 'medium-large', 640, 480, false ); 
    add_image_size( 'large', 1024, 768, false ); 
    add_image_size( 'extra-large', 1920, 1080, false ); 
    add_image_size( 'icon', 50, 50, false ); 
    add_image_size( 'avatar', 150, 150, false );
    add_image_size( 'header', 1920, 1080, false ); 

  }
  add_action('after_setup_theme', 'theme_setup');
  
  
  /** Register menus */
  if (!function_exists('register_new_menu')) :
      function register_new_menu(){
        register_nav_menu('nav-main', __('Menu principal'));
        register_nav_menu('nav-btn', __('Botones'));
        register_nav_menu('nav-footer', __('Menu footer'));
        register_nav_menu('nav-project', __('Menu proyectos'));
        register_nav_menu('nav-legal', __('Menu legal'));
      }
      add_action('after_setup_theme', 'register_new_menu');
    
  endif;
