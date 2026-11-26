<?php
/* Demo recipe page: Sugar Daddy Cookies */
get_header();

$recipe_id = get_the_ID();

$prep_time   = get_post_meta( $recipe_id, '_recipe_prep_time', true );
$bake_time   = get_post_meta( $recipe_id, '_recipe_bake_time', true );
$yield       = get_post_meta( $recipe_id, '_recipe_yield', true );
$chill_time  = get_post_meta( $recipe_id, '_recipe_chill_time', true );
$total_time  = get_post_meta( $recipe_id, '_recipe_total_time', true );
$storage     = get_post_meta( $recipe_id, '_recipe_storage', true );
$bakers_note = get_post_meta( $recipe_id, '_recipe_bakers_note', true );

$ingredients = array_filter(
    array_map( 'trim', explode(
        "\n",
        get_post_meta( $recipe_id, '_recipe_ingredients', true )
    ) )
);

$steps = array_filter(
    array_map( 'trim', explode(
        "\n",
        get_post_meta( $recipe_id, '_recipe_method', true )
    ) )
);


$recipe_cats      = get_the_category( $recipe_id );
$recipe_cat_name  = '';
$recipe_cat_url   = '';

if ( $recipe_cats ) {
    $recipe_cat_name = $recipe_cats[0]->name;
    $recipe_cat_url  = get_category_link( $recipe_cats[0] );
}

$recipe_cat_lower = $recipe_cat_name ? mb_strtolower( $recipe_cat_name ) : 'recipes';

?>

<main>
  <section class="py-5 site-brand-wrap-soft-shop">
    <div class="container">
      <p class="text-muted mb-2">
        <a href="<?php echo esc_url( home_url( '/recipes/' ) ); ?>" class="text-muted">Recipes</a>
        <?php if ( $recipe_cat_name ) : ?>
          / <!-- <a href="<?php echo esc_url( $recipe_cat_url ); ?>" class="text-muted"><?php echo esc_html( $recipe_cat_name ); ?></a> -->
          <a class="text-muted"><?php echo esc_html( $recipe_cat_name ); ?></a>
        <?php endif; ?>
      </p>

      <h1 class="display-4" style="font-family: Georgia, serif;"><?php the_title(); ?></h1>
      <p class="lead text-muted" style="max-width: 750px;">
        <?php the_excerpt(); ?>
      </p>
      <!--<p class="mb-0" aria-label="Rated five out of five stars">★★★★★ <span class="text-muted">5.0 · Demo rating</span></p>
--></div>
  </section>

  <section class="container py-5">
    <div class="row">
      <div class="col-lg-8">
        <img
          src="<?php echo get_the_post_thumbnail_url()  ?>"
          class="img-fluid rounded shadow mb-4"
          alt="Golden chocolate and caramel cookies"
        >

        <div class="row text-center mb-4">
          <div class="col-4">
            <div class="p-3 border rounded h-100 site-brand-wrap-soft-reverse">
              <strong class="d-block">Prep</strong>
              <span><?php echo esc_html( $prep_time ); ?></span>
            </div>
          </div>
          <div class="col-4">
            <div class="p-3 border rounded h-100 site-brand-wrap-soft-reverse">
              <strong class="d-block">Bake</strong>
              <span><?php echo esc_html( $bake_time ); ?></span>
            </div>
          </div>
          <div class="col-4">
            <div class="p-3 border rounded h-100 site-brand-wrap-soft-reverse">
              <strong class="d-block">Makes</strong>
              <span><?php echo esc_html( $yield ); ?></span>
            </div>
          </div>
        </div>

        <p>
          <?php the_content(); ?>
        </p>

        <h2 class="h3 mt-5" style="font-family: Georgia, serif;">Ingredients</h2>
        <?php if ( $ingredients ) : ?>
            <ul>
                <?php foreach ( $ingredients as $ingredient ) : ?>
                <li><?php echo esc_html( $ingredient ); ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <h2 class="h3 mt-5" style="font-family: Georgia, serif;">Method</h2>
        <?php if ( $steps ) : ?>
            <ol>
                <?php foreach ( $steps as $method ) : ?>
                <li><?php echo esc_html( $method ); ?></li>
                <?php endforeach; ?>
                </ol>
        <?php endif; ?>

        <div class="alert alert-light border mt-4 site-brand-wrap-soft-reverse">
          <strong>Baker’s note: </strong><?php echo esc_html( $bakers_note ); ?>
        </div>
      </div>

      <aside class="col-lg-4 mt-5 mt-lg-0">
        <div class="p-4 bg-light rounded site-brand-wrap-soft-reverse">
          <h2 class="h4" style="font-family: Georgia, serif;">Recipe notes</h2>
          <p><strong>Chill time: </strong><?php echo esc_html( $chill_time ); ?></p>
          <p><strong>Total time: </strong><?php echo esc_html( $total_time ); ?></p>
          <p class="mb-0"><strong>Storage: </strong><?php echo esc_html( $storage ); ?></p>
        </div>

        <?php
        $linked_products = get_posts( array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'meta_key'       => '_linked_recipe_id',
            'meta_value'     => get_the_ID(),
        ) );

        if ( $linked_products ) :
        ?>
            <div class="mt-3">
                <strong>Available in the shop:</strong>
                <ul class="mb-0">
                    <?php foreach ( $linked_products as $linked_product ) : ?>
                        <li>
                            <a href="<?php echo esc_url( get_permalink( $linked_product->ID ) ); ?>">
                                <?php echo esc_html( get_the_title( $linked_product->ID ) ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
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

  <?php comments_template(); ?> 

<?php get_footer(); ?>
