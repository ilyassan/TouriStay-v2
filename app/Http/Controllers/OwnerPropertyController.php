<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerPropertyController extends Controller
{
    public function __invoke()
    {
        $properties = Auth::user()->properties()->with("city", "type")->get();
        $propertiesCount = $properties->count();
        $activePropertiesCount = $properties->where("available_from", "<=", now())->where("available_to", ">=", now())->count();
        
        return view("my-properties.index", compact('properties', 'propertiesCount', 'activePropertiesCount'));
    }
}
