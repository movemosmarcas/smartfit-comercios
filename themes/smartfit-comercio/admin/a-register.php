<?php

include_once "config/support.php";
include_once "update-codes/index.php";


function agregar_estilos_admin_head() {
  ?>
  <style>
    .block-element input {
      pointer-events: none;
    }

    .tabs-options {
      display: flex;
      gap: 10px;
      font-size: 18px;
      margin: 16px 0px;
    }

  </style>
  <?php
}
add_action('admin_head', 'agregar_estilos_admin_head');