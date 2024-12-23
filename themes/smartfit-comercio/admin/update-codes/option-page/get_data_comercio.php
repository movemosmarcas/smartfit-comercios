<?php
  
  class get_data_comercio {

    public function __construct() {}

    function get_data_codes() {

        global $wpdb;
        $tabla = $wpdb->prefix . 'reportes';

        $results = $wpdb->get_results("SELECT * FROM $tabla");

        $flattened_array = array();

        foreach ($results as $result) {
            $flattened_array[] = array(
                'comercio_name' => $result->comercio_name,
                'codigo_descuento' => $result->codigo_descuento,
                'cedula_usuario' => $result->cedula_usuario,
                'date_created' => $result->date_created
            );
        }
        
        return json_encode($flattened_array);
    }
}


