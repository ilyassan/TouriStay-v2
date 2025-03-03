<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = Property::all();
        $users = User::pluck("id")->toArray();

        $properties->each(function($property) use ($users){
            $from = Carbon::parse($property->available_from);
            $to = Carbon::parse($property->available_to);
            $availabilityDays = $from->diffInDays($to);

            $addedDays = rand(1, ceil($availabilityDays / 2));
            $fromDate = $from->addDays($addedDays);
            $toDate = $fromDate->copy()->addDays(rand(0, $availabilityDays - $addedDays));

            $reservation = Reservation::create([
                "user_id" => Arr::random($users),
                "property_id" => $property->id,
                "from_date" => $fromDate,
                "to_date" => $toDate,
                "total_price" => $property->price * $fromDate->diffInDays($toDate),
            ]);
        });
    }
}
