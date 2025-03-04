<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Property;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->has("keyword") ? "%" . $request->get("keyword") . "%" : "%";
        $itemsToShow = $request->get("items") ?? 10;

        $reservations = Reservation::with("property.city", "property.type", "tourist")
                                ->where("from_date", "LIKE", $keyword)
                                ->orWhere("to_date", "LIKE", $keyword)
                                ->paginate($itemsToShow)
                                ->appends(request()->query());

        return view("reservations.admin", compact('reservations'));
    }

    public function store(StoreReservationRequest $request)
    {
        $data = $request->validated();
        
        $property = Property::find($data['property_id']);

        if ($property->getAvailableFromDate() > $data['from_date'] || $property->getAvailableToDate() < $data['to_date']) {
            return back()->with("error", "The property is not available for the selected dates.");
        }

        // Check if the property is already reserved or overlaped in the selected dates
        $reservations = Reservation::where("property_id", $data['property_id'])
                                    ->where(function ($query) use ($data) {
                                        $query->whereBetween("from_date", [$data['from_date'], $data['to_date']])
                                            ->orWhereBetween("to_date", [$data['from_date'], $data['to_date']]);
                                    })
                                    ->count();
        if ($reservations > 0) {
            return back()->with("error", "The property is already reserved for the selected dates.");
        }

        $nights = Carbon::parse($data["from_date"])->diffInDays($data["to_date"]) + 1;
        $data["total_price"] = $property->getPrice() * $nights;
        $data["user_id"] = Auth::id();

        Reservation::create($data);

        return back()->with("success", "Reservation created successfully.");
    }

    public function my()
    {
        $reservations = Auth::user()->reservations()->with("property.city", "property.type")->get();
        
        return view("reservations.index", compact("reservations"));
    }
}
