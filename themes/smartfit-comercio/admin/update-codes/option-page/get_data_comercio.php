<?php
  
  class get_data_comercio {

    public function __construct() {}

    function get_data_codes() {

        global $wpdb;
        $tabla = $wpdb->prefix . 'reportes';

        if ($wpdb->get_var("SHOW TABLES LIKE '$tabla'") != $tabla) {
            return json_encode(array('error' => 'La tabla no existe.'));
        }

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
        
        return $flattened_array;
    }

    function get_data_classic_codes(){
        //add old code
    }
}


