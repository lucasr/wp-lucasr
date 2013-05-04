<?php
/**
 * Functions and definitions.
 *
 * @package WordPress
 * @subpackage lucasr
 */


function lucasr_setup() {
    load_theme_textdomain( 'lucasr', get_template_directory() . '/languages' );

    add_theme_support( 'post-thumbnails' );
    add_image_size( 'hero-image-large', 960, 400 );
    add_image_size( 'hero-image-tablet', 768, 320 );
    add_image_size( 'hero-image-small', 480, 200 );
    set_post_thumbnail_size( 480, 200 );

    add_post_type_support( 'page', 'excerpt' );

    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'lucasr_setup' );


function lucasr_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'lucasr' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'lucasr_wp_title', 10, 2 );


function lucasr_scripts_styles() {
    wp_enqueue_style( 'lucasr-boostrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '2.2.2' );
    wp_enqueue_style( 'lucasr-boostrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', array( 'lucasr-boostrap' ), '2.2.2' );
    wp_enqueue_style( 'lucasr-style', get_stylesheet_uri(), array( 'lucasr-boostrap', 'lucasr-boostrap-responsive' ), '1.1' );

    wp_register_script('lucasr-jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, '1.8.3', true);
    wp_enqueue_script( 'lucasr-boostrapfix', get_template_directory_uri() . '/js/bootstrapfix.js', array( 'lucasr-jquery' ), '1.0', true );

    wp_enqueue_script( 'lucasr-picturefill', get_template_directory_uri() . '/js/picturefill.min.js', false, '1.0', true );
    wp_enqueue_script( 'lucasr-typekit', 'http://use.typekit.net/tww7dlq.js', false, '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'lucasr_scripts_styles' );


function lucasr_home_pagesize( $query ) {
    if ( is_admin() || ! $query->is_main_query() )
        return;

    if ( is_home() ) {
        $query->set( 'posts_per_page', 1 );
        return;
    }
}
add_action( 'pre_get_posts', 'lucasr_home_pagesize', 1 );


function lucasr_delete_cache_on_new_post() {
     delete_transient( 'recent_posts' );
}
add_action( 'publish_post', 'lucasr_delete_cache_on_new_post' );


function lucasr_filter_image_sizes( $sizes ) {
    unset( $sizes['thumbnail'] );
    unset( $sizes['medium'] );
    unset( $sizes['large'] );

    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'lucasr_filter_image_sizes');


function lucasr_custom_image_sizes( $sizes ) {
        unset( $sizes['medium'] );
        unset( $sizes['large'] );

        $my_img_sizes = array(
            "hero-image-large" => __( 'Hero (Large)', 'lucasr' ),
            "hero-image-tablet" => __( 'Hero (Medium)', 'lucasr' ),
            "hero-image-small" => __( 'Hero (Small)', 'lucasr' )
        );

        $new_img_sizes = array_merge( $sizes, $my_img_sizes );
        return $new_img_sizes;
}
add_filter('image_size_names_choose', 'lucasr_custom_image_sizes');


function lucasr_change_search_size( $query ) {
    if ( $query->is_search  || $query->is_archive )
        $query->query_vars['posts_per_page'] = 10;

    return $query;
}
add_filter( 'pre_get_posts', 'lucasr_change_search_size' );


function lucasr_the_post_thumbnail_caption() {
    $thumbnail_id = get_post_thumbnail_id();
    if ( $thumbnail_id !== null )
        echo get_post( $thumbnail_id )->post_excerpt;
    else
        echo __( 'No caption', 'lucasr' );
}


function lucasr_the_post_thumbnail( $size, $placeholder ) {
    $images = null;

    if ( has_post_thumbnail() ) {
        if ( $size === 'small' )
            $images = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array( 480, 200 ) );
        elseif ( $size === 'medium' )
            $images = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array( 768, 320 ) );
        elseif ( $size === 'large' )
            $images = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), array( 960, 400 ) );
    }

    if ( $images != null ) {
        echo $images[0];
    } elseif ( $placeholder ) {
        if ( $size === 'small' )
            echo get_bloginfo( 'template_directory' ) . '/img/placeholder-480x200.png';
        elseif ( $size === 'medium' )
            echo get_bloginfo( 'template_directory' ) . '/img/placeholder-768x320.png';
        elseif ( $size === 'large' ) {
            echo get_bloginfo( 'template_directory' ) . '/img/placeholder-960x400.png';
        }
    }
}


function lucasr_get_recent_posts() {
    $recent_posts = get_transient( 'recent_posts' );

    if ( $recent_posts === false ) {
        $recent_posts = new WP_Query( array(
            'posts_per_page' => 4,
            'offset' => 1,
            'order' => 'DESC',
            'orderby' => 'date'
        ) );

        set_transient( 'recent_posts', $recent_posts, 24 * HOUR_IN_SECONDS );
    }

    return $recent_posts;
}


function lucasr_the_pagination_links() {
    global $wp_query;

    if ( $wp_query->query_vars['paged'] > 1 )
        $current = $wp_query->query_vars['paged'];
    else
        $current = 1;

    $big = 999999999;

    echo paginate_links( array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '?paged=%#%',
        'current' => $current,
        'total' => $wp_query->max_num_pages,
        'show_all' => true,
        'prev_next' => true,
        'prev_text' => __('Previous', 'lucasr' ),
        'next_text' => __('Next', 'lucasr' ),
        'type' => 'list'
    ) );
}


if ( ! function_exists( 'lucasr_the_author_page' ) ) {
    function lucasr_the_author_page( $user_login ) {
        echo 'about';
    }
}
?>
