<?php

use App\Services\WP_Mail;

define('API_NAMESPACE', 'site/v1');

add_action('rest_api_init', 'register_routes');

function register_routes()
{
    register_rest_route(API_NAMESPACE, '/send_mail', [
        'methods'  => 'POST',
        'callback' => [ new WP_Mail, 'send' ],
    ]);
}
