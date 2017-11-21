<?php
/**
 * All data related to category-archive-cta.php input values
 */
$homeProjects = get_option( 'for_the_home_location' );
$home_projects_dropdown_value = $homeProjects['select_field_one_0'];

$shopProjects = get_option('shop_projects_location');
$shop_projects_dropdown_value = $shopProjects['select_field_two_0'];

$pocketHole = get_option('pocket_hole_projects_location');
$pocket_hole_dropdown_value = $pocketHole['select_field_three_0'];

$organizing = get_option('organizing_location');
$organizing_dropdown_value = $organizing['select_field_four_0'];

$scrapWood = get_option('scrap_wood_location');
$scrap_wood_dropdown_value = $scrapWood['select_field_five_0'];
