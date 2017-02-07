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

	$target = explode(",",$target);
	$agent = $_SERVER['HTTP_USER_AGENT'];

	if (in_array("feature",$target)) {
		if (preg_match("/^DoCoMo/", $agent)) {
			return $content;
		} else if (preg_match("/^J-PHONE|^Vodafone|^MOT-[CV]|^SoftBank/", $agent)) {
			return $content;
		} else if (preg_match("/^KDDI/", $agent) || preg_match("/^UP.Browser/", $agent)) {
			return $content;
		}
	}
	if (in_array("mobile",$target)) {
		if (preg_match("/iPhone/", $agent)) {
			return $content;
		} else if (preg_match("/Android/", $agent)) {
			if (preg_match("/Mobile/", $agent)) {
				return $content;
			}
		}
	}
	if (in_array("tablet",$target)) {
		if (preg_match("/iPad/", $agent)){
			return $content;
		} else if (preg_match("/Android/", $agent)){
			if (!preg_match("/Mobile/", $agent)){
				return $content;
			}
		}
	}
	if (in_array("pc",$target)) {
		if(!preg_match("/iPhone/", $agent) && !preg_match("/iPad/", $agent) && !preg_match("/Android/", $agent) && !preg_match("/^DoCoMo/", $agent) && !preg_match("/^J-PHONE|^Vodafone|^MOT-[CV]|^SoftBank/", $agent) && !preg_match("/^KDDI/", $agent) || preg_match("/^UP.Browser/", $agent)) {
			return $content;
		}
	}
}
add_shortcode('switch', 'device_swiching_shortcode');
