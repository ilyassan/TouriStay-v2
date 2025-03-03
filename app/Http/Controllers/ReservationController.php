<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function my()
    {
        return view("my-reservations.index");
    }
}
