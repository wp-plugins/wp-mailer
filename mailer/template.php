<?php
defined('ABSPATH') or die('You can not access this file directly.');
function wpm_get_template_path($name=null) {
    $template = wpm_find_template($name?$name:get_option('wpm_mail_template'));
    if (!$template) {
        $template = WPM_DIR.'/templates/wpm-default.php';
    }
    return $template;
}

function wpm_preview_template() {
    if (isset($_GET['action']) && $_GET['action']=='preview_template' && current_user_can( 'manage_options')) {
        $template = sanitize_file_name($_GET['template']);

        $template_path = wpm_find_template($template);
        if (!$template_path) die('This template does not exist');

        $args = array(
            'posts_per_page' => 1,
            'post_type' => 'post',
            'orderby' => 'date',
            'post_status' => 'publish',
            'order' => 'DESC'
        );
        global $wp_query;
        $wp_query = new WP_Query($args);
        rewind_posts();
        the_post();

        $html = wpm_get_mailer($template_path);

        echo $html;
        exit;
    }
}
add_action('admin_init', 'wpm_preview_template');

function wpm_get_templates_list() {
    $templates = array();
    $dirs = array(TEMPLATEPATH, WPM_DIR.'/templates');
    foreach ($dirs as $dir) {
        $list = glob($dir.'/wpm-*.php');
        if (count($list)) {
            foreach ($list as $file) {
                $templates[basename($file)] = $file;
            }
        }
    }
    ksort($templates);
    return $templates;
}

function wpm_activate_template($template) {
    update_option('wpm_mail_template', $template);
}

function wpm_find_template($template) {
    $list = wpm_get_templates_list();
    return $list[$template];
}