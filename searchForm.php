<?php
/**
 * Theme search form
 */
?>
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
