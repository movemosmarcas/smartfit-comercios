<?php

  class RepositorySlug
  {
    private $repositorySlug;
    private $post_type = 'page';
    private $only_acf = 'false';
    private $id;
    private $tax = 'category';
    private $terms_id = '';
    private $title = '';
    private $params;

    public function __construct($params){
      $this->params = $params;
      $this->post_type  = $params->get_param('post_type');
      $this->repositorySlug = $params->get_param('slug');
      $this->only_acf = $params->get_param('only_acf');
      $this->id = $params->get_param('id');
      $this->tax = $params->get_param('tax');
      $this->terms_id = $params->get_param('ids');
      $this->title = $params->get_param('title');
    }

    public function get_page_data_by_slug() {

      $args =  array(
        'post_type' => $this->post_type, 
        'posts_per_page' => -1,
        'orderby' => 'name',
        'order' => 'ASC'
      );

      if( $this->repositorySlug !== 'none'){
        $args['name'] = str_replace('-', ' ', $this->repositorySlug);
      }

      if (!empty($this->title)) {
        $args['s'] = $this->title === 'all' ? '' : $this->title;
      }
    
      if(!empty($this->terms_id) && !empty($this->tax)){
        $args['tax_query'] = array(
          array(
            'taxonomy' => $this->tax,
            'field' => 'term_id',
            'terms' => explode('-', $this->terms_id),
            'operator' => 'AND'
          )
        );
      } 

      $loop = new WP_Query($args);
      
      if($this->id){
        $loop['id'] = $this->id;
      }
      
      $all_pages_data = array();
  
      if ($loop->have_posts()) {
          while ($loop->have_posts()) {
              $loop->the_post();
              $current_date = new DateTime(date('Y-m-d'));
              $validation_date = get_field('fecha_de_valides', get_the_ID());
              $fecha_de_until = get_field('fecha_de_until', get_the_ID()) ?? false;

              $validation_startDate = DateTime::createFromFormat('d/m/Y', $validation_date);
              $validation_endDate = $fecha_de_until 
                ? DateTime::createFromFormat('d/m/Y', $fecha_de_until) 
                : new DateTime(date('Y-m-d', strtotime('+1 day')));

              $validation = $current_date > $validation_startDate && $current_date < $validation_endDate;
              if($validation_date === '') $validation = false; 

              if($this->only_acf !== 'true') {
                $page = array(
                  'id'          => get_the_ID(),
                  'slug'        => get_post_field('post_name'),
                  'image'       => get_the_post_thumbnail_url(get_the_ID()),
                  'title'       => get_the_title(),
                  'url'         => get_the_permalink(),
                  'content'     => get_the_content(),
                  'description' => get_the_excerpt(),
                  'allTaxonomy' => get_terms_heraquical('filtros', get_the_ID()),
                  'cupon_status' => $validation ? 1 : 0, 
                );
              }
              
                if (function_exists('get_fields')) {
                  $acf_fields = get_fields();

                  if ($acf_fields) {
                      $page  = array_merge($page, $acf_fields);
                  } else {
                      $page  = array_merge($page, array('acf' => 'no data found'));
                  }
              }
              $all_pages_data[] = $page;
          }
          wp_reset_postdata();
      }
  
      return $all_pages_data;
    }

    public function put_check() {

      $post_id = $this->params['update_id'];
      $i = 0;

      if( have_rows('codigos', $post_id) ) {
        while( have_rows('codigos', $post_id) ) {
          the_row();
          $status = get_sub_field('estado', $post_id);         
            if($status[0] !== "true"){
              update_post_meta($post_id, 'codigos_'.$i.'_estado', 'true');
              return new WP_REST_Response('Código entregado', 200);
            }
          $i++;
        }
      }
      return new WP_REST_Response('--', 200);

    }

}