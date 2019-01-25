<?php

return [

    'token'    => env( 'BILLY_API_TOKEN' ),
    'supplier' => [

        'fields' => [

            'default' => [

                'payment_terms_id' => 1001,
            ],
        ],
    ],
    'base_uri' => env( 'BILLY_BASE_URL', 'https://api.billysbilling.com/v2/' ),
];