<?php
/*
Plugin Name: TouchCast
Version: 1.0.1
Description: Embed TouchCast on posts/pages.More info at http://www.touchcast.com/wordpress
Author: TouchCast
Author URI: http://v1.touchcast.com/wordpress
*/
// path to plugin
function touchcast_get_plugin_url($file, $pluginname = "touchcast-embed")
{
    // check if plugins url function exists
    if (function_exists('plugins_url')) {
        return plugins_url($file, __FILE__);
    } else if (defined('WP_PLUGIN_URL')) {
        return WP_PLUGIN_URL . "/" . $pluginname . $file;
    } else {
        // if not assumme it is default location.
        return "../../../wp-content/plugins/" . $pluginname . $file;
    }
}
// ui
include('ui/ui.php');
// ui
include('admin/admin.php');
?>