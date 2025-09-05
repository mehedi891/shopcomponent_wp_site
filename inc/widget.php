

<?php
// Sidebar Register Function

function efl_widgets_register(){
  register_sidebar(array(
    'name' => __('Main Widget Area', 'efoli'),
    'id'   => 'sideber-1',
    'description' => __('Apperas in the sidebar in blog page and also other page', 'efoli'),
    'before_widget' => '<div class="discoverMoreMainGridDiv2ArcDate flexColumn">',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="textCenter sidebarTitle">',
    'after_title' => '</h3>',
    ));
  register_sidebar(array(
    'name' => __('Search', 'efoli'),
    'id'   => 'search-1',
    'description' => __('Apperas in the sidebar in blog page and also other page', 'efoli'),
    'before_widget' => '<div class="searchBarMv">',
    'after_widget' => '</div>',
    'before_title' => '<h5 class="">',
    'after_title' => '</h5>',
    ));
  register_sidebar(array(
    'name' => __('Archive List', 'efoli'),
    'id'   => 'archive-1',
    'description' => __('Apperas in the sidebar in blog page and also other page', 'efoli'),
    'before_widget' => '<div class="sideBarCatAr">',
    'after_widget' => '</div>',
    'before_title' => '<h5 class="title">',
    'after_title' => '</h5>',
    ));
  register_sidebar(array(
    'name' => __('Category List view', 'efoli'),
    'id'   => 'category-3',
    'description' => __('Appears in the sidebar in blog page and also other page', 'efoli'),
    'before_widget' => '<div class="sideBarCatAr">',
    'after_widget' => '</div>',
    'before_title' => '<h5 class="title">',
    'after_title' => '</h5>',
    ));
    register_sidebar(array(
      'name' => __('We docs Search', 'efoli'),
      'id'   => 'category-2',
      'description' => __('Appears in the sidebar in blog page and also other page', 'efoli'),
      'before_widget' => '<div class="wedocsSearch2 wedocs-print-article wedocs-hide-print wedocs-hide-mobile">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="title">',
      'after_title' => '</h3>',
      ));
}





add_action('widgets_init', 'efl_widgets_register');