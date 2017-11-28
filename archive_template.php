<?php

//our options from plugin settings page
require_once "settings-option-data.php";

//home projects
outputBannerPost('101', $home_projects_dropdown_value);

//shop projects
outputBannerPost('4', $shop_projects_dropdown_value);

//pocket hole projects
outputBannerPost('89', $pocket_hole_dropdown_value);

//organizing
outputBannerPost('15', $organizing_dropdown_value);

//scrap wood
outputBannerPost('101', $scrap_wood_dropdown_value);