<?php
defined('ABSPATH') or die('You can not access this file directly.');
// When the time is right... this file will have a good purpose

$plver = wpm_get_version(); // Plugin version
$dbver = get_option('wpm_version'); // Database Version

if ($dbver > $plver){
    deactivate_plugins(basename(__FILE__));
    wp_die("Sorry, The plugin version you are installing is older than the database you have installed, please install plugin version ".$dbver." or newer.");
}

if ($dbver <= '1.0') {
    // Upgrade to version 1.0
}


// Successful update, time to update the database version.
update_option('wpm_version', $plver);