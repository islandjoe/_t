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

$context[ 'page_title' ]    = Timber_s::get_the_archive_title( '<h1 class="page-title">', '</h1>' );
$context[ 'taxonomy_desc' ] = Timber_s::get_the_archive_description( '<div class="taxonomy-description">', '</div>' );

$context[ 'posts_nav' ] = Timber_s::get_the_posts_navigation();
$context[ 'posted_on' ] = Timber_s::capture_output( '_t_posted_on', [] );

$_arg = [
  'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
  'after'  => '</div>' ];
$context[ 'link_pages' ] = Timber_s::get_the_link_pages( $_arg );

$context[ 'entry_footer' ] = Timber_s::capture_output( '_t_entry_footer', [] );

Timber::render( 'archive.twig', $context );
