<?php

namespace Database\Seeders;

use App\Models\Favorite;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::tourists()->pluck('id')->toArray();
        $properties = Property::pluck('id')->toArray();
        $usedCombinations = [];

        for ($i = 0; $i < 50; $i++) {
            $userId = $users[array_rand($users)];
            $propertyId = $properties[array_rand($properties)];
            $combination = "{$userId}_{$propertyId}";

            if (!isset($usedCombinations[$combination])) {
                $usedCombinations[$combination] = true;

                Favorite::create([
                    "user_id" => $userId,
                    "property_id" => $propertyId,
                ]);
            }
        }
    }
}
