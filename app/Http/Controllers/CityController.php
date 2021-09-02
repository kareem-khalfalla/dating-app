<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
    public function index(): JsonResponse
    {
        $cities = City::whereHas('state', function (Builder $query) {
            $query->whereId(request('state_id', 0));
        })->pluck('name', 'id');

        return response()->json($cities);
    }
}