<?php
/*
Plugin Name: Tobenski - Contact Form for Det Gamle Posthus Website
Plugin URI: https://github.com/tobenski/dgpplugins
Description: Plugin to create the contact form for Det Gamle Posthus Indsættes med short code: [tobenski-contact-form].
Version: 1.0.0
Author: Knud Rishøj
Author URI: https://tobenski.dk
License: GPLv2 or later
Text Domain: tobenski
*/

// Require Easy WP SMTP Plugin. 

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * The code that runs during plugin activation.
 */
function tobenski_dgp_contact_form_activate() { 
    Tobenski_Message_CPT::add();
    flush_rewrite_rules(); 
}

/**
 * The code that runs during plugin deactivation.
 */
function tobenski_dgp_contact_form_deactivate() {
        // Unregister the post type, so the rules are no longer in memory.
        unregister_post_type( 'message' );
        // Clear the permalinks to remove our post type's rules from the database.
        flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'tobenski_dgp_contact_form_activate' );
register_deactivation_hook( __FILE__, 'tobenski_dgp_contact_form_deactivate' );


/**
 * include all php files in the includes directory
 */
foreach(glob( plugin_dir_path( __FILE__ ) . "includes/*.php") as $file) {
    require_once $file;
}

Tobenski_Dgp_Contact_Form::add_actions();
