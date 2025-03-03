<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Type;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $thisMonthPropertiesCount = Property::whereMonth('created_at', now()->month)->count();
        $lastMonthPropertiesCount = Property::whereMonth('created_at', now()->subMonth()->month)->count();
        $propertiesRatio = $lastMonthPropertiesCount == 0 ? 100 : ($thisMonthPropertiesCount / $lastMonthPropertiesCount * 100);

        $thisMonthTouristsCount = User::tourists()->whereMonth('created_at', now()->month)->count();
        $lastMonthTouristsCount = User::tourists()->whereMonth('created_at', now()->subMonth()->month)->count();
        $touristsRatio = $lastMonthTouristsCount == 0 ? 100 : ($thisMonthTouristsCount / $lastMonthTouristsCount * 100);


        $lastSixMonths = collect(range(0, 5))->mapWithKeys(function ($monthsAgo) {
            $monthDate = now()->subMonths($monthsAgo)->startOfMonth();
            return [$monthDate->format('M') => 0]; // Initialize all months with count 0
        });

        $touristsPerMonth = User::tourists()
            ->whereBetween('created_at', [now()->subYear(), now()])
            ->select(DB::raw('extract(month from created_at) as month'), DB::raw('COUNT(created_at) as count'))
            ->groupBy(DB::raw('extract(month from created_at)'))
            ->get()
            ->mapWithKeys(function ($item) {
                return [Carbon::createFromFormat('m', $item->month)->format('M') => $item->count];
            });
        
        $proprietorsPerMonth = User::proprietors()
            ->whereBetween('created_at', [now()->subMonths(6), now()])
            ->select(DB::raw('extract(month from created_at) as month'), DB::raw('COUNT(created_at) as count'))
            ->groupBy(DB::raw('extract(month from created_at)'))
            ->get()
            ->mapWithKeys(function ($item) {
                return [Carbon::createFromFormat('m', $item->month)->format('M') => $item->count];
            });
        
        // Merge the actual data with the initialized months
        $lastSixMonthTourists = $lastSixMonths->merge($touristsPerMonth);
        $lastSixMonthProprietors = $lastSixMonths->merge($proprietorsPerMonth);

        $types = Type::withCount('properties')->get()->map(function ($type) {
            return [
                'name' => $type->name,
                'properties_count' => $type->properties_count,
            ];
        });

        $latestActivities = [];

        Property::latest()->limit(2)->get()->each(function ($property) use (&$latestActivities) {
            $latestActivities[] = [
                'type' => 'property',
                'message' => 'New property listed: ' . $property->getTitle(),
                'created_at' => $property->getCreatedAt(),
            ];
        });

        User::latest()->limit(2)->get()->each(function ($property) use (&$latestActivities) {
            $latestActivities[] = [
                'type' => 'register',
                'message' => 'New user registered: ' . $property->getFullName(),
                'created_at' => $property->getCreatedAt(),
            ];
        });

        // order by native php using the sort function
        $latestActivities = collect($latestActivities)->sort(function ($activity1, $activity2) {
            return $activity1['created_at'] <=> $activity2['created_at'];
        });

        return view('dashboard', compact(
            'thisMonthPropertiesCount',
            'propertiesRatio',
            'thisMonthTouristsCount',
            'touristsRatio',
            'lastSixMonthTourists',
            'lastSixMonthProprietors',
            'types',
            'latestActivities'
        ));
    }
}
