<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package _t
 */

$context = Timber::get_context();
$context[ 'posts' ] = $posts = Timber::get_posts();

if ( $posts ):

  $_str = esc_html__( 'Search Results for: %s', '_t' );
  $_qry = '<span>'.get_search_query().'</span>';

  $context[ 'page_title' ]  =  sprintf( $_str, $_qry );
  $context[ 'posts_nav' ]   = Timber_s::get_the_posts_navigation();

  // Vars for <content-search.twig>:
  $_opn = '<h2 class="entry-title"><a href="%s" rel="bookmark">';
  $_lnk = esc_url( get_permalink() );
  $_cls = '</a></h2>';

  $context[ 'entry_title' ]  = the_title( sprintf( $_opn, $_lnk ), $_cls, false );
  $context[ 'posted_on' ]    = Timber_s::capture_output( '_t_posted_on', [] );
  $context[ 'entry_footer' ] = Timber_s::capture_output( '_t_entry_footer', [] );

else:

  $t = Timber_s::TEXT_DOMAIN;

  $context[ 'page_title' ] = esc_html( 'Nothing Found', '_t' );

  $context[ 'is_home' ]           = is_home();
  $context[ 'can_publish_posts' ] = current_user_can( 'publish_posts' );

  $context[ 'create_post_link' ] = Timber_s::get_create_post_link();

  $context[ 'is_search' ]        = is_search();
  $context[ 'no_match_found' ] = esc_html(
  'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
  $t
  );
  $context[ 'search_form' ] = Timber_s::get_the_search_form();
  $context[ 'no_content_found' ] = esc_html(
    'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching
      can help.', $t
  );

endif;

Timber::render( 'search.twig', $context );
