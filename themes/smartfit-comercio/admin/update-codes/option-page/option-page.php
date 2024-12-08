<?php 

include 'get_data_comercio.php';

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

  if (isset($_POST["submit-codes"])) {
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

    $data = new get_data_comercio();
    $decode_data = $data->get_data_codes();
  ?>

  <script>
    const dataReport = <?php echo $decode_data; ?>;
    console.log(dataReport);

    function dowload_report(jsonData, fileName) {
      const headers = Object.keys(jsonData[0]);
      
      const rows = jsonData.map(row =>
        headers.map(header => JSON.stringify(row[header], replacer = null, space = 0)).join(',')
      );

      const csvContent = [headers.join(','), ...rows].join('\n');

      const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
      const url = URL.createObjectURL(blob);

      const link = document.createElement('a');
      link.setAttribute('href', url);
      link.setAttribute('download', `${fileName}.csv`);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }

  </script>


  <div class="dowloan-report">
    <a class="button button-primary button-hero" name="dowload_report" onclick="dowload_report(dataReport, 'reporte_codigos')" >Descargar reporte codigos<a>
  </div>

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

      <button type="submit" class="button button-primary button-hero" name="submit-codes">Actualizar</button>
    </form>

    </div>
  </div>
  <?php
}
