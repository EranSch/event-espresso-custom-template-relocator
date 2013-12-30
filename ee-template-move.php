<?php 

/**
 * Plugin Name: Event Espresso - Custom Template Mover
 * Plugin URI: http://eran.sh
 * Description: Redefines where EE looks for its templates. Instead of the path /wp-content/uploads/espresso/templates/ (Yuck!) EE will use <strong>{THEME-DIR}/event-espresso/</strong> (Kind of like WooCommerce's custom templates). This should work with child themes as well.
 * Version: 0.1
 * Author: Eran Schoellhorn
 * Author URI: http://eran.sh
 * License: GPL2
 */

$newTemplateDir = get_stylesheet_directory() . "/event-espresso/templates/";
define("EVENT_ESPRESSO_TEMPLATE_DIR", $newTemplateDir);

$newGatewayDir = get_stylesheet_directory() . "/event-espresso/gateways/";
define("EVENT_ESPRESSO_GATEWAY_DIR", $newGatewayDir);

$newGatewayURL = get_stylesheet_directory_uri() . "/event-espresso/gateways/";
define("EVENT_ESPRESSO_GATEWAY_URL", $newGatewayURL);

// echo EVENT_ESPRESSO_TEMPLATE_DIR . "\n";
// echo EVENT_ESPRESSO_GATEWAY_DIR . "\n";
// echo EVENT_ESPRESSO_GATEWAY_URL . "\n";



/* Found this on some WP support form but I'm not sure if it works.
 * I haven't been able to intentionally cause the plugin to become
 * inneffective under any conditions but I'm leaving it in good faith.
 */

function this_plugin_first() {
	// ensure path to this file is via main wp plugin path
	$wp_path_to_this_file = preg_replace('/(.*)plugins\/(.*)$/', WP_PLUGIN_DIR."/$2", __FILE__);
	$this_plugin = plugin_basename(trim($wp_path_to_this_file));
	$active_plugins = get_option('active_plugins');
	$this_plugin_key = array_search($this_plugin, $active_plugins);
	if ($this_plugin_key) { // if it's 0 it's the first plugin already, no need to continue
		array_splice($active_plugins, $this_plugin_key, 1);
		array_unshift($active_plugins, $this_plugin);
		update_option('active_plugins', $active_plugins);
	}
}

add_action("activated_plugin", "this_plugin_first");