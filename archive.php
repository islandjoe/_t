<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _t
 */

$context = Timber::get_context();
$context[ 'posts' ] = Timber::get_posts();

Timber::render( 'archive.twig', $context );
