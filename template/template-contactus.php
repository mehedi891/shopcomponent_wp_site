<?php
//Template Name: Conatct-us

?>
<?php get_header() ?>


  <main class="main contactMain" role="main">
  <!-- Intro -->
  <section class="contactHero">
    <div class="container">
      <h1 class="heading">Contact us</h1>
      <p class="subheading">Questions, partnerships, or support — we’re here to help.</p>

      <ul class="contactHighlights">
        <li><span class="chip">Avg. response: under 24h</span></li>
        <li><span class="chip">Priority support for paid plans</span></li>
        <li><span class="chip">Global coverage</span></li>
      </ul>
    </div>
  </section>

  <!-- Form + Contact cards -->
  <section class="contactGridSection">
    <div class="container">
      <div class="contactGrid">
      

        <?php echo do_shortcode('[fluentform id="1"]'); ?>

        <!-- Side info -->
        <aside class="contactAside" aria-label="Contact information">
          <article class="contactCard">
            <h3>Support</h3>
            <p class="muted">Get help with setup, embeds, and integrations.</p>
            <ul class="contactList">
              <!-- <li><a href="mailto:support@shopcomponent.com">support@shopcomponent.com</a></li> -->
              <li>Docs: <a href="/academy">Help Center</a></li>
            </ul>
          </article>

          <article class="contactCard">
            <h3>Sales & partnerships</h3>
            <p class="muted">Agencies, creators, and volume plans.</p>
            <ul class="contactList">
              <!-- <li><a href="mailto:partners@shopcomponent.com">partners@shopcomponent.com</a></li> -->
              <li><a href="#">Partner program</a></li>
            </ul>
          </article>

          <article class="contactCard">
            <h3>Billing</h3>
            <p class="muted">Invoices, refunds, and plan changes.</p>
            <ul class="contactList">
              <!-- <li><a href="mailto:billing@shopcomponent.com">billing@shopcomponent.com</a></li> -->
              <li><a href="/pricing">Pricing</a></li>
            </ul>
          </article>
        </aside>
      </div>
    </div>
  </section>

  <!-- Offices / Map -->
  <section class="locations">
    <div class="container">
      <div class="mapGrid">
        <div class="mapBox" role="img" aria-label="Map placeholder">
          <!-- Replace with real map/embed -->
          <div class="mapPoster">Map / Office</div>
        </div>

        <ul class="officeList">
          <li class="officeCard">
            <h4>Dhaka</h4>
            <p class="muted">Mon–Fri, 9:00–18:00 BST</p>
            <!-- <address>Level 4, Example Tower<br>Gulshan, Dhaka</address> -->
          </li>
          <li class="officeCard">
            <h4>Remote</h4>
            <p class="muted">Worldwide coverage</p>
            <address>Support available across timezones</address>
          </li>
        </ul>
      </div>
    </div>
  </section>

  <!-- FAQ (optional, reuses blog/about style) -->
  <section class="faq slim">
    <div class="container">
      <div class="faqList">
        <details class="faqItem">
          <summary>How fast do you reply?</summary>
          <p>We aim for under 24 hours on weekdays. Paid plans receive priority routing.</p>
        </details>
        <details class="faqItem">
          <summary>Do you offer onboarding?</summary>
          <p>Yes—guided setup for paid plans, plus self-serve docs and templates.</p>
        </details>
      </div>
    </div>
  </section>
</main>


<?php get_footer() ?>