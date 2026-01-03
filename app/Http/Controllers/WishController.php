<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends CrudController
{
    public function __construct()
    {
        parent::__construct(Wish::class, 'Wish');
    }

    function view(Request $request)
    {
        $data = Wish::orderBy('created_at', 'desc')->get();

        return view('wishes/index', [
            'wishes' => $data
        ]);
    }

    function create(Request $request)
    {
        $data = $request->only(['name', 'message']);
        Wish::create($data);

        return redirect()->back()->with('success', 'Terima kasih atas doanya!');
    }
}
