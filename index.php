<?php

$context = Timber::get_context();

$context[ 'is_home' ]       = is_home();

// Vars for <index.twig>:
$context[ 'posts' ]             = Timber::get_posts();
$context[ 'the_front_page' ] = is_front_page();
$context[ 'single_post_title' ] = single_post_title( '', false );
$context[ 'posts_nav' ] = Timber_s::get_the_posts_navigation();

Timber::render( 'index.twig', $context );
