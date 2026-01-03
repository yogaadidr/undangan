<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends CrudController
{
    public function __construct()
    {
        parent::__construct(Card::class, 'Card');
    }
    
    function view(Request $request)
    {
        $data = Card::orderBy('name', 'asc')->get();

        return view('cards/index', [
            'cards' => $data
        ]);
    }

    function create(Request $request)
    {
        $data = Card::all();

        return view('cards/add');
    }

    function update(Request $request, $id)
    {
        $data = Card::findOrFail($id);

        return view('cards/update', [
            'card' => $data
        ]);
    }

    function process(Request $request, $id = null)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'number' => ['required', 'max:20'],
            'bank' => ['required', 'max:10']
        ]);

        $result = $id == null ? $this->storeData($attributes) : $this->updateData($attributes, $id);
        return redirect('/dashboard/cards')->with('success', $result['message']);
    }

    function delete($id)
    {
        $result = $this->deleteData($id);
        return back()->with('success', $result['message']);
    }
}
