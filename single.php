<?php
/**
* The template for displaying all single posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package _t
*/

/* *Seeing that this is not the:
//    1) home page, 2) 404 page, 3) search page
//  $context will inject comments-related vars here, as defined in
//  'inc/timber.php'
*/
$context = Timber::get_context();
$context[ 'post' ] = $post = Timber::get_post();

// Entry Meta
$context[ 'posts_nav' ] = Timber_s::get_the_posts_navigation();

// Comments
$t = Timber_s::TEXT_DOMAIN;
$context[ 'no_comments' ] = esc_html( 'Comments are closed.', $t );
$context[ 'the_comment_form' ] = Timber_s::get_the_comment_form( $post->ID );

// Vars for <content-single.twig>:
$context[ 'posted_on' ] = Timber_s::capture_output( '_t_posted_on', [] );
$_arg = [
  'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
  'after'  => '</div>' ];
$context[ 'link_pages' ] = Timber_s::get_the_link_pages( $_arg );
$context[ 'entry_footer' ] = Timber_s::capture_output( '_t_entry_footer', [] );


Timber::render( 'single.twig', $context );
