<?php

class RepositoryTax{

  private  string $taxonomy = 'category';
  private  string $tax_slug = '';

  public function __construct($params) {
    $this->taxonomy = $params['taxonomy'];
    $this->tax_slug = $params['tax_slug'];
  }

  public function get_tax_by_slug() {
    $parent_term = get_term_by('slug', $this->tax_slug, $this->taxonomy);
    
    if(empty($parent_term)){
      return array( 
        'error' => 'Taxonomy not found'
      );
    }

    $childs_terms = get_terms( 
      $this->taxonomy, 
        array( 
          'parent' => $parent_term->term_id,
          'hide_empty' => true
        ) 
    );

    foreach ($childs_terms as $key => $value) {
      $childs_terms[$key] = [
        'id' => $value->term_id,
        'name' => $value->name,
        'slug' => $value->slug
      ];
    }

    return array_values($childs_terms); 
  }

}