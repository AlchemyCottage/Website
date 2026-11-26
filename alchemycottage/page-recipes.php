<?php
/* Recipes page template */
get_header();
?>

<style>
  .recipe-hero .carousel-item {
    height: 420px;
    background: #4b3025;
  }

  .recipe-hero .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: .65;
  }

  .recipe-hero .carousel-caption {
    bottom: 18%;
  }

  .recipe-hero h1,
  .recipes-heading {
    font-family: Georgia, serif;
  }

  .category-button {
    min-height: 100%;
    white-space: normal;
  }

  .recipe-card img {
    height: 220px;
    object-fit: cover;
  }
</style>

<main>
  <!-- Scrolling recipe photos -->
  <section class="recipe-hero" aria-label="Featured recipes">
    <div id="recipesCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
      <ol class="carousel-indicators">
        <li data-target="#recipesCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#recipesCarousel" data-slide-to="1"></li>
        <li data-target="#recipesCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/cinnamon-rolls.jpg'); ?>" alt="Freshly baked cinnamon rolls">
          <div class="carousel-caption">
            <h1 class="display-4">Recipes from our kitchen</h1>
            <p class="lead">Comforting bakes, simple instructions, and a little inspiration.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/sourdough.jpg'); ?>" alt="A loaf of homemade sourdough bread">
          <div class="carousel-caption">
            <h1 class="display-4">Find your next favorite</h1>
            <p class="lead">From everyday breads to treats for sharing.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/berry-cake.jpg'); ?>" alt="A homemade berry cake">
          <div class="carousel-caption">
            <h1 class="display-4">Made for home bakers</h1>
            <p class="lead">Browse, bake, and enjoy something delicious.</p>
          </div>
        </div>
      </div>

      <a class="carousel-control-prev" href="#recipesCarousel" role="button" data-slide="prev" aria-label="Previous slide">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      </a>
      <a class="carousel-control-next" href="#recipesCarousel" role="button" data-slide="next" aria-label="Next slide">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
      </a>
    </div>
  </section>

  <!-- Search and category choices -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="recipes-heading text-center mb-3">What sounds good?</h2>
      <p class="text-center text-muted mb-4">Search recipes or choose a category.</p>

      <div class="mx-auto mb-5" style="max-width: 650px;">
        <label class="sr-only" for="recipeSearch">Search recipes</label>
        <div class="input-group">
          <input type="search" id="recipeSearch" class="form-control"
                 placeholder="Try “bread” or “chocolate”">
          <div class="input-group-append">
            <button class="btn btn-dark" type="button" id="recipeSearchButton">Search</button>
          </div>
        </div>
      </div>

      <div class="row text-center" id="recipeCategories">
        <div class="col-6 col-md-4 col-lg-2 mb-3">
          <button class="btn btn-outline-dark btn-block category-button" data-category="all">All recipes</button>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-3">
          <button class="btn btn-outline-dark btn-block category-button" data-category="bread">Breads</button>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-3">
          <button class="btn btn-outline-dark btn-block category-button" data-category="cookies">Cookies</button>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-3">
          <button class="btn btn-outline-dark btn-block category-button" data-category="cakes">Cakes</button>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-3">
          <button class="btn btn-outline-dark btn-block category-button" data-category="breakfast">Breakfast</button>
        </div>
        <div class="col-6 col-md-4 col-lg-2 mb-3">
          <button class="btn btn-outline-dark btn-block category-button" data-category="seasonal">Seasonal</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Recipe listing -->
  <section class="container py-5">
    <h2 class="recipes-heading text-center mb-2">From the recipe journal</h2>
    <p class="text-center text-muted mb-5">A few favorites to get you started.</p>

    <div class="row" id="recipeList">
      <div class="col-md-6 col-lg-4 mb-4 recipe-item" data-category="bread" data-search="rustic sourdough bread">
        <article class="card recipe-card h-100">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/sourdough.jpg'); ?>" class="card-img-top" alt="Rustic sourdough loaf">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Breads</span>
            <h3 class="h4 card-title mt-2">Rustic Sourdough Loaf</h3>
            <p class="card-text">A crisp crust and tender center make this a lovely weekend bake.</p>
            <p class="small mb-3"><strong>Prep:</strong> 30 min &nbsp; <strong>Bake:</strong> 45 min<br><strong>Makes:</strong> 1 loaf</p>
            <a href="#" class="btn btn-outline-dark mt-auto">View recipe</a>
          </div>
        </article>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 recipe-item" data-category="cookies" data-search="chocolate chip cookies">
        <article class="card recipe-card h-100">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/chocolate-chip-cookies.jpg'); ?>" class="card-img-top" alt="Chocolate chip cookies">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Cookies</span>
            <h3 class="h4 card-title mt-2">Classic Chocolate Chip Cookies</h3>
            <p class="card-text">Soft in the middle, golden at the edges, and full of chocolate.</p>
            <p class="small mb-3"><strong>Prep:</strong> 15 min &nbsp; <strong>Bake:</strong> 12 min<br><strong>Makes:</strong> 18 cookies</p>
            <a href="#" class="btn btn-outline-dark mt-auto">View recipe</a>
          </div>
        </article>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 recipe-item" data-category="cakes" data-search="lemon loaf cake citrus">
        <article class="card recipe-card h-100">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/lemon-cake.jpg'); ?>" class="card-img-top" alt="Lemon loaf cake">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Cakes</span>
            <h3 class="h4 card-title mt-2">Bright Lemon Loaf</h3>
            <p class="card-text">A tender, citrusy loaf finished with a simple lemon glaze.</p>
            <p class="small mb-3"><strong>Prep:</strong> 20 min &nbsp; <strong>Bake:</strong> 50 min<br><strong>Makes:</strong> 1 loaf</p>
            <a href="#" class="btn btn-outline-dark mt-auto">View recipe</a>
          </div>
        </article>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 recipe-item" data-category="breakfast" data-search="cinnamon rolls breakfast">
        <article class="card recipe-card h-100">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/cinnamon-rolls.jpg'); ?>" class="card-img-top" alt="Homemade cinnamon rolls">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Breakfast</span>
            <h3 class="h4 card-title mt-2">Cottage Cinnamon Rolls</h3>
            <p class="card-text">Soft, buttery rolls with cinnamon sugar and a sweet glaze.</p>
            <p class="small mb-3"><strong>Prep:</strong> 35 min &nbsp; <strong>Bake:</strong> 25 min<br><strong>Makes:</strong> 12 rolls</p>
            <a href="#" class="btn btn-outline-dark mt-auto">View recipe</a>
          </div>
        </article>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 recipe-item" data-category="seasonal" data-search="apple crumble seasonal">
        <article class="card recipe-card h-100">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/apple-crumble.jpg'); ?>" class="card-img-top" alt="Apple crumble with a golden topping">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Seasonal</span>
            <h3 class="h4 card-title mt-2">Spiced Apple Crumble</h3>
            <p class="card-text">Warm apples and a crisp oat topping make a cozy dessert.</p>
            <p class="small mb-3"><strong>Prep:</strong> 20 min &nbsp; <strong>Bake:</strong> 40 min<br><strong>Serves:</strong> 6</p>
            <a href="#" class="btn btn-outline-dark mt-auto">View recipe</a>
          </div>
        </article>
      </div>

      <div class="col-md-6 col-lg-4 mb-4 recipe-item" data-category="bread" data-search="no knead focaccia bread">
        <article class="card recipe-card h-100">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/focaccia.jpg'); ?>" class="card-img-top" alt="Olive and herb focaccia">
          <div class="card-body d-flex flex-column">
            <span class="small text-muted">Breads</span>
            <h3 class="h4 card-title mt-2">Easy Garden Focaccia</h3>
            <p class="card-text">A soft, olive-oil-rich bread topped with herbs and flaky salt.</p>
            <p class="small mb-3"><strong>Prep:</strong> 20 min &nbsp; <strong>Bake:</strong> 25 min<br><strong>Makes:</strong> 1 pan</p>
            <a href="#" class="btn btn-outline-dark mt-auto">View recipe</a>
          </div>
        </article>
      </div>

      <p id="noRecipesMessage" class="col-12 text-center text-muted d-none">
        No matching recipes found. Try another search or category.
      </p>
    </div>
  </section>

  <!-- Closing call to action -->
  <section class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="recipes-heading">Have a recipe request?</h2>
      <p class="text-muted">Tell us what you’d love to bake next.</p>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-dark">Get in touch</a>
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var search = document.getElementById('recipeSearch');
  var items = document.querySelectorAll('.recipe-item');
  var buttons = document.querySelectorAll('.category-button');
  var noResults = document.getElementById('noRecipesMessage');
  var activeCategory = 'all';

  function filterRecipes() {
    var query = search.value.trim().toLowerCase();
    var visibleCount = 0;

    items.forEach(function (item) {
      var matchesCategory = activeCategory === 'all' || item.dataset.category === activeCategory;
      var matchesSearch = item.dataset.search.toLowerCase().includes(query);
      var show = matchesCategory && matchesSearch;

      item.classList.toggle('d-none', !show);
      if (show) visibleCount++;
    });

    noResults.classList.toggle('d-none', visibleCount > 0);
  }

  buttons.forEach(function (button) {
    button.addEventListener('click', function () {
      activeCategory = button.dataset.category;
      buttons.forEach(function (item) {
        item.classList.remove('active');
      });
      button.classList.add('active');
      filterRecipes();
    });
  });

  search.addEventListener('input', filterRecipes);
  document.getElementById('recipeSearchButton').addEventListener('click', filterRecipes);
});
</script>

<?php get_footer(); ?>
