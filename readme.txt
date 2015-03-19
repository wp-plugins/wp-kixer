=== WP-Kixer ===
Contributors: kixer
Tags: kixer, mobile ads
Requires at least: 3.0.1
Tested up to: 4.1.1
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
WP-Kixer allows you to add Kixer units in to your blog pages, posts and widgets.

== Description ==
WP-Kixer allows you to add Kixer units in to your blog pages, posts and widgets in 3 different ways.
You must have a unit ID number provided by Kixer before using this plugin. 

1. Shortcode
2. Template Tag
3. Below Content

1. Shortcode: 
The Kixer shortcode lets you place the unit in specific pages, posts or inside a sidebar widget. 
Place the kixer shortcode anywhere in the content and the unit will fire at the moment of rendering the page.
Example: [kixer id=2]
(Don't forget to replace the number 2 for your unit's id)

2. Template Tag: 
If you have access to your theme's files, you may prefer to include use this approach in your templates.
Example: kixer_unit(2);
(Don't forget to replace the number 2 for your unit's id)

3. Below Content: 
This is the easiest way to use the plugin but the position is predefined to the be after-content.
For a different placement the two previous options are recommended.
Fill-in your unit's ID field and select the checkbox to insert the unit at the bottom of your posts and pages.

== Installation ==
1. Extract the contents of the wp-kixer.zip file into the \"/wp-content/plugins/\" directory.
2. Activate the plugin through the \"Plugins\" menu in WordPress.
3. Find WP-Kixer settings page in the \"Plugins\" menu in WordPress.

== Changelog ==
= 0.1 =
* Initial release.