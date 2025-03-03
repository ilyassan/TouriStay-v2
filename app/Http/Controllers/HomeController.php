<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $usersCount = User::count() - 1;
        $propertiesCount = Property::count();
        $citiesCount = City::count();

        $properties = Property::with("city")->limit(3)->get();

        return view("home", compact('usersCount', 'propertiesCount', 'citiesCount', 'properties'));
    }
}
