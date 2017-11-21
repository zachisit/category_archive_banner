<?php

//our options from plugin settings page
require_once "settings-option-data.php";

//home projects
if (is_category('101')) {
    echo '<div class="archive_advert">' . outputBannerPost($home_projects_dropdown_value) . '</div>';
}
//shop projects
if (is_category('4')) {
    echo '<div class="archive_advert">' . outputBannerPost($shop_projects_dropdown_value) . '</div>';
}
//pocket hole projects
if (is_category('89')) {
    echo '<div class="archive_advert">' . outputBannerPost($pocket_hole_dropdown_value) . '</div>';

}
//organizing
if (is_category('15')) {
    echo '<div class="archive_advert">' . outputBannerPost($organizing_dropdown_value) . '</div>';

}
if (is_category('100')) {
    echo '<div class="archive_advert">' . outputBannerPost($scrap_wood_dropdown_value) . '</div>';

}