<?php
    get_header();
?>

<main>

  <!--
  <section class="py-5 bg-light">
    <div class="container text-center py-4">
      <h1 class="display-4" style="font-family: Georgia, serif;">About Alchemy Cottage</h1>
      <p class="lead text-muted mx-auto" style="max-width: 700px;">
        A little cottage kitchen, a love of baking, and plenty of treats made with care.
      </p>
    </div>
  </section>
-->
<section class="py-5 about-hero">
<div class="container text-center py-4">
  <div class="about-hero-panel mx-auto p-4 rounded">
    <h1 class="display-4" style="font-family: Georgia, serif;">About Alchemy Cottage</h1>
    <p class="lead text-muted mx-auto" style="max-width: 700px;">
      A little cottage kitchen, a love of baking, and plenty of treats made with care.
    </p>
  </div>
</div>
</section>

<div class="site-brand-wrap-soft-shop-reverse">
  <section class="container py-5">
    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img
          src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cottage-baking.jpg'); ?>"
          class="img-fluid rounded shadow"
          alt="Baking ingredients and treats in the cottage kitchen"
        >
      </div>

      <div class="col-md-6">
        <h2 style="font-family: Georgia, serif;">Our story</h2>
        <p class="lead">
          Alchemy Cottage grew from a love of homemade baking and sharing good
          food with others.
        </p>
        <p>
          We make small-batch cookies, cakes, and breads, and share recipes
          inspired by the comfort of baking at home. Whether you’re ordering
          something special or trying a recipe in your own kitchen, we’re glad
          you’re here.
        </p>
      </div>
    </div>
  </section>
</div>

  <section class="py-5 site-brand-wrap-soft-shop">
    <div class="container">
      <h2 class="text-center mb-4" style="font-family: Georgia, serif;">What we’re about</h2>

      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="h-100 p-4 site-brand-wrap-soft-reverse border rounded text-center">
            <h3 class="h4">Made with care</h3>
            <p class="mb-0">We bake in small batches and give every order thoughtful attention.</p>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="h-100 p-4 site-brand-wrap-soft-reverse border rounded text-center">
            <h3 class="h4">Made to be shared</h3>
            <p class="mb-0">From everyday treats to celebration cakes, baking brings people together.</p>
          </div>
        </div>

        <div class="col-md-4 mb-4">
          <div class="h-100 p-4 site-brand-wrap-soft-reverse border rounded text-center">
            <h3 class="h4">Recipes for home</h3>
            <p class="mb-0">We share approachable recipes so you can enjoy baking in your own kitchen.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="py-5">
    <div class="container">
      <div class="mx-auto" style="max-width: 720px;">
        <h2 class="text-center mb-3" style="font-family: Georgia, serif;">Get in touch</h2>
        <p class="text-center text-muted mb-4">
          Ask about custom orders, share a baking question, or just say hello.
        </p>

        <?php if ( isset( $_GET['sent'] ) && '1' === $_GET['sent'] ) : ?>
          <div class="alert alert-success" role="status">Thanks! Your message has been sent.</div>
        <?php elseif ( isset( $_GET['sent'] ) && '0' === $_GET['sent'] ) : ?>
          <div class="alert alert-warning" role="alert">Something went wrong. Please check the form and try again.</div>
        <?php endif; ?>


        <form action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
          <input type="hidden" name="action" value="alchemy_contact">
          <?php wp_nonce_field( 'alchemy_contact_form', 'alchemy_contact_nonce' ); ?>

          <div class="d-none" aria-hidden="true">
            <input type="text" name="website" tabindex="-1" autocomplete="off">
          </div>
          

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="contactName">Name</label>
              <input type="text" class="form-control" id="contactName"
                     name="name" autocomplete="name" required>
            </div>

            <div class="form-group col-md-6">
              <label for="contactEmail">Email</label>
              <input type="email" class="form-control" id="contactEmail"
                     name="email" autocomplete="email" required>
            </div>
          </div>

          <div class="form-group">
            <label for="contactSubject">What can we help with?</label>
            <select class="form-control" id="contactSubject" name="subject">
              <option value="">Choose a topic</option>
              <option value="custom-order">Custom order</option>
              <option value="recipe-question">Recipe question</option>
              <option value="other">Something else</option>
            </select>
          </div>

          <div class="form-group">
            <label for="contactMessage">Message</label>
            <textarea class="form-control" id="contactMessage" name="message"
                      rows="5" required></textarea>
          </div>

          <button type="submit" class="btn btn-dark site-brand-wrap-soft-reverse text-dark">Send message</button>
        </form>
      </div>
    </div>
  </section>


  <section class="site-brand-wrap-reverse">
  <div class="container py-2">
    <iframe
      class="map-embed"
      src="https://www.openstreetmap.org/export/embed?bbox=-80.42915403842927%2C27.67363030565969%2C-80.42573153972626%2C27.67564461301025&amp;layer=mapnik&amp;marker=27.674637463977355%2C-80.42744278907776"
      title="Alchemy Cottage location map"
      loading="lazy"
      style="border: 1px solid black"
    ></iframe>
    
    <small><a href="https://www.openstreetmap.org/?mlat=27.674637&amp;mlon=-80.427443#map=19/27.674637/-80.427443">View Larger Map</a></small>
  
    
  </div>
</section>

</main>

<?php 
    get_footer() ; 
?>
