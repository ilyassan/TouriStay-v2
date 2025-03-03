<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Location;
use App\Models\Property;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $users = User::pluck('id')->toArray();
        $cities = City::pluck('id')->toArray();
        $types = Type::pluck('id')->toArray();

        Property::factory(50)->make()->each(function ($property) use ($users, $cities, $types) {
            $property->user_id = $users[array_rand($users)];
            $property->city_id = $cities[array_rand($cities)];
            $property->type_id = $types[array_rand($types)];
            $property->save();
        });
    }
}
