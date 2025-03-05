<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Type;
use App\Models\User;
use App\Models\Reservation;
use Carbon\Carbon;
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
        
        $thisMonthActiveProperties = Reservation::where('from_date', '<=', now())->where('to_date', '>=', now())->whereMonth('created_at', now()->month)->count();
        $lastMonthActiveProperties = Reservation::where('from_date', '<=', now())->where('to_date', '>=', now())->whereMonth('created_at', now()->subMonth()->month)->count();
        $activePropertiesRatio = $lastMonthActiveProperties == 0 ? 100 : ($thisMonthActiveProperties / $lastMonthActiveProperties * 100);

        $totalRevenue = Reservation::sum('total_price');

        $lastSixMonths = collect(range(0, 5))->mapWithKeys(function ($monthsAgo) {
            $monthDate = now()->subMonths($monthsAgo)->startOfMonth();
            return [$monthDate->format('M') => 0];
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

        $latestActivities = collect($latestActivities)->sort(function ($activity1, $activity2) {
            return $activity1['created_at'] <=> $activity2['created_at'];
        });

        return view('dashboard', compact(
            'thisMonthPropertiesCount',
            'propertiesRatio',
            'thisMonthTouristsCount',
            'touristsRatio',
            'thisMonthActiveProperties',
            'activePropertiesRatio',
            'totalRevenue',
            'lastSixMonthTourists',
            'lastSixMonthProprietors',
            'types',
            'latestActivities'
        ));
    }
}