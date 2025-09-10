<?php
/* 
Template Name: Blog 
*/
?>

<?php get_header() ?>

<main class="main blogMain" role="main">
  <!-- Intro / search / filters -->
  <section class="blogHero">
    <div class="container">
      <h1 class="heading">Insights & Updates</h1>
      <p class="subheading">Guides, product updates, and ideas on selling beyond your storefront.</p>

<!-- <?php get_search_form(); ?> -->
<form class="blogSearch" role="search" method="get" action="<?php echo esc_url( home_url('/') ); ?>">
  <label class="sr-only" for="q"><?php esc_html_e('Search blog', 'spc'); ?></label>
  <input
    id="q"
    class="searchInput"
    type="search"
    name="s"
    placeholder="<?php esc_attr_e('Search articles…', 'spc'); ?>"
    value="<?php echo esc_attr( get_search_query() ); ?>"
  />
  <button class="searchBtn" type="submit" aria-label="<?php esc_attr_e('Search', 'spc'); ?>">
    <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true">
      <circle cx="11" cy="11" r="7" fill="none" stroke="currentColor" stroke-width="1.8"/>
      <path d="M20 20l-3.5-3.5" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
    </svg>
  </button>
</form>
     <?php
// Figure out the "All" URL (blog index)
$all_url = ( get_option('show_on_front') === 'page' && get_option('page_for_posts') )
  ? get_permalink( (int) get_option('page_for_posts') )
  : home_url( '/' );

// Get top-level categories (change/remove 'parent' => 0 if you want all)
$uncat_id = get_cat_ID( 'Uncategorized' );
$cats = get_terms( array(
  'taxonomy'   => 'category',
  'hide_empty' => true,
  'parent'     => 0,               // top-level only; delete this line to include all categories
  'orderby'    => 'name',
  'order'      => 'ASC',
  'exclude'    => $uncat_id ? array( $uncat_id ) : array(),
) );

// Determine current category (to set is-active)
$active_id = 0;
if ( is_category() ) {
  $qo = get_queried_object();
  if ( $qo && ! is_wp_error( $qo ) ) {
    $active_id = (int) $qo->term_id;
  }
}
?>
          <nav class="blogFilters" aria-label="Categories">
            <ul class="filterList">
              <li>
                <a class="chip <?php echo $active_id ? '' : 'is-active'; ?>" href="<?php echo esc_url( $all_url ); ?>">
                  <?php echo esc_html__( 'All', 'yourtheme' ); ?>
                </a>
              </li>

              <?php if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) : ?>
                <?php foreach ( $cats as $cat ) :
                  $url = get_term_link( $cat );
                  if ( is_wp_error( $url ) ) continue;
                  $is_active = ( $active_id === (int) $cat->term_id ) ? ' is-active' : '';
                ?>
                  <li>
                    <a class="chip<?php echo $is_active; ?>" href="<?php echo esc_url( $url ); ?>">
                      <?php echo esc_html( $cat->name ); ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
            </ul>
          </nav>

    </div>
  </section>

  <!-- Featured post -->
  <section class="featured">
    <div class="container">
     <?php
