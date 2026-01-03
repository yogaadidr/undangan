<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Guest;
use App\Models\Wish;
use Illuminate\Http\Request;

class UndanganController extends Controller
{
    function index(Request $request)
    {
        $param = $request->query('to') ?? $request->query('tamu') ?? '';
        $tamu = $this->replaceUnderscoreWithSpace($param);
        $user = $this->getGuestByName($tamu);

        $session = $user == null ? 1 : $user->session;

        // if ($user == null) {
        //     abort(404);
        // }

        return view('home', [
            'tamu' => $tamu,
            'session' => $session,
            'wishes' => $this->getAllWishes(),
            'cards' => $this->getAllCards()
        ]);
    }

    private function getGuestByName($name)
    {
        return Guest::where("name", $name)->get()->first();
    }

    private function replaceUnderscoreWithSpace($string)
    {
        return str_replace('_', ' ', $string);
    }

    private function getAllWishes()
    {
        return Wish::orderBy('created_at', 'desc')->get()->toArray();
    }

    private function getAllCards()
    {
        return Card::orderBy('created_at', 'desc')->get()->toArray();
    }
}
