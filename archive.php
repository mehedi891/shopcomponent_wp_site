<?php
/**
 * Generic archive template
 * Works for category, tag, author, date, and custom taxonomy archives.
 */
get_header();

// Context
$term        = ( is_category() || is_tag() || is_tax() ) ? get_queried_object() : null;
$tax         = $term && ! is_wp_error($term) ? $term->taxonomy : '';
$is_hier     = $tax ? is_taxonomy_hierarchical($tax) : false;

$archive_title = get_the_archive_title();
$archive_desc  = get_the_archive_description();

// Child terms (for hierarchical taxonomies only — e.g., Categories)
$children = array();
if ( $term && $is_hier ) {
  $children = get_terms(array(
    'taxonomy'   => $tax,
    'parent'     => (int) $term->term_id,
    'hide_empty' => true,
    'orderby'    => 'name',
    'order'      => 'ASC',
  ));
}
?>

<main class="main blogMain" role="main">
  <!-- Hero -->
  <section class="blogHero">
    <div class="container">
      <h1 class="heading"><?php echo wp_kses_post( $archive_title ); ?></h1>

      <?php if ( ! empty( $archive_desc ) ) : ?>
        <p class="subheading"><?php echo wp_kses_post( $archive_desc ); ?></p>
      <?php else : ?>
        <p class="subheading">
          <?php
            if ( is_category() )        esc_html_e('Articles filed under this category.', 'yourtheme');
            elseif ( is_tag() )         esc_html_e('Articles with this tag.', 'yourtheme');
            elseif ( is_author() )      esc_html_e('Posts by this author.', 'yourtheme');
            elseif ( is_date() )        esc_html_e('Posts from this period.', 'yourtheme');
            else                        esc_html_e('Latest posts from this archive.', 'yourtheme');
          ?>
        </p>
      <?php endif; ?>

      <?php get_search_form(); ?>

      <?php if ( $term && $is_hier && ! empty( $children ) && ! is_wp_error( $children ) ) : ?>
        <nav class="blogFilters" aria-label="<?php echo esc_attr( $archive_title ); ?> subcategories">
          <ul class="filterList">
            <?php
              $current_link = get_term_link( $term );
              if ( ! is_wp_error( $current_link ) ) :
            ?>
              <li><a class="chip is-active" href="<?php echo esc_url( $current_link ); ?>">
                <?php echo esc_html__( 'All', 'yourtheme' ); ?>
              </a></li>
            <?php endif; ?>

            <?php foreach ( $children as $child ) :
              $cl = get_term_link( $child );
              if ( is_wp_error( $cl ) ) continue; ?>
              <li><a class="chip" href="<?php echo esc_url( $cl ); ?>">
                <?php echo esc_html( $child->name ); ?>
              </a></li>
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
                  // Category/tag chip:
                  if ( $term && ! is_wp_error( $term ) ) {
                    // Link back to the current archive term
                    $href = get_term_link( $term );
                    if ( ! is_wp_error( $href ) ) {
                      printf(
                        '<a class="postCategory" href="%s">%s</a>',
                        esc_url( $href ),
                        esc_html( $term->name )
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

                <p class="postExcerpt"><?php echo get_the_excerpt(); ?></p>

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
          // Styled pagination (your pagenavi helper). Archives support pretty /page/2/.
          if ( function_exists('pagenavi') ) {
            pagenavi(); // main query
          } else {
            the_posts_pagination(array(
              'mid_size'  => 1,
              'prev_text' => __('Prev','yourtheme'),
              'next_text' => __('Next','yourtheme'),
            ));
          }
        ?>

      <?php else : ?>
        <div class="notFoundText">
          <?php esc_html_e('No posts found in this archive.', 'yourtheme'); ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
