<?php

class Tobenski_Recaptcha
{
    static function check($token, $ip)
    {
        if (!$token) : return false; endif;

        $secret = get_field('field_tob_9ntrmo0emy', 'option');

        $response = file_get_contents(
            "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $token . "&remoteip=" . $ip
        );
        // use json_decode to extract json response
        $success = json_decode($response)->success;
        
        return ['success' => $success, 'response' => $response ];
    }
}

