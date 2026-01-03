<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use PDO;

class GuestController extends CrudController
{
    public function __construct()
    {
        parent::__construct(Guest::class, 'Guests');
    }

    function view(Request $request)
    {
        $data = $this->filter($request)
            ->orderBy('name', 'asc')->get();

        return view('guests/index', [
            'guests' => $data,
            'filters' => $request->all()
        ]);
    }

    private function filter(Request $request)
    {
        $query = new Guest();

        $session = $request->query('session');
        $name = $request->query('name');
        $phone = $request->query('phone');
        $side = $request->query('side');
        $is_vip = $request->query('is_vip');
        $invited = $request->query('invited');

        if ($session) {
            $query = $query->where('session', $session);
        }

        if ($name) {
            $query = $query->where('name', 'like', "%$name%");
        }

        if ($phone) {
            $query = $query->where('phone', 'like', "%$phone%");
        }

        if ($side) {
            $query = $query->where('side', 'like', "%$side%");
        }

        if ($is_vip !== null) {
            $query = $query->where('is_vip', (bool)$is_vip);
        }

        if ($invited !== null) {
            $query = $query->where('invited', (bool)$invited);
        }

        return $query;
    }

    function create(Request $request)
    {
        $data = Guest::all();

        return view('guests/add', [
            'guests' => $data
        ]);
    }

    function update(Request $request, $id)
    {
        $data = Guest::findOrFail($id);

        return view('guests/update', [
            'guest' => $data
        ]);
    }

    function process(Request $request, $id = null)
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'phone'     => ['max:14'],
            'session' => ['required'],
            'side' => ['required'],
            'invited' => [],
            "is_vip" => []
        ]);

        $attributes['is_vip'] = isset($attributes['is_vip']) ? 1 : 0;
        $attributes['invited'] = isset($attributes['invited']) ? 1 : 0;

        $result = $id == null ? $this->storeData($attributes) : $this->updateData($attributes, $id);
        return redirect('/dashboard/guests')->with('success', $result['message']);
    }

    function delete($id)
    {
        $result = $this->deleteData($id);
        return back()->with('success', $result['message']);
    }
}
