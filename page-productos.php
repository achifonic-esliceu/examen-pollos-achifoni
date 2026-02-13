<?php
/**
 * Template Name: Products
 */
get_header();
?>

<div class="top-banner">
  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/big.jpg'); ?>" alt="Big header">
</div>

<section class="jumbo">
  <div class="jumbo-bg" style="background-image:url('<?php echo esc_url(get_template_directory_uri() . '/assets/jumboproducts.jpg'); ?>');"></div>
  <div class="container">
    <h1>Los Pollos Hermanos</h1>
    <p>Our products</p>
  </div>
</section>

<section class="products-wrap">
  <div class="container">
    <div class="products-grid">
      <?php for ($i=1; $i<=9; $i++): ?>
        <img
          src="<?php echo esc_url(get_template_directory_uri() . '/assets/p' . $i . '.jpg'); ?>"
          alt="<?php echo esc_attr('Product ' . $i); ?>"
        >
      <?php endfor; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
