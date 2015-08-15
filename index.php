<?php

$context = Timber::get_context();

$context[ 'is_home' ]       = is_home();

// Vars for <index.twig>:
$context[ 'posts' ]             = Timber::get_posts();
$context[ 'the_front_page' ] = is_front_page();
$context[ 'single_post_title' ] = single_post_title( '', false );
$context[ 'posts_nav' ] = Timber_s::get_the_posts_navigation();

// Vars for <content.twig>:
$context[ 'post_class' ] = get_post_class();
$_arg = [
  'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
  'after'  => '</div>' ];
$context[ 'link_pages' ]   = Timber_s::get_the_link_pages( $_arg );
$context[ 'entry_footer' ] = Timber_s::capture_output( '_t_entry_footer', [] );

// Vars for <content-none.twig>:
$context[ 'can_publish_posts' ] = current_user_can( 'publish_posts' );
$context[ 'create_post_link' ] = Timber_s::get_create_post_link();
$context[ 'is_search' ] = is_search();
$context[ 'no_match_found' ] = esc_html(
  'Sorry, but nothing matched your search terms. Please try again with some different keywords.',
  $t
);
$context[ 'no_content_found' ] = esc_html(
  'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching
      can help.', $t
);
$context[ 'search_form' ] = Timber_s::get_the_search_form();


Timber::render( 'index.twig', $context );
