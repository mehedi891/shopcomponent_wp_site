<?php
//Template Name: Home

?>
<?php get_header() ?>


    <main class="main" role="main">
      <!-- Pre-hero -->
      <section class="prehero">
        <div class="container">
          <h2 class="preheroHead">Bring your products to where your audience already is</h2>
          <p class="preheroSub">Create a component → Copy &amp; embed it on any site → Sell where people scroll. Turn any page into a storefront.</p>
        </div>
      </section>

      <!-- Hero -->
      <section class="hero">
        <div class="containerGrid">
          <div class="heroCopy">
            <h1 class="heading">Turn Any Page Into a Storefront. Instantly.</h1>
            <p class="subheading">Embed Shopify products into blogs, partner sites, and landing pages. Fully customizable, trackable, and synced with Shopify in real time.</p>

            <form class="form" onsubmit="installAppShopify(event);">
              <label class="label">
                <span class="labelText">MyShopify URL</span>
                <input class="input" type="text" name="shop" placeholder="example.myshopify.com" required pattern=".*\.myshopify\.com$" title="Enter a valid Shopify domain, e.g. example.myshopify.com" />
              </label>
              <button class="button" type="submit">
                Install on Shopify
                <svg class="buttonIcon" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
                  <path d="M5 12h14M13 5l7 7-7 7" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </button>
              <p class="smallNote">No credit card needed · 1-minute setup</p>
            </form>

            <div class="heroCtas">
              <a href="#how" class="ghostBtn">See How It Works</a>
              <a href="#demo" class="ghostBtn">Watch 60s Overview</a>
            </div>

            <div class="trustRow">
              <span class="trustHint">Trusted by Shopify merchants and marketers who want to sell beyond their storefront.</span>
              <div class="trustLogos">
                <span class="trustBadge">WordPress</span><span class="dividerDot"></span>
                <span class="trustBadge">Webflow</span><span class="dividerDot"></span>
                <span class="trustBadge">Ghost</span><span class="dividerDot"></span>
                <span class="trustBadge">Wix</span><span class="dividerDot"></span>
                <span class="trustBadge">Squarespace</span>
              </div>
            </div>
          </div>

          <aside class="heroCard" aria-label="Embed preview">
            <div class="previewHeader"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>
            <div class="previewBody">
              <div class="previewImage"></div>
              <div class="previewMeta">
                <div>
                  <h3 class="previewTitle">Blog + Embedded Product Card</h3>
                  <p class="previewDesc">Mockup: a blog post with a shoppable product card and Shopify checkout popup.</p>
                </div>
                <code class="code">
                  &lt;script src="https://app.shopcomponent.com/shopcomponent.js"
                  data-product="gid://shopify/Product/123" data-theme="minimal" async&gt;&lt;/script&gt;
                </code>
              </div>
            </div>
          </aside>
        </div>
      </section>


      <section class="heroSection">
        <div class="container">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero_banner.webp" alt="Sell More">
        </div>
      </section>

      <!-- Problem → Solution -->
      <section class="problem">
        <div class="container">
          <h3 class="sectionTitle">Stop losing sales between storefronts.</h3>
          <p class="problemSub">Shopify Buy Buttons are limited. Headless builds are expensive.</p>
          <div class="problemGrid">
            <p class="problemText">Every extra click in eCommerce is a drop-off point: homepage → collection → product → cart → checkout. ShopComponent eliminates friction by letting customers buy the moment they’re inspired—directly inside the content they’re already reading.</p>
            <p class="problemText">ShopComponent gives you powerful, customizable storefront widgets using your own Shopify products and collections — embeddable anywhere.</p>
          </div>
          <ul class="benefits">
            <li>✅ More conversions</li>
            <li>✅ Higher order values</li>
            <li>✅ Expanded reach without extra stores</li>
          </ul>
        </div>
      </section>

      <!-- How it works -->
      <section id="how" class="how">
        <div class="container">
          <h3 class="howTitle">Get started in 3 simple steps.</h3>
          <ol class="steps">
            <li><span class="stepNum">1</span><div><strong>Create Component</strong><br/>Use our no-code builder to choose a collection, products, or bundles with a live preview.</div></li>
            <li><span class="stepNum">2</span><div><strong>Customize &amp; Set Behavior</strong><br/>Adjust design, copy, and CTAs. Choose layout, preset quantities, button options, UTM tracking, restrictions, and more.</div></li>
            <li><span class="stepNum">3</span><div><strong>Copy &amp; Embed Anywhere</strong><br/>Paste the code into Shopify blog, WordPress, landing pages, or external CMS and let customers checkout there.</div></li>
          </ol>
          <div class="ctaCenter"><a href="#install" class="buttonLg">Install Now →</a></div>
        </div>
      </section>

      <!-- Use cases -->
      <section id="usecases" class="usecases">
        <div class="container">
          <h3 class="sectionTitle">Why ShopComponent?</h3>
          <ul class="useGrid">
            <li><strong>Turn Blogs Into Sales Funnels</strong><br/>Embed products into tutorial articles, gift guides, or lookbooks.</li>
            <li><strong>Power Landing Pages with Instant Checkout</strong><br/>Run fast campaign drops or limited-time offers with preset products and direct checkout.</li>
            <li><strong>Enable Partner or Affiliate Embeds</strong><br/>Share components with influencers or partners with UTM tracking built in.</li>
            <li><strong>Build Lightweight Bundles or B2B Catalogs</strong><br/>Allow buyers to purchase multiple items at once — pre-configured by you.</li>
            <li><strong>Bloggers &amp; Creators</strong><br/>Turn content into shoppable experiences.</li>
            <li><strong>Marketers</strong><br/>Add direct checkout moments inside campaigns and landing pages.</li>
          </ul>
        </div>
      </section>

      <!-- Features -->
      <section id="features" class="features">
        <div class="container">
          <h3 class="sectionTitle">Built for merchants who want more than a Buy Button.</h3>
          <ul class="featureGrid">
            <li class="featureItem">
              <div class="iconWrap">
                <svg viewBox="0 0 24 24" width="20" height="20"><path d="M4 7h16M4 12h16M4 17h10" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
              </div>
              <h4>Customizable Components</h4>
              <p>Match your brand with flexible layouts, colors, and CTAs. No coding needed.</p>
            </li>
            <li class="featureItem">
              <div class="iconWrap">
                <svg viewBox="0 0 24 24" width="20" height="20"><path d="M3 12a9 9 0 1018 0A9 9 0 003 12zm9-5v6l4 2" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
              </div>
              <h4>Embed Anywhere</h4>
              <p>One script works on WordPress, Webflow, Ghost, Wix, Squarespace, or any site with HTML.</p>
            </li>
            <li class="featureItem">
              <div class="iconWrap">
                <svg viewBox="0 0 24 24" width="20" height="20"><path d="M12 3v18M3 12h18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
              </div>
              <h4>Real-Time Sync</h4>
              <p>Always up-to-date prices, variants, and inventory from your Shopify store.</p>
            </li>
            <li class="featureItem">
              <div class="iconWrap">
                <svg viewBox="0 0 24 24" width="20" height="20"><path d="M3 3h18v14H3zM7 21h10" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
              </div>
              <h4>Sales Attribution</h4>
              <p>Track clicks, carts, and revenue for each partner or content embed.</p>
            </li>
            <li class="featureItem">
              <div class="iconWrap">
                <svg viewBox="0 0 24 24" width="20" height="20"><path d="M4 8h16M6 12h12M8 16h8" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
              </div>
              <h4>Bundles &amp; Kits</h4>
              <p>Create 1-click bundles and curated kits to boost AOV by defining preset variants and quantities.</p>
            </li>
            <li class="featureItem">
              <div class="iconWrap">
                <svg viewBox="0 0 24 24" width="20" height="20"><path d="M7 12h10M6 16h12M8 8h8" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
              </div>
              <h4>Add-All-to-Cart &amp; Direct Checkout</h4>
              <p>Enable one-click checkout or add all items to cart in a single click for a smoother purchase.</p>
            </li>
          </ul>
        </div>
      </section>

      <!-- Demo -->
      <section id="demo" class="demo">
        <div class="container">
          <h3 class="sectionTitle">See ShopComponent in Action</h3>
          <p class="demoText">Drop a product into a blog post, partner site, or campaign page, and let shoppers check out instantly with Shopify’s secure checkout.</p>
          <div class="demoBox">
            <div class="demoPoster"><div class="play" aria-hidden="true">▶</div></div>
          </div>
        </div>
      </section>

      <!-- Final CTA -->
      <section id="install" class="finalCta">
        <div class="container">
          <h3 class="finalTitle">Ready to Sell Beyond the Storefront?</h3>
          <p class="finalSub">Install ShopComponent and start embedding shoppable experiences in minutes.</p>
          <form class="form formFinal" onsubmit="installAppShopify(event);">
            <label class="label">
              <span class="labelText">MyShopify URL</span>
              <input class="input" type="text" name="shop" placeholder="example.myshopify.com" required pattern=".*\.myshopify\.com$" />
            </label>
            <button class="button" type="submit">Install with Shopify</button>
            <p class="smallNote">No credit card needed · 1-minute setup</p>
          </form>
        </div>
      </section>
    </main>

   


<?php get_footer() ?>