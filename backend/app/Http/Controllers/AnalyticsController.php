<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeterReading;

class AnalyticsController extends Controller
{
    public function getAnalytics(Request $request)
    {
        // Get meter readings for the authenticated user
        $user = $request->user();
        $meterReadings = MeterReading::where('user_id', $user->id)->get();

        // Calculate analytics
        $totalConsumption = $meterReadings->sum('value');
        $averageConsumption = $meterReadings->avg('value');
        $maxConsumption = $meterReadings->max('value');
        $minConsumption = $meterReadings->min('value');

        // Return the analytics as a JSON response
        return response()->json([
            'total_consumption' => $totalConsumption,
            'average_consumption' => $averageConsumption,
            'max_consumption' => $maxConsumption,
            'min_consumption' => $minConsumption,
        ]);
    }
}
