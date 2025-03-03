<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\City;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    
    public function index(Request $request)
    {
        $keyword = $request->has("keyword") ? "%" . $request->get("keyword") . "%" : "%";
        $itemsToShow = $request->get("items") ?? 3;
        
        $properties = Property::with(["city", "favorites" => function($favorite){
                                    return $favorite->whereHas('user', function ($user) {
                                        $user->where('id', Auth::id());
                                    })->get();
                                }])
                                ->where("title", "LIKE", $keyword)
                                ->orWhere("description", "LIKE", $keyword)
                                ->orWhere("price", "LIKE", $keyword)
                                ->orWhere("bathrooms", "LIKE", $keyword)
                                ->orWhere("bedrooms", "LIKE", $keyword)
                                ->paginate($itemsToShow)
                                ->appends(request()->query());

        return view(Auth::user()->isProprietor() ? "properties.index" : "properties.admin", compact('properties'));
    }

    public function create()
    {
        $types = Type::all();
        $cities = City::all();

        return view('properties.create', compact("types", "cities"));
    }

    public function store(StorePropertyRequest $request)
    {
        $data = $request->validated();

        // Store the image
        $data["image"] = $request->file('image')->store('images', 'public');
        $data["user_id"] = Auth::id();
        
        // Create the property
        Property::create($data);
        
        return back()->with("success", "Your property has been published successfully.");
    }

    public function edit(Property $property)
    {
        if (Auth::id() != $property->getOwnerId()) {
            return redirect()->route("home");
        }

        $types = Type::all();
        $cities = City::all();

        return view('properties.edit', compact("types", "cities", "property"));
    }
    
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $data = $request->validated();

        if (Auth::id() != $property->getOwnerId()) {
            return redirect()->route("home");
        }

        // Delete the old image
        if ($request->hasFile('image')) {
            if ($property->getImageName()) {
                unlink(storage_path("app/public/" . $property->getImageName()));
            }
            $data["image"] = $request->file('image')->store('images', 'public');
        }

        $data["user_id"] = Auth::id();
        
        // Update the property
        $property->update($data);
        
        return back()->with("success", "Your property has been updated successfully.");
    }

    public function destroy(Property $property)
    {
        if ( Auth::user()->isProprietor() && Auth::id() != $property->getOwnerId()) {
            return redirect()->route("home");
        }

        // Delete the image
        if ($property->getImageName()) {
            unlink(storage_path("app/public/" . $property->getImageName()));
        }

        $property->delete();

        return back()->with("success", "Your property has been deleted successfully.");
    }
}
