<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Wish;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(Request $request)
    {
        return view('dashboard', [
            'count' => [
                'vip_guests_session' => $this->countVipGuestsBySession(3),
                'wishes' => $this->countWishes(),
                'session' => $this->countSession(3)
            ]
        ]);
    }

    private function countVipGuestsBySession($session)
    {
        return Guest::where('is_vip', '1')->where("session", $session)->count();
    }

    private function countWishes()
    {
        return Wish::count();
    }

    private function countSession($session)
    {
        return Guest::where('session', $session)->count();
    }
}
