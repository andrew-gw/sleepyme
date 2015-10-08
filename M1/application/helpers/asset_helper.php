<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); 

if (!function_exists('assetUrl')) {   
	function assetUrl() {
		$CI =& get_instance(); 
		
		// asset url autoloaded from custom config file
		return base_url() . $CI->config->item('assets_path');
	}
}

?>