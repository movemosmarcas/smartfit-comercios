<?php 

/** Register all custom post type */
require_once 'tax-constructor.php';
require_once 'cpt-constructor.php';


/** Create CPT **/
// new CustomPostType(name, single name, related taxonomies, dash icon, type, register name, 'show in menu', has archive, 'rute name )
new CustomPostTypeAPI('Comercios', 'comercios', array('categorias'), 'building', 'post', 'comercios', false, true, 'comercios' );

add_action( 'init', 'register_custom_taxonomy', 10 );
function register_custom_taxonomy() {
  new CustomTaxonomyAPI('Categorias', true, 'filter', 'categorias', array('comercios'));
}
