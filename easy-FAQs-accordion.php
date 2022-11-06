<?php
/**
 * Plugin Name: Easy FAQ's Accordion
 * Plugin URI:
 * Description: Plugin for making frequently asked question section by shortcode and accordian with easy manner by using [EFAQ question="" answer = ""] in your page.
 * Version:1.0
 * Author: Vaibhav Gangrade
 * Author URI:
 */
if (!defined('ABSPATH')) exit;
include_once (ABSPATH . 'wp-admin/includes/plugin.php'); //calling core files of plugin
require_once( ABSPATH . 'wp-includes/pluggable.php' );
include_once ('libraries.php'); //css/js files
include_once ('faq-shortcode.php'); //calling shortcode in plugin
include_once('admin-menu.php');//calling setting menu 
//include_once('save_default_settings.php');//saving Default settings 


#######################################  FUNCTIONS FOR SETTINGS OF FAQ'S  ###################################################


//Register a callback for our specific plugin's actions
add_filter('plugin_action_links_' . plugin_basename(__FILE__) , 'EFAQ_section_MY_PLUGIN_SLUG');
function EFAQ_section_MY_PLUGIN_SLUG($links)
    {
        $links[] = '<a href="' . menu_page_url(EFAQ_section_MY_PLUGIN_SLUG, false) . '">FAQ Settings</a>';
        return $links;
        // $links[] = '' . esc_html('Settings', 'codechief') . '';

    return $links;
    }
	
	
####################################### END OF FUNCTIONS FOR SETTINGS OF FAQ'S  ##################################################