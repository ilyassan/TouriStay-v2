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
        $users = User::proprietors()->pluck('id')->toArray();
        $cities = City::pluck('id')->toArray();
        $types = Type::pluck('id')->toArray();

        Property::factory(50)->create([
            'user_id' => function () use ($users) {
                return $users[array_rand($users)];
            },
            'city_id' => function () use ($cities) {
                return $cities[array_rand($cities)];
            },
            'type_id' => function () use ($types) {
                return $types[array_rand($types)];
            },
        ]);
    }
}
