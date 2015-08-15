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

  $context[ 'page_title' ] =  sprintf(
    esc_html__( 'Search Results for: %s', '_t' ),
                    '<span>'.get_search_query().'</span>'
  );

  $context[ 'posts_nav' ] = Timber_s::get_the_posts_navigation();

  // This is used in 'content-search.twig'
  $context[ 'entry_title' ] = the_title(
    sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">',
            esc_url( get_permalink() ) ), '</a></h2>', false );

else:

  $t = Timber_s::TEXT_DOMAIN;

  $context[ 'page_title' ] = esc_html( 'Nothing Found', '_t' );

  $context[ 'is_home' ]           = is_home();
  $context[ 'can_publish_posts' ] = current_user_can( 'publish_posts' );

  $admin_url    = esc_url( admin_url( 'post-new.php' ) );
  $allowed_tags = [ 'a' => [ 'href' => array() ] ];
  $line         = __( 'Ready to publish your first post?
                      <a href="%1$s">Get started here</a>.', Timber_s::TEXT_DOMAIN );
  $content      = wp_kses( $line, $allowed_tags );
  $context[ 'create_post_link' ] = sprintf( $content, $admin_url );

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
