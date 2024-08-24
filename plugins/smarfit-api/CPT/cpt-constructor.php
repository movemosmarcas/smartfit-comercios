<?php 
/** Constructor for custom post types **/

class CustomPostTypeAPI
{
    private $name;
    private $singular_name;
    private $taxonomies;
    private $menu_icon;
    private $capabilities;
    private $register_post_type_name;
    private $show_in_menu;
    private $has_archive;
    private $rewrite;

    public function __construct(
        $name,
        $singular_name,
        $taxonomies,
        $menu_icon,
        $capabilities,
        $register_post_type_name,
        $has_archive = true,
        $show_in_menu = true,
        $rewrite = ''
    ) {
        $this->name = $name;
        $this->singular_name = $singular_name;
        $this->taxonomies = $taxonomies;
        $this->menu_icon = $menu_icon;
        $this->capabilities = $capabilities;
        $this->register_post_type_name = $register_post_type_name;
        $this->show_in_menu = $show_in_menu;
        $this->has_archive = $has_archive;
        $this->rewrite = $rewrite;

        add_action('init', array($this, 'register_and_add_caps'));

    }


    public function register_and_add_caps() {
        $this->register_custom_post_type();
        $this->custom_cop_add_caps();
    }

    public function register_custom_post_type(){
        $labels = array(
            'name' => $this->name,
            'singular_name' => $this->singular_name,
            'capabilities' => $this->capabilities
        );

        $supports = array(
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'trackbacks',
            'revisions',
            'custom-fields',
            'page-attributes'
        );

        $args = array(
            'labels' => $labels,
            'description' => $this->singular_name,
            'supports' => $supports,
            'taxonomies' => $this->taxonomies,
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => $this->show_in_menu,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 30,
            'can_export' => true,
            'has_archive' => $this->has_archive,
            'menu_icon' => 'dashicons-' . $this->menu_icon,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'capability_type' => array($this->register_post_type_name, $this->register_post_type_name . 's'),
            'show_in_rest' => true,
            'rewrite' => array('slug' => $this->rewrite == '' ? $this->register_post_type_name : $this->rewrite  ),
        );

        register_post_type($this->register_post_type_name, $args);
    }

    /** Add custom capabilities for this cpt */
    public function custom_cop_add_caps() {
        $admin_role = get_role('administrator'); 
        
        if ($admin_role) {
        $admin_role->add_cap('edit_'.$this->register_post_type_name);
        $admin_role->add_cap('edit_'.$this->register_post_type_name.'s');
        $admin_role->add_cap('edit_others_'.$this->register_post_type_name);
        $admin_role->add_cap('edit_others_'.$this->register_post_type_name.'s');
        $admin_role->add_cap('publish_'.$this->register_post_type_name.'s');
        $admin_role->add_cap('read_'.$this->register_post_type_name);
        $admin_role->add_cap('delete_'.$this->register_post_type_name);
        $admin_role->add_cap('delete_'.$this->register_post_type_name.'s');
        $admin_role->add_cap('delete_others_'.$this->register_post_type_name);
        $admin_role->add_cap('delete_others_'.$this->register_post_type_name.'s');
        $admin_role->add_cap('read_private_'.$this->register_post_type_name.'s');
        }
    }
  
}