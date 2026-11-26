<!DOCTYPE HTML>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Alchemy Cottage Template">
        <meta name="author" content="https://electric-i.org">

        <?php
            // styles
            wp_head();
        ?>

    </head>


    <body>
      <!--
        <header class="bg-light border-bottom">
  <div class="container py-4 text-center">
    <a href="#" class="text-decoration-none text-dark">
      <span class="d-block fs-1 fw-semibold" style="font-family: Georgia, serif;">
        Alchemy Cottage
      </span>
      <span class="text-secondary small">A little magic for everyday living</span>
    </a>
      </div>
-->
    <header class="">
  <div class="px-3 py-4 text-center site-brand-wrap">
  <a class="text-decoration-none text-dark">
    <span class="d-block fs-1 fw-semibold" style="font-family: Georgia, serif;">
      Alchemy Cottage
    </span>
    <span class="text-secondary small">Florida Cottage Food Business</span>
  </a>
</div>


  <nav class="navbar navbar-expand-sm navbar-dark site-brand-wrap-green-header" aria-label="Main navigation">
    <div class="container">
      <button class="navbar-toggler mx-auto" type="button"
        data-toggle="collapse" data-target="#mainNavigation"
        aria-controls="mainNavigation" aria-expanded="false"
        aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

      <div class="collapse navbar-collapse justify-content-center" id="mainNavigation">

        <?php
          wp_nav_menu(
            array(
              'menu' => 'primary',
              'container' => '',
              'theme_location' => 'primary',
              'items_wrap' => '<ul id="" class="site-nav">%3$s</ul>'
            )
          ) ;
        ?>

      <!--
        <ul class="navbar-nav gap-lg-3 py-2 py-lg-0">
          <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Recipes</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
      -->

      </div>
    </div>
  </nav>

</header>
