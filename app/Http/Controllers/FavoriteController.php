<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $properties = Auth::user()->favorites()->with("city", "type")->get();
        
        return view("favorites.index", compact("properties"));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "property_id" => "required|exists:properties,id"
        ]);

        $data["user_id"] = Auth::id();

        // Check if its already in the favorites, and if yes remove it
        $favorite = Favorite::where("user_id", $data["user_id"])
            ->where("property_id", $data["property_id"])
            ->first();
        
        if ($favorite){
            $favorite->delete();
            return back()->with("success", "This property has been removed from your favorites");
        }

        Favorite::create($data);

        return back()->with("success", "This property has been added to your favorites");
    }
}
