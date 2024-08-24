<?php 

function u_args_pt($post_type, $per_page = -1, $order='desc', $orderby='date', $tax_filter = null, $tax_term = null) {

  $args =  array(
    'post_type' => $post_type,
    'posts_per_page' => $per_page,
    'order' => $order,
    'orderby' => $orderby,
  );

  if ($tax_filter) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => $tax_filter,
        'field' => 'slug',
        'terms' => $tax_term
      )
    );
  }

  return $args;

}