<?php
if ( ! function_exists('pagenavi') ) :
function pagenavi( $query = null ) {
  global $wp_query;

  $q = $query ?: $wp_query;
  if ( empty($q) || (int) $q->max_num_pages <= 1 ) return;

  // Current page (handle Page templates too)
  $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
  if ( is_front_page() || is_page() ) {
    $paged = get_query_var('page') ? absint(get_query_var('page')) : $paged;
  }

  $big = 999999999;

  // Use pretty only on real archives/home/search
  if ( is_home() || is_archive() || is_search() ) {
    $base   = str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) );
    $format = get_option('permalink_structure') ? 'page/%#%/' : '?paged=%#%';
  } else {
    // Custom Pages → query string to avoid 404 (/your-page/?paged=2)
    $base   = esc_url( add_query_arg( 'paged', '%#%', get_permalink() ) );
    $format = '';
  }

  $links = paginate_links( array(
    'base'      => $base,
    'format'    => $format,
    'current'   => max(1, $paged),
    'total'     => (int) $q->max_num_pages,
    'type'      => 'array',
    'mid_size'  => 1,
    'end_size'  => 1,
    'prev_text' => __('Prev','yourtheme'),
    'next_text' => __('Next','yourtheme'),
  ) );

  if ( empty($links) ) return;

  $prev = ''; $next = ''; $items = array();
  foreach ( $links as $html ) {
    if ( strpos($html, 'prev') !== false ) { $prev = $html; continue; }
    if ( strpos($html, 'next') !== false ) { $next = $html; continue; }
    $items[] = $html;
  }

  echo '<nav class="pagination" aria-label="Pagination">';
    echo $prev ? str_replace('page-numbers','pageBtn',$prev)
               : '<span class="pageBtn isDisabled" aria-disabled="true">'.esc_html__('Prev','yourtheme').'</span>';

    echo '<ul class="pageList">';
    foreach ( $items as $li ) { echo '<li>'.$li.'</li>'; }
    echo '</ul>';

    echo $next ? str_replace('page-numbers','pageBtn',$next)
               : '<span class="pageBtn isDisabled" aria-disabled="true">'.esc_html__('Next','yourtheme').'</span>';
  echo '</nav>';
}
endif;
