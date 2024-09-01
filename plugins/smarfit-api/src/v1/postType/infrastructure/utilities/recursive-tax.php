<?php 

function loop_childs($terms, $parent_id) {
  $new_terms = [];

  foreach ($terms as $value) {
    if($value->parent == $parent_id) {

      $new_terms[] = [
        'id' => $value->term_id,
        'parent' => $value->parent,
        'name' => $value->name,
        'slug' => $value->slug,
        //'childs' => loop_childs($terms, $value->parent)
      ];
  
      
    }

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
        'childs' => loop_childs($terms, $value->term_id)
      ];
  
      
    }

  }

  return $new_terms;

}