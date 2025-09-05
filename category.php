<?php
/**
 * Category archive template
 */
get_header();

// Current category term
$term = get_queried_object();
$term_link = ( $term && ! is_wp_error( $term ) ) ? get_term_link( $term ) : '';
$term_name = ( $term && ! is_wp_error( $term ) ) ? $term->name : __('Category','yourtheme');
$term_desc = term_description( $term, 'category' );

// Subcategories (chips). If none, we won't render the list.
$children = array();
if ( $term && ! is_wp_error( $term ) ) {
  $children = get_terms( array(
    'taxonomy'   => 'category',
    'parent'     => (int) $term->term_id,
    'hide_empty' => true,
  ) );
}
?>

<main class="main blogMain" role="main">
  <!-- Hero -->
  <section class="blogHero">
    <div class="container">
      <h1 class="heading"><?php echo esc_html( $term_name ); ?></h1>
      <?php if ( ! empty( $term_desc ) ) : ?>
        <p class="subheading"><?php echo wp_kses_post( $term_desc ); ?></p>
      <?php else : ?>
        <p class="subheading"><?php echo esc_html__('Articles filed under this category.','yourtheme'); ?></p>
      <?php endif; ?>

      <?php if ( ! empty( $children ) && ! is_wp_error( $children ) ) : ?>
        <nav class="blogFilters" aria-label="<?php echo esc_attr( $term_name ); ?> subcategories">
          <ul class="filterList">
            <li><a class="chip is-active" href="<?php echo esc_url( $term_link ); ?>"><?php echo esc_html__('All','yourtheme'); ?></a></li>
            <?php foreach ( $children as $child ) :
              $child_link = get_term_link( $child );
              if ( is_wp_error( $child_link ) ) continue; ?>
              <li><a class="chip" href="<?php echo esc_url( $child_link ); ?>"><?php echo esc_html( $child->name ); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </nav>
      <?php endif; ?>
    </div>
  </section>

  <!-- Posts grid -->
  <section class="posts">
    <div class="container">
      <?php if ( have_posts() ) : ?>
        <div class="postsGrid">
          <?php while ( have_posts() ) : the_post(); ?>
            <article class="postCard">
              <a class="postThumb" href="<?php the_permalink(); ?>">
                <?php
                  if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'large', array( 'alt' => esc_attr( get_the_title() ) ) );
                  }
                ?>
              </a>

              <div class="postInfo">
                <?php
                  // Show the current category chip (links back to this archive)
                  if ( $term && ! is_wp_error( $term ) ) {
                    $href = get_term_link( $term );
                    if ( ! is_wp_error( $href ) ) {
                      printf(
                        '<a class="postCategory" href="%s">%s</a>',
                        esc_url( $href ),
                        esc_html( $term_name )
                      );
                    }
                  } else {
                    // Fallback: first category
                    $cats = get_the_category();
                    if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
                      $href = get_term_link( $cats[0] );
                      if ( ! is_wp_error( $href ) ) {
                        printf(
                          '<a class="postCategory" href="%s">%s</a>',
                          esc_url( $href ),
                          esc_html( $cats[0]->name )
                        );
                      }
                    }
                  }
                ?>

                <h3 class="postTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                <p class="postExcerpt">
                 <?php echo get_the_excerpt(); ?>
                </p>

                <div class="postMeta">
                  <time datetime="<?php echo esc_attr( get_the_date('c') ); ?>">
                    <?php echo esc_html( get_the_date() ); ?>
                  </time>
                  <span class="metaDot">•</span>
                  <span>
                    <?php
                      if ( function_exists('sc_read_time') ) {
                        echo esc_html( sc_read_time() );
                      } else {
                        // Quick fallback
                        $wc = str_word_count( wp_strip_all_tags( get_the_content(), true ) );
                        $min = max(1, (int) ceil( $wc / 220 ));
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
          // Pagination — archives use pretty URLs, so your pagenavi() will output /page/2/
          if ( function_exists('pagenavi') ) {
            pagenavi(); // main query
          } else {
            // Fallback core pagination (unstyled)
            the_posts_pagination( array(
              'mid_size'  => 1,
              'prev_text' => __('Prev','yourtheme'),
              'next_text' => __('Next','yourtheme'),
            ) );
          }
        ?>

      <?php else : ?>
        <div class="notFoundText">
          <?php echo esc_html__('No posts found in this category.','yourtheme'); ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
