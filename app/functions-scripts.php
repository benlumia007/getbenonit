<?php

namespace Getbenonit;

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'getbenonit-screen', get_theme_file_uri( 'public/css/screen.css' ), array( 'camaraderie-screen' ), wp_get_theme()->get('Version') );
} );
