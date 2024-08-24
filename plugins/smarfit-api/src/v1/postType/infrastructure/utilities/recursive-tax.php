<?php 

function get_childs($slug_tax, $parent_id) {

  $args = array(
    'parent' => $parent_id,
    'taxonomy' => $slug_tax,
    'hide_empty' => true
  );

  $terms = get_terms($args);

  $new_terms = [];

  foreach ($terms as $value) {
    
    
    $new_terms[] = [
      'id' => $value->term_id,
      'parent' => $value->parent,
      'name' => $value->name,
      'slug' => $value->slug
    ];
    
    $new_terms = array_merge($new_terms, get_childs($slug_tax, $value->term_id));

  }

  return $new_terms;

}

function get_terms_heraquical($slug_tax, $id_post) {

  $terms = wp_get_post_terms($id_post, $slug_tax);
  $new_terms = [];

  foreach ($terms as $value) {
    if($value->parent == 0) {

      $new_terms[] = [
        'id' => $value->term_id,
        'parent' => $value->parent,
        'name' => $value->name,
        'slug' => $value->slug,
        'childs' => get_childs($slug_tax, $value->term_id)
      ];
  
      
    }

  }

  return $new_terms;

}