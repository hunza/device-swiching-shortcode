<?php
/*
	Plugin Name: Device Swiching Shortcode
	Plugin URI: http://creatorish.com/lab/3589
	Description: 投稿内でデバイスごとに表示を振り分けるショートコード[switch target="pc,mobile,tablet,feature"][/switch]を提供するプラグイン
	Author: yuu (creatorish.com)
	Version: 0.1
	Author URI: http://creatorish.com
*/

function device_swiching_shortcode($atts,$content=null) {
	extract(shortcode_atts(array(
		"target" => ""
	), $atts));
	if (!$target) {
		return;
	}
	
	$target = split(",",$target);
	$agent = $_SERVER['HTTP_USER_AGENT'];
	
	if (in_array("feature",$target)) {
		if (ereg("^DoCoMo", $agent)) {
			return $content;
		} else if (ereg("^J-PHONE|^Vodafone|^MOT-[CV]|^SoftBank", $agent)) {
			return $content;
		} else if (ereg("^KDDI", $agent) || ereg("^UP.Browser", $agent)) {
			return $content;
		}
	}
	if (in_array("mobile",$target)) {
		if (ereg("iPhone", $agent)) {
			return $content;
		} else if (ereg("Android", $agent)) {
			if (ereg("Mobile", $agent)) {
				return $content;
			}
		}
	}
	if (in_array("tablet",$target)) {
		if (ereg("iPad", $agent)){
			return $content;
		} else if (ereg("Android", $agent)){
			if (!ereg("Mobile", $agent)){
				return $content;
			}
		}
	}
	if (in_array("pc",$target)) {
		if(!ereg("iPhone", $agent) && !ereg("iPad", $agent) && !ereg("Android", $agent) && !ereg("^DoCoMo", $agent) && !ereg("^J-PHONE|^Vodafone|^MOT-[CV]|^SoftBank", $agent) && !ereg("^KDDI", $agent) || ereg("^UP.Browser", $agent)) {
			return $content;
		}
	}
}
add_shortcode('switch', 'device_swiching_shortcode');
?>