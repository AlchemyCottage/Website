<?php
  if (function_exists('the_custom_logo'))
    {
      $custom_logo_id = get_theme_mod('custom_logo') ;
      $logo = wp_get_attachment_image_src($custom_logo_id) ;
    }
?>


<footer class="site-brand-wrap-green-header text-light py-4">
  <div class="container">
    <div class="row align-items-center">

      <div class="col-lg-6 col-md-4 text-center text-md-left mb-3 mb-md-0">
        <!--<img class="mb-3 mx-auto logo" src="<?php echo $logo[0] ?>" alt="site-logo">-->
        <a href="/" class="text-dark text-decoration-none">
          <span class="h5" style="font-family: Georgia, serif;">Alchemy Cottage</span>
        </a>

        <p class="small text-white-50 mb-0">
          Homemade treats and recipes from our cottage kitchen.
        </p>
      </div>

      <div class="col-lg-6 col-md-8">
        <nav class="footer-navigation" aria-label="Footer navigation">
          <?php
          wp_nav_menu( array(
            'theme_location' => 'footer',
            'container'      => false,
            'menu_class'     => 'list-unstyled d-flex flex-wrap justify-content-center justify-content-md-end mb-0',
            'fallback_cb'    => false,
          ) );
          ?>
        </nav>
      </div>

    </div>

    <hr class="border-secondary my-3">

	<p class="small text-center text-white-50 mb-0">
	  &copy; 2026 Alchemy Cottage
	  <span class="powered-by">· Powered by <a href="https://electric-i.org" target="_blank" class="electric-link">Electric-i, LLC</a></span>
	</p>

    <p class="small text-center text-white-50 mb-0">
	Florida Food Cottage Business
	</p>
  </div>
</footer>

            




        <?php
            // scripts
            wp_footer();
        ?>

    </body>
</html> 
