<?php
/* Cart page template */
get_header();
?>

<main class="cottage-cart py-5 site-brand-wrap-soft-shop">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10">

        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>

            <header class="cart-header text-center mb-4">
              <h1 class="cart-title"><?php the_title(); ?></h1>
              <p class="text-muted">Review your treats before checkout.</p>
            </header>

            <?php if ( function_exists( 'WC' ) ) : ?>
              <?php echo do_shortcode( '[woocommerce_cart]' ); ?>
            <?php else : ?>
              <p>The store cart is currently unavailable.</p>
            <?php endif; ?>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
</main>

<!-- Closing call to action -->
  <section class="py-5 site-brand-wrap-reverse">
    <div class="container text-center">
      <h2 class="recipes-heading">Already placed an order?</h2>
      <p class="text-muted">Provide order number and email.</p>
      <a href="<?php echo esc_url(home_url('/order-tracking/')); ?>" class="btn btn-dark site-brand-wrap-soft-reverse text-dark">Track order</a>
    </div>
  </section>

<?php get_footer(); ?>
