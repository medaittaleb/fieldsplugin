<?php

// Add Scripts

function yts_add_scripts()
{
   // add Main css
    wp_enqueue_style( 'yts-main-style', plugins_url() . '/we-footer/css/style.css');
   // add Main js
   wp_enqueue_script( 'yts-main-script', plugins_url() . '/we-footer/js/main.js');

}

add_action( "wp_enqueue_scripts", "yts_add_scripts");




