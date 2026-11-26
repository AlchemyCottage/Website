<?php
/* Order lookup page */
get_header();
?>

<main class="cottage-order-lookup py-5 site-brand-wrap-soft-shop">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">

        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>

            <header class="text-center mb-4">
              <!--<h1 class="order-lookup-title"><?php the_title(); ?></h1>-->
              <h1 class="order-lookup-title">Track Order</h1>
              <p class="text-muted">
                Enter your order number and billing email to view your order status.
              </p>
            </header>

            <?php echo do_shortcode( '[woocommerce_order_tracking]' ); ?>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
</main>


<!-- Closing call to action -->
  <section class="py-5 site-brand-wrap-reverse">
    <div class="container text-center">
      <h2 class="recipes-heading">Having troubles?</h2>
      <p class="text-muted">Tell us what you’re experiencing, or ask us a question.</p>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-dark site-brand-wrap-soft-reverse text-dark">Get in touch</a>
    </div>
  </section>

<?php get_footer(); ?>
