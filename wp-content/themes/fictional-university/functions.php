<?php 
  function university_styles() {
    wp_enqueue_script('main_js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
    wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font_awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('main_styles', get_stylesheet_uri(), NULL, microtime());
  }
  add_action('wp_enqueue_scripts', 'university_styles');

  function university_features() {
      register_nav_menu('header_menu_location', 'Header Menu Location');
      register_nav_menu('footer_location_1', 'Footer Location One');
      register_nav_menu('footer_location_2', 'Footer Location Two');
      add_theme_support('title-tag');
  }

  add_action('after_setup_theme', 'university_features');
?>