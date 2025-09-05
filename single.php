<?php
/*
 Single template
-----
*/
?>
<?php get_header() ?>


<main class="main postMain" role="main">
  <!-- Breadcrumbs (UL/LI so it’s WP-friendly) -->
  <!-- <nav class="crumbs" aria-label="Breadcrumb">
    <div class="container">
      <ul class="crumbsList">
        <li><a class="crumbsLink" href="/blog">Blog</a></li>
        <li aria-hidden="true" class="crumbsSep">/</li>
        <li><a class="crumbsLink" href="#">Product updates</a></li>
        <li aria-hidden="true" class="crumbsSep">/</li>
        <li class="is-current" aria-current="page">Introducing Bundles & Direct Checkout</li>
      </ul>
    </div>
  </nav> -->

  <!-- Post header -->
  <header class="postHeader">
    <div class="container">
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
      <h1 class="postTitleXL"><?php the_title() ?></h1>

      <div class="postMetaRow">
        <div class="author">
          <span class="avatar">SC</span>
          <div class="authorMeta">
            <span class="by">ShopComponent Team</span>
            <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
            <span class="metaDot">•</span>
            <span><?php echo esc_html( function_exists('sc_read_time') ? sc_read_time() : ''); ?></span>
          </div>
        </div>

        <!-- <div class="shareBar">
          <a class="shareBtn" href="#" aria-label="Share on X/Twitter">
            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M4 4l16 16M20 4L4 20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            <span>Share</span>
          </a>
          <a class="shareBtn" href="#" aria-label="Share on LinkedIn">
            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M6 9v10M6 5v.01M10 19v-6a3 3 0 016 0v6" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            <span>LinkedIn</span>
          </a>
          <button class="shareBtn copyBtn" type="button" aria-label="Copy link">
            <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true"><path d="M9 9h7a2 2 0 012 2v7a2 2 0 01-2 2H9a2 2 0 01-2-2v-7a2 2 0 012-2zm2-4h7a2 2 0 012 2v7" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg>
            <span>Copy</span>
          </button>
        </div> -->


      </div>
    </div>
  </header>

  <!-- Hero image -->
  <figure class="postHero">
    <div class="container">
      <?php the_post_thumbnail('large'); ?>
      <figcaption><?php the_post_thumbnail_caption() ?></figcaption>
    </div>
  </figure>

  <!-- Post content -->
  <article class="postContent">
    <div class="container contentWrap">
      <div class="postBody">
        <?php the_content(); ?>
      </div>  



      <hr class="sectionRule" />

      <!-- <ul class="tagList" aria-label="Tags">
        <li><a class="chip" href="#">product</a></li>
        <li><a class="chip" href="#">bundles</a></li>
        <li><a class="chip" href="#">checkout</a></li>
        <li><a class="chip" href="#">updates</a></li>
      </ul> -->
    </div>
  </article>



  <!-- Next / Prev -->

<nav class="postPager" aria-label="Post navigation">
  <div class="container pagerRow">
    <?php
    // Previous = older post; Next = newer post (WordPress chronology)
    $prev_post = get_previous_post(); // older
    $next_post = get_next_post();     // newer

    if ( $prev_post ) : ?>
      <a class="pagerItem pagerPrev" href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>">
        <span class="pagerLabel"><?php esc_html_e('Previous','yourtheme'); ?></span>
        <span class="pagerTitle"><?php echo esc_html( get_the_title( $prev_post ) ); ?></span>
      </a>
    <?php else : ?>
      <span class="pagerItem pagerPrev isDisabled" aria-disabled="true">
        <span class="pagerLabel"><?php esc_html_e('Previous','yourtheme'); ?></span>
        <span class="pagerTitle">—</span>
      </span>
    <?php endif; ?>

    <?php if ( $next_post ) : ?>
      <a class="pagerItem pagerNext" href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
        <span class="pagerLabel"><?php esc_html_e('Next','yourtheme'); ?></span>
        <span class="pagerTitle"><?php echo esc_html( get_the_title( $next_post ) ); ?></span>
      </a>
    <?php else : ?>
      <span class="pagerItem pagerNext isDisabled" aria-disabled="true">
        <span class="pagerLabel"><?php esc_html_e('Next','yourtheme'); ?></span>
        <span class="pagerTitle">—</span>
      </span>
    <?php endif; ?>
  </div>
</nav>



<!-- Related posts -->
<section class="related">
  <div class="container">
    <h3 class="sectionTitle">Related posts</h3>
    <div class="relatedGrid">
      <?php
        $current_id = get_the_ID();
        $cat_ids    = wp_get_post_categories( $current_id );

        // Prefer posts from the same categories; exclude current post
        $args = array(
          'post_type'           => 'post',
          'post_status'         => 'publish',
          'posts_per_page'      => 3,
          'ignore_sticky_posts' => true,
          'post__not_in'        => array( $current_id ),
          'orderby'             => 'date',
          'order'               => 'DESC',
          'no_found_rows'       => true,
        );
        if ( ! empty( $cat_ids ) ) {
          $args['category__in'] = $cat_ids;
        }

        $related_q = new WP_Query( $args );

        // Fallback to latest posts (still excluding current) if none in same cats
        if ( ! $related_q->have_posts() ) {
          unset( $args['category__in'] );
          $related_q = new WP_Query( $args );
        }

        if ( $related_q->have_posts() ) :
          while ( $related_q->have_posts() ) : $related_q->the_post(); ?>
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
                <h4 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              </div>
            </article>
          <?php endwhile;
        else : ?>
          <div class="notFoundText">Sorry, Nothing Found.</div>
        <?php endif;
        wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

</main>


<?php get_footer() ?>