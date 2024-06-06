<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeterReading;

class MeterReadingController extends Controller
{
    public function index()
    {
        $meterReadings = MeterReading::where('user_id', auth()->id())->get();
        return response()->json($meterReadings);
    }

    public function show($id)
    {
        $meterReading = MeterReading::where('user_id', auth()->id())->findOrFail($id);
        return response()->json($meterReading);
    }

    public function store(Request $request)
    {
        $request->validate([
            'meter_id' => 'required|string',
            'value' => 'required|numeric',
        ]);

        $meterReading = MeterReading::create([
            'meter_id' => $request->meter_id,
            'value' => $request->value,
            'user_id' => $request->user()->id,
        ]);

        return response()->json($meterReading, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'meter_id' => 'required|string',
            'value' => 'required|numeric',
        ]);

        $meterReading = MeterReading::where('user_id', auth()->id())->findOrFail($id);
        $meterReading->update($request->all());

        return response()->json($meterReading);
    }

    public function destroy($id)
    {
        $meterReading = MeterReading::where('user_id', auth()->id())->findOrFail($id);
        $meterReading->delete();

        return response()->json(['message' => 'Meter reading deleted successfully']);
    }
}
