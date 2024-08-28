<?php
/**
 * Template Name: Comercio
 */
 
 get_header();

  if (!is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
  }
 
  $current_user = wp_get_current_user();
  $user_id = $current_user->ID;
?>

<main class="comercio">

  <?php 

      $args = array(
        'post_type' => 'comercios',
        'per_page' => 1,
        'meta_query' => array(
          array(
            'key' => 'usuario_comercio',
            'value' => $user_id,
            'compare' => '='
          )
        )
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) {

        while ($query->have_posts()) {
          $query->the_post(); ?>
          <h1 class="comercio__title">
            <?php the_title(); ?>
          </h1>
          <?php
        }

      }
    ?>

</main>


<?php 
get_footer();