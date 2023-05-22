<?php

namespace App\Http\Controllers;


use App\Models\AirLine;
use Illuminate\Http\Request;

class AirlinesSearchController extends Controller
{
    public function searchAirlines(Request $request)
    {
        if (!request('q')) {
            return response()->json([
                'total_count' => 0,
                'incomplete_results' => false,
                'items' => [],
            ]);
        }

        $airlines = AirLine::query()
            ->select(['id', 'name', 'iata'])
            ->where('name', 'like', '%' . request('q') . '%')
            ->orWhere('icao', 'like', '%' . request('q') . '%')
            ->orWhere('iata', 'like', '%' . request('q') . '%')
            ->get();

        return response()->json([
            'total_count' => count($airlines),
            'items' => $airlines,
        ]);

    }
}

