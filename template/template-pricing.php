<?php
/**
 * Template Name: Pricing (ShopComponent)
 */
get_header(); ?>

<main class="main pricingMain" role="main">
  <section class="pricingHeader">
    <div class="container">
      <!-- <a class="backLink" href="<?php echo esc_url( home_url('/') ); ?>">← Subscription Plan</a> -->
      <h1 class="heading">Ready to start with ShopComponent?</h1>
      <p class="subheading">Choose the package that best suits your Business Needs</p>
    </div>
  </section>

  <section class="pricingSection">
    <div class="container">
      <div class="planGrid">

        <!-- Starter -->
        <article class="planCard" aria-labelledby="starterTitle">
          <header class="planHead">
            <h3 id="starterTitle" class="planName">Starter Plan</h3>
            <p class="planTagline">Basic features for new businesses.</p>
            <div class="planPrice">
              <span class="amount">Free</span>
            </div>
          </header>

          <div class="planCta">
            <!-- TODO: replace "#" with your install/login URL -->
            <a class="btnSolid" href="#">Free forever</a>
          </div>

          <ul class="featureList">
            <li><?php echo scp_check(); ?> 1 component with max 3 products</li>
            <li><?php echo scp_check(); ?> Basic customization</li>
            <li><?php echo scp_check(); ?> Copy embed code</li>
            <li><?php echo scp_check(); ?> Individual product add to cart / checkout</li>
            <li><?php echo scp_check(); ?> Edit / update component</li>
            <li><?php echo scp_check(); ?> Email support</li>
          </ul>
        </article>

        <!-- Growth -->
        <article class="planCard" aria-labelledby="growthTitle">
          <header class="planHead">
            <h3 id="growthTitle" class="planName">Growth Plan</h3>
            <p class="planTagline">Advanced tools to boost sales and AOV.</p>
            <div class="planPrice">
              <span class="amount">$29</span><span class="per">/month</span>
            </div>
          </header>

          <div class="planCta">
            <!-- TODO: replace "#" with your install/login URL -->
            <a class="btnSolid" href="#">Start 5-days free trial</a>
          </div>

          <ul class="featureList">
            <li><?php echo scp_check(); ?> 10 components with max 10 product variants per component</li>
            <li><?php echo scp_check(); ?> Inventory tracking before order</li>
            <li><?php echo scp_check(); ?> Email component code</li>
            <li><?php echo scp_check(); ?> Implement restrictions</li>
            <li><?php echo scp_check(); ?> Add all products to cart in a single click</li>
            <li><?php echo scp_check(); ?> Preset qty per product/variant</li>
            <li><?php echo scp_check(); ?> Layout customization</li>
            <li><?php echo scp_check(); ?> Custom CSS</li>
          </ul>
        </article>

      </div>
    </div>
  </section>
</main>

<?php get_footer();

/* Helper icon (you can move to functions.php if reusing elsewhere) */
function scp_check() {
  return '<svg class="check" viewBox="0 0 20 20" aria-hidden="true"><path d="M8 13.5l-3-3m3 3l7-7" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><circle cx="10" cy="10" r="9" fill="none" stroke="currentColor" stroke-width="1.5" opacity=".45"/></svg>';
}
