<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _t
 */
$t = Timber_s::TEXT_DOMAIN;

$context = Timber::get_context();

$_title = 'Oops! That page can&rsquo;t be found.';
$context[ 'page_title' ] = esc_html( $_title, $t );

$_content = 'It looks like nothing was found at this location. Maybe try one of
             the links below or a search?';
$context[ 'page_content' ] = esc_html( $_content, $t );

$context[ 'search_form' ]  = get_search_form( false );

$_widget = 'WP_Widget_Recent_Posts';
$context[ 'recent_post_widget' ] = Timber_s::get_the_widget( $_widget );

// Widgets
$context[ 'has_multi_categories' ] = $has_multi_categories = _t_categorized_blog();

if ( $has_multi_categories ):

  $context[ 'widget_title' ] = esc_html( 'Most Used Categories', $t );

  $args = [
    'orderby'     => 'count',
    'order'       => 'DESC',
    'show_count'  => 1,
    'title_li'    => '',
    'number'      => 10, ];
  $context[ 'categories_list' ] = Timber_s::list_the_categories( $args );

endif;

$_str             = 'Try looking in the monthly archives. %1$s';
$_content         = esc_html__( $_str, $t );
$_conv            = convert_smilies( ':)' );
$archive_content  = '<p>' . sprintf( $_content, $_conv ) . '</p>';

$_arg1   = 'dropdown=1';
$_arg2   = "after_title=</h2>$archive_content";
$_widget = 'WP_Widget_Archives';
$context[ 'archives_widget' ]  = Timber_s::get_the_widget( $_widget, $_arg1, $_arg2 );

$_widget = 'WP_Widget_Tag_Cloud';
$context[ 'tag_cloud_widget' ] = Timber_s::get_the_widget( $_widget );

Timber::render( '404.twig', $context );
