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
        'name' => $this->repositorySlug,
        'posts_per_page' => -1
      );

      if (!empty($this->title)) {
        $args['s'] = $this->title;
      }
    
      if(!empty($this->terms_id) && !empty($this->tax)){
        $args['tax_query'] = array(
          array(
            'taxonomy' => $this->tax,
            'field' => 'term_id',
            'terms' => explode(',', $this->terms_id),
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

      $post_id = $this->params['id'];
      $codigos = $this->params->get_param('codigos'); 
      $i = $this->params->get_param('iteration');

      if( have_rows('codigos', $post_id) ) {
          while( have_rows('codigos', $post_id) ) {
              the_row();
              update_sub_field(array($i + 1, 'estado'), $codigos[$i]['estado'], $post_id);
          }
      }
  
      return new WP_REST_Response('Estado actualizado', 200);

    }

}