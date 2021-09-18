<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRaceRequest;
use App\Models\City;
use App\Models\Race;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaceController extends Controller
{
    public function index(Request $request)
    {
        // return view('races.index', ['races' => Race::with('city')->get()]);
        $cities = City::all();
        $types = DB::table('types_of_race')->select(['id', 'type_of_race'])->get();

        if (count($request->all()) > 0) {
            // get filters
            $filter = $request->all();

            // get cityIDs
            $cityIDs = array_filter($filter, function ($data) {
                $word = 'city';
                return strpos($data, $word);
            }, ARRAY_FILTER_USE_KEY);

            // get typeIDs
            $typeIDs = array_filter($filter, function ($data) {
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
            return view('races.index', [
                'races' => $data,
                'cities' => $cities,
                'types' => $types
            ]);
        } else {
            return view('races.index', [
                'races' => Race::with('city')->get(),
                'cities' => $cities,
                'types' => $types
            ]);
        }
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
            'date' => $request->post('date') . ' ' . $request->post('time'),
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

    public function search(Request $request)
    {
        $cities = City::all();
        $types = DB::table('types_of_race')->select(['id', 'type_of_race'])->get();
        $string = $request->input('string');
        $arr = explode(' ', mb_strtolower($string)); //Разбиваем строку поиска на слова.
        $words = [];
        /*
         * Все введённые слова будут сокращены, а в конце слова добавлена звёздочка,
         * это нужно для поиска.
         *
         * */
        foreach ($arr as $word) {
            $len = mb_strlen($word);
            switch ($len) {
                case 0:
                    break;
                case ($len <= 3):
                    $words[] = $word . "*";
                    break;
                case ($len > 3 && $len <= 6):
                    $words[] = mb_substr($word, 0, -1) . "*";
                    break;
                case ($len > 6 && $len <= 9):
                    $words[] = mb_substr($word, 0, -2) . "*";
                    break;
                case ($len > 9):
                    $words[] = mb_substr($word, 0, -3) . "*";
                    break;
            }
        }
        /*
         * Исключаем все повторения и объединяем в строку. Получаем запрос для поиска подстрок.
         * */
        $words = array_unique($words); //Исключаем все повторения.
        $query = implode(" ", $words); //
        $results = Race::whereRaw(
            // title, description, start, finish - поля, по которым нужно искать
            "MATCH(title, description, start, finish) AGAINST(? IN BOOLEAN MODE)",
            $query
        )
            ->get();
        return view('races.index', [
            'races' => $results,
            'cities' => $cities,
            'types' => $types,
        ]);
    }
}
