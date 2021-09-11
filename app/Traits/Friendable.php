<?php

namespace App\Traits;

use App\Models\Friendship;
use Illuminate\Http\JsonResponse;

trait Friendable
{
    public function addFriend(int $to): JsonResponse
    {
        $friendship = Friendship::create([
            'from' => $this->id,
            'to' => $to,
            // 'status' => '',
        ]);

        if ($friendship) {
            return response()->json($friendship, 200);
        }

        return response()->json('Failure', 400);
    }

    public function acceptFriend(int $from): JsonResponse
    {
        $friendship = Friendship::where('from', $from)->where('to', $this->id)->first();

        if ($friendship) {
            $friendship->update([
                'status' => 1,
            ]);

            return response()->json($friendship, 200);
        }

        return response()->json('Failure', 400);
    }
}
