<footer class="siteFooter" role="contentinfo">
  <div class="container footerGrid">
    <!-- Brand / Logo -->
    <div class="footerBrand">
      <!-- Swap the DIV for <img src="logo.svg" alt="ShopComponent"> if you have a logo file -->
      <a class="footerLogo" href="#">
        <div class="logo logo--footer">
           <a href="<?php echo home_url()?>"><img class="logoImg imgFullWidth" src="<?php echo get_theme_mod('eflLogo'); ?>" alt="ShopComponent"></a>
        </div>
        <!-- <span class="footerBrandText">ShopComponent</span> -->
      </a>
      <p class="footerTag">
        Embed Shopify products anywhere. Share, sell, and track sales from partner content.
      </p>
    </div>

    <!-- Integrations (UL/LI so WP can output here easily) -->
   <nav class="footerNav" aria-label="Integrations">
  <h4 class="footerHeading">Integrations</h4>

  <?php
  wp_nav_menu([
    'theme_location' => 'footer_menu_integrations',
    'container'      => false,                             
    'menu_class'     => 'footerLinks',                     
    'menu_id'        => 'footerLinksIntegrations',         
    'depth'          => 1,                                 
    'fallback_cb'    => '__return_empty_string',          
    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
  ]);
  ?>
</nav>

    <!-- Useful links -->
    <nav class="footerNav" aria-label="Integrations">
   <h4 class="footerHeading">Useful links</h4>
  <?php
  wp_nav_menu([
    'theme_location' => 'footer_menu_useful_links',
    'container'      => false,                             
    'menu_class'     => 'footerLinks',                     
    'menu_id'        => 'footerLinksIntegrations',         
    'depth'          => 1,                                 
    'fallback_cb'    => '__return_empty_string',          
    'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
  ]);
  ?>
</nav>

    <!-- Newsletter -->
    <div class="footerSubscribe">
      <h4 class="footerHeading">Subscribe to updates</h4>
      <!-- <form class="subscribeForm" method="post" action="/newsletter">
        <label class="sr-only" for="newsletter-email">Email address</label>
        <input
          id="newsletter-email"
          class="emailInput"
          type="email"
          name="email"
          placeholder="you@company.com"
          required
          autocomplete="email"
        />
        <button class="subscribeBtn" type="submit">Subscribe</button>
      </form> -->
      <?php echo do_shortcode('[fluentform id="2"]'); ?>
      <p class="smallNote">No spam. Unsubscribe anytime.</p>
    </div>
  </div>

  <div class="footerBottom">
    <div class="container footerBottomRow">
      <small class="legal">© <?php echo date("Y"); ?> ShopComponent</small>
      <ul class="footerLegalLinks">
        <li><a href="/privacy-policy">Privacy</a></li>
        <li aria-hidden="true">•</li>
        <li><a href="#">Terms</a></li>
      </ul>
    </div>
  </div>
</footer>

      <script>
          var selectedYear = <?php echo json_encode(get_query_var('year')); ?>;
          var selectedMonth = <?php echo json_encode(get_query_var('monthnum')); ?>;
      </script>

      <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/68b29a6a109d7be2aa210b9e/1j3sqmcqg';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<?php wp_footer(); ?>
</body>
</html>
