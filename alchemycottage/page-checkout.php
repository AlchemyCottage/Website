<?php
/* Checkout page template */
get_header();
?>

<main class="cottage-checkout py-5 site-brand-wrap-soft-shop">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-lg-10">

        <?php if ( have_posts() ) : ?>
          <?php while ( have_posts() ) : the_post(); ?>

            <header class="checkout-header text-center mb-4">
              <h1 class="checkout-title"><?php the_title(); ?></h1>
              <?php if ( ! function_exists( 'is_order_received_page' ) || ! is_order_received_page() ) : ?>
                 <p class="text-muted">Enter your details to complete your order.</p>
              <?php endif; ?>
             
            </header>

            <?php if ( function_exists( 'WC' ) ) : ?>
              <?php echo do_shortcode( '[woocommerce_checkout]' ); ?>
            <?php else : ?>
              <p>Checkout is currently unavailable.</p>
            <?php endif; ?>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>

  
</main>

<div class="cottage-checkout site-brand-wrap-reverse">
<div class="container">
  <div class="row justify-content-center">
      <div class="col-12 col-lg-10">
<div class="p-3 border bg-light rounded mb-3">
          <strong>Required statement:</strong>
          <p class="mb-0">“Made in a cottage food operation that is not subject to Florida's food safety regulations.”</p>
        </div>
            </div>
            </div>
            </div>

    <div class="py-4">
            </div>
            </div>
<?php get_footer(); ?>
