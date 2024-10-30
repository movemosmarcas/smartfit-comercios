<?php 

/** 
 * Template Name: Home
 */

 if (is_user_logged_in() && !is_admin()) {
  wp_redirect(home_url('index.php/comercio/'));
  exit;
}
 
get_header(); ?>

<div class="home">
  <div class="home-content">
    
    <div class="home__right">
      <img class="home__logo" src="<?php echo PATH_STYLE; ?>/assets/icons/logo.png" alt="SmarFit">
      <div class="home__form">
        <h1 class="home__form-title">Beneficios Black</h1>
        <div class="home__form-content">
          <h2 class="home__form-subtitle">Inicia sesión para continuar</h2>
          <?php the_content(); ?>
        </div>
      </div>
    </div>

    <div class="home__left"></div>
  </div>
</div>



<?php get_footer();