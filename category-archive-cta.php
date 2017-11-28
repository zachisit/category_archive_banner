<?php
/*
Plugin Name: Category Archive Banner CTA
Plugin URI: https://www.zachis.it
Description: Allows admin to select a Post that shows on top of category archive templates
Version: 2.0
Author: Zach Smith
Author URI: https://www.zachis.it
License: GPL2
*/

/**
 * create menu
 */
function category_archive_create_menu() {
    //create new top-level menu
    add_menu_page('Category Archive Banner', 'Category Banner', 'administrator', __FILE__, 'category_archive_settings_page' );

    //call register settings function
    add_action( 'admin_init', 'register_category_archive_settings' );
}
add_action('admin_menu', 'category_archive_create_menu');


/**
 * register our settings page
 */
function register_category_archive_settings() {
    register_setting( 'category_archive-settings-group', 'for_the_home_location' );
    register_setting( 'category_archive-settings-group', 'shop_projects_location' );
    register_setting( 'category_archive-settings-group', 'pocket_hole_projects_location' );
    register_setting( 'category_archive-settings-group', 'organizing_location' );
    register_setting( 'category_archive-settings-group', 'scrap_wood_location' );
}

/**
 * register settings view
 */
function category_archive_settings_page() {
    require_once 'views/admin_settings.php';
}

/**
 * iterate through archive loop
 */
function archive_loop_start( $query ){
    if( $query->is_category() && !is_front_page() ) :
        require_once 'archive_template.php';
    endif;
}
add_action( 'loop_start', 'archive_loop_start' );

/**
 * load stylesheet for frontend
 */
function category_archive_frontend_scripts() {
    //css
    wp_enqueue_style( 'post_banner_post_frontend_css', plugins_url( '/css/archive_template_frontend.css', __FILE__ ), time() );
}
add_action( 'wp_enqueue_scripts', 'category_archive_frontend_scripts' );

/**
 * load stylesheet for backend
 */
function category_archive_admin_scripts() {
    wp_enqueue_style( 'backend_plugin_style', plugins_url( '/backend_style.css', __FILE__ ) );
}
add_action( 'admin_enqueue_scripts', 'category_archive_admin_scripts' );

/**
 * Admin select
 * @param $number
 * @param $category_slug
 * @param $category_name
 * @param $option_name
 */
function adminCategorySelect($number, $category_slug, $category_name, $option_name_identitifier) {
    //note: $number is just an unique ID per function ue

    //build our wp query
    $query_args = [
        'posts_per_page' => -1,
        'category_name' => $category_slug,
        'orderby' => 'title',
        'order'   => 'ASC',
    ];
    $wp_query = new WP_Query( $query_args );

    //create unique wp variable
    $option_name = get_option( $option_name_identitifier );?>
    <h2><?=$category_name?> Section</h2>
    <select name="<?=$option_name_identitifier?>[select_field_<?=$number?>_0]">
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
            $title = get_the_title();
            $postid = get_the_ID();
            ?>
            <option value="<?=$postid?>" <?php selected( $option_name['select_field_'.$number.'_0'], $postid); ?>>
                <?=$title?>
            </option>
        <?php endwhile; ?>
    </select>
    <?php
}

/**
 * Show Banner Post
 * @param $dropdown_value
 */
function outputBannerPost($catID, $dropdown_value) {
    if (is_category($catID)) { ?>
        <div class="archive_banner_post">
        <a href="<?=get_post_permalink($dropdown_value)?>" title="Read More about - <?=get_the_title($dropdown_value)?>">
            <?=get_the_post_thumbnail( $dropdown_value, 'medium-large' )?>
            <div class="title_block">
                <h3><?=get_the_title($dropdown_value)?></h3>
            </div>
        </a>
    </div>
    <?php }
}