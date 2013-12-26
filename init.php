<?php 
/*
Plugin Name: Village Portfolio
Plugin URI: http://www.themevillage.net/village-portfolio
Description: A plugin that enables your portfolio in ThemeVillage Themes.
Version: 1.3.3
Author: ThemeVillage
Author URI: http://www.themevillage.net
License: GPL2+
*/

$plugin_path = plugin_dir_path( __FILE__ );

if ( ! class_exists( "Village_Portfolio") ) {
	require_once( $plugin_path . "portfolio.php" );
}
$portfolio = new Village_Portfolio;	





if (is_admin()) { // note the use of is_admin() to double check that this is happening in the admin
	global $pagenow;

	// if ( $pagenow == "plugins.php" ) {
	    require_once( "updater.php" );

	    $config = array(
	        'slug' => plugin_basename( __FILE__ ), 
	        'proper_folder_name' => 'village-portfolio', // this is the name of the folder your plugin lives in
	        'api_url' => 'https://api.github.com/repos/justnorris/village-portfolio', // the github API url of your github repo
	        'raw_url' => 'https://raw.github.com/justnorris/village-portfolio/master', // the github raw url of your github repo
	        'github_url' => 'https://github.com/justnorris/village-portfolio', // the github url of your github repo
	        'zip_url' => 'https://github.com/justnorris/village-portfolio/zipball/master', // the zip url of the github repo
	        'sslverify' => true, // wether WP should check the validity of the SSL cert when getting an update, see https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/2 and https://github.com/jkudish/WordPress-GitHub-Plugin-Updater/issues/4 for details
	        'requires' => '3.6', // which version of WordPress does your plugin require?
	        'tested' => '3.8', // which version of WordPress is your plugin tested up to?
	        'readme' => 'README.md', // which file to use as the readme for the version number
	    );
	    new WP_GitHub_Updater($config);


	// }
}