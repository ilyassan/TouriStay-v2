<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PerformanceTestController extends Controller
{
    public function loopPerformance()
    {
        $items = range(1, 10000); // Create an array of 1000 items

        // Blade Rendering Time
        $startTimeBlade = microtime(true);
        $bladeContent = View::make('blade_loop', ['items' => $items])->render();
        $endTimeBlade = microtime(true);
        $bladeTime = $endTimeBlade - $startTimeBlade;

        // Native PHP Rendering Time
        $startTimeNative = microtime(true);
        $nativeContent = View::file(resource_path('views/native_loop.php'), ['items' => $items])->render();
        $endTimeNative = microtime(true);
        $nativeTime = $endTimeNative - $startTimeNative;

        return view('performance_results', [
            'bladeTime' => $bladeTime,
            'nativeTime' => $nativeTime,
            'bladeContent' => $bladeContent, // Optional: To display the output
            'nativeContent' => $nativeContent, // Optional: To display the output
        ]);
    }
}