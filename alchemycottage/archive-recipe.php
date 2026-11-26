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
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/sourdough-bread.jpg'); ?>" alt="A loaf of homemade sourdough bread">
          <div class="carousel-caption">
            <h1 class="display-4">Find your next favorite</h1>
            <p class="lead">From everyday breads to treats for sharing.</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/berry-cake.png'); ?>" alt="A homemade berry cake">
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
  <section class="py-5 site-background-soft">
    <div class="container">
      <h2 class="recipes-heading text-center mb-3">What sounds good?</h2>
      <p class="text-center text-muted mb-4">Search recipes or choose a category.</p>

      <form role="search" class="mx-auto mb-5" style="max-width: 650px;" id="recipeSearchForm">
        <label class="sr-only" for="recipeSearch">Search recipes</label>
        <div class="input-group">
          <input type="search" id="recipeSearch" class="form-control bg-light"
                placeholder="Try “caramel” or “chocolate”">
          <div class="input-group-append">
            <button id="recipeSearchButton" class="btn btn-dark site-brand-wrap-soft-reverse text-dark" type="submit">Search</button>
          </div>
        </div>
      </form>
      

      <div class="recipe-category-buttons" id="recipeCategories">
        <button class="btn btn-outline-dark site-brand-wrap-soft-reverse category-button is-active"
                type="button" data-category="all">
          All recipes
        </button>

        <?php
        $uncategorized = get_category_by_slug( 'uncategorized' );

        $category_args = array(
            'taxonomy'   => 'category',
            'hide_empty' => true,
        );

        if ( $uncategorized ) {
            $category_args['exclude'] = array( $uncategorized->term_id );
        }

        $recipe_categories = get_categories( $category_args );

        foreach ( $recipe_categories as $category ) :
        ?>
          <button class="btn btn-outline-dark category-button site-brand-wrap-soft-reverse"
                  type="button"
                  data-category="<?php echo esc_attr( $category->slug ); ?>">
            <?php echo esc_html( $category->name ); ?>
          </button>
        <?php endforeach; ?>
      </div>

  </section>

  <!-- Recipe listing -->
  <div class="site-brand-wrap-soft">
    <div class="container py-5">
      <h2 class="recipes-heading text-center mb-2">From the recipe journal</h2>
      <p class="text-center text-muted mb-5">A few favorites to get you started.</p>

        </div>
        </div>
  <section class="container">
    <div class="recipe-grid" id="recipeList">
  <?php
  $recipes = new WP_Query( array(
      'post_type'      => 'recipe',
      'post_status'    => 'publish',
      'posts_per_page' => -1,
      'orderby'        => 'date',
      'order'          => 'DESC',
  ) );

  if ( $recipes->have_posts() ) :
      while ( $recipes->have_posts() ) :
          $recipes->the_post();

          $categories = get_the_terms( get_the_ID(), 'category' );
          $category_slugs = array();
          $category_names = array();

          if ( $categories && ! is_wp_error( $categories ) ) {
              foreach ( $categories as $category ) {
                  $category_slugs[] = $category->slug;
                  $category_names[] = $category->name;
              }
          }

          $search_text = get_the_title() . ' ' . get_the_excerpt() . ' ' . get_the_content();
  ?>
    <div class="recipe-item"
     data-category="<?php echo esc_attr( implode( ' ', $category_slugs ) ); ?>"
     data-search="<?php echo esc_attr( $search_text ); ?>">
      <article class="card recipe-card h-100">
        <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
          <?php if ( has_post_thumbnail() ) : ?>
            <?php the_post_thumbnail( 'medium_large', array(
                'class' => 'card-img-top',
                'alt'   => get_the_title(),
            ) ); ?>
          <?php else : ?>
            <img class="card-img-top"
                 src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/recipes/placeholder.jpg' ); ?>"
                 alt="">
          <?php endif; ?>
        </a>

        <div class="card-body d-flex flex-column">
          <?php if ( $category_names ) : ?>
            <span class="small text-muted">
              <?php echo esc_html( implode( ', ', $category_names ) ); ?>
            </span>
          <?php endif; ?>

          <h3 class="h4 card-title mt-2">
            <a class="text-dark" href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h3>

          <div class="card-text">
            <?php the_excerpt(); ?>
          </div>

          <a href="<?php the_permalink(); ?>"
             class="btn btn-outline-dark mt-auto site-brand-wrap-soft-reverse">
            View recipe
          </a>
        </div>
      </article>
    </div>
  <?php
      endwhile;
      wp_reset_postdata();
  else :
  ?>
    <p class="recipe-grid-message text-muted py-5">No recipes have been published yet.</p>
  <?php endif; ?>

  <p id="noRecipesMessage" class="recipe-grid-message text-muted d-none py-5">
    No matching recipes found. Try another search or category.
  </p>
