<?php

// Config for yuges/pinable

return [
    /*
     * FQCN (Fully Qualified Class Name) of the models to use for groups
     */
    'models' => [
        'pin' => [
            'key' => Yuges\Package\Enums\KeyType::BigInteger,
            'table' => 'pins',
            'class' => Yuges\Pinable\Models\Pin::class,
            'observer' => Yuges\Pinable\Observers\GroupObserver::class,
        ],
        'pinner' => [

        ],
    ],

    'permissions' => [
        'anonymous' => false,
    ],
];