// Query the newest post with tag "feature"
                $featured_q = new WP_Query([
                  'tag'                 => 'feature',   // make sure the tag slug is exactly "feature"
                  'posts_per_page'      => 1,
                  'ignore_sticky_posts' => true,
                  'no_found_rows'       => true,
                ]);

                $featured_exclude = []; // collect IDs to exclude from the grid below

                if ( $featured_q->have_posts() ) :
                  while ( $featured_q->have_posts() ) : $featured_q->the_post();
                    $featured_exclude[] = get_the_ID();

                    // Category (first only)
                    $cat_html = '';
                    $cats = get_the_category();
                    if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
                      $cat_link = get_term_link( $cats[0] );
                      if ( ! is_wp_error( $cat_link ) ) {
                        $cat_html = sprintf(
                          '<a class="postCategory" href="%s">%s</a>',
                          esc_url( $cat_link ),
                          esc_html( $cats[0]->name )
                        );
                      }
                    }

                    // Excerpt (strip any inline links your theme might inject)
                    $raw_excerpt = get_the_excerpt();
                    $clean_excerpt = preg_replace( '#<a[^>]*>.*?</a>#i', '', (string) $raw_excerpt );
                    // If you standardized to 40 words earlier, you can skip this trim:
                    $clean_excerpt = wp_trim_words( wp_strip_all_tags( $clean_excerpt, true ), 40, '…' );

                    // Read time (uses your helper if present; otherwise quick fallback)
                    if ( function_exists( 'sc_read_time' ) ) {
                      $read_time = sc_read_time();
                    } else {
                      $word_count = str_word_count( wp_strip_all_tags( get_the_content(), true ) );
                      $read_time  = max( 1, (int) ceil( $word_count / 220 ) ) . ' min read';
                    }
                    ?>
                    <article class="postFeatured">
                      <a class="postThumb" href="<?php the_permalink(); ?>">
                        <?php
                          if ( has_post_thumbnail() ) {
                            the_post_thumbnail( 'large', ['alt' => esc_attr( get_the_title() )] );
                          } else {
                            // Optional placeholder if no thumbnail:
                            echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/placeholder-16x10.jpg' ) . '" alt="">';
                          }
                        ?>
                      </a>
                      <div class="postBody">
                        <?php echo $cat_html; ?>
                        <h2 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <p class="postExcerpt"><?php echo esc_html( $clean_excerpt ); ?></p>
                        <div class="postMeta">
                          <div class="author">
                            <span class="avatar"><?php echo esc_html( strtoupper( mb_substr( get_the_author_meta('display_name'), 0, 2 ) ) ); ?></span>
                            <span class="by"><?php the_author(); ?></span>
                          </div>
                          <span class="metaDot">•</span>
                          <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                          <span class="metaDot">•</span>
                          <span><?php echo esc_html( $read_time ); ?></span>
                        </div>
                      </div>
                    </article>
                    <?php
                  endwhile;
                  wp_reset_postdata();
                endif;
                ?>

    </div>
  </section>
  <?php
    if ( ! isset($featured_exclude) || ! is_array($featured_exclude) ) {
      $featured_exclude = array();
    }
  ?>
  <!-- Posts grid -->
  <section class="posts">
  <div class="container">

    <div class="blogLayout">
      <!-- MAIN COLUMN -->
      <div class="contentCol">
        <div class="postsGrid">
          <?php
          // ✅ Current page (you already had this above — keep it here)
          $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
          if ( is_front_page() || is_page() ) {
            $paged = get_query_var('page') ? absint(get_query_var('page')) : $paged;
          }

          $main_post = new WP_Query(array(
            'post_type'           => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      => 10,
            'ignore_sticky_posts' => true,
            'post__not_in'        => $featured_exclude ?: array(),
            'orderby'             => 'date',
            'order'               => 'DESC',
            'paged'               => $paged,
          ));

          if ( $main_post->have_posts() ) :
            while ( $main_post->have_posts() ) : $main_post->the_post(); ?>
              <article class="postCard">
                <a class="postThumb" href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('large'); ?>
                </a>

                <div class="postInfo">
                  <?php
                  $primary_id = (int) get_post_meta(get_the_ID(), '_yoast_wpseo_primary_category', true);
                  $cat_obj    = $primary_id ? get_term($primary_id, 'category') : null;

                  if ( ! $cat_obj || is_wp_error($cat_obj) ) {
                    $cats = get_the_category(get_the_ID());
                    $cat_obj = (! empty($cats) && ! is_wp_error($cats)) ? $cats[0] : null;
                  }

                  if ( $cat_obj && ! is_wp_error($cat_obj) ) {
                    $href = get_term_link($cat_obj);
                    if ( ! is_wp_error($href) ) {
                      printf('<a class="postCategory" href="%s">%s</a>', esc_url($href), esc_html($cat_obj->name));
                    }
                  }
                  ?>

                  <h3 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                  <p class="postExcerpt"><?php echo get_the_excerpt(); ?></p>

                  <div class="postMeta">
                    <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                    <span class="metaDot">•</span>
                    <span><?php echo esc_html( function_exists('sc_read_time') ? sc_read_time() : ''); ?></span>
                  </div>
                </div>
              </article>
            <?php endwhile;
          else : ?>
            <div class="notFoundText">Sorry, Nothing Found.</div>
          <?php endif; ?>
        </div>

        <?php
          // Styled pagination for this custom query
          if ( function_exists('pagenavi') ) {
            pagenavi( $main_post );
          }

          // IMPORTANT: reset after custom loop
          wp_reset_postdata();
        ?>
      </div>

      <!-- SIDEBAR -->
      <aside class="sidebarCol" aria-label="Sidebar">
        <div class="widget">
          <h3 class="widgetTitle">Archives</h3>
          <ul class="archiveList">
            <?php
              // Last 12 months with post counts
              wp_get_archives( array(
                'type'            => 'monthly',
                'limit'           => 12,
                'show_post_count' => true,
              ) );

              
            ?>
          </ul>
        </div>

        <!-- (Optional) add more widgets later
        <div class="widget">
          <h3 class="widgetTitle">Tags</h3>
          <div class="tagCloud">
            <?php // wp_tag_cloud( array('smallest'=>12,'largest'=>12,'unit'=>'px') ); ?>
          </div>
        </div>
        -->
      </aside>
    </div><!-- /.blogLayout -->

  </div>
</section>
</main>


<?php get_footer() ?>