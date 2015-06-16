<?php
defined('ABSPATH') or die('You can not access this file directly.');

$plver = wpm_get_version();
$dbver = get_option('wpm_version');

if ($dbver > $plver){
    deactivate_plugins(basename(__FILE__));
    wp_die("Sorry, The plugin version you are installing is older than the database you have installed, please install plugin version ".$dbver." or newer.");
}

if ($dbver <= '0.1') {} // 29-May-2015 - Nothing to do in this version
if ($dbver <= '0.2') {} // 29-May-2015 - Nothing to do in this version
if ($dbver <= '0.3') {} // 16-June-2015 - Nothing to do in this version
update_option('wpm_version', $plver);