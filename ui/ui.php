<?php
//**************************************************************************************
//CREATED BY           	:   TOUCHCAST
//DATE                  :   15 JANUARY 2014
//DESCRIPTION 			: 	TOUCHCAST PLUGIN UI 
//**************************************************************************************


// function to echo out our script to call js
function show_touchcast($url, $autoplay, $autoforward, $dimension)
{
    
    if ($url == "") {
        $url = "";
    }
    
    if ($autoplay == "") {
        $autoplay = "1";
    }
    if ($autoforward == "") {
        $autoforward = "1";
    }
    $dimension_split = explode('x', $dimension);
    $width           = $dimension_split[0];
    $height          = $dimension_split[1];
    if ($width == "") {
        $width = "1280";
    }
    if ($height == "") {
        $height = "720";
    }
	$url = rtrim($url,'/');
    $embed_url = str_replace('http:', '', $url);
    $embed_url = str_replace('touchcast.com/', 'touchcast.com/plg/', $embed_url);
    $embed_url .= '&autoplay=' . $autoplay;
    $embed_url .= '&autoforward=' . $autoforward;
    
    $out = '<iframe width="' . $width . '" height="' . $height . '" src="' . $embed_url . '" scrolling="no" frameborder="0" allowfullscreen> </iframe>';
    
    return $out;
} //end of function show_touchcast

//create shortcode 
//eg : [touchcast url="http://www.touchcast.com/erick/ny_tech_meetup_touchcast_demo" type="performance"  autoplay="0" autoforward="true" width="500" height="500"]
function touchcast_shortcode($atts, $content = null)
{
    extract(shortcode_atts(array(
        "url" => '',
        "type" => '',
        "autoplay" => '',
        "autoforward" => '',
        "dimension" => ''
    ), $atts));
    return touchcast_display($url, $autoplay, $autoforward, $dimension);
}

//function to be used in shortcode or directly in theme
function touchcast_display($url, $autoplay, $autoforward, $dimension)
{
    
    $touchcast_code = show_touchcast($url, $autoplay, $autoforward, $dimension);
    
    return $touchcast_code;
    
}
add_shortcode("touchcast", "touchcast_shortcode");
?>