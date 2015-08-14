<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package _t
 */
$context = Timber::get_context();
$context[ 'page_title' ] = esc_html( 'Oops! That page can&rsquo;t be found.', Timber_s::TEXT_DOMAIN );
$context[ 'page_content' ] = esc_html( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', Timber_s::TEXT_DOMAIN );
$context[ 'search_form' ] = get_search_form( false );
$context[ 'recent_post_widget' ] = Timber_s::get_the_widget( 'WP_Widget_Recent_Posts' );

// Widgets
$context[ 'has_multi_categories' ] = $has_multi_categories = _t_categorized_blog();

if ( $has_multi_categories ):

  $context[ 'widget_title' ] = esc_html( 'Most Used Categories', Timber_s::TEXT_DOMAIN );

  $args = [
    'orderby' => 'count',
    'order' => 'DESC',
    'show_count' => 1,
    'title_li' => '',
    'number' => 10
  ];
  $context[ 'categories_list' ] = Timber_s::list_the_categories( $args );

endif;

$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', '_s' ), convert_smilies( ':)' ) ) . '</p>';
$context[ 'archives_widget' ] = Timber_s::get_the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );

$context[ 'tag_cloud_widget' ] = Timber_s::get_the_widget( 'WP_Widget_Tag_Cloud' );

Timber::render( '404.twig', $context );
