<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return view("reservations.admin");
    }

    public function my()
    {
        return view("reservations.index");
    }
}
