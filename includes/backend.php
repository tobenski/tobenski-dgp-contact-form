<?php
class Tobenski_Contact_Form_Backend
{
      public static function load_admin_styles() {
            wp_enqueue_style( 'admin_css', plugin_dir_url( __FILE__ ) . '../css/kontakt.css', false, microtime() );
      }  

    public static function setup_Admin()
    {
        $page_title = 'Kontakt Form';   
        $menu_title = 'Kontakt Form';   
        $capability = 'manage_options';   
        $menu_slug  = 'contact_form_list';   
        $function   = 'Tobenski_Contact_Form_Backend::list_page';   
        $icon_url   = 'dashicons-email-alt2';   
        $position   = 2;    
        add_menu_page( $page_title, $menu_title, $capability,  $menu_slug, $function, $icon_url, $position );
        add_submenu_page( $menu_slug, 'Alle Beskeder fra Kontakt Formen', 'Beskeder', $capability, $menu_slug, $function);
        add_submenu_page( $menu_slug, 'Settings', 'Settings', $capability, '/admin.php?page=det-gamle-posthus-settings-contact');
    }

    public static function list_page() {
        include plugin_dir_path( __FILE__ ) . "../partials/admin-list.php";
    }

    public static function sub_page() {
        ?>
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
            
        <?php
    }

    public static function create_options_page(){
        acf_add_options_sub_page(array(
            'page_title'        => 'Kontakt Form Settings',
            'menu_title'        => 'Kontakt Form',
            'menu_slug'         => 'det-gamle-posthus-settings-contact',
            'parent_slug'       => 'det-gamle-posthus-settings',
        ));

        // reCAPTHA settings
        acf_add_local_field_group(array(
            'key' => 'group_tob_au8kr6n36o',
            'title' => 'reCAPTCHA v2 setting',
            'fields' => array(
                array(
                    'key' => 'field_tob_g9swqnir3u',
                    'label' => 'Site Key',
                    'name' => 'recaptcha_site_key',
                    'type' => 'text',
                    'instructions' => 'Opret og find oplysningerne her: <a href="https://www.google.com/recaptcha/">reCAPTCHA</a>. - Typen skal være v2 Checkbox',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_tob_9ntrmo0emy',
                    'label' => 'Secret Key',
                    'name' => 'recaptcha_secret_key',
                    'type' => 'text',
                    'instructions' => 'Opret og find oplysningerne her:	<a href="https://www.google.com/recaptcha/">reCAPTCHA</a>. - Typen skal være v2 Checkbox',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'det-gamle-posthus-settings-contact',
                    ),
                ),
            ),
            'menu_order' => 1,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'left',
            'instruction_placement' => 'field',
            'hide_on_screen' => '',
            'active' => true,
            'description' => 'test',
        ));
        
        // Email Settings
        acf_add_local_field_group(array(
            'key' => 'group_tob_omhy9sv8ix',
            'title' => 'Email Settings',
            'fields' => array(
                array(
                    'key' => 'field_tob_vf0ruas5fa',
                    'label' => 'From Name',
                    'name' => 'contact_form_from_name',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_tob_nlf40iycq1',
                    'label' => 'From Adresse',
                    'name' => 'contact_form_from_address',
                    'type' => 'email',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
                array(
                    'key' => 'field_tob_f4ovhf7oig',
                    'label' => 'Reply To Name',
                    'name' => 'contact_form_reply_to_name',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_tob_wh1frf1fr1',
                    'label' => 'Reply To Adresse',
                    'name' => 'contact_form_reply_to_address',
                    'type' => 'email',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'det-gamle-posthus-settings-contact',
                    ),
                ),
            ),
            'menu_order' => 2,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'left',
            'instruction_placement' => 'field',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

        // Standard strings
        acf_add_local_field_group(array(
            'key' => 'group_tob_tuq099hbh4',
            'title' => 'Standard Strings',
            'fields' => array(
                array(
                    'key' => 'field_tob_bbr31djh6l',
                    'label' => 'Form Sendt Besked',
                    'name' => 'contact_form_updated_msg',
                    'type' => 'text',
                    'instructions' => 'Beskeden vises når en besked er sendt.',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => 'Tak for din besked.<br>Vi vender tilbage hurtigst muligt.',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_tob_82xwc0mjyi',
                    'label' => 'Mail Template',
                    'name' => 'contact_form_mail_template',
                    'type' => 'wysiwyg',
                    'instructions' => 'Mail Template. Brug [name] [email] [phone] & [msg]',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => "<h1>Det Gamle Posthus</h1>
                    <br>
                    <div style='background:gray; border: 2px solid black; border-radius: 25px;'>
                        <table style='font-family: Times, serif;'>
                            <tr style='width:100%;'>
                                <th>Name:</th>
                                <td>[name]</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>[email]</td>
                            </tr>
                            <tr>
                                <th>Telefon:</th>
                                <td>[phone]</td>
                            </tr>
                        </table>
                        <br>
                        <div style='font-family: Times, serif; padding: 48px;'>
                            <h3>Besked: </h3>
                            <p>[msg]</p>
                        </div>
                    </div>
                    <div>
                        
                    </div>",
                    'tabs' => 'all',
                    'toolbar' => 'full',
                    'media_upload' => 0,
                    'delay' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'det-gamle-posthus-settings-contact',
                    ),
                ),
            ),
            'menu_order' => 3,
            'position' => 'acf_after_title',
            'style' => 'default',
            'label_placement' => 'left',
            'instruction_placement' => 'field',
            'hide_on_screen' => '',
            'active' => true,
            'description' => 'test',
        ));        
    }
}

