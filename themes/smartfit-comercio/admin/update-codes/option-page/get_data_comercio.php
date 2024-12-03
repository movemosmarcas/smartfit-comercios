<?php
  
  class get_data_comercio {

    public function __construct() {}

    function get_data_codes() {
        $args = array(
            'post_type' => 'comercios',
            'post_status' => 'publish',
            'posts_per_page' => -1
        );

        $posts_list = get_posts($args);

        $flattened_array = array();

        foreach ($posts_list as $post) {
            $codigos_repeater = get_field('codigos', $post->ID);

            if ($codigos_repeater && is_array($codigos_repeater)) {
                foreach ($codigos_repeater as $codigo_item) {
                    $codigo = isset($codigo_item['codigo']) 
                              ? (is_array($codigo_item['codigo']) 
                                  ? implode(', ', $codigo_item['codigo']) 
                                  : sanitize_text_field($codigo_item['codigo'])) 
                              : '';

                    $estado = isset($codigo_item['estado']) 
                              ? (is_array($codigo_item['estado']) 
                                  ? implode(', ', $codigo_item['estado']) 
                                  : sanitize_text_field($codigo_item['estado'])) 
                              : '';
                    $new_estado = !empty($estado) ? 1 : 0;
                    $flattened_array[] = array(
                        'ID' => $post->ID,
                        'title' => sanitize_text_field(get_the_title($post)),
                        'codigo' => $codigo,
                        'estado' => $new_estado,
                    );
                }
            }
        }


        return json_encode($flattened_array, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        // exit;
    }
}


