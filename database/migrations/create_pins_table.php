<?php

use Yuges\Pinnable\Models\Pin;
use Yuges\Package\Enums\KeyType;
use Yuges\Pinnable\Config\Config;
use Yuges\Package\Database\Schema\Schema;
use Yuges\Package\Database\Schema\Blueprint;
use Yuges\Package\Database\Migrations\Migration;

return new class extends Migration
{
    public function __construct()
    {
        $this->table = Config::getPinClass(Pin::class)::getTableName();
    }

    public function up(): void
    {
        if (Schema::hasTable($this->table)) {
            return;
        }

        Schema::create('table', function (Blueprint $table) {
            $table->key(Config::getPinKeyType(KeyType::BigInteger));

            $table->keyMorphs(
                Config::getPinnableKeyType(KeyType::BigInteger),
                Config::getPinnableRelationName('pinnable')
            );

            Config::getPermissionsAnonymous(false)
                ? $table->nullableKeyMorphs(
                    Config::getPinnerKeyType(KeyType::BigInteger),
                    Config::getPinnerRelationName('pinner')
                )
                : $table->keyMorphs(
                    Config::getPinnerKeyType(KeyType::BigInteger),
                    Config::getPinnerRelationName('pinner')
                );

            $table->order();
            $table->unique(['pinnable_id', 'pinnable_type', 'pinner_id', 'pinner_type']);

            $table->timestamps();
        });
    }
};
