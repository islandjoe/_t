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

// *Seeing that this is not the home page nor the 404 page, $context will inject
//  comments-related vars here (which is defined in 'inc/timber.php')
$context = Timber::get_context();

$context[ 'post' ] = Timber::get_post();

Timber::render( 'page.twig', $context );
