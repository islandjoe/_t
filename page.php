<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _t
 */

/* *Seeing that this is not the:
//    1) home page, 2) 404 page, 3) search page
//  $context will inject comments-related vars here, as defined in
//  'inc/timber.php'
*/
$t = Timber_s::TEXT_DOMAIN;

$context = Timber::get_context();

$context[ 'post' ] = Timber::get_post();


// Context vars for <content-page.twig>:
$context[ 'link_pages' ] = Timber_s::get_the_link_pages( [
  'before' => '<div class="page-links">' ~ __( 'Pages:', '_t' ),
  'before' => '<div class="page-links">' ~ __( 'Pages:', $t ),
  'after'  => '</div>'
] );

Timber::render( 'page.twig', $context );
