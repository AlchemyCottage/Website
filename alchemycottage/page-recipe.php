<?php
/* Demo recipe page: Sugar Daddy Cookies */
get_header();
?>

<main>
  <section class="py-5 bg-light">
    <div class="container">
      <p class="text-muted mb-2">
        <a href="<?php echo esc_url(home_url('/recipes/')); ?>" class="text-muted">Recipes</a>
        / Cookies
      </p>
      <h1 class="display-4" style="font-family: Georgia, serif;">Sugar Daddy Cookies</h1>
      <p class="lead text-muted" style="max-width: 750px;">
        Soft-centered cookies loaded with caramel and chocolate, finished with a little flaky salt.
      </p>
      <!--<p class="mb-0" aria-label="Rated five out of five stars">★★★★★ <span class="text-muted">5.0 · Demo rating</span></p>
--></div>
  </section>

  <section class="container py-5">
    <div class="row">
      <div class="col-lg-8">
        <img
          src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/recipes/sugar-daddy-cookies.jpg'); ?>"
          class="img-fluid rounded shadow mb-4"
          alt="Golden chocolate and caramel cookies"
        >

        <div class="row text-center mb-4">
          <div class="col-4">
            <div class="p-3 border rounded h-100">
              <strong class="d-block">Prep</strong>
              <span>20 min</span>
            </div>
          </div>
          <div class="col-4">
            <div class="p-3 border rounded h-100">
              <strong class="d-block">Bake</strong>
              <span>11 min</span>
            </div>
          </div>
          <div class="col-4">
            <div class="p-3 border rounded h-100">
              <strong class="d-block">Makes</strong>
              <span>18 cookies</span>
            </div>
          </div>
        </div>

        <p>
          These cookies combine a buttery brown-sugar dough with chocolate chunks
          and pockets of caramel. Chill the dough before baking for thicker cookies.
        </p>

        <h2 class="h3 mt-5" style="font-family: Georgia, serif;">Ingredients</h2>
        <ul>
          <li>2¼ cups all-purpose flour</li>
          <li>½ teaspoon baking soda</li>
          <li>½ teaspoon salt</li>
          <li>¾ cup unsalted butter, softened</li>
          <li>¾ cup packed brown sugar</li>
          <li>¼ cup granulated sugar</li>
          <li>1 large egg and 1 egg yolk</li>
          <li>2 teaspoons vanilla extract</li>
          <li>1 cup chocolate chunks</li>
          <li>¾ cup soft caramel pieces</li>
          <li>Flaky salt, for topping (optional)</li>
        </ul>

        <h2 class="h3 mt-5" style="font-family: Georgia, serif;">Method</h2>
        <ol>
          <li>Whisk the flour, baking soda, and salt together in a bowl.</li>
          <li>In another bowl, beat the butter and sugars until creamy. Beat in the egg, egg yolk, and vanilla.</li>
          <li>Mix in the dry ingredients just until combined. Fold in the chocolate and caramel pieces.</li>
          <li>Cover and chill the dough for 30 minutes. Meanwhile, heat the oven to 350°F (175°C).</li>
          <li>Scoop the dough onto a lined baking sheet, leaving space between cookies.</li>
          <li>Bake for 10–12 minutes, until the edges are golden and the centers still look soft.</li>
          <li>Sprinkle with flaky salt, if desired. Cool on the tray for 5 minutes, then move to a rack.</li>
        </ol>

        <div class="alert alert-light border mt-4">
          <strong>Baker’s note:</strong> Caramel can get very hot after baking. Let the cookies cool before tasting.
        </div>
      </div>

      <aside class="col-lg-4 mt-5 mt-lg-0">
        <div class="p-4 bg-light rounded">
          <h2 class="h4" style="font-family: Georgia, serif;">Recipe notes</h2>
          <p><strong>Chill time:</strong> 30 minutes</p>
          <p><strong>Total time:</strong> About 1 hour</p>
          <p class="mb-0"><strong>Storage:</strong> Keep in an airtight container for up to 3 days.</p>
        </div>
      </aside>
    </div>
  </section>

  <!--
  <section class="py-5 bg-light">
    <div class="container">
      <div class="mx-auto" style="max-width: 800px;">
        <h2 class="mb-2" style="font-family: Georgia, serif;">Baker reviews</h2>
        <p class="text-muted mb-4">Sample reviews for layout preview.</p>

        <article class="bg-white border rounded p-4 mb-3">
          <div class="d-flex justify-content-between flex-wrap">
            <h3 class="h5 mb-1">Jamie R.</h3>
            <span class="text-warning" aria-label="Five out of five stars">★★★★★</span>
          </div>
          <p class="small text-muted">Made these this weekend</p>
          <p class="mb-0">The caramel and chocolate are such a good combination. They came out soft in the middle and crisp at the edges.</p>
        </article>

        <article class="bg-white border rounded p-4 mb-4">
          <div class="d-flex justify-content-between flex-wrap">
            <h3 class="h5 mb-1">Morgan T.</h3>
            <span class="text-warning" aria-label="Five out of five stars">★★★★★</span>
          </div>
          <p class="small text-muted">A new family favorite</p>
          <p class="mb-0">Chilling the dough made a difference. We’ll be baking another batch soon!</p>
        </article>

        <a href="#respond" class="btn btn-outline-dark">Leave a review</a>
        <p class="small text-muted mt-3 mb-0">
          To accept and display real reviews, connect this section to WordPress comments or a review plugin.
        </p>
      </div>
    </div>
  </section>
-->

</main>

<?php get_footer(); ?>
