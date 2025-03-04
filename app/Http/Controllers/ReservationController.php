<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

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

    public function my()
    {
        return view("reservations.index");
    }
}
