<?php
/**
 * Template Name: Distribution
 */
get_header();
?>

<div class="top-banner">
  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/big.jpg'); ?>" alt="Big header">
</div>

<section class="jumbo">
  <div class="jumbo-bg" style="background-image:url('<?php echo esc_url(get_template_directory_uri() . '/assets/jumbodis.jpg'); ?>');"></div>
  <div class="container">
    <h1>Distribution</h1>
  </div>
</section>

<section class="page-content">
  <div class="container">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="entry-content">
        <?php the_content(); ?>
      </div>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>
