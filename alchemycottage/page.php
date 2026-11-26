<?php get_header(); ?>



<main class="">
  <?php
  while ( have_posts() ) :
    the_post();
    ?>
    <article <?php post_class(); ?>>
      <div class="site-brand-wrap-soft-shop">
        <div class="container py-4">
      <h1><?php the_title(); ?></h1>
  </div>
  </div>
    <div class="site-brand-wrap-reverse">
      <div class="page-content container py-2">
        <?php the_content(); ?>
      </div>
  </div>
    </article>
    <?php
  endwhile;
  ?>
</main>


<?php get_footer(); ?>