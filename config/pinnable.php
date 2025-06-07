<?php

// Config for yuges/pinnable

return [
    /*
     * FQCN (Fully Qualified Class Name) of the models to use for pins
     */
    'models' => [
        'pin' => [
            'key' => Yuges\Package\Enums\KeyType::BigInteger,
            'table' => 'pins',
            'class' => Yuges\Pinnable\Models\Pin::class,
            'observer' => Yuges\Pinnable\Observers\PinObserver::class,
        ],
        'pinner' => [
            'key' => Yuges\Package\Enums\KeyType::BigInteger,
            'default' => [
                'class' => \App\Models\User::class,
            ],
            'allowed' => [
                'classes' => [
                    \App\Models\User::class,
                ],
            ],
            'relation' => [
                'name' => 'pinner',
            ],
            'observer' => Yuges\Pinnable\Observers\PinnerObserver::class,
        ],
        'pinnable' => [
            'key' => Yuges\Package\Enums\KeyType::BigInteger,
            'default' => [
                'class' => \App\Models\User::class,
            ],
            'allowed' => [
                'classes' => [
                    \App\Models\User::class,
                ],
            ],
            'relation' => [
                'name' => 'pinnable',
            ],
            'observer' => Yuges\Pinnable\Observers\PinnableObserver::class,
        ],
    ],

    'permissions' => [
        'anonymous' => false,
    ],

    'actions' => [
        // 'sync' => Yuges\Pinnable\Actions\SyncGroupsAction::class,
        // 'attach' => Yuges\Pinnable\Actions\AttachGroupsAction::class,
        // 'detach' => Yuges\Pinnable\Actions\DetachGroupsAction::class,
    ],
];
