<?php
/**
 * @package dpwpcdn
 * @version 0.1
 */
/*
Plugin Name: DP CDN Helper
Plugin URI: https://github.com/danpai/dpwpcdn
Description: WordPress plugin to use CDNs as an alternative to lacal files
Author: Danilo Paissan
Version: 0.1
Author URI: http://danilopaissan.net
License: W3C Software Notice and License 

http://www.w3.org/Consortium/Legal/2002/copyright-software-20021231

By obtaining, using and/or copying this work, you (the licensee) agree that you have read, understood, and will comply with the following terms and conditions.

Permission to copy, modify, and distribute this software and its documentation, with or without modification, for any purpose and without fee or royalty is hereby granted, provided that you include the following on ALL copies of the software and documentation or portions thereof, including modifications:

- The full text of this NOTICE in a location viewable to users of the redistributed or derivative work.
- Any pre-existing intellectual property disclaimers, notices, or terms and conditions. If none exist, the W3C Software Short Notice should be included (hypertext is preferred, text is permitted) within the body of any redistributed or derivative code.
- Notice of any changes or modifications to the files, including the date changes were made. (We recommend you provide URIs to the location from which the code is derived.)
*/

require_once(ABSPATH . 'wp-admin/includes/misc.php');
require_once(ABSPATH . 'wp-admin/includes/admin.php');
require_once(ABSPATH . 'wp-includes/pluggable.php');
require_once(plugin_dir_path( __FILE__ ) . "pagesrender.php");

function dpcdn_install() {}

function dpcdn_deactivate() {}

function dpcdn_uninstall() {}

function dpcdn_add_menu(){
	add_options_page( 'DP CDN Helper', 'CDN Helper','manage_options', __FILE__, 'dpcdn_manage_option_page' );
}

function get_cdn_host($type){
	global $dpcache;
	
	$usecssdefault = false;
	$usejsdefault = false;
	$useimgdefault = false;
	
	if($type === "css" || $type === "js" || $type === "img"){
		if(isset( $dpcache )){
			if(!$dpcache->contais('ms_' . $type . '_use_default')){
				$usecssdefault = get_option('ms_' . $type . '_use_default');
				$dpcache->set('ms_' . $type . '_use_default',$usecssdefault);
			}
			$usecssdefault = $dpcache->get('ms_' . $type . '_use_default');
			
			if($usecssdefault && $dpcache->contais('ms_' . $type . '_default')){
				return $dpcache->get('ms_' . $type . '_default');
			}
			if($usecssdefault && !$dpcache->contais('ms_' . $type . '_default')){
				$dpcache->set('ms_' . $type . '_default',get_option( 'ms_' . $type . '_default' ));
				return $dpcache->get('ms_' . $type . '_default');
			}
			if(!$usecssdefault && $dpcache->contais('ms_' . $type . '_cdn')){
				return $dpcache->get('ms_' . $type . '_cdn');
			}
			if(!$usecssdefault && !$dpcache->contais('ms_' . $type . '_cdn')){
				$dpcache->set('ms_' . $type . '_cdn',get_option( 'ms_' . $type . '_cdn' ));
				return $dpcache->get('ms_' . $type . '_cdn');
			}
		}
		else{
			if(get_option('ms_' . $type . '_use_default')){
				return get_option('ms_' . $type . '_default');
			}
			return get_option( 'ms_' . $type . '_cdn' );
		}
	}
	return null;	
}
	
add_action( 'admin_menu', 'dpcdn_add_menu' );
?>