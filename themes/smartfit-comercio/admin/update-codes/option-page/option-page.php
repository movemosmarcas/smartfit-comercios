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

  if (isset($_POST["replace-codes"])) {
    $post_id = $_POST['post_id'];
    $codes = $_POST['codes'];
    
    $updateFuncion = new update_repeater_post();
    $updateFuncion->acf_delete_codes($post_id);
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
    $get_tab = isset($_GET['tab']) ? $_GET['tab'] : 'codes';
 ?>

  <script>
    const dataReport = <?php echo json_encode($decode_data); ?>;
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
      link.setAttribute('download', `${fileName}-${new Date().toISOString()}.csv`);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }

    const deleteCodes = (event) => {
      const confirm = window.confirm('Esta seguro, se eliminaran los codigos actuales y se repalzaran por los nuevos');
      if(!confirm){
        event.preventDefault();
      }
    }

  </script>


  <div class="wrap">
    <nav class="tabs-options">
      <a href="?page=upload-codes&tab=codes" class="active" >Cargar codigos</a>
      <a href="?page=upload-codes&tab=reportes" class="active">Descargar reporte</a>
    </nav>
    <div class="wrap-content-taps">
      <?php 
        if ($get_tab == 'codes') { ?>
          <div class="load-codes">
            <h1 class="wp-heading-inline"><?php esc_html_e('Carga masiva de códigos por comercio', 'smartfit'); ?></h1>
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
                <button type="submit" class="button button-primary button-hero" name="submit-codes">Agregar codigos</button>
                <button type="submit" class="button button-secondary button-hero" name="replace-codes" onclick="deleteCodes(event)">Remplazar codigos</button>
              </form>
            </div>
          </div>
        <?php }

        if($get_tab == 'reportes') { ?>
          <div class="load-codes-given">
            <h1 class="wp-heading-inline"><?php esc_html_e('Codigos entregados', 'smartfit'); ?></h1>
            <div class="dowloan-report" style="margin: 20px 0">
              <button class="button button-primary button-hero" name="dowload_report" onclick="dowload_report(dataReport, 'reporte_codigos')" >Descargar reporte codigos</button>
            </div>
            <h4 class="table-codes"><?php esc_html_e('Tabla de codigos', 'smartfit'); ?></h4>
            <div class="table-codes-given">
              <table class="widefat fixed striped">
              <thead>
                <tr>
                  <th>Comercio</th>
                  <th>Codigo</th>
                  <th>Cedula</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($decode_data as $key => $value) {
                    echo '<tr>';
                    echo '<td>'.$value['comercio_name'].'</td>';
                    echo '<td>'.$value['codigo_descuento'].'</td>';
                    echo '<td>'.$value['cedula_usuario'].'</td>';
                    echo '<td>'.$value['date_created'].'</td>';
                    echo '</tr>';
                  }
                ?></tbody>
              </table>
            </div>

          </div>
        <?php } ?>
    </div>
    
  </div>
  <?php
}
