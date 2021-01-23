<?php

class Tobenski_Dgp_Contact_Form
{
    public static function output_form() {
        ob_start();
    
        if ( ! function_exists( 'acf_form' ) ) {
            return;
        }

        acf_form(
            [
                'id' 				    => 'kontakt-form',
                'post_id'			    => 'new_post',
                'form_attributes'       => array('class' => 'kontaktform'),
                'html_before_fields'    => "<script src='https://www.google.com/recaptcha/api.js' async defer></script>",
                'html_after_fields'     => "<div class='g-recaptcha' data-sitekey=". get_field('field_tob_g9swqnir3u', 'option') ."></div>",
                'html_submit_button'    => '<input type="submit" class="kontakt-submit" value="%s" />',
                'html_updated_message'  => '<div id="message" class="updated kontakt-updated"><p>'. the_field('field_tob_bbr31djh6l', 'option') .'</p></div>',
                'label_placement'       => 'top',
                'post_title'            => false,
                'post_content'          => false,
                'new_post'			    => [
                            'post_type'		=> 'message',
                            'post_status'	=> 'publish',
                ],
                'field_groups'          => array('group_tob_eoewasa968') ,
                'submit_value'          => 'Send Besked',
                'updated_message'       => "Tak for din Besked.",
            ]
        );
    
        return ob_get_clean();
    }

    public static function add_actions()
    {
        // Tilføj Stylesheet
        add_action( 'wp_enqueue_scripts', 'tobenski_kontakt_styles' );
        // Tilføj Custom Post Type Message
        add_action( 'init', 'Tobenski_Message_CPT::add', 10 );

        // Tilføj efter save actions. (reCA)
        add_action( 'acf/save_post', 'Tobenski_Message_CPT::save_message' );
        
        // Tilføj acf form head til header
        add_action( 'get_header', 'acf_form_head');
        
        // Admin Styles
        add_action( 'admin_enqueue_scripts', 'Tobenski_Contact_Form_Backend::load_admin_styles' );
        // Lav Admin Menuen.
        add_action('admin_menu', 'Tobenski_Contact_Form_Backend::setup_Admin');
        // Tilføj Options Page til Admin - Husk at prioriti skal være højere end standard. 
        add_action( 'acf/init', 'Tobenski_Contact_Form_Backend::create_options_page', 11); 

        // Register shortcodes
        add_action( 'acf/init', 'Tobenski_Dgp_Contact_Form::add_shortcodes', 25);
    }

    public static function add_shortcodes()
    {
        add_shortcode( 'tobenski-contact-form', 'Tobenski_Dgp_Contact_Form::output_form' );
    }
}