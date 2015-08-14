<?php

// Define some global variables to use in the Twig templates
add_filter( 'timber_context', function ( $data ) {

  if ( ! is_404() ):

    // COMMENTS
    $data[ 'has_comments' ] = $comments_number = get_comments_number();
    $data[ 'comments_title' ] = sprintf( // WPCS: XSS OK.
      esc_html(
        _nx( 'One thought on &ldquo;%2$s&rdquo;',
            '%1$s thoughts on &ldquo;%2$s&rdquo;',
            $comments_number,
            'comments title',
            '_t' ) ),
      number_format_i18n( $comments_number ),
      '<span>' . get_the_title() . '</span>'
    );
    $data[ 'password_required' ] = post_password_required();
    $data[ 'load_comments' ] = comments_open() || $comments_number;
    $data[ 'comments_are_paged' ] = (get_comment_pages_count() > 1 && get_option( 'page_comments' ));
    $data[ 'comments_are_closed_and_there_are_comments' ] = ( ! comments_open() && '0' != $comments_number && post_type_supports( get_post_type(), 'comments' ) );

  endif;

  // DYNAMIC SIDEBAR
  $data[ 'dynamic_sidebar' ] = Timber::get_widgets('sidebar-1');

  return $data;

} );

// Convenience functions that mirror WP's
class Timber_s {

  const TEXT_DOMAIN = '_t';

  public static function get_the_posts_navigation( $args = [] ) {
    return self::_capture_output( 'the_posts_navigation', $args );
  }

  public static function get_the_archive_title( $before = '', $after = '' ) {
    return self::_capture_output( 'the_archive_title', [ $before, $after ] );
  }

  public static function get_the_archive_description( $before = '', $after = '' ) {
    return self::_capture_output( 'the_archive_description', [ $before, $after ] );
  }

  public static function get_the_widget( $widget_type, $instance = [], $args = [] ) {
    return self::_capture_output( 'the_widget', [$widget_type, $instance, $args] );
  }

  public static function list_the_categories( $args = [] ) {
    return self::_capture_output( 'wp_list_categories',  $args );
  }

  protected static function _capture_output( callable $fn, array $args ) {
    $res = '';
    ob_start();
      call_user_func_array( $fn, $args );
      $res = ob_get_contents();
    ob_end_clean();

    return $res;
  }
} //Timber_s//

// Set twig files view location to 'template-parts'
Timber::$dirname = 'template-parts';
