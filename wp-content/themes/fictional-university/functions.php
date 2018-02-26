<?php 
    // This action loads all stylesheets and javascripts
   function university_styles() {
    wp_enqueue_script('main_js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('main_styles', get_stylesheet_uri(), NULL, microtime());
  }
  
    // This action registers menu locations within the WordPress Dashboard.  
    function university_features() {
      register_nav_menu('header_menu_location', 'Header Menu Location');
      register_nav_menu('footer_location_1', 'Footer Location One');
      register_nav_menu('footer_location_2', 'Footer Location Two');
      add_theme_support('title-tag');
    }

    // This action orders events on the archive-events.php in ascending order. It also does not show events that have already happened.
    function university_adjust_queries($query) {
        // Make sure you are not viewing from the Dashboard and that the main WordPress query is 'event'.
        if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
            $today = date('Ymd');
            $query->set('meta_key', 'event_date');
            $query->set('orderby', 'meta_value_num');
            $query->set('order', 'asc');
            $query->set('meta_query', array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                )
            ));
        }
    }
      
    // These helper methods register actions into Wordpress. The first argument is the type of action (built into WordPress). The second argument is the name of your custom function.
    add_action('wp_enqueue_scripts', 'university_styles');
    add_action('after_setup_theme', 'university_features');
    add_action('pre_get_posts', 'university_adjust_queries');
?>