<?php

// Config for yuges/pinnable

return [
    /*
     * FQCN (Fully Qualified Class Name) of the models to use for groups
     */
    'models' => [
        'pin' => [
            'key' => Yuges\Package\Enums\KeyType::BigInteger,
            'table' => 'pins',
            'class' => Yuges\Pinnable\Models\Pin::class,
            'observer' => Yuges\Pinnable\Observers\PinObserver::class,
        ],
        'pinner' => [

        ],
        'pinnable' => [

        ],
    ],

    'permissions' => [
        'anonymous' => false,
    ],
];
