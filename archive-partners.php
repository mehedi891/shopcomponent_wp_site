<?php
/**
 * Template Name: Partners
 */
get_header();

// Current page for pagination
$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
if ( is_front_page() || is_page() ) {
  $paged = get_query_var('page') ? absint(get_query_var('page')) : $paged;
}

// Build a query that prefers a CPT "partner" (if you have one)
// and gracefully falls back to posts in category "partners".
$args = array(
  'posts_per_page'      => 18,
  'ignore_sticky_posts' => true,
  'paged'               => $paged,
);
if ( post_type_exists('partners') ) {
  $args['post_type'] = 'partners';
} else {
  $args['post_type']    = 'post';
  
}

$partners_q = new WP_Query( $args );
?>

<main class="main partnersMain" role="main">
  <section class="partnersHero">
    <div class="container">
      <h1 class="heading">Our Partners</h1>
      <p class="subheading">Apps and services that work great with ShopComponent.</p>
    </div>
  </section>

  <section class="partnersSection">
    <div class="container">
      <?php if ( $partners_q->have_posts() ) : ?>
        <div class="partnersGrid">
          <?php while ( $partners_q->have_posts() ) : $partners_q->the_post(); ?>
            <?php
              // Optional external URL (ACF/meta). If you have a field called 'partner_url'.
              $external = trim( (string) get_post_meta( get_the_ID(), 'partner_url', true ) );
              $link     = $external ? $external : get_permalink();
              $target   = $external ? ' target="_blank" rel="noopener"' : '';
              $name     = get_the_title();
              $logo_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
              $initials = strtoupper( mb_substr( $name, 0, 2 ) );
               $custom_text = get_post_meta(get_the_ID(), '_partner_custom_text', true);
            ?>
            <article class="partnerCard">
              <a class="partnerLogoWrap" href="<?php echo esc_url( $link ); ?>"<?php echo $target; ?>>
                <?php if ( $logo_url ) : ?>
                  <img class="partnerLogo" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $name ); ?> logo">
                <?php else : ?>
                  <span class="logoFallback" aria-hidden="true"><?php echo esc_html( $initials ); ?></span>
                <?php endif; ?>
              </a>

              <h3 class="partnerName">
                <a href="<?php echo esc_url( $link ); ?>"<?php echo $target; ?>>
                  <?php echo esc_html( $name ); ?>
                </a>
              </h3>

              <div class="partnerCta">
                <a class="btnSolid" href="<?php echo esc_html($custom_text); ?>"<?php echo $target; ?>>Show details</a>
              </div>
            </article>
          <?php endwhile; ?>
        </div>

        <?php
          // Pagination (uses your styled pagenavi if available)
          if ( function_exists('pagenavi') ) {
            pagenavi( $partners_q );
          } else {
            echo '<nav class="pagination">';
            echo paginate_links( array(
              'total'     => (int) $partners_q->max_num_pages,
              'current'   => max(1, $paged),
              'mid_size'  => 1,
              'prev_text' => __('Prev','yourtheme'),
              'next_text' => __('Next','yourtheme'),
            ) );
            echo '</nav>';
          }
          wp_reset_postdata();
        ?>

      <?php else : ?>
        <div class="notFoundText">No partners added yet.</div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
