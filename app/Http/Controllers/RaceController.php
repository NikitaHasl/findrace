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
}