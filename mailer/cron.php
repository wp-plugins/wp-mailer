<?php
defined('ABSPATH') or die('You can not access this file directly.');



// Create a 15 minute timer
function wpm_cron_15min($schedules) {
    $schedules['15min'] = array(
        'interval' => 900, // 15 minutes
        'display' => __( 'Once every fifteen minutes' )
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'wpm_cron_15min' );

function wpm_register_cron() {
    // TODO: Change back to 15 minutes
    if (!wp_next_scheduled('wpm_cron_routine')) wp_schedule_event(time(), '15min', 'wpm_cron_routine');
}

function wpm_unregister_cron() {
    wp_unschedule_event(wp_next_scheduled('wpm_cron_routine'), 'wpm_cron_routine');
}
// We can manually run the cron by going to website.com/?wpm_runcron=1
if (isset($_GET['wpm_runcron'])) add_action('init', 'wpm_run_jobs');