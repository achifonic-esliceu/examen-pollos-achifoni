<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header class="site-header">
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container">

      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/logo.png'); ?>" alt="Logo">
        <span><?php bloginfo('name'); ?></span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNav"
        aria-controls="primaryNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="primaryNav">
        <?php
wp_nav_menu([
  'theme_location' => 'primary',
  'container'      => false,
  'menu_class'     => 'nav',
  'fallback_cb'    => ['WP_Bootstrap_Navwalker', 'fallback'],
  'walker'         => new WP_Bootstrap_Navwalker(),
]);
?>

      </div>

    </div>
  </nav>
</header>
