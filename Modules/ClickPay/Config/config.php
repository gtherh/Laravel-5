<?php

return [
    'name' => 'ClickPay',

    'alias' => 'clickpay',

    'logo' => 'Modules/ClickPay/Resources/assets/instamojo.png',

    'options' => [
        ['label' => __('Settings'), 'type' => 'modal', 'url' => 'clickpay.edit'],
        ['label' => __('clickPay Documentation'), 'target' => '_blank', 'url' => 'https://docs.instamojo.com/docs']
    ],

    /**
     * clickPay data validation
     */
    'validation' => [
        'rules' => [
            'profile_id' => 'required',

            'server_key' => 'required',
            'sandbox' => 'required',
        ],
        'attributes' => [
            'profile_id' => __('Api Key'),
            'server_key' => __('Auth Token'),
            'sandbox' => 'Please specify sandbox enabled/disabled.'
        ]
    ],
    'fields' => [
        'profile_id' => [
            'label' => 'profile_id',
            'type' => 'text',
            'required' => true
        ],
        'server_key' => [
            'label' => 'server_key',
            'type' => 'text',
            'required' => true
        ],
        'instruction' => [
            'label' => 'Instruction',
            'type' => 'textarea'
        ],
        'sandbox' => [
            'label' => 'Sandbox',
            'type' => 'select',
            'required' => true,
            'options' => [
                'Enabled' => 1,
                'Disabled' =>  0
            ]
        ],
        'status' => [
            'label' => 'Status',
            'type' => 'select',
            'required' => true,
            'options' => [
                'Active' => 1,
                'Inactive' =>  0
            ],
            'note' => __("clickPay does not support any currency except 'INR'."),
        ]
    ],

    'store_route' => 'clickpay.store',

    'ssl_verify_host' => false,
    'ssl_verify_peer' => false,
];