</div>

  </section>

  <!-- Closing call to action -->
  <section class="py-5 site-brand-wrap-reverse">
    <div class="container text-center">
      <h2 class="recipes-heading">Have a recipe request?</h2>
      <p class="text-muted">Tell us what you’d love to bake next.</p>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="btn btn-dark site-brand-wrap-soft-reverse text-dark">Get in touch</a>
    </div>
  </section>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
  var searchForm = document.getElementById('recipeSearchForm');
  var search = document.getElementById('recipeSearch');
  var items = document.querySelectorAll('.recipe-item');
  var buttons = document.querySelectorAll('.category-button');
  var noResults = document.getElementById('noRecipesMessage');

  var activeCategory = 'all';
  var appliedQuery = '';  // only changes when the form is submitted

  var tabletQuery = window.matchMedia('(min-width: 768px)');
  var desktopQuery = window.matchMedia('(min-width: 992px)');

  function getColumnCount() {
    if (desktopQuery.matches) return 3;
    if (tabletQuery.matches) return 2;
    return 1;
  }

  function layoutRecipes() {
    var visible = Array.prototype.filter.call(items, function (item) {
      return !item.classList.contains('d-none');
    });

    items.forEach(function (item) {
      item.classList.remove('is-center', 'is-spread-left', 'is-spread-right');
    });

    var total = visible.length;
    var cols = getColumnCount();

    if (total === 0) return;

    if (total === 1) {
      visible[0].classList.add('is-center');
      return;
    }

    var remainder = total % cols;

    if (cols === 2) {
      if (remainder === 1) {
        visible[total - 1].classList.add('is-center');
      }
    } else if (cols === 3) {
      if (remainder === 2) {
        visible[total - 2].classList.add('is-spread-left');
        visible[total - 1].classList.add('is-spread-right');
      } else if (remainder === 1) {
        visible[total - 4].classList.add('is-spread-left');
        visible[total - 3].classList.add('is-spread-right');
        visible[total - 2].classList.add('is-spread-left');
        visible[total - 1].classList.add('is-spread-right');
      }
    }
  }

  // Uses appliedQuery (set on submit), not the live input value
  function filterRecipes() {
    var query = appliedQuery;
    var visibleCount = 0;

    items.forEach(function (item) {
      var itemCategories = (item.dataset.category || '').split(' ');
      var matchesCategory =
        activeCategory === 'all' || itemCategories.includes(activeCategory);

      var matchesSearch = item.dataset.search.toLowerCase().includes(query);
      var show = matchesCategory && matchesSearch;

      item.classList.toggle('d-none', !show);
      if (show) visibleCount++;
    });

    noResults.classList.toggle('d-none', visibleCount > 0);
    layoutRecipes();
  }

  // Search runs only when the form is submitted, without reloading the page
  searchForm.addEventListener('submit', function (e) {
    e.preventDefault();
    appliedQuery = search.value.trim().toLowerCase();
    filterRecipes();
  });

  // Category buttons clear the search and show that category's recipes
  buttons.forEach(function (button) {
    button.addEventListener('click', function () {
      activeCategory = button.dataset.category;
      appliedQuery = '';
      search.value = '';

      buttons.forEach(function (item) {
        item.classList.remove('is-active');
      });

      button.classList.add('is-active');
      filterRecipes();
    });
  });

  window.addEventListener('resize', layoutRecipes);

  layoutRecipes();
});
</script>



<?php get_footer(); ?>
