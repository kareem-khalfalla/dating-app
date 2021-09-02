<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;

class StateController extends Controller
{
    public function index(): JsonResponse
    {
        $cities = State::whereHas('country', function (Builder $query) {
            $query->whereId(request('country_id', 0));
        })->pluck('name', 'id');

        return response()->json($cities);
    }
}