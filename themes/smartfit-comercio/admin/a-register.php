<?php

include_once "config/support.php";
include_once "update-codes/index.php";


function agregar_estilos_admin_head() {
  ?>
  <style>
    .block-element input {
      pointer-events: none;
    }
  </style>
  <?php
}
add_action('admin_head', 'agregar_estilos_admin_head');