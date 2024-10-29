<?php
/**
 * Template Name: Comercio
 */

 if (!is_user_logged_in()) {
  wp_redirect('https://beneficioscolombia.smartfitcolombia.com/');
  exit;
}
 
if ( current_user_can('administrator') ) {
  wp_redirect( admin_url() );
  exit;
}

 get_header();

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

            <div class="comercio-content">
              <div class="comercio-head" style="background-image: url(<?php the_field('imagen_url'); ?>)">
              </div>
              <div class="comercio-head__content">
                <h1 class="comercio-head__title"><?php the_title(); ?></h1>
              </div>
              <div class="comercio-body">
                <div class="comercio-body__descuento">
                  <h2 class="comercio-body__test-discount"><b><?php the_field('porcentaje_descuento'); ?></b> <?php the_field('texto_descuento'); ?></h2>
                </div>
                <div class="comercio-body__desc">
                  <!-- <?php the_field('texto_descriptivo'); ?> -->
                </div>
                <div class="comercio-validation">
                  <div class="comercio-validation__content">
                    <h3 class="comercio-validation__title">Valida que el usuario sea <b>BLACK</b></h3>
                    <input type="text" name="cedula" id="cedula" placeholder="Cédula del usuario" class="comercio-validation__input">
                    <div class="comercio-validation__footer">
                      <p class="btn js-btn-validate">Validar</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="comercio-val">
                <dialog class="comercio-modal">
                  <div class="comercio-modal__content">
                    <span class="close-modal__close">x</span>
                    <div class="comercio-modal__response js-render-result"></div>
                  </div>
              </dialog>
              </div>
            </div>

          <?php
        }
      }
    ?>


</main>


<?php 
get_footer();