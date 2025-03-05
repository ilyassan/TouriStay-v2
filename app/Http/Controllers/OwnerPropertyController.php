<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerPropertyController extends Controller
{
    public function __invoke()
    {
        // Get the authenticated user and their properties with related data
        $properties = Auth::user()->properties()
            ->with(['city', 'type', 'reservations.tourist'])
            ->get();

        $propertiesCount = $properties->count();

        $activePropertiesCount = $properties->where('available_from', '<=', now())
            ->where('available_to', '>=', now())
            ->count();

        $reservations = $properties->flatMap(function ($property) {
            return $property->reservations->map(function ($reservation) use ($property) {
                $reservation->property = $property;
                return $reservation;
            });
        });


        return view('my-properties.index', compact('properties', 'propertiesCount', 'activePropertiesCount', 'reservations'));
    }
}