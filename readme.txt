=== HEP Display Posts ===
Contributors: hridoy35
Tags: posts, latest-posts, display-posts, latest posts, display posts
Requires at least: 4.7.25
Tested up to: 6.1.1
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html

== Description ==

HEP Display Posts plugin allows users to display posts with responsive design in the websites in different ways by using multiple options.

You can display the posts in 2 (two) ways in your websites. They are: 
1. Using Widgets
2. Using Shortcodes

**Widget Instructions**

To show the posts as widgets, you need to follow these instructions:
* Hover on 'Appearance' on the left sidebar of admin panel
* Click on 'Widgets'
* In the widgets page, add an 'HEP Display Posts' widget in the required sidebar  
* That's it! Now posts will be shown in the sidebar of the website

**Shortcode**

The shortcode of this plugin is:

`[hep_display_posts]`

To show the posts as shortcodes, just paste the shortcode in your desired area, the posts will be shown accordingly. You can paste it in different posts, pages, sidebars etc. wherever you wish. 

**Options**

There are several options to modify the display of the posts. The attributes, which are needed while using the shortcode are also mentioned.
* Widget Title: Display the title of the widget. For example: Latest Posts
* Number of Posts (shortcode attribute: hep_no_of_posts): How many posts will be shown. Default value is 5.

`[hep_display_posts hep_no_of_posts="5"]` 
* Text Alignment (shortcode attribute: hep_text_align): How the text will be aligned. For Arabic, Right to Left (rtl) alignment is used. For English, Left to Right (ltr) alignment is used. Default value is 'ltr'. 

`[hep_display_posts hep_text_align="ltr"]; the values are ltr, rtl` 
* Order Posts (shortcode attribute: hep_post_sorting_order): How the posts will be ordered, Ascending or Descending. Default value is 'Descending' ('desc' for shortcode).

`[hep_display_posts hep_post_sorting_order="desc"]; the values are asc, desc`
* Order Posts By (shortcode attribute: hep_post_sorting_order_by): According to which information the posts will be ordered. The options are by Date, by Post Title, or Random. Default value is 'date'.

`[hep_display_posts hep_post_sorting_order_by="date"]; the values are date, title, rand`
* Show By Category (shortcode attribute: hep_settings_post_category): Show posts according to category(ies). The slug of the category should be given. Multiple category slugs could also be entered, separated by commas. You can keep it blank for no specific categories.

`[hep_display_posts hep_settings_post_category="news"]`
* Show By Tag (shortcode attribute: hep_settings_post_tag): Show posts according to tag(s). The slug of the tag should be given. Multiple tag slugs could also be entered, separated by commas. You can keep it blank for no specific tags. 

`[hep_display_posts hep_settings_post_tag="tag1"]`
* Show By Author (shortcode attribute: hep_settings_post_author): Show posts according to author. The slug of the author should be given. Only one slug is allowed here. You can keep it blank for no specific author.

`[hep_display_posts hep_settings_post_author="admin"]`
* Hide Thumbnail (shortcode attribute: hep_hide_thumbnail): Hide the thumbnail images of the posts displayed on webite. In order to hide the thumbnail for shortcode, the value should be 'on'.  

`[hep_display_posts hep_hide_thumbnail="on"];`
* Hide Date (shortcode attribute: hep_hide_date): Hide the date of the posts displayed on webite. In order to hide the date for shortcode, the value should be 'on'.

`[hep_display_posts hep_hide_date="on"]`
* Word Limit for Title (shortcode attribute: hep_title_word_limit): How many words of the title will be shown. Keep 0 (zero) to show the full title. Default value is 0 (zero).

`[hep_display_posts hep_title_word_limit="5"]`
* Message for No Posts (shortcode attribute: hep_no_posts_message): Message to show if no posts are found. Default message is 'No posts found!'.

`[hep_display_posts hep_no_posts_message="No posts found!"]`

A sample shortcode is given below with some of the attributes:

`[hep_display_posts hep_no_of_posts="5" hep_text_align="ltr" hep_post_sorting_order="desc" hep_post_sorting_order_by="date"]`

== Frequently Asked Questions ==

= Do I have to enter all the values for shortcode? =

No, all fields are not mandatory. The fields such as 'hep_widget_title', 'hep_settings_post_category', 'hep_settings_post_tag', 'hep_settings_post_author', 'hep_hide_thumbnail', 'hep_hide_date' are allowed to keep empty. The other fields have default values, so they are already filled.

= Do I have to enter all the values for widget? =

No, the same applies here. All fields are not mandatory. The fields such as 'Widget Title', 'Show By Category', 'Show By Tag', 'Show By Author', 'Hide Thumbnail', 'Hide Date' are allowed to keep empty. The other fields have default values, so they are already filled.

== Screenshots ==

1. Add widget to a sidebar
2. Basic settings of a widget
3. Post settings of a widget

== Changelog ==

**Version 1.0.0**

* This is version 1.0.0. The beginning!
