=== WP Easy Post Mailer ===
Contributors: webfwd
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SC73FL5DKG6CW
Tags: mail, email, newsletter, subscribe, list, mailinglist, mail list, mailing list, campaign monitor, mailchimp, constant contact, subscriber, subscribers, email marketing, marketing, widget, post, plugin, admin, posts, sidebar, page, pages, mailchimp, aweber, vertical response, icontact, myemma, madmimi, getresponse, infusionsoft, ontraport, gravity forms, contact form 7
Requires at least: 3.0
Tested up to: 4.2.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

The easiest way to automatically send your blog posts straight to your email subscribers.

== Description ==

WP Easy Post Mailer allows your visitors to enter their name and email address on your website to be subscribed to receive updates of new posts from your blog. When you create a new WordPress post, WP Easy Post Mailer will automatically send out a styled email newsletter to all subscribers.

WP Easy Post Mailer can be customised and comes with two preset mail templates but we hope that people will submit their own templates and allow us to add them in to the plugin.

We could not find any plugin that get straight to the point and allow users to manage a large list of subscribers and easily send out regular email newsletters without incorporating 3rd party paid platforms.

WP Easy Post Mailer currently uses the built in WordPress mail sending class and you may need to check with your hosting provider as to how many emails you can send out.

**Features are as follows:-**

* Send email campaigns automatically straight from the WordPress admin.
* Email campaigns are scheduled to send as soon as your post is scheduled to publish.
* Staggered emailing sending to reduce the risk of being blacklisted.
* Automatic subscribe form and unsubscribe link in email newsletters.
* Unsubscribe suppression list to ensure you do not accidently reimport unsubscribed users.
* Multiple customised subscribe forms and three methods of installation.
* Write your own mail templates in your theme folder utilising the WordPress loop.
* Import and export subscribers in standardised CSV format


A lot of time and hard work has gone into WP Easy Post Mailer, if you like it then please find the time to rate it.

== Installation ==

* <em>Step 1:</em> Upload `wp-mailer` folder to the `/wp-content/plugins/` directory or click `Install` within the Add new plugin section.
* <em>Step 2:</em> Activate the plugin through the 'Plugins' menu inside the WordPress admin.
* <em>Step 3:</em> Goto WP Mailer -> Forms and create a subscribe form.
* <em>Step 4:</em> Embed the form in your page by using one of three methods:-
    * Go to Appearance -> Widgets and drag `WP Mailer Subscribe Form` widget into a sidebar.
    * Use the shortcode `[wpm_form id="1"]`.
    * Call the form within php code `<?php echo wpm_form(1); ?>`.
* <em>Step 5:</em> If your would like to disable automatic sending of emails then change `Automatic Mail Sending` to NO in WP Mailer -> Settings.

If your posts queue up for a long time on the campaigns page then you need to ensure that your WordPress cron is running correctly.

**Security and bug-fixes are our highest priority, if you come across any issues then please go to the credits section within the plugin and send us a message.**

== Screenshots ==

1. Email Campaign Manager
2. Template Manager
3. Example Email Newsletter
4. Subscriber Management
5. Add/Update Subscribe Form

== Frequently Asked Questions ==

= Can this plugin be used to send emails when I publish a new post or page? =

Yes, currently it supports the ability to send email newsletters of WordPress posts only but we will look at pages and other custom post types in the near future.

== Changelog ==

= 0.3
* Few more fixes so that the plugin works under WP_DEBUG=true.
* Update preview template actions so that it does not conflict with other plugins.
* ability to send a test email to see what each template looks like.

= 0.2
* Fix SQL error for counting subscribers.
* Wording changes.
* Decode html entities on subject.
* Added Emogrifier by John Reeve to convert seperated HTML and CSS into inline HTML+CSS.
* Changed bitly donate link as they think its spam.
* Working pretty well with WP_DEBUG enabled.
* Added WordPress version to credits form.


= 0.1
* After weeks of programming, we have finally launched the plugin, go easy on us.