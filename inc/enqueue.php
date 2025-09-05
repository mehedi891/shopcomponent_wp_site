<?php

// css and js file enqueue

function cssJsFIleCall (){
    wp_enqueue_style( 'efl_styleCss', get_stylesheet_uri());
   
   
    wp_register_style( 'slickCss', get_template_directory_uri().'/assets/css/slick.css', array(), '1.1.0', 'all' );
    wp_enqueue_style( 'slickCss');

    wp_register_style( 'slick-theme', get_template_directory_uri().'/assets/css/slick-theme.css', array(), '1.1.0', 'all' );
   
    wp_enqueue_style( 'slick-theme');

 
    wp_register_style( 'eflMainCss', get_template_directory_uri().'/assets/css/main.css', array(), '1.1.1', 'all' );
    wp_enqueue_style( 'eflMainCss');
   
    wp_register_style( 'eflResponsiveCss', get_template_directory_uri().'/assets/css/responsive.css', array(), '1.1.0', 'all' );
    wp_enqueue_style( 'eflResponsiveCss');


    
       // call js
    wp_enqueue_script('jquery');
   
    wp_enqueue_script( 'slick-min-js', get_template_directory_uri().'/assets/js/slick.min.js', array(), '1.1.0', true );
    wp_enqueue_script( 'mainJs', get_template_directory_uri().'/assets/js/main.js', array(), '1.1.0', true );

   //  wp_enqueue_script( 'sliderMain', get_template_directory_uri().'/assets/js/sliderMain.js', array(), '1.1.0', true );
 
   
    //call google fonts
    //wp_register_style( 'robotoMerryFont','https://fonts.googleapis.com/css2?family=Merriweather&family=Roboto&family=The+Nautigal:wght@700&display=swap',false);
   
   }
   
   add_action('wp_enqueue_scripts' , 'cssJsFIleCall');