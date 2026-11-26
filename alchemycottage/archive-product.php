<?php
/* Shop page template */
get_header();

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
  <section class="py-5 bg-light">
    <div class="container">
      <div class="mx-auto" style="max-width: 850px;">
        <h2 class="shop-heading text-center mb-3">Made under Florida’s cottage-food rules</h2>
        <p>
          We intend to offer only products that qualify under Florida’s cottage-food
          requirements. Product eligibility can depend on the exact recipe and
          preparation, so check with FDACS before offering an item for sale.
        </p>

        <h3 class="h5 mt-4">Product packaging and labels</h3>
        <p>Each product’s actual package label should be prepared for that specific item and include applicable required information, such as:</p>
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
          This is a general display note, not a compliance determination. Confirm
          current requirements, product eligibility, and exact label wording with
          <a href="https://www.fdacs.gov/Business-Services/Food/Food-Establishments/Cottage-Foods"
             target="_blank" rel="noopener noreferrer">FDACS Cottage Foods</a>
          before publishing product listings or labels.
        </p>
      </div>
    </div>
  </section>
  <!-- Intro and product filters -->
  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="shop-heading text-center mb-2">The Cottage Shop</h2>
      

      <div class="d-flex flex-wrap justify-content-center">
        <button type="button" class="btn btn-outline-dark shop-category active m-1" data-category="all">All treats</button>
        <button type="button" class="btn btn-outline-dark shop-category m-1" data-category="cookies">Cookies</button>
        <button type="button" class="btn btn-outline-dark shop-category m-1" data-category="breads">Breads</button>
        <button type="button" class="btn btn-outline-dark shop-category m-1" data-category="cakes">Cakes & bars</button>
        <button type="button" class="btn btn-outline-dark shop-category m-1" data-category="seasonal">Seasonal</button>
      </div>
    </div>
  </section>

  <!-- Demo products -->
  <section class="container py-5">
    <div class="row" id="shopProducts">

      <div class="col-md-6 col-lg-4 mb-4 shop-item" data-category="cookies">
        <article class="card shop-product h-100">
          <img src="<?php echo $shop_image('sugar-cookies.jpg'); ?>" class="card-img-top" alt="Chocolate and caramel cookies">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Cookies</span>
            <h3 class="h4 product-title mt-2">Sugar Daddy Cookies</h3>
            <p class="card-text">Soft-centered cookies with caramel and chocolate chunks.</p>
            <p class="small text-muted">Sample pack: 6 cookies</p>
            <p class="h5">$— <small class="text-muted">demo price</small></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-dark mt-auto">Ask about availability</a>
          </div>
        </article>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 shop-item" data-category="breads">
        <article class="card shop-product h-100">
          <img src="<?php echo $shop_image('cinnamon-bread.jpg'); ?>" class="card-img-top" alt="A loaf of cinnamon bread">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Breads</span>
            <h3 class="h4 product-title mt-2">Cinnamon Swirl Loaf</h3>
            <p class="card-text">A tender, cinnamon-swirled loaf for breakfast or an afternoon treat.</p>
            <p class="small text-muted">Sample size: 1 loaf</p>
            <p class="h5">$— <small class="text-muted">demo price</small></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-dark mt-auto">Ask about availability</a>
          </div>
        </article>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 shop-item" data-category="cakes">
        <article class="card shop-product h-100">
          <img src="<?php echo $shop_image('lemon-bars.jpg'); ?>" class="card-img-top" alt="Lemon bars with a dusting of sugar">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Cakes & bars</span>
            <h3 class="h4 product-title mt-2">Lemon Crumb Bars</h3>
            <p class="card-text">Bright lemon flavor with a buttery crumb base.</p>
            <p class="small text-muted">Sample box: 6 bars</p>
            <p class="h5">$— <small class="text-muted">demo price</small></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-dark mt-auto">Ask about availability</a>
          </div>
        </article>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 shop-item" data-category="cookies">
        <article class="card shop-product h-100">
          <img src="<?php echo $shop_image('shortbread.jpg'); ?>" class="card-img-top" alt="Golden homemade shortbread cookies">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Cookies</span>
            <h3 class="h4 product-title mt-2">Vanilla Shortbread</h3>
            <p class="card-text">Simple, buttery cookies with a delicate vanilla finish.</p>
            <p class="small text-muted">Sample tin: 10 cookies</p>
            <p class="h5">$— <small class="text-muted">demo price</small></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-dark mt-auto">Ask about availability</a>
          </div>
        </article>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 shop-item" data-category="breads">
        <article class="card shop-product h-100">
          <img src="<?php echo $shop_image('herb-bread.jpg'); ?>" class="card-img-top" alt="A rustic homemade herb loaf">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Breads</span>
            <h3 class="h4 product-title mt-2">Rosemary Country Loaf</h3>
            <p class="card-text">A rustic loaf with fragrant herbs and a crisp crust.</p>
            <p class="small text-muted">Sample size: 1 loaf</p>
            <p class="h5">$— <small class="text-muted">demo price</small></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-dark mt-auto">Ask about availability</a>
          </div>
        </article>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 shop-item" data-category="seasonal">
        <article class="card shop-product h-100">
          <img src="<?php echo $shop_image('seasonal-cookies.jpg'); ?>" class="card-img-top" alt="Seasonal decorated cookies">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Seasonal</span>
            <h3 class="h4 product-title mt-2">Seasonal Cookie Box</h3>
            <p class="card-text">A rotating assortment inspired by the season.</p>
            <p class="small text-muted">Sample box: 8 cookies</p>
            <p class="h5">$— <small class="text-muted">demo price</small></p>
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-dark mt-auto">Ask about availability</a>
          </div>
        </article>
      </div>

    </div>
  </section>

  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="shop-heading">Looking for something special?</h2>
      <p class="text-muted">Contact us about current availability and custom-order questions.</p>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-outline-dark">Contact the cottage</a>
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var buttons = document.querySelectorAll('.shop-category');
  var products = document.querySelectorAll('.shop-item');

  buttons.forEach(function (button) {
    button.addEventListener('click', function () {
      var category = button.dataset.category;

      buttons.forEach(function (item) {
        item.classList.remove('active');
      });
      button.classList.add('active');

      products.forEach(function (product) {
        var show = category === 'all' || product.dataset.category === category;
        product.classList.toggle('d-none', !show);
      });
    });
  });
});
</script>

<?php get_footer(); ?>
