<?php
// Functions parts
include_once 'functions-parts/Mobile_Detect.php';
include_once 'functions-parts/_assets.php';
include_once 'functions-parts/_post-types-registration.php';
include_once 'functions-parts/_taxonomies-registration.php';
include_once 'functions-parts/_breadcrumbs.php';
include_once 'functions-parts/_ajax.php';
include_once 'functions-parts/_hooks.php';
include_once 'functions-parts/_custom-functions.php';
include_once 'functions-parts/custom-buttons-tinymce.php';
include_once 'functions-parts/_gutenberg_custom_blocks_utils.php';

/*
 * REMOVE EMOJI ICONS
 * */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('template_redirect', 'rest_output_link_header', 11, 0);


function remove_menus()
{
    //    remove_menu_page('index.php');                  
    //    remove_menu_page('edit.php');                   
    //    remove_menu_page('upload.php');                 
    //    remove_menu_page('edit.php?post_type=page');    
    remove_menu_page('edit-comments.php');
    //    remove_menu_page('themes.php');                 
    //    remove_menu_page('plugins.php');                
    //    remove_menu_page('users.php');                  
    //    remove_menu_page('tools.php');                  
    //    remove_menu_page('options-general.php');        

    //    remove_menu_page('admin.php?page=pmxi-admin-import');
    //    remove_menu_page('edit.php?post_type=acf-field-group');
    //        remove_menu_page( 'admin.php?page=Wordfence' );
    //        remove_menu_page( 'admin.php?page=pmxi-admin-import' );
    //        remove_menu_page( 'admin.php?page=wpseo_dashboard' );
}

add_action('admin_menu', 'remove_menus');

define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);


if (function_exists('acf_add_options_page')) acf_add_options_page();

function local_acf_json_save_point($path)
{

    // update path
    $path = get_stylesheet_directory() . '/acf';

    // return
    return $path;
}
add_filter('acf/settings/save_json', 'local_acf_json_save_point');

function my_acf_json_load_point($paths)
{
    // Remove the original path (optional).
    unset($paths[0]);

    // Append the new path and return it.
    $paths[] = get_stylesheet_directory() . '/acf';

    return $paths;
}
add_filter('acf/settings/load_json', 'my_acf_json_load_point');


function my_myme_types($mime_types)
{
    $mime_types['svg'] = 'image/svg+xml';
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

/*
 * Add Menu Wp
 * */
register_nav_menus(
    array(
        'Header menu' => 'Header menu',
    )
);


add_theme_support('post-thumbnails');
add_image_size('full_hd', 1920, 1080);


add_action('wp_print_styles', 'wps_deregister_styles', 100);
function wps_deregister_styles()
{
    wp_deregister_style('contact-form-7');
    wp_deregister_style('wp-block-library-theme');
}

/**
 * Filter URL entry before it gets added to the sitemap.
 *
 * @param array  $url  Array of URL parts.
 * @param string $type URL type. Can be user, post or term.
 * @param object $object Data object for the URL.
 */
add_filter('rank_math/sitemap/entry', function ($url, $type, $object) {

    $url = str_replace('/home', '', $url);
    return $url;
}, 10, 3);

/**
 * Filter the URL Rank Math SEO uses in the XML sitemap for this post type archive.
 *
 * @param string $archive_url The URL of this archive
 * @param string $post_type   The post type this archive is for.
 */
add_filter('rank_math/sitemap/post_type_archive_link', function ($archive_url, $post_type) {
    return 0;
}, 10, 2);


function clean_post_slug_before_save($data)
{
    if (isset($data['post_name']) && !empty($data['post_name'])) {
        $data['post_name'] = preg_replace('/[^a-zA-Z0-9_-]/', '', $data['post_name']);
    }
    return $data;
}
add_filter('wp_insert_post_data', 'clean_post_slug_before_save', 10, 1);



add_filter('use_block_editor_for_post', 'prefix_disable_gutenberg_for_specific_template', 10, 2);
function prefix_disable_gutenberg_for_specific_template($use_block_editor, $post)
{
    if (
        ($post->post_type === 'page' && get_post_meta($post->ID, '_wp_page_template', true) === 'page-text-content.php')
        || $post->post_type === 'post'
    ) {
        return true;
    }

    return false;
}
