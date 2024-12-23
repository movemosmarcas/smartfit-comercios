<?php 

  function create_table_reports() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'reportes';
    
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
      
      $charset_collate = $wpdb->get_charset_collate();
      $sql = "CREATE TABLE $table_name (
        id INT NOT NULL AUTO_INCREMENT,
        comercio_name VARCHAR(255) NOT NULL,
        codigo_descuento VARCHAR(255) NOT NULL,
        cedula_usuario VARCHAR(50) NOT NULL,
        date_created DATE NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
    
    }

  }

add_action('init', 'create_table_reports');
