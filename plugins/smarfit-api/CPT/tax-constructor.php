<?php

class CustomTaxonomyAPI {

    public function __construct(
			$name, 
			$hierarchical, 
			$rewrite_text, 
			$taxonomy_name, 
			$associated_cpts
		) {
        $labels = array(
            'name'              => _x( $name, 'taxonomy general name' ),
            'singular_name'     => _x( $name, 'taxonomy singular name' ),
            'search_items'      => __( 'Buscar ' . $name ),
            'all_items'         => __( 'Todas las ' . $name ),
            'edit_item'         => __( 'Editar ' . $name ),
            'update_item'       => __( 'Actualizar ' . $name ),
            'add_new_item'      => __( 'Agregar ' . $name ),
            'new_item_name'     => __( 'Nueva ' . $name ),
            'menu_name'         => __( $name ),
        );

        $args   = array(
            'hierarchical'      => $hierarchical, 
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => $rewrite_text ),
            'show_in_rest'      => true,
        );

        register_taxonomy( $taxonomy_name, $associated_cpts, $args );
    }
}