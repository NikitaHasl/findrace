<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;

class RaceController extends Controller
{
    public function index()
    {
        return view('races.index', ['races' => Race::with('city')->get()]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Race $race)
    {
        return view('races.show', ['race' => $race]);
    }

    public function filterRace() {
        // get filters
        $filter = $_GET;

        // get cityIDs
        $cityIDs = array_filter($filter, function($data) {
            $word = 'city';
            return strpos($data, $word);
        }, ARRAY_FILTER_USE_KEY);

        // get typeIDs
        $typeIDs = array_filter($filter, function($data) {
            $word = 'type';
            return strpos($data, $word);
        }, ARRAY_FILTER_USE_KEY);

        // retrieve data from DB
        $query = Race::query();

        // if code has cities, add to query
        if (!empty($cityIDs)) {
            $query->whereIn('city_id', $cityIDs);
        }

        // if code has types, add to query
        if (!empty($typeIDs)) {
            $query->whereIn('type_of_race_id', $typeIDs);
        }

        // execute query
        $data = $query->get();
        return view('races.index', ['races' => $data]);
    }
}
