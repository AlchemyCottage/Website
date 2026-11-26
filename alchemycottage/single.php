<?php
/*
Template Name: Cottage Shop Product
*/
get_header();

$product_image = esc_url(
    get_template_directory_uri() . '/assets/images/shop/sugar-cookies.jpg'
);
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
  <section class="container py-4">
    <p class="text-muted mb-4">
      <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="text-muted">Shop</a>
      / Cookies
    </p>

    <div class="row">
      <div class="col-lg-7 mb-4 product-img">
        <!--
        <img
          src="</?php echo $product_image; ?>"
          class="img-fluid rounded shadow product-photo"
          alt="Chocolate and caramel cookies"
        >
        -->
        <img
          src=<?php if ( has_post_thumbnail() ) {
            the_post_thumbnail();
        } ?>
    </div>

      <div class="col-lg-5">
        <div class="product-panel">
          <p class="text-muted text-uppercase small mb-2">Small-batch cookies</p>
          <h1 class="product-title display-4">Sugar Daddy Cookies</h1>

          <p class="text-warning mb-3" aria-label="Five out of five demo stars">
            ★★★★★ <span class="text-muted small">5.0 · <?php echo get_comments_number() ; ?> reviews</span>
          </p>

          <p class="lead">
            Soft-centered cookies with chocolate chunks and caramel pieces,
            baked in small batches for sharing.
          </p>

          <p class="h3 mb-4">$12.00 <small class="text-muted">demo price</small></p>

          <div class="form-group">
            <label for="productQuantity">Quantity</label>
            <input type="number" class="form-control" id="productQuantity"
                   value="1" min="1" max="10" style="max-width: 120px;">
          </div>

          <button type="button" class="btn btn-dark btn-lg btn-block" id="addToCart">
            Add to cart
          </button>

          <p class="small text-muted mt-3 mb-0">
            Demo only: this button does not place an order or take payment.
          </p>

          <div class="alert alert-success mt-3 d-none" id="cartMessage" role="status" aria-live="polite"></div>

          <div class="border-top mt-4 pt-3">
            <p class="mb-1"><strong>Sample pack:</strong> 6 cookies</p>
            <p class="mb-0"><strong>Availability:</strong> Contact us to ask about the current batch.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-7">
          <h2 class="product-section-title mb-3">A little more about these cookies</h2>
          <p>
            Buttery brown-sugar dough, chocolate chunks, and caramel make this
            a cozy treat with crisp edges and a soft center. Enjoy them with a
            cup of coffee, or share a box with someone you love.
          </p>

          <h3 class="h5 mt-4">Ingredients and allergen details</h3>
          <p class="text-muted">
            Add the verified ingredients and allergen information for the exact
            product and batch here. Don’t use this demo text as package-label
            information.
          </p>
        </div>

        <div class="col-lg-4 offset-lg-1 mt-4 mt-lg-0">
          <div class="bg-white border rounded p-4 mb-2">
            <h2 class="h5 product-section-title">Product details</h2>
            <ul class="mb-0 pl-3">
              <li>Sample pack: 6 cookies</li>
              <li>Small-batch baked</li>
              <li>Price shown is demo content</li>
            </ul>
          </div>
          <a href="#" class="link">View recipe</a>
        </div>      
      </div>
    </div>
  </section>
</main>

  <?php comments_template(); ?> 


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

<?php get_footer(); ?>
