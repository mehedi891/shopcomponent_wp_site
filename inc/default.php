<?php
//ttle tag

add_theme_support( 'title-tag' );

//image support

add_theme_support( 'post-thumbnails', array('page', 'post') );





// Count words in a Unicode-safe way (ignores HTML + shortcodes).
function sc_count_words( $text ) {
  $text = wp_strip_all_tags( strip_shortcodes( (string) $text ), true );
  $text = trim( preg_replace( '/\s+/u', ' ', $text ) );
  if ( $text === '' ) { return 0; }

  // Unicode word match (letters/numbers/apostrophes)
  if ( preg_match_all( '/[\p{L}\p{N}\']+/u', $text, $m ) ) {
    return count( $m[0] );
  }
  // Fallback
  return str_word_count( $text );
}

// Return a formatted read-time like "5 min read".
// $wpm defaults to 220; adjust if your audience reads slower/faster.
function sc_read_time( $post_id = null, $wpm = 220 ) {
  $post_id  = $post_id ?: get_the_ID();
  $content  = get_post_field( 'post_content', $post_id );
  $words    = sc_count_words( $content );
  $minutes  = max( 1, (int) ceil( $words / max( 1, (int) $wpm ) ) );

  // i18n-ready singular/plural
  return sprintf( _n( '%d min read', '%d min read', $minutes, 'yourtheme' ), $minutes );
}

// Optional shortcode: [read_time wpm="220"]
add_shortcode( 'read_time', function( $atts ) {
  $a = shortcode_atts( ['wpm' => 220], $atts );
  return esc_html( sc_read_time( null, (int) $a['wpm'] ) );
});

// Save/update cached minutes on post save.
add_action('save_post', function($post_id){
  if ( wp_is_post_revision($post_id) || get_post_type($post_id) !== 'post' ) return;
  $content = get_post_field('post_content', $post_id);
  $minutes = max(1, (int) ceil( sc_count_words($content) / 220 ));
  update_post_meta($post_id, '_sc_read_minutes', $minutes);
});

// Helper that prefers cached value.
function sc_read_time_cached( $post_id = null, $wpm = 220 ) {
  $post_id = $post_id ?: get_the_ID();
  $min = (int) get_post_meta($post_id, '_sc_read_minutes', true);
  if ( $min <= 0 ) { return sc_read_time($post_id, $wpm); }
  return sprintf( _n('%d min read','%d min read',$min,'yourtheme'), $min );
}

// Move archive post counts inside the <a> and wrap them for styling.
add_filter('get_archives_link', function ($html) {
  // Matches: <li><a ...>LABEL</a> &nbsp;(123)</li>  (handles spaces, &nbsp;, newlines)
  return preg_replace(
    '/(<a[^>]*>)(.*?)(<\/a>)(?:\s*|&nbsp;)*\((\d+)\)/s',
    '$1<span class="label">$2</span>$3<span class="count">$4</span>',
    $html
  );
});





