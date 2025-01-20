<?php

return [
    'default' => [
        'host' => env('MQTT_HOST', 'server.byimil.com'),
        'port' => env('MQTT_PORT', 1883),
        'username' => env('MQTT_USERNAME', 'powerapp'),
        'password' => env('MQTT_PASSWORD', 'BeetleFanta24'),
        'client_id' => env('MQTT_CLIENT_ID', 'laravel_' . uniqid()),
    ],
]; 