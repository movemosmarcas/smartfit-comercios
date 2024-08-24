<?php 

function u_register_styles($nameSpace, $path) {
    wp_register_style($nameSpace, $path . $nameSpace . '/' . $nameSpace . '.css');
    wp_register_script($nameSpace, $path . $nameSpace . '/' . $nameSpace . '.js', array(), null, true);
  }