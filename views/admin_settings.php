<?php
/**
 * Admin Settings Screen
 *
 * main admin settings page
 */
?>
<div class="wrap">
    <h1>Category Archive Page Banner Ad Settings</h1>
    <p>Select a Post that shows on top of each category archive page. Have fun!</p>
    <?php settings_errors();?>
    <form method="post" action="options.php">
        <?php settings_fields( 'category_archive-settings-group' ); ?>
        <?php do_settings_sections( 'category_archive-settings-group' ); ?>
        <div id="main">
            <div class="row">
                <div class="right">
                    <?php
                    adminCategorySelect('one', 'projects-for-the-home', 'For The Home', 'for_the_home_location') ?>
                </div>
                <div class="left">
                    <?php
                    adminCategorySelect('two', 'shop-projects', 'Shop Projects', 'shop_projects_location') ?>
                </div>
            </div>
            <div class="row">
                <div class="right">
                    <?php
                    adminCategorySelect('three', 'shop-projects', 'Pocket Hole Projects', 'pocket_hole_projects_location') ?>
                </div>
                <div class="left">
                    <?php
                    adminCategorySelect('four', 'organizing', 'Organizing', 'organizing_location') ?>
                </div>
            </div>
            <div class="row">
                <div class="left">
                    <?php
                    adminCategorySelect('five', 'scrap-wood-projects', 'Scrap Wood Projects', 'scrap_wood_location') ?>
                </div>
            </div>
        </div>
        <?php submit_button(); ?>
    </form>
    <p>v1.0.1</p>
</div>
