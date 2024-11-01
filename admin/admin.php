<?php
//**************************************************************************************
//CREATED BY           	:   TOUCHCAST
//DATE                  :   15 JANUARY 2014
//DESCRIPTION 			: 	TOUCHCAST PLUGIN ADMIN 
//**************************************************************************************

//add our button
function touchcast_addbuttons()
{
    // check permissions
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
        return;
    
    // if rich editing
    if (get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "touchcast_tinymce_plugin");
        add_filter('mce_buttons', 'touchcast_button');
    }
}

function touchcast_button($tiny_buttons)
{
    array_push($tiny_buttons, "touchcast");
    return $tiny_buttons;
}


//Load our tinymce plugin
function touchcast_tinymce_plugin($plugin_array)
{
    $path                      = touchcast_get_plugin_url('/tinymce/editor_add.js');
    $plugin_array['touchcast'] = $path;
    return $plugin_array;
}
//action to initiate Widget
add_action('init', 'touchcast_addbuttons');
?>