<?php
    get_header() ;
?>

<section class="bakery-hero" aria-label="Featured bakery images">
  <div id="bakeryCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
      <li data-target="#bakeryCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#bakeryCarousel" data-slide-to="1"></li>
      <li data-target="#bakeryCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/artisan-bread.jpg'); ?>" alt="Freshly baked artisan bread">
        <div class="carousel-caption">
          <h1>Made with care, baked fresh</h1>
          <p class="lead">Small-batch treats and comforting recipes from our cottage kitchen.</p>
          <a href="/shop" class="btn btn-light btn-lg">Explore the shop</a>
        </div>
      </div>

      <div class="carousel-item">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/plate-cookies.jpg'); ?>" alt="A plate of homemade cookies">
        <div class="carousel-caption">
          <h1>A little sweetness</h1>
          <p class="lead">Discover cookies, cakes, and seasonal favorites.</p>
          <a href="/shop" class="btn btn-light btn-lg">Browse baked goods</a>
        </div>
      </div>

      <div class="carousel-item">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/baking-ingredients.jpg'); ?>" alt="Ingredients prepared for home baking">
        <div class="carousel-caption">
          <h1>Bring the joy of baking home</h1>
          <p class="lead">Find approachable recipes and inspiration for your own kitchen.</p>
          <a href="/recipes" class="btn btn-light btn-lg">Find a recipe</a>
        </div>
      </div>
    </div>

    <a class="carousel-control-prev" href="#bakeryCarousel" role="button" data-slide="prev" aria-label="Previous slide">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a class="carousel-control-next" href="#bakeryCarousel" role="button" data-slide="next" aria-label="Next slide">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
  </div>
</section>

<section class="home-section site-background-soft">
  <div class="container text-center">
    <h2 class="mb-3" style="font-family: Georgia, serif;">Welcome to Alchemy Cottage</h2>
    <p class="text-muted mx-auto mb-5" style="max-width: 650px;">
      We bake small-batch goodies and share recipes to make everyday moments a little more delicious.
    </p>

</section>
<section class="site-brand-wrap-soft">
  <div class="container text-center">
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="h-100 p-4 border border-secondary rounded">
          <h3 class="h4">Fresh from the oven</h3>
          <p>Shop homemade cookies, cakes, breads, and seasonal treats.</p>
          <a href="/shop" class="btn btn-dark btn-outline-secondary site-brand-wrap-soft-reverse">Shop baked goods</a>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="h-100 p-4 border border-secondary rounded">
          <h3 class="h4">Recipes to make at home</h3>
          <p>Explore cozy, easy-to-follow recipes from our kitchen.</p>
          <a href="/recipes" class="btn btn-dark btn-outline-secondary site-brand-wrap-soft-reverse">Browse recipes</a>
        </div>
      </div>

      <div class="col-md-4 mb-4">
        <div class="h-100 p-4 border border-secondary rounded">
          <h3 class="h4">Made for your occasion</h3>
          <p>Ask about custom cakes and treats for your next gathering.</p>
          <a href="/contact" class="btn btn-dark btn-outline-secondary site-brand-wrap-soft-reverse">Get in touch</a>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<section class="py-5">
  <div class="container">
    <div class="mx-auto" style="width: 75%; max-width: 100%;">
      <h2 class="text-center mb-4" style="font-family: Georgia, serif;">
        A peek inside our cottage kitchen
      </h2>

      <div class="embed-responsive embed-responsive-16by9 bg-dark rounded">
        <!-- Add a video element or embed here later -->
        <div class="embed-responsive-item d-flex align-items-center justify-content-center text-white">
          <span>LBRY/YouTube video will appear here</span>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="site-brand-wrap-reverse">
<div class="container py-5">
  <hr class="my-5">

  <div class="row align-items-center my-5">
    <div class="col-md-7">
      <h2 class="display-4" style="font-family: Georgia, serif;">
        Small-batch, homemade goodness
      </h2>
      <p class="lead">
        Every loaf, cookie, and cake is made with care in our cottage kitchen.
        We bake in small batches so each order gets the attention it deserves.
      </p>
    </div>

    <div class="col-md-5 mb-4 mb-md-0">
      <img
        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cottage-oven.jpg'); ?>"
        class="img-fluid rounded shadow"
        style="width: 100%; height: 25rem; object-fit: cover;"
        alt="Freshly baked treats cooling in the cottage kitchen"
      >
    </div>
  </div>

  <hr class="my-5">

  <div class="row align-items-center my-5">
    <div class="col-md-7 order-md-2">
      <h2 class="display-4" style="font-family: Georgia, serif;">
        Baked for your special moments
      </h2>
      <p class="lead">
        From birthday cakes to a basket of fresh bread, our treats make
        gatherings feel a little more special. Get in touch to ask about
        custom orders and seasonal offerings.
      </p>
      <a href="/contact" class="btn btn-dark btn-outline-dark site-brand-wrap-soft-reverse" style="margin-bottom: 24px;">Ask about a custom order</a>
    </div>

    <div class="col-md-5 order-md-1 mb-4 mb-md-0">
      <img
        src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/custom-cookies.jpg'); ?>"
        class="img-fluid rounded shadow"
        style="width: 100%; height: 25rem; object-fit: cover;"
        alt="A decorated homemade cake prepared for a celebration"
      >
    </div>
  </div>


  <hr class="my-5">
</div>

</section>

<?php
    get_footer() ;
?>


