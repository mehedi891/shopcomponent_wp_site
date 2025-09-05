<?php
/**
 * Search results
 */
get_header();

global $wp_query;
$q     = get_search_query();
$total = (int) $wp_query->found_posts;
?>
<main class="main blogMain" role="main">
  <!-- Hero -->
  <section class="blogHero">
    <div class="container">
      <h1 class="heading"><?php echo esc_html__('Search', 'yourtheme'); ?></h1>
      <p class="subheading">
        <?php
          if ( $q ) {
            printf(
              esc_html( _n('%1$d result for “%2$s”.', '%1$d results for “%2$s”.', $total, 'yourtheme') ),
              $total,
              esc_html( $q )
            );
          } else {
            echo esc_html__('Type a keyword to search articles.', 'yourtheme');
          }
        ?>
      </p>

      <?php
        // Use your custom-styled search form.
        // Make sure you have a searchform.php (see step 2).
        get_search_form();
      ?>
    </div>
  </section>

  <!-- Results -->
  <section class="posts">
    <div class="container">
      <?php if ( have_posts() ) : ?>
        <div class="postsGrid">
          <?php while ( have_posts() ) : the_post(); ?>
            <article class="postCard">
              <a class="postThumb" href="<?php the_permalink(); ?>">
                <?php
                  if ( has_post_thumbnail() ) {
                    the_post_thumbnail('large', ['alt' => esc_attr(get_the_title())]);
                  }
                ?>
              </a>

              <div class="postInfo">
                <?php
                  // First category chip (linked)
                  $cats = get_the_category();
                  if ( ! empty($cats) && ! is_wp_error($cats) ) {
                    $href = get_term_link($cats[0]);
                    if ( ! is_wp_error($href) ) {
                      printf('<a class="postCategory" href="%s">%s</a>', esc_url($href), esc_html($cats[0]->name));
                    }
                  }
                ?>

                <h3 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <p class="postExcerpt"><?php the_excerpt(); ?></p>

                <div class="postMeta">
                  <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                    <?php echo esc_html(get_the_date()); ?>
                  </time>
                  <span class="metaDot">•</span>
                  <span>
                    <?php
                      if ( function_exists('sc_read_time') ) {
                        echo esc_html( sc_read_time() );
                      } else {
                        $wc  = str_word_count( wp_strip_all_tags( get_the_content(), true ) );
                        $min = max(1, (int) ceil($wc / 220));
                        echo esc_html( sprintf( _n('%d min read','%d min read',$min,'yourtheme'), $min ) );
                      }
                    ?>
                  </span>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        </div>

        <?php
          // Pretty /page/2/ works on search archives
          if ( function_exists('pagenavi') ) {
            pagenavi(); // uses your styled pagination
          } else {
            the_posts_pagination([
              'mid_size'  => 1,
              'prev_text' => __('Prev','yourtheme'),
              'next_text' => __('Next','yourtheme'),
            ]);
          }
        ?>

      <?php else : ?>
        <div class="notFoundText">
          <?php echo esc_html__( 'No results found. Try a different keyword.', 'yourtheme' ); ?>
        </div>
        <!-- <div class="container" style="margin-top:10px">
          <?php get_search_form(); ?>
        </div> -->
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
