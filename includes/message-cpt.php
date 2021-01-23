<?php

// Menu Custom Post Type
class Tobenski_Message_CPT {


    public static function add()
    {
        $labels = array(
            'name'                  => _x( 'Beskeder', 'Post type general name', 'tobenski' ),
            'singular_name'         => _x( 'Besked', 'Post type singular name', 'tobenski' ),
            'menu_name'             => _x( 'Beskeder', 'Admin Menu text', 'tobenski' ),
            'name_admin_bar'        => _x( 'Besked', 'Add New on Toolbar', 'tobenski' ),
            'add_new'               => __( 'Tilføj Ny', 'tobenski' ),
            'add_new_item'          => __( 'Tilføj Ny Besked', 'tobenski' ),
            'new_item'              => __( 'Ny Besked', 'tobenski' ),
            'edit_item'             => __( 'Opdater Besked', 'tobenski' ),
            'view_item'             => __( 'Vis Besked', 'tobenski' ),
            'all_items'             => __( 'Alle Beskeder', 'tobenski' ),
            'search_items'          => __( 'Søg i Beskeder', 'tobenski' ),
            'not_found'             => __( 'Ingen Beskeder fundet.', 'tobenski' ),
            'not_found_in_trash'    => __( 'Ingen Beskeder i Papirkurv.', 'tobenski' ),
        );

        $args = array(
            'rewrite' => array('slug' => 'msg'),
            'labels' => $labels,
            'description' => 'Beskeder fra Kontakt formen',
            'public' => true,
            // 'publicly_queryable' => false, // Betyder det at man kan fange den fra Front end?
            'menu_position' => 20,
            'menu_icon' => 'dashicons-email-alt',
            'supports' => array(
                'title',
            ),
            
        );
        register_post_type( 'message', $args);

        acf_add_local_field_group(array(
            'key' => 'group_tob_eoewasa968',
            'title' => 'Kontakt Form',
            'fields' => array(
                array(
                    'key' => 'field_tob_lw31snfu6u',
                    'label' => 'Navn',
                    'name' => 'name',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => 'kontakt-name',
                        'id' => '',
                    ),
                    'acfe_permissions' => '',
                    'default_value' => '',
                    'placeholder' => 'fx Jens Jensen',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'acfe_settings' => '',
                    'acfe_validate' => '',
                ),
                array(
                    'key' => 'field_tob_cy1qxc2nyi',
                    'label' => 'Email',
                    'name' => 'email',
                    'type' => 'email',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => 'kontakt-email',
                        'id' => '',
                    ),
                    'acfe_permissions' => '',
                    'default_value' => '',
                    'placeholder' => 'fx navn@hotmail.com',
                    'prepend' => '',
                    'append' => '',
                    'acfe_settings' => '',
                    'acfe_validate' => '',
                ),
                array(
                    'key' => 'field_tob_oqbx52sohk',
                    'label' => 'Telefon',
                    'name' => 'phone',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => 'kontakt-phone',
                        'id' => '',
                    ),
                    'acfe_permissions' => '',
                    'default_value' => '',
                    'placeholder' => 'fx 42 80 76 78',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                    'acfe_settings' => '',
                    'acfe_validate' => '',
                ),
                array(
                    'key' => 'field_tob_jm6ij985x4',
                    'label' => 'Besked',
                    'name' => 'msg',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => 'kontakt-msg',
                        'id' => '',
                    ),
                    'acfe_permissions' => '',
                    'default_value' => '',
                    'placeholder' => 'Send os en besked - Denne form kan ikke bruges til bord reservation.',
                    'maxlength' => '',
                    'rows' => 10,
                    'new_lines' => 'br',
                    'acfe_textarea_code' => 0,
                    'acfe_settings' => '',
                    'acfe_validate' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'message',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'left',
            'instruction_placement' => 'label',
            'hide_on_screen' => array(
                0 => 'permalink',
                1 => 'the_content',
                2 => 'excerpt',
                3 => 'discussion',
                4 => 'comments',
                5 => 'revisions',
                6 => 'slug',
                7 => 'author',
                8 => 'format',
                9 => 'page_attributes',
                10 => 'featured_image',
                11 => 'categories',
                12 => 'tags',
                13 => 'send-trackbacks',
            ),
            'active' => true,
            'description' => '',
        ));
        
        acf_add_local_field_group(array(
            'key' => 'group_tob_sn0f8nx7su',
            'title' => 'Kontakt Form hidden',
            'fields' => array(
                array(
                    'key' => 'field_top_n92ex7byna',
                    'label' => 'Recaptcha-Response',
                    'name' => 'recaptcha-response',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
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
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'message',
                    ),
                    array(
                        'param' => 'current_user',
                        'operator' => '==',
                        'value' => 'viewing_back',
                    ),
                ),
            ),
            'menu_order' => 2,
            'position' => 'acf_after_title',
            'style' => 'seamless',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

    }

    public static function save_message( $post_id ) {
        if (get_post_type($post_id) !== 'message') : return; endif;
        if (is_admin()) : return; endif;
        
        $token = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : false;
        
        $status = Tobenski_Recaptcha::check($token, $_SERVER['REMOTE_ADDR'] ); // ? 'publish' : 'pending';
        if ($status['success']) :
            Tobenski_Message_CPT::send_mails(get_field('name', $post_id), get_field('email', $post_id),get_field('phone', $post_id), get_field('msg', $post_id));
        endif;
        
        $title = 'Besked fra: ' . get_field('name', $post_id) . '<' . get_field('email', $post_id) . '>';

        update_field('recaptcha-response', $status['response'], $post_id );

        

        wp_update_post( array(
            'ID'            => $post_id,
            'post_title'    => $title,
            'post_status'   => $status['success'] ? 'publish' : 'pending',
        ));
    }

    public static function send_mails($name, $email, $phone, $msg )
    {
        $to = $name . '<' . $email . '>';
        $subject = 'Kopi af din besked til ' . get_field('field_tob_vf0ruas5fa', 'option') . ' <' . get_field('field_tob_nlf40iycq1', 'option') . '>';
        $message = Tobenski_Message_CPT::generate_msg($name, $email, $phone, $msg);
        $headers[] = 'Content-Type: text/html; charset=UTF-8';
        $headers[] = 'From: ' . get_field('field_tob_vf0ruas5fa', 'option') . ' <' . get_field('field_tob_nlf40iycq1', 'option') . '>';
        $headers[] = 'Reply-To: ' . get_field('field_tob_f4ovhf7oig', 'option') . ' <' . get_field('field_tob_wh1frf1fr1', 'option') . '>';
        wp_mail( $to, $subject, $message, $headers );

        $to = get_field('field_tob_vf0ruas5fa', 'option') . ' <' . get_field('field_tob_nlf40iycq1', 'option') . '>';
        $subject = "Besked fra $name <$email>";
        $secondHeaders[] = 'Content-Type: text/html; charset=UTF-8';
        $secondHeaders[] = 'From: ' . get_field('field_tob_vf0ruas5fa', 'option') . ' <' . get_field('field_tob_nlf40iycq1', 'option') . '>';
        $secondHeaders[] = "Reply-To: $name <$email>";
        wp_mail( $to, $subject, $message, $secondHeaders );

    }

    public static function generate_msg($name, $email, $phone, $msg)
    {
        $message = get_field('field_tob_82xwc0mjyi', 'option');
        $message = str_replace('[name]', $name, $message);
        $message = str_replace('[email]', $email, $message);
        $message = str_replace('[phone]', $phone, $message);
        $message = str_replace('[msg]', $msg, $message);

        return $message;
    }
}