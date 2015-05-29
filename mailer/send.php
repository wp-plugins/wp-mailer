<?php
defined('ABSPATH') or die('You can not access this file directly.');
// This is where the magic happens!

function wpm_send_job($job) {

    if (is_int($job)) $job = wpm_get_job($job);

    $buffer = get_option('wpm_batchsize');
    $pause = get_option('wpm_batchpause');
    $start = $job->job_sent?$job->job_sent:0;
    $start = 0;
    $finish = wpm_get_subscriber_count();

    wpm_update_job($job->job_id, array(
        'job_start' => current_time('mysql'),
        'job_total' => (int)$finish,
        'job_status' => 2 // Running
    ));

    // Check and set valid template - the template may of been deleted!
    $template_path = wpm_get_template_path();
    $args = array('p' => (int)$job->job_post_id);
    global $wp_query;
    $wp_query = new WP_Query($args);


    $wpm_sendername = sanitize_text_field(get_option('wpm_sendername'));
    $wpm_senderemail = sanitize_email(get_option('wpm_senderemail'));
    $wpm_senderreply = sanitize_email(get_option('wpm_senderreply'));

    $headers = array(
        'From: '.$wpm_sendername.' <'.$wpm_senderemail.'>',
        'Content-Type: text/html; charset=UTF-8'
    );
    if ($wpm_senderreply) $headers[] = 'Reply-To: '.$wpm_senderreply;

    for ($sent=$start; $sent<=$finish; $sent+=$buffer) {

        $subscribers = wpm_get_subscribers($sent,$buffer);
        $buff_item = 0;
        if (count($subscribers)) {
            global $subscriber;
            foreach($subscribers as $subscriber) {

                rewind_posts();
                the_post();
                $html = wpm_get_mailer($template_path);
                //unset($title_matches, $res);
                $res = preg_match("/<title>(.*)<\/title>/siU", $html, $title_matches);
                if ($res) {
                    $subject = preg_replace('/\s+/', ' ', $title_matches[1]);
                    $subject = trim($subject);
                }
                if (!$subject) $subject = 'hello';

                wp_mail($subscriber->sub_email, $subject, $html, $headers);

                $buff_item++;

                wpm_update_job($job->job_id,
                    array('job_sent' => $sent+$buff_item)
                );

            }

        }

        sleep($pause);
    }

    wp_reset_query();

    wpm_update_job($job->job_id, array(
        'job_finish' => current_time('mysql'),
        'job_status' => 3 // Completed
    ));
}