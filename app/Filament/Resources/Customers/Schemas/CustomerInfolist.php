<?php

namespace App\Filament\Resources\Customers\Schemas;

use Filament\Schemas\Schema;
use App\Models\Customer;
class CustomerInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                "name" => Customer::class,
                "email" => Customer::class,
                "phone" => Customer::class,
                "address" => Customer::class,
            ]);
    }
}
