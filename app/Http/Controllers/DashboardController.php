<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Report;
use App\Models\Tracker;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('admin.dashboard', [
            'usersCount' => User::count(),
            'todayUsersCount' => User::query()->whereBetween('created_at', [
                now()->today(), now()
            ])->count(),
            'onlineUsersCount' => User::where('last_seen_at', '>', now()->subHour())->count(),
            'reportsCount' => Report::count(),
            'messagesCount' => Message::count(),
            'todayMessagesCount' => Message::query()->whereBetween('created_at', [
                now()->today(), now()
            ])->count(),
            'todayVisitsCount' => Tracker::query()->whereBetween('date', [
                now()->today(), now()
            ])->count(),
            'visitsCount' => Tracker::count(),
            'users' => User::allExceptAuthId()->latest()->limit(50)->get()
        ]);
    }
}
