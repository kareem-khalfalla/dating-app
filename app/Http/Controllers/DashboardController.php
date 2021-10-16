<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Report;
use App\Models\Tracker;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;
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
        $males = User::male()->count();
        $females = User::female()->count();

        $chart = (new LarapexChart())->setTitle('Users')
            ->setXAxis([
                'male users', 'female users'
            ])
            ->setDataset([
                $males, $females
            ])
            ->setLabels([
                'male users', 'female users'
            ])
            ->setColors([
                '#008ffb', '#dc3545'
            ]);

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
            'users' => User::with('profile')->allExceptAuthId()->latest()->limit(50)->get(),
            'chart' => $chart
        ]);
    }
}
