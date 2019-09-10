<?php

/**
 * @package Optima-Leads-Tracking
 * @version 1.0.0
 */
/*
Plugin Name: Optima Leads Tracking
Description: Plugin para setagem na sessão de como o visitante chegou ao site
Author: Marcony Caldeira
Version: 1.0.0
Author URI: http://linkdin.com/marconycaldeira
*/

function custom_rewrite_tag()
{
    
    add_rewrite_tag('%'.get_option('otl_url_parameter').'%', '([^&]+)');
}

function check_visitant_source()
{
    if(!isset($_COOKIE[get_option('otl_url_parameter')])){
        $source = $_GET[get_option('otl_url_parameter')];
        setcookie(get_option('otl_url_parameter'), $source, time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
    }

}
function set_source_in_form()
{

    
    if (isset($_COOKIE[get_option('otl_url_parameter')]) && !empty(get_option('otl_id_input_hidden'))) {
        $source = $_COOKIE[get_option('otl_url_parameter')];
    } else if (isset($_GET[get_option('otl_url_parameter')]) && !empty(get_option('otl_id_input_hidden'))) {
        $source = $_GET[get_option('otl_url_parameter')];
    } else {
        return true;
    }
    $js  =  "<script>";
    $js .=  "document.getElementById(('form-field-".get_option('otl_id_input_hidden')."')).value = '" . $source . "';";
    $js .=  "</script>";
    echo $js;
}
function optima_tracking_leads_plugin_create_menu()
{
    add_menu_page('Optima Tracking Leads', 'Tracking Leads', 'administrator', __FILE__, 'optima_tracking_leads_plugin_settings_page', plugins_url('/img/icon-resize.png', __FILE__));
    add_action('admin_init', 'register_optima_tracking_leads_plugin_settings');
}


function register_optima_tracking_leads_plugin_settings()
{
    register_setting('my-cool-plugin-settings-group', 'otl_url_parameter');
    register_setting('my-cool-plugin-settings-group', 'otl_id_input_hidden');
    register_setting('my-cool-plugin-settings-group', 'otl_slug_pages_to_be_apply');
}

function optima_tracking_leads_plugin_settings_page()
{
    include 'includes/otl-first-acp-page.php';
}
function wporg_add_custom_post_types($query)
{
    $slugs = get_option('otl_slug_pages_to_be_apply');
    $pagename = $query->get('pagename');
    if(!empty($slugs) && !empty($pagename)){
        if (strpos($slugs, $pagename) !== false) {
            add_action('wp_footer', 'set_source_in_form');        
        } 
    }
    
}
add_action('parse_query', 'wporg_add_custom_post_types');
add_action('init', 'custom_rewrite_tag', 10, 0);
add_action('init', 'check_visitant_source');
add_action('admin_menu', 'optima_tracking_leads_plugin_create_menu');

