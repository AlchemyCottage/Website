<?php
/* Shop page template */
get_header();

/* echo '<p style="background:yellow;color:black;padding:12px">ARCHIVE-PRODUCT TEMPLATE LOADED</p>'; */

$shop_image = function ($filename) {
    return esc_url(get_template_directory_uri() . '/assets/images/shop/' . $filename);
};
?>

<style>
  .shop-hero .carousel-item {
    height: 400px;
    background: #493329;
  }

  .shop-hero .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: .6;
  }

  .shop-hero .carousel-caption {
    bottom: 18%;
  }

  .shop-heading,
  .product-title {
    font-family: Georgia, serif;
  }

  .shop-product img {
    height: 230px;
    object-fit: cover;
  }

  .shop-category.active {
    color: #fff;
    background-color: #343a40;
  }
</style>

<main>
  <!-- Shop photo carousel -->
   <!-- Cottage-food information -->
<section class="py-5 cottage-food-section"
         style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/assets/images/florida-flag.jpg' ); ?>');">
  <div class="container">
    <div class="mx-auto cottage-food-panel" style="max-width: 850px;">

        <h2 class="shop-heading text-center mb-3">Made under Florida’s cottage-food rules</h2>
        <p>
          We intend to offer only products that qualify under Florida’s cottage-food
          requirements. Product eligibility can depend on the exact recipe and
          preparation following the guidelines by <a href="https://www.fdacs.gov/Business-Services/Food/Food-Establishments/Cottage-Foods"
             target="_blank" rel="noopener noreferrer">FDACS Cottage Foods</a>.</p>

        <h3 class="h5 mt-4">Product packaging and labels</h3>
        <p>Each product’s actual package label will be prepared for that specific item and include applicable required information, such as:</p>
        <ul>
          <li>Product name and cottage food operation name and address</li>
          <li>Ingredients listed in descending order by weight</li>
          <li>Net weight or net volume</li>
          <li>Allergen information</li>
          <li>The required cottage-food statement</li>
        </ul>

        <div class="p-3 border bg-white rounded mb-3">
          <strong>Required statement:</strong>
          <p class="mb-0">“Made in a cottage food operation that is not subject to Florida's food safety regulations.”</p>
        </div>

        <p class="small text-muted">
          This is a mom and pop's general partnership food cottage business in compliance with the laws set forth by Florida Statutes s. (<a class="link" target="_blank" href="https://www.leg.state.fl.us/statutes/index.cfm?mode=View%20Statutes&SubMenu=1&App_mode=Display_Statute&Search_String=500.80&URL=0500-0599/0500/Sections/0500.80.html">500.80</a>).
        </p>
      </div>
    </div>
  </section>
  <!-- Intro and product filters -->
  <section class="py-5 site-brand-wrap-soft-shop">
    <div class="container">
      <h2 class="shop-heading text-center mb-2">The Cottage Shop</h2>
      

      <div class="d-flex flex-wrap justify-content-center">
        <div class="shop-category-buttons">
          <button type="button"
                  class="btn btn-outline-dark shop-category site-brand-wrap-soft-reverse active"
                  data-category="all">
            All treats
          </button>

          <?php
          $product_categories = get_terms( array(
              'taxonomy'   => 'product_cat',
              'hide_empty' => true,
              'exclude'    => array( get_option( 'default_product_cat' ) ),
          ) );

          if ( ! is_wp_error( $product_categories ) ) :
              foreach ( $product_categories as $category ) :
          ?>
            <button type="button"
                    class="btn btn-outline-dark shop-category site-brand-wrap-soft-reverse"
                    data-category="<?php echo esc_attr( $category->slug ); ?>">
              <?php echo esc_html( $category->name ); ?>
            </button>
          <?php
              endforeach;
          endif;
          ?>
        </div>

      </div>
    </div>
  </section>

  <!-- Demo products -->
  <section class="container py-5">
  <div class="shop-grid" id="shopProducts">

    <?php
    $shop_products = new WP_Query( array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
    ) );

    if ( $shop_products->have_posts() ) :
        while ( $shop_products->have_posts() ) :
            $shop_products->the_post();

            $product = wc_get_product( get_the_ID() );

            if ( ! $product || ! $product->is_visible() ) {
    continue;
}


            $categories = get_the_terms( get_the_ID(), 'product_cat' );
            $category_slugs = array();
            $category_names = array();

            if ( $categories && ! is_wp_error( $categories ) ) {
                foreach ( $categories as $category ) {
                    $category_slugs[] = $category->slug;
                    $category_names[] = $category->name;
                }
            }

            $items_per_pack = absint( $product->get_meta( '_products_per_pack' ) );
            ?>

            <div class="shop-item"
              data-category="<?php echo esc_attr( implode( ' ', $category_slugs ) ); ?>">

              <article <?php wc_product_class( 'card shop-product h-100', $product ); ?>>
                <a href="<?php echo esc_url( $product->get_permalink() ); ?>">
                  <?php echo $product->get_image( 'woocommerce_thumbnail', array( 'class' => 'card-img-top' ) ); ?>
                </a>

                <div class="card-body d-flex flex-column">
                  <?php if ( $category_names ) : ?>
                    <span class="small text-muted">
                      <?php echo esc_html( implode( ', ', $category_names ) ); ?>
                    </span>
                  <?php endif; ?>

                  <h2 class="h4 product-title mt-2">
                    <a class="text-dark" href="<?php echo esc_url( $product->get_permalink() ); ?>">
                      <?php echo esc_html( $product->get_name() ); ?>
                    </a>
                  </h2>

                  <?php if ( $product->get_short_description() ) : ?>
                    <div class="card-text">
                      <?php echo wp_kses_post( $product->get_short_description() ); ?>
                    </div>
                  <?php endif; ?>

                  <?php if ( $items_per_pack ) : ?>
                    <p class="small text-muted">
                      Pack: <?php echo esc_html( $items_per_pack ); ?> items
                    </p>
                  <?php endif; ?>

                  <p class="h5"><?php echo wp_kses_post( $product->get_price_html() ); ?></p>

                  <a href="<?php echo esc_url( $product->get_permalink() ); ?>"
                     class="btn btn-outline-dark mt-auto site-brand-wrap-soft-reverse">
                    View product
                  </a>
                </div>
              </article>
            </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

    <?php else : ?>
      <p class="shop-grid-message text-center text-muted">No published products were found.</p>
    <?php endif; ?>
  </div>
