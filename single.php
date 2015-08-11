<?php

$context = Timber::get_context();
$context[ 'post' ] = $post = Timber::get_post();

// Comments
$context[ 'has_comments' ] = $comments_number = get_comments_number( $post->ID );
$context[ 'comments_title' ] = sprintf( // WPCS: XSS OK.
  esc_html(
    _nx( 'One thought on &ldquo;%2$s&rdquo;',
        '%1$s thoughts on &ldquo;%2$s&rdquo;',
        $comments_number,
        'comments title',
        '_t' ) ),
  number_format_i18n( $comments_number ),
  '<span>' . get_the_title() . '</span>'
);
$context[ 'password_required' ] = post_password_required();
$context[ 'load_comments' ] = comments_open() || $comments_number;
$context[ 'comments_are_paged' ] = (get_comment_pages_count() > 1 && get_option( 'page_comments' ));
$context[ 'comments_are_closed_and_there_are_comments' ] = ( ! comments_open() && '0' != $comments_number && post_type_supports( get_post_type(), 'comments' ) );


Timber::render( 'single.twig', $context );
