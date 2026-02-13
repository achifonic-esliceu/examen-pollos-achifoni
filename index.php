<?php get_header(); ?>

<section class="page-content">
  <div class="container">
    <h1>Blog</h1>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article style="margin-bottom:20px; padding-bottom:14px; border-bottom:1px solid rgba(12,34,67,.15);">
        <h2 style="margin:0 0 6px;">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div style="color:rgba(12,34,67,.75);">
          <?php the_excerpt(); ?>
        </div>
      </article>
    <?php endwhile; else: ?>
      <p>No hay entradas.</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