</section>

  <section class="py-5 site-brand-wrap-reverse">
    <div class="container text-center">
      <h2 class="shop-heading">Looking for something special?</h2>
      <p class="text-muted">Contact us about current availability and custom-order questions.</p>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-secondary btn-outline-dark site-brand-wrap-soft-reverse">Contact the cottage</a>
    </div>
  </section>
</main>



<script>
document.addEventListener('DOMContentLoaded', function () {
  var buttons = document.querySelectorAll('.shop-category');
  var products = document.querySelectorAll('.shop-item');

  var tabletQuery = window.matchMedia('(min-width: 768px)');
  var desktopQuery = window.matchMedia('(min-width: 992px)');

  function getColumnCount() {
    if (desktopQuery.matches) return 3;
    if (tabletQuery.matches) return 2;
    return 1;
  }

  function layoutProducts() {
    var visible = Array.prototype.filter.call(products, function (item) {
      return !item.classList.contains('d-none');
    });

    products.forEach(function (item) {
      item.classList.remove('is-center', 'is-spread-left', 'is-spread-right');
    });

    var total = visible.length;
    var cols = getColumnCount();

    if (total === 0) return;

    // Only one product in total: center it on every screen size
    if (total === 1) {
      visible[0].classList.add('is-center');
      return;
    }

    var remainder = total % cols;

    if (cols === 2) {
      // Tablet: a lone last card is centered
      if (remainder === 1) {
        visible[total - 1].classList.add('is-center');
      }
    } else if (cols === 3) {
      if (remainder === 2) {
        // Last row: two cards spread across columns 1 and 3
        visible[total - 2].classList.add('is-spread-left');
        visible[total - 1].classList.add('is-spread-right');
      } else if (remainder === 1) {
        // Rebalance the last two rows into two rows of two
        visible[total - 4].classList.add('is-spread-left');
        visible[total - 3].classList.add('is-spread-right');
        visible[total - 2].classList.add('is-spread-left');
        visible[total - 1].classList.add('is-spread-right');
      }
    }
  }

  buttons.forEach(function (button) {
    button.addEventListener('click', function () {
      var category = button.dataset.category;

      buttons.forEach(function (item) {
        item.classList.remove('active');
      });
      button.classList.add('active');

      products.forEach(function (product) {
        var productCategories = (product.dataset.category || '').split(' ');
        var show = category === 'all' || productCategories.includes(category);
        product.classList.toggle('d-none', !show);
      });

      layoutProducts();
    });
  });

  window.addEventListener('resize', layoutProducts);

  layoutProducts();
});
</script>


<?php get_footer(); ?>
