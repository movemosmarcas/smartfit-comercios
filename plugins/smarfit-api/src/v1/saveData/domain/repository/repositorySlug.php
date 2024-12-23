<?php

  class RepositorySaveData
  {
    private $comerce_name;
    private $codigo;
    private $cedula;

    public function __construct($params){
      $this->comerce_name = $params->get_param('name');
      $this->codigo = $params->get_param('codigo');
      $this->cedula = $params->get_param('cedula');

    }


    public function to_save() {
      global $wpdb;
      $tabla = $wpdb->prefix . 'reportes';

      $comerce_name = $this->comerce_name;
      $codigo = $this->codigo;
      $cedula = $this->cedula;

      $datos = array(
        'comercio_name'   => sanitize_text_field($comerce_name), 
        'codigo_descuento'=> sanitize_text_field($codigo),
        'cedula_usuario'  => sanitize_text_field($cedula),
        'date_created'    => current_time('mysql')
      );

      $result = $wpdb->insert($tabla, $datos);
      if($result === false) {
        return new WP_REST_Response('data not saved, error', 500);
      }
      return new WP_REST_Response('data saved, success', 200);

    }

}