<?php
/**
 * Custom single product template for Alchemy Cottage.
 * Custom version: 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$product_id = get_queried_object_id();
$product    = wc_get_product( $product_id );

get_header();

if ( ! $product ) {
    echo '<main class="container py-5"><p>Product not found. Make sure this page is a WooCommerce product.</p></main>';
    get_footer();
    return;
}

$ingredients     = $product->get_meta( '_ingredients' );
$allergens       = $product->get_meta( '_allergen_details' );
$product_details = $product->get_meta( '_product_details' );
$items_per_pack  = absint( $product->get_meta( '_products_per_pack' ) );

$product_cat_name = '';
$product_cat_url  = '';

$product_cats = get_the_terms( $product->get_id(), 'product_cat' );


if ( $product_cats && ! is_wp_error( $product_cats ) ) {
    $primary_cat = $product_cats[0];

    $product_cat_name = $primary_cat->name;

    $cat_link = get_term_link( $primary_cat );
    if ( ! is_wp_error( $cat_link ) ) {
        $product_cat_url = $cat_link;
    }
}

$product_cat_lower = $product_cat_name ? mb_strtolower( $product_cat_name ) : 'treats';


?>

<style>
  .product-title,
  .product-section-title {
    font-family: Georgia, serif;
  }

  .product-photo {
    width: 100%;
    max-height: 560px;
    object-fit: cover;
  }

  .product-panel {
    top: 2rem;
  }
</style>

<main>
  <div class="site-brand-wrap-soft-shop">
  <?php do_action( 'woocommerce_before_single_product' ); ?>
  <section class="container py-4">
    <p class="text-muted mb-4">
  <a href="<?php echo esc_url( home_url( '/shop/' ) ); ?>" class="text-muted">Shop</a>
  <?php if ( $product_cat_name ) : ?>
    /
    <!--<a href="<?php echo esc_url( $product_cat_url ); ?>" class="text-muted"><?php echo esc_html( $product_cat_name ); ?></a>-->
    <a class="text-muted"><?php echo esc_html( $product_cat_name ); ?></a>
  <?php endif; ?>
</p>


    <div class="row">
  <div class="col-lg-7 mb-4 product-img">
    <?php
        $image_id = $product->get_image_id();

        if ( $image_id ) {
            echo wp_get_attachment_image(
                $image_id,
                'large',
                false,
                array( 'class' => 'img-fluid rounded shadow product-photo' )
            );
        } else {
            echo '<p>No product image is assigned to this product.</p>';
        }
    ?>
  </div>

  <div class="col-lg-5">
        <div class="product-panel">
                            <!--'<a class="text-muted" href="%1$s">%2$s</a>',-->
          
        <?php
            $product_tags = get_the_terms( $product->get_id(), 'product_tag' );

            if ( $product_tags && ! is_wp_error( $product_tags ) ) :
                $tag_links = array();

                foreach ( $product_tags as $tag ) {
                    $tag_url = get_term_link( $tag );

                    if ( ! is_wp_error( $tag_url ) ) {
                        $tag_links[] = sprintf(
                            '<a class="text-muted">%2$s</a>',
                            esc_url( $tag_url ),
                            esc_html( $tag->name )
                        );
                    }
                }

            if ( $tag_links ) :
        ?>
        <p class="text-muted text-uppercase small mb-2">
            <?php echo implode( ', ', $tag_links ); // Escaped above. ?>
        </p>
        <?php
            endif;
        endif;
        ?>


          <h1 class="product-title display-4">
              <?php echo esc_html( $product->get_name() ); ?>
          </h1>

          <p class="text-warning mb-3" aria-label="Five out of five demo stars">
           <!-- ★★★★★ <span class="text-muted small">5.0 · <?php echo get_comments_number() ; ?> reviews</span>-->
            <span class="text-muted small"><?php echo get_comments_number() ; ?> reviews</span>
          </p>

          <p class="lead">
              <?php echo wp_kses_post( $product->get_short_description() ); ?>
          </p>

          <p class="h3 mb-4"><?php echo wp_kses_post( $product->get_price_html() ); ?><small class="text-muted"> </small></p>

          <div class="cottage-add-to-cart">
            <?php woocommerce_template_single_add_to_cart(); ?>
          </div>


          <p class="small text-muted mt-3 mb-0">
            Statement: “Made in a cottage food operation that is not subject to Florida's food safety regulations.”
          </p>

          <div class="alert alert-success mt-3 d-none" id="cartMessage" role="status" aria-live="polite"></div>

          <div class="border-top mt-4 pt-3">
            <?php if ( $items_per_pack ) : ?>
                <p><strong>Pack size:</strong>
                    <?php echo esc_html( $items_per_pack ); ?> items
                </p>
                <?php endif; ?>
            <p class="mb-0"><strong>Availability:</strong> Contact us to ask about the current batch.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
            </div>

  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <h2 class="product-section-title mb-3">A little more about these <?php echo esc_html( $product_cat_lower ); ?></h2>

          <p>
            <?php if ( $product->get_description() ) : ?>
             <?php echo apply_filters( 'the_content', $product->get_description() ); ?>
            <?php endif; ?>
          </p>

          <?php if ( $ingredients || $allergens ) : ?>
  <!--<h3 class="h5 mt-4">Ingredients and allergen details</h3>-->

  <?php if ( $ingredients ) : ?>
    <p><strong>Ingredients:</strong><br>
      <?php echo nl2br( esc_html( $ingredients ) ); ?>
    </p>
  <?php endif; ?>

  <?php if ( $allergens ) : ?>
    <p><strong>Allergen details:</strong><br>
      <?php echo nl2br( esc_html( $allergens ) ); ?>
    </p>
  <?php endif; ?>
<?php endif; ?>

        </div>

        <div class="col-lg-4 offset-lg-1 mt-4 mt-lg-0">
          <?php if ( $items_per_pack || $product_details ) : ?>
  <div class="bg-white border rounded p-4 mb-2 site-brand-wrap-soft-reverse">
    <h2 class="h5 product-section-title">Product details</h2>

    <ul class="mb-0 pl-3">
      <?php if ( $items_per_pack ) : ?>
        <li><?php echo esc_html( $items_per_pack ); ?> items per pack</li>
      <?php endif; ?>

      <?php if ( $product_details ) : ?>
        <li><?php echo nl2br( esc_html( $product_details ) ); ?></li>
      <?php endif; ?>
    </ul>
  </div>
<?php endif; ?>
          

        <?php
        $recipe_id = absint( $product->get_meta( '_linked_recipe_id' ) );

        if (
            $recipe_id &&
            'recipe' === get_post_type( $recipe_id ) &&
            'publish' === get_post_status( $recipe_id )
        ) :
        ?>

         <div class="mt-3">
            <strong>View recipe:</strong>
              <ul class="mb-0">
                <li>
                    <a href="<?php echo esc_url( get_permalink( $recipe_id ) ); ?>">
                        <?php echo esc_html( get_the_title( $recipe_id ) ); ?>
                    </a>
                </li>
              </ul>
          </div>
        <?php endif; ?>


        </div>      
      </div>
    </div>
  </section>
</main>

  <?php comments_template(); ?> 

<!--
<script>
document.addEventListener('DOMContentLoaded', function () {
  var button = document.getElementById('addToCart');
  var quantityInput = document.getElementById('productQuantity');
  var message = document.getElementById('cartMessage');
  var cartCount = 0;

  button.addEventListener('click', function () {
    var quantity = parseInt(quantityInput.value, 10);

    if (!Number.isInteger(quantity) || quantity < 1 || quantity > 10) {
      message.textContent = 'Please choose a quantity from 1 to 10.';
      message.classList.remove('d-none');
      message.classList.remove('alert-success');
      message.classList.add('alert-warning');
      return;
    }

    cartCount += quantity;
    message.textContent =
      quantity + ' demo item(s) added. Demo cart count: ' + cartCount +
      '. No order has been placed.';
    message.classList.remove('d-none', 'alert-warning');
    message.classList.add('alert-success');
  });
});
</script>
-->
<?php get_footer(); ?>
