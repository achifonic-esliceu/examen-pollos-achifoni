<?php
require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

add_action('after_setup_theme', function () {
  register_nav_menus([
    'primary' => 'Menú principal',
  ]);
});
