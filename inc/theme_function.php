<?php

function eflHeadFooterLogo ($wp_customize){
    $wp_customize -> add_section('headerArea', array(
        'title' => __('Logo Change','efoli'),
        'description' => 'Change Header and Footer Logo Here',
    ));

    $wp_customize -> add_setting('eflLogo',array(
        'default' => get_bloginfo('template_directory').'/assets/images/spc_logo.png',
    ));

    $wp_customize -> add_control(new WP_Customize_Image_Control($wp_customize,'eflLogo',array(
        'label' => 'Logo Upload',
        'description' => 'Upload Your Logo Here',
        'section' => 'headerArea',
        'setting' => 'eflLogo'

    )));
}

add_action('customize_register','eflHeadFooterLogo');

//for custom excerpt length in Main Post
function custom_excerpt_length($length) {
    if (is_main_query() && 'post' === get_post_type()) {
        return 15; 
    }
    return $length;  
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

//customize for main post read more Btn

function custom_excerpt_more($more) {
    if (is_main_query() && 'post' === get_post_type()) {
        return '... <a style="display:inline" class="btn btn-plain" href="' . get_permalink() . '">Read More</a>'; // Custom "read more" text
    }
    return $more; 
}
add_filter('excerpt_more', 'custom_excerpt_more');
