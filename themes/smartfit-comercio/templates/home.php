<?php 

/** 
 * Template Name: Home
 */
get_header(); ?>

<div class="home">
  <div class="home-content">
    
    <div class="home__right">
      <img class="home__logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/logo.png" alt="SmarFit">
      <div class="home__form">
        <h1 class="home__form-title">Beneficios Black</h1>
        <div class="home__form-content">
          <h2 class="home__form-subtitle">Inicia sesión para continuar</h2>
        <?php
            $args = array(
                'echo'           => true,        
                'redirect'       => home_url('/index.php/comecio/'),  
                'form_id'        => 'loginform', 
                'label_username' => __( 'Nombre de usuario' ),
                'label_password' => __( 'Contraseña' ),
                'label_remember' => __( 'Recuérdame' ),
                'label_log_in'   => __( 'Iniciar sesión' ),
                'remember'       => true         
            );

            wp_login_form( $args );
          ?>
        </div>
      </div>
    </div>

    <div class="home__left"></div>
  </div>
</div>



<?php get_footer();