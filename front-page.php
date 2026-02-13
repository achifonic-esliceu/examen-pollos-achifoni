<?php get_header(); ?>

<!-- big.jpg above jumbotron (PDF) -->
<div class="top-banner">
  <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/big.jpg'); ?>" alt="Big header">
</div>

<section class="jumbo">
  <div class="jumbo-bg" style="background-image:url('<?php echo esc_url(get_template_directory_uri() . '/assets/jumboindex.jpg'); ?>');"></div>
  <div class="container">
    <h1>Los Pollos Hermanos</h1>
    <p>Welcome to our family</p>
  </div>
</section>

<section class="home-cards">
  <div class="container">
    <div class="cards-row">

      <!-- Card 1: Our menu -->
      <article class="home-card">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/burger.jpg'); ?>" alt="Our menu">
        <div class="card-body">
          <h3>Our menu</h3>
          <p>We found a great selection of products</p>
          <a class="btn-blue" href="<?php echo esc_url(home_url('/products')); ?>">
            Select your menu
          </a>
        </div>
      </article>

      <!-- Card 2: Distribution -->
      <article class="home-card">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/truck.jpg'); ?>" alt="Distribution">
        <div class="card-body">
          <h3>Distribution</h3>
          <p>We deliver around New Mexico</p>
          <a class="btn-blue" href="<?php echo esc_url(home_url('/distribution')); ?>">
            Make an order
          </a>
        </div>
      </article>

    </div>
  </div>
</section>

<?php get_footer(); ?>
