<?php

  class RepositorySlug
  {
    private $repositorySlug;
    private $post_type = 'page';

    public function __construct($params){
      
      $this->post_type  = $params->get_param('post_type');
      $this->repositorySlug = $params->get_param('slug');
      $this->only_acf = $params->get_param('only_acf');
    }

    public function get_page_data_by_slug() {
 
      $loop = new WP_Query(
        array(
          'post_type' => $this->post_type, 
          'name' => $this->repositorySlug)
      );
      
      $all_pages_data = array();
  
      if ($loop->have_posts()) {
          while ($loop->have_posts()) {
              $loop->the_post();
              
              if($this->only_acf !== 'true') {
                $page = array(
                  'title'       => get_the_title(),
                  'url'         => get_the_permalink(),
                  'image'       => get_the_post_thumbnail_url(get_the_ID()),
                  'content'     => get_the_content(),
                  'description' => get_the_excerpt(),
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
}