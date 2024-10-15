<?php 

function mi_pagina_de_ajustes() {
  add_options_page(
      'Cargar codigos',     
      'Carga masiva de código por comercio',   
      'manage_options',           
      'upload-codes',        
      'codes_upload_comerce'    
  );
}
add_action('admin_menu', 'mi_pagina_de_ajustes');

function codes_upload_comerce() {

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST['post_id'];
    $codes = $_POST['codes'];
    
    $updateFuncion = new update_repeater_post();
    $updateFuncion->acf_update_codes($post_id, $codes);

  }


  $args = array(
    'post_type' => 'comercios',
    'post_status' => 'publish',
    'posts_per_page' => -1
  );

  $posts_list = get_posts($args);
  
  ?>
  <div class="wrap">
      <h1><?php esc_html_e('Carga masiva de códigos por comercio', 'smartfit'); ?></h1>
      <div class="content">

      <form method="post" action="">
        <div>
          <h3 class="select-comercio"><?php esc_html_e('Seleccione el comercio', 'smartfit'); ?></h3>
          <select name="post_id">
              <option value=""><?php esc_html_e('Seleccione el comercio', 'smartfit'); ?></option>
              <?php 
                foreach ($posts_list as $post) {
                  $post_id = $post->ID;
                  $post_title = $post->post_title;
                  echo '<option value="'.$post_id.'">'.$post_title.'</option>';
                }
              ?>
          </select>
        </div>

        <div>
          <h3 class="select-codes"><?php esc_html_e('Cargue los códigos', 'smartfit'); ?></h3>
          <textarea name="codes" id="codes" cols="100" rows="20"></textarea>
        </div>

        <button type="submit" class="button button-primary button-hero">Actualizar</button>
      </form>

      </div>
  </div>
  <?php
}
