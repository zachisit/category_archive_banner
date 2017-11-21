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
    //@TODO:move all this into separate view
    ?>
    <div class="wrap">
        <h1>Category Archive Page Banner Ad Settings</h1>
        <p>Select a Post that shows on top of each category archive page. Have fun!</p>

        <?php settings_errors();
        //@TODO:build function that passes in text string number used for one, two, three; category name, general title: output this data
        ?>
        <form method="post" action="options.php">
            <?php settings_fields( 'category_archive-settings-group' ); ?>
            <?php do_settings_sections( 'category_archive-settings-group' ); ?>
            <div id="main">
                <div class="row">
                    <div class="right">
                        <h2>For The Home Section</h2>
                        <?php
                        $for_the_home_query_args = [
                            'posts_per_page' => -1,
                            'category_name' => 'projects-for-the-home',
                            'orderby' => 'title',
                            'order'   => 'ASC',
                        ];
                        $for_the_home_query = new WP_Query( $for_the_home_query_args );
                        $for_the_home_option = get_option( 'for_the_home_location' ); ?>

                        <!--<select name="<?=$for_the_home_option?>[select_field_0]">-->
                        <select name="for_the_home_location[select_field_one_0]">
                            <?php while ( $for_the_home_query->have_posts() ) : $for_the_home_query->the_post();
                                $title_one = get_the_title();
                                $postid_one = get_the_ID();
                                ?>
                                <option value="<?=$postid_one?>" <?php selected( $for_the_home_option['select_field_one_0'], $postid_one); ?>>
                                    <?=$title_one?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="left">
                        <h2>Shop Projects Section</h2>
                        <?php
                        $shop_projects_query_args = [
                            'posts_per_page' => -1,
                            'category_name' => 'shop-projects',
                            'orderby' => 'title',
                            'order'   => 'ASC',
                        ];
                        $shop_projects_query = new WP_Query( $shop_projects_query_args );
                        $shop_projects_option = get_option( 'shop_projects_location' ); ?>
                        <select name="shop_projects_location[select_field_two_0]">
                            <?php while ( $shop_projects_query->have_posts() ) : $shop_projects_query->the_post();
                                $title_two = get_the_title();
                                $postid_two = get_the_ID();
                                ?>
                                <option value="<?=$postid_two?>" <?php selected( $shop_projects_option['select_field_two_0'], $postid_two); ?>>
                                    <?=$title_two?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="right">
                        <h2>Pocket Hole Projects Section</h2>
                        <?php
                        $pocket_hole_query_args = [
                            'posts_per_page' => -1,
                            'category_name' => 'shop-projects',
                            'orderby' => 'title',
                            'order'   => 'ASC',
                        ];
                        $pocket_hole_query = new WP_Query( $pocket_hole_query_args );
                        $pocket_hole_option = get_option( 'pocket_hole_projects_location' ); ?>
                        <select name="pocket_hole_projects_location[select_field_three_0]">
                            <?php while ( $pocket_hole_query->have_posts() ) : $pocket_hole_query->the_post();
                                $title_three = get_the_title();
                                $postid_three = get_the_ID();
                                ?>
                                <option value="<?=$postid_three?>" <?php selected( $pocket_hole_option['select_field_three_0'], $postid_three); ?>>
                                    <?=$title_three?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="left">
                        <h2>Organizing Section</h2>
                        <?php
                        $organizing_query_args = [
                            'posts_per_page' => -1,
                            'category_name' => 'organizing',
                            'orderby' => 'title',
                            'order'   => 'ASC',
                        ];
                        $organizing_query = new WP_Query( $organizing_query_args );
                        $organizing_option = get_option( 'organizing_location' ); ?>
                        <select name="organizing_location[select_field_four_0]">
                            <?php while ( $organizing_query->have_posts() ) : $organizing_query->the_post();
                                $title_four = get_the_title();
                                $postid_four = get_the_ID();
                                ?>
                                <option value="<?=$postid_four?>" <?php selected( $organizing_option['select_field_four_0'], $postid_four); ?>>
                                    <?=$title_four?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="left">
                        <h2>Scrap Wood Projects Section</h2>
                        <?php
                        $scrap_wood_query_args = [
                            'posts_per_page' => -1,
                            'category_name' => 'scrap-wood-projects',
                            'orderby' => 'title',
                            'order'   => 'ASC',
                        ];
                        $scrap_wood_query = new WP_Query( $scrap_wood_query_args );
                        $scrap_wood_option = get_option( 'scrap_wood_location' ); ?>
                        <select name="scrap_wood_location[select_field_five_0]">
                            <?php while ( $scrap_wood_query->have_posts() ) : $scrap_wood_query->the_post();
                                $title_five = get_the_title();
                                $postid_five = get_the_ID();
                                ?>
                                <option value="<?=$postid_five?>" <?php selected( $scrap_wood_option['select_field_five_0'], $postid_five); ?>>
                                    <?=$title_five?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                        <?php //adminCategorySelect('five', 'scrap-wood-projects', 'Scrap Wood Projects', 'scrap_wood_location') ?>
                    </div>
                </div>
            </div>
            <?php submit_button(); ?>
        </form>
    </div>
<?php }

/**
 * iterate through archive loop
 */
add_action( 'loop_start', 'wpse107113_loop_start' );
function wpse107113_loop_start( $query ){
    if( $query->is_category() && !is_front_page() ) :
        include_once "archive_template.php";
    endif;
}

/**
 * load stylesheet for frontend
 */
function category_archive_frontend_scripts() {
    //css
    wp_enqueue_style( 'plugin_style', plugins_url( '/archive_template_frontend.css', __FILE__ ) );

    //js
    wp_enqueue_script( 'ad_placement', plugins_url( '/insert_ad_loop.js', __FILE__ ) );
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
function adminCategorySelect($number, $category_slug, $category_name, $option_name) {
    $query_args = [
        'posts_per_page' => -1,
        'category_name' => $category_slug,
        'orderby' => 'title',
        'order'   => 'ASC',
    ];
    $wp_query = new WP_Query( $query_args );
    $option_name = get_option( $option_name ); ?>
    <h3><?=$category_name?> Section</h3> <?php//@TODO:change back to h2 after testing ?>
    <select name="<?=$option_name?>[select_field_'<?=$number?>.'_0]">
        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();
            $title = get_the_title();
            $postid = get_the_ID();
            ?>
            <option value="<?=$postid?>" <?php selected( $option_name['select_field_'. $number .'_0'], $postid); ?>>
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
function outputBannerPost ($dropdown_value) { ?>
    <a href="<?=get_post_permalink($dropdown_value)?>" title="Read More about - <?=get_the_title($dropdown_value)?>">
        <?=get_the_post_thumbnail( $dropdown_value, 'medium-large' )?>
        <div class="title_block">
            <h3><?=get_the_title($dropdown_value)?></h3>
        </div>
    </a>
    <?php
}