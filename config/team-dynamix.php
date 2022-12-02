<?php
/**
 * Laravel configuration file for the TeamDynamix SDK.
 */

return [
    // The base URL for TeamDynamix, including the environment.
    // For example: https://solutions.teamdynamix.com/TDWebApi/
    'apiBaseUrl' => env('TDX_API_BASE_URL'),

    'auth' => [
        'username' => env('TDX_USERNAME'),
        'password' => env('TDX_PASSWORD'),
    ],

    'apps' => [
        // The name for an AppClass = TDTickets app where tickets should be managed.
        'ticketing' => config('TDX_TICKET_APP_NAME'),

        // The name for an AppClass = TDClient app where services should be managed.
        'client' => config('TDX_CLIENT_APP_NAME'),
    ],
];
