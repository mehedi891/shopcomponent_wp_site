<?php
//Template Name: About-us

?>
<?php get_header() ?>

<main class="main aboutMain" role="main">
  <!-- Hero -->
  <section class="aboutHero">
    <div class="container">
      <h1 class="heading">About ShopComponent</h1>
      <p class="subheading">We’re building simple, powerful components that let merchants sell wherever their audience already is—blogs, partner sites, and beyond.</p>

      <ul class="aboutBadges">
        <li><span class="aboutBadge">Focused on merchant outcomes</span></li>
        <li><span class="aboutBadge">No-code by default</span></li>
        <li><span class="aboutBadge">Performance-first</span></li>
      </ul>
    </div>
  </section>

  <!-- Mission / Vision -->
  <section class="mission">
    <div class="container">
      <div class="missionGrid">
        <article class="missionCard">
          <h2 class="sectionTitle">Our mission</h2>
          <p>Remove friction between inspiration and purchase. We place the purchase moment inside content, not after it.</p>
        </article>
        <article class="missionCard">
          <h2 class="sectionTitle">What we believe</h2>
          <ul class="beliefs">
            <li><strong>Simple beats complex.</strong> A single script should unlock a storefront anywhere.</li>
            <li><strong>Own your data.</strong> Attribution and insights should be transparent and exportable.</li>
            <li><strong>Design matters.</strong> Components must feel native to any site, not bolted on.</li>
          </ul>
        </article>
      </div>
    </div>
  </section>

  <!-- Stats (placeholders—swap for real numbers) -->
  <section class="stats" aria-label="Company stats">
    <div class="container">
      <ul class="statsGrid">
        <li class="statCard">
          <span class="statNum">120+</span>
          <span class="statLabel">Merchants</span>
        </li>
        <li class="statCard">
          <span class="statNum">35+</span>
          <span class="statLabel">Integrations & CMSes</span>
        </li>
        <li class="statCard">
          <span class="statNum">3–12%</span>
          <span class="statLabel">Avg. lift in conversion</span>
        </li>
        <li class="statCard">
          <span class="statNum">10k+</span>
          <span class="statLabel">Embeds created</span>
        </li>
      </ul>
    </div>
  </section>

  <!-- Values -->
  <section class="values">
    <div class="container">
      <h2 class="sectionTitle">Our values</h2>
      <ul class="valuesGrid">
        <li class="valueItem">
          <div class="iconWrap sm">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M4 7h16M4 12h16M4 17h10" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
          <h3>Clarity</h3>
          <p>Make the complex feel effortless—one component, one copy, one embed.</p>
        </li>
        <li class="valueItem">
          <div class="iconWrap sm">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M3 12a9 9 0 1018 0A9 9 0 003 12zm9-5v6l4 2" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
          <h3>Speed</h3>
          <p>Fast to load, fast to ship, fast to understand.</p>
        </li>
        <li class="valueItem">
          <div class="iconWrap sm">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M12 3v18M3 12h18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
          </div>
          <h3>Trust</h3>
          <p>Accurate tracking, transparent data, and predictable behavior.</p>
        </li>
        <li class="valueItem">
          <div class="iconWrap sm">
            <svg viewBox="0 0 24 24" width="18" height="18"><path d="M3 3h18v14H3zM7 21h10" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </div>
          <h3>Craft</h3>
          <p>Polish that shows up in small details—animations, states, and copy.</p>
        </li>
      </ul>
    </div>
  </section>

  <!-- Timeline -->
  <section class="timeline">
    <div class="container">
      <h2 class="sectionTitle">Our story</h2>
      <ol class="timeList">
        <li>
          <div class="timeDot"></div>
          <div class="timeBody">
            <h4>2025 — Launch</h4>
            <p>Released ShopComponent publicly with WordPress, Webflow, and Ghost support.</p>
          </div>
        </li>
        <li>
          <div class="timeDot"></div>
          <div class="timeBody">
            <h4>2025 — Bundles & Checkout</h4>
            <p>Introduced 1-click bundles and direct checkout to reduce friction.</p>
          </div>
        </li>
        <li>
          <div class="timeDot"></div>
          <div class="timeBody">
            <h4>Next</h4>
            <p>Deeper analytics, partner portals, and more themes for creators.</p>
          </div>
        </li>
      </ol>
    </div>
  </section>

  <!-- Team -->
  <!-- <section class="team">
    <div class="container">
      <h2 class="sectionTitle">Team</h2>
      <ul class="teamGrid">
        <li class="teamCard">
          <span class="avatar lg">MC</span>
          <div>
            <h4 class="teamName">Member Name</h4>
            <p class="teamRole">Founder & Product</p>
          </div>
        </li>
        <li class="teamCard">
          <span class="avatar lg">DE</span>
          <div>
            <h4 class="teamName">Member Name</h4>
            <p class="teamRole">Design</p>
          </div>
        </li>
        <li class="teamCard">
          <span class="avatar lg">EN</span>
          <div>
            <h4 class="teamName">Member Name</h4>
            <p class="teamRole">Engineering</p>
          </div>
        </li>
        <li class="teamCard">
          <span class="avatar lg">MK</span>
          <div>
            <h4 class="teamName">Member Name</h4>
            <p class="teamRole">Marketing</p>
          </div>
        </li>
      </ul>
    </div>
  </section> -->

  <!-- FAQ -->
  <section class="faq">
    <div class="container">
      <h2 class="sectionTitle">FAQ</h2>
      <div class="faqList">
        <details class="faqItem">
          <summary>Does ShopComponent work with my CMS?</summary>
          <p>Yes. Paste a single script into any page with HTML access—WordPress, Webflow, Ghost, custom sites, and more.</p>
        </details>
        <details class="faqItem">
          <summary>How is attribution tracked?</summary>
          <p>Each embed can include UTM parameters and gets its own analytics so you can attribute clicks, carts, and revenue.</p>
        </details>
        <details class="faqItem">
          <summary>Will it match my site’s style?</summary>
          <p>Choose from themes or customize fonts, colors, and CTAs. Components inherit surrounding styles when you want them to.</p>
        </details>
      </div>
    </div>
  </section>

  <!-- Contact CTA -->
  <section class="contactCta">
    <div class="container">
      <div class="contactCard">
        <div class="contactCopy">
          <h3 class="contactTitle">Want to partner or have questions?</h3>
          <p class="contactSub">We’d love to hear from you—whether you’re a merchant, creator, or agency.</p>
        </div>
        <a class="button" href="/contact">Get in touch</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer() ?>