<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _t
 */

$context = Timber::get_context();
$context[ 'posts' ] = Timber::get_posts();

$context[ 'page_title' ] =  sprintf(
  esc_html__( 'Search Results for: %s', '_t' ),
              '<span>' . get_search_query() . '</span>' );

// Used inside <content-search.twig>
$context[ 'entry_title' ] = the_title(
  sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">',
          esc_url( get_permalink() ) ), '</a></h2>', false );

Timber::render( 'search.twig', $context );
