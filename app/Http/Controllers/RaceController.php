<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRaceRequest;
use App\Models\City;
use App\Models\Race;
use App\Models\RaceType;
use App\Models\Role;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    public function __construct() {
        $this->middleware('hasRole:' . Role::ORGANIZER)
            ->only(['create', 'store']);
    }

    public function index()
    {
        return view('races.index', ['races' => Race::with('city')->get()]);
    }

    public function create()
    {
        return view('races.create', [
            'cities' => City::all(),
            'raceTypes' => RaceType::all(),
        ]);
    }

    public function store(StoreRaceRequest $request)
    {
        Race::create([
            'title' => $request->post('title'),
            'city_id' => (int) $request->post('city'),
            'type_of_race_id' => (int) $request->post('type'),
            'date' => $request->post('date'),
            'distance' => (int) $request->post('distance'),
            'description' => $request->post('description'),
            'start' => $request->post('start'),
            'finish' => $request->post('finish'),
        ]);

        return redirect()->route('index');
    }

    public function show(Race $race)
    {
        return view('races.show', ['race' => $race]);
    }
}
