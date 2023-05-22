<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Airport;
use Illuminate\Http\Request;

class AirportsSearchController extends Controller
{

    public function searchAirports(Request $request)
    {
        if (!request('q')) {
            return response()->json([
                'total_count' => 0,
                'incomplete_results' => false,
                'items' => [],
            ]);
        }

        $airports = Airport::query()
            ->select(['id', 'name', 'city', 'country', 'iata'])
//            ->where('name', 'like', '%' . request('q') . '%')
//            ->orWhere('city', 'like', '%' . request('q') . '%')
//            ->orWhere('country', 'like', '%' . request('q') . '%')
            ->where('iata', 'like', '%' . request('q') . '%')
            ->get();

        return response()->json([
            'total_count' => count($airports),
            'items' => $airports,
        ]);

    }


}
