<?php
add_action('wp_enqueue_scripts', function () {

  // Google Font Open Sans (300,400,700)
  wp_enqueue_style(
    'pollos-fonts',
    'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap',
    [],
    null
  );

  // Bootstrap 4 (ONLY required by exam for navbar)
  wp_enqueue_style(
    'bootstrap4',
    'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css',
    [],
    '4.6.2'
  );

  // Theme CSS
  wp_enqueue_style(
    'pollos-style',
    get_stylesheet_uri(),
    ['bootstrap4','pollos-fonts'],
    filemtime(get_stylesheet_directory() . '/style.css')
  );

  // Bootstrap JS (needs jQuery which WP includes)
  wp_enqueue_script(
    'bootstrap4',
    'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js',
    ['jquery'],
    '4.6.2',
    true
  );
});
